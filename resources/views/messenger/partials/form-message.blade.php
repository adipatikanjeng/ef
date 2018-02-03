Add a new message
<form action="{{ route('messages.update', $thread->id) }}" method="post">
    {{ method_field('put') }} {{ csrf_field() }}
    <!-- Message Form Input -->
    <div class="form-group">
        <textarea name="message" class="form-control">{{ old('message') }}</textarea>
    </div>
    Select Recipients
    <div class="form-group">
        @if($users->count() > 0) {!! Form::select('recipients[]', $users, old('recipients') ? old('recipients'): $recipients, ['class'
        => 'form-control select2', 'multiple' => 'multiple', 'required' => '']) !!} @endif
    </div>
    <!-- Submit Form Input -->
    <div class="form-group">
        <button type="submit" class="btn btn-primary form-control">Submit</button>
    </div>
</form>