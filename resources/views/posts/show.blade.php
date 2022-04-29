@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{ $post->image }}" alt="" class="w-100">
        </div>

        <div class="col-4">
            <div class="div">
                <!-- <h3>{{ $post->user->username }}</h3> -->
                <div>
                    <img src="/storage/{{ $post->user->profile->image }}" alt="" class="w-50 rounded-circle">
                </div>
                <div>
                    <h5>{{ $post->user->username }}</h5>
                </div>
                <p>{{ $post->caption }}</p>
            </div>
        </div>
    </div>
</div>
@endsection