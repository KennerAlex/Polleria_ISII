@extends('layouts.plantilla')
@section('content')
    <h1>Bienvenido</h1>
   @if (session('status'))
       <br>
       {{session('status')}}
   @endif
@endsection