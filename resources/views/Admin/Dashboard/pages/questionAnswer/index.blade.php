@extends('Admin.Dashboard.pages.masterpage')

@section('content')
<!-- KaTeX dependency -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex@0.13.18/dist/katex.min.css" integrity="sha256-M6KFoDq9eUpmogkDgw6+3R3ZgUPSuFXnQyr8tskSfQs=" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/katex@0.13.18/dist/katex.min.js" integrity="sha256-FyuFDgL3AT2Wi7dlv82fSVvxe2rPx1rRSVtMOWeRp6k=" crossorigin="anonymous"></script>

<!-- Quill dependency -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.snow.css" integrity="sha256-jyIuRMWD+rz7LdpWfybO8U6DA65JCVkjgrt31FFsnAE=" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/quill@1.3.7/dist/quill.min.js" integrity="sha256-xnX1c4jTWYY3xOD5/hVL1h37HCCGJx+USguyubBZsHQ=" crossorigin="anonymous"></script>

<!-- MathQuill dependency -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@edtr-io/mathquill@0.11.0/build/mathquill.css" integrity="sha256-Qy/E+9TDDKI7fQ+y2hHMCBV96QiZs9mXWMOrD+/14IU=" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@edtr-io/mathquill@0.11.0/build/mathquill.min.js" integrity="sha256-1XldAnavTLoExr6gc0l1JD8cIzqRYhbi1eksEWsYdpY=" crossorigin="anonymous"></script>
<!-- End Header-->
<link rel="stylesheet" href="{{asset('mathquill4quill-master/mathquill4quill.css')}}">
<script src="{{asset('mathquill4quill-master/mathquill4quill.js')}}"></script>
<link rel="stylesheet" href="{{asset('mathquill4quill-master/mathquill4quill.css')}}">
<!-- content section -->
<div class="container my-3 question_answer_main ">

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
                            <span style="font-size: 1.3rem;" >{{ $question->id }}</span> {!! $question->question !!}
                        </h3>
                        <p class="text-gray-700 text-base " id="question_ans_section" >
                            {{-- limited number of character --}}
                            {!! $question->answer !!}
                        </p>
                        <p class="text-gray-700 text-base question_answer_subject">
                            <span class="text-primary">Subject</span> {{ $question->subject->name }}
                        </p>
                        <p class="text-gray-700 text-base">
                            <span class="text-primary question_answer_department">Department</span> {{ $question->subject->department->name }}
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
