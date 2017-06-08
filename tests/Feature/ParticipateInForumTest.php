<?php

namespace Tests\Feature;

use App\Reply;
use App\Thread;
use App\User;
use Illuminate\Auth\AuthenticationException;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ParticipateInForumTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_unlogged()
    {
        $this->expectException(AuthenticationException::class);
        $thread = factory(Thread::class)->create();

        $repl = factory(Reply::class)->create();
        $this->post("{$thread->path()}/replies", $repl->toArray());
    }

    /** @test */
    public function an_lodded_in_user_may_participate_in_forum_threads()
    {
        $this->be($user = factory(User::class)->create());
        $thread = factory(Thread::class)->create();

        $repl = factory(Reply::class)->make();
        $this->post("{$thread->path()}/replies", $repl->toArray());

        $this->get($thread->path())->assertSee($repl->body);
    }
}
