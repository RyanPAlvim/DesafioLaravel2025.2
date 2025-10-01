<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <x-input-label for="cpf" value="CPF" />
                <x-text-input id="cpf" name="cpf" type="text" class="mt-1 block w-full" :value="old('cpf', $user->cpf)" autocomplete="cpf" />
                <x-input-error class="mt-2" :messages="$errors->get('cpf')" />
            </div>
            <div>
                <x-input-label for="birth_date" value="Data de Nascimento" />
                <x-text-input id="birth_date" name="birth_date" type="date" class="mt-1 block w-full" :value="old('birth_date', $user->birth_date)" autocomplete="bday" />
                <x-input-error class="mt-2" :messages="$errors->get('birth_date')" />
            </div>
            <div>
                <x-input-label for="phone" value="Telefone" />
                <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone', $user->phone)" autocomplete="tel" />
                <x-input-error class="mt-2" :messages="$errors->get('phone')" />
            </div>
            <div>
                <x-input-label for="cep" value="CEP" />
                <x-text-input id="cep" name="cep" type="text" class="mt-1 block w-full" :value="old('cep', $user->cep)" autocomplete="postal-code" />
                <x-input-error class="mt-2" :messages="$errors->get('cep')" />
            </div>
            <div>
                <x-input-label for="rua" value="Rua" />
                <x-text-input id="rua" name="rua" type="text" class="mt-1 block w-full" :value="old('rua', $user->rua)" autocomplete="address-line1" />
                <x-input-error class="mt-2" :messages="$errors->get('rua')" />
            </div>
            <div>
                <x-input-label for="numero" value="Número" />
                <x-text-input id="numero" name="numero" type="text" class="mt-1 block w-full" :value="old('numero', $user->numero)" autocomplete="address-line2" />
                <x-input-error class="mt-2" :messages="$errors->get('numero')" />
            </div>
            <div>
                <x-input-label for="bairro" value="Bairro" />
                <x-text-input id="bairro" name="bairro" type="text" class="mt-1 block w-full" :value="old('bairro', $user->bairro)" autocomplete="address-level3" />
                <x-input-error class="mt-2" :messages="$errors->get('bairro')" />
            </div>
            <div>
                <x-input-label for="cidade" value="Cidade" />
                <x-text-input id="cidade" name="cidade" type="text" class="mt-1 block w-full" :value="old('cidade', $user->cidade)" autocomplete="address-level2" />
                <x-input-error class="mt-2" :messages="$errors->get('cidade')" />
            </div>
            <div>
                <x-input-label for="estado" value="Estado" />
                <x-text-input id="estado" name="estado" type="text" class="mt-1 block w-full" :value="old('estado', $user->estado)" autocomplete="address-level1" />
                <x-input-error class="mt-2" :messages="$errors->get('estado')" />
            </div>
            <div>
                <x-input-label for="complemento" value="Complemento" />
                <x-text-input id="complemento" name="complemento" type="text" class="mt-1 block w-full" :value="old('complemento', $user->complemento)" autocomplete="address-line3" />
                <x-input-error class="mt-2" :messages="$errors->get('complemento')" />
            </div>
        </div>
        <div class="flex items-center gap-4 mt-6">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
