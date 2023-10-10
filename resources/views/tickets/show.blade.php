@extends('layouts.app')

@section('content')
<div class="container bg-light">
    <div class="card">
        <div class="card-body">

            <div class="row">
                <div class="col-md-6 text-center">
                    <div>
                        <img src="{{ asset('storage/' . $ticket->issue_image) }}" alt="{{ $ticket->issue_image }}" style="border-radius: 10px; max-width: 100%; transition: transform 0.3s; height:400px;">
                    </div>
                </div>

                <div class="col-md-6">
                <div class="mt-4"style="margin-left:50%;">
                        <a href="{{ route('tickets.index', $ticket->id) }}" class="btn btn-success">Back</a>
                        <a href="{{ route('tickets.edit', $ticket->id) }}" class="btn btn-info">Edit Ticket</a>
                        <a href="{{ route('tickets.delete', $ticket->id) }}" class="btn btn-danger">Delete</a>
                    </div>
                <h2 class="font-weight-bold mt-5 mb-4 text-center" style="font-size: 28px;">Ticket Details</h2><hr>
                    <h5 class="card-title custom-card-title font-weight-bold ml-5">Title :{{ $ticket->title }}</h5>

                    <p class="card-text font-weight-bold ml-5">Type: {{ $ticket->type }}</p>
                    <p class="card-text font-weight-bold ml-5">Category: {{ $ticket->category }}</p>
                    <p class="card-text font-weight-bold ml-5">Priority: {{ $ticket->priority }}</p>

                    <h6 style="margin-left:25%;font-weight:900;">Ticket Status: <button type="button" class="btn btn-info">{{ $ticket->status }}</button></h6>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
