@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <h1 class="text-3xl md:text-5xl font-extrabold text-center uppercase mb-12 bg-gradient-to-r from-indigo-400 via-purple-500 to-indigo-600 bg-clip-text text-transparent transform -rotate-2">Make A Payment</h1>
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <form method="POST" action="{{ route('make.payment') }}">
                @csrf
                <input type="number" name="precioTotal" id="precioTotal">

                <div class="flex justify-center items-center mt-4">
                    <button type="submit" class="w-full bg-indigo-500 uppercase rounded-xl font-extrabold text-white px-6 h-8">Pay with PayPal👉</button>
                </div>
            </form>
        </div>
    </div>
@endsection