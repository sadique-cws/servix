@extends('admin.layout.base')


@section('content')
<div class=" w-50 d-flex justify-content-center">
    <div class="modal-content ">
        <div class="modal-header flex-column">
            <button type="button" class="close"  >
                <span ></span>
            </button>
            <h5 class="modal-title" id="exampleModalLongTitle"> <span class="font-weight-bold">From:</span> <span class="">{{$item->first_name}}</span></h5>
            @if($item->company)
            <div style="margin-top: -10px ">
                 <span class="text-muted"> {{$item->company}}</span>
             </div>
            @endif
        </div>
        <div class="modal-body">
            <div class="">
                <span  class="font-weight-bold">Subject:</span> <span>{{$item->subject}}</span>  
            </div>
            <div class="">
                <div class="border p-4 " style="border-radius: 20px;background-color: #ffe6df">
                    <p class="font-weight-bold">Query:</p>
                    <div class="px-5 py-0 text-lg fs-1">{{$item->message}}
                    </div>
                    <div class="px-5 py-0 text-md mt-3"><span class="font-weight-bold">Heared from</span> : {{$item->inspired_from}}</div>
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