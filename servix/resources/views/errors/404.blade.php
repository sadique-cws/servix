<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404 - {{env('APP_NAME')}}</title>
    <link rel="stylesheet" href="{{asset('index.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('js/lottie.js') }}"></script>

</head>
<body class="bg-purple-300">
    <div class="container">
        <div class="row h-screen group ">
            <div class="py-3">
                <a href="{{ route('home') }}">
                    <img src="Assets/logo-black.png" class="img-logo"/>
                </a>
            </div>
            <div class="m-auto p-auto justify-items-center justify-content-center align-items-center ">
                <div class="h-full  w-full items-center self-center justify-center text-center overflow-hidden">
                    <h1 class="text-[80px] md:tracking-[100px] tracking-[40px] md:translate-x-[30px] translate-x-[20px] transition-all scale-110 duration-500 ease-in-out ">404</h1>
                     <div id="error-animation" class="h-[400px]  self-center w-full"></div>
                    <h1 class="text-[23px] hover:scale-110 duration-300 ease-in-out hover:text-red-900 font-semibold ">Something went wrong!</h1>
                    <div class="p-5 m-1 overflow-hidden transition-all duration-500 ease-in-out translate-y-0">
                        <button class="text-[20px] bg-[#ffc800] drop-shadow-xl text-slate-700 font-semibold tracking-[3px] transition-all duration-300 ease-in-out px-4 py-2 rounded-lg tracking-[widest] text-center self-center hover:scale-110 active:scale-125 "> <a href="{{ url()->previous() }}">↼ Go Back</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>
    var showErrorAnimation = document.getElementById('error-animation');

    var animation = lottie.loadAnimation({
        container: showErrorAnimation,
        renderer: 'svg',
        loop: true,
        autoplay: true,
        path: '{{ asset('img/errorAnimation.json') }}'
    });
</script>

</body>
</html>