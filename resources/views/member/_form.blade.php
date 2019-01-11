
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
            <a class="btn btn-circle btn-icon-only btn-default" href="javascript:confirmDelete('{{route('member.delete',[$member->id_member])}}','{{csrf_token()}}');">
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
        {!! Form::model($member, ['id' => 'frmDados', 'role'=> 'form', 'url' => 'member/store', 'enctype' => 'multipart/form-data']) !!}
        {!! Form::hidden('id_member') !!}
        <div class="form-body">
            @if (Auth::user()->id_client == 1)
                <div class="form-group">
                    <label class="control-label">{!! Form::label('id_client', __('messages.siaf_customer-id_client'), ['class' => 'control-label']) !!}</label>
                    {!! Form::select('id_client', $clients, null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_user-id_client')]) !!}
                </div>
            @else
                {!! Form::hidden('id_client') !!}
            @endif

            @if (!$member->id_customer)
                <div class="form-group">
                    <label class="control-label">{!! Form::label('id_customer', __('messages.siaf_member-id_customer'), ['class' => 'control-label']) !!}</label>
                    {!! Form::select('id_customer', $customers, null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_member-id_customer')]) !!}
                </div>
            @else
                <div class="form-group">
                    <label class="control-label">{!! Form::label('id_customer', __('messages.siaf_member-id_customer'), ['class' => 'control-label']) !!}</label>
                    <div class="input-icon right">
                        <i class="fa fa-info-circle tooltips" data-original-title="{!! __('messages.siaf_member-id_customer') !!}" data-container="body"></i>
                        <input type="text" class="form-control" placeholder="{!! __('messages.siaf_member-id_customer') !!}" readonly="true" value="{!! $member->customer->full_name !!}">
                        {!! Form::hidden('id_customer') !!}
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="control-label">{!! Form::label('code_registry', __('messages.siaf_member-code_registry'), ['class' => 'control-label']) !!}</label>
                        <div class="input-icon right">
                            <i class="fa fa-info-circle tooltips" data-original-title="{!! __('messages.siaf_member-code_registry') !!}" data-container="body"></i>
                            <input type="text" class="form-control" placeholder="{!! __('messages.siaf_member-id_customer') !!}" readonly="true" value="{!! formatCodeRegistry($member->code_registry) !!}">
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="control-label">{!! Form::label('dt_initial', __('messages.siaf_member-dt_initial'), ['class' => 'control-label']) !!}</label>
                        <div class="input-icon right">
                            <i class="fa fa-info-circle tooltips" data-original-title="{!! __('messages.siaf_member-dt_initial') !!}" data-container="body"></i>
                            {!! Form::date('dt_initial', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_member-dt_initial')]) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="control-label">{!! Form::label('dt_finish', __('messages.siaf_member-dt_finish'), ['class' => 'control-label']) !!}</label>
                        <div class="input-icon right">
                            <i class="fa fa-info-circle tooltips" data-original-title="{!! __('messages.siaf_member-dt_finish') !!}" data-container="body"></i>
                            {!! Form::date('dt_finish', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_member-dt_finish')]) !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label">{!! Form::label('ind_tp_member', __('messages.siaf_member-ind_tp_member'), ['class' => 'control-label']) !!}</label>
                        {!! Form::select('ind_tp_member', $indTpMember, null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_member-ind_tp_member')]) !!}
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label class="control-label">{!! Form::label('ind_st_member', __('messages.siaf_member-ind_st_member'), ['class' => 'control-label']) !!}</label>
                        {!! Form::select('ind_st_member', $indStMember, null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_member-ind_st_member')]) !!}
                    </div>
                </div>

            </div>

            <div class="form-group">
                <label class="control-label">{!! Form::label('observation', __('messages.siaf_member-observation'), ['class' => 'control-label']) !!}</label>
                <div class="input-icon right">
                    <i class="fa fa-info-circle tooltips" data-original-title="{!! __('messages.siaf_member-observation') !!}" data-container="body"></i>
                    {!! Form::textarea('observation', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_member-observation')]) !!}
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
