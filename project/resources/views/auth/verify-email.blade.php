<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Zanim będziesz móŋł wejść na swoje konto musisz zweryfikować swoją tożsamość. Kliknij w poniższy link aby otrzymać wiadomość e-mail na podany przez ciebie wcześniej adres z linkiem aktywacyjnym') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('Na twojej skrzynce powinien już być mail z linkiem aktywacyjnym. Kliknij go aby móć zalogować się na swoje konto!') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-primary-button>
                        {{ __('Wyślij link') }}
                    </x-primary-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    {{ __('Wyloguj się') }}
                </button>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout>
