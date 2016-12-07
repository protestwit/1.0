@extends('frontend::layouts.2col-right')
@section('title')
    ProtestWit - Organizing Social Movements, Social Media Matters
@stop

@section('top')
    @include('frontend::blocks.nav.top.menu')
@stop
@section('content')
    <component is={{ $vue->getViewName() }} inline-template>
        <dispatches></dispatches>
    </component>
@stop
