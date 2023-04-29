@extends('receptioner.layouts.base')



@section('content')
    <div class="ml-40">

        <div class="container">
            {{-- form here --}}
            <div class="d-flex justify-content-between ">
                <div class=" mt-2">
                    <h2 class="text-black-100">Edit Request</h2>
                </div>
                <div class="mt-3">
                    <a href="{{ route('receptioner.all.request') }}" role="button" class="btn btn-primary btn-sm">Go Back</a>
                </div>
            </div>

            <form action="{{ route('receptioner.request.edit', $data['id']) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="w-full px-3 mb-5 col">
                        <label for="" class="text-black-100">Owner Name</label>
                        <div class="flex">
                            <input type="text" name="owner_name" value="{{ $data->owner_name }}" class="form-control"
                                placeholder="" readonly>
                        </div>
                    </div>
                    <div class="w-full px-3 mb-5 col">
                        <label for="" class="text-black-100">Product Name</label>
                        <div class="flex">
                            <input type="text" name="product_name" value="{{ $data->product_name }}" class="form-control"
                                readonly>
                        </div>
                    </div>
                    <div class="w-full px-3 mb-5 col">
                        <label for="" class="text-black-100">Contact</label>
                        <div class="flex">
                            <input type="number" name="contact" value="{{ $data->contact }}" class="form-control"
                                readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="w-full px-3 mb-5 col">
                        <label for="" class="text-black-100">Email</label>
                        <div class="flex">
                            <input type="email" name="email" value="{{ $data->email }}" class="form-control"
                                placeholder="example@gmail.com" readonly>
                        </div>
                    </div>

                    <div class="w-full px-3 mb-5 col">
                        <label for="" class="text-black-100">Color</label>
                        <div class="flex">
                            <input type="text" name="color" value="{{ $data->color }}"
                                class="form-control"
                                placeholder="" readonly>
                        </div>
                    </div>
                    <div class="w-full px-3 mb-5 col">
                        <label for="" class="text-black-100">Brand</label>
                        <div class="flex">
                            <input type="text" name="brand" value="{{ $data->brand }}"
                                class="form-control"
                                placeholder="" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="w-full px-3 mb-5 col">
                        <label for="" class="text-black-100">serial_no</label>
                        <div class="flex">
                            <input type="text" name="serial_no" value="{{ $data->serial_no }}" class="form-control"
                                placeholder="" >
                        </div>
                    </div>

                    <div class="w-full px-3 mb-5 col">
                        <label for="" class="text-black-100">MAC</label>
                        <div class="flex">
                            <input type="text" name="MAC" value="{{ $data->MAC }}"
                                class="form-control"
                                placeholder="" >
                        </div>
                    </div>
                    <div class="w-full px-3 mb-5 col">
                        <label for="" class="text-black-100">Estimate_delivery</label>
                        <div class="flex">
                            <input type="date" name="estimate_delivery" value="{{ $data->Estimate_delivery }}"
                                class="form-control"
                                placeholder="" >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="w-full px-3 mb-5 col">
                        <label for="" class="text-black-100">Problem</label>
                        <div class="flex">
                            <input type="text" name="problem" value="{{ $data->problem }}"
                                class="form-control"
                                placeholder="" readonly>
                        </div>
                    </div>
                    <div class="w-full px-3 mb-5 col">
                        <label for="" class="text-black-100">Remark</label>
                        <div class="flex">
                            <input type="text" name='remark' class="form-control" value="" placeholder="">
                        </div>
                    </div>
                  
                </div>
                <div class="row">
                    <div class="w-full    mb-5  gap-2 col">
                        <label for="" class="text-black-100">Status</label>
                        <div class=" d-flex flex-column ">
                            <div class="form-check">
                                <input class="form-check-input" checked="{{ $data->status == 0 ? True : False }}" type="radio"
                                    name="status" value="0">
                                <label class="form-check-label">
                                    Pending
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" checked="{{ $data->status == 2 ? True : False }}" type="radio"
                                    name="status" value="2">
                                <label class="form-check-label">
                                    work Progress
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" checked=" {{ $data->status == 3 ? True : False }}" type="radio"
                                    name="status" value="3">
                                <label class="form-check-label">
                                    Reject
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" checked=" {{ $data->status == 4 ? True : False }}" type="radio"
                                    name="status" value="4">
                                <label class="form-check-label">
                                    Work Done
                                </label>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row ">
                    <div class="col-md-6">
                        <div id="my_camera" ></div>
                        <br/>
                        <input type=button value="Take Snapshot" onClick="take_snapshot()" value="{{ $data->image }}">
                        <input type="hidden" name="image" class="image-tag">
                    </div>
                    <div class="col-md-6">
                        <div id="results">Your captured image will appear here...</div>
                    </div>
                </div>
              

                <div class="row">
                    <div class="w-full px-3 mb-5 col mt-3">

                        <input type="submit" name="submit" class="btn btn-success w-100" />

                    </div>
                </div>

            </form>

            {{-- form end --}}

        </div>
    </div>
@endsection

@section('js')
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>

<script>
    Webcam.set({
        width: 490,
        height: 350,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
    
    Webcam.attach( '#my_camera' );
    
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }
</script>

@endsection