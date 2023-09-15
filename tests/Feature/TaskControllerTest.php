<?php
use App\Http\Controllers\TaskController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Models\Task;
use Tests\TestCase;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\WithFaker;

class TaskControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testStoreMethodSuccess()
    {
        // Create two fake users (admin/non-admin) using the User factory
        $admin_user = User::factory()->admin()->create();
        $user = User::factory()->create();
    
        $requestData = [
            'title' => 'Sample Task',
            'description' => 'This is a sample task description',
            'assigned_to_id' => $user->id,
            'assigned_by_id' => $admin_user->id,
        ];
    
        $response = $this->post(route('tasks.store'), $requestData);
        
        $response->assertStatus(302);

        $this->assertDatabaseHas('tasks', ['title' => 'Sample Task']);
    
    }

}
