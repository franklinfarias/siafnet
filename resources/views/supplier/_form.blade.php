
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
                <div class="row">
                    <div class="col-md-12">
                        @if (Auth::user()->id_client == 1)
                            <div class="form-group">
                                {!! Form::label('id_client', __('messages.siaf_supplier-id_client'), ['class' => 'control-label']) !!}
                                {!! Form::select('id_client', $clients, null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_supplier-id_client')]) !!}
                            </div>
                        @else
                            {!! Form::hidden('id_client') !!}
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                                {!! Form::text('short_name', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_supplier-short_name')]) !!}
                                {!! Form::label('short_name', __('messages.siaf_supplier-short_name')) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_supplier-name')]) !!}
                            {!! Form::label('name', __('messages.siaf_supplier-name')) !!}
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            {!! Form::label('cpf_cnpj', __('messages.siaf_supplier-cpf_cnpj'), ['class' => 'control-label']) !!}
                            {!! Form::text('cpf_cnpj', null, ['class' => 'form-control', 'placeholder' => '00.000.000/0000-00', 'id' => 'mask_cnpj']) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::email('mail', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_supplier-mail')]) !!}
                            {!! Form::label('mail', __('messages.siaf_supplier-mail')) !!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::text('phones', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_supplier-phones'), 'id' => 'mask_phone']) !!}
                            {!! Form::label('phones', __('messages.siaf_supplier-phones')) !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::select('ind_st_supplier', $indStSupplier, null, ['class' => 'form-control']) !!}
                            {!! Form::label('ind_st_supplier', __('messages.siaf_supplier-ind_st_supplier'), ['class' => 'control-label']) !!}
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
