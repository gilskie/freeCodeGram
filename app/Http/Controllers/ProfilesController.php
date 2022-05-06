<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Cache;
use App\Models\User;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    // public function index($user)
    // {
    //     $user = User::findOrFail($user);
        
    //     return view('profiles.index', [
    //         'user' => $user,
    //     ]);
    // }
    public function index(User $user)
    {

        $follows = (auth()->check()) ? auth()->user()->following->contains($user->id) : false;
        
        $postCount = Cache::remember(
            'count.post.'.$user->id, 
            now()->addSeconds(30), 
            function () use ($user) {
                return $user->posts->count();
            });

        $followersCount = Cache::remember(
            'count.followers.'.$user->id, 
            now()->addSeconds(30), 
            function () use ($user) {
                
                return $user->profile->followers->count();
            });

        $followingCount = Cache::remember(
            'count.following.'.$user->id, 
            now()->addSeconds(30), 
            function () use ($user) {
                return $user->following->count();
            });
            
        
        return view('profiles.index', compact('user', 'follows', 'postCount', 'followersCount', 'followingCount'));
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => '',
        ]);

        
        if(request('image'))
        {
            $imagePath = request('image')->store('profile', 'public');
            
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(400, 400);
            $image->save();

            $imageArray = ['image' => $imagePath];
        }

        // dd(array_merge(
        //     $data,
        //     ['image' => $imagePath]
        // ));
        
        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? [],
        ));

        return redirect("/profile/{$user->id}");
        // dd($data);
    }
}
