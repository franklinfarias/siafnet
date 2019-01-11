@extends('layouts.app')
@section('subtitle',__('messages.siaf_profilerule-model-subtitle-list'))
@section('content')

<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="{{asset('assets/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE HEAD-->
<div class="page-head">
    <div class="container">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>@lang('messages.siaf_profilerule-model-name')
                <small>@lang('messages.siaf_profilerule-model-subtitle-list')</small>
            </h1>
        </div>
        <!-- END PAGE TITLE -->
        <!-- BEGIN PAGE TOOLBAR -->
        <div class="page-toolbar">
            <div class="btn-group btn-theme-panel">
                <!-- BEGIN PAGE BREADCRUMBS -->
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <a href="{{URL::to('profileRule/list')}}">@lang('messages.siaf_profilerule-breadcrumb')</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>@lang('messages.siaf_profilerule-breadcrumb-list')</span>
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
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light">
                        <div class="portlet-title">
                            <div class="caption font-dark">
                                <a href="{{url('profileRule/create')}}">
                                    <i class="icon-plus font-dark popovers" data-container="body" data-trigger="hover"
                                       data-placement="top" data-original-title="@lang('messages.new')"
                                       data-content="@lang('messages.click-here-to-new')"></i>
                                </a>
                                <span class="caption-subject bold">@lang('messages.new')</span>
                            </div>
                            <div class="tools">
                            </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover" id="sample_1">
                                <thead>
                                <tr>
                                    <th>@lang('messages.siaf_profilerule-id_profile')</th>
                                    <th>@lang('messages.siaf_profilerule-id_rule')</th>
                                    <th>@lang('messages.actions')</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($profilesRules as $profileRule)
                                    <tr>
                                        <td>{{$profileRule->profile->name_profile}}</td>
                                        <td>{{$profileRule->rule->name_rule}}</td>
                                        <td>
                                            <a href="javascript:confirmDelete('{{url('profileRule/delete/'.$profileRule->id_profile.'/'.$profileRule->id_rule)}}','{{csrf_token()}}');" class="delete" data-toggle="tooltip" title="@lang('messages.delete')"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{asset('assets/global/scripts/datatable.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/bootbox/bootbox.min.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{asset('assets/pages/scripts/'.app()->getLocale().'/table-datatables-responsive.min.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
@endsection