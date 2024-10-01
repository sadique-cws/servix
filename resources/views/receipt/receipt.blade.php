<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Receipt - {{ $item->owner_name }}</title>
    <link rel="shortcut icon" href="{{ asset('Assets/faviconn.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid mt-5">
        <div class="card">
            <div class="card-body">
                <div c`lass="container mb-5 mt-3">
                    <div class="row d-flex align-items-baseline">
                        <div class="row">
                            <div class="col-xl-9">
                                <p style="color: #7e8d9f;font-size: 20px;">Receipt No: <strong
                                        class="text-uppercase">SX-{{ $item->id }}-{{ $item->type->id }}
                                    </strong></p>

                            </div>
                            <div class="col-xl-3 float-end d-print-none">
                                <a href="{{  url()->previous() }}" class="btn btn-light text-capitalize"
                                    data-mdb-ripple-color="dark"><i class="fa fa-arrow-left text-danger"></i>
                                    back</a>
                                <a type="button" onclick="window.print()" id="print-button"
                                    class="btn btn-light text-capitalize border-0" data-mdb-ripple-color="dark"><i
                                        class="fas fa-print text-primary"></i>
                                    Print</a>

                            </div>
                            <hr />
                        </div>

                        <div class="modal-body">
                            <div class="container">
                                <div class="col-md-12">
                                    <div class="text-center">
                                        <h1 class="fw-bold text-dark">NovaFix</h1>
                                            servicxteam@gmail.com</p>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-8">
                                        <ul class="list-unstyled">
                                            <li class="text-muted">Name: <span
                                                    style="color:#5d9fc5 ;">{{ $item->owner_name }}</span>
                                            </li>
                                            {{-- <li class="text-muted">Street, City</li>
                        <li class="text-muted">State, Country</li> --}}
                                            <li class="text-muted"><i class="fas fa-phone"></i> {{ $item->contact }}
                                            </li>
                                            <li class="text-muted"><i class="bi bi-envelope"></i> {{ $item->email }}
                                            </li>

                                        </ul>
                                    </div>
                                    <div class="col-md-4">
                                        {{-- <p class="text-muted"></p> --}}
                                        <ul class="list-unstyled">
                                            <li class="text-muted"><i class="fas fa-map-marker"
                                                    style="color:#84B0CA ;"></i> <span class="fw-bold">NovaFix</span>
                                                <br>
                                                Zila School Road, Near BSNL tower, <br> Purnea (Bihar) - 854301
                                            </li>
                                            <li class="text-muted"><i class="fas fa-phone" style="color:#84B0CA ;"></i>
                                                <span class="fw-bold">(+91) 7856802002</span>
                                            </li>
                                            <li class="text-muted"><i class="fas fa-circle" style="color:#84B0CA ;"></i>
                                                <span class="fw-bold">Creation
                                                    Date:
                                                </span>{{ date('d M Y', strtotime($item->created_at)) }}
                                            </li>
                                            {{-- <li class="text-muted"><i
                                                    class="fas fa-circle"
                                                    style="color:#84B0CA ;"></i>
                                                <span
                                                    class="me-1 fw-bold">Status:</span><span
                                                    class="badge bg-warning text-black fw-bold">
                                                    {{}}</span>
                                            </li> --}}
                                        </ul>
                                    </div>
                                </div>

                                <div class="row my-2 mx-1 justify-content-center">
                                    <table class="table table-striped table-bordered">
                                        <tbody>
                                            <tr>
                                                <th scope="col">Name</th>
                                                <td class="text-uppercase">
                                                    {{ $item->owner_name }}
                                                </td>
                                                <th scope="col">Service code</th>
                                                <td class="text-uppercase">
                                                    <h4 class="m-0 text-info">{{ $item->service_code }}</h4>
                                                </td>
                                            </tr>
                                            <tr>

                                                <th scope="col">Problem</th>
                                                <td class="text-uppercase">{{ $item->problem }}</td>

                                                <th scope="col">brand</th>
                                                <td class="text-uppercase">{{ $item->brand }}</td>
                                            </tr>
                                            <tr>

                                                <th scope="col">Type</th>
                                                <td class="text-uppercase">{{ $item->type->typename }}</td>
                                                <th scope="col">S.N</th>
                                                <td class="text-uppercase">{{ $item->serial_no }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">MAC</th>
                                                <td class="text-uppercase">{{ $item->MAC }}</td>
                                                <th scope="col">Color</th>
                                                <td class="text-uppercase">{{ $item->color }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="col">Model No</th>
                                                <td class="text-uppercase">{{ $item->product_name }}</td>
                                                <th scope="col">Est Delivery Date</th>
                                                <td class="text-uppercase">
                                                    {{ date('d M Y', strtotime($item->estimate_delivery)) }}</td>

                                            </tr>
                                            <tr>
                                                <th scope="col">Status</th>
                                                <td class="text-uppercase ">
                                                    <span class="font-weight-bold   rounded px-2 py-1
                            " style="color:{{StatusColor($item->status)}}; ">{{ $item->getStatus() }}</span></td>
                                                <th scope="col">Remark</th>
                                                <td class="text-uppercase">
                                                    {{ $item->remark == null ? 'N/A' : $item->remark }}</td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-xl-8">
                                        <p class="ms-3">Add additional notes
                                            and payment information</p>

                                    </div>
                                    {{-- <div class="col-xl-3">
                                        <ul class="list-unstyled">
                                            <li class="text-muted ms-3"><span
                                                    class="text-black me-4">SubTotal</span>$1110
                                            </li>
                                            <li class="text-muted ms-3 mt-2">
                                                <span
                                                    class="text-black me-4">Tax(15%)</span>$111
                                            </li>
                                        </ul>
                                        <p class="text-black float-start"><span
                                                class="text-black me-3"> Total
                                                Amount</span><span
                                                style="font-size: 25px;">$1221</span>
                                        </p>
                                    </div> --}}
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-xl-10">
                                        <p>Thank you for your visiting</p>
                                    </div>
                                    <div class="col-xl-2 mt-4">
                                        <h6>Sign & Stamp</h6>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset('plugins/sparklines/sparkline.js') }}"></script>
    <!-- JQVMap -->
    <script src="{{ asset('plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{ asset('plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    {{-- <script src="{{ asset("dist/js/demo.js") }}"></script> --}}
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>
    <script src="{{ asset('js/printThis.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>
