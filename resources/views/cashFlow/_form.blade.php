
<div class="portlet light">
    <div class="portlet-title">
        <div class="caption font-dark">

        </div>
        <div class="actions">
            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:document.getElementById('frmData').submit();">
                <i class="fa fa-save"></i>
            </a>
            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:window.history.back();">
                <i class="fa fa-undo"></i>
            </a>
            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:confirmDelete('{{route('cashFlow.delete',[$cashFlow->id_cash_flow])}}','{{csrf_token()}}');">
                <i class="icon-trash"></i>
            </a>
        </div>
    </div>
    <div class="portlet-body form">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <!-- BEGIN FORM-->
        {!! Form::model($cashFlow, ['id' => 'frmData', 'role'=> 'form', 'url' => 'cashFlow/store', 'enctype' => 'multipart/form-data']) !!}
            {!! Form::hidden('id_cash_flow') !!}
            <div class="form-body">

                @if (Auth::user()->id_client == 1)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label">{!! Form::label('id_client', __('messages.siaf_customer-id_client'), ['class' => 'control-label']) !!}</label>
                                {!! Form::select('id_client', $clients, null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_user-id_client')]) !!}
                            </div>
                        </div>
                    </div>
                @else
                    {!! Form::hidden('id_client') !!}
                @endif

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">{!! Form::label('id_bank', __('messages.siaf_cash_flow-id_bank'), ['class' => 'control-label']) !!}</label>
                            {!! Form::select('id_bank', $bank, null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_cash_flow-search_a_bank'), 'id' => 'search_bank']) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">{!! Form::label('id_account_plan', __('messages.siaf_cash_flow-id_account_plan'), ['class' => 'control-label']) !!}</label>
                            {!! Form::select('id_account_plan', $accountPlan, null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_cash_flow-search_a_accountPlan'), 'id' => 'search_accountPlan']) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">{!! Form::label('id_supplier', __('messages.siaf_cash_flow-id_supplier'), ['class' => 'control-label']) !!}</label>
                            {!! Form::select('id_supplier', $supplier, null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_cash_flow-search_a_supplier'), 'id' => 'search_supplier']) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label class="control-label">{!! Form::label('id_customer', __('messages.siaf_cash_flow-id_customer'), ['class' => 'control-label']) !!}</label>
                            {!! Form::select('id_customer', $customer, null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_cash_flow-search_a_customer'), 'id' => 'search_customer']) !!}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label">{!! Form::label('num_document', __('messages.siaf_cash_flow-num_document'), ['class' => 'control-label']) !!}</label>
                            <div class="input-icon right">
                                <i class="fa fa-info-circle tooltips" data-original-title="{!! __('messages.siaf_cash_flow-num_document') !!}" data-container="body"></i>
                                {!! Form::text('num_document', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_cash_flow-num_document')]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label class="control-label">{!! Form::label('dt_emission', __('messages.siaf_cash_flow-dt_emission'), ['class' => 'control-label']) !!}</label>
                            <div class="input-group input-small date date-picker">
                                {!! Form::text('dt_emission', null, ['class' => 'form-control date-picker', 'placeholder' => __('messages.siaf_cash_flow-dt_emission'), 'readonly']) !!}
                                <span class="input-group-btn">
                                    <button class="btn default" type="button">
                                        <i class="fa fa-calendar"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label class="control-label">{!! Form::label('dt_expired', __('messages.siaf_cash_flow-dt_expired'), ['class' => 'control-label']) !!}</label>
                            <div class="input-group input-small date date-picker">
                                {!! Form::text('dt_expired', null, ['class' => 'form-control date-picker', 'placeholder' => __('messages.siaf_cash_flow-dt_expired'), 'readonly']) !!}
                                <span class="input-group-btn">
                                    <button class="btn default" type="button">
                                        <i class="fa fa-calendar"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label class="control-label">{!! Form::label('dt_payment', __('messages.siaf_cash_flow-dt_payment'), ['class' => 'control-label']) !!}</label>
                            <div class="input-group input-small date date-picker">
                                {!! Form::text('dt_payment', null, ['class' => 'form-control date-picker', 'placeholder' => __('messages.siaf_cash_flow-dt_payment'), 'readonly']) !!}
                                <span class="input-group-btn">
                                    <button class="btn default" type="button">
                                        <i class="fa fa-calendar"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <div class="form-group">
                                <label class="control-label">{!! Form::label('vl_amount', __('messages.siaf_cash_flow-vl_amount'), ['class' => 'control-label']) !!}</label>
                                {!! Form::text('vl_amount', null, ['class' => 'mask_currency form-control', 'placeholder' => __('messages.siaf_cash_flow-vl_amount')]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <div class="form-group">
                                <label class="control-label">{!! Form::label('vl_payment', __('messages.siaf_cash_flow-vl_payment'), ['class' => 'control-label']) !!}</label>
                                {!! Form::text('vl_payment', null, ['class' => 'mask_currency form-control', 'placeholder' => __('messages.siaf_cash_flow-vl_payment')]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <div class="form-group">
                                <label class="control-label">{!! Form::label('ind_tp_cash_flow', __('messages.siaf_cash_flow-ind_tp_cash_flow'), ['class' => 'control-label']) !!}</label>
                                {!! Form::select('ind_tp_cash_flow', $indTpCashFlow, null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_cash_flow-ind_tp_cash_flow')]) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <div class="form-group">
                                <label class="control-label">{!! Form::label('ind_st_cash_flow', __('messages.siaf_cash_flow-ind_st_cash_flow'), ['class' => 'control-label']) !!}</label>
                                {!! Form::select('ind_st_cash_flow', $indStCashFlow, null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_cash_flow-ind_st_cash_flow')]) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">{!! Form::label('comment', __('messages.siaf_cash_flow-comment'), ['class' => 'control-label']) !!}</label>

                            {!! Form::textArea('comment', null, ['class' => 'wysihtml5 form-control', 'placeholder' => __('messages.siaf_cash_flow-comment')]) !!}
                        </div>
                    </div>
                </div>

            </div>
            <div class="form-actions noborder">
                <button type="submit" class="btn green">@lang('messages.submit')</button>
                <button type="button" class="btn default">@lang('messages.cancel')</button>
            </div>
        {!! Form::close() !!}
        <!-- END FORM-->
    </div>
</div>


