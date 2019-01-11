
<div class="portlet light">
    <div class="portlet-title">
        <div class="caption font-dark">

        </div>
        <div class="actions">
            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:document.getElementById('frmDados').submit();">
                <i class="fa fa-save"></i>
            </a>
            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:window.history.back();">
                <i class="fa fa-undo"></i>
            </a>
            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:confirmDelete('{{route('accountPlan.delete',[$accountPlan->id_account_plan])}}','{{csrf_token()}}');">
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
        {!! Form::model($accountPlan, ['id' => 'frmDados', 'role'=> 'form', 'url' => 'accountPlan/store', 'enctype' => 'multipart/form-data']) !!}
            {!! Form::hidden('id_account_plan') !!}
            <div class="form-body">
                @if (Auth::user()->id_client == 1)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-md-line-input has-success">
                                <div class="input-group">
                                    {!! Form::select('id_client', $clients, null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_account_plan-id_client')]) !!}
                                    {!! Form::label('id_client', __('messages.siaf_account_plan-id_client'), ['class' => 'control-label']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    {!! Form::hidden('id_client') !!}
                @endif
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group form-md-line-input has-success">
                            <div class="input-group">
                                {!! Form::select('id_sub_account_plan', $accountPlans, null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_account_plan-id_sub_account_plan')]) !!}
                                {!! Form::label('id_sub_account_plan', __('messages.siaf_account_plan-id_sub_account_plan'), ['class' => 'control-label']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group form-md-line-input has-success">
                            <div class="input-group">
                                {!! Form::text('code', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_account_plan-code')]) !!}
                                {!! Form::label('code', __('messages.siaf_account_plan-code')) !!}
                                <span class="input-group-addon">
                                <i class="fa fa-edit"></i>
                            </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group form-md-line-input has-success">
                            <div class="input-group">
                                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_account_plan-name')]) !!}
                                {!! Form::label('name', __('messages.siaf_account_plan-name')) !!}
                                <span class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group form-md-line-input has-success">
                            <div class="input-group">
                                {!! Form::select('ind_fnc_account_plan', $indFncAccountPlan, null, ['class' => 'form-control']) !!}
                                {!! Form::label('ind_fnc_account_plan', __('messages.siaf_account_plan-ind_fnc_account_plan'), ['class' => 'control-label']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group form-md-line-input has-success">
                            <div class="input-group">
                                {!! Form::select('ind_tp_account_plan', $indTpAccountPlan, null, ['class' => 'form-control']) !!}
                                {!! Form::label('ind_tp_account_plan', __('messages.siaf_account_plan-ind_tp_account_plan'), ['class' => 'control-label']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group form-md-line-input has-success">
                            <div class="input-group">
                                {!! Form::select('ind_st_account_plan', $indStAccountPlan, null, ['class' => 'form-control']) !!}
                                {!! Form::label('ind_st_account_plan', __('messages.siaf_account_plan-ind_st_account_plan'), ['class' => 'control-label']) !!}
                            </div>
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
