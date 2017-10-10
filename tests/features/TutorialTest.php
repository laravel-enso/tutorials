<?php

use App\User;
use Faker\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use LaravelEnso\PermissionManager\app\Models\Permission;
use LaravelEnso\TestHelper\app\Traits\SignIn;
use LaravelEnso\TestHelper\app\Traits\TestCreateForm;
use LaravelEnso\TestHelper\app\Traits\TestDataTable;
use LaravelEnso\TutorialManager\app\Models\Tutorial;
use Tests\TestCase;

class TutorialTest extends TestCase
{
    use RefreshDatabase, SignIn, TestDataTable, TestCreateForm;

    private $faker;
    private $homePermission;
    private $prefix = 'system.tutorials';

    protected function setUp()
    {
        parent::setUp();

        // $this->withoutExceptionHandling();
        $this->faker = Factory::create();
        $this->homePermission = Permission::whereName('core.home')->first();

        $this->signIn(User::first());
    }

    /** @test */
    public function store()
    {
        $response = $this->post(route('system.tutorials.store', [], false), $this->postParams());
        $tutorial = Tutorial::first(['id']);

        $response->assertStatus(200)
            ->assertJsonFragment([
                'message'  => 'The tutorial was created!',
                'redirect' => 'system.tutorials.edit',
                'id'       => $tutorial->id,
            ]);
    }

    /** @test */
    public function edit()
    {
        Tutorial::create($this->postParams());
        $tutorial = Tutorial::first();

        $this->get(route('system.tutorials.edit', $tutorial->id, false))
            ->assertStatus(200)
            ->assertJsonStructure(['form']);
    }

    /** @test */
    public function update()
    {
        Tutorial::create($this->postParams());
        $tutorial = Tutorial::first();
        $tutorial->title = 'edited';

        $this->patch(route('system.tutorials.update', $tutorial->id, false), $tutorial->toArray())
            ->assertStatus(200)
            ->assertJson(['message' => __(config('enso.labels.savedChanges'))]);

        $this->assertEquals('edited', Tutorial::first(['title'])->title);
    }

    /** @test */
    public function destroy()
    {
        Tutorial::create($this->postParams());
        $tutorial = Tutorial::first(['id']);

        $this->delete(route('system.tutorials.destroy', $tutorial->id, false))
            ->assertStatus(200)
            ->assertJsonFragment(['message']);

        $this->assertNull($tutorial->fresh());
    }

    /** @test */
    public function show()
    {
        $firstTutorial = $this->postParams();
        Tutorial::create($firstTutorial);

        $secondPermission = Permission::orderBy('id', 'desc')->first();
        $secondTutorial = $this->postParams();

        $secondTutorial['permission_id'] = $secondPermission->id;
        Tutorial::create($secondTutorial);

        $this->get(route('system.tutorials.show', $secondPermission->name, false))
            ->assertJsonFragment([$firstTutorial['element']])
            ->assertJsonFragment([$secondTutorial['element']]);
    }

    private function postParams()
    {
        return [
            'permission_id' => $this->homePermission->id,
            'element'       => $this->faker->word,
            'title'         => $this->faker->word,
            'content'       => $this->faker->sentence,
            'placement'     => '1',
            'order'         => '1',
        ];
    }
}
