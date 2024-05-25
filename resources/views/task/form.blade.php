<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ trans('task.create.title') }}</h3>
    </div>


    <form action="{{ route('tasks.store') }}" method="POST">
        <div class="card-body">

            @include('errors')

            @csrf
            <div class="form-group">
                <label>{{ trans('task.create.admin') }}</label>
                <select class="form-control" name="assigned_by_id" required>
                    @foreach($admins as $admin)
                        <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="title">{{ trans('task.create.title-input') }}</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" required>
            </div>

            <div class="form-group">
                <label>{{ trans('task.create.description') }}</label>
                <textarea name="description" class="form-control" rows="3" placeholder="Enter ..." required></textarea>
            </div>

            <div class="form-group">
                <label>{{ trans('task.create.assignedTo') }}</label>
                <select class="form-control" name="assigned_to_id">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
