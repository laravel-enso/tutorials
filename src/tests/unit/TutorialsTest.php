<?php

use App\User;
use Faker\Factory;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use LaravelEnso\Core\app\Models\Permission;
use LaravelEnso\TutorialManager\app\Models\Tutorial;
use Tests\TestCase;

class TutorialsTest extends TestCase
{
    use DatabaseMigrations;

    private $user;

    protected function setUp()
    {
        parent::setUp();

        $this->user = User::first();
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
        $factory = factory(Tutorial::class)->make([
            'permission_id' => Permission::first()->id,
        ]);

        $response = $this->post('/system/tutorials', $factory->toArray());
        $id = Tutorial::latest()->first()->id;
        $response->assertRedirect('/system/tutorials/' . $id . '/edit');
        $this->assertTrue($this->tutorialWasCreated($factory));
    }

    /** @test */
    public function edit()
    {
        $factory = factory(Tutorial::class)->make([
            'permission_id' => Permission::first()->id,
        ]);
        
        $this->post('/system/tutorials', $factory->toArray());
        $tutorial = Tutorial::first();
        $response = $this->get('/system/tutorials/' . $tutorial->id . '/edit');
        $response->assertStatus(200);
        $response->assertViewHas('tutorial', $tutorial);
    }

    /** @test */
    public function update()
    {
        $factory = factory(Tutorial::class)->make([
            'permission_id' => Permission::first()->id,
        ]);

        $this->post('/system/tutorials', $factory->toArray());
        $tutorial = Tutorial::first();
        $tutorial->title = 'edited';
        $tutorial->_method = 'PATCH';

        $response = $this->patch('/system/tutorials/' . $tutorial->id, $tutorial->toArray());
        $response->assertRedirect(config('APP_URL'));
        $this->assertTrue($this->tutorialWasUpdated());
    }

    /** @test */
    public function destroy()
    {
        $factory = factory(Tutorial::class)->make([
            'permission_id' => Permission::first()->id,
        ]);

        $this->post('/system/tutorials', $factory->toArray());
        $tutorial = Tutorial::whereTitle($factory['title'])->first();
        $response = $this->delete('/system/tutorials/' . $tutorial->id);
        $response->assertStatus(200);
    }

    /** @test */
    public function getTutorial()
    {
        $firstTutorial = factory(Tutorial::class)->make([
            'permission_id' => Permission::first()->id,
        ]);

        $permission = Permission::take(2)->get()->last();
        $secondTutorial = factory(Tutorial::class)->make([
            'permission_id' => "$permission->id",
        ]);

        $this->post('/system/tutorials', $firstTutorial->toArray());
        $this->post('/system/tutorials', $secondTutorial->toArray());
        $response = $this->get('system/tutorials/getTutorial/' . $permission->name);

        unset($secondTutorial['_method']);

        $response->assertJsonFragment($secondTutorial->toArray());
    }

    private function tutorialWasCreated($factory)
    {
        $tutorial = Tutorial::first();

        return $tutorial->title === $factory['title'];
    }

    private function tutorialWasUpdated()
    {
        $tutorial = Tutorial::first();

        return $tutorial->title === 'edited';
    }
}
