@extends('Admin.Dashboard.pages.masterpage')

@section('content')

<!-- content section -->
<div class="container my-3">

    <!-- Question Answers section -->
    <a href="/questions/create" class="btn btn-primary text-blue-500 hover:text-blue-700">
        <i class="fas fa-plus-circle"></i>
        Add Question
    </a>
    <a href="/dashboard" class="btn btn-primary text-blue-500 hover:text-blue-700">
        Dashboard
    </a>
    <div class="flex flex-wrap -m-2">
        @foreach ($questions as $question)
            <div class="w-full md:w-1/2 p-2">
                <div class="bg-white overflow-hidden shadow-lg">
                    <div class="p-4">
                        <h3 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ $question->question }}
                        </h3>
                        <p class="text-gray-700 text-base">
                            {{-- limited number of character --}}
                            {{ substr($question->answer, 0, 200) }}
                        </p>
                        <p class="text-gray-700 text-base">
                            <span class="text-primary">Subject</span> {{ $question->subject->name }}
                        </p>
                        <p class="text-gray-700 text-base">
                            <span class="text-primary">Department</span> {{ $question->subject->department->name }}
                        </p>
                        <a href="/questions/{{ $question->id }}/edit" class="text-blue-500 hover:text-blue-700">
                            <i class="fas fa-edit"></i>
                            Edit
                        </a>
                        <form action="/questions/{{ $question->id }}" method="POST" onsubmit="return confirm('Are you shure to delete this record?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700">
                                <i class="fas fa-trash-alt"></i>
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<!-- Question Answers section -->

<!-- End content section -->
@endsection
