<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeparturesTest extends TestCase
{
    public function testRoutePetitionReturnAObject()
    {
        $response = $this->get('/petition');

        $this->assertIsObject($response);
    }
}
