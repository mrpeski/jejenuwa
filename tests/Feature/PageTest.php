<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PageTest extends TestCase
{
    use DatabaseMigrations;

    protected $page;

    public function setUp() {
        parent::setUp();
        $this->page = factory('App\Page')->create();
    }

    /**
    * @test 
    */
    public function unauthenticated_user_cannot_create_page()
    {
        $this->expectException('\Illuminate\Auth\AuthenticationException');
        $this->post("admin/forth/pages", $this->page->toArray());
    }
    

    /**
     * @test
     */
    public function an_autheticated_user_can_create_a_page()
    {
        $user = factory('App\User')->create();
        $this->be($user);

        $this->post("admin/forth/pages", $this->page->toArray());
        
        $this->get($this->page->path())
            ->assertSee($this->page->title);
        
    }

    /** 
    * @test 
    */
    public function a_user_can_view_page()
    {
        $response = $this->get($this->page->path());

        $response->assertStatus(200);
    }

    /**
    * @test 
    */
    public function unauthenticated_user_cannot_update_page()
    {
        $this->expectException('\Illuminate\Auth\AuthenticationException');
        $this->patch("admin/forth/pages/{$this->page->id}", $this->page->toArray());
    }

    /**
     * @test
     */

    public function an_autheticated_user_can_update_a_page()
    {
        $user = factory('App\User')->create();
        $this->be($user);

        $this->page->update(['title' => 'Edited']);

        $this->patch("admin/forth/pages/{$this->page->id}");
        
        $this->get($this->page->path())
            ->assertSee('Edited');
        
    }
    /**
     * @test
     */

    public function an_autheticated_user_can_delete_a_page()
    {
        // $user = factory('App\User')->create();
        // $this->be($user);

        // $this->page->update(['title' => 'Edited']);

        // $this->delete("/forth/pages/{$this->page->id}");
        
        // $this->get($this->page->path())
        //     ->assertSee('Edited');
        
    }

}
