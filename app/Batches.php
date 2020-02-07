<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Batches extends Model
{
    public function isBatchIsInDeparture(){
        $response = Petition::where('status', 2 )->get();
        return $response;
    }
    public function getApprovedBatch(){
        $response = Batch::where('status', Batch::$approved )->get();
        return $response;
    } 
    public function getPendingBatch(){
        $response = Batch::where('status', Batch::$pending )->get();
        return $response;
    } 
}
