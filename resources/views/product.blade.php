@extends('layouts.app')

@section('title', $product->title)

@section('content')

  @include('product-page.product-header')
  @include('product-page.product-info')

@endsection