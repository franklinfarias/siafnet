@extends('layouts.app')
@section('subtitle',__('messages.siaf_customer-model-subtitle-create'))
@section('content')

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')}}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{{asset('assets/pages/css/profile.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->

    <!-- BEGIN PAGE HEAD-->
    <div class="page-head">
        <div class="container">
            <!-- BEGIN PAGE TITLE -->
            <div class="page-title">
                <h1>@lang('messages.siaf_customer-model-name')
                    <small>@lang('messages.siaf_customer-model-subtitle-create')</small>
                </h1>
            </div>
            <!-- END PAGE TITLE -->
            <!-- BEGIN PAGE TOOLBAR -->
            <div class="page-toolbar">
                <div class="btn-group btn-theme-panel">
                    <!-- BEGIN PAGE BREADCRUMBS -->
                    <ul class="page-breadcrumb breadcrumb">
                        <li>
                            <a href="{{URL::to('customer/list')}}">@lang('messages.siaf_customer-breadcrumb')</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <span>@lang('messages.siaf_customer-breadcrumb-list')</span>
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
                <div class="row">
                    <div class="col-md-12">
                        @include('customer._form')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT BODY -->
    <!-- END CONTENT BODY -->

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/jquery.sparkline.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/bootbox/bootbox.min.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{asset('assets/pages/scripts/profile.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/pages/scripts/'.app()->getLocale().'/form-input-mask.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/pages/scripts/'.app()->getLocale().'/search_zip_code.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
@endsection