@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

    <form id="sessionVarForm" method="POST" action="{{ route('tickets.index') }}">
                        @csrf
                        <input type="hidden" name="session_variable" value="{{ session('status') }}">
                        <button id="passSessionVarButton" class="btn btn-primary">GO TO LIST</button>
                    </form>
                    
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <table style="background-color:black">
                        <button type="button" class="btn btn-primary" style="animation: spin s linear infinite;height:50px;width:60px;">W</button>
                        <button type="button" class="btn btn-secondary" style="animation: spin 0.9s linear infinite;">E</button>
                        <button type="button" class="btn btn-success" style="animation: spin 0.9s linear infinite;">L</button>
                        <button type="button" class="btn btn-danger" style="animation: spin 0.9s linear infinite;">C</button>
                        <button type="button" class="btn btn-warning" style="animation: spin 0.9s linear infinite;">O</button>
                        <button type="button" class="btn btn-info" style="animation: spin 0.9s linear infinite;">M</button>
                        <button type="button" class="btn btn-secondary" style="animation: spin s linear infinite;height:50px;width:60px;">E</button>
                    </table><br>
                    You are a Users.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection