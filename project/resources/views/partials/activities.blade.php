<?php
    if (isset($grade)) {
        $activities = $grade->activity;
    } else {
        $activities = $teacher->activity;
    }
    ?>

@if(empty($activities))
    <p class="p-6">Brak zajęć.</p>
@else
    <?php
    $dni=['Poniedziałek', 'Wtorek', 'Środa', 'Czwartek', 'Piątek'];
    $godziny=['8:00', '8:55', '9:40', '10:45', '11:45', '12:45', '13:40', '14:35'];
    ?>

        @foreach($dni as $dzien)
            <h2 style="margin: 0 0 1% 15%">{{$dzien}}</h2>
            <table style="width: 70%; margin: auto; margin-bottom: 5%" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                @if(isset($teacher)) {{--bo to znaczy ze jestesmy na dashboardzie nauczyciela--}}
                    <tr>
                        <th scope="col" class="py-2 px-2" style="width:50px"></th>
                        <th scope="col" class="py-2 px-2">Klasa</th>
                    </tr>
                @else
                    <tr>
                        <th scope="col" class="py-2 px-2" style="width:50px"></th>
                        <th scope="col" class="py-2 px-2">Przedmiot</th>
                        <th scope="col" class="py-2 px-2">Nauczyciel</th>
                    </tr>
                @endif
                </thead>
                <tbody>

                @foreach($godziny as $godzina)
                    @if(isset($teacher))
                        <?php $activity = \App\Models\Activity::where('hour', $godzina)->where('day', $dzien)->where('teacher_id', \Illuminate\Support\Facades\Auth::id())->first(); ?>
                        @if($activity!=null)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="py-2 px-2 font-medium text-gray-900 whitespace-nowrap dark:text-white"> {{$activity->hour}} </td>
                                <td class="py-2 px-2">{{$activity->grade->year.$activity->grade->letter}} </td>
                            </tr>
                        @endif
                    @else
                        <?php $activity = \App\Models\Activity::where('hour', $godzina)->where('day', $dzien)->where('grade_id', $grade->id)->first(); ?>
                        @if($activity!=null)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="py-2 px-2 font-medium text-gray-900 whitespace-nowrap dark:text-white"> {{$activity->hour}} </td>
                                <td class="py-2 px-2"> {{$activity->subject->name}} </td>
                                <td class="py-2 px-2">{{$activity->teacher->user->name . " " . $activity->teacher->user->surname }} </td>
                            </tr>
                            {{-- Jak chcecie żeby pokazywały się nie wpisane lekcje to usuńcie komentarz
                                @else
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="py-2 px-2 font-medium text-gray-900 whitespace-nowrap dark:text-white"> {{$godzina}} </td>
                                    <td class="py-2 px-2">  </td>
                                    <td class="py-2 px-2">  </td>
                                </tr>--}}
                        @endif
                    @endif
                @endforeach
                </tbody>
            </table><br>
        @endforeach

    <br>
@endif
