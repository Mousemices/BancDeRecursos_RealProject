<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Petition;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Request;

class Batch extends Model
{
    static $pending = 0;
    static $approved = 1;
    static $rejected = 2;
    private $acceptedExtension=["jpg","jpeg","png"];

    protected $fillable = ["id", "title", "user_id", "quantity", "description", "delivery_direction", "pickup_date", "category_id", "status", "donor_company"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function petition()
    {
        return $this->belongsTo(Petition::class, "petition_id", "id");
    }

    public function getBatchByPetitionId($id)
    {
        return Batch::get()->where("petition_id", $id);
    }

    public function getBatchById($id)
    {
        return Batch::get()->where("id", $id);
    }

    public function category()
    {
        return $this->hasMany(Category::class);
    }

    public function getAllApprovedBatch()
    {
        $approvedBatches = Batch::where('status', '=', '1')->paginate(5);
        return $approvedBatches;
    }

    public function saveImg($request, $batchId)
    {
         if($request->hasFile('file'))
         { 
             $file=$request->file('file');
             $extension=$file->getClientOriginalExtension();
            

            if(in_array($extension, $this->acceptedExtension)){
                $file_name = "$batchId.png";
                $file->storeAs("public/batch/",$file_name);
                return redirect('createBatch')->with("message", "La teva sol·licitud s'ha enviat. Gràcies per la teva col·laboració");
            }
            return redirect('createBatch')->with("message", "No es pot puja aquest tipus de fitxer");

         }
         return redirect("createBatch")->with("message", "No es seleccionat una imatge");
    }


    public function getImg($batchCollection)
    {
        $images = [];

        foreach($batchCollection as $batch){
       // dd(Storage::get('public/batch/default.png'));
        $file=Storage::disk('public')->exists("/batch/$batch->id.png");
            if($file){
                array_push($images,Storage::url("batch/$batch->id.png"));
            }
            else{
                array_push($images,Storage::url("batch/default.png"));
            }
        }

        return $images;

    }

    public function getSingleImg($batch)
    {
        $file=Storage::disk('public')->exists("/batch/".$batch['id'].".png");

        if($file){
           return Storage::url("batch/".$batch['id'].".png");
        }

        return Storage::url("batch/default.png");
    }
}
