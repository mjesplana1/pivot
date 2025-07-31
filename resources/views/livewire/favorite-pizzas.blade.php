<div class="max-w-2xl mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Favorite Pizzas</h1>

    <!-- User Selection -->
    <div class="mb-4">
        <label for="user" class="block text-sm font-medium text-gray-700">Select User</label>
        <select wire:model="selectedUserId" id="user" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            <option value="">Select a user</option>
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
        </select>
    </div>

    <!-- Pizza Checkboxes -->
    @if($selectedUserId)
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Favorite Pizzas</label>
            @foreach($pizzas as $pizza)
                <div class="flex items-center">
                    <input type="checkbox" wire:model="selectedPizzaIds" value="{{ $pizza->id }}" id="pizza-{{ $pizza->id }}" class="h-4 w-4 text-indigo-600 border-gray-300 rounded">
                    <label for="pizza-{{ $pizza->id }}" class="ml-2 text-sm text-gray-900">{{ $pizza->name }}</label>
                </div>
            @endforeach
        </div>
        <button wire:click="save" class="bg-indigo-600 text-white px-4 py-2 rounded-md">Save Favorites</button>
    @endif

    <!-- Display Users and Their Favorite Pizzas -->
    <div class="mt-6">
        <h2 class="text-xl font-semibold">All Users and Their Favorite Pizzas</h2>
        <ul class="mt-2">
            @foreach($users as $user)
                <li class="py-2">
                    <strong>{{ $user->name }}</strong>: 
                    {{ $user->favoritePizzas->pluck('name')->join(', ') ?: 'No favorite pizzas' }}
                </li>
            @endforeach
        </ul>
    </div>
</div>