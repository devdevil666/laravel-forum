@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="#">{{ $thread->creator->name }}</a> posted {{ $thread->title }}</div>

                    <div class="panel-body">
                            <article>
                                <div class="body">
                                    {{ $thread->body }}
                                </div>
                            </article>
                            <hr>
                    </div>
                </div>
            </div>
        </div>

        {{--replyes--}}
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                @foreach($thread->replies as $reply)
                    @include('threads.reply')
                @endforeach

            </div>
        </div>

        @if(auth()->check())
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <form action="/threads/{{ $thread->id }}/replies" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <textarea name="body" id="body" class="form-control" placeholder="Body"></textarea>
                    </div>

                    <button type="submit" class="btn btn-default">Reply</button>
                </form>
            </div>
        </div>
        @endif

    </div>
@endsection
