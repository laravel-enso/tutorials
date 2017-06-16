<?php

use App\User;
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
        $this->be($this->user);
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
        $response->assertStatus(302);
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
        $response->assertStatus(302);
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
    }

    /** @test */
    public function getTutorial()
    {
        $permission = Permission::take(2)->get()->last();
        $secondTutorial = $this->secondTutorial($permission->id);
        $this->post('/system/tutorials', $this->postParams());
        $this->post('/system/tutorials', $secondTutorial);
        $response = $this->get('system/tutorials/getTutorial/' . $permission->name);
        unset($secondTutorial['_method']);
        $response->assertJsonFragment($secondTutorial);
    }

    private function postParams()
    {
        $permission = Permission::first();

        return [
            'permission_id' => "$permission->id",
            'element' => 'testElement',
            'title' => "testTutorial",
            'content' => "testTutorialContent",
            'placement' => "1",
            'order' => "1",
            '_method' => 'POST',
        ];
    }

    private function tutorialWasCreated()
    {
        $tutorial = Tutorial::first();

        return $tutorial->title === "testTutorial";
    }

    private function tutorialWasUpdated()
    {
        $tutorial = Tutorial::first();

        return $tutorial->title === 'edited';
    }

    private function secondTutorial($id)
    {
        return [
            'permission_id' => "$id",
            'element' => 'testElement',
            'title' => 'secondPermission',
            'content' => 'secondTutorialContent',
            'placement' => "1",
            'order' => "1",
            '_method' => 'POST',
        ];
    }
}
