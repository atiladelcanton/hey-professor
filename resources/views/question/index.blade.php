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

        {{-- listagem Drafts --}}
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
                            <x-form :action="route('question.destroy',$question)" delete onsubmit="return confirm('Tem Certeza?');">
                                <button type="submit">
                                    Deletar
                                </button>
                            </x-form>
                            <x-form :action="route('question.publish',$question)" put>
                                <button type="submit" >
                                    Publicar
                                </button>
                            </x-form>
                            <a href="{{route('question.edit',$question)}}">Editar</a>
                        </x-table.td>
                    </x-table.tr>
                @endforeach
                </tbody>
            </x-table>
        </div>
        <hr class="border-gray-700 border-dashed my-4"/>
        {{-- listagem  --}}
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
                            <x-form :action="route('question.archive',$question)" patch>
                                <button type="submit">
                                    Archive
                                </button>
                            </x-form>
                        </x-table.td>
                    </x-table.tr>
                @endforeach
                </tbody>
            </x-table>
        </div>

        <hr class="border-gray-700 border-dashed my-4"/>
        {{-- listagem  --}}
        <div class="dark:text-gray-500 font-bold mb-2">Archived Questions</div>
        <div class="dark:text-gray-400 space-y-4 mb-8">
            <x-table>
                <x-table.thead>
                    <tr>
                        <x-table.th>Question</x-table.th>
                        <x-table.th>Actions</x-table.th>
                    </tr>
                </x-table.thead>
                <tbody>
                @foreach($archivedQuestions as $question)
                    <x-table.tr>
                        <x-table.td>{{$question->question}}</x-table.td>
                        <x-table.td>
                            <x-form :action="route('question.restore',$question)" patch>
                                <button type="submit">
                                    Restore
                                </button>
                            </x-form>
                            <a href="{{route('question.edit',$question)}}">Editar</a>
                        </x-table.td>
                    </x-table.tr>
                @endforeach
                </tbody>
            </x-table>
        </div>
    </x-container>
</x-app-layout>
