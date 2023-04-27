<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{"Dashboard użytkownika: " .  Auth::user()->name }}
        </h2>
    </x-slot>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex items-center mt-4">
                        <form style="margin-left:20%" method="get" action="{{ route('students.create') }}">
                            <x-primary-button class="ml-4 mb-4">
                                {{ __('Dodaj nowego ucznia') }}
                            </x-primary-button>
                        </form>
                        <form method="get" action="{{ route('teachers.create') }}">
                            <x-primary-button class="ml-4 mb-4">
                                {{ __('Dodaj nowego nauczyciela') }}
                            </x-primary-button>
                        </form>
                        <form method="get" action="{{ route('activity.create') }}">
                            <x-primary-button class="ml-4 mb-4">
                                {{ __('Dodaj nowe zajęcia') }}
                            </x-primary-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div style="width:50%; display:block; margin:auto; margin-bottom:5%;">

        <div style="margin-left: 40%; padding:0" class="p-6 text-gray-900">
            <div class="items-center mt-4">
                <form method="get" action="{{ route('message.amessage') }}">
                    <x-primary-button class="ml-4 mb-4">
                        {{ __('Wyślij wiadomość') }}
                    </x-primary-button>
                </form>
            </div>
        </div>

        <div style="width: 100%; margin-left: -13%;">
            @include('partials.messages')
        </div>

        <div style="margin: 0 0 0 40%; padding:0" class="p-6 text-gray-900">
            <div class="items-center mt-4">
                <form method="get" action="{{ route('message.aclearmessages') }}">
                    <x-primary-button class="ml-4 mb-4">
                        {{ __('Wyczyść skrzynkę') }}
                    </x-primary-button>
                </form>
            </div>
        </div>

    </div>

</x-app-layout>
