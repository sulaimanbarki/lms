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
            <textarea name="question" id="question" class="form-control quill-editor" rows="3">{{ $question->question }}</textarea>
        </div>
        {{-- answer form-group textarea --}}
        <div class="form-group">
            <label for="answer" class="form-lable">
                Answer
            </label>
            <textarea name="answer" id="answer" class="form-control  quill-editor" rows="3">{{ $question->answer }}</textarea>
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
    <script>
    $('.quill-editor').each(function(i, el) {
      var el = $(this), id = 'editor-' + i, val = el.val(), editor_height = 200;
      var div = $('<div/>').attr('id', id).css('height', editor_height + 'px').html(val);
      el.addClass('d-none');
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
@endsection
