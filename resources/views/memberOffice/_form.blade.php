
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
            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:confirmDelete('{{route('memberOffice.delete',[$memberOffice->id_member_office])}}','{{csrf_token()}}');">
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
        {!! Form::model($memberOffice, ['id' => 'frmDados', 'role'=> 'form', 'url' => 'memberOffice/store', 'enctype' => 'multipart/form-data']) !!}
        {!! Form::hidden('id_member_office') !!}
        <div class="form-body">
            <div class="form-group">
                <label class="control-label">{!! Form::label('id_member', __('messages.siaf_member_office-id_member'), ['class' => 'control-label']) !!}</label>
                {!! Form::select('id_member', $members, null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_member_office-id_member')]) !!}
            </div>
            <div class="form-group">
                <label class="control-label">{!! Form::label('id_office', __('messages.siaf_member_office-id_office'), ['class' => 'control-label']) !!}</label>
                {!! Form::select('id_office', $offices, null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_member_office-id_office')]) !!}
            </div>
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="control-label">{!! Form::label('dt_initial', __('messages.siaf_member_office-dt_initial'), ['class' => 'control-label']) !!}</label>
                        <div class="input-icon right">
                            <i class="fa fa-info-circle tooltips" data-original-title="{!! __('messages.siaf_member_office-dt_initial') !!}" data-container="body"></i>
                            {!! Form::date('dt_initial', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_member_office-dt_initial')]) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="control-label">{!! Form::label('dt_finish', __('messages.siaf_member_office-dt_finish'), ['class' => 'control-label']) !!}</label>
                        <div class="input-icon right">
                            <i class="fa fa-info-circle tooltips" data-original-title="{!! __('messages.siaf_member_office-dt_finish') !!}" data-container="body"></i>
                            {!! Form::date('dt_finish', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_member_office-dt_finish')]) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">{!! Form::label('ind_tp_member_office', __('messages.siaf_member_office-ind_tp_member_office'), ['class' => 'control-label']) !!}</label>
                        {!! Form::select('ind_tp_member_office', $indTpMemberOffice, null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_member_office-ind_tp_member_office')]) !!}
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="control-label">{!! Form::label('ind_st_member_office', __('messages.siaf_member_office-ind_st_member_office'), ['class' => 'control-label']) !!}</label>
                        {!! Form::select('ind_st_member_office', $indStMemberOffice, null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_member_office-ind_st_member_office')]) !!}
                    </div>
                </div>

            </div>

            <div class="form-group">
                <label class="control-label">{!! Form::label('observation', __('messages.siaf_member_office-observation'), ['class' => 'control-label']) !!}</label>
                <div class="input-icon right">
                    <i class="fa fa-info-circle tooltips" data-original-title="{!! __('messages.siaf_member_office-observation') !!}" data-container="body"></i>
                    {!! Form::textarea('observation', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_member_office-observation')]) !!}
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
