<x-app-layout>

    <div style="width:80%; margin: auto" class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Wysyłanie wiadomości') }}
            </h2>
        </div>
        <br><br>

        @if($user->role==2)
            <form method="POST" id="formonly" action="{{ route('message.tsendmessage') }}">
        @elseif($user->role==3)
            <form method="POST" id="formonly" action="{{ route('message.sendmessage') }}">
        @else
            <form method="POST" id="formonly" action="{{ route('message.asendmessage') }}">
        @endif
            @csrf
            <input type="hidden" name="sender_id" value="<?=$sender_id?>">

            @if(!isset($receiver_id))
            <div class="mt-4">
                <x-input-label for="class_id" :value="__('Odbiorca')" />

                <x-select-input id="receiver_id" name="receiver_id">
                    @foreach($users as $user)
                        <?php
                            switch($user->role) {
                                case 1: $role_name = ' (administrator)';
                                    break;
                                case 2: $role_name = ' (nauczyciel)';
                                    break;
                                case 3: $role_name =  ' (uczeń)';
                                    break;
                            }
            ?>
                        <option value={{$user->id}} {{ $user->id == $reply_id ? 'selected' : '' }}>{{ $user->surname . " " . $user->name .$role_name }} </option>
                    @endforeach

                </x-select-input>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div><br><br>
            {{--@else
                <?php $SESSION['$receiver_id'] = $receiver_id; ?> wtf--}}
            @endif

            <div style="width: 600px">
                <x-input-label for="title" :value="__('Tytuł')" />
                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value=$title autofocus />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div><br>

            <div>
                <x-input-label for="message" :value="__('Treść')" />
                <textarea style="width: 600px; height: 250px; border: #cbd5e0 solid 1px; border-radius: 5px;" name="message" form="formonly"></textarea>
            </div>


            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-4">
                    {{ __('Wyślij') }}
                </x-primary-button>
            </div>
        </form>
    </div>


</x-app-layout>
