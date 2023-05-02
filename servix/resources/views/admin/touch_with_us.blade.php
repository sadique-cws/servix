@extends('admin.layout.base')
@section('title')
    Touch with us request 
@endsection

@section('content')


<div class=" " style="justify-items: center; display: flex; justify-content: center">
    {{ $new->links() }}
</div>    
@endsection