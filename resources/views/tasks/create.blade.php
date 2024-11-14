<x-app-layout>
    <div class="py-12">
        <div class="flex items-center justify-center min-h-screen bg-gray-100">
            <form action="{{ route('tasks.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 w-full max-w-md">
                @csrf
                <h2 class="text-2xl font-bold mb-6 text-center">Add New Task</h2>
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Task Title</label>
                    <input type="text" name="title" id="title" placeholder="Enter task title" required
                           class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Task Description</label>
                    <textarea name="description" id="description" placeholder="Enter task description" required
                              class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline h-32"></textarea>
                </div>
                <div class="flex items-center justify-center">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Save Task
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
