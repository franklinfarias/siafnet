
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
            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:confirmDelete('{{route('budget.delete',[$budget->id_budget])}}','{{csrf_token()}}');">
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
        {!! Form::model($budget, ['id' => 'frmDados', 'role'=> 'form', 'url' => 'budget/store', 'enctype' => 'multipart/form-data']) !!}
            {!! Form::hidden('id_budget') !!}
            <div class="form-body">
                @if (Auth::user()->id_client == 1)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group form-md-line-input has-success">
                                <div class="input-group">
                                    {!! Form::select('id_client', $clients, null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_budget-id_client')]) !!}
                                    {!! Form::label('id_client', __('messages.siaf_budget-id_client'), ['class' => 'control-label']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    {!! Form::hidden('id_client') !!}
                @endif
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group form-md-line-input has-success">
                            <div class="input-group">
                                {!! Form::text('code', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_budget-code')]) !!}
                                {!! Form::label('code', __('messages.siaf_budget-code')) !!}
                                <span class="input-group-addon">
                                <i class="fa fa-edit"></i>
                            </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group form-md-line-input has-success">
                            <div class="input-group">
                                {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_budget-name')]) !!}
                                {!! Form::label('name', __('messages.siaf_budget-name')) !!}
                                <span class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group form-md-line-input has-success">
                            <div class="input-group">
                                {!! Form::text('year_month_ref', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_budget-year_month_ref')]) !!}
                                {!! Form::label('year_month_ref', __('messages.siaf_budget-year_month_ref')) !!}
                                <span class="input-group-addon">
                                    <i class="fa fa-edit"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group form-md-line-input has-success">
                            <div class="input-group">
                                {!! Form::select('ind_tp_budget', $indTpBudget, null, ['class' => 'form-control']) !!}
                                {!! Form::label('ind_tp_budget', __('messages.siaf_budget-ind_tp_budget'), ['class' => 'control-label']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-md-line-input has-success">
                            <div class="input-group">
                                {!! Form::select('ind_st_budget', $indStBudget, null, ['class' => 'form-control']) !!}
                                {!! Form::label('ind_st_budget', __('messages.siaf_budget-ind_st_budget'), ['class' => 'control-label']) !!}
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
