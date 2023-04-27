<?php
$data = unserialize($student->attendance);
#print_r($data);
if (!empty($data)) {
    ?>
@foreach($data as $key => $value)
    <div style="padding:4px; border: solid 1px #1a202c; border-radius: 5px">
            <?php
            #zapisywana nieobecność w tablicy: attendance["dzien.mies.rok godzina=teacher_id"] = "id_przedmiotu=wiadomość_wpisana_przez_naucz"
            $id_mess = explode('=', $value);
    $date_teach = explode('=', $key);
    $subject = App\Models\Subject::where('id', $id_mess[0])->first();
    $teacher = App\Models\User::where('id', $date_teach[1])->first();
    ?>

        <b>Data i godzina wystawienia:</b> {{$date_teach[0]}}<br>
        <b>Przedmiot:</b> {{$subject->name}}<br>
        <b>Nieobecność wpisana przez:</b> {{$teacher->name}} {{$teacher->surname}}<br>
        <b>Wiadomość od nauczyciela:</b> {{$id_mess[1]}}<br>
    </div><br><br>
@endforeach
    <?php
} else {
    ?> <p> Brak informacji o nieobecnościach. </p> <?php
}
?>
