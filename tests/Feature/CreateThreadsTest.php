<?php

namespace Tests\Feature;

use App\Channel;
use App\Reply;
use App\Thread;
use App\User;
use Illuminate\Auth\AuthenticationException;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateThreadsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function guest_may_not()
    {
        $this->expectException(AuthenticationException::class);
        $thread = make(Thread::class);
        $this->post('/threads', $thread->toArray());
    }

    /** @test */
    public function user_can_create_new_threads()
    {
        $this->signIn();

        $thread = make(Thread::class);
        $response = $this->post('/threads', $thread->toArray());

        $this->get($response->headers->get('Location'))
            ->assertSee($thread->title)
            ->assertSee($thread->body);
    }

    /** @test */
    public function guest_not()
    {
        $this->expectException(AuthenticationException::class);

        $this->get('/threads/create');
    }

    /** @test */
    public function a_thread_requires_a_title()
    {
        $this->expectException(\Illuminate\Validation\ValidationException::class);

        $this->publishThread(['title' => null])
            ->assertSessionHasErrors('title');
    }

    /** @test */
    public function a_thread_requires_a_body()
    {
        $this->expectException(\Illuminate\Validation\ValidationException::class);

        $this->publishThread(['body' => null])
            ->assertSessionHasErrors('body');
    }

    /** @test */
    public function a_thread_requires_a_channel()
    {
        $this->expectException(\Illuminate\Validation\ValidationException::class);
        factory(Channel::class, 2)->create();

        $this->publishThread(['channel_id' => null])
            ->assertSessionHasErrors('channel_id');

        $this->publishThread(['channel_id' => 2])
            ->assertSessionHasErrors('channel_id');
    }

    public function publishThread($overides = [])
    {
        $this->signIn();

        $thread = make(Thread::class, $overides);
        return $this->post('/threads', $thread->toArray());
    }

    /** @test */
    public function get_cannot_delete_threads()
    {
        $this->expectException(AuthenticationException::class);
        $thread = create(Thread::class);

        $this->delete('DELETE', $thread->path());
    }

    /** @test */
    public function thread_may_only_be_deleted_by_those_who_have_permissions()
    {

    }

    /** @test */
    public function thread_can_be_deleted()
    {
        $this->signIn();
        $thread = create(Thread::class);

        $reply = create(Reply::class, ['thread_id' => $thread->id]);

        $this->json('DELETE', $thread->path())
            ->assertStatus(204);

        $this->assertDatabaseMissing('threads', ['id' => $thread->id]);
        $this->assertDatabaseMissing('replies', ['id' => $reply->id]);
    }
}
