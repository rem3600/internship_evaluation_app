<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Students
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in,") }} {{ Auth::user()->name }}!
                    <h2 class="text-xl pt-6">Students</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="/students">
            @csrf 
            <input type="text" name="name" placeholder="{{ __('Naam student') }}" class="block w-full border-teal-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" autofocus>
            <input type="text" name="first_name" placeholder="{{ __('Voornaam student') }}" class="block w-full border-teal-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm my-1">
            <input type="text" name="email" placeholder="{{ __('Email student') }}" class="block w-full border-teal-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm my-1">
            <input type="text" name="phone" placeholder="{{ __('Telefoonnummer student') }}" class="block w-full border-teal-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm my-1">
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            <x-primary-button class="mt-4 bg-teal-700">{{ __('Voeg toe') }}</x-primary-button>
        </form>

        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            @foreach ($students as $student)
                <div class="p-6 flex space-x-2 border-teal-300 border-2 rounded-lg my-1">
                    <iframe src="{{ URL('images/user-graduate-svgrepo-com.svg') }}" class="h-6 w-6 text-gray-600 -scale-x-100"></iframe>
                    <!-- <iframe src="{{ URL('images/user-svgrepo-com.svg') }}" class="h-6 w-6 text-gray-600 -scale-x-100"></iframe>
                    <iframe src="{{ URL('images/email-9-svgrepo-com.svg') }}" class="h-6 w-6 text-gray-600 -scale-x-100"></iframe>
                    <iframe src="{{ URL('images/smartphone-mobile-phone-svgrepo-com.svg') }}" class="h-6 w-6 text-gray-600 -scale-x-100"></iframe> -->
                    <div class="flex-1">
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-gray-800 text-xl">Docent: {{ Auth::user()->name }}</span>
                                <small class="me-0 text-sm text-gray-600">{{ $student->created_at->format('j M Y, g:i a') }}</small>
                            </div>
                        </div>
                        <p class="mt-4 text-lg text-gray-900">Naam student: {{ $student->first_name }} {{ $student->name }}</p>
                        <p class="mt-4 text-lg text-gray-900">Email student: {{ $student->email }}</p>
                        <p class="mt-4 text-lg text-gray-900">Telnummer student: {{ $student->phone }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>