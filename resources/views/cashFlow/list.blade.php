@extends('layouts.app')
@section('subtitle',__('messages.siaf_cash_flow-model-subtitle-list'))
@section('content')

<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="{{asset('assets/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/pages/css/search.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE HEAD-->
<div class="page-head">
    <div class="container">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>@lang('messages.siaf_cash_flow-model-name')
                <small>@lang('messages.siaf_cash_flow-model-subtitle-list')</small>
            </h1>
        </div>
        <!-- END PAGE TITLE -->
        <!-- BEGIN PAGE TOOLBAR -->
        <div class="page-toolbar">
            <div class="btn-group btn-theme-panel">
                <!-- BEGIN PAGE BREADCRUMBS -->
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <a href="{{route('cashFlow.list')}}">@lang('messages.siaf_cash_flow-breadcrumb')</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>@lang('messages.siaf_cash_flow-breadcrumb-list')</span>
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
                        <div class="portlet-filters">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">{!! Form::label('id_customer', __('messages.siaf_cash_flow-id_customer'), ['class' => 'control-label']) !!}</label>
                                        <div class="input-icon right">
                                            {!! Form::select('id_customer', $customer, null, ['class' => 'form-control', 'id' => 'search_customer']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">{!! Form::label('id_account_plan', __('messages.siaf_cash_flow-id_account_plan'), ['class' => 'control-label']) !!}</label>
                                        <div class="input-icon right">
                                            {!! Form::select('id_account_plan', $accountPlan, null, ['class' => 'form-control', 'id' => 'search_accountPlan']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">{!! Form::label('id_bank', __('messages.siaf_cash_flow-id_bank'), ['class' => 'control-label']) !!}</label>
                                        <div class="input-icon right">
                                            {!! Form::select('id_bank', $bank, null, ['class' => 'form-control', 'id' => 'search_bank']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="portlet-title">
                            <div class="caption font-dark">
                                <a href="{{route('cashFlow.create')}}">
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
                            <table class="table table-striped table-bordered table-hover" id="gridCashFlow01">
                                <thead>
                                <tr>
                                    <th class="all">@lang('messages.siaf_cash_flow-id_account_plan')</th>
                                    <th class="all">@lang('messages.siaf_cash_flow-id_bank')</th>
                                    <th class="all">@lang('messages.siaf_cash_flow-num_document')</th>
                                    <th class="all">@lang('messages.siaf_cash_flow-dt_expired')</th>
                                    <th class="all">@lang('messages.siaf_cash_flow-vl_amount')</th>
                                    <th class="min-tablet">@lang('messages.actions')</th>
                                    <th class="none">@lang('messages.siaf_cash_flow-dt_payment')</th>
                                    <th class="none">@lang('messages.siaf_cash_flow-vl_payment')</th>
                                    <th class="none">@lang('messages.siaf_cash_flow-ind_tp_cash_flow')</th>
                                    <th class="none">@lang('messages.siaf_cash_flow-ind_st_cash_flow')</th>
                                    <th class="none">@lang('messages.siaf_cash_flow-comment')</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($cashs as $cashFlow)
                                <tr>
                                    <td>{{$cashFlow->accountPlan->code . ' - ' . $cashFlow->accountPlan->name}}</td>
                                    <td>{{$cashFlow->bank->name}}</td>
                                    <td>{{$cashFlow->num_document}}</td>
                                    <td>{{formatDate($cashFlow->dt_expired)}}</td>
                                    <td>{{formatCurrency($cashFlow->vl_amount)}}</td>
                                    <td>
                                        <a href="{{route('cashFlow.edit',[$cashFlow->id_cash_flow])}}" class="edit" data-toggle="tooltip" title="@lang('messages.edit')"><i class="fa fa-pencil"></i></a>
                                        <a href="javascript:confirmDelete('{{route('cashFlow.delete',[$cashFlow->id_cash_flow])}}','{{csrf_token()}}');" class="delete" data-toggle="tooltip" title="@lang('messages.delete')"><i class="fa fa-trash"></i></a>
                                    </td>
                                    <td>{{$cashFlow->dt_payment}}</td>
                                    <td>{{$cashFlow->vl_payment}}</td>
                                    <td>{{$cashFlow->indTpCashFlow()}}</td>
                                    <td>{{$cashFlow->indStCashFlow()}}</td>
                                    <td>{{$cashFlow->comment}}</td>
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
<script src="{{asset('assets/global/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{asset('assets/pages/scripts/'.app()->getLocale().'/table-datatables-responsive.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/pages/scripts/cash-flow.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
@endsection