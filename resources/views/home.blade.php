@extends ('layouts.main')
@section('body')

<x-home.upper-home />

<div class="px-8">

<div class="pb-8">
    @if($productos->count() >= 1)
    <a href="{{ route('producto.show', $productos->first()->id ) }}">
    <img class="w-full object-cover" src='{{ URL::to("/images/{$productos->first()->nombre}_0.jpg") }}' alt="{{ $productos->first()->nombre }}">
    </a>
    @else
        <x-errorUnU/>
    @endif
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    <div>
        @if($productos->count() >= 2)
        <a href="{{ route('producto.show', $productos->skip(1)->first()->id) }}">
        <img class="h-full w-full object-cover" src='{{ URL::to("/images/{$productos->skip(1)->first()->nombre}_0.jpg") }}' alt="{{ $productos->skip(1)->first()->nombre }}">
        </a>
        @endif
    </div>
    <div>
        @if($productos->count() >= 3)
        <a href="{{ route('producto.show', $productos->skip(2)->first()->id) }}">
        <img class="h-full w-full object-cover" src='{{ URL::to("/images/{$productos->skip(2)->first()->nombre}_0.jpg") }}' alt="{{ $productos->skip(2)->first()->nombre }}">
        </a>
        @endif
    </div>
    <div class="grid grid-cols-2">
        @if($productos->count() >= 4)
        <a href="{{ route('producto.show', $productos->skip(3)->first()->id) }}">
        <img class="h-48 w-full object-cover" src='{{ URL::to("/images/{$productos->skip(3)->first()->nombre}_0.jpg") }}' alt="{{ $productos->skip(3)->first()->nombre }}">
        </a>
        @endif
        @if($productos->count() >= 5)
        <a href="{{ route('producto.show', $productos->skip(4)->first()->id) }}">
        <img class="h-48 w-full object-cover" src='{{ URL::to("/images/{$productos->skip(4)->first()->nombre}_0.jpg") }}' alt="{{ $productos->skip(4)->first()->nombre }}">
        </a>

        @endif
        @if($productos->count() >= 6)
        {{-- <a href="{{ route('producto.show', $productos->skip(5)->first()->id) }}">

        <img class="h-48 w-full object-cover" src='{{ URL::to("/images/{$productos->skip(5)->first()->nombre}_0.jpg") }}' alt="{{ $productos->skip(5)->first()->nombre }}">
        </a>
        @endif
        @if($productos->count() >= 7)
        <a href="{{ route('producto.show', $productos->skip(6)->first()->id) }}">
        <img class="h-48 w-full object-cover" src='{{ URL::to("/images/{$productos->skip(6)->first()->nombre}_0.jpg") }}' alt="{{ $productos->skip(6)->first()->nombre }}">

        </a> --}}
        @endif

    </div>
</div>
</div>

@endsection