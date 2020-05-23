@extends('errors::minimal')

@section('title', __('لا تملك الصلاحية للدخول الي الصفحة'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'لا تملك الصلاحية للدخول الي الصفحة'))
