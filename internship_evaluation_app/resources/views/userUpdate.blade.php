<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-grey-100">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in,") }} {{ Auth::user()->name }}!
                    <h2 class="text-xl pt-6">{{ __('Edit User') }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8 bg-grey-100">
        <form method="POST" action="{{ route('userUpdate.update', $user) }}">
            @csrf
            @method('PUT')
            <input type="text" name="name" value="{{ old('name', $user->name) }}" placeholder="{{ __('Naam') }}" class="block w-full border-teal-300 focus:border-sky-300 focus:ring focus:ring-sky-200 focus:ring-opacity-50 rounded-md shadow-sm">
            <input type="text" name="email" value="{{ old('email', $user->email) }}" placeholder="{{ __('Email') }}" class="block w-full border-teal-300 focus:border-sky-300 focus:ring focus:ring-sky-200 focus:ring-opacity-50 rounded-md shadow-sm my-1">
            <input type="text" name="password" value="" placeholder="{{ __('Password') }}" class="block w-full border-teal-300 focus:border-sky-300 focus:ring focus:ring-sky-200 focus:ring-opacity-50 rounded-md shadow-sm my-1">
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />

            <x-primary-button class="mt-4 bg-teal-700">{{ __('Update User') }}</x-primary-button>
        </form>
    </div>
</x-app-layout>