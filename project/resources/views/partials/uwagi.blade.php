@if(!empty($data))

    @foreach($data as $key => $value)
        <div style="padding:4px; border: solid 1px #1a202c; border-radius: 5px">
            <?php
            #zapisywana uwag w tablicy: uwagi["dzien.mies.rok godzina:minuta=teacher_id"] = "treść"
            $details = explode('=', $key);
            $teacher = App\Models\User::where('id', $details[1])->first();
            ?>
            <b>Treść uwagi:</b> {{$value}}<br>
            <b>Data i godzina wystawienia:</b> {{$details[0]}}<br>
            <b>Wystawiono przez:</b> {{$teacher->name}} {{$teacher->surname}}<br>
        </div><br><br>
    @endforeach

@else
    <p> Brak uwag. </p>
@endif
