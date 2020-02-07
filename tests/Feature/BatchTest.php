<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
/* use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions; */


use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Batch;

use App\Category;


class BatchTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function test_if_receive_batch_list()
    {
        $cantidadDeFactorias= 5;
        $expectedLength = 5;

        $response = $this->withoutMiddleware();
        factory(Category::class, 1)->create(['id'=>1]);
        factory(Batch::class, $cantidadDeFactorias)->create(['status'=>1,'category_id'=>1]);
        $response = $this->get('/batch');
        $dataReceived = $response->getOriginalContent()->getData();
        $batchListLength = count($dataReceived['batchList']);
        $this->assertEquals($expectedLength, $batchListLength);
        
    }

    public function testCreateStoreBatch()
    {
      $response = $this->post('/batch', [
        'title'=>'Empresa',
        'quantity'=>20,
        'description'=>'20 computadoras dell'
      ]);

      $response->assertStatus(201);
      $this->assertDatabaseHas('batches',['title' => 'Empresa']);

    }

    public function test_if_returns_same_detail_of_batch_item()
    {
        $AmoutFactory=1;
        $ExpectedId=1;
        $idCategoria=1;
        $variableFromView="batchDetail";
        

        $FactoriaDB=['id'=>1,'title' => 'Lote Computadoras','status' =>  1,'category_id'=>$idCategoria];

        factory(Category::class, 1)->create(['id'=>$idCategoria]);
        $expected = factory(Batch::class,$AmoutFactory)->create($FactoriaDB);
        $firstDataElement=$expected[0];

        $response = $this->get("/batch/1")->getOriginalContent()->getData();

        $this->assertEquals($firstDataElement['title'], $response[$variableFromView]["title"]);
        $this->assertEquals($firstDataElement['quantity'], $response[$variableFromView]["quantity"]);
        $this->assertEquals($firstDataElement['description'], $response[$variableFromView]["description"]);
        $this->assertEquals($firstDataElement['delivery_direction'], $response[$variableFromView]["delivery_direction"]);
        $this->assertEquals($firstDataElement['pickup_date'], $response[$variableFromView]["pickup_date"]);
        $this->assertEquals($firstDataElement['status'], $response[$variableFromView]["status"]);
        $this->assertEquals($firstDataElement['category_id'], $response[$variableFromView]["category_id"]);
        $this->assertEquals($firstDataElement['donor_company'], $response[$variableFromView]["donor_company"]);


    }

}
