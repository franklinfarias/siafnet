
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
            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:confirmDelete('{{route('office.delete',[$office->id_office])}}','{{csrf_token()}}');">
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
        {!! Form::model($office, ['id' => 'frmDados', 'role'=> 'form', 'url' => 'office/store', 'enctype' => 'multipart/form-data']) !!}
            {!! Form::hidden('id_office') !!}
            <div class="form-body">
                    @if (Auth::user()->id_client == 1)
                        <div class="form-group form-md-line-input has-success">
                            <div class="input-group">
                                {!! Form::select('id_client', $clients, null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_office-id_client')]) !!}
                                {!! Form::label('id_client', __('messages.siaf_office-id_client'), ['class' => 'control-label']) !!}
                            </div>
                        </div>
                    @else
                        {!! Form::hidden('id_client') !!}
                    @endif
                    <div class="form-group form-md-line-input has-success">
                        <div class="input-group">
                            {!! Form::select('id_department', $departments, null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_office-id_department')]) !!}
                            {!! Form::label('id_department', __('messages.siaf_office-id_department'), ['class' => 'control-label']) !!}
                        </div>
                    </div>
                    <div class="form-group form-md-line-input has-success">
                        <div class="input-group">
                            {!! Form::text('short_name', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_office-short_name')]) !!}
                            {!! Form::label('short_name', __('messages.siaf_office-short_name')) !!}
                            <span class="input-group-addon">
                                <i class="fa fa-edit"></i>
                            </span>
                        </div>
                    </div>
                    <div class="form-group form-md-line-input has-success">
                        <div class="input-group">
                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_office-name')]) !!}
                            {!! Form::label('name', __('messages.siaf_office-name')) !!}
                            <span class="input-group-addon">
                                <i class="fa fa-edit"></i>
                            </span>
                        </div>
                    </div>
                    <div class="form-group form-md-line-input has-success">
                        <div class="input-group">
                            {!! Form::select('ind_tp_office', $indTpOffice, null, ['class' => 'form-control']) !!}
                            {!! Form::label('ind_tp_office', __('messages.siaf_office-ind_tp_office'), ['class' => 'control-label']) !!}
                        </div>
                    </div>
                    <div class="form-group form-md-line-input has-success">
                        <div class="input-group">
                            {!! Form::select('ind_st_office', $indStOffice, null, ['class' => 'form-control']) !!}
                            {!! Form::label('ind_st_office', __('messages.siaf_office-ind_st_office'), ['class' => 'control-label']) !!}
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
