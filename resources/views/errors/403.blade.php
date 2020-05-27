@extends('errors::minimal')

@section('title', __('لا تملك الصلاحية للدخول الي الصفحة'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: '  ياحبيب قلبي ارجع تاني انت ملكشي تدخل هنا ارجع ربنا يهديك'))
