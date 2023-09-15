<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ViewsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

     public function testTaskListingPageLoads()
     {
         $response = $this->get('/tasks');
         $response->assertStatus(200); 
     }

     public function testCreateTaskPageLoads()
     {
         $response = $this->get('/tasks/create');
         $response->assertStatus(200);
     }
    public function testTopUserStatisticsPageLoads()
    {
        $response = $this->get('/statistics/topUsers');
        $response->assertStatus(200);
    }


}
