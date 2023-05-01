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
                    {{ __("You're logged in!") }}
                </div>
                <div class="p-6 text-gray-900">
                <div style="border: 10px solid black;">
                <br>
                <a href="{{ url('companies') }}" style="color:blue;font-size: 25px" ><h1>Companies</h1></a>
                <br>
                <br> 
                <a href="{{ url('employees') }}" style="color:purple;font-size: 25px"><h1>Employees</h1></a>
                <br>
                </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
