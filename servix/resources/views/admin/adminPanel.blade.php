{{-- @extends('admin.layout.layout')



@section('contents')

<div class="container-fluid flex">
  <div class="w-full bg-gray-300">
    <nav class="">

    <!-- component -->
    <div x-data="setup()" x-init="$refs.loading.classList.add('hidden');">
      <div class="flex h-screen antialiased text-gray-900 bg-gray-900 w-full p-0 m-0 dark:bg-dark dark:text-light">
        <!-- Loading screen -->
        <div
          x-ref="loading"
          class="fixed inset-0 z-50 flex items-center justify-center text-2xl font-semibold text-white bg-blue-600"
        >
          Loading servixc.....
        </div>

       @include('admin.layout.side')
       
        <main class="flex items-center justify-center w-full">
          <!-- Page content -->
          <button @click="isSidebarOpen = true" class="fixed p-2 text-white bg-black rounded-lg top-5 left-5">
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
            <span class="sr-only">Open menu</span>
          </button>
          <h1 class="sr-only">Home</h1>

        <!-- DashBoard Body Section -->
          <div class="w-full px-16">
            <section>
                <div class="justify-around items-center h-auto w-full p-0 bg-[#363636] ">
                    <div class="w-full flex flex-col  items-center justify-center text-center">
                         <h1 class="title-font lg:4xl  text-[40px] mb-2 mt-10 font-medium text-gray-200">Admin Panel</h1>
                        <div class="flex px-20 py-12 gap-4 w-full justify-around">
                            <button class="bg-green-200 h-[250px] w-3/12 flex py-2 px-5  rounded-lg items-center hover:bg-gray-200 focus:outline-none">
                                <span class="flex-col text-center w-full">
                                    <span class="flex text-center flex-col items-center">
                                        <span>
                                            <img height="100px" width="100px" class="-mt-9" src="https://www.svgrepo.com/show/508388/knight.svg" alt="">
                                        </span>
                                        <span class="text-gray-900 text-[27px] font-semibold text-center">New Requests</span>
                                    </span>
                                  <span class="ml-4 flex mt-2 flex-col leading-none">
                                    <span class="text-lg text-gray-600 mb-1">Number</span>
                                  </span>
                                </span>
                            </button>

                            <button class="bg-blue-300 h-[250px] w-3/12 flex py-2 px-5  rounded-lg items-center hover:bg-blue-200 focus:outline-none">
                                <span class="flex-col text-center w-full">
                                    <span class="flex text-center flex-col items-center">
                                        <span>
                                            <img height="100px" width="100px" class="-mt-9" src="https://www.svgrepo.com/show/506993/cel-rings-love.svg" alt="">
                                        </span>
                                        <span class="text-gray-900 text-[27px] font-semibold text-center">Confirmed Requests</span>
                                    </span>
                                  <span class="ml-4 flex mt-2 flex-col leading-none">
                                    <span class="text-lg text-gray-600 mb-1">Number</span>
                                  </span>
                                </span>
                            </button>

                            <button class="bg-red-600 h-[250px] w-3/12 flex py-2 px-5  rounded-lg items-center hover:bg-red-500 focus:outline-none">
                                <span class="flex-col text-center text-white w-full">
                                    <span class="flex text-center flex-col items-center">
                                        <span>
                                            <img height="100px" width="100px" class="-mt-9" src="https://www.svgrepo.com/show/508291/cross.svg" alt="">
                                        </span>
                                        <span class="text-white text-[27px] font-semibold text-center">Rejected Requests</span>
                                    </span>
                                  <span class="ml-4 flex mt-2 flex-col leading-none">
                                    <span class="text-lg mb-1">Number</span>
                                  </span>
                                </span>
                            </button>

                            <button class="bg-green-500 h-[250px] w-3/12 flex py-2 px-5  rounded-lg items-center hover:bg-green-400 focus:outline-none">
                                <span class="flex-col text-center w-full">
                                    <span class="flex text-center flex-col items-center">
                                        <span>
                                            <img height="100px" width="100px" class="-mt-9" src="https://www.svgrepo.com/show/507074/db-copy.svg" alt="">
                                        </span>
                                        <span class="text-white text-[27px] font-semibold text-center">Completed Requests</span>
                                    </span>
                                  <span class="ml-4 flex mt-2 flex-col leading-none">
                                    <span class="text-lg text-white mb-1">Number</span>
                                  </span>
                                </span>
                            </button>

                        </div>
                    </div> 
                </div>
                <!-- Update Contentss according to links -->
                <div class="container-fluid">
                  <div class=" w-full h-[300px] bg-gray-800 px-12 py-10">
                      <table class="border-collapse border border-slate-500 w-full text-gray-400">
                        <thead>
                          <tr>
                            <th class="border border-slate-600 ...">Product Id</th>
                            <th class="border border-slate-600 ...">Product Name</th>
                            <th class="border border-slate-600 ...">Product Type</th>
                            <th class="border border-slate-600 ...">serial no</th>
                            <th class="border border-slate-600 ...">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="border border-slate-700 p-1.5 pl-10">1</td>
                            <td class="border border-slate-700 p-1.5 pl-10">Realme</td>
                            <td class="border border-slate-700 p-1.5 pl-10">Mobile phone</td>
                            <td class="border border-slate-700 p-1.5 pl-10">M987 xyz...</td>
                            <td class="border border-slate-700 p-1.5  items-center justify-center flex ">
                              <button class=" bg-green-200 rounded p-1 px-2 text-gray-700">View details</button>
                            </td>
                          </tr>
                          <tr>
                            <td class="border border-slate-700 p-1.5 pl-10">2</td>
                            <td class="border border-slate-700 p-1.5 pl-10">Realme</td>
                            <td class="border border-slate-700 p-1.5 pl-10">Mobile phone</td>
                            <td class="border border-slate-700 p-1.5 pl-10">M987 xyz...</td>
                            <td class="border border-slate-700 p-1.5  items-center justify-center flex ">
                              <button class=" bg-green-200 rounded p-1 px-2 text-gray-700">View details</button>
                            </td>
                          </tr>
                          <tr>
                            <td class="border border-slate-700 p-1.5 pl-10">3</td>
                            <td class="border border-slate-700 p-1.5 pl-10">Realme</td>
                            <td class="border border-slate-700 p-1.5 pl-10">Mobile phone</td>
                            <td class="border border-slate-700 p-1.5 pl-10">M987 xyz...</td>
                            <td class="border border-slate-700 p-1.5  items-center justify-center flex ">
                              <button class=" bg-green-200 rounded p-1 px-2 text-gray-700">View details</button>
                            </td>
                          </tr>
                          <tr>
                            <td class="border border-slate-700 p-1.5 pl-10">4</td>
                            <td class="border border-slate-700 p-1.5 pl-10">Realme</td>
                            <td class="border border-slate-700 p-1.5 pl-10">Mobile phone</td>
                            <td class="border border-slate-700 p-1.5 pl-10">M987 xyz...</td>
                            <td class="border border-slate-700 p-1.5  items-center justify-center flex ">
                              <button class=" bg-green-200 rounded p-1 px-2 text-gray-700">View details</button>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                  </div>
                </div>
              </section>
            </div>
          
        </main>
      </div>
    </div>


    </nav>
  </div>



</div>

@endsection --}}
