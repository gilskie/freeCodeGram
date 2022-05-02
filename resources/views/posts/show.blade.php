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
                <div class="d-flex align-items-center">
                    <div>
                        <img src="{{ $post->user->profile->profileImage() }}" alt="" class="w-50 rounded-circle" style="max-width: 200px;">
                    </div>
                    <div class="d-flex">
                        <!-- <h5 class="fw-bold"> -->
                        <a href="/profile/{{ $post->user->id }}" style="text-decoration:none;">
                            <span class="text-dark fw-bold">{{ $post->user->username }}</span>
                        </a>
                        &nbsp;|&nbsp;
                        <a href="#" class="alert-link" style="text-decoration:none;">Follow</a>
                        
                        
                    </div>
                </div>

                <hr class="">

                <p> 
                    <span class="fw-bold">{{ $post->user->username }}</span> 
                    {{ $post->caption }}
                </p>

            </div>
        </div>
    </div>
</div>
@endsection