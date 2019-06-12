@extends('layouts.app')
@section('title', 'Montar Grade')
@section('content')
    <div class="content mt-5">
    <grid-create :teachers="{{ $teachers }}" :classes="{{ $classes }}"></grid-create>
    </div>
@endsection