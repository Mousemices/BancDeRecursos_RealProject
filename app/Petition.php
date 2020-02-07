<?php

namespace App;
use App\User;
use App\Batch;



use Illuminate\Database\Eloquent\Model;

class Petition extends Model
{
    static $pending = 0;
    static $approved = 1;
    static $rejected = 2;
    
    protected $fillable = ["email", "quantity", "name", "observations", "user_id", "batch_id", "phone", "status"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function batch()
    {
        return $this->belongsTo(Batch::class,"batch_id","id");
    }

}
