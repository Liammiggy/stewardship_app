@extends('layouts.app')
  
@section('title', 'Welcome Member')
  
@section('contents')
    <div class="text-center my-5">
        <h1 class="display-4">Welcome to the Membership Portal!</h1>
        <p class="lead mt-4">Thank you for joining us. We're excited to have you as a member.</p>

        @if(Session::has('success'))
            <div class="alert alert-success mt-4" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif

        <a href="{{ route('dashboard') }}" class="btn btn-primary mt-4">Go to Dashboard</a>
    </div>
@endsection
