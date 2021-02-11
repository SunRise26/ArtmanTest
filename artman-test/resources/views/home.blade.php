<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @auth
                {{ __('Home') }}
            @else
                {{ __('Home (limited data access for guest users)') }}
            @endauth
        </h2>
    </x-slot>

    <div class="home-page py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="list p-6 bg-white border-b border-gray-200">
                    @if (count($users))
                        @foreach ($users as $user)
                            <x-home.user :user="$user" />
                        @endforeach
                    @else
                        <span>{{ __('No Registered Users') }}</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
