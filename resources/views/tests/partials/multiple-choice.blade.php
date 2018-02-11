<form action="{{ route('lessons.test', [$lesson->slug]) }}" method="post">
    {{ csrf_field() }}
    @foreach ($lesson->test->questions as $question)
    <b>{{ $loop->iteration }}. {{ $question->question }}</b>
    <br /> @foreach ($question->options as $option)
    <input type="radio" name="questions[{{ $question->id }}]" value="{{ $option->id }}" /> {{ $option->option_text
    }}
    <br /> @endforeach
    <br /> @endforeach
    <input type="submit" value=" Submit results " />
</form>