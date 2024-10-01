<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>
    
<div class="h1 pb-10 flex bg-gray-900 min-h-screen justify-center items-center mt-12">
        <div class="container justify-around ">
            <div class="w-full justify-around items-center  flex">
                <div class="card bg-black w-5/6 rounded overflow-hidden mt-7">
                    <div class="min-w-screen bg-gray-900 flex items-center justify-center px-5 py-5">
                        <div class="bg-gray-100 text-gray-500 rounded-3xl shadow-xl w-full overflow-hidden"
                            style="max-width:1000px">
                            <div class="md:flex w-full">
                                <div class="w-full py-10 px-5 md:px-10">
                                    <div class="text-center mb-10">
                                        <h1 class="font-bold text-3xl text-gray-900">Service Request</h1>
                                    </div>
                                    <div>
                                        <form action="{{route('request.create') }}" method="POST">
                                            @csrf

                                            <div class="flex -mx-3">
                                                <div class="w-full px-3 mb-5">
                                                    <label for="" class="text-xs font-semibold px-1">Owner Name</label>
                                                    <div class="flex">
                                                        <input type="text" name="owner_name" class="w-full  pl-5 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500">
                                                    </div>
                                                </div>
                                                <div class="w-full px-3 mb-4">
                                                    <label for="" class="text-xs font-semibold px-1">Product Name</label>
                                                    <div class="flex">
                                                        <input type="text" name="product_name" class="w-full  pl-3 pr-1 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex -mx-3">
                                                <div class="w-full px-3 mb-5">
                                                    <label for="" class="text-xs font-semibold px-1">Brand</label>
                                                    <div class="flex">
                                                        <input type="text" name="brand" class="w-full  pl-5 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500">
                                                    </div>
                                                </div>
                                                <div class="w-full px-3 mb-4">
                                                    <label for="inputState" class="text-black-100">Type</label>
                                                    <div class="flex w-full">
                                                        {{-- <input type="text" name="type" class="w-full  pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder=""> --}}
                                                        <select id="inputState" name="type"
                                                            class=" w-full  pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500">
                                                            <option selected>Choose...</option>
                                                            <option>Mobile</option>
                                                            <option>Laptop</option>
                                                            <option>Assessories</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="w-full px-3 mb-4">
                                                    <label for="" class="text-xs font-semibold px-1">Serial No</label>
                                                    <div class="flex">
                                                        <input type="text" name="serial_no" class="w-full  pl-3 pr-1 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex -mx-3">
                                                <div class="w-full px-3 mb-5">
                                                    <label for="" class="text-xs font-semibold px-1">MAC</label>
                                                    <div class="flex">
                                                        <input type="text" name="MAC" class="w-full  pl-5 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500">
                                                    </div>
                                                </div>
                                                <div class="w-full px-3 mb-5">
                                                    <label for="" class="text-xs font-semibold px-1">Delvired By</label>
                                                    <div class="flex">
                                                        <input type="text" name="delivered_by" class="w-full  pl-5 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500">
                                                    </div>
                                                </div>
                                                <div class="w-full px-3 mb-4">
                                                    <label for="" class="text-xs font-semibold px-1">Estimate Delivery</label>
                                                    <div class="flex">
                                                        <input type="text" name="estimate_delivery" class="w-full  pl-3 pr-1 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex -mx-3">
                                                <div class="w-full px-3 mb-5">
                                                    <label for="" class="text-xs font-semibold px-1">Data Of Delivery</label>
                                                    <div class="flex">
                                                        <input type="text" name="date_of_delivery" class="w-full  pl-5 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500">
                                                    </div>
                                                </div>
                                                <div class="w-full px-3 mb-5">
                                                    <label for="" class="text-xs font-semibold px-1">Data Of Creation</label>
                                                    <div class="flex">
                                                        <input type="text" name="date_of_creation" class="w-full  pl-5 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500">
                                                    </div>
                                                </div>
                                                <div class="w-full px-3 mb-4">
                                                    <label for="" class="text-xs font-semibold px-1">Last Update</label>
                                                    <div class="flex">
                                                        <input type="text" name="last_update" class="w-full  pl-3 pr-1 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex -mx-3">
                                                <div class="w-full px-3 mb-4">
                                                    <label for="" class="text-xs font-semibold px-1">Color</label>
                                                    <div class="flex">
                                                        <input type="text" name="color"
                                                            class="w-full  pl-3 pr-1 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500">
                                                    </div>
                                                </div>
                                                <div class="w-full px-3 mb-4">
                                                    <label for="" class="text-xs font-semibold px-1">Status</label>
                                                    <div class="flex">
                                                        <input type="text" name="status"
                                                            class="w-full  pl-3 pr-1 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"
                                                            value="processing..">
                                                    </div>
                                                </div>
                                                <div class="w-full px-3 mb-4">
                                                    <label for="" class="text-xs font-semibold px-1">Remark</label>
                                                    <div class="flex">
                                                        <input type="text" name="remark"
                                                            class="w-full  pl-3 pr-1 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex -mx-3">
                                                <div class="w-full px-3 mb-5">
                                                    <label for="" class="text-xs font-semibold px-1">Problem</label>
                                                    <div class="flex">
                                                        <textarea type="text" name="problem"
                                                            class="w-full cols-12 pl-3 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex -mx-3">
                                                <div class="w-full px-3 mb-5">
                                                    <button
                                                        class="block w-full max-w-xs mx-auto bg-indigo-500 hover:bg-indigo-700 focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold">Submit</button>
                                                </div>
                                            </div>
                                        </form>
                                        <div class="flex -mx-3">
                                            <div class="w-full px-3 mb-5">
                                                <div class="text-center items-center flex justify-center">
                                                    <span class="text-xs">Is New user ? </span>
                                                    <span class="font-semibold text-blue-600 mx-2"><a href="">-
                                                            Register User</a></span>
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


<!-- , , date_of_creation, , estimate_delivery_date , -->
<!-- problem -->
<!-- technician_id -->

</body>
</html>