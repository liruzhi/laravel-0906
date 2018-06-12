@extends('layouts.master')

@section('title', 'each')

@section('sidebar')
    {{--@parent

    <p>这将追加到主布局的侧边栏。</p>--}}
@endsection

@section('content')
    @each('each.data',$projects,'project','each.empty')
@endsection