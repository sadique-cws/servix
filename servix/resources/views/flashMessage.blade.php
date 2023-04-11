@extends('layouts.layout')

@section('contents')
    <div class="container mt-5 py-1">
            <div class="row mt-5 py-5">
                <div class="col-7 card p-5 mx-auto mt-5 rounded-5 text-center font-bold">
                    {{-- my animation --}}
                    <div id="animation-container" class="" style="margin-top:-230px;height: 400px;"></div>
                    {{-- flash message --//-- Notify user section --}}
                    <div class="d-flex justify-content-center" style="margin-top: -110px">
                        <h1 class="font-bold text-3xl text-gray-900 mb-4">Request submited successfully!</h1>
                    </div>
                    <div class="text-center">
                      <p>Dear <b class="">{{$owner_name}}</b> Your request has been submited successfully!<br>Wait for our staffs to review your request. We will try our best to start work on your requested issue as soon as possible... 
                    </p>
                    <b><span class="fs-3" style="margin-right: 90px">Here is your service code </span></b><br>
                    <div class="w-full d-flex flex-lg-row flex-sm-col ">
                        <div class="box1 col-8 justify-content-end align-items-center d-flex" style="height: 100px;">
                            <code class="font-style-mono fs-1 text-success border px-5 py-2 overflow-auto" style="max-width: 450px; max-height: 80px; margin-inline: -30px">{{$service_code}}</code>
                        </div>
                        <div class="box2 col-4 justify-content-start align-items-center d-flex overflow-visible " style="height: 100px;">
                            <div class="" style="height:220px; margin-top:-80px; margin-left:-10px; " id="animation-copy"></div>
                        </div>
                    </div>
                    <p>Please note it down anywhere! It may be asked while recieving your pruduct.. </p>
                    </div>
                </div>
            </div>
        </div>
</div>

<script>
    // Targetting contianer
    var animationContainerSuccess = document.getElementById('animation-container');
    var animationContainerCopy = document.getElementById('animation-copy');
    
    // running animation
    var animation = lottie.loadAnimation({
        container: animationContainerSuccess,
        renderer: 'svg',
        loop: false,
        autoplay: true,
        path: '{{ asset('img/success.json') }}'
    });
    var animation = lottie.loadAnimation({
        container: animationContainerCopy,
        renderer: 'svg',
        loop: true,
        autoplay: true,
        path: '{{ asset('img/copyworker.json') }}'
    });
</script>

@endsection

@section('footer')
    {{-- null footer --}}
@endsection
