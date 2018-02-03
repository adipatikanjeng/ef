@extends('layouts.app')
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        {{ $thread->subject }}
        <div class="panel-action">
           {!! Form::open(array( 'style' => 'display: inline-block;', 'method' => 'DELETE', 'onsubmit'
            => "return confirm('".trans("global.app_are_you_sure")."');", 'route' => ['messages.destroy', $thread->id])) !!}
            <button class="" type="submit"><i class="mdi mdi-delete mdi-24px"></i></button> {!! Form::close() !!}
        </div>
    </div>
    <div class="panel-body">
        @each('messenger.partials.messages', $thread->messages, 'message')
    </div>
    <div class="panel-footer">

    <?php $recipients = $thread->messages->pluck('user_id')->toArray() ?>
    @include('messenger.partials.form-message',['recipients' => $thread->participants()->pluck('user_id')->toArray()])
    <a href="/profile#messages" class="btn btn-default">@lang('global.posts.back')</a>
    </div>
</div>
@stop