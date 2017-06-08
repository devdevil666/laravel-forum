<?php

namespace Tests\Feature;

use App\Reply;
use App\Thread;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ReadThreadsTest extends TestCase
{
    use DatabaseMigrations;

    protected $thread;

    protected function setUp()
    {
        parent::setUp();
        $this->thread = factory(Thread::class)->create();
    }

    /** @test */
    public function a_user_can_view_all_threads()
    {
        $this->get('/threads')
            ->assertSee($this->thread->title);
    }

    /** @test */
    public function a_user_can_view_a_single_thread()
    {
        $this->get("/threads/{$this->thread->id}")
            ->assertSee($this->thread->title);
    }

    /** @test */
    public function a_user_can_read_replies()
    {
        $repl = factory(Reply::class)
            ->create(['thread_id' => $this->thread->id]);
        $this->get("/threads/{$this->thread->id}")
            ->assertSee($repl->body);
    }
}
