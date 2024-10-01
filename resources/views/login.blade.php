@extends('layouts.layout')

@section('title') Login - @endsection

<!-- Login Form -->
@section('contents')
<div class="h1 pb-10 flex bg-gray-900 min-h-screen justify-center items-center">
    <div class="container justify-around ">
        <div class="w-full justify-around items-center  flex">
            <div class="card bg-black w-2/6 rounded overflow-hidden mt-7">
                <div class="min-w-screen bg-gray-900 flex items-center justify-center px-5 py-5">
                    <div class="bg-gray-100 text-gray-500 rounded-3xl shadow-xl w-full overflow-hidden" style="max-width:1000px">
                        <div class="md:flex w-full">
                            <div class="w-full py-10 px-5 md:px-10">
                                <div class="text-center mb-10">
                                    <h1 class="font-bold text-3xl text-gray-900">User Login</h1>
                                </div>
                            <div>
                            <div class="flex -mx-3">
                                <div class="w-full px-3 mb-5">
                                    <label for="" class="text-xs font-semibold px-1">Email</label>
                                    <div class="flex">
                                        <input type="email" class="w-full  pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="example@gmail.com">
                                    </div>
                                </div>
                            </div>
                            <div class="flex -mx-3">
                                <div class="w-full px-3 mb-12">
                                    <label for="" class="text-xs font-semibold px-1">Password</label>
                                    <div class="flex">
                                        <input type="password" class="w-full  pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="************">
                                    </div>
                                </div>
                            </div>
                              <div class="flex -mx-3">
                                <div class="w-full px-3 mb-5">
                                    <button class="block w-full max-w-xs mx-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold">LOGIN</button>
                                </div>
                              </div>
                            </div>
                         </div>
                     </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
 </div>


</div>
@endsection