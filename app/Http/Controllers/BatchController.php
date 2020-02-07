<?php

namespace App\Http\Controllers;

use App\Batch;
use App\Batches;
use App\Role;
use App\User;
use Auth;
use App\Mail\BatchRejected;
use App\Mail\BatchAceepted;
use Mail;

use Illuminate\Http\Request;

class BatchController extends Controller
{

    public function __construct()
    {
        
    }
    
    public function index()
    {
        
        $role = new Role();
        $roleAdminstrador = $role->checkRole();
        if(!$roleAdminstrador) return redirect('/');

        $batches = new Batches;
        $batch = new Batch();
        $batchList = $batches->getApprovedBatch();

        if($this->authorize('admin', $batch)){
            return view('batchView.batch', ['batchList' => $batchList]);
        }
        

    }

    public function create()
    {
        $batch = new Batch();
        if(Auth::user()) redirect('/login');        
        return view('createBatch', compact('batch'));
    }

   
    public function store(Request $request)
    {
        $entityName = auth()->user()->entity_name;
        $pending = Batch::$pending;
        $user_id = auth()->user()->id;
        $request->request->add(['donor_company'=> $entityName, 'user_id' => $user_id, 'status'=>$pending]);
        $batch = Batch::create($request->all());
        $batch->saveImg($request, $batch->id);
        
        return redirect('/');
    }

    
    public function show(Batch $batch)
    {
        $imgUrl=$batch->getSingleImg($batch);
        $batchDetail = $batch;

        return view('batchDetail', compact('batchDetail','imgUrl'));
        
    }

    
    public function edit(Batch $batch)
    {
        return view('editBatch', ['batch' => $batch]);
    }

    
    public function update(Request $request, Batch $batch)
    {     
        $request->validate(['quantity' => 'required', 
                            'delivery_direction' => 'required', 
                            'pickup_date' => 'required', 
                            'donor_company' => 'required']);
        $batch->update($request->all());
        return redirect('/batch/pending');
    }

    
    public function destroy(Batch $batch)
    {
       
    }

    public function getPendingBatchCollection(Batches $batches)
    {
        $role = new Role();
        $roleAdminstrador = $role->checkRole();
        if(!$roleAdminstrador) return redirect('/');

        $pendingBatch = $batches->getPendingBatch();
         return view('Admin.PendingBatch', ['batch'=> $pendingBatch]); 
    }

    public function updateBatchStatusToApproved(Batch $batch)
    {   
        $batch->status = Batch::$approved;
        $batch->save();
        $user = new User();
        $donador_email = $user->getDonadorMail($batch->user_id);
        Mail::to($donador_email)->send(new BatchAceepted);
        return redirect('/batch/pending');

    }

    public function updateBatchStatusToRejected(Request $request, Batch $batch)
    {
        $batch->status = Batch::$rejected;
        $user = new User();
        $donador_email = $user->getDonadorMail($batch->user_id);
        Mail::to($donador_email)->send(new BatchRejected);
        $batch->save();
        return redirect('/batch/pending');
    }

}
