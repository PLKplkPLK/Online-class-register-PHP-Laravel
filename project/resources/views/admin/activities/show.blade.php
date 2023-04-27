<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{"Informacje o wybranych zajęciach"}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    Przedmiot: <h2 class="font-semibold text-xl text-gray-800 leading-tight pb-1">{{ $subject->name }}</h2>
                    Klasa: <h2 class="font-semibold text-xl text-gray-800 leading-tight pb-1">{{$grade->year . $grade->letter}}</h2>
                    Nauczyciel: <h2 class="font-semibold text-xl text-gray-800 leading-tight pb-1">{{$teacher->user->name . " " . $teacher->user->surname}} </h2>
                    Dzień: <h2 class="font-semibold text-xl text-gray-800 leading-tight pb-1">{{$activity->day}}</h2>
                    Godzina:<h2 class="font-semibold text-xl text-gray-800 leading-tight pb-1">{{$activity->hour}} </h2>
                </div>

                <div class="">

                    <form method="get" action="{{ route('activity.edit', $activity) }}">
                        <x-primary-button class=" ml-4 mb-4">
                            {{ __('Edytuj zajęcia') }}
                        </x-primary-button>
                    </form>


                    <form method="post" action="{{ route('activity.destroy', $activity) }}">

                        @csrf
                        @method("DELETE")

                        <x-danger-button class="ml-4 mb-4">
                            {{ __('Usuń zajęcia') }}
                        </x-danger-button>
                    </form>
                </div>


            </div>
        </div>

</x-app-layout>
