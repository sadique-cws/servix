@extends('admin.layout.base')



@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">



                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">{{$title}}</h3>




                        <div class="card-tools">
                            <form action="{{ route('admin.request.filterbyinput') }}">

                                <div class="input-group input-group-sm" style="width: 300px;">

                                    <input type="text" name="search" value="{{$search_value}}"
                                        class="form-control float-right w-25"placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                    {{-- date and time filter --}}

                    <div class=" d-flex justify-content-around mt-3">

                        <form action="{{ route('admin.request.filterbydate') }}" method="get" class="">
                            <div class=" d-flex justify-content-evenly">
                                <div class="md-form md-outline d-flex input-with-post-icon datepicker" inline="true">
                                    <label for="example" class="text-sm ml-4">from Date</label>
                                    <input placeholder="Select date" type="date" name="startAt" class="form-control">

                                </div>


                                <div class="md-form md-outline d-flex input-with-post-icon datepicker" inline="true">
                                    <label for="example" class="text-sm ml-4">to Date</label>
                                    <input placeholder="Select date" type="date" name="End" class="form-control">

                                </div>
                                <div class="">
                                    <button type="submit" class="btn btn-primary ml-4"> go</button>
                                </div>
                            </div>
                        </form>
                        {{-- select to filter  --}}
                        <form action="{{ route('admin.request.filterbyselect') }}" method="get" >
                            <div class="form-control">
                                <select onchange="this.form.submit();" class="form-select" name='dateFilter'>
                                    <option selected>All</option>
                                    <option {{$dateFilter=="today"? 'selected' : ''}} value="today">Today</option>
                                    <option {{$dateFilter=="yesterday"? 'selected' : ''}} value="yesterday">Yesterday</option>
                                    <option {{$dateFilter=="this_week"? 'selected' : ''}} value="this_week">Last 7 Day</option>
                                    <option {{$dateFilter=="this_month"? 'selected' : ''}} value="this_month">This Month</option>
                                    <option {{$dateFilter=="last_month"? 'selected' : ''}} value="last_month">Last Month</option>
                                    <option {{$dateFilter=="this_year"? 'selected' : ''}} value="this_year">This Year</option>
                                    <option {{$dateFilter=="last_year"? 'selected' : ''}} value="last_year">Last Year</option>
                                    
                                </select>
                            </div>
                        </form>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>


                                    <th>Service code</th>
                                    <th>Owner name</th>
                                    <th>Product name</th>
                                    <th>Contact</th>
                                    <th>Type</th>
                                    <th>Problem</th>
                                    <th>Create_At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($new as $item)
                                    <tr>
                                        <td class="text-uppercase">{{ $item->service_code }}</td>
                                        <td>{{ $item->owner_name }}</td>
                                        <td>{{ $item->product_name }}</td>
                                        <td class="border border-slate-700 p-1.5 pl-10">{{ $item->contact }}</td>
                                        <td class="border border-slate-700 p-1.5 pl-10">{{ $item->type->typename }}</td>
                                        <td class="border border-slate-700 p-1.5 pl-10">{{ $item->problem }}</td>
                                        <td class="border border-slate-700 p-1.5 pl-10">
                                            {{ date('d M Y', strtotime($item->created_at)) }}</td>
                                        <td class="border border-slate-700 p-1.5  items-center justify-center flex btn-group"
                                            role="group">

                                            {{-- edit button --}}
                                            <a role="button" class="btn btn-warning"
                                                href="{{ route('admin.staff.edit', $item->id) }}">Edit</a>
                                            {{-- View button  --}}
                                            <a data-toggle="modal" data-target="#view{{ $item->id }}" role="button"
                                                class=" btn btn-info">View</a>
                                            <div class="modal fade " id="view{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered " role="document">
                                                    <div class="modal-content bg-info">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">All new
                                                                Request</h5>
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
                                                                                        stroke-width="0"></g>
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
                                                                                    height="40px" viewBox="0 0 24 24"
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
                                                                                            d="M1 5C1 3.34315 2.34315 2 4 2H8.43845C9.81505 2 11.015 2.93689 11.3489 4.27239L11.7808 6H13.5H20C21.6569 6 23 7.34315 23 9V19C23 20.6569 21.6569 22 20 22H4C2.34315 22 1 20.6569 1 19V10V9V5ZM3 9V10V19C3 19.5523 3.44772 20 4 20H20C20.5523 20 21 19.5523 21 19V9C21 8.44772 20.5523 8 20 8H13.5H11.7808H4C3.44772 8 3 8.44772 3 9ZM9.71922 6H4C3.64936 6 3.31278 6.06015 3 6.17071V5C3 4.44772 3.44772 4 4 4H8.43845C8.89732 4 9.2973 4.3123 9.40859 4.75746L9.71922 6Z"
                                                                                            fill="#000000"></path>
                                                                                    </g>
                                                                                </svg></span>Product Name</label>
                                                                        <h5>{{ $item->product_name }}</h5>
                                                                    </div>
                                                                    <div class="border border-dark p-1 text-center">
                                                                        <label for="">
                                                                            <img src="https://uidai.gov.in/images/logo/aadhaar_english_logo.svg"
                                                                                width="50px" height="50px"
                                                                                alt="">
                                                                            Email</label>
                                                                        <h5>{{ $item->email }}</h5>
                                            </div>



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
