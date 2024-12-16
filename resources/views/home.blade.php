<x-app-layout >
    <!-- Slot pour l'en-tête -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-center text-gray-800 leading-tight p-6">
            Welcome <span class="font-bold text-blue-500">{{ Auth::user()->name }}</span>
        </h2>
    </x-slot>


    <!-- separateur -->
    <div class="min-h-96 w-full"></div>
    <!-- Section principale en dehors du slot "header" -->
    <div class="flex flex-row p-6 mt-[300px] justify-center space-x-8">
        
        <x-project-home-card></x-project-home-card>
        <x-task-home-card></x-task-home-card>
    </div>
</x-app-layout>
