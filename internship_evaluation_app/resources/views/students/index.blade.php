<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Students
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-grey-100">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-teal-300 border-2">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in,") }} {{ Auth::user()->name }}!
                    <h2 class="text-xl pt-6">Students</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8 bg-grey-100">
        <form method="POST" action="/students">
            @csrf 
            <input type="text" name="name" placeholder="{{ __('Naam student') }}" class="block w-full border-teal-300 focus:border-sky-300 focus:ring focus:ring-sky-200 focus:ring-opacity-50 rounded-md shadow-sm" autofocus>
            <input type="text" name="first_name" placeholder="{{ __('Voornaam student') }}" class="block w-full border-teal-300 focus:border-sky-300 focus:ring focus:ring-sky-200 focus:ring-opacity-50 rounded-md shadow-sm my-1">
            <input type="text" name="email" placeholder="{{ __('Email student') }}" class="block w-full border-teal-300 focus:border-sky-300 focus:ring focus:ring-sky-200 focus:ring-opacity-50 rounded-md shadow-sm my-1">
            <input type="text" name="phone" placeholder="{{ __('Telefoonnummer student') }}" class="block w-full border-teal-300 focus:border-sky-300 focus:ring focus:ring-sky-200 focus:ring-opacity-50 rounded-md shadow-sm my-1">
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            <x-primary-button class="mt-4 bg-teal-700">{{ __('Voeg toe') }}</x-primary-button>
        </form>
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">{{ session('success') }}</strong>
            </div>
        @endif
        <div class="mt-6 bg-grey-100 shadow-sm rounded-lg">
            @foreach ($students as $student)
                <div class="p-6 flex space-x-2 border-teal-300 border-2 rounded-lg my-1">
                    <div class="flex-1">
                        <div class="flex justify-between items-center">
                            <div>
                                <i class="fa-solid fa-person-chalkboard text-lg pr-1"></i>
                                <span class="text-gray-800 text-xl">Docent: {{ Auth::user()->name }}</span>
                                <small class="me-0 text-sm text-gray-600">{{ $student->created_at->format('j M Y, g:i a') }}</small>                            </div>
                            </div>
                            <div>
                                <i class="fa-solid fa-graduation-cap text-lg pr-1"></i>
                                <p class="mt-4 text-lg text-gray-900 inline-block">Naam student: {{ $student->first_name }} {{ $student->name }}</p>
                            </div>
                            <div>
                                <i class="fa-regular fa-envelope text-lg pr-2"></i>
                                <p class="mt-4 text-lg text-gray-900 inline-block">Email student: {{ $student->email }}</p>
                            </div>
                            <div>
                                <i class="fa-solid fa-mobile-screen-button text-lg pr-2"></i>
                                <p class="mt-4 text-lg text-gray-900 inline-block">Telnummer student: {{ $student->phone }}</p>
                            </div>
                    </div>
                    <div class="">
                        <a href="{{ route('students.edit', $student) }}" class="text-teal-600 hover:text-red-600">{{ __('Edit') }}</a>
                    </div>
                    <form method="POST" action="{{ route('students.destroy', $student) }}">
                        @csrf
                        @method('delete')
                        <!-- <x-dropdown-link :href="route('students.destroy', $student)" onclick="event.preventDefault(); this.closest('form').submit();" class="p-0">
                            {{ __('X') }}
                            <i class="fa-regular fa-trash-can p-0"></i>
                        </x-dropdown-link> -->
                        <div class="">
                            <a href="{{ route('students.destroy', $student) }}" class="text-red-400 hover:text-red-600 px-4">
                                <!-- {{ __('Edit') }} -->
                                <i class="fa-regular fa-trash-can p-0"></i>
                            </a>
                        </div>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>