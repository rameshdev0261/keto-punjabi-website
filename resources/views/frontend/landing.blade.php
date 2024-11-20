@extends('frontend.app')
@section('content')
{{-- <h1>{{$dashboard}}</h1> --}}
<landing-page-component
:dashboard='@json($dashboard)'
:cats='@json($cats)'
:latest_recipes='@json($latest_recipes)'
:products='@json($products)'
 ></landing-page-component>
@endsection
