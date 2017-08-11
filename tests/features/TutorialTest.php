<?php

use App\User;
use Faker\Factory;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use LaravelEnso\PermissionManager\app\Models\Permission;
use LaravelEnso\TutorialManager\app\Models\Tutorial;
use Tests\TestCase;

class TutorialTest extends TestCase
{
    use DatabaseMigrations;

    private $user;

    protected function setUp()
    {
        parent::setUp();

        // $this->disableExceptionHandling();
        $this->user = User::first();
        $this->faker = Factory::create();
        $this->homePermission = Permission::whereName('home')->first();

        $this->actingAs($this->user);
    }

    /** @test */
    public function index()
    {
        $response = $this->get('/system/tutorials');

        $response->assertStatus(200);
    }

    /** @test */
    public function create()
    {
        $response = $this->get('/system/tutorials/create');

        $response->assertStatus(200);
    }

    /** @test */
    public function store()
    {
        $response = $this->post('/system/tutorials', $this->postParams());
        $tutorial = Tutorial::first(['id']);

        $response->assertStatus(200)
            ->assertJsonFragment([
            'message' => 'The tutorial was created!',
            'redirect'=> '/system/tutorials/'.$tutorial->id.'/edit',
        ]);

        $this->assertTrue($this->wasCreated());
    }

    /** @test */
    public function edit()
    {
        Tutorial::create($this->postParams());
        $tutorial = Tutorial::first();

        $response = $this->get('/system/tutorials/'.$tutorial->id.'/edit');

        $response->assertStatus(200);
        $response->assertViewHas('form');
    }

    /** @test */
    public function update()
    {
        Tutorial::create($this->postParams());
        $tutorial = Tutorial::first();
        $tutorial->title = 'edited';
        $tutorial->_method = 'PATCH';

        $response = $this->patch('/system/tutorials/'.$tutorial->id, $tutorial->toArray())
            ->assertStatus(200)
            ->assertJson(['message' => __(config('labels.savedChanges'))]);

        $this->assertTrue($this->wasUpdated());
    }

    /** @test */
    public function destroy()
    {
        Tutorial::create($this->postParams());
        $tutorial = Tutorial::first(['id']);

        $response = $this->delete('/system/tutorials/'.$tutorial->id);

        $this->hasJsonConfirmation($response);
        $this->wasDeleted();
        $response->assertStatus(200);
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

        $response = $this->get('system/tutorials/'.$secondPermission->name);

        unset($firstTutorial['permission_id'], $firstTutorial['_method']);
        unset($secondTutorial['permission_id'], $secondTutorial['_method']);

        $response->assertJsonFragment($firstTutorial);
        $response->assertJsonFragment($secondTutorial);
    }

    private function wasCreated()
    {
        return Tutorial::count() === 1;
    }

    private function wasUpdated()
    {
        $tutorial = Tutorial::first(['title']);

        return $tutorial->title === 'edited';
    }

    private function wasDeleted()
    {
        return $this->assertNull(Tutorial::first());
    }

    private function hasJsonConfirmation($response)
    {
        return $response->assertJsonFragment(['message']);
    }

    private function hasSessionConfirmation($response)
    {
        return $response->assertSessionHas('flash_notification');
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
            '_method'       => 'POST',
        ];
    }
}
