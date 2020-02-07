<?php

namespace Tests\Unit;

use App\Http\Controllers\PetitionController;
use App\Petition;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PetitionTest extends TestCase
{
    public function test_if_update_batch_status_changes_status_to_approved()
    {
        $expectedStatus = 1;
        $petition = new Petition();
        
        $petitionController = new PetitionController;
        $petitionController->updatePetitionStatusToApproved($petition);
        $this->assertEquals($expectedStatus, $petition->status);
    }

    public function test_if_function_update_petition_status_doesnt_change_status_to_pending()
    {
        $notExpectedStatus = 0;
        $petition = new Petition();
        
        $petitionController = new PetitionController;
        $petitionController->updatePetitionStatusToApproved($petition);
        $this->assertNotEquals($notExpectedStatus, $petition->status);
    }

    public function test_if_function_update_petition_status_doesnt_change_status_when_passed_a_string()
    {
        $actualStatus = '1';
        $petition = new Petition();
        
        $petitionController = new PetitionController;
        $petitionController->updatePetitionStatusToApproved($petition);
        $this->assertNotSame($actualStatus, $petition->status);
    }

    public function testIfPetitionDefaultStatusEqualsToZero()
    {
        $petition = new Petition();
        $expectedStatus = 0;
        $actualStatus = $petition->pending;

        $this->assertEquals($expectedStatus,$actualStatus);
        
    }

    public function testRejectPetitionStatusToTwo()
    {
        $petition = new Petition();
        $expectedStatus = 2;
        $petitionController = new PetitionController();
        $petitionController->updatePetitionStatusToRejected($petition);
        $this->assertEquals($expectedStatus,$petition->status);

    }
}
