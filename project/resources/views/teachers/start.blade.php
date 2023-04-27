<x-app-layout>

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Wybierz klasę') }} <br><br>
            </h2>

        @if($klasy->isEmpty())
                <p class="p-6">Brak klas w bazie danych.</p>
            @else
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            Klasa
                        </th>
                        <th scope="col" class="py-3 px-6">

                        </th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($klasy as $klasa)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$klasa->year}}{{$klasa->letter}}
                            </td>
                            <td class="py-4 px-6">
                                <a href={{ route('teachers.start2', ['klasa_id'=>$klasa->id]) }}>Wybierz</a>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            @endif
        </div>
    </div>
</x-app-layout>
