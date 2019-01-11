@extends('layouts.app')
@section('subtitle',__('messages.error-403'))
@section('content')

    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{{asset('assets/pages/css/error.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->

    <!-- BEGIN PAGE HEAD-->
    <div class="page-head">
        <div class="container">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>@lang('messages.error-403')
                </h1>
            </div>
            <!-- END PAGE TITLE -->
            <!-- BEGIN PAGE TOOLBAR -->
            <div class="page-toolbar">
                <div class="btn-group btn-theme-panel">
                    <!-- BEGIN PAGE BREADCRUMBS -->
                    <ul class="page-breadcrumb breadcrumb">
                        <li>
                            <a href="javascript:history.back();">@lang('messages.back')</a>
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMBS -->
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE HEAD-->

    <!-- BEGIN PAGE CONTENT BODY -->
    <div class="page-content" style="min-height: 316px;">
        <div class="container">
            <!-- BEGIN PAGE CONTENT INNER -->
            <div class="page-content-inner">
                <div class="row">
                    <div class="col-md-12 page-404">
                        <div class="number font-green"> 403 </div>
                        <div class="details">
                            <h3>@lang('messages.error-403-msg1')</h3>
                            <p>{{$exception->getMessage()}}</p>
                            <a href="javascript:history.back();" class="btn btn-xs grey-cascade">
                                <i class="fa fa-undo"></i>
                                @lang('messages.back')
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END PAGE CONTENT INNER -->
        </div>
    </div>
    <!-- BEGIN PAGE LEVEL PLUGINS -->

    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->

    <!-- END PAGE LEVEL SCRIPTS -->
@endsection