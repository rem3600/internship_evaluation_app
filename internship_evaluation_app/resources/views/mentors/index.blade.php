<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Mentors
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                    <h2>Mentors</h2>

                     @foreach ($mentors as $mentor)
                        {{ $mentor->name }}
                        {{ $mentor->email }}
                        {{ $mentor->phone }}
                        {{ $mentor->address }}
                        {{ $mentor->city }}
                        {{ $mentor->state }}
                        {{ $mentor->zip }}
                        {{ $mentor->country }}
                        {{ $mentor->bio }}
                        {{ $mentor->linkedin }}
                        {{ $mentor->twitter }}
                        {{ $mentor->github }}
                        {{ $mentor->website }}
                        {{ $mentor->created_at }}
                        {{ $mentor->updated_at }}
                @endforeach
                </div>
            </div>
        </div>
    </div>



</x-app-layout>