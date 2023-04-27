<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{"Witaj " .  $user->name . "!"}}
        </h2>
    </x-slot>

    <div style="width:50%; float:left; display:block">



        <div style="margin-left: 25%;  width:80%;">
            <div class="py-12" style="width: 100%; float:left">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900">
                            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Twoje informacje</h2>
                            Uczysz przedmiotu {{$przedmiot->name}}<br>

                            @if($teacher->is_class_teacher)
                                Jesteś wychowawcą klasy {{$grade->year . $grade->letter}}<br>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div style="margin-left: 45%; width:100%; float:left; margin-bottom: -5%;margin-top: -7.5%" class="p-6 text-gray-900">
            <div class="flex items-center mt-4">
                <form method="get" action="{{ route('teachers.start') }}">
                    <x-primary-button class="ml-4 mb-4">
                        {{ __('Rozpocznij lekcję') }}
                    </x-primary-button>
                </form>
            </div>
        </div>




    <div style="width: 125%;float: left; margin-left: -15%">
    @include('partials.messages')
    </div>


        <div style="margin-left: 45%; width:100%; float:left; margin-bottom: -5%;margin-top: -5%" class="p-6 text-gray-900">
            <div class="items-center mt-4">
                <form method="get" action="{{ route('message.tmessage') }}">
                    <x-primary-button class="ml-4 mb-4">
                        {{ __('Wyślij wiadomość') }}
                    </x-primary-button>
                </form>
            </div>
        </div>

        <div style="margin-left: 45%; width:100%; float: left; margin-bottom: -5%;margin-top: -2.5%" class="p-6 text-gray-900">
            <div class="items-center mt-4">
                <form method="get" action="{{ route('message.tclearmessages') }}">
                    <x-primary-button class="ml-4 mb-4">
                        {{ __('Wyczyść skrzynkę') }}
                    </x-primary-button>
                </form>
            </div>
        </div>



    </div>


    <div style="width:20%; float: right; margin: 2% 13% 0 10%; background-color: #ffffff; padding: 20px;" class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <h1 style="font-size: 25px; font-weight: bold; margin-left:15%">Plan zajęć</h1><br><br>
        @include('partials.activities')
    </div>

</x-app-layout>
