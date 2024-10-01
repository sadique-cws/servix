@extends('layouts.layout')
@section('title')
    successfully raised -
@endsection
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
                        <p>Dear <b>{{$owner_name}}</b>Your request has been submited successfully!<br>Wait for our staffs to review your request. We will try our best to start work on your requested issue as soon as possible... 
                    </p>
                    <b><span class="fs-3" style="margin-right: 90px">Here is your service code </span></b><br>
                    <div class="w-full d-flex flex-lg-row flex-sm-col">
                        <div class="box1 col-8 justify-content-end align-items-center d-flex" style="height: 100px;">
                            <code id="copy-text" class="font-style-mono fs-1 text-success border px-5 py-2 overflow-auto text-uppercase " style="max-width: 450px; max-height: 80px; background-color: #D3D3D3" >{{$service_code}}</code>
                            <div class="flex-row border font-style-mono p-1" style="margin-right: -15px" >
                                <div class="" id="copy-button">
                                    <svg id="copy-svg" style="height:48px;" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path opacity="0.4" d="M8 12.2002H15" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path opacity="0.4" d="M8 16.2002H12.38" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M10 6H14C16 6 16 5 16 4C16 2 15 2 14 2H10C9 2 8 2 8 4C8 6 9 6 10 6Z" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M16 4.02002C19.33 4.20002 21 5.43002 21 10V16C21 20 20 22 15 22H9C4 22 3 20 3 16V10C3 5.44002 4.67 4.20002 8 4.02002" stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                                </div>
                                <div class="flex-row" style="font-size: 13px;" id="copy-message" >
                                   Copy Code
                                </div>
                            </div>
                        </div>
                        <div class="box2 col-4 justify-content-start align-items-center d-flex overflow-visible " style="height: 100px;">
                            <div class="" style="height:220px; margin-top:-80px; margin-left:-10px; " id="animation-copy"></div>
                        </div>
                    </div>
                    <p id="copy-message"></p>
                    <p>Please note it down anywhere! It may be asked while recieving your pruduct.. </p>
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
     
    // 
    const copyText = document.querySelector('#copy-text');
    const copyButton = document.querySelector('#copy-button');
    const copyMessage = document.querySelector('#copy-message');
    const copyIcon = document.querySelector('#copy-svg')

    copyButton.addEventListener('click', () => {
    navigator.clipboard.writeText(copyText.textContent)
        .then(() => {
        copyMessage.textContent = 'Code copied!';
        copyMessage.classList.add('text-success');
        })
        .catch(() => {
        copyMessage.textContent = 'Oops, something went wrong.';
        });
    });


</script>

@endsection

@section('footer')
    {{-- null footer --}}
@endsection
