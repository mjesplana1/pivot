<div>
    <h1 class="text-center text-xl py-8">My Todos</h1>

    <!-- Todo's Inputs -->
    <div class="mx-auto bg-[#111111] w-[80%] p-8">
        <div class="flex space-x-4">
            <div>
                <p>Title</p>
                <input
                type="text"
                wire:model.live="title"
                placeholder="Place your title here"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                />
            </div>
            <div>
                <p>Description</p>
                <input
                type="text"
                wire:model.live="description"
                placeholder="Place your description here"
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                />
            </div>
            <div>
                <button
                wire:click="submit"
                class="mt-4 px-6 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 transition-colors duration-300"
                >
                Submit
                </button>
            </div> 
        </div>

        <div class="mt-8 text-white">
            <h2 class="text-lg font-bold mb-4">Todo List</h2>
            
            <div class="flex mb-2">
            <div>
                <button wire:click="assignStatus(0)" class="bg-blue-500 hover:bg-blue-600 text-white text-sm font-medium py-1 px-3 rounded">
                Todo
                </button>
            </div>
            <div>
                <button wire:click="assignStatus(1)" class="ml-2 bg-green-500 hover:bg-green-600 text-white text-sm font-medium py-1 px-3 rounded">
                Completed
                </button>
            </div>
            </div>
            <ul class="space-y-4">
                @if (!empty($todos) && is_iterable($todos))
                    @foreach($todos as $todo)
                        <li class="flex justify-between">
                            <div>
                                {{ $todo->title }} - {{ $todo->description }}
                            </div>
                            @if(!$status)
                                <div>
                                    <button wire:click="delete({{ $todo->id }})" class="mr-2">
                                        delete
                                    </button>
                                    <button wire:click="toggleCompleted({{ $todo->id }})">
                                        completed
                                    </button>
                                </div> 
                            @endif  
                        </li>
                    @endforeach
                @else
                <li>No todos yet.</li>
                @endif
            </ul>
        </div>


    </div>
</div>