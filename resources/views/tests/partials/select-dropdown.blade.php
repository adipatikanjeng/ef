<form action="{{ route('lessons.test', [$lesson->slug]) }}" method="post">
    {{ csrf_field() }}
    @foreach ($lesson->test->questions as $question)
    <b>{{ $loop->iteration }}. {!! str_replace('??', Form::select('questions['.$question->id.']', $question->options->pluck('option_text', 'id')->prepend('','')), $question->question) !!}</b>
    <br />

    <br /> @endforeach
    <input type="submit" value=" Submit results " />
</form>