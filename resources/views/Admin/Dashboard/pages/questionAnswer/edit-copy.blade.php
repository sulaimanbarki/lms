@extends('Admin.Dashboard.pages.masterpage')

@section('content')

<!-- content section -->
<div class="container my-3">
    <form action="{{route('questions.update',$question->id)}}" method="POST">
        @csrf
        @method('PUT')
        {{-- department form-group textarea --}}
        <div class="form-group">
            <label for="department_id" class="form-lable">
                Department
            </label>
            <select name="department_id" onchange="fetchSubjects(this.value)" id="department_id" class="form-control">
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}" {{ $question->department_id == $department->id ? 'selected' : '' }}>
                        {{ $department->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="subject_id" class="form-lable">
                Subject
            </label>
            <select name="subject_id" id="subjects" class="form-control">
                @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}" {{ $question->subject_id == $subject->id ? 'selected' : '' }}>
                        {{ $subject->name }}
                    </option>
                @endforeach
            </select>
        </div>
        {{-- question form-group textarea --}}
        <div class="form-group">
            <label for="question" class="form-lable">
                Question
            </label>
            <textarea name="question" id="question" class="form-control" rows="3">{{ $question->question }}</textarea>
        </div>
        {{-- answer form-group textarea --}}
        <div class="form-group">
            <label for="answer" class="form-lable">
                Answer
            </label>
            <textarea name="answer" id="answer" class="form-control" rows="3">{{ $question->answer }}</textarea>
        </div>
        {{-- submit button --}}
        <button type="submit" class="btn btn-primary mt-2">
            Update
        </button>
        {{-- cancel button --}}
        <a href="/questions" class="btn btn-secondary mt-2">
            Cancel
        </a>
    </form>
    </div>

{{-- normal jquery cdn --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function fetchSubjects(id) {
        $.ajax({
            url: "{{ route('fetchSubjects') }}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                id: id
            },
            success: function(data) {
                // empty the select box
                $('#subjects').empty();
                // loop on data and append to select
                $.each(data, function(key, value) {
                    $('#subjects').append($('<option>', {
                        value: value.id,
                        text: value.name
                    }));
                });
            }
        });
    }
</script>
@endsection
