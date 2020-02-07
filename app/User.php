<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use DB;
use Petition;
use Batch;



class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'entity_name','entity_type', 'email', 'password', 'cif_dni', 'fiscal_address', 'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function batch()
    {
        return $this->hasMany(Batch::class);
    }
    public function petition()
    {
        return $this->hasMany(Petition::class);
    }

    public function getMail($user_id)
    {
       

    }

    public function getDonadorMail($donator_id)
    {
        $user_email = DB::select('select email from users where id = '.$donator_id);
        return $user_email;
    }

    public function rejectedBatch($email)
    {   
        
    }

    public function acceptedBatch($email)
    {

    }
}
