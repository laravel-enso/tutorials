<?php

use App\User;
use Faker\Factory;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use LaravelEnso\PermissionManager\app\Models\Permission;
use LaravelEnso\TutorialManager\app\Models\Tutorial;
use Tests\TestCase;

class TutorialsTest extends TestCase
{
    use DatabaseMigrations;

    private $user;

    protected function setUp()
    {
        parent::setUp();

        $this->disableExceptionHandling();
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

        $response->assertRedirect('/system/tutorials/'.$tutorial->id.'/edit');
        $this->hasSessionConfirmation($response);
        $this->assertTrue($this->tutorialWasCreated());
    }

    /** @test */
    public function edit()
    {
        Tutorial::create($this->postParams());
        $tutorial = Tutorial::first();
        $response = $this->get('/system/tutorials/'.$tutorial->id.'/edit');
        $response->assertStatus(200);
        $response->assertViewHas('tutorial', $tutorial);
    }

    /** @test */
    public function update()
    {
        Tutorial::create($this->postParams());
        $tutorial = Tutorial::first();
        $tutorial->title = 'edited';
        $tutorial->_method = 'PATCH';
        $response = $this->patch('/system/tutorials/'.$tutorial->id, $tutorial->toArray());
        $response->assertStatus(302);
        $this->hasSessionConfirmation($response);
        $this->assertTrue($this->tutorialWasUpdated());
    }

    /** @test */
    public function destroy()
    {
        Tutorial::create($this->postParams());
        $tutorial = Tutorial::first(['id']);
        $response = $this->delete('/system/tutorials/'.$tutorial->id);
        $this->hasJsonConfirmation($response);
        $response->assertStatus(200);
    }

    /** @test */
    public function getTutorial()
    {
        $firstTutorial = $this->postParams();

        Tutorial::create($firstTutorial);

        $secondPermission = Permission::take(2)->latest()->first();
        $secondTutorial = $this->postParams();
        $secondTutorial['permission_id'] = strval($secondPermission->id);
        Tutorial::create($secondTutorial);

        $response = $this->get('system/tutorials/getTutorial/'.$secondPermission->name);

        unset($firstTutorial['_method']);
        unset($secondTutorial['_method']);

        $response->assertJsonFragment($firstTutorial);
        $response->assertJsonFragment($secondTutorial);
    }

    private function postParams()
    {
        return [
            'permission_id' => strval($this->homePermission->id),
            'element'       => $this->faker->word,
            'title'         => $this->faker->word,
            'content'       => $this->faker->sentence,
            'placement'     => '1',
            'order'         => '1',
            '_method'       => 'POST',
        ];
    }

    private function tutorialWasCreated()
    {
        return Tutorial::count() === 1;
    }

    private function tutorialWasUpdated()
    {
        $tutorial = Tutorial::first(['title']);

        return $tutorial->title === 'edited';
    }

    private function hasJsonConfirmation($response)
    {
        return $response->assertJsonFragment(['message']);
    }

    private function hasSessionConfirmation($response)
    {
        return $response->assertSessionHas('flash_notification');
    }
}
