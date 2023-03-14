@extends('layouts.layout')


<!-- Homepage Contents are here -->
@section('contents')
<section class="text-gray-600 body-font mt-5">
  <div class="container mx-auto flex flex-col px-5 pb-24 pt-10 justify-center items-center">
    <div class="h-[520px] w-full bg-green-800 items-center justify-center">
        <img class="w-full mb-10 object-cover object-center rounded w-full bg-green-700 items-center justify-center h-full" alt="logo" src="{{asset('img/servixhomeImg.jpg')}}">
    </div>
    <div class="w-full md:w-5/6 flex flex-col mb-16 items-center justify-center text-center">
      <h1 class="title-font lg:4xl text- text-[40px] mb-2 mt-10 font-medium text-gray-900">WHY CHOOSE US</h1>
      <p>Some Of Our Features</p>
      <div class="flex border px-20 py-12 gap-4 w-full justify-around">

        <button class="bg-gray-100 h-[250px] w-3/12 flex py-3 px-5 rounded-lg items-center hover:bg-gray-200 focus:outline-none">
            <span class="flex-col">
                <span class="flex items-start">
                    <span>

                    </span>
                    <span class="text-gray-900">PERSONALIZED SERVICES</span>
                </span>
              <span class="ml-4 flex items-start flex-col leading-none">
                <span class="text-xs text-gray-600 mb-1">Customized Service Solutions designed with best practices</span>
              </span>
            </span>
        </button>

        <button class="bg-gray-100 h-[250px] w-3/12 inline-flex py-3 px-5 rounded-lg items-center hover:bg-gray-200 focus:outline-none">
            <span class="flex-col">
                <span class="flex items-start">
                    <span>

                    </span>
                    <span class="text-gray-900">FLEXIBLE SUPPORT</span>
                </span>
              <span class="ml-4 flex items-start flex-col leading-none">
                <span class="text-xs text-gray-600 mb-1">Service at your home or pick up the device for repair at our facility and return</span>
              </span>
            </span>
        </button>

        <button class="bg-gray-100 h-[250px] w-3/12 inline-flex py-3 px-5 rounded-lg items-center hover:bg-gray-200 focus:outline-none">
            <span class="flex-col">
                <span class="flex items-start">
                    <span>

                    </span>
                    <span class="text-gray-900">ACE SUPPORT</span>
                </span>
              <span class="ml-4 flex items-start flex-col leading-none">
                <span class="text-xs text-gray-600 mb-1">One stop shop for repairing all your electronic gadgets</span>
              </span>
            </span>
        </button>

        <button class="bg-gray-100 h-[250px] w-3/12 inline-flex py-3 px-5 rounded-lg items-center ml-4 hover:bg-gray-200 focus:outline-none">
            <span class="flex-col">
                <span class="flex items-start">
                    <span>

                    </span>
                    <span class="text-gray-900">QUALITY DNA</span>
                </span>
              <span class="ml-4 flex items-start flex-col leading-none">
                <span class="text-xs text-gray-600 mb-1">ISO 9001; 2015 certified service setup that you can depend on quality services
                    SERVICE PROCESS</span>
              </span>
            </span>
        </button>

      </div>
    </div>
  </div>
</section>
@endsection