@extends('layouts.app')

@section('title', 'Каталог')

@section('content')

  @include('catalog-page.catalog-controls')
  @include('catalog-page.catalog-section', ['items' => $catalogItems])
  @include('catalog-page.pagination')

@endsection