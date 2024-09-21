@extends('admin.layout.base')

@section('title')
    Manage Staffs
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card p-0 m-0">
                <div class="card-header">
                    <h3 class="card-title">All Staffs</h3>

                    <div class="card-tools">
                        <form action="{{ route('admin.staff.search') }}">

                            <div class="input-group input-group-sm" style="width: 300px;">
                                <a href="{{ route('admin.staff.create') }}"
                                    role="button"class="mr-12 btn btn-secondary btn-sm">Staff Add</a>

                                <input type="text" name="search"
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
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Contact</th>
                                <th>Salary</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($staffs as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>
                                        @if ($item->image)
                                            <img src="{{ asset('storage/images/' . $item->image) }}"
                                                style="height: 50px; width:70px;" class="rounded-circle">
                                        @else
                                            <span>No image found!</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td class="border border-slate-700 p-1.5 pl-10">{{ $item->contact }}</td>
                                    <td class="border border-slate-700 p-1.5 pl-10">{{ $item->salary }}</td>
                                    <td class="border border-slate-700 p-1.5 pl-10">{{ $item->type->typename }}</td>
                                    <td class="border border-slate-700 p-1.5 pl-10">{{ $item->status }}</td>
                                    <td class="border border-slate-700 p-1.5  items-center justify-center flex btn-group"
                                        role="group">
                                        {{-- status button  --}}
                                        {{-- <input type="button" id="status" name="status" value="{{$staff->status ? 'Active' : 'Inactive' }}"> --}}
                                        <a role="button" class="btn btn-info" data-bs-toggle="modal"
                                            data-bs-target="#ban{{ $item->id }}">{{ $item->status == 0 ? 'Active' : 'DeActive' }}</a>
                                        {{-- edit button --}}
                                        <a role="button" class="btn btn-warning"
                                            href="{{ route('admin.staff.edit', $item->id) }}">Edit</a>
                                        {{-- View button  --}}
                                        <a data-toggle="modal" data-target="#view{{ $item->id }}" role="button"
                                            class=" btn btn-info">View</a>

                                        <div class="modal fade " id="view{{ $item->id }}" tabindex="-1" role="dialog"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered " role="document">
                                                <div class="modal-content bg-info">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Staff Details
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="flex-row col-12">
                                                            <table class="table">
                                                                <tr>
                                                                    <th>Name</th>
                                                                    <td>{{ $item->name }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Email</th>
                                                                    <td>{{ $item->email }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Contact</th>
                                                                    <td>{{ $item->contact }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Salary</th>
                                                                    <td>{{ $item->salary }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Status</th>
                                                                    <td>{{ !$item->status ? 'Pending' : ($item->status == 1 ? 'Delivered' : 'Reject') }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Type</th>
                                                                    <td>{{ $item->type_id }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Aadhar Card No</th>
                                                                    <td>{{ $item->MAC }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Color</th>
                                                                    <td>{{ $item->color }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Create At</th>
                                                                    <td>{{ $item->created_at ? date('d M Y', strtotime($item->estimate_delivery)) : 'N/A' }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Product Image</th>
                                                                    <td>
                                                                        @if ($item->image)
                                                                            <img src="{{ asset('storage/uploads/' . $item->image) }}"
                                                                                style="height: 80px; width:100px;"
                                                                                class="img-thumbnail">
                                                                        @else
                                                                            <span>No image found!</span>
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        {{-- Delete button  --}}
                                        <a href="{{ route('admin.staff.delete', $item->id) }}" role="button"
                                            class="btn btn-danger"><svg width="20" height="20" viewBox="0 0 24 24"
                                                class="NSy2Hd cdByRd RTiFqe undefined">
                                                <path fill='#b8c2cc'
                                                    d="M15 4V3H9v1H4v2h1v13c0 1.1.9 2 2 2h10c1.1 0 2-.9 2-2V6h1V4h-5zm2 15H7V6h10v13z">
                                                </path>
                                                <path fill='#b8c2cc' d="M9 8h2v9H9zm4 0h2v9h-2z"></path>
                                            </svg>
                                        </a>

                                    </td>
                                </tr>

                                {{-- active and deactive model  --}}
                                <!-- Button trigger modal -->

                                <!-- Button trigger modal -->


                                <!-- Modal -->
                                <div class="modal fade" id="ban{{ $item->id }}" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="staticBackdropLabel">Alert</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Do you really want to {{ $item->status == 0 ? 'activate' : 'deactivate' }}
                                                this account
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">no</button>
                                                <a href="{{ route('admin.staff.status', $item) }}" type="button"
                                                    class="btn btn-primary">yes</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                {{-- view model  --}}
                                <div class="modal fade " id="view{{ $item->id }}" tabindex="-1" role="dialog"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered " role="document">
                                        <div class="modal-content bg-info">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Staff Details</h5>
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
                                                                        height="40px" viewBox="0 0 1024.00 1024.00"
                                                                        class="icon" version="1.1"
                                                                        xmlns="http://www.w3.org/2000/svg" fill="#000000">
                                                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
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
                                                                        xmlns="http://www.w3.org/2000/svg" fill="#000000">
                                                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
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
                                                                        height="40px" viewBox="0 0 1416.00 1416.00"
                                                                        class="icon" version="1.1"
                                                                        xmlns="http://www.w3.org/2000/svg" fill="#000000">
                                                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                                        <g id="SVGRepo_tracerCarrier"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round"></g>
                                                                        <g id="SVGRepo_iconCarrier">
                                                                            <path
                                                                                d="M324.358919 22.140541H1361.643243c18.819459 0 33.210811 14.391351 33.210811 33.21081v645.396757c0 18.819459-14.391351 33.210811-33.210811 33.210811H324.358919c-18.819459 0-33.210811-14.391351-33.210811-33.210811V55.351351c0-18.819459 14.391351-33.210811 33.210811-33.21081z"
                                                                                fill="#9DBE87"></path>
                                                                            <path
                                                                                d="M1361.643243 756.099459H324.358919c-30.996757 0-55.351351-24.354595-55.351351-55.351351V55.351351c0-30.996757 24.354595-55.351351 55.351351-55.351351H1361.643243c30.996757 0 55.351351 24.354595 55.351352 55.351351v645.396757c0 29.88973-24.354595 55.351351-55.351352 55.351351zM324.358919 44.281081c-6.642162 0-11.07027 4.428108-11.07027 11.07027v645.396757c0 6.642162 4.428108 11.07027 11.07027 11.07027H1361.643243c6.642162 0 11.07027-4.428108 11.070271-11.07027V55.351351c0-6.642162-4.428108-11.07027-11.070271-11.07027H324.358919z"
                                                                                fill="#131313"></path>
                                                                            <path
                                                                                d="M230.261622 116.237838h1038.391351c18.819459 0 33.210811 14.391351 33.210811 33.210811v645.396756c0 18.819459-14.391351 33.210811-33.210811 33.210811H230.261622c-18.819459 0-33.210811-14.391351-33.210811-33.210811V149.448649c0-18.819459 14.391351-33.210811 33.210811-33.210811z"
                                                                                fill="#9DBE87"></path>
                                                                            <path
                                                                                d="M1267.545946 850.196757H230.261622c-30.996757 0-55.351351-24.354595-55.351352-55.351352V149.448649c0-30.996757 24.354595-55.351351 55.351352-55.351352h1038.391351c30.996757 0 55.351351 24.354595 55.351351 55.351352v645.396756c-1.107027 29.88973-25.461622 55.351351-56.458378 55.351352zM230.261622 138.378378c-6.642162 0-11.07027 4.428108-11.070271 11.070271v645.396756c0 6.642162 4.428108 11.07027 11.070271 11.070271h1038.391351c6.642162 0 11.07027-4.428108 11.07027-11.070271V149.448649c0-6.642162-4.428108-11.07027-11.07027-11.070271H230.261622z"
                                                                                fill="#131313"></path>
                                                                            <path
                                                                                d="M143.913514 208.121081h1038.391351c18.819459 0 33.210811 14.391351 33.210811 33.210811v645.396757c0 18.819459-14.391351 33.210811-33.210811 33.21081H143.913514c-18.819459 0-33.210811-14.391351-33.210811-33.21081V241.331892c0-17.712432 14.391351-33.210811 33.210811-33.210811z"
                                                                                fill="#9DBE87"></path>
                                                                            <path
                                                                                d="M1182.304865 942.08H143.913514c-30.996757 0-55.351351-24.354595-55.351352-55.351351V241.331892c0-30.996757 24.354595-55.351351 55.351352-55.351351h1038.391351c30.996757 0 55.351351 24.354595 55.351351 55.351351v645.396757c0 29.88973-25.461622 55.351351-55.351351 55.351351zM143.913514 230.261622c-6.642162 0-11.07027 4.428108-11.070271 11.07027v645.396757c0 6.642162 4.428108 11.07027 11.070271 11.07027h1038.391351c6.642162 0 11.07027-4.428108 11.07027-11.07027V241.331892c0-6.642162-4.428108-11.07027-11.07027-11.07027H143.913514z"
                                                                                fill="#131313"></path>
                                                                            <path
                                                                                d="M55.351351 290.041081h1038.391352c18.819459 0 33.210811 14.391351 33.210811 33.210811v645.396757c0 18.819459-14.391351 33.210811-33.210811 33.21081H55.351351c-18.819459 0-33.210811-14.391351-33.21081-33.21081V323.251892c0-17.712432 14.391351-33.210811 33.21081-33.210811z"
                                                                                fill="#9DBE87"></path>
                                                                            <path
                                                                                d="M1093.742703 1024H55.351351c-30.996757 0-55.351351-24.354595-55.351351-55.351351V323.251892c0-30.996757 24.354595-55.351351 55.351351-55.351351h1038.391352c30.996757 0 55.351351 24.354595 55.351351 55.351351v645.396757c0 30.996757-25.461622 55.351351-55.351351 55.351351zM55.351351 312.181622c-6.642162 0-11.07027 4.428108-11.07027 11.07027v645.396757c0 6.642162 4.428108 11.07027 11.07027 11.07027h1038.391352c6.642162 0 11.07027-4.428108 11.07027-11.07027V323.251892c0-6.642162-4.428108-11.07027-11.07027-11.07027H55.351351z"
                                                                                fill="#131313"></path>
                                                                            <path
                                                                                d="M954.257297 902.227027H194.836757c0-52.03027-43.174054-95.204324-95.204325-95.204324V472.700541c52.03027 0 95.204324-43.174054 95.204325-95.204325h759.42054c0 52.03027 43.174054 95.204324 95.204325 95.204325v334.322162c-53.137297 0-95.204324 43.174054-95.204325 95.204324z"
                                                                                fill="#D6F0C5"></path>
                                                                            <path
                                                                                d="M954.257297 924.367568H194.836757c-12.177297 0-22.140541-9.963243-22.140541-22.140541 0-39.852973-33.210811-73.063784-73.063784-73.063784-12.177297 0-22.140541-9.963243-22.14054-22.14054V472.700541c0-12.177297 9.963243-22.140541 22.14054-22.140541 39.852973 0 73.063784-33.210811 73.063784-73.063784 0-12.177297 9.963243-22.140541 22.140541-22.14054h759.42054c12.177297 0 22.140541 9.963243 22.140541 22.14054 0 39.852973 33.210811 73.063784 73.063784 73.063784 12.177297 0 22.140541 9.963243 22.14054 22.140541v334.322162c0 12.177297-9.963243 22.140541-22.14054 22.14054-39.852973 0-73.063784 33.210811-73.063784 73.063784 0 12.177297-9.963243 22.140541-22.140541 22.140541z m-739.494054-44.281082h718.460541c8.856216-46.495135 46.495135-84.134054 92.99027-92.99027V492.627027c-46.495135-8.856216-84.134054-46.495135-92.99027-92.99027H214.763243c-8.856216 46.495135-46.495135 84.134054-92.99027 92.99027V785.989189c46.495135 9.963243 84.134054 47.602162 92.99027 94.097297z"
                                                                                fill="#131313"></path>
                                                                            <path
                                                                                d="M576.761081 790.417297c-35.424865 0-73.063784-13.284324-99.632432-47.602162-7.749189-9.963243-5.535135-23.247568 3.321081-30.996757 9.963243-7.749189 23.247568-5.535135 30.996756 3.321081 26.568649 34.317838 67.528649 35.424865 94.097298 26.568649 22.140541-7.749189 35.424865-22.140541 35.424865-37.638919 0-14.391351-34.317838-24.354595-64.207568-33.210811-46.495135-14.391351-105.167568-30.996757-105.167567-86.348108 0-26.568649 16.605405-50.923243 45.388108-65.314594 35.424865-17.712432 95.204324-24.354595 151.662702 16.605405 9.963243 7.749189 12.177297 21.033514 4.428108 30.996757-7.749189 9.963243-21.033514 12.177297-30.996756 4.428108-37.638919-27.675676-79.705946-26.568649-105.167568-13.284324-13.284324 6.642162-22.140541 16.605405-22.14054 26.568648 0 21.033514 30.996757 30.996757 73.063783 44.281081 45.388108 13.284324 95.204324 28.782703 95.204325 75.277838 0 34.317838-25.461622 65.314595-65.314595 79.705946-11.07027 3.321081-26.568649 6.642162-40.96 6.642162z"
                                                                                fill="#131313"></path>
                                                                            <path
                                                                                d="M574.547027 549.085405c-12.177297 0-22.140541-9.963243-22.140541-22.14054v-48.709189c0-12.177297 9.963243-22.140541 22.140541-22.140541s22.140541 9.963243 22.140541 22.140541v48.709189c0 13.284324-9.963243 22.140541-22.140541 22.14054z"
                                                                                fill="#131313"></path>
                                                                            <path
                                                                                d="M574.547027 832.484324c-12.177297 0-22.140541-9.963243-22.140541-22.14054v-36.531892c0-12.177297 9.963243-22.140541 22.140541-22.140541s22.140541 9.963243 22.140541 22.140541v36.531892c0 12.177297-9.963243 22.140541-22.140541 22.14054z"
                                                                                fill="#131313"></path>
                                                                            <path
                                                                                d="M285.612973 653.145946m-40.96 0a40.96 40.96 0 1 0 81.92 0 40.96 40.96 0 1 0-81.92 0Z"
                                                                                fill="#AECD99"></path>
                                                                            <path
                                                                                d="M285.612973 715.139459c-34.317838 0-63.100541-27.675676-63.100541-63.10054s27.675676-63.100541 63.100541-63.100541c34.317838 0 63.100541 27.675676 63.100541 63.100541s-28.782703 63.100541-63.100541 63.10054z m0-80.812973c-9.963243 0-18.819459 7.749189-18.819459 18.81946s7.749189 18.819459 18.819459 18.819459c9.963243 0 18.819459-7.749189 18.819459-18.819459s-8.856216-18.819459-18.819459-18.81946z"
                                                                                fill="#131313"></path>
                                                                            <path
                                                                                d="M865.695135 653.145946m-40.96 0a40.96 40.96 0 1 0 81.92 0 40.96 40.96 0 1 0-81.92 0Z"
                                                                                fill="#AECD99"></path>
                                                                            <path
                                                                                d="M865.695135 715.139459c-34.317838 0-63.100541-27.675676-63.10054-63.10054s27.675676-63.100541 63.10054-63.100541c34.317838 0 63.100541 27.675676 63.100541 63.100541s-28.782703 63.100541-63.100541 63.10054z m0-80.812973c-9.963243 0-18.819459 7.749189-18.819459 18.81946s7.749189 18.819459 18.819459 18.819459 18.819459-7.749189 18.81946-18.819459-8.856216-18.819459-18.81946-18.81946z"
                                                                                fill="#131313"></path>
                                                                        </g>
                                                                    </svg></span>Salary</label>
                                                            <h5>{{ $item->salary }}</h5>
                                                        </div>
                                                        <div class="border border-dark p-1 text-center">
                                                            <label for="">
                                                                <img src="https://uidai.gov.in/images/logo/aadhaar_english_logo.svg"
                                                                    width="50px" height="50px" alt="">
                                                                Aadhar</label>
                                                            <h5>{{ $item->aadhar }}</h5>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="border border-dark p-1 text-center">
                                                            <label for=""><span><svg width="40px"
                                                                        height="40px" viewBox="0 0 32.000001 32.000001"
                                                                        xmlns:dc="http://purl.org/dc/elements/1.1/"
                                                                        xmlns:cc="http://creativecommons.org/ns#"
                                                                        xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                                                                        xmlns="http://www.w3.org/2000/svg" version="1.1"
                                                                        id="svg2" fill="#000000">
                                                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                                        <g id="SVGRepo_tracerCarrier"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round"></g>
                                                                        <g id="SVGRepo_iconCarrier">
                                                                            <metadata id="metadata7">
                                                                                <rdf:rdf>
                                                                                    <cc:work>
                                                                                        <dc:format>image/svg+xml</dc:format>
                                                                                        <dc:type
                                                                                            rdf:resource="http://purl.org/dc/dcmitype/StillImage">
                                                                                        </dc:type>
                                                                                        <dc:title></dc:title>
                                                                                        <dc:creator>
                                                                                            <cc:agent>
                                                                                                <dc:title>Timothée Giet
                                                                                                </dc:title>
                                                                                            </cc:agent>
                                                                                        </dc:creator>
                                                                                        <dc:date>2021</dc:date>
                                                                                        <dc:description></dc:description>
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
                                                                            <circle r="7.5" cy="9.5" cx="16"
                                                                                id="path839"
                                                                                style="opacity:1;vector-effect:none;fill:#373737;fill-opacity:1;stroke:none;stroke-width:2;stroke-linecap:butt;stroke-linejoin:bevel;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:3.20000005;stroke-opacity:1">
                                                                            </circle>
                                                                            <path id="rect841"
                                                                                d="M16 19c6.648 0 12 2.899 12 6.5V32H4v-6.5C4 21.899 9.352 19 16 19z"
                                                                                style="opacity:1;vector-effect:none;fill:#373737;fill-opacity:1;stroke:none;stroke-width:2;stroke-linecap:butt;stroke-linejoin:bevel;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:3.20000005;stroke-opacity:1">
                                                                            </path>
                                                                        </g>
                                                                    </svg></span>Name</label>
                                                            <h5>{{ $item->name }}</h5>
                                                        </div>
                                                        <div class="border border-dark p-1 text-center">
                                                            <label for=""><span><svg fill="#000000"
                                                                        width="40px" height="40px" viewBox="0 0 64 64"
                                                                        version="1.1" xml:space="preserve"
                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                        stroke="#000000">
                                                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
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
                                                                                <g>
                                                                                    <g>
                                                                                        <path
                                                                                            d="M5.7783,24.7686c1.9902,1.085,5.0967,0.269,8.0811-0.6533c4.8364-1.3472,7.019-2.6401,7.168-6.7412 c0.0034-0.1011-0.0083-0.2021-0.0352-0.2998c-0.0029-0.0122,0.0063-0.1108,0.1294-0.2905 c0.7661-1.1177,3.6714-2.4893,7.2095-2.8501c0.9307-0.0977,1.9409-0.1489,2.9951-0.1523 c1.0571,0.0034,2.0674,0.0547,3.0049,0.1523c3.5352,0.3608,6.4395,1.7324,7.2061,2.8501 c0.123,0.1797,0.1328,0.2783,0.1289,0.2905c-0.0264,0.0972-0.0381,0.1982-0.0342,0.2988 c0.1445,4.1001,2.3271,5.3936,7.1377,6.7344c1.9893,0.6147,4.0195,1.1802,5.7432,1.1802c0.8848,0,1.6895-0.1494,2.3652-0.5176 c1.4609-0.7915,2.2539-3.3052,2.417-4.1216c1.3721-6.8125-3.7441-12.9063-9.0781-15.6851 C45.3633,2.4341,38.3145,0.9468,31.3296,1.001c-6.9517-0.0498-14.0381,1.4336-18.8872,3.9624 c-5.3335,2.7783-10.4502,8.8721-9.0811,15.686C3.5264,21.4678,4.3257,23.9814,5.7783,24.7686z M13.3667,6.7368 c4.5747-2.3862,11.2939-3.7954,17.9561-3.7358c0.0039,0,0.0098,0,0.0137,0c6.6821-0.0381,13.3774,1.3501,17.9565,3.7358 c4.6914,2.4443,9.209,7.7168,8.041,13.519c-0.2002,1.0054-0.8896,2.4741-1.4111,2.7568 c-1.4189,0.7725-4.8926-0.3003-6.5898-0.8242c-4.7744-1.3306-5.5859-2.2759-5.6982-4.7632 c0.0791-0.4399,0.0391-1.062-0.4482-1.7725c-1.2266-1.7891-4.7842-3.314-8.6504-3.7085c-1.002-0.1045-2.0796-0.1597-3.21-0.1631 c-1.1279,0.0039-2.2061,0.0586-3.2012,0.1631c-3.8682,0.3945-7.4263,1.9194-8.6528,3.708 c-0.4873,0.7104-0.5273,1.3325-0.4487,1.7725c-0.1143,2.4883-0.9272,3.4341-5.728,4.7715 c-1.6694,0.5161-5.1431,1.5889-6.562,0.8149c-0.5171-0.2798-1.2085-1.7505-1.4116-2.7568 C4.1563,14.4536,8.6748,9.1812,13.3667,6.7368z">
                                                                                        </path>
                                                                                        <path
                                                                                            d="M61.5771,54.4614l-3.1309-19.0518c-0.8037-4.9136-4.1641-8.2148-8.3623-8.2148h-9.3481l-1.313-5.1528 c-0.5342-2.1182-1.8789-3.3823-3.5967-3.3823H27.498c-1.7393,0-3.0513,1.2319-3.5996,3.3799l-1.314,5.1553h-8.8257 c-4.1934,0-7.5542,3.3008-8.3628,8.2139L2.4893,53.0884c-0.6113,3.7251-0.2471,6.314,1.1128,7.915 c1.6968,1.9971,4.4331,1.9941,6.9116,1.9961h42.7012L53.5371,63c0.1074,0,0.2139,0,0.3213,0 c2.4238,0,5.0947-0.0757,6.6797-1.9399C61.7354,59.6523,62.0752,57.4941,61.5771,54.4614z M25.8364,22.5337 c0.1787-0.6997,0.6323-1.874,1.6616-1.874h8.3281c1.0313,0,1.4805,1.1729,1.6582,1.874l1.1875,4.6611H24.6484L25.8364,22.5337z M59.0146,59.7642C57.959,61.0059,55.7178,61.0039,53.54,61l-42.9087-0.0005h-0.1182c-2.0977,0-4.2891,0.001-5.3867-1.291 c-0.9434-1.1108-1.167-3.229-0.6636-6.2959l2.9067-17.6792c0.4961-3.0166,2.4673-6.5386,6.3892-6.5386H50.084 c3.9268,0,5.8955,3.5215,6.3887,6.5381l3.1318,19.0527C59.9951,57.1694,59.7969,58.8442,59.0146,59.7642z">
                                                                                        </path>
                                                                                    </g>
                                                                                    <g>
                                                                                        <path
                                                                                            d="M32.002,58.4673c-7.3721,0-13.3701-5.998-13.3701-13.3701c0-7.3706,5.998-13.3667,13.3701-13.3667 c7.3701,0,13.3662,5.9961,13.3662,13.3667C45.3682,52.4692,39.3721,58.4673,32.002,58.4673z M32.002,33.7305 c-6.2695,0-11.3701,5.0991-11.3701,11.3667c0,6.2695,5.1006,11.3701,11.3701,11.3701c6.2676,0,11.3662-5.1006,11.3662-11.3701 C43.3682,38.8296,38.2695,33.7305,32.002,33.7305z">
                                                                                        </path>
                                                                                    </g>
                                                                                    <g>
                                                                                        <path
                                                                                            d="M32.002,49.9707c-2.6875,0-4.8735-2.186-4.8735-4.8735c0-2.6855,2.186-4.8701,4.8735-4.8701 c2.6855,0,4.8701,2.1846,4.8701,4.8701C36.8721,47.7847,34.6875,49.9707,32.002,49.9707z M32.002,42.2271 c-1.5845,0-2.8735,1.2876-2.8735,2.8701c0,1.5845,1.2891,2.8735,2.8735,2.8735c1.583,0,2.8701-1.2891,2.8701-2.8735 C34.8721,43.5146,33.585,42.2271,32.002,42.2271z">
                                                                                        </path>
                                                                                    </g>
                                                                                    <g>
                                                                                        <path
                                                                                            d="M32.002,37.7339c-0.5522,0-1.0298-0.4478-1.0298-1s0.418-1,0.9702-1h0.0596c0.5522,0,1,0.4478,1,1 S32.5542,37.7339,32.002,37.7339z">
                                                                                        </path>
                                                                                    </g>
                                                                                    <g>
                                                                                        <path
                                                                                            d="M32.002,54.4644c-0.5522,0-1.0298-0.4478-1.0298-1s0.418-1,0.9702-1h0.0596c0.5522,0,1,0.4478,1,1 S32.5542,54.4644,32.002,54.4644z">
                                                                                        </path>
                                                                                    </g>
                                                                                    <g>
                                                                                        <path
                                                                                            d="M23.6348,46.127c-0.5522,0-1-0.418-1-0.9702v-0.0596c0-0.5522,0.4478-1,1-1s1,0.4478,1,1S24.187,46.127,23.6348,46.127z">
                                                                                        </path>
                                                                                    </g>
                                                                                    <g>
                                                                                        <path
                                                                                            d="M40.3652,46.127c-0.5527,0-1-0.418-1-0.9702v-0.0596c0-0.5522,0.4473-1,1-1c0.5527,0,1,0.4478,1,1 S40.918,46.127,40.3652,46.127z">
                                                                                        </path>
                                                                                    </g>
                                                                                    <g>
                                                                                        <path
                                                                                            d="M26.0547,40.1924c-0.2539,0-0.5063-0.0928-0.6963-0.2827c-0.3906-0.3906-0.4116-1.0024-0.021-1.3931l0.042-0.042 c0.3906-0.3906,1.0234-0.3906,1.4141,0s0.3906,1.0234,0,1.4141C26.5933,40.0894,26.3232,40.1924,26.0547,40.1924z">
                                                                                        </path>
                                                                                    </g>
                                                                                    <g>
                                                                                        <path
                                                                                            d="M37.8857,52.0234c-0.2549,0-0.5068-0.0928-0.6973-0.2827c-0.3896-0.3906-0.4111-1.0024-0.0205-1.3931l0.042-0.042 c0.3906-0.3906,1.0234-0.3906,1.4141,0s0.3906,1.0234,0,1.4141C38.4238,51.9204,38.1533,52.0234,37.8857,52.0234z">
                                                                                        </path>
                                                                                    </g>
                                                                                    <g>
                                                                                        <path
                                                                                            d="M26.0977,52.0444c-0.2437,0-0.4863-0.0928-0.6763-0.2827l-0.042-0.042c-0.3906-0.3906-0.3906-1.0234,0-1.4141 s1.0234-0.3906,1.4141,0s0.4116,1.0444,0.021,1.4351C26.6143,51.9414,26.355,52.0444,26.0977,52.0444z">
                                                                                        </path>
                                                                                    </g>
                                                                                    <g>
                                                                                        <path
                                                                                            d="M37.9287,40.2134c-0.2441,0-0.4863-0.0928-0.6768-0.2827l-0.042-0.042c-0.3906-0.3906-0.3906-1.0234,0-1.4141 s1.0234-0.3906,1.4141,0s0.4111,1.0444,0.0215,1.4351C38.4443,40.1104,38.1855,40.2134,37.9287,40.2134z">
                                                                                        </path>
                                                                                    </g>
                                                                                </g>
                                                                            </g>
                                                                            <g id="_x31_2_sending_mail"></g>
                                                                            <g id="_x31_1_man_talking"></g>
                                                                            <g id="_x31_0_date"></g>
                                                                            <g id="_x30_9_review"></g>
                                                                            <g id="_x30_8_email"></g>
                                                                            <g id="_x30_7_information"></g>
                                                                            <g id="_x30_6_phone_talking"></g>
                                                                            <g id="_x30_5_women_talking"></g>
                                                                            <g id="_x30_4_calling"></g>
                                                                            <g id="_x30_3_women"></g>
                                                                            <g id="_x30_2_writing"></g>
                                                                            <g id="_x30_1_chatting"></g>
                                                                        </g>
                                                                    </svg></span>Contact</label>
                                                            <h5>{{ $item->contact }}</h5>
                                                        </div>
                                                        <div class="border border-dark p-1 text-center">
                                                            <label for=""><span><svg fill="#000000"
                                                                        width="40px" height="40px"
                                                                        viewBox="0 0 32.00 32.00" version="1.1"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                                        <g id="SVGRepo_tracerCarrier"
                                                                            stroke-linecap="round"
                                                                            stroke-linejoin="round"></g>
                                                                        <g id="SVGRepo_iconCarrier">
                                                                            <title>category</title>
                                                                            <path
                                                                                d="M2.594 4.781l-1.719 1.75h15.5l-1.719-1.75h-12.063zM17.219 13.406h-17.219v-6.031h17.219v6.031zM12.063 11.688v-1.719h-6.875v1.719h0.844v-0.875h5.156v0.875h0.875zM17.219 20.313h-17.219v-6.031h17.219v6.031zM12.063 18.594v-1.75h-6.875v1.75h0.844v-0.875h5.156v0.875h0.875zM17.219 27.188h-17.219v-6h17.219v6zM12.063 25.469v-1.719h-6.875v1.719h0.844v-0.875h5.156v0.875h0.875z">
                                                                            </path>
                                                                        </g>
                                                                    </svg></span>Type</label>
                                                            <h5>{{ $item->type_id }}</h5>
                                                        </div>
                                                        <div class="border border-dark p-1 text-center ">
                                                            <label for="">
                                                                <img width="50px" height="50px"
                                                                    src="https://www.incometax.gov.in/iec/foportal/sites/default/files/2020-03/icon%208.svg"
                                                                    alt="">
                                                                PAN</label>
                                                            <h5>{{ $item->pan }}</h5>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="text-center border-dark border">
                                                    <label for="">
                                                        <span><svg height="40px" width="40px" version="1.1"
                                                                id="_x35_" xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                viewBox="0 0 512.00 512.00" xml:space="preserve"
                                                                fill="#000000">
                                                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                    stroke-linejoin="round"></g>
                                                                <g id="SVGRepo_iconCarrier">
                                                                    <g>
                                                                        <g>
                                                                            <polygon style="fill:#E9E7C2;"
                                                                                points="492.176,184.586 490.633,213.753 477.228,464.553 34.772,464.553 22.748,239.751 21.367,213.753 19.824,184.586 ">
                                                                            </polygon>
                                                                            <polygon style="fill:#9B7453;"
                                                                                points="495.182,464.553 493.477,493.882 18.523,493.882 17.305,473.003 16.817,464.553 ">
                                                                            </polygon>
                                                                            <g>
                                                                                <g>
                                                                                    <polygon style="fill:#AAD2D6;"
                                                                                        points="126.019,339.279 63.431,339.279 61.071,287.036 124.426,287.036 ">
                                                                                    </polygon>
                                                                                    <polygon style="fill:#AAD2D6;"
                                                                                        points="127.904,401.109 66.225,401.109 63.933,350.381 126.357,350.381 ">
                                                                                    </polygon>
                                                                                </g>
                                                                                <g>
                                                                                    <polygon style="fill:#AAD2D6;"
                                                                                        points="204.56,339.279 141.973,339.279 140.575,287.036 203.929,287.036 ">
                                                                                    </polygon>
                                                                                    <polygon style="fill:#AAD2D6;"
                                                                                        points="205.306,401.109 143.627,401.109 142.27,350.381 204.694,350.381 ">
                                                                                    </polygon>
                                                                                </g>
                                                                                <g>
                                                                                    <polygon style="fill:#AAD2D6;"
                                                                                        points="283.101,339.279 220.514,339.279 220.079,287.036 283.433,287.036 ">
                                                                                    </polygon>
                                                                                    <polygon style="fill:#AAD2D6;"
                                                                                        points="282.708,401.109 221.028,401.109 220.606,350.381 283.03,350.381 ">
                                                                                    </polygon>
                                                                                </g>
                                                                            </g>
                                                                            <path style="fill:#D06868;"
                                                                                d="M392.544,245.69H380.65c-29.252,0-53.6,25.233-54.099,55.678l-2.692,164.089h112.298l7.147-164.089 C444.631,270.922,421.796,245.69,392.544,245.69z">
                                                                            </path>
                                                                            <polygon style="fill:#E0E0E0;"
                                                                                points="434.314,493.886 322.744,493.886 323.221,464.53 435.589,464.53 ">
                                                                            </polygon>
                                                                            <polygon style="fill:#9B7453;"
                                                                                points="512,213.753 0,213.753 67.595,84.574 444.405,84.574 463.822,121.703 ">
                                                                            </polygon>
                                                                            <g>
                                                                                <polygon style="fill:#E9E7C2;"
                                                                                    points="251.613,174.756 104.642,174.756 104.074,158.426 101.555,84.574 100.255,46.715 175.081,0 229.352,33.147 251.531,46.715 251.531,84.574 ">
                                                                                </polygon>
                                                                                <g>
                                                                                    <polygon style="fill:#AAD2D6;"
                                                                                        points="157.973,141.819 132.026,141.819 130.436,84.592 156.715,84.592 ">
                                                                                    </polygon>
                                                                                    <polygon style="fill:#AAD2D6;"
                                                                                        points="190.534,141.819 164.587,141.819 163.414,84.592 189.694,84.592 ">
                                                                                    </polygon>
                                                                                    <polygon style="fill:#AAD2D6;"
                                                                                        points="223.095,141.819 197.148,141.819 196.393,84.592 222.673,84.592 ">
                                                                                    </polygon>
                                                                                </g>
                                                                            </g>
                                                                            <path style="fill:#E9E7C2;"
                                                                                d="M427.249,358.216c-0.327,8.109-6.945,14.66-14.783,14.66c-7.837,0-13.97-6.551-13.697-14.66 c0.274-8.14,6.894-14.762,14.786-14.762S427.577,350.077,427.249,358.216z">
                                                                            </path>
                                                                        </g>
                                                                        <polygon style="opacity:0.1;fill:#040000;"
                                                                            points="490.633,213.753 512,213.753 463.822,121.703 444.405,84.574 256,84.574 256,493.882 322.744,493.882 322.744,493.885 434.314,493.885 434.314,493.882 493.477,493.882 495.182,464.553 477.228,464.553 ">
                                                                        </polygon>
                                                                    </g>
                                                                </g>
                                                            </svg></span>
                                                        Address</label>
                                                    <h5 class="fs-1">{{ $item->address }}</h5>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
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
