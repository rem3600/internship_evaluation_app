<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Student') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-grey-100">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in,") }} {{ Auth::user()->name }}!
                    <h2 class="text-xl pt-6">{{ __('Edit Student') }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8 bg-grey-100">
        <form method="POST" action="{{ route('students.update', $student) }}">
            @csrf
            @method('PUT')
            <input type="text" name="name" value="{{ old('name', $student->name) }}" placeholder="{{ __('Naam student') }}" class="block w-full border-teal-300 focus:border-sky-300 focus:ring focus:ring-sky-200 focus:ring-opacity-50 rounded-md shadow-sm" autofocus>
            <input type="text" name="first_name" value="{{ old('first_name', $student->first_name) }}" placeholder="{{ __('Voornaam student') }}" class="block w-full border-teal-300 focus:border-sky-300 focus:ring focus:ring-sky-200 focus:ring-opacity-50 rounded-md shadow-sm my-1">
            <input type="text" name="email" value="{{ old('email', $student->email) }}" placeholder="{{ __('Email student') }}" class="block w-full border-teal-300 focus:border-sky-300 focus:ring focus:ring-sky-200 focus:ring-opacity-50 rounded-md shadow-sm my-1">
            <input type="text" name="phone" value="{{ old('phone', $student->phone) }}" placeholder="{{ __('Telefoonnummer student') }}" class="block w-full border-teal-300 focus:border-sky-300 focus:ring focus:ring-sky-200 focus:ring-opacity-50 rounded-md shadow-sm my-1">
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            <x-primary-button class="mt-4 bg-teal-700">{{ __('Update Student') }}</x-primary-button>
        </form>
    </div>
</x-app-layout>
