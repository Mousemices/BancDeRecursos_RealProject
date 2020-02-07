<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Role extends Model
{
    private $user = 0;
    private $adminstrador = 1;

    public function checkRole(): bool
    {
       
        if(Auth::user()->user_role == $this->user){
            return false;
        };
        return true;
    }

}
