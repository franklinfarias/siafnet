
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
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('name', __('messages.fks_client-name'), ['class' => 'control-label']) !!}
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('messages.fks_client-name')]) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('cpf_cnpj', __('messages.fks_client-cpf_cnpj'), ['class' => 'control-label']) !!}
                            {!! Form::text('cpf_cnpj', null, ['class' => 'form-control', 'placeholder' => '00.000.000/0000-00', 'id' => 'mask_cnpj']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            {!! Form::label('zip_code', __('messages.fks_client-zip_code'), ['class' => 'control-label']) !!}
                            {!! Form::text('zip_code', null, ['class' => 'form-control', 'placeholder' => '00.000-000', 'id' => 'mask_cep']) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('address', __('messages.fks_client-address'), ['class' => 'control-label']) !!}
                            {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => __('messages.fks_client-address'), 'id' => 'endereco']) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::label('city', __('messages.fks_client-city'), ['class' => 'control-label']) !!}
                            {!! Form::text('city', null, ['class' => 'form-control', 'placeholder' => __('messages.fks_client-city'), 'id' => 'cidade', 'readonly' => '']) !!}
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group">
                            {!! Form::label('uf', __('messages.fks_client-uf'), ['class' => 'control-label']) !!}
                            {!! Form::text('uf', null, ['class' => 'form-control', 'placeholder' => __('messages.fks_client-uf'), 'id' => 'uf','readonly' => '']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('url', __('messages.fks_client-url'), ['class' => 'control-label']) !!}
                            {!! Form::text('url', null, ['class' => 'form-control', 'placeholder' => __('messages.fks_client-url')]) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('mail', __('messages.fks_client-mail'), ['class' => 'control-label']) !!}
                            {!! Form::email('mail', null, ['class' => 'form-control', 'placeholder' => __('messages.fks_client-mail')]) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::label('login', __('messages.fks_client-login'), ['class' => 'control-label']) !!}
                            {!! Form::text('login', null, ['class' => 'form-control', 'placeholder' => __('messages.fks_client-login')]) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::label('password', __('messages.fks_client-password'), ['class' => 'control-label']) !!}
                            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => __('messages.fks_client-password')]) !!}
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
