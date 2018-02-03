Add a new message
{!! Form::open(['method' => 'POST', 'route' => ['messages.update', $thread->id], 'files' => true,]) !!}
    {{ method_field('put') }} {{ csrf_field() }}
    <!-- Message Form Input -->
    <div class="form-group">
        <textarea name="message" class="form-control">{{ old('message') }}</textarea>
    </div>
    Attach File
    <div class="form-group">
        <input type="file" class="form-control" name="file_name" placeholder="Add file" value="{{ old('message_file') }}">
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

{!! Form::close() !!}
