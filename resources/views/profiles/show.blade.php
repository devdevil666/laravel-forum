@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="page-header">
                    <h1>{{ $profileUser->name }}</h1>
                </div>

                @foreach($threads as $thread)
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
                @endforeach

                {{ $threads->links() }}
            </div>
        </div>
    </div>
@endsection
