@extends('admin.layouts.app')

@section('content')
<i class="fa-solid fa-arrow-left" onclick="history.back()"></i>
    <div class="mt-5">
        <div class="card-header">
            <div class="text-center">
                <img width="400px" class="rounded shadow py-3"
                @if ($post['image']==null) src="{{asset('default/default.png')}}"
                @else  src="{{asset('postImage/'.$post['image'])}}">
                @endif
            </div>
        </div>
        <div class="card-body">
            <h3 class="text-center">{{$post['title']}}</h3>
            <p class="text-start">{{$post['description']}}</p>
        </div>
    </div>
@endsection
