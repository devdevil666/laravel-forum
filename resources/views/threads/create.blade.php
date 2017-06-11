@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create new</div>

                    <div class="panel-body">
                        <form action="/threads" method="post">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="channel_id">Channel</label>
                                <select class="form-control" name="channel_id" id="channel_id">
                                    <option value="">Choose</option>
                                    @foreach($channels as $channel)
                                        <option value="{{ $channel->id }}">{{ $channel->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
                            </div>

                            <div class="form-group">
                                <label for="body">Body</label>
                                <textarea name="body" id="body" class="form-control">{{ old('body') }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>

                        <p>
                            @include('errors')
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
