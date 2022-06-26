@extends('Admin.Dashboard.pages.masterpage') @section('content')

<!-- content section -->
<div class="container my-3">

    <!-- section questionAnswer -->

    <a href="/dashboard" class="btn btn-primary mx-3 text-blue-500 hover:text-blue-700">
        Dashboard
    </a>


    {{-- form to create question and answer with related subjects and departments --}}
    <form action="{{route('questions.store')}}" class="my-2 mt-3" method="POST">
        @csrf
        <!-- seect department -->
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label for="exampleFormControlTextarea1" class="form-label">Select Department</label>
                <select onchange="fetchSubjects(this.value)" class="form-select" name="department_id"
                    aria-label="Default select example">
                    <option value="">Select Department</option>
                    @foreach ($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>
                @error('department_id')
                <p class="text-danger -500 text-xs fst-italic">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <!-- seect subject -->
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label for="exampleFormControlTextarea1" class="form-label">Select Subject</label>
                <select class="form-select" name="subject_id" id="subjects" aria-label="Default select example">
                    <option selected>Select Subject</option>
                    @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                    @endforeach
                </select>
                @error('subject_id')
                <p class="text-danger -500 text-xs fst-italic">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Question textarea -->
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">

                <!-- textarea -->
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Question</label>


                    <!-- suliman sir code of area text -->
                    <textarea class="form-control" id="exampleFormControlTextarea1" id="grid-question" name="question" placeholder="Enter question" required value="{{ old('question') }}" rows="3"></textarea>
                </div>
                <!-- show error message -->
                @error('question')
                <p class="text-danger -500 text-xs fst-italic">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">

                <!-- textarea -->
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Answer</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="answer"
                        placeholder="Enter answer" value="{{ old('answer') }}" rows="3"></textarea>
                </div>
                <!-- show error message -->
                @error('answer')
                <p class="text-danger -500 text-xs fst-italic">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Submit button -->
        <div class="flex flex-wrap -mx-3">
            <div class="w-full px-3">
                <button
                    class="btn btn-primary bg-blue-500 hover:bg-blue-700 mt-3 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Create
                </button>
            </div>
        </div>
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

<!-- End content section -->
@endsection
