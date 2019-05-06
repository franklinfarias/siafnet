
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
            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:confirmDelete('{{url('profile/delete/'.$profile->id_profile)}}','{{csrf_token()}}');">
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
        {!! Form::model($profile, ['id' => 'frmDados', 'role'=> 'form', 'url' => 'profile/store', 'enctype' => 'multipart/form-data']) !!}
            {!! Form::hidden('id_profile') !!}
            <div class="form-body">
                <div class="form-group form-md-line-input has-success">
                    <div class="input-group">
                        {!! Form::text('name_profile', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_profile-name_profile')]) !!}
                        {!! Form::label('name_profile', __('messages.siaf_profile-name_profile')) !!}
                        <span class="input-group-addon">
                            <i class="fa fa-edit"></i>
                        </span>
                    </div>
                </div>
                <div class="form-group form-md-line-input has-success">
                    {!! Form::label('ind_tp_profile', __('messages.siaf_profile-ind_tp_profile')) !!}
                    {!! Form::select('ind_tp_profile', $indTpProfile, null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_profile-ind_tp_profile')]) !!}
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
