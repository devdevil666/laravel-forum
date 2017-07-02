@component('profiles.activities.activity')
    @slot('heading')
        {{ $profileUser->name }} favorited
            {{ $activity->subject->favorited->thread->title }}
    @endslot

    @slot('body')
        {{ $activity->subject->favorited->body }}
    @endslot
@endcomponent