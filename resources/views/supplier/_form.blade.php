
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
            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:confirmDelete('{{route('supplier.delete',[$supplier->id_supplier])}}','{{csrf_token()}}');">
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
        {!! Form::model($supplier, ['id' => 'frmDados', 'role'=> 'form', 'url' => 'supplier/store', 'enctype' => 'multipart/form-data']) !!}
            {!! Form::hidden('id_supplier') !!}
            <div class="form-body">
                    @if (Auth::user()->id_client == 1)
                        <div class="form-group form-md-line-input has-success">
                            <div class="input-group">
                                {!! Form::select('id_client', $clients, null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_supplier-id_client')]) !!}
                                {!! Form::label('id_client', __('messages.siaf_supplier-id_client'), ['class' => 'control-label']) !!}
                            </div>
                        </div>
                    @else
                        {!! Form::hidden('id_client') !!}
                    @endif
                    <div class="form-group form-md-line-input has-success">
                        <div class="input-group">
                            {!! Form::text('short_name', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_supplier-short_name')]) !!}
                            {!! Form::label('short_name', __('messages.siaf_supplier-short_name')) !!}
                            <span class="input-group-addon">
                                <i class="fa fa-edit"></i>
                            </span>
                        </div>
                    </div>
                    <div class="form-group form-md-line-input has-success">
                        <div class="input-group">
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_supplier-name')]) !!}
                            {!! Form::label('name', __('messages.siaf_supplier-name')) !!}
                            <span class="input-group-addon">
                                <i class="fa fa-edit"></i>
                            </span>
                        </div>
                    </div>
                    <div class="form-group form-md-line-input has-success">
                        <div class="input-group">
                            {!! Form::label('cpf_cnpj', __('messages.siaf_supplier-cpf_cnpj'), ['class' => 'control-label']) !!}
                            {!! Form::text('cpf_cnpj', null, ['class' => 'form-control', 'placeholder' => '00.000.000/0000-00', 'id' => 'mask_cnpj']) !!}
                            <span class="input-group-addon">
                                <i class="fa fa-edit"></i>
                            </span>
                        </div>
                    </div>
                    <div class="form-group form-md-line-input has-success">
                        <div class="input-group">
                            {!! Form::email('mail', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_supplier-mail')]) !!}
                            {!! Form::label('mail', __('messages.siaf_supplier-mail')) !!}
                            <span class="input-group-addon">
                                <i class="fa fa-envelope"></i>
                            </span>
                        </div>
                    </div>
                    <div class="form-group form-md-line-input has-success">
                        <div class="input-group">
                            {!! Form::text('phones', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_supplier-phones'), 'id' => 'mask_phone']) !!}
                            {!! Form::label('phones', __('messages.siaf_supplier-phones')) !!}
                            <span class="input-group-addon">
                                <i class="fa fa-user"></i>
                            </span>
                        </div>
                    </div>
                    <div class="form-group form-md-line-input has-success">
                        <div class="input-group">
                            {!! Form::select('ind_st_supplier', $indStSupplier, null, ['class' => 'form-control']) !!}
                            {!! Form::label('ind_st_supplier', __('messages.siaf_supplier-ind_st_supplier'), ['class' => 'control-label']) !!}
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
