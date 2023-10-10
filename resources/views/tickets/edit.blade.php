@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Ticket</h2>

    <form method="POST" action="{{ route('tickets.update', $ticket->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Ticket editing fields here -->
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $ticket->title) }}">
        </div>

        <div class="form-group">
            <label for="detail">Detail</label>
            <textarea name="detail" id="detail" class="form-control">{{ old('detail', $ticket->detail) }}</textarea>
        </div>

        <div class="form-group">
            <label for="type">Type</label>
            <select name="type" id="type" class="form-control">
                <option value="Bug" {{ old('type', $ticket->type) === 'Bug' ? 'selected' : '' }}>Bug</option>
                <option value="Enhancement" {{ old('type', $ticket->type) === 'Enhancement' ? 'selected' : '' }}>Enhancement</option>
                <option value="Suggestion" {{ old('type', $ticket->type) === 'Suggestion' ? 'selected' : '' }}>Suggestion</option>
                <option value="Question" {{ old('type', $ticket->type) === 'Question' ? 'selected' : '' }}>Question</option>
                <option value="Other" {{ old('type', $ticket->type) === 'Other' ? 'selected' : '' }}>Other</option>
            </select>
        </div>

        <!-- Additional Fields (Bug-specific) -->
        <div class="form-group" id="bugFields" style="display: none;">
            <label for="bug_url">Bug URL</label>
            <input type="text" name="bug_url" id="bug_url" class="form-control" value="{{ old('bug_url', $ticket->bug_url) }}">

            <label for="bug_source">Bug Source</label>
            <input type="text" name="bug_source" id="bug_source" class="form-control" value="{{ old('bug_source', $ticket->bug_source) }}">
        </div>

        <!-- Additional Fields (Enhancement-specific) -->
        <div class="form-group" id="enhancementFields" style="display: none;">
            <label for="estimate_timeline">Estimate Timeline</label>
            <input type="text" name="estimate_timeline" id="estimate_timeline" class="form-control" value="{{ old('estimate_timeline', $ticket->estimate_timeline) }}">
        </div>

        <!-- Additional Fields (Suggestion-specific) -->
        <div class="form-group" id="suggestionFields" style="display: none;">
            <label for="suggestion_type">Suggestion Type</label>
            <input type="text" name="suggestion_type" id="suggestion_type" class="form-control" value="{{ old('suggestion_type', $ticket->suggestion_type) }}">
        </div>

        <!-- Additional Fields (Question-specific) -->
        <div class="form-group" id="questionFields" style="display: none;">
            <label for="department">Department</label>
            <select name="department" id="department" class="form-control">
                <option value="Billing" {{ old('department', $ticket->department) === 'Billing' ? 'selected' : '' }}>Billing</option>
                <option value="Order" {{ old('department', $ticket->department) === 'Order' ? 'selected' : '' }}>Order</option>
                <option value="Other" {{ old('department', $ticket->department) === 'Other' ? 'selected' : '' }}>Other</option>
            </select>
        </div>

        <div class="form-group">
            <h2>Existing Images</h2>
            <img src="{{ asset('storage/' . $ticket->issue_image) }}" alt="{{ $ticket->issue_image }}" height="300px" width="500px">
        </div>

        <div class="form-group">
            <label for="issue_image">Issue Image</label>
            <input type="file" name="issue_image" id="issue_image" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Update Ticket</button>
    </form>
</div>

<script>
    // Show/hide additional fields based on the selected ticket type
    $('#type').on('change', function() {
        const selectedType = $(this).val();
        $('#bugFields').toggle(selectedType === 'Bug');
        $('#enhancementFields').toggle(selectedType === 'Enhancement');
        $('#suggestionFields').toggle(selectedType === 'Suggestion');
        $('#questionFields').toggle(selectedType === 'Question');
    });
</script>
@endsection
