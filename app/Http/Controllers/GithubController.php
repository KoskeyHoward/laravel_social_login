<?php

namespace App\Http\Controllers;
use App\User;
use App\Http\Controllers\Controller;
use Socialite;
use Exception;
use Auth;

use Illuminate\Http\Request;

class GithubController extends Controller
{
    //

    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGithubCallback()
    {
        try {
            $user = Socialite::driver('github')->user();
            $create['name'] = $user->getName();
            $create['email'] = $user->getEmail();
            $create['github_id'] = $user->getId();


            $userModel = new User;
            $createdUser = $userModel->github($create);
            Auth::loginUsingId($createdUser->id);


            return redirect()->route('home');


        } catch (Exception $e) {


            return redirect('auth/facebook');


        }
    }
}
