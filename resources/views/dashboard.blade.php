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
                    <a href="{{ route('users') }}"> <button class="bg-blue-600 text-white hover:bg-blue-400 py-2 px-8 hover:shadow-sm">Users</button></a>
                    <a href="{{ route('roles') }}"><button class="bg-amber-600 text-white hover:bg-amber-400 py-2 px-8 hover:shadow-sm">Roles</button></a>
                    <a href="{{ route('permissions') }}"><button class="bg-fuchsia-600 text-white hover:bg-fuchsia-400 py-2 px-8 hover:shadow-sm">Permissions</button></a>
                </div>
            </div>
        </div>

        @isset($users)
            @include('inc.userstable')
        @endisset

        @isset($roles)
            @include('inc.rolestable')
        @endisset

        @isset($permissions)
            @include('inc.permission-table')
        @endisset
        
    </div>
</x-app-layout>
