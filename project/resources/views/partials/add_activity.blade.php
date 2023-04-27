 <div class="mt-4">
            <x-input-label for="subject_id" :value="__('Przedmiot')"/>

            <x-select-input id="subject_id" name="subject_id">
                @foreach($subjects as $subject)
                    <option value={{$subject->id}}>{{$subject->name}} </option>
                @endforeach

            </x-select-input>
        </div>

        <div class="mt-4">
            <x-input-label for="teacher_id" :value="__('Nauczyciel')"/>

            <x-select-input id="teacher_id" name="teacher_id">
                @foreach($teachers as $teacher)
                    <option
                        value={{$teacher->user_id}}>{{$teacher->user->name . " " . $teacher->user->surname}} </option>
                @endforeach

            </x-select-input>
            @if(Session::get('flaga_zajecia') == 1)
                <br><h3 style="color:red">Ten nauczyciel nie prowadzi tego przedmiotu</h3>
            @endif

        </div>

        <div class="mt-4">
            <x-input-label for="class_id" :value="__('Dzień')"/>

            <x-select-input id="day" name="day">
                <?php $dni = ['Poniedziałek', 'Wtorek', 'Środa', 'Czwartek', 'Piątek']; ?>
                @foreach($dni as $dzień)
                    <option value={{$dzień}}>{{$dzień}} </option>
                @endforeach
            </x-select-input>
            <x-input-error :messages="$errors->get('day')" class="mt-2"/>
        </div>

        <div class="mt-4">
            <x-input-label for="class_id" :value="__('Godzina')"/>

            <x-select-input id="hour" name="hour">
                <?php $godziny = ['8:00', '8:55', '9:40', '10:45', '11:45', '12:45', '13:40', '14:35'] ?>
                @foreach($godziny as $godzina)
                    <option value={{$godzina}}>{{$godzina}} </option>
                @endforeach
            </x-select-input>
            <x-input-error :messages="$errors->get('hour')" class="mt-2"/>
            @if(Session::get('flaga_data') == 1)
                <br><h3 style="color:red">Nauczyciel prowadzi wtedy zajęcia</h3>
            @endif
        </div>
        <br>


