
@extends ('layouts.main')
@section('body')

<h1>OLA DANOS TU DINERO POR FAVOR</h1>
@php
use Illuminate\Support\Facades\Mail;
$email = 'example@example.com'; // Replace with the recipient's email address
@endphp

<form action="{{ route('sendMail') }}" method="POST">
    @csrf
    <input type="text" name="email" value="{{ $email }}">
    <input type="submit" value="Send">
</form>


@endsection