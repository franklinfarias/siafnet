
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
            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:confirmDelete('{{url('profielRule/delete/'.$profileRule->id_profile.'/'.$profileRule->id_rule)}}','{{csrf_token()}}');">
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
        {!! Form::model($profileRule, ['id' => 'frmDados', 'role'=> 'form', 'url' => 'profileRule/store', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-body">
                <div class="form-group form-md-line-input has-success">
                    {!! Form::label('id_profile', __('messages.siaf_profilerule-id_profile')) !!}
                    {!! Form::select('id_profile', $profiles, null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_profilerule-id_profile')]) !!}
                </div>
                <div class="form-group form-md-line-input has-success">
                    {!! Form::label('id_rule', __('messages.siaf_profilerule-id_rule')) !!}
                    {!! Form::select('id_rule', $rules, null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_profilerule-id_rule')]) !!}
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
