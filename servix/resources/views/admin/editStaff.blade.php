@extends('admin.layout.layout')



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

        <!-- Sidebar -->
        @include("admin.layout.side")
        
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
                <!-- Update Contentss according to links -->
                <div class="container-fluid">
                  <div class="flex justify-between">
                    <h2 class="text-2xl text-white">Insert Staff</h2>
                    <a href="{{route('admin.staff.manage')}}" class="bg-teal-600 text-white px-3 py-2 rounded">Go Back</a>
                  </div>
                  <div class=" w-full h-[300px] bg-gray-800 px-12 py-10">
                     {{-- form here --}}
                     
                                              <form action="{{route('admin.staff.store')}}" method="post">
                                                  @csrf
                                                  <div class="flex">
                                                      <div class="w-full px-3 mb-5">
                                                          <label for="" class="text-xs font-semibold px-1 text-white">Name</label>
                                                          <div class="flex">
                                                              <input type="text" name="name" class="w-full  pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="">
                                                          </div>
                                                      </div>
                                                      <div class="w-full px-3 mb-5">
                                                          <label for="" class="text-xs font-semibold px-1 text-white">Email</label>
                                                          <div class="flex">
                                                              <input type="email" name="email" class="w-full  pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="example@gmail.com">
                                                          </div>
                                                      </div>
                                                      <div class="w-full px-3 mb-5">
                                                          <label for="" class="text-xs font-semibold px-1 text-white">Contact</label>
                                                          <div class="flex">
                                                              <input type="number" name="contact" class="w-full  pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="">
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="flex">
                                                      <div class="w-full px-3 mb-5">
                                                          <label for="" class="text-xs font-semibold px-1 text-white">Salary</label>
                                                          <div class="flex">
                                                              <input type="text" name="salary" class="w-full  pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="">
                                                          </div>
                                                      </div>
                                                      <div class="w-full px-3 mb-5">
                                                          <label for="" class="text-xs font-semibold px-1 text-white">Addhar no</label>
                                                          <div class="flex">
                                                              <input type="text" name="addhar" class="w-full  pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="">
                                                          </div>
                                                      </div>
                                                      <div class="w-full px-3 mb-5">
                                                          <label for="" class="text-xs font-semibold px-1 text-white">Pan card no</label>
                                                          <div class="flex">
                                                              <input type="text" name="pan" class="w-full  pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="">
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="flex">
                                                      <div class="w-full px-3 mb-5">
                                                          <label for="" class="text-xs font-semibold px-1 text-white">Address</label>
                                                          <div class="flex">
                                                              <input type="text" name="salary" class="w-full  pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="">
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="flex">
                                                      <div class="w-full px-3 mb-5">
                                                          <label for="" class="text-xs font-semibold px-1 text-white">Password</label>
                                                          <div class="flex">
                                                              <input type="password" name="password" class="w-full  pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="">
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="flex">
                                                      <div class="w-full px-3 mb-5">
                                                          <div class="flex">
                                                            <input type="submit" name="submit" class="block w-full max-w-xs mx-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold"/>
                                                          </div>
                                                      </div>
                                                  </div>
                                                
                                              </form>
                                         
                     {{-- form end --}}

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
