<?php $i = 1?>

@if($students->isEmpty())
    <p class="p-6" style="margin-left:20%">Brak uczniów w twojej klasie.</p>
@else
    <table style="width: 70%; margin: auto" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="py-2 px-2" style="">Nr.</th>
            <th scope="col" class="py-2 px-2">Imię</th>
            <th scope="col" class="py-2 px-2">Nazwisko</th>
            <th scope="col" class="py-2 px-4">Ważne</th>
            <th scope="col" class="py-2 px-2">Szczegóły</th>
        </tr>
        </thead>
        <tbody>
        @foreach($students as $student)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="py-2 px-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">  {{$i}} <?php $i += 1; ?> </td>
                <td class="py-2 px-2"> {{$student->user->name}} </td>
                <td class="py-2 px-2">{{$student->user->surname}} </td>
                <td class="py-2 px-4">{{$student->about}}</td>
                <td class="py-2 px-2">
                    <x-primary-button>
                        <a href={{ route('teachers.show_student',$student) }}>
                            {{ __('Szczegóły') }}
                        </a>
                    </x-primary-button>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif
