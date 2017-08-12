<?php

use App\User;
use Faker\Factory;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use LaravelEnso\PermissionManager\app\Models\Permission;
use LaravelEnso\TestHelper\app\Classes\TestHelper;
use LaravelEnso\TutorialManager\app\Models\Tutorial;

class TutorialTest extends TestHelper
{
    use DatabaseMigrations;

    protected $faker;
    protected $homePermission;

    protected function setUp()
    {
        parent::setUp();

        // $this->disableExceptionHandling();
        $this->faker = Factory::create();
        $this->homePermission = Permission::whereName('home')->first();

        $this->signIn(User::first());
    }

    /** @test */
    public function index()
    {
        $this->get('/system/tutorials')
            ->assertStatus(200)
            ->assertViewIs('laravel-enso/tutorials::index');
    }

    /** @test */
    public function create()
    {
        $this->get('/system/tutorials/create')
            ->assertStatus(200)
            ->assertViewIs('laravel-enso/tutorials::create')
            ->assertViewHas('form');
    }

    /** @test */
    public function store()
    {
        $response = $this->post('/system/tutorials', $this->postParams());
        $tutorial = Tutorial::first(['id']);

        $response->assertStatus(200)
            ->assertJsonFragment([
                'message'  => 'The tutorial was created!',
                'redirect' => '/system/tutorials/'.$tutorial->id.'/edit',
            ]);
    }

    /** @test */
    public function edit()
    {
        Tutorial::create($this->postParams());
        $tutorial = Tutorial::first();

        $this->get('/system/tutorials/'.$tutorial->id.'/edit')
            ->assertStatus(200)
            ->assertViewIs('laravel-enso/tutorials::edit')
            ->assertViewHas('form');
    }

    /** @test */
    public function update()
    {
        Tutorial::create($this->postParams());
        $tutorial = Tutorial::first();
        $tutorial->title = 'edited';

        $this->patch('/system/tutorials/'.$tutorial->id, $tutorial->toArray())
            ->assertStatus(200)
            ->assertJson(['message' => __(config('labels.savedChanges'))]);

        $this->assertEquals('edited', Tutorial::first(['title'])->title);
    }

    /** @test */
    public function destroy()
    {
        Tutorial::create($this->postParams());
        $tutorial = Tutorial::first(['id']);

        $this->delete('/system/tutorials/'.$tutorial->id)
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

        $this->get('system/tutorials/'.$secondPermission->name)
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
