<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{"Witaj " .  $user->name . "!"}}
        </h2>
    </x-slot>


    <div style="margin-left:15%;width: 30%; float:left; " class="p-6 text-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Twoje informacje</h2>
                    Imię i nazwisko: <b>{{$user->name}} {{$user->surname}}</b><br>
                    Należysz do klasy: <b>{{$grade->year . $grade->letter}}</b><br>
                    @if(!empty($grade->class_teacher_id) && ($grade->class_teacher_id > 0))
                    Twoim wychowawcą jest: <b>{{$grade->teachers->user->name . " " . $grade->teachers->user->surname }}</b>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{--<div style="float:right;  width:30%; margin-right:15%;" class="p-6 text-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Frekwencja</h2>
                    Aktualna ilość nieobecności: {{$student->number_of_absences}}<br>
                </div>
            </div>
        </div>
    </div>--}}

    <div style="float:right; width:30%; margin-right: 15%;" class="p-6 text-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Uwagi</h2>
                    @include('partials.uwagi')
                </div>
            </div>
        </div>
    </div>

    <div style="float:left; width:30%; margin-left:15%;" class="p-6 text-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Nieobecności</h2>
                    @include('partials.attendance')
                </div>
            </div>
        </div>
    </div>

    <div style="float:right; width:30%; margin-right:15%;" class="p-6 text-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Oceny</h2>
                    @include('partials.marks')
                </div>
            </div>
        </div>
    </div>

    <div style="float:left; width:35%; margin-left: 15%;" class="p-6 text-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">Zajęcia</h2>
                    @include('partials.activities')
                </div>
            </div>
        </div>
    </div>


    <div style="width:35%; float: right;margin-bottom:10%; margin-right:15%; " class="p-6 text-gray-900">
        @include('partials.messages')
        <div style="margin: 35% 0 0 10%;" class="flex items-center mt-4">
            <form method="get" action="{{ route('message.message') }}">
                <x-primary-button class="ml-4 mb-4">
                    {{ __('Wyślij wiadomość') }}
                </x-primary-button>
            </form>
        </div>
        <div style="margin: 6% 0 0 10%" class="flex items-center mt-4">
            <form method="get" action="{{ route('message.clearmessages') }}">
                <x-primary-button class="ml-4 mb-4">
                    {{ __('Wyczyść skrzynkę') }}
                </x-primary-button>
            </form>
        </div>
    </div>

</x-app-layout>
