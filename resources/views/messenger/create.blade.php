@extends('layouts.app')

@section('content')
<div class="row">
    <h3>Create Message</h3>
    <form action="{{ route('messages.store') }}" method="post">
        {{ csrf_field() }}
        <div class="">
            <!-- Subject Form Input -->
            <div class="form-group">
                <label class="control-label">Subject</label>
                <input type="text" class="form-control" name="subject" placeholder="Subject"  value="{{ old('subject') }}" required>
            </div>

            <!-- Message Form Input -->
            <div class="form-group">
                <label class="control-label">Message</label>
                <textarea name="message" class="form-control" placeholder="Message" required>{{ old('message') }}</textarea>
            </div>

            @if($users->count() > 0)
                <div class="form-group">
                    <label class="control-label">Participants</label>
                    <select class="select2" style="width:100%" name="recipients[]" multiple="multiple" required>
                            @foreach($users as $user)
                            <option value="{{$user->id}}">{{ $user->name }} </option>
                            @endforeach
                        </div>
                    </select>
                </div>
            @endif

            <!-- Submit Form Input -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary form-control">Submit</button>
            </div>
        </div>
    </form>
</div>
@endsection
