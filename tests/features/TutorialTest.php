<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use LaravelEnso\Core\App\Models\User;
use LaravelEnso\Forms\App\TestTraits\CreateForm;
use LaravelEnso\Forms\App\TestTraits\DestroyForm;
use LaravelEnso\Forms\App\TestTraits\EditForm;
use LaravelEnso\Permissions\App\Models\Permission;
use LaravelEnso\Tables\App\Traits\Tests\Datatable;
use LaravelEnso\Tutorials\App\Models\Tutorial;
use Tests\TestCase;

class TutorialTest extends TestCase
{
    use CreateForm, Datatable, DestroyForm, EditForm, RefreshDatabase;

    private $permissionGroup = 'system.tutorials';
    private $testModel;

    protected function setUp(): void
    {
        parent::setUp();

        // $this->withoutExceptionHandling();

        $this->seed()
            ->actingAs(User::first());

        $this->testModel = factory(Tutorial::class)
            ->make();
    }

    /** @test */
    public function can_store_tutorial()
    {
        $response = $this->post(
            route('system.tutorials.store'),
            $this->testModel->toArray()
        );

        $tutorial = Tutorial::whereElement($this->testModel->element)
            ->first(['id']);

        $response->assertStatus(200)
            ->assertJsonFragment([
                'redirect' => 'system.tutorials.edit',
                'param' => ['tutorial' => $tutorial->id],
            ])->assertJsonStructure(['message']);
    }

    /** @test */
    public function can_update_tutorial()
    {
        $this->testModel->save();

        $this->testModel->title = 'edited';

        $this->patch(
            route('system.tutorials.update', $this->testModel->id, false),
            $this->testModel->toArray()
        )->assertStatus(200)
            ->assertJsonStructure(['message']);

        $this->assertEquals($this->testModel->title, $this->testModel->fresh()->title);
    }

    /** @test */
    public function can_destroy_tutorial()
    {
        $this->testModel->save();

        $this->delete(route('system.tutorials.destroy', $this->testModel->id, false))
            ->assertStatus(200)
            ->assertJsonStructure(['message']);

        $this->assertNull($this->testModel->fresh());
    }

    /** @test */
    public function can_display_tutorial()
    {
        $homePermission = Permission::whereName('core.home.index')->first();

        $this->testModel->permission_id = $homePermission->id;

        $this->testModel->save();

        $secondPermission = Permission::orderBy('id', 'desc')->first();

        $secondTutorial = factory(Tutorial::class)->create([
            'permission_id' => $secondPermission->id,
        ]);

        $this->get(route(
            'system.tutorials.load',
            ['route' => $secondPermission->name],
            false
        ))->assertJsonFragment([$this->testModel->element])
            ->assertJsonFragment([$secondTutorial->element]);
    }
}
