<div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Grade</th>
                <th>Department</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
            <tr>
                <td>{{ $student->name }}</td>
                <td>{{ $student->grade }}</td>
                <td> {{ $student->department }}</td>
                <td><button class="btn btn-primary xs" wire:click="edit({{ $student->id }})">Edit</button>
                    <button class="btn btn-danger xs" wire:click="delete({{ $student->id }})">Delete</button>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>

</div>