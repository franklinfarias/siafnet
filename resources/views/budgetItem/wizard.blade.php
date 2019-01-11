@extends('layouts.app')
@section('subtitle',__('messages.siaf_budget_item-model-subtitle-list'))
@section('content')

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{asset('assets/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
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
                        <div class="portlet light " id="form_wizard_1">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class=" icon-layers font-red"></i>
                                    <span class="caption-subject font-red bold uppercase"> @lang('messages.siaf_budget_item-wizard') -
                                                    <span class="step-title"> @lang('messages.siaf_budget_item-step_1_to_4') </span>
                                                </span>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <form class="form-horizontal" action="{{URL::route('budgetItem.wizardStore')}}" id="submit_form" method="POST">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-wizard">
                                        <div class="form-body">
                                            <ul class="nav nav-pills nav-justified steps">
                                                <li>
                                                    <a href="#tab1" data-toggle="tab" class="step">
                                                        <span class="number"> 1 </span>
                                                        <span class="desc">
                                                                        <i class="fa fa-check"></i> @lang('messages.siaf_budget_item-id_budget') </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#tab2" data-toggle="tab" class="step">
                                                        <span class="number"> 2 </span>
                                                        <span class="desc">
                                                                        <i class="fa fa-check"></i> @lang('messages.siaf_budget_item-id_account_plan') </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#tab3" data-toggle="tab" class="step active">
                                                        <span class="number"> 3 </span>
                                                        <span class="desc">
                                                                        <i class="fa fa-check"></i> @lang('messages.finish') </span>
                                                    </a>
                                                </li>
                                            </ul>
                                            <div id="bar" class="progress progress-striped" role="progressbar">
                                                <div class="progress-bar progress-bar-success"> </div>
                                            </div>
                                            <div class="tab-content">
                                                <div id="errorDanger" class="alert alert-danger display-none">
                                                    <button class="close" data-dismiss="alert"></button> You have some form errors. Please check below. </div>
                                                <div class="alert alert-success display-none">
                                                    <button class="close" data-dismiss="alert"></button> Your form validation is successful! </div>
                                                <div class="tab-pane active" id="tab1">
                                                    <h3 class="block">@lang('messages.siaf_budget_item-wizard_budget_details')</h3>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Code
                                                            <span class="required"> * </span>
                                                        </label>
                                                        <div class="col-md-4">
                                                            {!! Form::text('code', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_budget-code')]) !!}
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Name
                                                            <span class="required"> * </span>
                                                        </label>
                                                        <div class="col-md-4">
                                                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_budget-name')]) !!}
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Year/Month
                                                            <span class="required"> * </span>
                                                        </label>
                                                        <div class="col-md-4">
                                                            {!! Form::text('year_month_ref', null, ['class' => 'form-control', 'id' => 'mask_year_month_ref', 'placeholder' => __('messages.siaf_budget-year_month_ref')]) !!}
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="tab-pane" id="tab2">
                                                    <h3 class="block">@lang('messages.siaf_budget_item-wizard_accountplan_details')</h3>
                                                    <div class="form-group">
                                                        <div class="col-md-7">
                                                            <div class="table-scrollable table-scrollable-borderless">
                                                                <table class="table table-hover table-light">
                                                                    <thead>
                                                                    <th>Account Plan</th>
                                                                    <th>Amount</th>
                                                                    </thead>
                                                                    <tbody>
                                                                    @foreach($accountPlans as $accountPlan)
                                                                        <tr>
                                                                            <td>
                                                                                {!! $accountPlan->code . ' - ' . $accountPlan->name!!}
                                                                                <input type="hidden" name="accountPlan[]" value="{!! $accountPlan->id_account_plan !!}">
                                                                            </td>
                                                                            <td><input type="text" name="amount[]" id="amount" class="form-control amount"></td>
                                                                        </tr>
                                                                    @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="tab-pane" id="tab3">
                                                    <h3 class="block">@lang('messages.finish')</h3>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <a href="javascript:;" class="btn default button-previous">
                                                        <i class="fa fa-angle-left"></i> @lang('messages.back') </a>
                                                    <a href="javascript:;" class="btn btn-outline green button-next"> @lang('messages.continue')
                                                        <i class="fa fa-angle-right"></i>
                                                    </a>
                                                    <a href="javascript:;" class="btn green button-submit"> @lang('messages.submit')
                                                        <i class="fa fa-check"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function() {
            $('input#amount').maskMoney();
        });
    </script>

    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{asset('assets/global/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/jquery-validation/js/jquery.validate.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/jquery-validation/js/additional-methods.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/global/plugins/jquery-maskmoney/jquery.maskMoney.min.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{asset('assets/pages/scripts/form-input-mask.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/pages/scripts/form-wizard.min.js')}}" type="text/javascript"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
@endsection