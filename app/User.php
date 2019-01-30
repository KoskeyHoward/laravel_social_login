<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    //this method will check if facebook id already exists then it will return object and if not exists then create new user and return user object
    // public function facebook($input)
    // {
    //     $check = static::where('facebook_id',$input['facebook_id'])->first();


    //     if(is_null($check)){
    //         return static::create($input);
    //     }


    //     return $check;
    // }

    // public function twitter($input)
    // {
    //     $check = static::where('twitter_id',$input['twitter_id'])->first();


    //     if(is_null($check)){
    //         return static::create($input);
    //     }


    //     return $check;
    // }

    // public function github($input)
    // {
    //     $check = static::where('github_id',$input['github_id'])->first();


    //     if(is_null($check)){
    //         return static::create($input);
    //     }


    //     return $check;
    // }

    public function linkedin($input)
    {
        $check = static::where('linkedin_id',$input['linkedin_id'])->first();


        if(is_null($check)){
            return static::create($input);
        }


        return $check;
    }
}
