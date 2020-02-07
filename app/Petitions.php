<?php

namespace App;
use App\Batch;
use App\Petition;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Petitions extends Model
{
    private $pending = 1;
    private $approved = 0;
    
    private function getAllPetitions()
    {
        return Petition::all();
    }

    public function getGetAllPetitions()
    {
        return $this->getAllPetitions();
    }

    public function getApprovedPetitions()
    {
        
        return $this->getAllPetitions()
        ->where('status', Petition::$approved);
    }

    public function getPendingPetitions()
    {
        return $this->getAllPetitions()
        ->where('status',$this->pending)
        ->sortBy('created_at');
    }
    public function getApprovedPetitionsBatch($id)
    {
        $batch = new Batch;
        return $batch->getBatchByPetitionId($id);

    }
    public function getApprovedPetitionsAndBatchDetail()
    {
        return DB::table('batches')
        ->join('petitions', 'batches.id', '=', 'petitions.batch_id')
        ->where('petitions.status',Petition::$approved)
        ->get();

    }
    
    public function getPendingPetitionsAndBatchDetail()
    {
        return DB::table('batches')
        ->join('petitions', 'batches.id', '=', 'petitions.batch_id')
        ->where('petitions.status',Petition::$pending)
        ->get();
    }

}
