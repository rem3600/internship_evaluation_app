<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @php
                        $user = auth()->user();
                    @endphp
                    {{ __("You're logged in!") }}<br>
                    {{ __("Welcome, ".$user->name)}}
                </div>
            </div>
        </div>
    </div>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
                        <form method="POST" action="">
                            @csrf
                                <textarea
                                    name="Username"
                                    placeholder="{{ __('Username') }}"
                                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                ></textarea>
                                <br>

                                <textarea
                                    name="email"
                                    placeholder="{{ __('E-mail') }}"
                                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                ></textarea>
                                <br>

                                <textarea
                                    name="password"
                                    placeholder="{{ __('Password') }}"
                                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                ></textarea>
                                <br>
                                


                            <x-input-error :messages="$errors->get('message')" class="mt-2" />
                            <x-primary-button class="mt-4">{{ __('Add') }}</x-primary-button>

                            @php

                            $users = UserTableController::with('Role_id')
                                ->whereHas('user', function ($query) {
                                    $query->where('Role_id', Auth::id());
                                })
                                ->get();

                            @endphp

                            



                            
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
