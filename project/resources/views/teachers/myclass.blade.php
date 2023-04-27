<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{"Klasa " .  $grade->year . $grade->letter}}
        </h2>
    </x-slot>

    <div style="border-radius: 10px;" class="mt-8">
        <p class="p-6 pt-6 bg-white font-semibold text-xl text-gray-800 leading-tight" style="width: 70%; margin: auto">
        Uczniowie w klasie</p>
        @include('partials.students')
    </div>
    <br>
    <div style="background: white; width:60%; margin:auto; border-radius: 10px">
        <p class="p-6"></p>
        <p class="p-6 pt-6 bg-white font-semibold text-xl text-gray-800 leading-tight" style="width: 70%; margin: auto">
            Zajęcia w klasie</p>
        @include('partials.activities')
    </div>

    <div class="py-12" style="margin-left:25%;margin-bottom:7%;">
        <div class="space-y-6" style="width:30%; margin-left:15%;">
            <div class="p-4 sm:p-8 bg-white shadow">
                <section>
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Dodaj zajęcia') }}
                        </h2>
                    </header>

                    <form method="post" action="{{route('activity.activity_grade',['grade_id'=>$grade->id])}}"
                          class="mt-6 space-y-6">
                        @csrf
                        @method('post')
                        @include('partials.add_activity')
                        @if(Session::get('flaga_klasa') == 1)
                            <br><h3 style="color:red">Ta klasa ma wtedy inne zajęcia</h3>
                        @endif
                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('Zapisz') }}</x-primary-button>
                </div>
                </form>
                </section>
            </div>
        </div>
    </div>

</x-app-layout>
