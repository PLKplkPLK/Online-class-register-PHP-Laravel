<x-app-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edycja wybranych zajęć') }}
        </h2>
        <br>


        <form method="POST" action="{{ route('activity.update', $activity) }}">
            @csrf
            @method("PUT")

            @include('partials.add_activity')

            <div class="">
                <x-input-label for="grade_id" :value="__('Klasa')"/>

                <x-select-input id="grade_id" name="grade_id">
                    @foreach($grades as $grade)
                        <option
                            value={{$grade->id}}>{{$grade->year . $grade->letter}} </option>
                    @endforeach

                </x-select-input>
                @if(Session::get('flaga_klasa') == 1)
                    <br><h3 style="color:red">Ta klasa ma wtedy inne zajęcia</h3>
                @endif

            </div>
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-4">
                    {{ __('Zaktualizuj') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-app-layout>
