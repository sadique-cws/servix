@extends('layouts.layout')
@section('title')
{{ env('APP_NAME') }} - Track Request
@endsection
@section('contents')
    <div class="" style="margin-top: 10%">
        <!-- Button to Open the Modal -->

        <div class="text-center p-10">

            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6 mx-auto mt-5">
                        <div class="card" style="background: #eee">
                            <div class="card-body">
                                <form action="{{ route('track.status') }}" method="POST" class="text-center p-10">
                                    @csrf
                                    <h3 class="text-uppercase font-weight-bold">Enter Your Service Code</h3>
                                    <input type="search" oninput="this.value = this.value.toUpperCase()" name="search"
                                        placeholder="Enter 6 Character code" class="form-control text-center"
                                        style="margin-top: 5%" value={{ $searchStatus ? "$searchStatus" : '' }}>
                                    @error('search')
                                        <p class="alert alert-danger mt-2">{{ $message }}</p>
                                    @enderror
                                    @if (session('msg'))
                                        <p class="alert alert-danger mt-2">{{ session('msg') }}</p>
                                    @endif

                                    
                                    <button type="submit" class="btn btn-warning d-flex mx-auto btn-lg mt-2"> Track your
                                        order</button>
                                </form>
                            </div>
                        </div>

                        @if ($item != '')
                            <div class="card mb-3 mt-2">
                                <table class="table">
                                    <div>
                                        @if ($item->image)
                                            <img id="big-image" src="{{ asset('storage/uploads/' . $item->image) }}"
                                                style="display:none; width:60%; height:70%" class="img-thumbnail mx-auto">
                                        @else
                                            <span>No image found!</span>
                                        @endif
                                    </div>
                                    <tr>
                                        <th>Name</th>
                                        <td>{{ $item->owner_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Product</th>
                                        <td>{{ $item->product_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Contact</th>
                                        <td>*****{{ substr($item->contact, 4, 10) }}</td>
                                    </tr>
                                    <tr>
                                        <th>Brand</th>
                                        <td>{{ $item->brand }}</td>
                                    </tr>
                                    <tr>
                                        <th>Type</th>
                                        <td>{{ $item->type->typename }}</td>
                                    </tr>
                                    <tr>
                                        <th>Estimate Delivery Date</th>
                                        <td>{{ $item->estimate_delivery ? date('d M Y', strtotime($item->estimate_delivery)) : 'N/A' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th> Last Update</th>
                                        <td>{{ $item->updated_at ? date('d M Y', strtotime($item->updated_at)) : 'N/A' }}
                                        </td>
                                    </tr>
                                    <tr class="bg-light">
                                        <th>status</th>
                                        <th class="">
                                            <span class="font-weight-bold   rounded px-2 py-1
                                            " style="color:{{StatusColor($item->status)}}; ">{{ $item->getStatus() }}</span></th>
                                    </tr>
                                    <tr>
                                        <th>Remark</th>
                                        <td>{{ $item->remark }}</td>
                                    </tr>
                                    <tr>
                                        <th>Product Image</th>
                                        <td class="ripple" style="height:50%; width:50%">
                                            @if ($item->image)
                                                <img id="small-image" src="{{ asset('storage/uploads/' . $item->image) }}"
                                                    onclick="showBigImage()" style="height: 50px; width:50px;"
                                                    class="img-thumbnail">
                                            @else
                                                <span>No image found!</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Download Receipt</th>
                                        <td><a type="button" class="btn btn-primary btn-sm"
                                                href="{{ route('receipt.view', $item->id) }}">Download</a></td>
                                    </tr>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>



        </div>
    </div>
@endsection

@section('footer')
 
@endsection


<script>
    function showBigImage() {
        var smallImage = document.getElementById("small-image");
        smallImage.style.width = "30%";
        smallImage.style.height = "30%";

        var bigImage = document.getElementById("big-image");
        bigImage.src = smallImage.src;
        bigImage.style.display = "block";
    }
</script>
