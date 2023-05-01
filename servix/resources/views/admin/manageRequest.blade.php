@extends('admin.layout.base')

@section('title')
    Manage Requests
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            
                {{-- <livewire:component /> --}}
                @livewire('view-request')
               
                <!-- /.card-body -->

                <!-- /.card -->
            </div> 
        </div>
    @endsection
