@extends('layouts.app')

@section('content')
<div class="container">
    
    @if (count($posts) == 0)
        <div class="row">
            <div class="d-flex justify-content-center">
                <h2>Nothing to display.</h2>
            </div>
        </div>
        <div class="row">
            <div class="d-flex justify-content-center">
                <h4>Follow profiles to start seeing updates from them.</h4>
            </div>
        </div>
    @else
        @foreach ($posts as $post)
        <div class="row">
            <div class="col-7 offset-3">
                <a href="/profile/{{ $post->user->id }}" class="href">
                    <img src="/storage/{{ $post->image }}" alt="" class="">
                </a>
            </div>
        </div>
        <div class="row pt-2 pb-4">
            <div class="col-7 offset-3">
                <div class="div">
                    {{-- <!-- <h3>{{ $post->user->username }}</h3> -->
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
                    </div> --}}

                    

                    <p> 
                        <a href="/profile/{{ $post->user->id }}" style="text-decoration:none;">
                            <span class="text-dark fw-bold">{{ $post->user->username }}</span>
                        </a>
                        {{ $post->caption }}
                    </p>

                </div>
            </div>
        </div>
        @endforeach

        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        </div>
        
    @endif
</div>
@endsection