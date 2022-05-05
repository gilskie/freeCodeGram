@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="{{ $user->profile->profileImage() }}" style="height: 60%; width: 50%;" alt="" class="rounded-circle">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center pb-3" style="">
                    <div class="h4">{{ $user->username }}</div>

                    <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                </div>

                @can('update', $user->profile)
                <a href="/p/create">Add new post</a>
                @endcan

            </div>
            <div>
                @can('update', $user->profile)
                    <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
                @endcan
            </div>
            <div class="d-flex">
                <div class="" style="padding-right: 10px;"><strong>{{ $postCount }}</strong> posts</div>
                <div class="" style="padding-right: 10px;"><strong>{{ $followersCount }}</strong> followers</div>
                <div class="" style="padding-right: 10px;"><strong>{{ $followingCount }}</strong> following</div>
            </div>
            <div class="pt-4" style="font-weight: bold;">{{ $user->profile->title ?? '' }}</div>
            <div>{{ $user->profile->description ?? '' }}</div>
            <div><a href="{{ $user->profile->url ?? '' }}">{{ $user->profile->url ?? '' }}</a></div>
        </div>
    </div>
    <div class="row" style="padding-top: 100px;">
        @foreach($user->posts as $post)
            <div class="col-4 text-center pb-4">
                <a href="/p/{{ $post->id }}">
                    <img src="/storage/{{ $post->image }}" alt="">
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection