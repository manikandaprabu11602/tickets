@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center">Create Ticket</h2>
    {!! Form::open(['route' => 'tickets.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        {{ csrf_field() }}

        <div class="form-group">
            {!! Form::hidden('status', 'Not Updated', ['class' => 'form-control']) !!}
        </div>

        <!-- Ticket Title -->
        <div class="form-group">
            {!! Form::label('title', 'Ticket Title') !!}
            {!! Form::text('title', null, ['id' => 'title', 'class' => 'form-control', 'required' => 'required']) !!}
            @error('title')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Ticket Detail (Using TinyMCE editor) -->
        <div class="form-group">
            {!! Form::label('detail', 'Ticket Detail') !!}
            {!! Form::textarea('detail', null, ['id' => 'detail', 'class' => 'form-control', 'rows' => 4, 'required' => 'required']) !!}
            @error('detail')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Ticket Type -->
        <div class="form-group">
            {!! Form::label('type', 'Ticket Type') !!}
            {!! Form::select('type', [
                'none' => '--select--',
                'Bug' => 'Bug',
                'Enhancement' => 'Enhancement',
                'Suggestion' => 'Suggestion',
                'Question' => 'Question',
                'Other' => 'Other'
            ], null, ['id' => 'type', 'class' => 'form-control', 'required' => 'required']) !!}
            @error('type')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Additional Fields (Bug-specific) -->
        <div class="form-group" id="bugFields" style="display: none;">
            {!! Form::label('bug_url', 'Bug URL') !!}
            {!! Form::text('bug_url', null, ['id' => 'bug_url', 'class' => 'form-control']) !!}
            @error('bug_url')
            <span class="text-danger">{{ $message }}</span>
            @enderror

            {!! Form::label('bug_source', 'Bug Source') !!}
            {!! Form::text('bug_source', null, ['id' => 'bug_source', 'class' => 'form-control']) !!}
            @error('bug_source')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Additional Fields (Enhancement-specific) -->
        <div class="form-group" id="enhancementFields" style="display: none;">
            {!! Form::label('estimate_timeline', 'Estimate Timeline') !!}
            {!! Form::text('estimate_timeline', null, ['id' => 'estimate_timeline', 'class' => 'form-control']) !!}
            @error('estimate_timeline')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Additional Fields (Suggestion-specific) -->
        <div class="form-group" id="suggestionFields" style="display: none;">
            {!! Form::label('suggestion_type', 'Type') !!}
            {!! Form::text('suggestion_type', null, ['id' => 'suggestion_type', 'class' => 'form-control']) !!}
            @error('suggestion_type')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Additional Fields (Question-specific) -->
        <div class="form-group" id="questionFields" style="display: none;">
            {!! Form::label('department', 'Department') !!}
            {!! Form::select('department', [
                'Billing' => 'Billing',
                'Order' => 'Order',
                'Other' => 'Other'
            ], null, ['id' => 'department', 'class' => 'form-control']) !!}
            @error('department')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Ticket Category -->
        <div class="form-group">
            {!! Form::label('category', 'Ticket Category') !!}
            {!! Form::select('category', [
                'Uncategorized' => 'Uncategorized',
                'Billing' => 'Billing',
                'Order' => 'Order',
                'Repayment' => 'Repayment'
            ], null, ['id' => 'category', 'class' => 'form-control', 'required' => 'required']) !!}
            @error('category')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Priority -->
        <div class="form-group">
            {!! Form::label('priority', 'Priority') !!}
            {!! Form::select('priority', [
                'Low' => 'Low',
                'Medium' => 'Medium',
                'High' => 'High',
                'Lowest' => 'Lowest',
                'Highest' => 'Highest'
            ], null, ['id' => 'priority', 'class' => 'form-control', 'required' => 'required']) !!}
            @error('priority')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- Issue Image Upload -->
        <div class="form-group">
            {!! Form::label('issue_image', 'Issue Image') !!}
            {!! Form::file('issue_image', ['id' => 'issue_image', 'class' => 'form-control-file']) !!}
            @error('issue_image')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        {!! Form::hidden('user_id', $ticket->title, ['id' => 'user_id', 'class' => 'form-control-file']) !!}

        {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
</div>

<script>
    // Show/hide additional fields based on the selected ticket type
    document.getElementById('type').addEventListener('change', function() {
        const selectedType = this.value;
        document.getElementById('bugFields').style.display = (selectedType === 'Bug') ? 'block' : 'none';
        document.getElementById('enhancementFields').style.display = (selectedType === 'Enhancement') ? 'block' : 'none';
        document.getElementById('suggestionFields').style.display = (selectedType === 'Suggestion') ? 'block' : 'none';
        document.getElementById('questionFields').style.display = (selectedType === 'Question') ? 'block' : 'none';
    });
</script>

@endsection
