@extends('admin.layout.base')


@section('content')
<div class=" d-flex justify-content-center px-lg-5 mx-lg-5 py-lg-4 p-2">
    <div class="modal-content ">
        {{-- <div class="">
            <a href="{{url()->previous()}}" type="button" class=""  >
                <i class="fa fa-arrow-left"></i> 
            </a>
        </div> --}}
        <div class="modal-header flex-column">
            <div class="div">
                <h5 class="modal-title" id="exampleModalLongTitle"> <span class="font-weight-bold">From:</span> <span class="">{{$item->first_name}} @if($item->last_name) {{$item->last_name}} @endif</span></h5>
                @if($item->company)
                <div style="margin-top: -10px ">
                    <span class="text-muted"> {{$item->company}}</span>
                </div>
                @endif
            </div>

        </div>

        <div class="modal-body">
            <div class="">
                <span  class="font-weight-bold">Subject:</span> <span>{{$item->subject}}</span>  
            </div>
            <div class="px-lg-5 px-1 py-3">
                <div class="border p-lg-4 p-2 py-3" style="border-radius: 20px;background-color: #cdeecd">
                    <p class="font-weight-bold">Query:</p>
                    <div class="px-5 py-0 text-lg fs-1">{{$item->message}}
                    </div>
                    <div class="px-5 py-0 text-md mt-3"><span class="font-weight-bold">Refferal</span> : {{$item->inspired_from}}</div>
                </div>
               <div class="px-4 py-3">
                <div class="text-lg">user details:</div>
                <div class="">- Email: <span>{{$item->email}}</span></div>
                <div class="">- Phone: <span>{{$item->contact}}</span></div>
                <div class=""></div>
               </div>
            </div>
            
        </div>
        

    </div>
</div>
@endsection