@extends('admin.layout.base')
@section('title')
    Touch with us request 
@endsection

@section('content')
<div class="table">
    <div class="ml-3">
        <h4>Touch_with_us Request</h4>
    </div>
    <div class="card-body table-responsive p-0" style="height: 61vh !important">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
    
                    <th>id</th>
                    <th>Name</th>
                    <th>Contact</th>
    
                    <th>Email</th>
                    <th>Refferal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($touch_with_us as $item)
                    <tr style="background-color:{{($item->isRead)?" rgb(227 239 246)":null}}" >
    
                        <td class="text-uppercase">{{ $item->id }}</td>
                        <td>{{ $item->first_name }} @if($item-> last_name) {{$item-> last_name}} @endif </td>
                        <td>{{ $item->contact  }}</td>
    
                        <td>{{ $item->email }}</td>
                        <td>
                           {{$item->inspired_from}}
                        </td>
                       
                        <td>
    
                            <a  href="{{route('admin.messagesRead.req',$item->id)}}" 
                                class=" btn btn-info"><i class="fas fa-eye"></i> View</a>

                                {{-- Message View Page --}}

                            <div class="modal fade " id="view{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable " role="document">
                                    <div class="modal-content ">
                                        <div class="modal-header flex-column">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <h5 class="modal-title" id="exampleModalLongTitle"> <span class="font-weight-bold">From:</span> <span class="">{{$item->first_name}}</span></h5>
                                            @if($item->company)
                                            <div class="">
                                                 <span>{{$item->company}}</span>
                                             </div>
                                            @endif
                                        </div>
                                        <div class="modal-body">
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            
                                            {{-- <div class="flex-row col-12">
                                                <table class="table">
                                                    <tr>
                                                        <th>Service Code</th>
                                                        <td class="text-uppercase">{{ $item->id }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>First name</th>
                                                        <td>{{ $item->first_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Last Name</th>
                                                        <td>{{ $item->last_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Contact</th>
                                                        <td>{{ $item->contact }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Email</th>
                                                        <td>{{ $item->email }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>company</th>
                                                        <td>{{ $item->company ? "$item->company" : 'N/A' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Subject</th>
                                                        <td>{{$item->subject}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th> Message</th>
                                                        <td>{{ $item->message  }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th> inspired_from</th>
                                                        <td>{{ $item->inspired_from  }}</td>
                                                    </tr>
                                                   
                                                   
                                                </table>
                                            </div> --}}
                                        </div>
    
                                    </div>
                                </div>
                            </div>
    
                        </td>
                    </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
</div>


<div class=" " style="justify-items: center; display: flex; justify-content: center">
    {{ $touch_with_us->links() }}
</div>    
@endsection