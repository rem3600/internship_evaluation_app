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
                    
                    {{ __("You're logged in!") }}<br>
                    {{ __("Welcome, ".Auth::user()->name)}}
                </div>
            </div>
        </div>
    </div>

    @if (session('success'))
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" role="alert">
                        <strong class="font-bold">{{ session('success') }}</strong>
                    </div>
                </div>
            </div>
    @endif


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
                        <form method="POST" action="dashboard">
                            @csrf
                                <input
                                    type="text"
                                    name="name"
                                    placeholder="{{ __('Username') }}"
                                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                ></input>
                                <br>

                                <input
                                    type="text"
                                    name="email"
                                    placeholder="{{ __('E-mail') }}"
                                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                ></input>
                                <br>

                                <input
                                    type="text"
                                    name="password"
                                    placeholder="{{ __('Password') }}"
                                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                ></input>
                                <br>
                                


                            <x-input-error :messages="$errors->get('message')" class="mt-2" />
                            <x-primary-button class="mt-4">{{ __('Add') }}</x-primary-button>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                

                <div class="mt-6 bg-grey-100 shadow-sm rounded-lg">
                  
                    @isset($users)
                        
                        @foreach ($users as $user)
                            <div class="p-6 flex space-x-2 border-teal-300 border-2 rounded-lg my-1">
                                <div class="flex-1">
                                    <div class="flex justify-between items-center">
                                        <div>
                                            <div>
                                                <a href="{{ route('dashboard', $user) }}" class="text-teal-600 hover:text-teal-900">{{ __('') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="mt-4 text-lg text-gray-900">Naam: {{ $user->name }}</p>
                                    <p class="mt-4 text-lg text-gray-900">Email: {{ $user->email }}</p>
                                    <p class="mt-4 text-lg text-gray-900">Role: {{ $user->role_id }}</p>
                                    <hr>
                                </div>

                                <div class="">
                                    <a href="{{ route('userUpdate.edit', $user) }}" class="text-black-600 hover:text-teal-600">{{ __('Edit') }}</a>
                                </div>

                                <div>   
                                <form method="POST" action="{{ route('dashboard.destroy', $user->id) }}">
                                    @csrf
                                    @method('delete')
                                    <div class=" hover:rotate-45 text-red-400 hover:text-red-600 px-4">
                                        <button type="submit">Delete</button>
                                    </div>
                                </form>
                                </div>

                            </div>
                        @endforeach
                   @endisset
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
