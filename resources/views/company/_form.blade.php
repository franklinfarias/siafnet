
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
        {!! Form::model($company, ['id' => 'frmDados', 'role'=> 'form', 'url' => 'company/store', 'enctype' => 'multipart/form-data']) !!}
            {!! Form::hidden('id_client') !!}
            <div class="form-body">
                <div class="col-md-5">

                    <div class="form-group form-md-line-input has-success">
                        <div class="input-group">
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('messages.fks_client-name')]) !!}
                            {!! Form::label('name', __('messages.fks_client-name')) !!}
                            <span class="input-group-addon">
                                <i class="fa fa-edit"></i>
                            </span>
                        </div>
                    </div>
                    <div class="form-group form-md-line-input has-success">
                        <div class="input-group">
                            {!! Form::label('cpf_cnpj', __('messages.fks_client-cpf_cnpj'), ['class' => 'control-label']) !!}
                            {!! Form::text('cpf_cnpj', null, ['class' => 'form-control', 'placeholder' => '00.000.000/0000-00', 'id' => 'mask_cnpj']) !!}
                            <span class="input-group-addon">
                                <i class="fa fa-edit"></i>
                            </span>
                        </div>
                    </div>
                    <div class="form-group form-md-line-input has-success">
                        <div class="input-group">
                            {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => __('messages.fks_client-address')]) !!}
                            {!! Form::label('address', __('messages.fks_client-address')) !!}
                            <span class="input-group-addon">
                                <i class="fa fa-edit"></i>
                            </span>
                        </div>
                    </div>
                    <div class="form-group form-md-line-input has-success">
                        <div class="input-group">
                            {!! Form::text('city', null, ['class' => 'form-control', 'placeholder' => __('messages.fks_client-city')]) !!}
                            {!! Form::label('city', __('messages.fks_client-city')) !!}
                            <span class="input-group-addon">
                                <i class="fa fa-edit"></i>
                            </span>
                        </div>
                    </div>
                    <div class="form-group form-md-line-input has-success">
                        <div class="input-group">
                            {!! Form::text('uf', null, ['class' => 'form-control', 'placeholder' => __('messages.fks_client-uf')]) !!}
                            {!! Form::label('uf', __('messages.fks_client-uf')) !!}
                            <span class="input-group-addon">
                                <i class="fa fa-edit"></i>
                            </span>
                        </div>
                    </div>

                </div>
                <div class="col-md-5">

                    <div class="form-group form-md-line-input has-success">
                        <div class="input-group">
                            {!! Form::text('zip_code', null, ['class' => 'form-control', 'placeholder' => '00.000-000', 'id' => 'mask_cep']) !!}
                            {!! Form::label('zip_code', __('messages.fks_client-zip_code')) !!}
                            <span class="input-group-addon">
                                <i class="fa fa-edit"></i>
                            </span>
                        </div>
                    </div>
                    <div class="form-group form-md-line-input has-success">
                        <div class="input-group">
                            {!! Form::text('url', null, ['class' => 'form-control', 'placeholder' => __('messages.fks_client-url')]) !!}
                            {!! Form::label('url', __('messages.fks_client-url')) !!}
                            <span class="input-group-addon">
                                <i class="fa fa-globe"></i>
                            </span>
                        </div>
                    </div>
                    <div class="form-group form-md-line-input has-success">
                        <div class="input-group">
                            {!! Form::email('mail', null, ['class' => 'form-control', 'placeholder' => __('messages.fks_client-mail')]) !!}
                            {!! Form::label('mail', __('messages.fks_client-mail')) !!}
                            <span class="input-group-addon">
                                <i class="fa fa-envelope"></i>
                            </span>
                        </div>
                    </div>
                    <div class="form-group form-md-line-input has-success">
                        <div class="input-group">
                            {!! Form::text('login', null, ['class' => 'form-control', 'placeholder' => __('messages.fks_client-login')]) !!}
                            {!! Form::label('login', __('messages.fks_client-login')) !!}
                            <span class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </span>
                        </div>
                    </div>
                    <div class="form-group form-md-line-input has-success">
                        <div class="input-group">
                            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => __('messages.fks_client-password')]) !!}
                            {!! Form::label('password', __('messages.fks_client-password')) !!}
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
