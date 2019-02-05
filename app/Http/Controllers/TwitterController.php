<?php

namespace App\Http\Controllers;
use App\User;
use App\Http\Controllers\Controller;
use Socialite;
use Exception;
use Auth;

use Illuminate\Http\Request;

class TwitterController extends Controller
{
    //
    public function redirectToTwitter()
    {
        return Socialite::driver('twitter')->redirect();
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleTwitterCallback()
    {
        try {
            $user = Socialite::driver('twitter')->user();
            $create['name'] = $user->getName();
            $create['email'] = $user->getEmail();
            $create['twitter_id'] = $user->getId();


            $userModel = new User;
            $createdUser = $userModel->twitter($create);
            Auth::loginUsingId($createdUser->id);


            return redirect()->route('home');


        } catch (Exception $e) {


            return redirect('auth/twitter');


        }
    }
}
