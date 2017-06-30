<?php

namespace Tests\Unit;

use App\Activity;
use App\Reply;
use App\Thread;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ActibityTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_records_activity()
    {
        $this->signIn();

        $thread = create(Thread::class);

        $this->assertDatabaseHas('activities',
            [
                'type' => 'created_thread',
                'user_id' => auth()->id(),
                'subject_id' => $thread->id,
                'subject_type' => Thread::class
            ]);
        $activity = Activity::first();

        $this->assertEquals($activity->subject->id, $thread->id);
    }

    /** @test */
    public function it_records_activity_4_reply()
    {
        $this->signIn();

        $reply = create(Reply::class);

        $this->assertEquals(2, Activity::count());
    }
}
