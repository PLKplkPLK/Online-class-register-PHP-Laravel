<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{"Zajęcia"}}
        </h2>
    </x-slot>

    <div class="py-12">
        @if (isset($message) && $message == "CREATED")
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="p-6 text-gray-900">

                            <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ "Utworzono nowe zajęcia"}}</h2>

                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>

    <div class="overflow-x-auto relative mx-auto" style="width:70%; margin-bottom:2%;">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        @sortablelink('subject.name', 'Przedmiot')
                    </th>
                    <th scope="col" class="py-3 px-6">
                        @sortablelink('grade.year', 'Klasa')
                    </th>
                    <th scope="col" class="py-3 px-6">
                        @sortablelink('user.surname', 'Nauczyciel')
                    </th>
                    <th scope="col" class="py-3 px-6">
                        @sortablelink('day', 'Dzień')
                    </th>
                    <th scope="col" class="py-3 px-6">
                        @sortablelink('hour', 'Godzina')
                    </th>
                    <th scope="col" class="py-3 px-6">

                    </th>
                </tr>
                </thead>
                <tbody>
                @if ($activities->count() == 0)
                    <tr>
                        <td colspan="6">Brak zajęć w bazie danych</td>
                    </tr>
                @endif

                @foreach($activities as $activity)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$activity->subject->name}}
                        </td>
                        <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$activity->grade->year . $activity->grade->letter}}
                        </td>
                        <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$activity->teacher->user->name . " " . $activity->teacher->user->surname}}
                        </td>
                        <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$activity->day}}
                        </td>
                        <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$activity->hour}}
                        </td>
                        <td class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a href={{ route('activity.show',$activity) }}>Szczegóły</a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>

        {!! $activities->appends(Request::except('page'))->render() !!}
            <br><br><br>

    </div>

</x-app-layout>
