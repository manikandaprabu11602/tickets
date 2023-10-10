@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Admin Page</h1>

    @php
    $ticketCount = 0;
    @endphp
    @foreach ($tickets as $ticket)

    @php
    $ticketCount++;
    @endphp

    @endforeach

    <p>Total Tickets: <button type="button" class="btn btn-success">{{ $ticketCount }}</button></p>


    @foreach ($tickets as $ticket)
    @if($ticket->type == 'Bug')
    <table class="table table-dark"> <!-- Add Bootstrap table class and set cell background color -->
        <thead>
            <tr>
                <th>Status</th>
                <th>Title</th>
                <th>Detail</th>
                <th>Category</th>
                <th>Priority</th>
                <th>Bug Url</th>
                <th>Bug Source</th>
                <th>Issue Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><button type="button" class="btn btn-info" style="width:20px;">{{ $ticket->status }}</button></td>
                <td>{{ $ticket->title }}</td>
                <td>{{ $ticket->detail }}</td>
                <td>{{ $ticket->category }}</td>
                <td>{{ $ticket->priority }}</td>
                <td>{{ $ticket->bug_url }}</td>
                <td>{{ $ticket->bug_source }}</td>
                <td>
                    <img src="{{ asset('storage/' . $ticket->issue_image) }}" alt="{{ $ticket->issue_image }}" height="150px" width="250px"> <!-- Adjusted image size -->
                </td>
                <td>
                    <a href="{{ route('admin.edit', ['id' => $ticket->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form method="POST" action="{{ route('admin.delete', ['id' => $ticket->id]) }}" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>

            </tr>
        </tbody>
    </table>

    @elseif($ticket->type =='Enhancement')
    <table class="table table-dark">
        <thead>
            <tr>
                <th>Status</th>
                <th>Title</th>
                <th>Detail</th>
                <th>Category</th>
                <th>Priority</th>
                <th>Estimate Time</th>
                <th>Issue Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><button type="button" class="btn btn-info">{{ $ticket->status }}</button></td>
                <td>{{ $ticket->title }}</td>
                <td>{{ $ticket->detail }}</td>
                <td>{{ $ticket->category }}</td>
                <td>{{ $ticket->priority }}</td>
                <td>{{ $ticket->estimate_timeline }}</td>
                <td>
                    <img src="{{ asset('storage/' . $ticket->issue_image) }}" alt="{{ $ticket->issue_image }}" height="150px" width="250px">
                </td>
                <td>
                    <a href="{{ route('admin.edit', ['id' => $ticket->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form method="POST" action="{{ route('admin.delete', ['id' => $ticket->id]) }}" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>

            </tr>
        </tbody>
    </table>

    @elseif($ticket->type =='Suggestion')
    <table class="table table-dark">
        <thead>
            <tr>
                <th>Status</th>
                <th>Title</th>
                <th>Detail</th>
                <th>Category</th>
                <th>Priority</th>
                <th>Suggestion Type</th>
                <th>Issue Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><button type="button" class="btn btn-info">{{ $ticket->status }}</button></td>
                <td>{{ $ticket->title }}</td>
                <td>{{ $ticket->detail }}</td>
                <td>{{ $ticket->category }}</td>
                <td>{{ $ticket->priority }}</td>
                <td>{{ $ticket->suggestion_type }}</td>
                <td>
                    <img src="{{ asset('storage/' . $ticket->issue_image) }}" alt="{{ $ticket->issue_image }}" height="150px" width="250px">
                </td>
                <td>
                    <a href="{{ route('admin.edit', ['id' => $ticket->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form method="POST" action="{{ route('admin.delete', ['id' => $ticket->id]) }}" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>

            </tr>
        </tbody>
    </table>

    @elseif($ticket->type =='Question')
    <table class="table table-dark">
        <thead>
            <tr>
                <th>Status</th>
                <th>Title</th>
                <th>Detail</th>
                <th>Category</th>
                <th>Priority</th>
                <th>Department</th>
                <th>Issue Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><button type="button" class="btn btn-info">{{ $ticket->status }}</button></td>
                <td>{{ $ticket->title }}</td>
                <td>{{ $ticket->detail }}</td>
                <td>{{ $ticket->category }}</td>
                <td>{{ $ticket->priority }}</td>
                <td>{{ $ticket->department }}</td>
                <td>
                    <img src="{{ asset('storage/' . $ticket->issue_image) }}" alt="{{ $ticket->issue_image }}" height="150px" width="250px">
                </td>
                <td>
                    <a href="{{ route('admin.edit', ['id' => $ticket->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form method="POST" action="{{ route('admin.delete', ['id' => $ticket->id]) }}" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>

            </tr>
        </tbody>
    </table>

    @elseif($ticket->type =='Others')
    <table class="table table-dark">
        <thead>
            <tr>
                <th>Status</th>
                <th>Title</th>
                <th>Detail</th>
                <th>Category</th>
                <th>Priority</th>
                <th>Issue Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><button type="button" class="btn btn-info">{{ $ticket->status }}</button></td>
                <td>{{ $ticket->title }}</td>
                <td>{{ $ticket->detail }}</td>
                <td>{{ $ticket->category }}</td>
                <td>{{ $ticket->priority }}</td>
                <td>Others</td>
                <td>
                    <img src="{{ asset('storage/' . $ticket->issue_image) }}" alt="{{ $ticket->issue_image }}" height="150px" width="250px">
                </td>
                <td>
                    <a href="{{ route('admin.edit', ['id' => $ticket->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form method="POST" action="{{ route('admin.delete', ['id' => $ticket->id]) }}" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>

            </tr>
        </tbody>
    </table>
    @endif
    @endforeach

</div>
@endsection