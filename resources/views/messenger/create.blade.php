@extends('layouts.app')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        Create Message
    </div>
    <div class="panel-body">
        <form action="{{ route('messages.store') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <input type="text" class="form-control" name="subject" placeholder="Subject" value="{{ old('subject') }}" required>
            </div>
            <!-- Message Form Input -->
            <div class="form-group">
                <textarea name="message" class="form-control">{{ old('message') }}</textarea>
            </div>
            Select Recipients
            <div class="form-group">
                @if($users->count() > 0) {!! Form::select('recipients[]', $users, old('recipients'), ['class' => 'form-control select2',
                'multiple' => 'multiple', 'required' => '']) !!} @endif
            </div>
            <!-- Submit Form Input -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary form-control">Submit</button>
            </div>
        </form>
        <a href="/profile#messages" class="btn btn-default">@lang('global.posts.back')</a>
    </div>
</div>
@stop