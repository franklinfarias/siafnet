@extends('layouts.app')
@section('subtitle',__('messages.home'))
@section('content')
    <!-- BEGIN PAGE HEAD-->
    <div class="page-head">
        <div class="container">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>@lang('messages.dashboard')
                    <small>@lang('messages.dashboard-statistics')</small>
                </h1>
            </div>
            <!-- END PAGE TITLE -->
            <!-- BEGIN PAGE TOOLBAR -->
            <div class="page-toolbar">
                <div class="btn-group btn-theme-panel">
                    <!-- BEGIN PAGE BREADCRUMBS -->
                    <ul class="page-breadcrumb breadcrumb">
                        <li>
                            <a href="/">@lang('messages.home')</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <span>@lang('messages.dashboard')</span>
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMBS -->
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE HEAD-->
    <!-- BEGIN PAGE CONTENT BODY -->
    <div class="page-content">
        <div class="container">
            <!-- BEGIN PAGE CONTENT INNER -->
            <div class="page-content-inner">
                @lang('messages.welcome')
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT BODY -->
@endsection
