<section class="row justify-content-center">
    <div class="col-md-8">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                {{-- <th scope="col">#</th> --}}
                <th scope="col">Tasks</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                <tr>
                    {{-- <td>{{$task->id}}</td> --}}
                    <td>{{$task->title}}</td>
                    <td style="display:flex;">
                        <a href="{{route('tasks.edit_view',[$task->id])}}" style="margin-right: 5px" class="btn btn-info">
                            Edit
                        </a>
                        <form action="{{route('tasks.destroy',[$task->id])}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                
                @endforeach
            </tbody>
        </table>
    </div>
</section>