<?php

namespace Tests\Feature;

use App\Reply;
use App\Thread;
use Illuminate\Auth\AuthenticationException;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FavoritesTest extends TestCase
{
    use DatabaseMigrations;

    /** @var Thread */
    protected $thread;

    protected function setUp()
    {
        parent::setUp();
        $this->thread = factory(Thread::class)->create();
    }

    /** @test */
    public function guests_cannot_favorite()
    {
        $this->expectException(AuthenticationException::class);

        $reply = create(Reply::class);
        $this->post("replies/{$reply->id}/favorites");
    }

    /** @test */
    public function logged_in_user_can_favorite()
    {
        $this->signIn();

        $reply = create(Reply::class);

        $this->post("replies/{$reply->id}/favorites");

        $this->assertCount(1, $reply->favorites);
    }

    /** @test */
    public function logged_in_user_can_favorite_only_onse()
    {
        $this->signIn();

        $reply = create(Reply::class);

        try {
            $this->post("replies/{$reply->id}/favorites");
            $this->post("replies/{$reply->id}/favorites");
        } catch (\Exception $e) {
            $this->fail('Only onse!');
        }

        $this->assertCount(1, $reply->favorites);
    }

}
