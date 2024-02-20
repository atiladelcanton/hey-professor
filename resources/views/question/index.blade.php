<x-app-layout>
    <x-slot name="header">
        <x-header>
            {{ __('My Questions') }}
        </x-header>
    </x-slot>
    <x-container>
        <x-form :action="route('question.store')">
            <x-textarea label="Question" name="question"/>
            <x-btn.primary>Save</x-btn.primary>
            <x-btn.reset>Cancel</x-btn.reset>
        </x-form>

        <hr class="border-gray-700 border-dashed my-4"/>

        {{-- listagem --}}
        <div class="dark:text-gray-500 font-bold mb-2">Drafts</div>
        <div class="dark:text-gray-400 space-y-4 mb-8">
            <x-table>
                <x-table.thead>
                    <tr>
                        <x-table.th>Question</x-table.th>
                        <x-table.th>Actions</x-table.th>
                    </tr>
                </x-table.thead>
                <tbody>
                @foreach($questions->where('draft',true) as $question)
                    <x-table.tr>
                        <x-table.td>{{$question->question}}</x-table.td>
                        <x-table.td>
                            <x-form :action="route('question.publish',$question)" put>
                                <button type="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 " >
                                    Publicar
                                </button>
                            </x-form>
                            <x-form :action="route('question.destroy',$question)" put>
                                <button type="submit">
                                    Deletar
                                </button>
                            </x-form>
                        </x-table.td>
                    </x-table.tr>
                @endforeach
                </tbody>
            </x-table>
        </div>
        <hr class="border-gray-700 border-dashed my-4"/>
        <div class="dark:text-gray-500 font-bold mb-2">My Questions</div>
        <div class="dark:text-gray-400 space-y-4">
            <x-table>
                <x-table.thead>
                    <tr>
                        <x-table.th>Question</x-table.th>
                        <x-table.th>Actions</x-table.th>
                    </tr>
                </x-table.thead>
                <tbody>
                @foreach($questions->where('draft',false) as $question)
                    <x-table.tr>
                        <x-table.td>{{$question->question}}</x-table.td>
                        <x-table.td>

                        </x-table.td>
                    </x-table.tr>
                @endforeach
                </tbody>
            </x-table>
        </div>
    </x-container>
</x-app-layout>
