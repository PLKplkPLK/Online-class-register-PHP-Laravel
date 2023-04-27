<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{"Klasy które uczysz"}}
        </h2>
    </x-slot>
    <div style="width:60%; margin-left: 20%;margin-top:2%; margin-bottom:5%;">
    @foreach($klasy as $klasa)
        <?php
        $i = 1;
        $students = $klasa->students;
        ?>

        <h1>Klasa {{$klasa->year}}{{$klasa->letter}}</h1>


        <form method="POST" action="{{ route('teachers.editmarks', ['klasa_id'=>$klasa->id]) }}">
            @csrf

        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-2 px-2" style="">
                    Nr.
                </th>
                <th scope="col" class="py-2 px-2">
                    Imię
                </th>
                <th scope="col" class="py-2 px-2">
                    Nazwisko
                </th>
                <th scope="col" class="py-2 px-4">
                    Ważne
                </th>
                <th scope="col" class="py-2 px-4">
                    Oceny
                </th>
            </tr>
            </thead>
            <tbody>

            @foreach($students as $student)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="py-2 px-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$i}} <?php $i += 1; ?>
                    </td>
                    <td class="py-2 px-2">
                        {{$student->user->name}}
                    </td>
                    <td class="py-2 px-2">
                        {{$student->user->surname}}
                    </td>
                    <td class="py-2 px-4">
                        {{$student->about}}
                    </td>
                    <td class="py-2 px-4">
                            <?php $oceny = \App\Models\Marks::where("student_id", $student->user_id)->where('teacher_id', $teacher->user_id)->get(); ?>
                        @if($oceny->isEmpty())
                            brak
                        @else
                            @foreach($oceny as $ocena)
                                <div style="width:180px; float:left; margin: 0 5px;">
                                <x-text-input style="width:80px" id="mark{{$ocena->id}}" size="1" class="mt-1"
                                              type="text" name="mark{{$ocena->id}}" :value="$ocena->mark"
                                              autofocus/>
                                <a style="color:darkred; font-size: 32px; margin-left: 20px" href="delete_mark/{{$ocena->id}}"><img style="height:40px; width:40px; float:right; margin-right:40px" src="https://cdn-icons-png.flaticon.com/512/1345/1345874.png"></a>
                                <x-text-input style="width:150px" id="descr{{$ocena->id}}" size="1" class="mt-1"
                                              type="text" name="descr{{$ocena->id}}" :value="$ocena->description"
                                              autofocus/>
                                </div>
                            @endforeach
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ml-4">
                {{ __('Zapisz oceny') }}
            </x-primary-button>
        </div>
        </form>
    @endforeach

    </div>
</x-app-layout>
