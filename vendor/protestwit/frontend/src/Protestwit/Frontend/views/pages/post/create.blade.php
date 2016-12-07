@extends('frontend::layouts.2col-right')


@section('top')
    @include('frontend::blocks.nav.top.menu')
@stop

@section('content')
    <div class="row">
        <header id="post-header">
            <ul class="text-center metadata" tabindex="0" role="list" aria-label="Metadata for article">
                <li class="byline" tabindex="0">
                    <span class="text-uppercase" itemprop="author">
                        <a tabindex="-1" aria-hidden="true" role="presentation" rel="author" href="@todo">{{$post->author_full_name}}</a>
                    </span>
                    <span tabindex="-1" aria-hidden="true" role="presentation" itemprop="articleSection">
			            {{$post->group_name}}
                    </span>
                </li>
                <li tabindex="0" class="meta-pubdate inline-block">
                    <span class="visually-hidden">Date of Publication: {{$post->published_date}}</span>
                    <time aria-hidden="true" role="presentation" pubdate="{{$post->published_date}}">{{$post->published_date}}</time>
                </li>
            </ul>
            <h1 tabindex="0" class="post-title" itemprop="name">
                {{$post->title}}
            </h1>
            <figure class="wp-caption">
                <img class="" alt="{{$post->lead_image_alt}}" src="{{$post->lead_image_url}}">
            </figure>
            <figcaption class="wp-caption-text link-underline">
                <span class="marg-r-micro">
                    The Russian Progress 62 spacecraft approaching the International Space Station on July 1, 2016.&nbsp;
                </span>
                <span class="credit link-underline-sm">
                    <span aria-hidden="true" class="ui ui-photo inline-block ui-credit relative opacity-6 marg-r-sm"></span>
                    {{$post->lead_image->author}}
                </span>
            </figcaption>
        </header>
    </div>
@stop