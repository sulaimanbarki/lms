<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="/departments" class="text-blue-500 hover:text-blue-700">
                        <i class="fas fa-plus-circle"></i>
                        Add Department
                    </a>
                    <a href="/subjects" class="text-blue-500 hover:text-blue-700">
                        <i class="fas fa-plus-circle"></i>
                        Add Subject
                    </a>
                    {{-- add question link --}}
                    <a href="/questions" class="text-blue-500 hover:text-blue-700">
                        <i class="fas fa-plus-circle"></i>
                        Add Question
                    </a>
                    
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <a href="/blogs" class="text-blue-500 hover:text-blue-700">
                        <i class="fas fa-plus-circle"></i>
                        Freelancing
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
