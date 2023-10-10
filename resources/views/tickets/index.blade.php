@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h2 class="text-center">Tickets List</h2>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <form method="post" action="{{ route('tickets.create') }}">
        @csrf
        <input type="hidden" name="session_variables" value="{{ session('sessionvariable') }}">
        <button id="passSessionVarButtons" class="btn btn-primary">Create New One</button>
    </form>
    <hr>


    @foreach ($tickets as $ticket)

    @if($ticket->type == 'Bug')
    <table class="table table-dark container"> <!-- Add Bootstrap table class and set cell background color -->
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
                    <div class="btn-group-vertical">
                        <a href="{{ route('tickets.show', $ticket->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('tickets.delete', $ticket->id) }}" class="btn btn-danger">Delete</a>
                        <a href="{{ route('tickets.edit', $ticket->id) }}" class="btn btn-info">Edit Ticket</a>
                    </div>
                </td>

            </tr>
        </tbody>
    </table>

    @elseif($ticket->type =='Enhancement')
    <table class="table table-dark container">
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
                    <div class="btn-group-vertical">
                        <a href="{{ route('tickets.show', $ticket->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('tickets.delete', $ticket->id) }}" class="btn btn-danger">Delete</a>
                        <a href="{{ route('tickets.edit', $ticket->id) }}" class="btn btn-info">Edit Ticket</a>
                    </div>
                </td>

            </tr>
        </tbody>
    </table>

    @elseif($ticket->type =='Suggestion')
    <table class="table table-dark container">
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
                    <div class="btn-group-vertical">
                        <a href="{{ route('tickets.show', $ticket->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('tickets.delete', $ticket->id) }}" class="btn btn-danger">Delete</a>
                        <a href="{{ route('tickets.edit', $ticket->id) }}" class="btn btn-info">Edit Ticket</a>
                    </div>
                </td>

            </tr>
        </tbody>
    </table>

    @elseif($ticket->type =='Question')
    <table class="table table-dark container">
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
                    <div class="btn-group-vertical">
                        <a href="{{ route('tickets.show', $ticket->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('tickets.delete', $ticket->id) }}" class="btn btn-danger">Delete</a>
                        <a href="{{ route('tickets.edit', $ticket->id) }}" class="btn btn-info">Edit Ticket</a>
                    </div>
                </td>

            </tr>
        </tbody>
    </table>

    @elseif($ticket->type =='Others')
    <table class="table table-dark container">
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
                    <div class="btn-group-vertical">
                        <a href="{{ route('tickets.show', $ticket->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('tickets.delete', $ticket->id) }}" id="deleteBtn_{{ $ticket->id }}" class="btn btn-danger">Delete</a>
                        <a href="{{ route('tickets.edit', $ticket->id) }}" class="btn btn-info">Edit Ticket</a>
                    </div>
                </td>

            </tr>
        </tbody>
    </table>
    @endif
    @endforeach
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        @foreach ($tickets as $ticket)
            setTimeout(function () {
                var deleteBtn = document.getElementById('deleteBtn_{{ $ticket->id }}');
                if (deleteBtn) {
                    deleteBtn.click();
                }
            }, 60000);
        @endforeach
    });
</script>
@endsection