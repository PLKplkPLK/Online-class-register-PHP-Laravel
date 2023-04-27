<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{"Informacje o nauczycielu: " .  $user->name . " " . $user->surname }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    Imię: <h2 class="font-semibold text-xl text-gray-800 leading-tight pb-1">{{ $user->name }}</h2>
                    Nazwisko: <h2 class="font-semibold text-xl text-gray-800 leading-tight pb-1">{{ $user->surname }}</h2>
                    Przedmiot: <h2 class="font-semibold text-xl text-gray-800 leading-tight pb-1">{{ $subject->name }}</h2>
                    Wychowawstwo:<h2 class="font-semibold text-xl text-gray-800 leading-tight pb-1">
                        @if (  $grade )
                            Klasa {{$grade->year . $grade->letter}}
                        @else
                            Ten nauczyciel nie jest wychowawcą.
                        @endif

                    </h2>
                </div>

                <div class="">

                    <form method="get" action="{{ route('teachers.edit', $teacher) }}">
                        <x-primary-button class=" ml-4 mb-4">
                            {{ __('Edytuj') }}
                        </x-primary-button>
                    </form>


                    <form method="post" action="{{route('teachers.destroy', $teacher)}}">

                        @csrf
                        @method("DELETE")

                        <x-danger-button class="ml-4 mb-4">
                            {{ __('Usuń konto') }}
                        </x-danger-button>
                    </form>
                </div>


            </div>
        </div>
    </div>
</x-app-layout>
