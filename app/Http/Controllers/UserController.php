<?php

namespace App\Http\Controllers;

use App\Events\OurExampleEvent;
use App\Models\BlogPost;
use App\Models\Follow;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\Rule;
// use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManager;

class UserController extends Controller
{
    public function storeAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|max:3000',
        ]);
        $user = auth()->user();
        $filename = $user->id.'-'.uniqid().'.jpg';
        $imageManager = new ImageManager(new \Intervention\Image\Drivers\Imagick\Driver);
        $img = $imageManager->read($request->file('avatar'));
        $img->resize(120, 120);
        Storage::put('public/avatars/'.$filename, $img->toFile());
        $oldAvatar = $user->avatar;
        $user->avatar = $filename;
        $user->save();
        if ($oldAvatar != 'fallback-avatar.jpg') {
            Storage::delete(str_replace('/storage/', 'public/', $oldAvatar));
        }

        return back()->with('success', 'Your avatar has been updated');
    }

    public function showAvatarForm()
    {
        return view('avatar-form');
    }

    private function getSharedData($user)
    {
        $currentlyFollowing = 0;
        if (auth()->check()) {
            $currentlyFollowing = Follow::where([['user_id', '=', auth()->user()->id], ['followeduser', '=', $user->id]])->count();
        }

        View::share('sharedData', [
            'currentlyFollowing' => $currentlyFollowing,
            'avatar' => $user->avatar,
            'name' => $user->name,
            'postCount' => $user->posts()->count(),
            'followerCount' => $user->followers()->count(),
            'followingCount' => $user->followingTheseUsers()->count(),
        ]);
    }

    // NB below profile may be redundant

    public function profile(User $user)
    {
        $this->getSharedData($user);

        // return view('profile-posts',['posts'=> $user->posts()->latest()->get()]);
        return view('profile-posts', ['posts' => $user->posts()->latest()->paginate(10)]);  // spa does not work any longer
    }

    public function profileRaw(User $user)
    {
        return response()->json(['theHTML' => view('profile-posts-only', ['posts' => $user->posts()->latest()->get()])->render(), 'docTitle' => $user->name."'s profile"]);
    }

    public function profileFollowers(User $user)
    {
        $this->getSharedData($user);

        return view('profile-followers', ['followers' => $user->followers()->latest()->get()]);
    }

    public function profileFollowersRaw(User $user)
    {
        return response()->json(['theHTML' => view('profile-followers-only', ['followers' => $user->followers()->latest()->get()])->render(), 'docTitle' => $user->name."'s Followers"]);
    }

    public function profileFollowing(User $user)
    {
        $this->getSharedData($user);

        return view('profile-following', ['following' => $user->followingTheseUsers()->latest()->get()]);
    }

    public function profileFollowingRaw(User $user)
    {
        return response()->json(['theHTML' => view('profile-following-only', ['following' => $user->followingTheseUsers()->latest()->get()])->render(), 'docTitle' => 'Who'.$user->name.'follows']);
    }

    public function showCorrectHomepage()
    {
        if (auth()->check()) {
            return view('homepage-feed', ['posts' => auth()->user()->feedPosts()->latest()->paginate(10)]);
        } else {
            $postCount = Cache::remember('postCount', 20, function () {
                return BlogPost::count();
            });

            return view('homepage', ['postCount' => $postCount]);
        }
    }

    // public function logout()
    // {
    //     event(new OurExampleEvent(['name' => auth()->user()->name, 'action' => 'logout']));
    //     auth()->logout();
    //     return redirect('/')->with('success', 'You are now logged out');
    // }

    public function loginApi(Request $request)
    {
        $incomingFields = $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        if (auth()->attempt($incomingFields)) {
            $user = User::where('name', $incomingFields['name'])->first();
            $token = $user->createToken('ourapptoken')->plainTextToken;

            return $token;
        }

        return 'Sorry, Access denied';
    }

    // public function login(Request $request)
    // {
    //     $incomingFields = $request->validate([
    //         'loginname' => 'required',
    //         'loginpassword' => 'required'
    //     ]);

    //     if (auth()->attempt(['name' => $incomingFields['loginname'], 'password' => $incomingFields['loginpassword']])) {
    //         $request->session()->regenerate();
    //         event(new OurExampleEvent(['name' => auth()->user()->name, 'action' => 'login']));
    //         return redirect('/')->with('success', 'You are successfully logged in');
    //     } else {
    //         return redirect('/')->with('failure', 'Invalid login');
    //     }
    // }

    // public function register(Request $request)
    // {
    //     $incoming_fields = $request->validate([
    //         'name' => ['required', 'min:3', 'max:20', Rule::unique('users', 'name')],
    //         'email' => ['required', 'email', Rule::unique('users', 'email')],
    //         'password' => ['required', 'min:4', 'confirmed'],
    //     ]);

    //     $incoming_fields['password'] = bcrypt($incoming_fields['password']);

    //     $user = User::create($incoming_fields);
    //     auth()->login($user);
    //     return redirect('/')->with('success', 'Thanks for creating an account');
    // }

}
