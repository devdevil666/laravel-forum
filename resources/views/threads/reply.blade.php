<reply :attributes="{{ $reply }}" inline-template v-cloak>
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
                <div v-if="editing">
                    <div class="form-group">
                        <textarea class="form-control" rows="5" v-model="body"></textarea>
                    </div>

                    <button class="btn btn-xs btn-success" @click="update">Update</button>
                    <button class="btn btn-xs btn-link" @click="editing=false">Cancel</button>
                </div>
                <div v-else>
                    @{{ body }}
                </div>
            </article>
        </div>

        <div class="panel-footer level">
            <button class="btn btn-primary btn-xs mr-1" @click="editing=true">Edit</button>
            @can('update', $reply)
                <form action="/replies/{{ $reply->id }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                    <button class="btn btn-danger btn-xs">Delete</button>
                </form>
            @endcan
        </div>
    </div>
</reply>