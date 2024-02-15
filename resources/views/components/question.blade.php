@props(['question'])
<div class="
rounded dark:bg-gray-800/50 bg-white shadow shadow-blue-500/50 m-3 p-3 dark:text-gray-400 text-back
flex justify-between items-center
">
    <span>{{$question->question}}</span>
    <div class="flex flex-row gap-3">
        <x-form :action="route('question.like',$question)">
            <button
                    title="Click to like this question"
                    class="flex items-center gap-1  text-green-500 hover:text-green-300 cursor-pointer "
                    type="submit"
            >
                <x-icons.thumbs-up class="w-5 h-5" id="thumbs-up"/>
                {{$question->likes  ?? 0}}
            </button>
        </x-form>
        <x-form :action="route('question.unlike',$question)">
            <button title="Click to like this question"
                    class="text-red-700 hover:text-red-900 cursor-pointer flex items-center gap-1">
                <x-icons.thumbs-down class="w-5 h-5" id="thumbs-up"/>
                {{$question->unlikes  ?? 0}}
            </button>
        </x-form>
    </div>
</div>