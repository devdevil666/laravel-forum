<div class="panel panel-default">
    <div class="panel-heading">
        <div class="level">
            <h5 class="flex">
                <a href="{{ route('user_profile', [$reply->owner]) }}">{{ $reply->owner->name }}</a> said {{ $reply->created_at->diffForHumans() }}
            </h5>

            <div>
                <form method="post" action="{{ route('submit_reply', [$reply]) }}">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-default {{ $reply->isFavorited() ? 'disabled' : '' }}">
                        {{ $reply->favorites_count }}
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="panel-body">
        <article>
            <div class="body">
                {{ $reply->body }}
            </div>
        </article>
    </div>
</div>