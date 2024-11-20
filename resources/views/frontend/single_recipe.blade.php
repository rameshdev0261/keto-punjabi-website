@extends('frontend.app')
@section('content')
<single-recipe-page-component
:recipe='@json($recipe)'
:products='@json($products)'
></single-recipe-page-component>
@endsection
