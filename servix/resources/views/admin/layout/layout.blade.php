<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>
<body>
@section('header')
<nav>
    <header class="text-white bg-[#222021] body-font">
      <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
        <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
          <a href="{{route('home')}}">
          <span class="ml-8 text-xl hover:text-gray-300">Servix</span>
          </a>
        </a>
        <nav class="md:ml-auto md:mr-auto flex flex-wrap items-center text-base justify-center">
          <a class="mr-5 hover:text-gray-300"></a>
          <a class="mr-5 hover:text-gray-300"></a>
          <a class="mr-5 hover:text-gray-300"></a>
          <a class="mr-5 hover:text-gray-300"></a>
        </nav>
       </div>
    </header>
</nav>
@show

@section('contents')
<!-- write a cool code for contents -->
@show
    

<script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.8.1/alpine.js"></script>
<script>
    const setup = () => {
    return {
            isSidebarOpen: false,
        }
    }
</script>

</body>
</html>