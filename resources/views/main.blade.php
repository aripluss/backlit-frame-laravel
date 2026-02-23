@extends('layouts.app')

@section('title', 'Backlit frame')

@section('content')

    @include('main-page.hero')
    @include('main-page.popular-designs', ['items' => $popularDesigns])
    @include('main-page.how-it-works')
    @include('main-page.why-we')
    @include('main-page.steps-to-order')
    @include('main-page.feedback')
    @include('main-page.faq')
    @include('main-page.contact_form')
    @include('main-page.mobile-menu')

@endsection