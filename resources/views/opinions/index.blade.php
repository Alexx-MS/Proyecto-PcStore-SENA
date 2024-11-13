<h1>Opinions</h1>
<a href="{{ route('opinions.create') }}" class="btn btn-primary">Add New Opinion</a>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Product ID</th>
            <th>Rating</th>
            <th>Comment</th>
            <th>Date</th>
            <th>Usefulness</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($opinions as $opinion)
            <tr>
                <td>{{ $opinion->id }}</td>
                <td>{{ $opinion->product_id }}</td>
                <td>{{ $opinion->rating }}</td>
                <td>{{ $opinion->comment }}</td>
                <td>{{ $opinion->date }}</td>
                <td>{{ $opinion->usefulness }}</td>
                <td>
                    <a href="{{ route('opinions.show', $opinion) }}" class="btn btn-info">View</a>
                    <a href="{{ route('opinions.edit', $opinion) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('opinions.destroy', $opinion) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
