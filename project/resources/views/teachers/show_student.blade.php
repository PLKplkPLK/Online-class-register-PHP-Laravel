<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{"Szczegóły ucznia " . $student->user->name . ' ' . $student->user->surname}}
        </h2>
    </x-slot>


    <div style="width:30%; margin-left:15%; margin-top:2%; margin-bottom:2%; float:left;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Informacje o uczniu</h2>
                    Imię i nazwisko: <b>{{$student->user->name}} {{$student->user->surname}}</b><br>
                    Klasa: <b>{{$student->grade->year . $student->grade->letter}}</b><br>
                    Dodatkowe informacje: <b>{{$student->about}}</b><br>
                </div>
            </div>
        </div>
    </div>




    {{--<div style=" width:30%; float: left; margin-top:2%; margin-left:5%;">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Frekwencja</h2>
                    Aktualna ilość nieobecności: {{$student->number_of_absences}}

                </div>
            </div>
        </div>

    </div>--}}


    <div style=" width:30%;clear:left; margin-left: 15%; margin-bottom:2%;float:left;">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edytuj informacje o uczniu</h2>
                    <form method="POST" action="{{ route('students.update_about', $student) }}">
                        @csrf
                        @method("patch")

                        <div class="mt-4">
                            <x-input-label for="about" :value="__('Dodatkowe informacje')" />
                            <x-text-input id="about" class="block mt-1 w-full" type="text" name="about" :value="$student->about" />

                            <x-input-error :messages="$errors->get('about')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Zaktualizuj') }}
                            </x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>


    <div style="width:30%;margin-left:5%; float:left;">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Uwagi</h2>
                    @include('partials.uwagi')
                    <p class="p-2"></p>
                    <a>
                        <form method="post" action="{{ route('teachers.delete_notes',['student'=>$student]) }}">
                            @csrf
                            @method('delete')
                            <x-primary-button>
                                {{ __('Usuń uwagi') }}
                            </x-primary-button>
                        </form>
                    </a>

                </div>
            </div>
        </div>

    </div>

    <div style="width:30%;clear: left; float:left; margin-left:15%;">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Nieobecności</h2>
                    @include('partials.attendance')

                    <p class="p-2"></p>
                     <a>
                          <form method="post" action="{{ route('teachers.delete_absences',['student'=>$student]) }}">
                             @csrf
                             @method('put')
                             <x-primary-button>
                                 {{ __('Usprawiedliw nieobecności') }}
                             </x-primary-button>
                         </form>
                     </a>

                </div>
            </div>
        </div>

    </div>

    <div style="width:30%; float:left; margin: 3% 0 10% 5%">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Oceny</h2>
                    @include('partials.marks')
                </div>
            </div>
        </div>

    </div>




</x-app-layout>
