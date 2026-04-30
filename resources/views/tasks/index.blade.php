<!DOCTYPE html>
<html>
<head>
    <title>Task App</title>
    <!-- This line makes the styling work instantly -->
    <script src="https://tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Task Manager</h1>

        <!-- Add Task Form -->
        <form method="POST" action="/tasks" class="flex gap-2 mb-4">
            @csrf
            <input type="text" name="title" class="border p-2 flex-1 rounded" placeholder="New Task" required>
            <button class="bg-blue-500 text-white px-4 rounded hover:bg-blue-600">Add</button>
        </form>

        <hr class="mb-4">

        <!-- Task List -->
        <div class="space-y-2">
            @foreach($tasks as $task)
                <div class="flex items-center justify-between p-3 border rounded hover:bg-gray-50">
                    <div class="flex items-center">
                        <form method="POST" action="/tasks/{{ $task->id }}">
                            @csrf
                            @method('PATCH')
                            <button class="mr-3 text-xl">
                                {{ $task->is_done ? '✅' : '⬜' }}
                            </button>
                        </form>
                        <span class="{{ $task->is_done ? 'line-through text-gray-400' : 'text-gray-700' }}">
                            {{ $task->title }}
                        </span>
                    </div>

                    <form method="POST" action="/tasks/{{ $task->id }}">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-500 hover:text-red-700 font-medium">Delete</button>
                    </form>
                </div>
            @endforeach
        </div>
        
        @if($tasks->isEmpty())
            <p class="text-center text-gray-500 py-4">No tasks yet. Add one above!</p>
        @endif
    </div>
</body>
</html>
