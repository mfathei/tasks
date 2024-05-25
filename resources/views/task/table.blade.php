<table class="table table-striped">
    <thead>
        <tr>
            <th class="w-5">#</th>
            <th class="w-25">{{ trans('task.table.title') }}</th>
            <th class="w-40">{{ trans('task.table.description') }}</th>
            <th>{{ trans('task.table.assignedTo') }}</th>
            <th>{{ trans('task.table.assignedBy') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tasks as $task)
            <tr>
                <td>{{ $task->id }}</td>
                <td>{{ $task->title }}</td>
                <td>{{ $task->description }}</td>
                <td>{{ $task->assignedTo->name }}</td>
                <td>{{ $task->assignedBy->name }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $tasks->links() }}
