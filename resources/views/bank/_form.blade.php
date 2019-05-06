
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
            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:confirmDelete('{{route('bank.delete',[$bank->ind_bank])}}','{{csrf_token()}}');">
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
        {!! Form::model($bank, ['id' => 'frmDados', 'role'=> 'form', 'url' => 'bank/store', 'enctype' => 'multipart/form-data']) !!}
            {!! Form::hidden('id_bank') !!}
            <div class="form-body">
                <div class="tabbable-line">
                    <ul class="nav nav-tabs ">
                        <li class="active">
                            <a href="#tab_15_1" data-toggle="tab"> {!! __('messages.siaf_bank-tab_data') !!} </a>
                        </li>
                        <li>
                            <a href="#tab_15_2" data-toggle="tab"> {!! __('messages.siaf_bank-tab_parameters') !!} </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_15_1">
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">{!! Form::label('name', __('messages.siaf_bank-name'), ['class' => 'control-label']) !!}</label>
                                        <div class="input-icon right">
                                            <i class="fa fa-info-circle tooltips" data-original-title="{!! __('messages.siaf_bank-name') !!}" data-container="body"></i>
                                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_bank-name')]) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="control-label">{!! Form::label('code', __('messages.siaf_bank-code'), ['class' => 'control-label']) !!}</label>
                                        <div class="input-icon right">
                                            <i class="fa fa-info-circle tooltips" data-original-title="{!! __('messages.siaf_bank-code') !!}" data-container="body"></i>
                                            {!! Form::text('code', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_bank-code')]) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="control-label">{!! Form::label('agency', __('messages.siaf_bank-agency'), ['class' => 'control-label']) !!}</label>
                                        <div class="input-icon right">
                                            <i class="fa fa-info-circle tooltips" data-original-title="{!! __('messages.siaf_bank-agency') !!}" data-container="body"></i>
                                            {!! Form::text('agency', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_bank-agency')]) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">{!! Form::label('number_account', __('messages.siaf_bank-number_account'), ['class' => 'control-label']) !!}</label>
                                        <div class="input-icon right">
                                            <i class="fa fa-info-circle tooltips" data-original-title="{!! __('messages.siaf_bank-number_account') !!}" data-container="body"></i>
                                            {!! Form::text('number_account', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_bank-number_account')]) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label class="control-label">{!! Form::label('ind_tp_bank', __('messages.siaf_bank-ind_tp_bank'), ['class' => 'control-label']) !!}</label>
                                            {!! Form::select('ind_tp_bank', $indTpBank, null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_bank-ind_tp_bank')]) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label class="control-label">{!! Form::label('ind_st_bank', __('messages.siaf_bank-ind_st_bank'), ['class' => 'control-label']) !!}</label>
                                            {!! Form::select('ind_st_bank', $indStBank, null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_bank-ind_st_bank')]) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="tab-pane" id="tab_15_2">
                            <div class="form-group">
                                <label class="control-label">{!! Form::label('param01', __('messages.siaf_bank-param01'), ['class' => 'control-label']) !!}</label>
                                <div class="input-icon right">
                                    <i class="fa fa-info-circle tooltips" data-original-title="{!! __('messages.siaf_bank-param01') !!}" data-container="body"></i>
                                    {!! Form::text('param01', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_bank-param01')]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">{!! Form::label('param02', __('messages.siaf_bank-param02'), ['class' => 'control-label']) !!}</label>
                                <div class="input-icon right">
                                    <i class="fa fa-info-circle tooltips" data-original-title="{!! __('messages.siaf_bank-param02') !!}" data-container="body"></i>
                                    {!! Form::text('param02', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_bank-param02')]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">{!! Form::label('param03', __('messages.siaf_bank-param03'), ['class' => 'control-label']) !!}</label>
                                <div class="input-icon right">
                                    <i class="fa fa-info-circle tooltips" data-original-title="{!! __('messages.siaf_bank-param03') !!}" data-container="body"></i>
                                    {!! Form::text('param03', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_bank-param03')]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">{!! Form::label('param04', __('messages.siaf_bank-param04'), ['class' => 'control-label']) !!}</label>
                                <div class="input-icon right">
                                    <i class="fa fa-info-circle tooltips" data-original-title="{!! __('messages.siaf_bank-param04') !!}" data-container="body"></i>
                                    {!! Form::text('param04', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_bank-param04')]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">{!! Form::label('param05', __('messages.siaf_bank-param05'), ['class' => 'control-label']) !!}</label>
                                <div class="input-icon right">
                                    <i class="fa fa-info-circle tooltips" data-original-title="{!! __('messages.siaf_bank-param05') !!}" data-container="body"></i>
                                    {!! Form::text('param05', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_bank-param05')]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">{!! Form::label('param06', __('messages.siaf_bank-param06'), ['class' => 'control-label']) !!}</label>
                                <div class="input-icon right">
                                    <i class="fa fa-info-circle tooltips" data-original-title="{!! __('messages.siaf_bank-param06') !!}" data-container="body"></i>
                                    {!! Form::text('param06', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_bank-param06')]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">{!! Form::label('param07', __('messages.siaf_bank-param07'), ['class' => 'control-label']) !!}</label>
                                <div class="input-icon right">
                                    <i class="fa fa-info-circle tooltips" data-original-title="{!! __('messages.siaf_bank-param07') !!}" data-container="body"></i>
                                    {!! Form::text('param07', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_bank-param07')]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">{!! Form::label('param08', __('messages.siaf_bank-param08'), ['class' => 'control-label']) !!}</label>
                                <div class="input-icon right">
                                    <i class="fa fa-info-circle tooltips" data-original-title="{!! __('messages.siaf_bank-param08') !!}" data-container="body"></i>
                                    {!! Form::text('param08', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_bank-param08')]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">{!! Form::label('param09', __('messages.siaf_bank-param09'), ['class' => 'control-label']) !!}</label>
                                <div class="input-icon right">
                                    <i class="fa fa-info-circle tooltips" data-original-title="{!! __('messages.siaf_bank-param09') !!}" data-container="body"></i>
                                    {!! Form::text('param09', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_bank-param09')]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">{!! Form::label('param10', __('messages.siaf_bank-param10'), ['class' => 'control-label']) !!}</label>
                                <div class="input-icon right">
                                    <i class="fa fa-info-circle tooltips" data-original-title="{!! __('messages.siaf_bank-param10') !!}" data-container="body"></i>
                                    {!! Form::text('param10', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_bank-param10')]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">{!! Form::label('param11', __('messages.siaf_bank-param11'), ['class' => 'control-label']) !!}</label>
                                <div class="input-icon right">
                                    <i class="fa fa-info-circle tooltips" data-original-title="{!! __('messages.siaf_bank-param11') !!}" data-container="body"></i>
                                    {!! Form::text('param11', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_bank-param11')]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">{!! Form::label('param12', __('messages.siaf_bank-param12'), ['class' => 'control-label']) !!}</label>
                                <div class="input-icon right">
                                    <i class="fa fa-info-circle tooltips" data-original-title="{!! __('messages.siaf_bank-param12') !!}" data-container="body"></i>
                                    {!! Form::text('param12', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_bank-param12')]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">{!! Form::label('param13', __('messages.siaf_bank-param13'), ['class' => 'control-label']) !!}</label>
                                <div class="input-icon right">
                                    <i class="fa fa-info-circle tooltips" data-original-title="{!! __('messages.siaf_bank-param13') !!}" data-container="body"></i>
                                    {!! Form::text('param13', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_bank-param13')]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">{!! Form::label('param14', __('messages.siaf_bank-param14'), ['class' => 'control-label']) !!}</label>
                                <div class="input-icon right">
                                    <i class="fa fa-info-circle tooltips" data-original-title="{!! __('messages.siaf_bank-param14') !!}" data-container="body"></i>
                                    {!! Form::text('param14', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_bank-param14')]) !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">{!! Form::label('param015', __('messages.siaf_bank-param15'), ['class' => 'control-label']) !!}</label>
                                <div class="input-icon right">
                                    <i class="fa fa-info-circle tooltips" data-original-title="{!! __('messages.siaf_bank-param15') !!}" data-container="body"></i>
                                    {!! Form::text('param15', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_bank-param15')]) !!}
                                </div>
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
