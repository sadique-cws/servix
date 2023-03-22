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
                        <h2 class="text-2xl text-white">Manage Staff</h2>
                        <a href="{{route('admin.staff.create')}}" class="bg-teal-600 text-white px-3 py-2 rounded">Add Staff</a>
                    </div>
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
                            @foreach ($staffs as $item)
                                <tr>
                                    <td class="border border-slate-700 p-1.5 pl-10">{{$item.id}}</td>
                                    <td class="border border-slate-700 p-1.5 pl-10">Realme</td>
                                    <td class="border border-slate-700 p-1.5 pl-10">Mobile phone</td>
                                    <td class="border border-slate-700 p-1.5 pl-10">M987 xyz...</td>
                                    <td class="border border-slate-700 p-1.5  items-center justify-center flex ">
                                    <button class=" bg-green-200 rounded p-1 px-2 text-gray-700">View details</button>
                                    </td>
                                </tr>
                            @endforeach
                          
                         
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