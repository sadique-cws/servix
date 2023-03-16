@extends('layouts.layout')


<!-- All Data of Database appears here -->

@section('contents')

<section>
    <div class="justify-around items-center h-auto w-full bg-[#363636] ">
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

@endsection