@extends('staff.layout.layout')



@section('content')

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
          Loading NovaFix.....
        </div>

        <!-- Sidebar -->
        <div
          x-transition:enter="transform transition-transform duration-300"
          x-transition:enter-start="-translate-x-full"
          x-transition:enter-end="translate-x-0"
          x-transition:leave="transform transition-transform duration-300"
          x-transition:leave-start="translate-x-0"
          x-transition:leave-end="-translate-x-full"
          x-show="isSidebarOpen"
          class="fixed inset-y-0 z-10 flex w-80"
        >
          <!-- Curvy shape -->
          <svg class="absolute inset-0 w-full h-full text-white" style="filter: drop-shadow(10px 0 10px #00000030)" preserveAspectRatio="none" viewBox="0 0 309 800" fill="currentColor" xmlns="http://www.w3.org/2000/svg" > <path d="M268.487 0H0V800H247.32C207.957 725 207.975 492.294 268.487 367.647C329 243 314.906 53.4314 268.487 0Z" />
          </svg>
          <!-- Sidebar content -->
          <div class="z-10 flex flex-col flex-1">
            <div class="flex items-center justify-between flex-shrink-0 w-64 p-4">
              <!-- Logo -->
              <h1 class="fw-bold text-dark">NovaFix</h1>
              <!-- Close btn -->
              <button @click="isSidebarOpen = false" class="p-1 rounded-lg focus:outline-none focus:ring">
                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" ><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
                <span class="sr-only">Close sidebar</span>
              </button>
            </div>
            <nav class="flex flex-col flex-1 w-64 p-4 mt-4">
              <a href="#" class="flex items-center space-x-2"> 
                <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" > <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" /> </svg>
                <span>Home</span>
              </a>
              <a href="#" class="flex items-center space-x-2 text-[20px] mt-3"> 
                <img src="	https://www.svgrepo.com/show/507012/clo-bowler.svg" class="h-6 w-6" alt="">
                <span>Manage Staffs</span>
              </a>
              <a href="#" class="flex items-center space-x-2 text-[25px] mt-3"> 
                <img src="	https://www.svgrepo.com/show/507012/clo-bowler.svg" class="h-6 w-6" alt="">
                <span>Manage Staffs</span>
              </a>
              <a href="#" class="flex items-center space-x-2 text-[29px] mt-3"> 
                <img src="	https://www.svgrepo.com/show/507012/clo-bowler.svg" class="h-6 w-6" alt="">
                <span>Manage Staffs</span>
              </a>
              <a href="#" class="flex items-center space-x-2 text-[24px] mt-3"> 
                <img src="	https://www.svgrepo.com/show/507012/clo-bowler.svg" class="h-6 w-6" alt="">
                <span>Manage Staffs</span>
              </a>
              <a href="#" class="flex items-center space-x-2 text-[21px] mt-3"> 
                <img src="	https://www.svgrepo.com/show/507012/clo-bowler.svg" class="h-6 w-6" alt="">
                <span>Manage Staffs</span>
              </a>
              <a href="#" class="flex items-center space-x-2 text-[18px] mt-3"> 
                <img src="	https://www.svgrepo.com/show/507012/clo-bowler.svg" class="h-6 w-6" alt="">
                <span>Manage Staffs</span>
              </a>
              <a href="#" class="flex items-center space-x-2 text-[17px] mt-3"> 
                <img src="	https://www.svgrepo.com/show/507012/clo-bowler.svg" class="h-6 w-6" alt="">
                <span>Manage Staffs</span>
              </a>
              <a href="#" class="flex items-center space-x-2 text-[17px] mt-3"> 
                <img src="	https://www.svgrepo.com/show/507012/clo-bowler.svg" class="h-6 w-6" alt="">
                <span>Manage Staffs</span>
              </a>
              <a href="#" class="flex items-center space-x-2 text-[17px] mt-3"> 
                <img src="	https://www.svgrepo.com/show/507012/clo-bowler.svg" class="h-6 w-6" alt="">
                <span>Manage Staffs</span>
              </a>
              <a href="#" class="flex items-center space-x-2 text-[17px] mt-3"> 
                <img src="	https://www.svgrepo.com/show/507012/clo-bowler.svg" class="h-6 w-6" alt="">
                <span>Abhi kaam banki h 😢</span>
              </a>
            </nav>
            <div class="flex-shrink-0 p-4">
              <button class="flex items-center space-x-2">
                <svg aria-hidden="true" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" > <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" /> </svg>
                <span>Logout</span>
              </button>
            </div>
          </div>
        </div>
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
                         <h1 class="title-font lg:4xl  text-[40px] mb-2 mt-10 font-medium text-gray-200">Staff Panel</h1>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.8.1/alpine.js"></script>
    <script>
        const setup = () => {
        return {
                isSidebarOpen: true,
            }
        }
    </script>

    </nav>
  </div>



</div>

@endsection