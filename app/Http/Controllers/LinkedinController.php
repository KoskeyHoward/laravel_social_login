<?php

namespace App\Http\Controllers;
use App\User;
use App\Http\Controllers\Controller;
use Socialite;
use Exception;
use Auth;

use Illuminate\Http\Request;

class LinkedinController extends Controller
{
    //

    public function redirectToLinkedin()
    {
        return Socialite::driver('linkedin')->redirect();
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleLinkedinCallback()
    {
        try {
            $user = Socialite::driver('linkedin')->user();
            $create['name'] = $user->getName();
            $create['email'] = $user->getEmail();
            $create['linkedin_id'] = $user->getId();


            $userModel = new User;
            $createdUser = $userModel->linkedin($create);
            Auth::loginUsingId($createdUser->id);


            return redirect()->route('home');


        } catch (Exception $e) {


            return redirect('auth/linkedin');


        }
    }
}
