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
        $this->faker = Factory::create();
        $this->permissionId = Permission::first()->id;

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
        $response->assertRedirect('/system/tutorials/' . $tutorial->id . '/edit');
        $this->hasSessionConfirmation($response);
        $this->assertTrue($this->tutorialWasCreated());
    }

    /** @test */
    public function edit()
    {
        $this->post('/system/tutorials', $this->postParams());
        $tutorial = Tutorial::first();
        $response = $this->get('/system/tutorials/' . $tutorial->id . '/edit');
        $response->assertStatus(200);
        $response->assertViewHas('tutorial', $tutorial);
    }

    /** @test */
    public function update()
    {
        $this->post('/system/tutorials', $this->postParams());
        $tutorial = Tutorial::first();
        $tutorial->title = 'edited';
        $tutorial->_method = 'PATCH';
        $response = $this->patch('/system/tutorials/' . $tutorial->id, $tutorial->toArray());
        $response->assertRedirect(config('APP_URL'));
        $this->hasSessionConfirmation($response);
        $this->assertTrue($this->tutorialWasUpdated());
    }

    /** @test */
    public function destroy()
    {
        $postParams = $this->postParams();
        $this->post('/system/tutorials', $postParams);
        $tutorial = Tutorial::whereTitle($postParams['title'])->first();
        $response = $this->delete('/system/tutorials/' . $tutorial->id);
        $response->assertStatus(200);
        $this->hasJsonConfirmation($response);
    }

    /** @test */
    public function getTutorial()
    {
        $firstTutorial = $this->postParams();

        $permission = Permission::take(2)->get()->last();
        $secondTutorial = $this->postParams();
        $secondTutorial['permission_id'] = "$permission->id";

        $this->post('/system/tutorials', $firstTutorial);
        $this->post('/system/tutorials', $secondTutorial);

        $response = $this->get('system/tutorials/getTutorial/' . $permission->name);

        unset($firstTutorial['_method']);
        unset($secondTutorial['_method']);

        $response->assertJsonFragment($firstTutorial);
        $response->assertJsonFragment($secondTutorial);
    }

    private function postParams()
    {
        return [
            'permission_id' => "$this->permissionId",
            'element' => $this->faker->word,
            'title' => $this->faker->word,
            'content' => $this->faker->sentence,
            'placement' => '1',
            'order' => '1',
            '_method' => 'POST',
        ];
    }

    private function tutorialWasCreated()
    {
        $tutorial = Tutorial::first();

        return Tutorial::all()->count() === 1;
    }

    private function tutorialWasUpdated()
    {
        $tutorial = Tutorial::first();

        return $tutorial->title === 'edited';
    }

    private function hasJsonConfirmation($response)
    {
        return $response->assertJsonFragment(['message']);
    }

    private function hasSessionConfirmation($response)
    {
        return $response->assertSessionHas("flash_notification.message");
    }
}
