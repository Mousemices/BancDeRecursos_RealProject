<?php

namespace Tests\Feature;

use App\Batches;
use App\Petitions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeparturesTest extends TestCase
{   
    /** @test */
    public function testBatchesReturnTheCorrectStatus() //TO DO: revisar
    {
        $expectedStatus = 1;
        $response = new Petitions();
        
        $where = $response->getApprovedPetitions();
        
        $this->assertEquals($expectedStatus, $where[1]->status);
    }
    
}
