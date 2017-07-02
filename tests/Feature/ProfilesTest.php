<?php

namespace Tests\Feature;

use App\Thread;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProfilesTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_user_has_profile()
    {
        $user = create(User::class);
        $this->get("/profiles/{$user->name}")
            ->assertSee($user->name);
    }

    /** @test */
    public function profile_display_threads_associated_by_user()
    {
        $this->signIn();

        $thread = create(Thread::class, ['user_id' => auth()->id()]);
        $userName = auth()->user()->name;
        $this->get("/profiles/{$userName}")
            ->assertSee($thread->title)
            ->assertSee($thread->body);
    }
}
