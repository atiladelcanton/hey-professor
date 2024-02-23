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
            <form action="{{route('dashboard')}}" method="get" class="flex items-end space-x-2">
                @csrf
                    <x-text-input type="text" name="search" value="{{request()->get('search')}}"
                                  class="w-full" />

                <x-btn.primary type="submit">Search</x-btn.primary>
            </form>

            @foreach($questions as $item)
                <x-question :question="$item"/>

            @endforeach
            {{$questions->withQueryString()->links()}}
        </div>
    </x-container>
</x-app-layout>
