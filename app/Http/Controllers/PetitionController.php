<?php

namespace App\Http\Controllers;

use App\Batches;
use App\Batch;
use App\Petition;
use App\Petitions;
use App\User;
use App\Role;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Void_;
use App\Mail\PetitionPending;
use App\Mail\PetitionAccepted;
use App\Mail\PetitionRejected;
use Mail;
use Auth;


class PetitionController extends Controller
{
    
    public function index()
    {   
        return back();
    }

    
    public function create(Batch $batch)
    {
        $petition = new Petition();
        return view('petitions.create', compact(['petition','batch']));
    }

    
    public function store(Request $request, $batch_id)
    {
        $user_id=auth()->user()->id;
        $pending = Petition::$pending;
        $request->request->add(['user_id'=>"$user_id",'batch_id'=>"$batch_id", 'status'=>$pending]);
        Petition::create($request->all());

        return redirect("/");
    }

  
    public function show(Petition $petition)
    {
        
    }

    
    public function edit(Petition $petition)
    {
        return view('petitions.editPetition', ['petition' => $petition]);
    }

    
    public function update(Request $request, Petition $petition)
    {  
            $request->validate(['quantity' => 'required', 
                                'email' => 'required', 
                                'observations' => 'required']);
            $petition->update($request->all());
            return redirect("/petition-pending");
    }

    public function destroy(Petition $petition)
    {
        
    }


    public function updatePetitionStatusToApproved(Petition $petition)
    {
        $petition->status = Petition::$approved;
        $petition->save();
        $receiver_email = $petition->email;
        Mail::to($receiver_email)->send(new PetitionAccepted);
        return back();
    }

    public function updatePetitionStatusToRejected(Request $request, Petition $petition)
    {   
        $petition->status = Petition::$rejected;
        $petition->save();
        $receiver_email = $petition->email;
        Mail::to($receiver_email)->send(new PetitionRejected);
        return back();
    }
    public function updatePetitionStatusToPending(Request $request, Petition $petition)
    {
        $petition->status = Petition::$pending;
        $petition->save();
        return back();
    }

    public function getPendingPetitionsCollection()
    {
        
        $role = new Role();
        
        $roleAdminstrador = $role->checkRole();
        
        if($roleAdminstrador){
            
            $petitions = new Petitions;
            $pendingPetitions = $petitions->getPendingPetitionsAndBatchDetail();
            return view('petitions.pending', ['pendingPetitions'=> $pendingPetitions]);
    
        }
        return redirect('/');
        
    }
    public function sendMailToUserToNotificateHisPetitionInPending(Petition $petition)
    {   
        $user_id = $petition->user_id;
        $user = new User;
        $user_mail =  $user->getMail($user_id);
        Mail::to($user_mail)->send(new PetitionRejected);
    }
    

    public function getApprovedPetitionsCollection ()
    {
        $role = new Role();
        $roleAdminstrador = $role->checkRole();
        if(!$roleAdminstrador) return redirect('/');

        $petitions = new Petitions;
        $approvedPetitions = $petitions->getApprovedPetitionsAndBatchDetail();
        return view('petitions.approved', ['approvedPetitions'=> $approvedPetitions]);
    }


}
