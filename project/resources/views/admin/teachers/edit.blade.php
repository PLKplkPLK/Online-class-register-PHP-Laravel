<x-app-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edycja danych nauczyciela') }}
        </h2>
        <br>

        <form method="POST" action="{{ route('teachers.update', $teacher) }}">
            @csrf
            @method("PUT")

            <div class="mt-4">
                <x-input-label for="name" :value="__('Imię')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$user->name" autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="surname" :value="__('Nazwisko')" />
                <x-text-input id="surname" class="block mt-1 w-full" type="text" name="surname" :value="$user->surname" autofocus />
                <x-input-error :messages="$errors->get('surname')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="email" :value="__('E-mail')" />
                <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" :value="$user->email" autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-input-label for="subject_id" :value="__('Przedmiot')" />

                <x-select-input id="subject_id" name="subject_id">
                    @foreach($subjects as $subject)
                        <option value={{$subject->id}}>{{$subject->name}} </option>
                    @endforeach

                </x-select-input>
                <x-input-error :messages="$errors->get('subject_id')" class="mt-2" />
            </div>

            <div x-data="{open:false}" class="mt-4">
                <x-input-label for="is_class_teacher" :value="__('Wychowawca')" />
                <x-text-input x-on:click="open = ! open" id="is_class_teacher" type="checkbox" name="is_class_teacher" :value="old('is_class_teacher')" />

                <x-input-error :messages="$errors->get('is_class_teacher')" class="mt-2" />
                <div  x-show="open"  class="mt-4">
                    <x-input-label for="class_id" :value="__('Klasa')"  />

                    <x-select-input id="class_id" name="class_id" disabled>
                        @foreach($grades as $grade)
                            <option value={{$grade->id}}>{{$grade->year . $grade->letter}} </option>
                        @endforeach

                    </x-select-input>
                    <x-input-error :messages="$errors->get('class_id')" class="mt-2" />
                </div>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-4">
                    {{ __('Zaktualizuj') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>

    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ustaw nowe hasło nauczyciela') }}
        </h2>
        <br>

        <form method="POST" action="{{ route('teachers.update_password', $teacher) }}">
            @csrf
            @method("PUT")

            <div class="mt-4">
                <x-input-label for="password" :value="__('Nowe hasło')" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" :value="old('password')" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-4">
                    {{ __('Zaktualizuj hasło') }}
                </x-primary-button>
            </div>
        </form>

    </x-auth-card>


</x-app-layout>
