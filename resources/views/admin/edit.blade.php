@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Ticket</h2>

        <form method="POST" action="{{ route('admin.update', $ticket->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control">
                    <option value="Resolved">Resolved</option>
                    <option value="On hold">On hold</option>
                    <option value="Pending">Pending</option>
                </select>
            </div>


            <button type="submit" class="btn btn-primary">Update Ticket</button>
        </form>
    </div>
@endsection
