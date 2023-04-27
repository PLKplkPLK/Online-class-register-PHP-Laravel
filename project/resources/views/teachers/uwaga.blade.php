<x-app-layout>

    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dodaj uwagę') }}
            </h2>
        </div>
        <br><br>

        <?php $student = \App\Models\Student::where('user_id', $student_id)->first() ?>
        <form method="POST" action="{{ route('teachers.uwaga_send', $student) }}">
            @csrf

            <h4></h4>
            <h4>Klasa id: {{$student->class_id}}</h4>

            <div>
                <x-input-label for="uwaga" :value="__('Uwaga')" />
                <x-text-input id="uwaga" class="block mt-1 w-full" type="text" name="uwaga" :value="''" autofocus />
                <x-input-error :messages="$errors->get('uwaga')" class="mt-2" />
            </div>


            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-4">
                    {{ __('Dodaj') }}
                </x-primary-button>
            </div>
        </form>
    </div>


</x-app-layout>
