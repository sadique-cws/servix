@extends('receptioner.layouts.base')

@section('content')
    <div class="row">
        <div class="col-12 ">
            <div class="card">
                <div class="card-header d-flex flex-column">
                    
                    <h3 class="card-title mb-3">{{ $title }}</h3>
                    <div class="d-flex justify-content-between align-items-center" style="gap:15px">

                        <form action="{{ route('receptioner.request.filterbyinput') }}">
                            <div class="input-group" style="width: 300px;">
                                <input type="text" name="search" value="{{ $search_value }}"  class="form-control float-right w-25"placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>


                    {{-- date and time filter --}}

                    <div class=" d-flex" style="gap:10px">
                        <form action="{{ route('receptioner.request.filterbydate') }}" method="get" class="">
                            <div class="d-flex justify-centent-center" style="gap:10px">
                                <div class="input-group" inline="true">
                                    <div class="input-group-prepend">
                                        <label for="example" class=" input-group-text">from Date</label>
                                    </div>
                                    <input placeholder="Select date" type="date" name="startAt" class="form-control">

                                </div>


                                <div class="input-group" inline="true">
                                    <div class="input-group-prepend">
                                        <label for="example" class="input-group-text">to Date</label>
                                    </div>
                                    <input placeholder="Select date" type="date" name="End" class="form-control">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary">GO</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        {{-- select to filter  --}}
                        <form action="{{ route('receptioner.request.filterbyselect') }}" method="get">
                                <select onchange="this.form.submit();" class="form-control" name='dateFilter'>
                                    <option selected>All</option>
                                    <option {{ $dateFilter == 'today' ? 'selected' : '' }} value="today">Today</option>
                                    <option {{ $dateFilter == 'yesterday' ? 'selected' : '' }} value="yesterday">Yesterday
                                    </option>
                                    <option {{ $dateFilter == 'this_week' ? 'selected' : '' }} value="this_week">Last 7 Day
                                    </option>
                                    <option {{ $dateFilter == 'this_month' ? 'selected' : '' }} value="this_month">This Month
                                    </option>
                                    <option {{ $dateFilter == 'last_month' ? 'selected' : '' }} value="last_month">Last Month
                                    </option>
                                    <option {{ $dateFilter == 'this_year' ? 'selected' : '' }} value="this_year">This Year
                                    </option>
                                    <option {{ $dateFilter == 'last_year' ? 'selected' : '' }} value="last_year">Last Year
                                    </option>

                                </select>
                        </form>
                    </div>
                    </div>
                </div>

                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>S CODE</th>
                                <th>owner_name</th>
                                <th>product_name</th>
                                <th>Contact</th>
                                <th>color</th>
                                <th>brand</th>
                                <th>problem</th>
                                <th>Status</th>
                                <th>Remark</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allRequests as $item)
                                <tr>
                                    <td class="text-uppercase text-success fw-bold">{{ $item->service_code }}</td>
                                    <td>{{ $item->owner_name }}</td>
                                    <td>{{ $item->product_name }}</td>
                                    <td>{{ $item->contact }}</td>
                                    <td>{{ $item->color }}</td>
                                    <td>{{ $item->brand }}</td>
                                    <td>{{ $item->problem }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $item->remark }}</td>
                                    <td class="border border-slate-700 p-1.5  items-center justify-center flex btn-group"
                                        role="group">
                                        <div class="btn-group" role="group"
                                            aria-label="Button group with nested dropdown">


                                            <div class="btn-group" role="group">



                                                <a data-toggle="modal" data-target="#view{{ $item->id }}"
                                                    role="button" class=" btn btn-info btn-group ">View</a>

                                                <a href="{{ route('receptioner.request.edit', $item->id) }}" role="button"
                                                    class=" btn btn-warning btn-group ">Edit</a>



                                            </div>
                                        </div>





                                        <div class="modal fade w-100 " id="view{{ $item->id }}" tabindex="-1" role="dialog"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable " role="document">
                                                <div class="modal-content bg-light w-full h-100">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Profile</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
<<<<<<< HEAD
                                                    <div class="card">
                                                        <div class="card-body">
                                                          <div class="container mb-5 mt-3">
                                                            <div class="row d-flex align-items-baseline">
                                                              <div class="col-xl-9">
                                                                <p style="color: #7e8d9f;font-size: 20px;">Receving No >> ID: <strong class="text-uppercase">{{$item->service_code}} </strong></p>
                                                              </div>
                                                              <div class="col-xl-3 float-end">
                                                                <a class="btn btn-light text-capitalize border-0" data-mdb-ripple-color="dark"><i
                                                                    class="fas fa-print text-primary"></i> Print</a>
                                                                <a class="btn btn-light text-capitalize" data-mdb-ripple-color="dark"><i
                                                                    class="far fa-file-pdf text-danger"></i> Export</a>
                                                              </div>
                                                              <hr>
=======
                                                    <div class="modal-body">

                                                        <div class="d-flex flex-row col-12">
                                                            <div class="col-6">
                                                                <div class="border border-dark p-1 text-center">
                                                                    <label for=""><span><svg width="40px"
                                                                                height="40px" viewBox="0 0 1024.00 1024.00"
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
                                                                                        stroke-width="1" fill="none"
                                                                                        fill-rule="evenodd">
                                                                                        <g id="icon" fill="#000000"
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
                                                                                    <g id="_x31_3_classic_telephone"></g>
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
>>>>>>> ba8a197e6c0b0c2c99d2e3e7dd873260594f82cd
                                                            </div>
                                                      
                                                            <div class="container">
                                                              <div class="col-md-12">
                                                                <div class="text-center">
                                                                  <i class="fab fa-mdb fa-4x ms-0" style="color:#5d9fc5 ;"></i>
                                                                  <p class="pt-0">servixcenter@gmail.com</p>
                                                                </div>
                                                      
                                                              </div>
                                                      
                                                      
                                                              <div class="row">
                                                                <div class="col-xl-8">
                                                                  <ul class="list-unstyled">
                                                                    <li class="text-muted">To: <span style="color:#5d9fc5 ;">{{$item->owner_name}}</span></li>
                                                                    {{-- <li class="text-muted">Street, City</li>
                                                                    <li class="text-muted">State, Country</li> --}}
                                                                    <li class="text-muted"><i class="fas fa-phone"></i>{{$item->contact}}</li>
                                                                    <li class="text-muted"><i class="bi bi-envelope"></i>{{$item->email}}</li>
                                                                  </ul>
                                                                </div>
                                                                <div class="col-xl-4">
                                                                  {{-- <p class="text-muted"></p> --}}
                                                                  <ul class="list-unstyled">
                                                                    {{-- <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                                                        class="fw-bold">ID:</span>#123-456</li> --}}
                                                                    <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                                                        class="fw-bold">Creation Date: </span>{{$item->created_at}}</li>
                                                                    <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i> <span
                                                                        class="me-1 fw-bold">Status:</span><span class="badge bg-warning text-black fw-bold">
                                                                        {{}}</span></li>
                                                                  </ul>
                                                                </div>
                                                              </div>
                                                      
                                                              <div class="row my-2 mx-1 justify-content-center">
                                                                <table class="table table-striped table-borderless">
                                                                  <thead style="background-color:#84B0CA ;" class="text-white">
                                                                    <tr>
                                                                      <th scope="col">S code</th>
                                                                      <th scope="col">brand</th>
                                                                      <th scope="col">Type</th>
                                                                      <th scope="col">S.N</th>
                                                                      <th scope="col">MAC</th>
                                                                      <th scope="col">D. Date</th>
                                                                      
                                                                    </tr>
                                                                  </thead>
                                                                  <tbody>
                                                                     <td class="text-uppercase" ></td>
                                                                     
                                                    
                                                                  </tbody>
                                                      
                                                                </table>
                                                              </div>
                                                              <div class="row">
                                                                <div class="col-xl-8">
                                                                  <p class="ms-3">Add additional notes and payment information</p>
                                                      
                                                                </div>
                                                                <div class="col-xl-3">
                                                                  <ul class="list-unstyled">
                                                                    <li class="text-muted ms-3"><span class="text-black me-4">SubTotal</span>$1110</li>
                                                                    <li class="text-muted ms-3 mt-2"><span class="text-black me-4">Tax(15%)</span>$111</li>
                                                                  </ul>
                                                                  <p class="text-black float-start"><span class="text-black me-3"> Total Amount</span><span
                                                                      style="font-size: 25px;">$1221</span></p>
                                                                </div>
                                                              </div>
                                                              <hr>
                                                              <div class="row">
                                                                <div class="col-xl-10">
                                                                  <p>Thank you for your purchase</p>
                                                                </div>
                                                                <div class="col-xl-2">
                                                                  
                                                                </div>
                                                              </div>
                                                      
                                                            </div>
                                                          </div>
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
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
