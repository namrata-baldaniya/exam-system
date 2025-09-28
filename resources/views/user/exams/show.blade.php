@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>{{ $exam->title }}</h2>
        <div>
            Time Left: <span id="timer">{{ $exam->duration }}:00</span>
        </div>
    </div>

    {{-- Check if user already attempted --}}
    @if($alreadyTaken)
        <div class="alert alert-info">
            You have already taken this exam.
        </div>
    @else
        <form id="examForm" method="POST" action="{{ route('user.exams.submit', $exam->id) }}">
            @csrf

            @foreach($questions as $index => $q)
                <div class="card mb-3 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Q{{ $index + 1 }}. {{ $q->question_text }}</h5>

                        @foreach([1,2,3,4] as $i)
                            <div class="form-check">
                                <input class="form-check-input" type="radio" 
                                       name="answers[{{ $q->id }}]" 
                                       value="{{ $i }}" 
                                       id="q{{ $q->id }}_option{{ $i }}">
                                <label class="form-check-label" for="q{{ $q->id }}_option{{ $i }}">
                                    {{ $q->{'option'.$i} }}
                                </label>
                            </div>
                        @endforeach

                    </div>
                </div>
            @endforeach

            <button type="submit" class="btn btn-primary btn-lg">Submit Exam</button>
        </form>
    @endif

</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script>
$(document).ready(function() {
    var seconds = {{ $exam->duration * 60 }};
    var $timerDisplay = $('#timer');

    var timer = setInterval(function() {
        var min = Math.floor(seconds / 60);
        var sec = seconds % 60;
        $timerDisplay.text(min + ':' + (sec < 10 ? '0' + sec : sec));

        if(seconds <= 0) {
            clearInterval(timer);
            alert("Time is up! Submitting exam...");

            var $form = $('#examForm');
            $.ajax({
                url: $form.attr('action'),
                method: 'POST',
                data: $form.serialize(),
                success: function(response) {
                    window.location.href = "{{ route('user.results') }}";
                },
                error: function() {
                    alert('Error submitting exam!');
                }
            });
        }

        seconds--;
    }, 1000);
});
</script>

@endsection
