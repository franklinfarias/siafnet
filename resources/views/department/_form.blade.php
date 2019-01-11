
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
            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:confirmDelete('{{route('department.delete',[$department->id_department])}}','{{csrf_token()}}');">
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
        {!! Form::model($department, ['id' => 'frmDados', 'role'=> 'form', 'url' => 'department/store', 'enctype' => 'multipart/form-data']) !!}
            {!! Form::hidden('id_department') !!}
            <div class="form-body">
                    @if (Auth::user()->id_client == 1)
                        <div class="form-group form-md-line-input has-success">
                            <div class="input-group">
                                {!! Form::select('id_client', $clients, null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_department-id_client')]) !!}
                                {!! Form::label('id_client', __('messages.siaf_department-id_client'), ['class' => 'control-label']) !!}
                            </div>
                        </div>
                    @else
                        {!! Form::hidden('id_client') !!}
                    @endif
                    <div class="form-group form-md-line-input has-success">
                        <div class="input-group">
                            {!! Form::text('short_name', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_department-short_name')]) !!}
                            {!! Form::label('short_name', __('messages.siaf_department-short_name')) !!}
                            <span class="input-group-addon">
                                <i class="fa fa-edit"></i>
                            </span>
                        </div>
                    </div>
                    <div class="form-group form-md-line-input has-success">
                        <div class="input-group">
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_department-name')]) !!}
                            {!! Form::label('name', __('messages.siaf_department-name')) !!}
                            <span class="input-group-addon">
                                <i class="fa fa-edit"></i>
                            </span>
                        </div>
                    </div>
                    <div class="form-group form-md-line-input has-success">
                        <div class="input-group">
                            {!! Form::email('mail', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_department-mail')]) !!}
                            {!! Form::label('mail', __('messages.siaf_department-mail')) !!}
                            <span class="input-group-addon">
                                <i class="fa fa-envelope"></i>
                            </span>
                        </div>
                    </div>
                    <div class="form-group form-md-line-input has-success">
                        <div class="input-group">
                            {!! Form::password('pwd_mail', ['class' => 'form-control', 'placeholder' => __('messages.siaf_department-pwd_mail')]) !!}
                            {!! Form::label('pwd_mail', __('messages.siaf_department-pwd_mail')) !!}
                            <span class="input-group-addon">
                                <i class="fa fa-envelope"></i>
                            </span>
                        </div>
                    </div>
                    <div class="form-group form-md-line-input has-success">
                        <div class="input-group">
                            {!! Form::text('phones', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_department-phones'), 'id' => 'mask_phone']) !!}
                            {!! Form::label('phones', __('messages.siaf_department-phones')) !!}
                            <span class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </span>
                        </div>
                    </div>
                    <div class="form-group form-md-line-input has-success">
                        <div class="input-group">
                            {!! Form::select('ind_tp_department', $indTpDepartment, null, ['class' => 'form-control']) !!}
                            {!! Form::label('ind_tp_department', __('messages.siaf_department-ind_tp_department'), ['class' => 'control-label']) !!}
                            <span class="input-group-addon">
                                <i class="fa fa-lock"></i>
                            </span>
                        </div>
                    </div>
                    <div class="form-group form-md-line-input has-success">
                        <div class="input-group">
                            {!! Form::select('ind_st_department', $indStDepartment, null, ['class' => 'form-control']) !!}
                            {!! Form::label('ind_st_department', __('messages.siaf_department-ind_st_department'), ['class' => 'control-label']) !!}
                            <span class="input-group-addon">
                                <i class="fa fa-lock"></i>
                            </span>
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
