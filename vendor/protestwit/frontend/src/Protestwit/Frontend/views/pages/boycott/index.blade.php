@extends('frontend::layouts.2col-right')
@section('title')
    ProtestWit - Boycotts ,
@stop

@section('top')
    @include('frontend::blocks.nav.top.menu')
@stop
@section('content')
    <component is={{ $vue->getViewName() }} inline-template>
        <boycott-list></boycott-list>
    </component>
@stop
