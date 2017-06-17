@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="{{ route('user_profile', [$thread->creator]) }}">{{ $thread->creator->name }}</a> posted {{ $thread->title }}</div>

                    <div class="panel-body">
                            <article>
                                <div class="body">
                                    {{ $thread->body }}
                                </div>
                            </article>
                            <hr>
                    </div>
                </div>
                @foreach($replies as $reply)
                    @include('threads.reply')
                @endforeach

                {{ $replies->links() }}

                @if(auth()->check())
                    <form action="{{ route('store_reply', [$thread->channel, $thread]) }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <textarea name="body" id="body" class="form-control" placeholder="Body"></textarea>
                        </div>

                        <button type="submit" class="btn btn-default">Reply</button>
                    </form>
                @endif
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">

                    <div class="panel-body">
                        <article>
                            <div class="body">
                                {{ $thread->created_at->diffForHumans() }}
                                by <a href="{{ route('user_profile', [$thread->creator]) }}">{{ $thread->creator->name }}</a>
                                <br>
                                {{ $thread->replies_count }} {{ str_plural('comment', $thread->replies_count) }}.
                            </div>
                        </article>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
