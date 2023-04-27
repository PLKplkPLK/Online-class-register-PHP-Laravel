<?php $przedmioty=\App\Models\Subject::all(); ?>
<br>
@foreach($przedmioty as $przedmiot)
    {{$przedmiot->name}}:

    <?php $oceny=\App\Models\Marks::where('student_id', $student->user_id)->where('subject_id', $przedmiot->id)->get(); ?>
    @if($oceny->empty())
    @foreach($oceny as $ocena)

        @if(!empty($ocena->description))
        {{$ocena->mark . " - " . $ocena->description . ", "}}
        @else
        {{$ocena->mark . ", "}}
        @endif
    @endforeach
    <br><br>
    @else
        Brak ocen<br><br>
    @endif
@endforeach
