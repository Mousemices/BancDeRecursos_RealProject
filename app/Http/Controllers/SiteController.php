<?php

namespace App\Http\Controllers;

use App\Batch;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $batch = new Batch;
        $batchAvaliables = $batch->getAllApprovedBatch();
        $avaliablesBatchImg = $batch->getImg($batchAvaliables);

        return view('home',['batchAvaliables' => $batchAvaliables, 'avaliablesBatchImg' => $avaliablesBatchImg]);
    }
}

