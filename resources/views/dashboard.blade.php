<x-app-layout>
    <x-slot name="header">
        <x-header>
            {{ __('Vote for a question') }}
        </x-header>
    </x-slot>
    <x-container>
        {{-- listagem --}}
        <div class="dark:text-gray-500 font-bold mb-2">List of Questions</div>
            <div class="dark:text-gray-400 space-y-4">
                @foreach($questions as $item)
                    <x-question :question="$item" />

                @endforeach
            </div>
    </x-container>
</x-app-layout>
