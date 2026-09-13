<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use App\Models\Workspace;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TaskFilterTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_filter_tasks_by_mendatang_h_plus_5(): void
    {
        $user = User::factory()->create();
        $workspace = Workspace::create([
            'user_id' => $user->id,
            'name' => 'Personal Workspace',
        ]);

        // Task due in 2 days (within H+5)
        $taskMendatang = Task::create([
            'user_id' => $user->id,
            'workspace_id' => $workspace->id,
            'title' => 'Tugas Mendatang H+2',
            'status' => 'Todo',
            'priority' => 'Medium',
            'due_date' => now()->addDays(2)->format('Y-m-d'),
        ]);

        // Task due in 7 days (outside H+5)
        $taskJauh = Task::create([
            'user_id' => $user->id,
            'workspace_id' => $workspace->id,
            'title' => 'Tugas Jauh H+7',
            'status' => 'Todo',
            'priority' => 'Low',
            'due_date' => now()->addDays(7)->format('Y-m-d'),
        ]);

        // Task overdue
        $taskTerlambat = Task::create([
            'user_id' => $user->id,
            'workspace_id' => $workspace->id,
            'title' => 'Tugas Terlambat',
            'status' => 'Todo',
            'priority' => 'High',
            'due_date' => now()->subDays(2)->format('Y-m-d'),
        ]);

        $response = $this->actingAs($user)->get(route('tasks.index', ['filter' => 'mendatang']));

        $response->assertStatus(200);
        $response->assertSee('Tugas Mendatang H+2');
        $response->assertDontSee('Tugas Jauh H+7');
        $response->assertDontSee('Tugas Terlambat');
    }
}
