@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{asset('assets/bundles/select2/dist/css/select2.min.css')}}">
@endsection

@section('content')
    <livewire:role-permission-form/>
@endsection

@section('script')
    {{--Select2--}}
    <script src="{{asset('assets/bundles/select2/dist/js/select2.full.min.js')}}"></script>
    {{--Sweet Alert--}}
    <script src="{{asset('assets/bundles/sweetalert/sweetalert.min.js')}}"></script>
    <script src="{{asset('assets/js/page/sweetalert.js')}}"></script>
@endsection
@stack('js')
