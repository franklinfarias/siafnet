@extends('layouts.app')
@section('subtitle',__('messages.siaf_budget_item-model-subtitle-list'))
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
            <h1>@lang('messages.siaf_budget_item-model-name')
                <small>@lang('messages.siaf_budget_item-model-subtitle-list')</small>
            </h1>
        </div>
        <!-- END PAGE TITLE -->
        <!-- BEGIN PAGE TOOLBAR -->
        <div class="page-toolbar">
            <div class="btn-group btn-theme-panel">
                <!-- BEGIN PAGE BREADCRUMBS -->
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <a href="{{route('budget.list')}}">@lang('messages.siaf_budget_item-breadcrumb')</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>@lang('messages.siaf_budget_item-breadcrumb-list')</span>
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
                                <a href="{{route('budget.create')}}">
                                    <i class="icon-plus font-dark popovers" data-container="body" data-trigger="hover"
                                       data-placement="top" data-original-title="@lang('messages.new')"
                                       data-content="@lang('messages.click-here-to-new')"></i>
                                </a>
                                <span class="caption-subject bold">@lang('messages.new')</span>

                                <a href="{{route('budgetItem.wizard')}}">
                                    <i class="icon-plus font-dark popovers" data-container="body" data-trigger="hover"
                                       data-placement="top" data-original-title="@lang('messages.wizard')"
                                       data-content="@lang('messages.click-here-to-wizard')"></i>
                                </a>
                                <span class="caption-subject bold">@lang('messages.wizard')</span>
                            </div>
                            <div class="tools">
                            </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover" id="sample_1">
                                <thead>
                                <tr>
                                    <th class="all">@lang('messages.siaf_budget_item-id_budget')</th>
                                    <th class="all">@lang('messages.siaf_budget_item-id_account_plan')</th>
                                    <th class="all">@lang('messages.siaf_budget_item-vl_budget')</th>
                                    <th class="min-tablet">@lang('messages.actions')</th>
                                    <th class="none">@lang('messages.siaf_budget_item-ind_budget_restrict')</th>
                                    <th class="none">@lang('messages.siaf_budget_item-created_at')</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($budgetItems as $budget)
                                <tr>
                                    <td>{{$budget->budget->code}}</td>
                                    <td>{{$budget->accountPlan->code}} - {{$budget->accountPlan->name}}</td>
                                    <td>{{$budget->vl_budget}}</td>
                                    <td>
                                        <a href="{{route('budgetItem.edit',[$budget->id_budget_item])}}" class="edit" data-toggle="tooltip" title="@lang('messages.edit')"><i class="fa fa-pencil"></i></a>
                                        <a href="javascript:confirmDelete('{{route('budgetItem.delete',[$budget->id_budget])}}','{{csrf_token()}}');" class="delete" data-toggle="tooltip" title="@lang('messages.delete')"><i class="fa fa-trash"></i></a>
                                    </td>
                                    <td>{{$budget->indBudgetRestrict()}}</td>
                                    <td>{{$budget->created_at}}</td>

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