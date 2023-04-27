<x-app-layout>

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100" style="margin-top:2%; margin-bottom:5%;">
        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Prowadzisz lekcję klasy ') }} {{$klasa->year}}{{$klasa->letter}} <br><br>
            </h2>

            <h4>
                Jeśli student jest obecny, w kolumnie frekwencji nic nie musisz wpisywać<br><br>
            </h4>

            <?php $i = 1; ?>

            @if($students->isEmpty())
                <p class="p-6">Brak uczniów w tej klasie.</p>
            @else
                <form method="POST" action="{{ route('teachers.savemarks', ['klasa_id'=>$klasa->id]) }}">
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
                                Frekw.
                            </th>
                            <th scope="col" class="py-2 px-4">
                                Oceny
                            </th>
                            <th scope="col" class="py-2 px-4">
                                Dodaj ocenę
                            </th>
                            <th scope="col" class="py-2 px-4">
                                Opis oceny
                            </th>
                            <th scope="col" class="py-2 px-4">
                                Uwagi
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
                                        <?php $old = $_POST['attendance' . $student->user_id] ?? ''; ?>
                                    <div>
                                        <x-input-label for="attendance{{$student->user_id}}" :value="__('')"/>
                                        <x-text-input id="attendance{{$student->user_id}}" size="1" class="w-20 block mt-1"
                                                      type="text" name="attendance{{$student->user_id}}" :value="$old"
                                                      autofocus/>
                                        <x-input-error :messages="$errors->get('attendance')" class="mt-2"/>
                                    </div>
                                </td>
                                <td class="py-2 px-4">
                                        <?php
                                        $oceny = \App\Models\Marks::where("student_id", $student->user_id)->where('teacher_id', $teacher->user_id)->get();

            if ($oceny == null) {
                echo "brak";
            } else {
                foreach ($oceny as $ocena) {
                    if ($ocena != '') {
                        echo $ocena->mark . ", ";
                    }
                }
            }
            ?>
                                </td>
                                <td class="py-2 px-4">
                                    <div>
                                        <input style="border-radius: 5px; border: #cbd5e0 solid 1px" type="text" id="mark{{$student->user_id}}" class="w-20"
                                               name="mark{{$student->user_id}}" size="1">
                                    </div>
                                </td>
                                <td class="py-2 px-4">
                                    <div>
                                        <input style="border-radius: 5px; border: #cbd5e0 solid 1px" type="text" id="descr{{$student->user_id}}"
                                               name="descr{{$student->user_id}}" size="10">
                                    </div>
                                </td>
                                <td class="py-2 px-4">
                                    <input style="border-radius: 5px; border: #cbd5e0 solid 1px" type="text" id="uwaga{{$student->user_id}}"
                                           name="uwaga{{$student->user_id}}" size="15">
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button class="ml-4">
                            {{ __('Zapisz frekwencję, oceny i uwagi') }}
                        </x-primary-button>
                    </div>
                </form>
            @endif
        </div>
    </div>
</x-app-layout>
