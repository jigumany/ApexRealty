<div class="tasks">
    @foreach ($tasks as $task)
        <x-task :task='$task' />
    @endforeach
</div>