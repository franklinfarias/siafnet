
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
            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:confirmDelete('{{url('rule/delete/'.$rule->id_rule)}}','{{csrf_token()}}');">
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
        {!! Form::model($rule, ['id' => 'frmDados', 'role'=> 'form', 'url' => 'rule/store', 'enctype' => 'multipart/form-data']) !!}
            {!! Form::hidden('id_rule') !!}
            <div class="form-body">
                <div class="form-group form-md-line-input has-success">
                    <div class="input-group">
                        {!! Form::text('name_rule', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_rule-name_rule')]) !!}
                        {!! Form::label('name_rule', __('messages.siaf_rule-name_rule')) !!}
                        <span class="input-group-addon">
                            <i class="fa fa-edit"></i>
                        </span>
                    </div>
                </div>
                <div class="form-group form-md-line-input has-success">
                    <div class="input-group">
                        {!! Form::text('key', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_rule-key')]) !!}
                        {!! Form::label('key', __('messages.siaf_rule-key')) !!}
                        <span class="input-group-addon">
                            <i class="fa fa-edit"></i>
                        </span>
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
