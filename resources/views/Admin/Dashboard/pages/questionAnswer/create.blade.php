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

<!-- mathquill4quill include -->
<script src="{{asset('mathquill4quill-master/mathquill4quill.js')}}"></script>
<link rel="stylesheet" href="{{asset('mathquill4quill-master/mathquill4quill.css')}}">

<!-- demo page -->
{{-- <link rel="stylesheet" href="index.css">
<script src="index.js"></script> --}}

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
                    <textarea class="form-control quill-editor" id="exampleFormControlTextarea1" id="grid-question" name="question" placeholder="Enter question" required value="{{ old('question') }}" rows="3"></textarea>
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
                    <textarea class="form-control quill-editor" id="exampleFormControlTextarea1" name="answer"
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
<script>
    $('.quill-editor').each(function(i, el) {
      var el = $(this), id = 'editor-' + i, val = el.val(), editor_height = 200;
      var div = $('<div/>').attr('id', id).css('height', editor_height + 'px').html(val);
      el.addClass('d-none');
      console.log(div);
      el.parent().append(div);

      var quill = new Quill('#' + id, {
          modules: { toolbar: true,
            formula: true,
            toolbar: [["video", "bold", "italic", "underline", "formula", "strike",'blockquote', 'code-block', 'link', 'image', 'video', 'math', 'table', 'list', 'bullet', 'checklist', 'indent', 'outdent', 'undo', 'redo', 'clear']]
          },
          theme: 'snow'
      });
      quill.on('text-change', function() {
          //  textarea value = quill.root.innerHTML;
          el.val(quill.root.innerHTML);

          el.html(quill.getContents());
      });
      var enableMathQuillFormulaAuthoring = mathquill4quill();
      enableMathQuillFormulaAuthoring(quill);
            enableMathQuillFormulaAuthoring(quill, {
      operators: [["\\pm","\\pm"],["\\sqrt{x}","\\sqrt"],["\\sqrt[3]{x}","\\sqrt[3]{}"],["\\sqrt[n]{x}","\\nthroot"],
                    ["\\frac{x}{y}","\\frac"],["\\sum^{s}_{x}{d}", "\\sum"],["\\prod^{s}_{x}{d}", "\\prod"],
                    ["\\coprod^{s}_{x}{d}", "\\coprod"],["\\int^{s}_{x}{d}", "\\int"],["\\binom{n}{k}", "\\binom"]]
      });
    });
</script>

<!-- End content section -->
@endsection
