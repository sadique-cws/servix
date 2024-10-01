@extends('staff.layout.base')


@section('content')
    
  <!-- Content Wrapper. Contains page content -->
  
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ CountStaffRequest("all", True)}}</h3>

                <p>New Request</p> 
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{ route('request.new') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{  CountStaffRequest(5)}}</h3>

                <p>Total Delivered</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="{{ route('request.show.delivered') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ CountStaffRequest(0)}}</h3> 

                <p>Total Pending</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{ route('request.show.pending') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ CountStaffRequest(3)}}</h3>

                <p>Total Bounced/Rejects</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="{{ route('request.show.reject') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          {{-- <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
           </section> --}}
          <!-- /.Left col -->
          <section class="col connectedSortable">

            <div class="card ">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-map-marker-alt mr-1"></i>
                  latest <span class="font-weight-bold">{{ auth()->user()->type->typename }}</span> Request
                </h3>
                <!-- card tools -->
                <div class="card-body table-responsive p-0"  >
                  <table class="table table-hover text-nowrap"  style="height: 60vh">
                      <thead>
                          <tr>
                              <th>S CODE</th>
                              <th>product_name</th>
                              <th>problem</th>
                              
                              <th>Action</th>
                                  
                          
                          </tr>
                      </thead>
                      <tbody class="">
                          @foreach ($allRequests as $item)
                              <tr>
                                  <td class="text-uppercase text-success fw-bold">{{ $item->service_code }}</td>
                                  <td>{{ $item->product_name }}</td>
                                  <td>{{ $item->problem }}</td>
                                 
                                 
                                 
                                      <td class="border border-slate-700 p-1.5  items-center justify-center flex btn-group"
                                          role="group">
                                          <div class="btn-group" role="group"
                                              aria-label="Button group with nested dropdown">


                                              <div class="btn-group" role="group">
                                                  <button type="button" class="btn btn-primary dropdown-toggle"
                                                      data-bs-toggle="dropdown" aria-expanded="false">
                                                      Action
                                                  </button>
                                                  <ul class="dropdown-menu text-center " style="z-index:6;">

                                                      {{-- Conform button --}}
                                                      @if ($item->status != 'Delivered')
                                                      @if ($item->technician_id)
                                                          <li>
                                                              <a role="button"
                                                                  href="{{ route('request.Deliver', $item->id) }}"
                                                                  class="btn btn-success dropdown-item"
                                                                  href="">Deliver</a>
                                                          </li>
                                                      @endif
                                                      @if (!$item->technician_id)
                                                          <li>
                                                              <a role="button"
                                                                  href="{{ route('request.confirm', $item->id) }}"
                                                                  class="btn btn-success dropdown-item"
                                                                  href="">Confirm</a>
                                                          </li>
                                                      @endif
                                                      {{-- Pending button --}}
                                                      @if (($item->status != 'pending') )
                                                          <li> <a role="button" class="btn btn-warning dropdown-item"
                                                                  href="{{ route('request.pending', $item) }}">Pending</a>
                                                          </li>
                                                      @endif
                                                      {{-- Reject button --}}
                                                      @if (($item->status != 'rejected') )
                                                          <li> <a role="button" class="btn btn-danger dropdown-item"
                                                                  href="{{ route('request.reject', $item) }}">Reject</a>
                                                          </li>
                                                      @endif
                                                      {{-- Edit button --}}
                                                      @if ($item->technician_id)
                                                          <li> <a role="button" class="btn btn-success dropdown-item"
                                                                  href="{{ route('request.edit', $item->id) }}">Edit</a>
                                                          </li>
                                                      @endif
                                                      @endif

                                                      {{-- view button  --}}
                                                      <li> <a data-toggle="modal" data-target="#view{{ $item->id }}"
                                                              role="button" class=" btn btn-info dropdown-item">View</a>
                                                      </li>

                                                  </ul>
                                              </div>
                                          </div>





                                          <div class="modal fade " id="view{{ $item->id }}" tabindex="-1"
                                              role="dialog" aria-hidden="true">
                                              <div class="modal-dialog modal-dialog-centered " role="document">
                                                  <div class="modal-content bg-light w-100 h-100">
                                                      <div class="modal-header">
                                                          <h5 class="modal-title" id="exampleModalLongTitle">Profile
                                                          </h5>
                                                          <button type="button" class="close" data-dismiss="modal"
                                                              aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                          </button>
                                                      </div>
                                                      <div class="modal-body">

                                                          <div class="d-flex flex-row col-12">
                                                              <div class="col-6">
                                                                  <div class="border border-dark p-1 text-center">
                                                                      <label for=""><span><svg width="40px"
                                                                                  height="40px"
                                                                                  viewBox="0 0 1024.00 1024.00"
                                                                                  class="icon" version="1.1"
                                                                                  xmlns="http://www.w3.org/2000/svg"
                                                                                  fill="#000000">
                                                                                  <g id="SVGRepo_bgCarrier"
                                                                                      stroke-width="0">
                                                                                  </g>
                                                                                  <g id="SVGRepo_tracerCarrier"
                                                                                      stroke-linecap="round"
                                                                                      stroke-linejoin="round"></g>
                                                                                  <g id="SVGRepo_iconCarrier">
                                                                                      <path
                                                                                          d="M974.17307 224.563254v569.048734H47.998302v-569.048734h926.174768z m-840.593675 483.595517h335.355125c0-92.61428-75.095251-167.677562-167.677563-167.677562-92.61428 0-167.677562 75.063282-167.677562 167.677562z m280.112641-284.812088c0-62.115825-50.351222-112.435079-112.435079-112.435079-62.115825 0-112.467048 50.319253-112.467047 112.435079s50.351222 112.435079 112.467047 112.435078c62.083856 0 112.435079-50.319253 112.435079-112.435078z"
                                                                                          fill="#5FCEFF"></path>
                                                                                      <path
                                                                                          d="M468.93452 708.158771h-335.355125c0-92.61428 75.063282-167.677562 167.677562-167.677562 92.582311 0 167.677562 75.063282 167.677563 167.677562zM301.256957 310.911604c62.083856 0 112.435079 50.319253 112.435079 112.435079s-50.351222 112.435079-112.435079 112.435078c-62.115825 0-112.467048-50.319253-112.467047-112.435078s50.351222-112.435079 112.467047-112.435079z"
                                                                                          fill="#FFB578"></path>
                                                                                      <path
                                                                                          d="M974.17307 815.993506H47.998302a22.378321 22.378321 0 0 1-22.378321-22.378321v-569.048734a22.378321 22.378321 0 0 1 22.378321-22.378321h926.174768a22.378321 22.378321 0 0 1 22.378321 22.378321v569.048734a22.378321 22.378321 0 0 1-22.378321 22.378321z m-903.796447-44.756642h881.418126v-524.292092H70.376623v524.292092z"
                                                                                          fill="#4F46A3"></path>
                                                                                      <path
                                                                                          d="M301.256957 558.160082c-74.35357 0-134.845369-60.475814-134.845368-134.813399s60.491799-134.8134 134.845368-134.8134c74.334389 0 134.8134 60.475814 134.8134 134.8134s-60.475814 134.8134-134.8134 134.813399z m0-224.86696c-49.676676 0-90.088727 40.399263-90.088726 90.056758s40.415248 90.056758 90.088726 90.056757c49.657494 0 90.056758-40.399263 90.056758-90.056757s-40.399263-90.056758-90.056758-90.056758z"
                                                                                          fill="#4F46A3"></path>
                                                                                      <path
                                                                                          d="M468.93452 730.537092a22.378321 22.378321 0 0 1-22.378321-22.378321c0-80.120783-65.181655-145.299241-145.299242-145.299241s-145.299241 65.181655-145.299241 145.299241a22.378321 22.378321 0 1 1-44.756642 0c0-104.797677 85.258206-190.055883 190.055883-190.055883s190.055883 85.258206 190.055884 190.055883c0 12.362424-10.015897 22.378321-22.378321 22.378321zM889.359233 397.231182h-319.6903a22.378321 22.378321 0 1 1 0-44.756642h319.6903a22.378321 22.378321 0 1 1 0 44.756642zM889.359233 534.698011h-319.6903a22.378321 22.378321 0 1 1 0-44.756642h319.6903a22.378321 22.378321 0 1 1 0 44.756642zM889.359233 672.16484h-319.6903a22.378321 22.378321 0 1 1 0-44.756642h319.6903a22.378321 22.378321 0 1 1 0 44.756642z"
                                                                                          fill="#4F46A3"></path>
                                                                                  </g>
                                                                              </svg></span>ID</label>
                                                                      <h5>{{ $item->id }}</h5>
                                                                  </div>
                                                                  <div class="border border-dark p-1 text-center">
                                                                      <label for=""><span><svg width="40px"
                                                                                  height="40px" viewBox="0 0 1024 1024"
                                                                                  class="icon" version="1.1"
                                                                                  xmlns="http://www.w3.org/2000/svg"
                                                                                  fill="#000000">
                                                                                  <g id="SVGRepo_bgCarrier"
                                                                                      stroke-width="0"></g>
                                                                                  <g id="SVGRepo_tracerCarrier"
                                                                                      stroke-linecap="round"
                                                                                      stroke-linejoin="round"></g>
                                                                                  <g id="SVGRepo_iconCarrier">
                                                                                      <path
                                                                                          d="M913.871918 369.867311c-6.433071-6.433071-14.863743-9.649095-23.289295-9.649095h-230.077272l51.34273-67.684964a24.706353 24.706353 0 0 0 2.444014-25.927848c-4.180524-8.429648-12.738157-13.706753-22.133329-13.706753h-72.31702V120.10482c0-13.641224-11.065129-24.706353-24.706353-24.706353H429.657094c-13.641224 0-24.706353 11.065129-24.706352 24.706353v132.793831h-73.605069a24.657206 24.657206 0 0 0-22.133329 13.706753 24.714544 24.714544 0 0 0 2.447086 25.927848l51.277201 67.684964H132.924888c-8.429648 0-16.856224 3.215-23.293391 9.649095-6.433071 6.433071-9.649095 14.863743-9.649095 23.292367v498.113043c0 8.426576 3.215 16.856224 9.649095 23.289296a32.849313 32.849313 0 0 0 23.293391 9.652167h757.656711c8.426576 0 16.856224-3.218072 23.289295-9.652167a32.840098 32.840098 0 0 0 9.652167-23.289296V393.159678a32.834978 32.834978 0 0 0-9.651143-23.292367z"
                                                                                          fill="#27323A"></path>
                                                                                      <path
                                                                                          d="M429.657094 302.310333c13.641224 0 24.706353-11.065129 24.706353-24.706353V144.810149H570.430064v132.793831c0 13.641224 11.0682 24.706353 24.706353 24.706353h47.291215c-36.351001 47.805206-105.258483 138.717008-130.672341 172.23799-25.414882-33.520982-94.387893-124.367255-130.67234-172.23799h48.574143z"
                                                                                          fill="#FFFFFF"></path>
                                                                                      <path
                                                                                          d="M400.447694 409.630921l91.617259 120.69765c4.697586 6.1771 11.968196 9.780153 19.689315 9.780153s15.054186-3.604076 19.686243-9.780153l91.554802-120.69765H832.288736L510.209225 687.253332 190.76417 409.630921h209.683524z"
                                                                                          fill="#79CCBF"></path>
                                                                                      <path
                                                                                          d="M149.396132 439.097317l170.047898 147.78556-170.047898 236.059833zM172.942422 874.802502L356.88854 619.439359l120.892189 105.067016c9.395172 8.23511 21.4248 12.738157 33.972515 12.738158 12.481162 0 24.577343-4.503048 33.906986-12.675701l120.958741-105.129473 183.943046 255.363143H172.942422zM874.11138 822.94271L704.063481 586.882877l170.047899-147.78556z"
                                                                                          fill="#F4CE73"></path>
                                                                                  </g>
                                                                              </svg></span>Email</label>
                                                                      <h5>{{ $item->email }}</h5>
                                                                  </div>
                                                                  <div class="border border-dark p-1 text-center">
                                                                      <label for=""><span><svg width="40px"
                                                                                  height="40px" viewBox="0 0 512 512"
                                                                                  version="1.1"
                                                                                  xmlns="http://www.w3.org/2000/svg"
                                                                                  xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                  fill="#000000">
                                                                                  <g id="SVGRepo_bgCarrier"
                                                                                      stroke-width="0"></g>
                                                                                  <g id="SVGRepo_tracerCarrier"
                                                                                      stroke-linecap="round"
                                                                                      stroke-linejoin="round"></g>
                                                                                  <g id="SVGRepo_iconCarrier">
                                                                                      <title>product-management</title>
                                                                                      <g id="Page-1" stroke="none"
                                                                                          stroke-width="1"
                                                                                          fill="none"
                                                                                          fill-rule="evenodd">
                                                                                          <g id="icon"
                                                                                              fill="#000000"
                                                                                              transform="translate(42.666667, 34.346667)">
                                                                                              <path
                                                                                                  d="M426.247658,366.986259 C426.477599,368.072636 426.613335,369.17172 426.653805,370.281095 L426.666667,370.986667 L426.666667,392.32 C426.666667,415.884149 383.686003,434.986667 330.666667,434.986667 C278.177524,434.986667 235.527284,416.264289 234.679528,393.025571 L234.666667,392.32 L234.666667,370.986667 L234.679528,370.281095 C234.719905,369.174279 234.855108,368.077708 235.081684,366.992917 C240.961696,371.41162 248.119437,375.487081 256.413327,378.976167 C275.772109,387.120048 301.875889,392.32 330.666667,392.32 C360.599038,392.32 387.623237,386.691188 407.213205,377.984536 C414.535528,374.73017 420.909655,371.002541 426.247658,366.986259 Z M192,7.10542736e-15 L384,106.666667 L384.001134,185.388691 C368.274441,181.351277 350.081492,178.986667 330.666667,178.986667 C301.427978,178.986667 274.9627,184.361969 255.43909,193.039129 C228.705759,204.92061 215.096345,223.091357 213.375754,241.480019 L213.327253,242.037312 L213.449,414.75 L192,426.666667 L-2.13162821e-14,320 L-2.13162821e-14,106.666667 L192,7.10542736e-15 Z M426.247658,302.986259 C426.477599,304.072636 426.613335,305.17172 426.653805,306.281095 L426.666667,306.986667 L426.666667,328.32 C426.666667,351.884149 383.686003,370.986667 330.666667,370.986667 C278.177524,370.986667 235.527284,352.264289 234.679528,329.025571 L234.666667,328.32 L234.666667,306.986667 L234.679528,306.281095 C234.719905,305.174279 234.855108,304.077708 235.081684,302.992917 C240.961696,307.41162 248.119437,311.487081 256.413327,314.976167 C275.772109,323.120048 301.875889,328.32 330.666667,328.32 C360.599038,328.32 387.623237,322.691188 407.213205,313.984536 C414.535528,310.73017 420.909655,307.002541 426.247658,302.986259 Z M127.999,199.108 L128,343.706 L170.666667,367.410315 L170.666667,222.811016 L127.999,199.108 Z M42.6666667,151.701991 L42.6666667,296.296296 L85.333,320.001 L85.333,175.405 L42.6666667,151.701991 Z M330.666667,200.32 C383.155809,200.32 425.80605,219.042377 426.653805,242.281095 L426.666667,242.986667 L426.666667,264.32 C426.666667,287.884149 383.686003,306.986667 330.666667,306.986667 C278.177524,306.986667 235.527284,288.264289 234.679528,265.025571 L234.666667,264.32 L234.666667,242.986667 L234.808715,240.645666 C237.543198,218.170241 279.414642,200.32 330.666667,200.32 Z M275.991,94.069 L150.412,164.155 L192,187.259259 L317.866667,117.333333 L275.991,94.069 Z M192,47.4074074 L66.1333333,117.333333 L107.795,140.479 L233.373,70.393 L192,47.4074074 Z"
                                                                                                  id="Combined-Shape">
                                                                                              </path>
                                                                                          </g>
                                                                                      </g>
                                                                                  </g>
                                                                              </svg></span>Product Name</label>
                                                                      <h5>{{ $item->product_name }}</h5>
                                                                  </div>
                                                                  <div class="border border-dark p-1 text-center">
                                                                      <label for="">
                                                                          <span><svg fill="#000000" width="40px"
                                                                                  height="40px" viewBox="0 0 64 64"
                                                                                  version="1.1" xml:space="preserve"
                                                                                  xmlns="http://www.w3.org/2000/svg"
                                                                                  xmlns:xlink="http://www.w3.org/1999/xlink">
                                                                                  <g id="SVGRepo_bgCarrier"
                                                                                      stroke-width="0"></g>
                                                                                  <g id="SVGRepo_tracerCarrier"
                                                                                      stroke-linecap="round"
                                                                                      stroke-linejoin="round"></g>
                                                                                  <g id="SVGRepo_iconCarrier">
                                                                                      <g id="_x32_5_attachment"></g>
                                                                                      <g id="_x32_4_office"></g>
                                                                                      <g id="_x32_3_pin"></g>
                                                                                      <g id="_x32_2_business_card"></g>
                                                                                      <g id="_x32_1_form"></g>
                                                                                      <g id="_x32_0_headset"></g>
                                                                                      <g id="_x31_9_video_call"></g>
                                                                                      <g id="_x31_8_letter_box"></g>
                                                                                      <g id="_x31_7_papperplane"></g>
                                                                                      <g id="_x31_6_laptop"></g>
                                                                                      <g id="_x31_5_connection"></g>
                                                                                      <g id="_x31_4_phonebook"></g>
                                                                                      <g id="_x31_3_classic_telephone">
                                                                                      </g>
                                                                                      <g id="_x31_2_sending_mail"></g>
                                                                                      <g id="_x31_1_man_talking"></g>
                                                                                      <g id="_x31_0_date"></g>
                                                                                      <g id="_x30_9_review"></g>
                                                                                      <g id="_x30_8_email"></g>
                                                                                      <g id="_x30_7_information"></g>
                                                                                      <g id="_x30_6_phone_talking">
                                                                                          <g>
                                                                                              <g>
                                                                                                  <path
                                                                                                      d="M37.063,18.062h-0.0596c-0.5522,0-0.9702,0.4478-0.9702,1s0.4775,1,1.0298,1s1-0.4478,1-1S37.6152,18.062,37.063,18.062z ">
                                                                                                  </path>
                                                                                                  <path
                                                                                                      d="M45.1787,18.062H45.123c-0.5522,0-0.9722,0.4478-0.9722,1s0.4756,1,1.0278,1s1-0.4478,1-1S45.731,18.062,45.1787,18.062z ">
                                                                                                  </path>
                                                                                                  <path
                                                                                                      d="M53.2983,18.062h-0.0596c-0.5522,0-0.9702,0.4478-0.9702,1s0.4775,1,1.0298,1s1-0.4478,1-1 S53.8506,18.062,53.2983,18.062z">
                                                                                                  </path>
                                                                                                  <path
                                                                                                      d="M45.1953,45.9268c-5.1489-2.9038-6.6909-2.6665-10.6172-0.4468c-2.0146,1.3389-4.4404,0.5225-8.6563-2.9111 c-0.8276-0.6743-1.6592-1.4263-2.4688-2.2319c-0.8091-0.8125-1.5605-1.644-2.2344-2.4722 c-3.1782-3.8999-4.0435-7.459-3.0112-8.5317c3.042-3.271,2.3516-5.957-0.3335-10.7173c-1.6172-3.0591-3.3931-6.104-5.7568-6.8027 c-1.7139-0.5034-4.2588,0.8154-5.0166,1.3184c-1.9492,1.2983-3.8003,3.5947-4.8311,5.9937 c-1.896,4.4136-1.3931,9.7329-0.29,13.2397c1.812,5.749,6.1611,12.4063,11.6348,17.8086 c5.4043,5.4761,12.0615,9.8242,17.8081,11.6313c1.8154,0.5728,4.1167,0.9844,6.5283,0.9844c2.2437,0,4.583-0.3564,6.7124-1.271 c2.3989-1.0327,4.6938-2.8838,5.9888-4.8306c0.5039-0.7554,1.8276-3.2998,1.3184-5.021 C51.2754,49.3071,48.2305,47.5308,45.1953,45.9268z M44.2368,47.6821c1.8521,0.979,5.2998,2.8018,5.8149,4.5513 c0.1056,0.3564-0.0228,1.0059-0.2598,1.681l-13.5292-7.089C38.8073,45.4165,39.8377,45.2009,44.2368,47.6821z M11.5513,13.7314 c1.7524,0.5181,3.5752,3.9663,4.5674,5.8428c2.6213,4.647,2.613,6.1134,0.9274,8.0579L9.748,14.0356 c0.556-0.2056,1.1049-0.3412,1.499-0.3412C11.3633,13.6943,11.4658,13.7061,11.5513,13.7314z M43.873,59.6807 c-3.9175,1.6836-8.8311,1.1694-11.8501,0.2163c-5.4517-1.7144-11.8032-5.8765-16.9897-11.1328 c-0.0034-0.0034-0.0063-0.0063-0.0098-0.0098C9.7695,43.5698,5.606,37.2178,3.8872,31.7642 c-0.9497-3.0195-1.4619-7.9346,0.2202-11.8501c0.8441-1.9645,2.3123-3.8291,3.8699-4.948l7.923,14.7618 c-0.4362,2.3732,0.9189,5.9038,3.7676,9.4001c0.7153,0.8789,1.5122,1.7607,2.3711,2.623 c0.8594,0.856,1.7407,1.6528,2.6196,2.3687c3.0879,2.5153,6.3303,4.6262,9.3667,3.7915l14.8708,7.792 C47.7888,57.3002,45.8823,58.816,43.873,59.6807z">
                                                                                                  </path>
                                                                                                  <path
                                                                                                      d="M60.9551,10.771C56.3843,2.0591,45.5757-1.3105,36.8604,3.2568l-0.0005,0.0005 c-8.7119,4.5723-12.0825,15.3813-7.5137,24.0952c0.3311,0.6313,0.709,1.2549,1.1274,1.8613l-2.7012,4.6299 c-0.1885,0.3228-0.1812,0.7241,0.0195,1.0396c0.1997,0.3159,0.5596,0.4912,0.9321,0.4604l7.75-0.6851 c2.7095,1.5068,5.6899,2.2627,8.6748,2.2627c2.8374,0,5.6787-0.6836,8.293-2.0552 C62.1543,30.2944,65.5249,19.4854,60.9551,10.771z M52.5127,33.0952c-4.8472,2.543-10.5723,2.4214-15.3154-0.3252 c-0.1523-0.0884-0.3257-0.1348-0.501-0.1348c-0.0293,0-0.0586,0.0015-0.0879,0.0039l-6.1338,0.542l2.0532-3.519 c0.2017-0.3462,0.1777-0.7793-0.0615-1.1006c-0.5132-0.6899-0.9668-1.4092-1.3486-2.1377 c-4.0571-7.7373-1.0645-17.3354,6.6719-21.396l-0.0005,0.0005c7.7378-4.0581,17.3354-1.0635,21.395,6.6719 C63.2417,19.438,60.2485,29.0356,52.5127,33.0952z">
                                                                                                  </path>
                                                                                              </g>
                                                                                          </g>
                                                                                      </g>
                                                                                      <g id="_x30_5_women_talking"></g>
                                                                                      <g id="_x30_4_calling"></g>
                                                                                      <g id="_x30_3_women"></g>
                                                                                      <g id="_x30_2_writing"></g>
                                                                                      <g id="_x30_1_chatting"></g>
                                                                                  </g>
                                                                              </svg></span>
                                                                          Contact</label>
                                                                      <h5>{{ $item->contact }}</h5>
                                                                  </div>
                                                              </div>
                                                              <div class="col-6">
                                                                  <div class="border border-dark p-1 text-center">
                                                                      <label for=""><span><svg width="40px"
                                                                                  height="40px"
                                                                                  viewBox="0 0 32.000001 32.000001"
                                                                                  xmlns:dc="http://purl.org/dc/elements/1.1/"
                                                                                  xmlns:cc="http://creativecommons.org/ns#"
                                                                                  xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                                                                                  xmlns="http://www.w3.org/2000/svg"
                                                                                  version="1.1" id="svg2"
                                                                                  fill="#000000">
                                                                                  <g id="SVGRepo_bgCarrier"
                                                                                      stroke-width="0"></g>
                                                                                  <g id="SVGRepo_tracerCarrier"
                                                                                      stroke-linecap="round"
                                                                                      stroke-linejoin="round"></g>
                                                                                  <g id="SVGRepo_iconCarrier">
                                                                                      <metadata id="metadata7">
                                                                                          <rdf:rdf>
                                                                                              <cc:work>
                                                                                                  <dc:format>image/svg+xml
                                                                                                  </dc:format>
                                                                                                  <dc:type
                                                                                                      rdf:resource="http://purl.org/dc/dcmitype/StillImage">
                                                                                                  </dc:type>
                                                                                                  <dc:title></dc:title>
                                                                                                  <dc:creator>
                                                                                                      <cc:agent>
                                                                                                          <dc:title>
                                                                                                              Timothée
                                                                                                              Giet
                                                                                                          </dc:title>
                                                                                                      </cc:agent>
                                                                                                  </dc:creator>
                                                                                                  <dc:date>2021</dc:date>
                                                                                                  <dc:description>
                                                                                                  </dc:description>
                                                                                                  <cc:license
                                                                                                      rdf:resource="http://creativecommons.org/licenses/by-sa/4.0/">
                                                                                                  </cc:license>
                                                                                              </cc:work>
                                                                                              <cc:license
                                                                                                  rdf:about="http://creativecommons.org/licenses/by-sa/4.0/">
                                                                                                  <cc:permits
                                                                                                      rdf:resource="http://creativecommons.org/ns#Reproduction">
                                                                                                  </cc:permits>
                                                                                                  <cc:permits
                                                                                                      rdf:resource="http://creativecommons.org/ns#Distribution">
                                                                                                  </cc:permits>
                                                                                                  <cc:requires
                                                                                                      rdf:resource="http://creativecommons.org/ns#Notice">
                                                                                                  </cc:requires>
                                                                                                  <cc:requires
                                                                                                      rdf:resource="http://creativecommons.org/ns#Attribution">
                                                                                                  </cc:requires>
                                                                                                  <cc:permits
                                                                                                      rdf:resource="http://creativecommons.org/ns#DerivativeWorks">
                                                                                                  </cc:permits>
                                                                                                  <cc:requires
                                                                                                      rdf:resource="http://creativecommons.org/ns#ShareAlike">
                                                                                                  </cc:requires>
                                                                                              </cc:license>
                                                                                          </rdf:rdf>
                                                                                      </metadata>
                                                                                      <circle r="7.5"
                                                                                          cy="9.5" cx="16"
                                                                                          id="path839"
                                                                                          style="opacity:1;vector-effect:none;fill:#373737;fill-opacity:1;stroke:none;stroke-width:2;stroke-linecap:butt;stroke-linejoin:bevel;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:3.20000005;stroke-opacity:1">
                                                                                      </circle>
                                                                                      <path id="rect841"
                                                                                          d="M16 19c6.648 0 12 2.899 12 6.5V32H4v-6.5C4 21.899 9.352 19 16 19z"
                                                                                          style="opacity:1;vector-effect:none;fill:#373737;fill-opacity:1;stroke:none;stroke-width:2;stroke-linecap:butt;stroke-linejoin:bevel;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:3.20000005;stroke-opacity:1">
                                                                                      </path>
                                                                                  </g>
                                                                              </svg></span>Owner Name</label>
                                                                      <h5>{{ $item->owner_name }}</h5>
                                                                  </div>
                                                                  <div class="border border-dark p-1 text-center">
                                                                      <label for=""><span><svg width="50px"
                                                                                  height="50px" viewBox="0 0 64 64"
                                                                                  fill="none"
                                                                                  xmlns="http://www.w3.org/2000/svg">
                                                                                  <g id="SVGRepo_bgCarrier"
                                                                                      stroke-width="0"></g>
                                                                                  <g id="SVGRepo_tracerCarrier"
                                                                                      stroke-linecap="round"
                                                                                      stroke-linejoin="round"></g>
                                                                                  <g id="SVGRepo_iconCarrier">
                                                                                      <path fill-rule="evenodd"
                                                                                          clip-rule="evenodd"
                                                                                          d="M24.2156 20.184L28.029 20.8593L31.4912 19.0336L34.552 21.4095H38.4406L40.0463 24.9358L43.4833 26.7115L43.2576 30.588L45.4653 33.7642L43.4332 37.0904L43.9098 40.9419L40.548 42.9427L39.1682 46.5941L35.2795 46.8692L32.3442 49.4701L28.8068 47.8945L25.0184 48.8699L22.61 45.8438L18.8216 44.9434L18.1192 41.117L15.2089 38.566L16.363 34.8396L14.9832 31.2132L17.7429 28.4622L18.2195 24.6107L21.9326 23.4102L24.2156 20.184Z"
                                                                                          fill="#2A2941"></path>
                                                                                      <path fill-rule="evenodd"
                                                                                          clip-rule="evenodd"
                                                                                          d="M26.1976 24.9858C27.4269 24.5107 28.7064 24.2856 30.011 24.3106C31.3156 24.3356 32.5951 24.6357 33.7993 25.1609C35.0036 25.6861 36.0573 26.4614 36.9604 27.4118C37.8636 28.3621 38.5661 29.4876 39.0177 30.688C40.0965 33.0889 40.1717 35.84 39.2435 38.3159C38.3152 40.7919 36.4336 42.7926 34.0502 43.893C32.8209 44.3682 31.5414 44.5933 30.2368 44.5683C28.9322 44.5433 27.6527 44.2432 26.4485 43.718C25.2442 43.1928 24.1905 42.4175 23.2874 41.4921C22.3842 40.5418 21.6817 39.4413 21.2301 38.2159C20.1513 35.815 20.0761 33.0639 21.0043 30.588C21.9075 28.112 23.7891 26.0863 26.1976 24.9858Z"
                                                                                          fill="#2A2941"></path>
                                                                                      <path fill-rule="evenodd"
                                                                                          clip-rule="evenodd"
                                                                                          d="M44.2862 25.8112L14.0549 38.566L16.7142 44.9684L46.9706 32.2136L44.2862 25.8112Z"
                                                                                          fill="#2A2941"></path>
                                                                                      <path
                                                                                          d="M20.051 42.3174L18.7966 42.8427C18.7213 42.8927 18.646 42.8927 18.5708 42.9177C18.4955 42.9177 18.4202 42.9177 18.345 42.8677C18.2697 42.8426 18.2195 42.7926 18.1694 42.7176C18.1192 42.6426 18.0941 42.5926 18.069 42.5175L16.6892 39.2663C16.639 39.1162 16.639 38.9662 16.6892 38.8161C16.7142 38.7411 16.7644 38.6911 16.8397 38.6411C16.8899 38.591 16.9651 38.566 17.0404 38.541L18.4202 37.9658C18.5959 37.8908 18.7715 37.8157 18.9471 37.7907C19.0976 37.7657 19.2481 37.7657 19.3987 37.7907C19.5241 37.8157 19.6496 37.8658 19.7499 37.9158C19.8503 37.9658 19.9757 38.0658 20.051 38.1409C20.1513 38.2409 20.2015 38.3659 20.2517 38.491C20.352 38.6911 20.3771 38.9162 20.3269 39.1412C20.2768 39.3663 20.1764 39.5664 20.0259 39.7165C20.2768 39.6664 20.5527 39.7165 20.7785 39.8415C21.0043 39.9666 21.1799 40.1666 21.2803 40.4167C21.3806 40.6418 21.4308 40.8919 21.3806 41.142C21.3556 41.3671 21.2301 41.5922 21.0796 41.7672C20.9541 41.8923 20.8287 41.9923 20.7033 42.0674L20.051 42.3174ZM19.198 40.4167L18.3199 40.7919L18.8467 42.0674L19.7499 41.6922C20.3269 41.4671 20.5026 41.117 20.352 40.6918C20.3269 40.5918 20.2768 40.5168 20.2015 40.4417C20.1262 40.3667 20.0259 40.3167 19.9255 40.3167C19.6746 40.2667 19.4238 40.3167 19.198 40.4167ZM17.6174 39.0412L18.069 40.1666L18.8467 39.8415C19.0224 39.7915 19.1729 39.6915 19.2983 39.5914C19.3987 39.4914 19.4489 39.3663 19.4739 39.2413C19.499 39.1412 19.499 39.0412 19.4739 38.9412C19.4489 38.8411 19.3987 38.7661 19.3234 38.7161C19.2481 38.6661 19.1729 38.616 19.0725 38.616C18.8216 38.6411 18.5708 38.6911 18.345 38.8161L17.6174 39.0412Z"
                                                                                          fill="#2A2941"></path>
                                                                                      <path
                                                                                          d="M24.2658 38.366L23.9647 38.491L24.5418 39.8666C24.5919 40.0166 24.5919 40.1667 24.5418 40.3167C24.5167 40.3668 24.4916 40.4418 24.4414 40.4668C24.3912 40.5168 24.341 40.5418 24.2909 40.5668C24.2407 40.5918 24.1654 40.6169 24.1153 40.6169C24.0651 40.6169 23.9898 40.5918 23.9396 40.5668C23.8142 40.4918 23.7138 40.3668 23.6637 40.2167L22.2838 36.8904C22.2336 36.7404 22.2336 36.5903 22.2838 36.4403C22.3089 36.3652 22.3591 36.3152 22.4343 36.2652C22.4845 36.2152 22.5598 36.1902 22.6351 36.1652L24.0149 35.5899C24.1654 35.5149 24.341 35.4649 24.4916 35.4149C24.617 35.3899 24.7675 35.3899 24.9181 35.4149C25.0686 35.4149 25.2191 35.4649 25.3697 35.5149C25.5202 35.5899 25.6456 35.69 25.746 35.79C25.8463 35.9151 25.9467 36.0651 25.9969 36.2152C26.0972 36.4903 26.0972 36.8154 25.9969 37.0905C25.8714 37.3906 25.6456 37.6657 25.3697 37.8408C25.5704 37.8658 25.7711 37.9408 25.9467 38.0409C26.1474 38.1409 26.3481 38.266 26.5237 38.391C26.6993 38.491 26.8499 38.6411 26.9753 38.7661C27.0506 38.8412 27.1258 38.9412 27.2011 39.0162C27.2262 39.0913 27.2262 39.1413 27.2011 39.2163C27.2011 39.2914 27.1509 39.3414 27.1258 39.4164C27.0757 39.4914 27.0004 39.5414 26.9251 39.5665C26.8499 39.5915 26.7495 39.5915 26.6743 39.5665C26.599 39.5414 26.4986 39.5164 26.4485 39.4664C26.3481 39.3914 26.2227 39.3164 26.1223 39.2413L25.5453 38.7912C25.3697 38.6661 25.194 38.5411 25.0184 38.441C24.893 38.366 24.7675 38.341 24.6421 38.341C24.4916 38.341 24.3661 38.391 24.2407 38.441L24.2658 38.366ZM23.9898 36.3652L23.2121 36.6904L23.7138 37.8908L24.4665 37.5657C24.6421 37.4907 24.7926 37.4156 24.9432 37.2906C25.0686 37.2156 25.1439 37.0905 25.194 36.9655C25.2442 36.8404 25.2442 36.6904 25.194 36.5403C25.1439 36.4403 25.0686 36.3402 24.9683 36.2652C24.8679 36.1902 24.7425 36.1652 24.6421 36.1652C24.4163 36.1902 24.1654 36.2402 23.9647 36.3402H23.9898V36.3652Z"
                                                                                          fill="#2A2941"></path>
                                                                                      <path
                                                                                          d="M31.9679 36.7153L31.5414 36.2651L29.8605 36.9904V37.6156C29.8856 37.7907 29.8856 37.9658 29.8605 38.1409C29.8354 38.1909 29.8103 38.2409 29.7852 38.2659C29.735 38.3159 29.71 38.3409 29.6598 38.3409C29.6096 38.3659 29.5594 38.3659 29.4842 38.3659C29.434 38.3659 29.3587 38.3659 29.3085 38.3409C29.2584 38.3159 29.2082 38.2909 29.158 38.2659C29.1078 38.2159 29.0827 38.1909 29.0577 38.1409C29.0326 38.0658 29.0326 38.0158 29.0577 37.9408C29.0577 37.8657 29.0577 37.7657 29.0577 37.6407L28.9573 34.3894C28.9573 34.2894 28.9573 34.1893 28.9573 34.0393C28.9573 33.9393 28.9573 33.8142 28.9573 33.7142C28.9824 33.6141 29.0075 33.5391 29.0827 33.4641C29.1329 33.364 29.2333 33.314 29.3336 33.264C29.434 33.239 29.5594 33.239 29.6598 33.264C29.7601 33.264 29.8354 33.314 29.9107 33.364L30.1365 33.5391L30.3873 33.8392L32.6202 36.1651C32.7456 36.2901 32.846 36.4152 32.9463 36.5903C32.9714 36.6403 32.9714 36.6903 32.9714 36.7403C32.9714 36.7903 32.9714 36.8404 32.9463 36.8904C32.9212 36.9404 32.8962 36.9904 32.846 37.0404C32.7958 37.0905 32.7456 37.1155 32.6954 37.1405H32.4947C32.4446 37.1655 32.3944 37.1655 32.3442 37.1405C32.2689 37.0905 32.2188 37.0404 32.1435 36.9904L31.9679 36.7153ZM29.8103 36.2151L31.0647 35.6899L29.6849 34.1643L29.8103 36.2151Z"
                                                                                          fill="#2A2941"></path>
                                                                                      <path
                                                                                          d="M34.6021 31.6383L37.2866 33.489L36.2329 30.9381C36.1827 30.788 36.1827 30.6379 36.2329 30.5129C36.258 30.4629 36.2831 30.4129 36.3081 30.3628C36.3583 30.3128 36.3834 30.2878 36.4587 30.2628C36.5089 30.2378 36.5841 30.2378 36.6343 30.2378C36.6845 30.2378 36.7597 30.2378 36.8099 30.2628C36.9354 30.3378 37.0106 30.4629 37.0608 30.5879L38.4406 33.9892C38.5912 34.3644 38.5159 34.6145 38.2148 34.7395H37.9891C37.9138 34.7645 37.8385 34.7645 37.7883 34.7395L37.5626 34.6395L37.3368 34.4894L34.7025 32.6387L35.7562 35.1647C35.8064 35.2897 35.8064 35.4398 35.7562 35.5898C35.7311 35.6398 35.706 35.6899 35.6559 35.7399C35.6057 35.7899 35.5555 35.8149 35.5053 35.8399C35.4551 35.8649 35.3799 35.8649 35.3297 35.8649C35.2795 35.8649 35.2043 35.8399 35.1541 35.8149C35.0286 35.7399 34.9534 35.6148 34.9032 35.4898L33.5234 32.1635C33.4732 32.0385 33.4481 31.9384 33.4481 31.8134C33.4481 31.7134 33.4732 31.6133 33.5234 31.5133C33.5735 31.4132 33.6488 31.3632 33.7492 31.3132C33.8244 31.2882 33.8997 31.2882 33.9499 31.3132C34 31.2882 34.0753 31.2882 34.1255 31.3132C34.2007 31.3382 34.2509 31.3882 34.3262 31.4132L34.6021 31.6383Z"
                                                                                          fill="#2A2941"></path>
                                                                                      <path
                                                                                          d="M39.6951 28.9623L40.7738 28.5122C41.0247 28.4121 41.2756 28.3371 41.5265 28.2871C41.7523 28.2621 42.0032 28.2871 42.229 28.3621C42.5551 28.4872 42.8311 28.6872 43.082 28.9623C43.3328 29.2375 43.5085 29.5126 43.6088 29.8627C43.7092 30.0878 43.7844 30.3379 43.8346 30.588C43.8597 30.8131 43.8597 31.0381 43.8346 31.2382C43.8095 31.4633 43.7593 31.6634 43.6841 31.8634C43.6088 32.0135 43.5335 32.1386 43.4332 32.2636C43.3328 32.3886 43.2074 32.4887 43.0569 32.5887L42.5551 32.8388L41.4763 33.314C41.3509 33.364 41.2254 33.389 41.1 33.389C40.9996 33.364 40.9244 33.314 40.8742 33.239C40.7989 33.1389 40.7488 33.0389 40.6986 32.9138L39.3187 29.7376C39.2686 29.5876 39.2686 29.4375 39.3187 29.2875C39.3689 29.2124 39.4191 29.1374 39.4943 29.0874C39.5445 29.0124 39.6198 28.9623 39.6951 28.9623ZM40.3223 29.5126L41.5265 32.4387L42.1537 32.1636L42.4798 32.0135L42.7056 31.8634C42.7809 31.7884 42.8311 31.7134 42.8813 31.6384C42.9565 31.4133 43.0067 31.1382 42.9816 30.8881C42.9565 30.638 42.8813 30.3879 42.7809 30.1628C42.6555 29.8377 42.4548 29.5126 42.2039 29.2875C42.0283 29.1374 41.8025 29.0624 41.5767 29.0874C41.3258 29.1124 41.1 29.1874 40.8742 29.2875L40.3223 29.5126Z"
                                                                                          fill="#2A2941"></path>
                                                                                      <path fill-rule="evenodd"
                                                                                          clip-rule="evenodd"
                                                                                          d="M26.2979 17.1329L29.9859 17.7581L33.3226 16.0074L36.283 18.2833H40.0463L41.6017 21.6596L44.9385 23.3602L44.7127 27.0616L46.8452 30.1128L44.8883 33.314L45.3399 36.9904L42.1035 38.9412L40.7236 42.4425L36.9604 42.6926L34.2007 45.1935L30.7887 43.718L27.1258 44.6433L24.8177 41.7172L21.1549 40.8669L20.4775 37.2155L17.7178 34.7896L18.8467 31.2132L17.4669 27.7369L20.1262 25.0859L20.6029 21.3845L24.1905 20.2341L26.2979 17.1329Z"
                                                                                          fill="#FEC34E"></path>
                                                                                      <path fill-rule="evenodd"
                                                                                          clip-rule="evenodd"
                                                                                          d="M26.5237 15.9324L25.7209 15.7824L23.3626 19.1586L19.3987 20.4091L18.8969 24.5357L15.9114 27.4868L17.3916 31.3133L16.1372 35.1897L19.2482 37.9408L20.0008 41.9673L24.04 42.9177L26.599 46.1189L30.6382 45.0935L34.4265 46.7441L37.5375 43.9931L41.677 43.718L43.1572 39.8665L46.7197 37.7157L46.218 33.6642L48.3756 30.1378L46.0424 26.6615L46.2932 22.5349L42.6304 20.6592L40.9244 16.9328H36.7848L33.4732 14.5569L29.8103 16.5076L26.5237 15.9324ZM26.298 17.2079L29.9859 17.8331L33.3226 16.0825L36.2831 18.3583H40.0463L41.6017 21.7346L44.9385 23.4353L44.7127 27.1367L46.8452 30.1878L44.8883 33.389L45.3399 37.0654L42.1035 39.0162L40.7237 42.5175L36.9604 42.7676L34.2007 45.2686L30.7887 43.793L27.1259 44.7184L24.8177 41.7922L21.1549 40.8919L20.4775 37.2405L17.7178 34.8146L18.8468 31.2382L17.4669 27.7619L20.1263 25.1359L20.6029 21.4345L24.1905 20.2841L26.298 17.2079Z"
                                                                                          fill="#2A2941"></path>
                                                                                      <path fill-rule="evenodd"
                                                                                          clip-rule="evenodd"
                                                                                          d="M28.2297 21.7096C30.011 20.8593 31.993 20.5591 33.9498 20.8343C35.9067 21.1094 37.7131 21.9847 39.1682 23.3102C40.6233 24.6357 41.6519 26.3614 42.1035 28.2871C42.5551 30.1878 42.4296 32.2136 41.7272 34.0393C41.0247 35.865 39.7954 37.4656 38.1897 38.591C36.5841 39.7164 34.6523 40.3417 32.6954 40.3917C30.7385 40.4417 28.7817 39.8665 27.1258 38.7911C25.47 37.7157 24.1905 36.1651 23.4128 34.3644C22.3842 32.0385 22.3089 29.4375 23.2121 27.0616C24.1153 24.6857 25.9216 22.76 28.2297 21.7096Z"
                                                                                          fill="white"></path>
                                                                                      <path fill-rule="evenodd"
                                                                                          clip-rule="evenodd"
                                                                                          d="M27.728 20.5341C25.6457 21.2844 23.8142 22.66 22.5347 24.4606C21.2301 26.2613 20.5026 28.4121 20.4273 30.613C20.352 32.8388 20.9542 35.0147 22.1584 36.8904C23.3375 38.7661 25.0686 40.2416 27.1008 41.142C29.1329 42.0423 31.3908 42.2924 33.5735 41.8923C35.7562 41.4921 37.7883 40.4417 39.3689 38.8911C40.9495 37.3405 42.0282 35.3398 42.4798 33.1639C42.9314 30.9881 42.7056 28.7373 41.8526 26.6865C40.7989 24.0105 38.7166 21.8596 36.0823 20.7092C33.3979 19.5588 30.4124 19.4837 27.728 20.5341ZM28.2297 21.7096C30.011 20.8593 31.993 20.5592 33.9498 20.8343C35.9067 21.1094 37.7131 21.9847 39.1682 23.3102C40.6233 24.6357 41.6268 26.3864 42.1035 28.2871C42.5802 30.1878 42.4297 32.2136 41.7272 34.0393C41.0247 35.865 39.7954 37.4656 38.1898 38.591C36.5841 39.7164 34.6523 40.3417 32.6954 40.3917C30.7135 40.4167 28.7817 39.8665 27.1259 38.7911C25.47 37.7157 24.1905 36.1651 23.4128 34.3644C22.3842 32.0385 22.3089 29.4375 23.2121 27.0616C24.1153 24.6857 25.9216 22.785 28.2297 21.7096Z"
                                                                                          fill="#2A2941"></path>
                                                                                      <path fill-rule="evenodd"
                                                                                          clip-rule="evenodd"
                                                                                          d="M45.7413 22.5099L16.4885 34.7145L19.0725 40.8419L48.3003 28.6372L45.7413 22.5099Z"
                                                                                          fill="#A694FE"></path>
                                                                                      <path fill-rule="evenodd"
                                                                                          clip-rule="evenodd"
                                                                                          d="M49.9812 29.3375L46.4187 20.8342L14.8076 34.0142L18.4453 42.5175L49.9812 29.3375ZM45.7413 22.4598L16.4885 34.6645L19.0726 40.7918L48.3003 28.5872L45.7413 22.4598Z"
                                                                                          fill="#2A2941"></path>
                                                                                      <path
                                                                                          d="M22.2838 38.316L21.0545 38.8161C20.9792 38.8412 20.904 38.8662 20.8287 38.8662C20.7535 38.8662 20.6782 38.8412 20.6029 38.8161C20.5026 38.8161 20.4022 38.6411 20.327 38.466L19.0725 35.3898C19.0224 35.2398 19.0224 35.0897 19.0725 34.9397C19.0725 34.8146 19.2231 34.7396 19.3987 34.6396L20.7033 34.1144C20.8789 34.0393 21.0294 33.9893 21.205 33.9393C21.3556 33.9143 21.5061 33.9143 21.6566 33.9393C21.7821 33.9643 21.8824 34.0143 21.9828 34.0643C22.0831 34.1144 22.1835 34.1894 22.2838 34.2894C22.3591 34.3895 22.4344 34.4895 22.4845 34.6145C22.5598 34.8146 22.61 35.0147 22.5598 35.2398C22.5096 35.4399 22.4093 35.6399 22.2587 35.79C22.5096 35.74 22.7605 35.79 22.9863 35.915C23.2121 36.0401 23.3877 36.2402 23.463 36.4653C23.5633 36.6903 23.5884 36.9404 23.5633 37.1655C23.5132 37.3906 23.4128 37.6157 23.2623 37.7657C23.1619 37.8658 23.0365 37.9658 22.886 38.0409C22.6852 38.1409 22.5096 38.2409 22.2838 38.316ZM21.4559 36.4903L20.6029 36.8404L21.1047 38.0409L21.9828 37.6907C22.5096 37.4656 22.7103 37.1405 22.5598 36.7404C22.5347 36.6403 22.4845 36.5653 22.4093 36.4903C22.334 36.4152 22.2587 36.3902 22.1584 36.3652C21.9075 36.3402 21.6817 36.3902 21.4559 36.4903ZM19.9255 35.1147L20.3771 36.1901L21.1298 35.89C21.2803 35.815 21.4308 35.74 21.5814 35.6399C21.6315 35.5899 21.6566 35.5399 21.7068 35.4899C21.7319 35.4399 21.757 35.3648 21.757 35.3148C21.7821 35.2148 21.7821 35.1147 21.757 35.0147C21.6566 34.7896 21.5312 34.6896 21.3807 34.6896C21.1298 34.6896 20.904 34.7646 20.6782 34.8646L19.9255 35.1147Z"
                                                                                          fill="#2A2941"></path>
                                                                                      <path
                                                                                          d="M26.3481 34.5394L26.0722 34.6395L26.6241 36.015C26.6492 36.09 26.6743 36.165 26.6743 36.2401C26.6743 36.3151 26.6492 36.3901 26.6241 36.4652C26.599 36.5152 26.5739 36.5652 26.5237 36.6152C26.4736 36.6652 26.4234 36.6902 26.3732 36.7153C26.323 36.7403 26.2729 36.7653 26.1976 36.7653C26.1474 36.7653 26.0722 36.7403 26.022 36.7153C25.8965 36.6402 25.7962 36.5152 25.746 36.3651L24.3662 33.1889C24.316 33.0389 24.316 32.8888 24.3662 32.7387C24.4414 32.6137 24.5669 32.5137 24.6923 32.4636L26.0722 31.9134C26.2227 31.8384 26.3732 31.7884 26.5488 31.7384C26.6743 31.7134 26.8248 31.7134 26.9502 31.7384C27.1008 31.7384 27.2513 31.7884 27.3767 31.8384C27.5022 31.8884 27.6276 31.9885 27.7531 32.0885C27.8534 32.2135 27.9287 32.3386 28.0039 32.4636C28.1043 32.7387 28.1043 33.0389 28.0039 33.314C27.9287 33.2889 27.8534 33.2639 27.7782 33.2639C27.7029 33.2639 27.6276 33.289 27.5524 33.339C27.4771 33.389 27.4269 33.439 27.4018 33.514C27.3517 33.5891 27.3516 33.6641 27.3516 33.7391C27.3516 33.8142 27.3767 33.8892 27.4018 33.9642C27.452 34.0392 27.5022 34.0893 27.5524 34.1393C27.6025 34.1893 27.7029 34.2143 27.7782 34.2143C27.8534 34.2143 27.9287 34.2143 28.0039 34.1643C28.2046 34.2643 28.3803 34.3894 28.581 34.5144C28.7315 34.6145 28.882 34.7395 29.0075 34.8645C29.0827 34.9396 29.158 35.0146 29.2082 35.1146C29.2333 35.1647 29.2333 35.2397 29.2082 35.2897C29.1831 35.3647 29.158 35.4398 29.1078 35.4898C29.0576 35.5398 29.0075 35.5898 28.9322 35.6148C28.8569 35.6398 28.7566 35.6398 28.6813 35.6148C28.6061 35.5898 28.5308 35.5648 28.4555 35.5148L28.1545 35.2897L27.5774 34.8645C27.4269 34.7395 27.2513 34.6145 27.0757 34.5144C26.9502 34.4644 26.8248 34.4144 26.6994 34.4144C26.5739 34.4144 26.4234 34.4394 26.323 34.4894L26.3481 34.5394ZM26.0972 32.5887L25.3446 32.9138L25.8213 34.0642L26.5488 33.7391C26.7244 33.6891 26.875 33.5891 27.0255 33.489C27.1259 33.414 27.2011 33.314 27.2513 33.1889C27.3015 33.0639 27.3015 32.9138 27.2513 32.7888C27.2011 32.6887 27.1509 32.5887 27.0506 32.5387C26.9502 32.4886 26.8499 32.4386 26.7244 32.4636C26.4987 32.4636 26.2979 32.5137 26.0972 32.5887Z"
                                                                                          fill="#2A2941"></path>
                                                                                      <path
                                                                                          d="M33.7993 32.9639L33.3728 32.5138L31.7421 33.189V33.8143C31.7672 33.9893 31.7672 34.1394 31.7421 34.3144C31.7421 34.4145 31.6417 34.4895 31.5414 34.5395C31.4912 34.5645 31.441 34.5645 31.3908 34.5645C31.3407 34.5645 31.2905 34.5645 31.2403 34.5395C31.1901 34.5145 31.14 34.4895 31.0898 34.4645C31.0396 34.4395 31.0145 34.3895 30.9894 34.3395C30.9644 34.2644 30.9644 34.2144 30.9894 34.1394C30.9894 34.0393 30.9894 33.9393 30.9894 33.8393L30.8891 30.7381V30.413C30.864 30.3129 30.864 30.1879 30.8891 30.0878C30.9142 29.9878 30.9393 29.9128 30.9894 29.8377C31.0647 29.7627 31.14 29.6877 31.2403 29.6627C31.3407 29.6377 31.441 29.6377 31.5665 29.6627C31.6668 29.6627 31.7421 29.7127 31.8173 29.7627C31.8926 29.8127 31.9679 29.8628 32.0181 29.9378L32.2689 30.1879L34.4265 32.4137C34.552 32.5388 34.6523 32.6638 34.7276 32.8139C34.7527 32.8639 34.7527 32.9139 34.7527 32.9639C34.7527 33.014 34.7527 33.064 34.7276 33.114C34.7025 33.164 34.6774 33.214 34.6272 33.264C34.5771 33.3141 34.5269 33.3391 34.4767 33.3641C34.4265 33.3891 34.3513 33.3891 34.3011 33.3641C34.2509 33.3641 34.2007 33.3641 34.1506 33.3641L33.9749 33.214L33.7993 32.9639ZM31.717 32.4888L32.9212 31.9886L31.5414 30.538L31.717 32.4888Z"
                                                                                          fill="#2A2941"></path>
                                                                                      <path
                                                                                          d="M36.3834 28.087L38.9675 29.8877L37.9389 27.4367C37.8887 27.3117 37.8887 27.1616 37.9389 27.0366C37.964 26.9866 37.9891 26.9365 38.0141 26.8865C38.0643 26.8365 38.0894 26.8115 38.1396 26.7865C38.1898 26.7615 38.2399 26.7615 38.3152 26.7615C38.3654 26.7615 38.4406 26.7615 38.4908 26.7865C38.6163 26.8615 38.6915 26.9866 38.7417 27.1116L40.1215 30.3628C40.2721 30.713 40.1968 30.9631 39.9208 31.0881C39.8456 31.1131 39.7703 31.1131 39.695 31.0881C39.6198 31.1131 39.5445 31.1131 39.4943 31.0881C39.4191 31.0631 39.3438 31.0381 39.2936 30.9881L39.0929 30.838L36.4085 29.0874L37.4371 31.5133C37.4873 31.6383 37.4873 31.7884 37.4371 31.9134C37.412 31.9635 37.3869 32.0135 37.3618 32.0635C37.3117 32.1135 37.2866 32.1385 37.2364 32.1635C37.1862 32.1885 37.1361 32.2135 37.0608 32.2135C37.0106 32.2135 36.9353 32.1885 36.8852 32.1635C36.7597 32.0885 36.6845 31.9885 36.6343 31.8384L35.2293 28.6372C35.1792 28.5371 35.1541 28.4121 35.129 28.3121C35.129 28.212 35.1541 28.112 35.2043 28.037C35.2544 27.9619 35.3548 27.8869 35.4301 27.8369H35.6308C35.6809 27.8119 35.7562 27.8119 35.8064 27.8369C35.8816 27.8619 35.9318 27.9119 36.0071 27.9369L36.3834 28.087Z"
                                                                                          fill="#2A2941"></path>
                                                                                      <path
                                                                                          d="M41.3007 25.5611L42.3544 25.1109C42.6053 25.0109 42.8311 24.9359 43.107 24.8858C43.3328 24.8608 43.5586 24.8858 43.7593 24.9609C44.0855 25.0859 44.3615 25.261 44.6123 25.4861C44.8632 25.7362 45.0388 26.0113 45.1392 26.3364C45.2395 26.5615 45.3148 26.7866 45.365 27.0367C45.3901 27.2367 45.3901 27.4618 45.365 27.6619C45.3399 27.862 45.2897 28.0621 45.2145 28.2371C45.1392 28.3872 45.0639 28.5122 44.9636 28.6123C44.8632 28.7373 44.7378 28.8373 44.6123 28.9124L44.1357 29.1625L43.082 29.6126C42.9816 29.6627 42.8562 29.6877 42.7307 29.6877C42.6805 29.6877 42.6304 29.6627 42.6053 29.6377C42.5551 29.6126 42.53 29.5876 42.5049 29.5376C42.4297 29.4376 42.3795 29.3375 42.3293 29.2375L41.0498 26.1863C40.9996 26.0363 40.9996 25.8862 41.0498 25.7362C41.0749 25.6611 41.1251 25.6111 41.1752 25.5611C41.2254 25.5111 41.3007 25.4861 41.376 25.4611L41.3007 25.5611ZM41.8777 26.1113L43.0569 28.8624L43.659 28.6123L43.9851 28.4622C44.0604 28.4372 44.1357 28.3872 44.2109 28.3121C44.2862 28.2371 44.3364 28.1621 44.3615 28.0871C44.4367 27.862 44.4869 27.6369 44.4618 27.3868C44.4367 27.1367 44.3615 26.9116 44.2611 26.7115C44.1357 26.3864 43.96 26.1113 43.7092 25.8612C43.5335 25.7112 43.3328 25.6611 43.107 25.6611C42.8812 25.6861 42.6555 25.7612 42.4297 25.8362L41.9028 26.0613V26.1113H41.8777Z"
                                                                                          fill="#2A2941"></path>
                                                                                  </g>
                                                                              </svg></span>Brand</label>
                                                                      <h5>{{ $item->brand }}</h5>
                                                                  </div>
                                                                  <div class="border border-dark p-1 text-center">
                                                                      <label for=""><span><svg version="1.1"
                                                                                  id="Icons"
                                                                                  xmlns="http://www.w3.org/2000/svg"
                                                                                  xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                  viewBox="0 0 32 32"
                                                                                  xml:space="preserve" width="40px"
                                                                                  height="40px" fill="#000000">
                                                                                  <g id="SVGRepo_bgCarrier"
                                                                                      stroke-width="0"></g>
                                                                                  <g id="SVGRepo_tracerCarrier"
                                                                                      stroke-linecap="round"
                                                                                      stroke-linejoin="round"></g>
                                                                                  <g id="SVGRepo_iconCarrier">
                                                                                      <style type="text/css">
                                                                                          .st0 {
                                                                                              fill: none;
                                                                                              stroke: #000000;
                                                                                              stroke-width: 2;
                                                                                              stroke-linecap: round;
                                                                                              stroke-linejoin: round;
                                                                                              stroke-miterlimit: 10;
                                                                                          }

                                                                                          .st1 {
                                                                                              fill: none;
                                                                                              stroke: #000000;
                                                                                              stroke-width: 2;
                                                                                              stroke-linecap: round;
                                                                                              stroke-linejoin: round;
                                                                                          }

                                                                                          .st2 {
                                                                                              fill: none;
                                                                                              stroke: #000000;
                                                                                              stroke-width: 2;
                                                                                              stroke-linecap: round;
                                                                                              stroke-linejoin: round;
                                                                                              stroke-dasharray: 6, 6;
                                                                                          }

                                                                                          .st3 {
                                                                                              fill: none;
                                                                                              stroke: #000000;
                                                                                              stroke-width: 2;
                                                                                              stroke-linecap: round;
                                                                                              stroke-linejoin: round;
                                                                                              stroke-dasharray: 4, 4;
                                                                                          }

                                                                                          .st4 {
                                                                                              fill: none;
                                                                                              stroke: #000000;
                                                                                              stroke-width: 2;
                                                                                              stroke-linecap: round;
                                                                                          }

                                                                                          .st5 {
                                                                                              fill: none;
                                                                                              stroke: #000000;
                                                                                              stroke-width: 2;
                                                                                              stroke-linecap: round;
                                                                                              stroke-dasharray: 3.1081, 3.1081;
                                                                                          }

                                                                                          .st6 {
                                                                                              fill: none;
                                                                                              stroke: #000000;
                                                                                              stroke-width: 2;
                                                                                              stroke-linecap: round;
                                                                                              stroke-linejoin: round;
                                                                                              stroke-miterlimit: 10;
                                                                                              stroke-dasharray: 4, 3;
                                                                                          }
                                                                                      </style>
                                                                                      <path class="st0"
                                                                                          d="M16.9,14c-1.8,0-3.3,1.4-3.3,3.1v0.7c0,1.1-0.6,1.9-1.6,2.2l0,0h1.6l3.1,0c1.8,0,3.4-1.4,3.3-3.1 C20,15.3,18.6,14,16.9,14z">
                                                                                      </path>
                                                                                      <path class="st0"
                                                                                          d="M20.3,11.5C18.9,11.2,17.5,11,16,11c-7.2,0-13,4-13,9c0,1,0.2,2,0.7,2.9c1,2,3.6,2.6,5.4,1.3l0,0 c2.4-1.7,5.8,0,5.8,3V29c0.4,0,0.7,0,1.1,0c7.2,0,13-4,13-9c0-2.2-1.1-4.2-2.9-5.7">
                                                                                      </path>
                                                                                      <path class="st0"
                                                                                          d="M17.4,14.1l9.8-8.8c0.4-0.4,1.1-0.4,1.5,0l0,0c0.4,0.4,0.4,1,0,1.4L20,16">
                                                                                      </path>
                                                                                  </g>
                                                                              </svg></span>Color</label>
                                                                      <h5>{{ $item->color }}</h5>
                                                                  </div>
                                                                  <div class="border border-dark p-1 text-center ">
                                                                      <label for="">
                                                                          <img width="50px" height="50px"
                                                                              src="https://www.incometax.gov.in/iec/foportal/sites/default/files/2020-03/icon%208.svg"
                                                                              alt="">
                                                                          Service Code</label>
                                                                      <h5>{{ $item->service_code }}</h5>
                                                                  </div>

                                                              </div>
                                                          </div>
                                                          <div class="text-center border-dark border">
                                                              <label for="">
                                                                  <span><svg version="1.1" id="Layer_1"
                                                                          xmlns="http://www.w3.org/2000/svg"
                                                                          xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                          width="40px" height="40px"
                                                                          viewBox="0 0 256 173"
                                                                          enable-background="new 0 0 256 173"
                                                                          xml:space="preserve" fill="#000000">
                                                                          <g id="SVGRepo_bgCarrier" stroke-width="0">
                                                                          </g>
                                                                          <g id="SVGRepo_tracerCarrier"
                                                                              stroke-linecap="round"
                                                                              stroke-linejoin="round"></g>
                                                                          <g id="SVGRepo_iconCarrier">
                                                                              <path fill="#010101"
                                                                                  d="M128.253,56.864c15.186,0,27.432-12.247,27.432-27.432S143.536,2,128.253,2 c-15.186,0-27.432,12.247-27.432,27.432C100.918,44.716,113.165,56.864,128.253,56.864z M64.571,136.32h-49.28 c-15.969,0-16.851-24.395,0.294-24.395H58.3l24.493-36.054c7.25-9.895,15.48-14.598,27.138-14.598h36.544 c11.659,0,19.888,4.311,27.138,14.598l24.591,36.054h43.01c17.243,0,16.165,24.395,0.588,24.395h-49.28 c-3.919,0-8.622-1.372-11.365-5.584l-18.811-26.844l-0.098,67.209H94.844l-0.098-67.209l-18.811,26.844 C73.192,134.85,68.49,136.32,64.571,136.32z">
                                                                              </path>
                                                                              <path fill="#010101"
                                                                                  d="M22.611,98.149l-0.865-7.96l7.03,1.795l-0.908-7.83l6.814,1.752l-0.908-7.917l8.89,1.795l5.429-5.429 c5.256,1.146,10.988-0.303,15.098-4.413c6.403-6.403,6.424-16.764,0-23.188s-16.742-6.359-23.123,0.022 c-4.067,4.067-5.559,9.755-4.456,14.968L10,87.356l0.303,11.681L22.611,98.149z M55.23,54.758c-1.406-1.406-1.428-3.72,0-5.148 c1.428-1.428,3.72-1.428,5.148,0c1.428,1.428,1.428,3.72,0,5.148C58.929,56.208,56.636,56.164,55.23,54.758z">
                                                                              </path>
                                                                              <path
                                                                                  d="M248.806,59.279v41.534h-45V59.279h5.488v-9.763c0-9.531,7.798-17.33,17.33-17.33c9.531,0,17.33,7.798,17.33,17.33v9.763 L248.806,59.279z M230.09,82.27c1.906-1.213,3.119-3.293,3.119-5.719c0-3.813-3.119-6.932-6.932-6.932s-6.932,3.119-6.932,6.932 c0,2.426,1.213,4.506,3.119,5.719l-1.386,8.145h10.398L230.09,82.27z M237.079,49.517c0-5.719-4.679-10.398-10.398-10.398 c-5.719,0-10.398,4.679-10.398,10.398v9.763h16.926h3.87V49.517z">
                                                                              </path>
                                                                              <g id="shopping_cart"> </g>
                                                                              <g id="cross"> </g>
                                                                              <g id="leaf"> </g>
                                                                          </g>
                                                                      </svg></span>
                                                                  Problem</label>
                                                              <h5>{{ $item->problem }}</h5>
                                                          </div>
                                                      </div>

                                                  </div>
                                              </div>
                                          </div>


                                      </td>
                                
                              </tr>
                          @endforeach

                      </tbody>
                  </table>
              </div>
                <!-- /.card-tools -->
              {{-- <div class="card-body">
                
              </div> --}}
              <!-- /.card-body-->
              {{-- <div class="card-footer bg-transparent">
                <div class="row">
                  <div class="col-4 text-center">
                    <div id="sparkline-1"></div>
                    <div class="text-white">wasik</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <div id="sparkline-2"></div>
                    <div class="text-white">Online</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <div id="sparkline-3"></div>
                    <div class="text-white">Sales</div>
                  </div>
                  <!-- ./col -->
                </div>
                <!-- /.row -->
              </div> --}}
            </div>
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection