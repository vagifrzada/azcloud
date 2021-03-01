@extends('layouts.site')

@php
    /** @var \App\Entities\Page\Page $page */
    $meta = $page->getMeta();
@endphp

@section('meta_title', $meta['title'] ?? $page->getTitle())
@section('meta_keywords', $meta['keywords'] ?? '')
@section('meta_description', $meta['description'] ?? '')

@section('content')

    <section class="page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 offset-xl-2">
                    <div class="page-header">
                        <h1 class="page-title">{{ $page->getTitle() }}</h1>
                        <p class="subtitle">
                            {!! $page->getDescription() !!}
                        </p>
                    </div>

                    @widget('ServicesWidget')
                    <!-- Services grid-->

                    <div class="need-help ptb-11">
                        {!! $page->getContent() !!}
                        <a class="btn btn-white" href="{{ route('site.contact') }}">@lang('main.apply')</a>
                    </div>
                    <!-- Need help-->
                </div>
            </div>
        </div>
        <!-- Container fluid-->
        @include('site.partials.have-question')
    </section>
@endsection