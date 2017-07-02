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
    public function an_logged_in_user_may_participate_in_forum_threads()
    {
        $this->signIn();
        $thread = create('App\Thread');
        $reply = make('App\Reply');
        $this->post($thread->path() . '/replies', $reply->toArray());
        //$this->get($thread->path())
          //  ->assertSee($reply->body);
    }

    /** @test */
    public function unlogged_users_cannot_delete_replies()
    {
        $this->signIn();
        $reply = create(Reply::class, [
            'user_id' => auth()->id()
        ]);

        $this->delete('/replies/' . $reply->id)
            ->assertStatus(302);

        $this->assertDatabaseMissing('replies', [
            'id' => $reply->id
        ]);
    }
}
