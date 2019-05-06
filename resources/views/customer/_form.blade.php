<!-- BEGIN PROFILE SIDEBAR -->
<div class="profile-sidebar">
    <!-- PORTLET MAIN -->
    <div class="portlet light profile-sidebar-portlet ">
        <!-- SIDEBAR USERPIC -->
        <div class="profile-userpic">
            <img src="{{empty($customer->photo)?url('assets/img/avatar-blank.png'):route('customer.image', [$customer->id_customer])}}" class="img-responsive" alt=""> </div>
        <!-- END SIDEBAR USERPIC -->
        <!-- SIDEBAR USER TITLE -->
        <div class="profile-usertitle">
            <div class="profile-usertitle-name"> {{empty($customer->full_name)?__('messages.empty'):$customer->full_name}} </div>
            <div class="profile-usertitle-job">  </div>
        </div>
        <!-- END SIDEBAR USER TITLE -->
        <!-- SIDEBAR BUTTONS -->
        <div class="profile-userbuttons">
            <button type="button" class="btn btn-circle green btn-sm">@lang('messages.follow')</button>
            <button type="button" class="btn btn-circle red btn-sm">@lang('messages.message')</button>
        </div>
        <!-- END SIDEBAR BUTTONS -->
        <!-- SIDEBAR MENU -->
        <div class="profile-usermenu">
            <ul class="nav">
                <li>
                    <a href="#">
                        <i class="icon-home"></i> @lang('messages.overview') </a>
                </li>
                <li class="active">
                    <a href="#">
                        <i class="icon-settings"></i> @lang('messages.account-settings') </a>
                </li>
                <li>
                    <a href="#">
                        <i class="icon-info"></i> @lang('messages.help') </a>
                </li>
            </ul>
        </div>
        <!-- END MENU -->
    </div>
    <!-- END PORTLET MAIN -->
    <!-- PORTLET MAIN -->
    <div class="portlet light ">
        <!-- STAT -->
        <div class="row list-separated profile-stat">
            <div class="col-md-4 col-sm-4 col-xs-6">
                <div class="uppercase profile-stat-title"> 0 </div>
                <div class="uppercase profile-stat-text"> @lang('messages.notify-notifications') </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-6">
                <div class="uppercase profile-stat-title"> 0 </div>
                <div class="uppercase profile-stat-text"> @lang('messages.notify-messages') </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-6">
                <div class="uppercase profile-stat-title"> 0 </div>
                <div class="uppercase profile-stat-text"> @lang('messages.notify-notifys') </div>
            </div>
        </div>
        <!-- END STAT -->
        <div>
            <h4 class="profile-desc-title">@lang('messages.about') {{empty($customer->name)?__('messages.empty'):$customer->name}}</h4>
            <span class="profile-desc-text"> @lang('messages.about-me') </span>
            <div class="margin-top-20 profile-desc-link">
                <i class="fa fa-globe"></i>
                <a href="http://siafnet.{{ empty($customer->client)?__('messages.empty'):$customer->client->url }}">siafnet.{{ empty($customer->client)?__('messages.empty'):$customer->client->url }} </a>
            </div>
            <div class="margin-top-20 profile-desc-link">
                <i class="fa fa-twitter"></i>
                <a href="http://www.twitter.com/fksapiens/">@fksapiens</a>
            </div>
            <div class="margin-top-20 profile-desc-link">
                <i class="fa fa-youtube"></i>
                <a href="http://www.youtube.com/fksapiens.informatica/">fksapiens</a>
            </div>
        </div>
    </div>
    <!-- END PORTLET MAIN -->
</div>
<!-- END BEGIN PROFILE SIDEBAR -->
<!-- BEGIN PROFILE CONTENT -->
<div class="profile-content">
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light ">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="portlet-title tabbable-line">
                    <div class="caption caption-md">
                        <i class="icon-globe theme-font hide"></i>
                        <span class="caption-subject font-blue-madison bold uppercase">@lang('messages.profile-account')</span>
                    </div>
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#tab_1_1" data-toggle="tab">@lang('messages.personal-info')</a>
                        </li>
                        <li class="">
                            <a href="#tab_1_2" data-toggle="tab">@lang('messages.change-password')</a>
                        </li>
                        <li class="">
                            <a href="#tab_1_3" data-toggle="tab">@lang('messages.change-avatar')</a>
                        </li>
                    </ul>
                </div>
                {!! Form::model($customer, ['id'=> 'myForm', 'url' => 'customer/store', 'enctype' => 'multipart/form-data', 'role' => 'form']) !!}
                <div class="portlet-body form">
                    <div class="tab-content">
                        <!-- PERSONAL INFO TAB -->
                        <div class="tab-pane active" id="tab_1_1">
                            {!! Form::hidden('id_customer') !!}
                            @if (Auth::user()->id_client == 1)
                                <div class="form-group">
                                    <label class="control-label">{!! Form::label('id_client', __('messages.siaf_customer-id_client'), ['class' => 'control-label']) !!}</label>
                                    {!! Form::select('id_client', $clients, null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_user-id_client')]) !!}
                                </div>
                            @endif

                            <div class="form-group">
                                <label class="control-label">{!! Form::label('full_name', __('messages.siaf_customer-full_name'), ['class' => 'control-label']) !!}</label>
                                <div class="input-icon right">
                                    <i class="fa fa-info-circle tooltips" data-original-title="{!! __('messages.siaf_customer-full_name') !!}" data-container="body"></i>
                                    {!! Form::text('full_name', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_customer-full_name')]) !!}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">{!! Form::label('zip_code', __('messages.siaf_customer-zip_code'), ['class' => 'control-label']) !!}</label>
                                        <div class="input-icon right">
                                            <i class="fa fa-info-circle tooltips" data-original-title="{!! __('messages.siaf_customer-zip_code') !!}" data-container="body"></i>
                                            {!! Form::text('zip_code', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_customer-zip_code'), 'id' => 'mask_cep']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label class="control-label">{!! Form::label('address', __('messages.siaf_customer-address'), ['class' => 'control-label']) !!}</label>
                                        <div class="input-icon right">
                                            <i class="fa fa-info-circle tooltips" data-original-title="{!! __('messages.siaf_customer-address') !!}" data-container="body"></i>
                                            {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_customer-address'),'id' => 'endereco']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label class="control-label">{!! Form::label('city', __('messages.siaf_customer-city'), ['class' => 'control-label']) !!}</label>
                                        <div class="input-icon right">
                                            <i class="fa fa-info-circle tooltips" data-original-title="{!! __('messages.siaf_customer-city') !!}" data-container="body"></i>
                                            {!! Form::text('city', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_customer-city'),'id' => 'cidade','readonly' => '']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">{!! Form::label('district', __('messages.siaf_customer-district'), ['class' => 'control-label']) !!}</label>
                                        <div class="input-icon right">
                                            <i class="fa fa-info-circle tooltips" data-original-title="{!! __('messages.siaf_customer-district') !!}" data-container="body"></i>
                                            {!! Form::text('district', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_customer-district'),'id' => 'uf','readonly' => '']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="control-label">{!! Form::label('phones', __('messages.siaf_customer-phones'), ['class' => 'control-label']) !!}</label>
                                        <div class="input-icon right">
                                            <i class="fa fa-info-circle tooltips" data-original-title="{!! __('messages.siaf_customer-phones') !!}" data-container="body"></i>
                                            {!! Form::text('phones', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_customer-phones'), 'id' => 'mask_phones']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">{!! Form::label('dt_birthday', __('messages.siaf_customer-dt_birthday'), ['class' => 'control-label']) !!}</label>
                                        <div class="input-icon right">
                                            <i class="fa fa-info-circle tooltips" data-original-title="{!! __('messages.siaf_customer-dt_birthday') !!}" data-container="body"></i>
                                            {!! Form::date('dt_birthday', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_customer-dt_birthday')]) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">{!! Form::label('mail', __('messages.siaf_customer-mail'), ['class' => 'control-label']) !!}</label>
                                        <div class="input-icon right">
                                            <i class="fa fa-info-circle tooltips" data-original-title="{!! __('messages.siaf_customer-mail') !!}" data-container="body"></i>
                                            {!! Form::text('mail', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_customer-mail')]) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">{!! Form::label('url_site', __('messages.siaf_customer-url_site'), ['class' => 'control-label']) !!}</label>
                                        <div class="input-icon right">
                                            <i class="fa fa-info-circle tooltips" data-original-title="{!! __('messages.siaf_customer-url_site') !!}" data-container="body"></i>
                                            {!! Form::text('url_site', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_customer-url_site')]) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">{!! Form::label('ind_tp_customer', __('messages.siaf_customer-ind_tp_customer'), ['class' => 'control-label']) !!}</label>
                                        {!! Form::select('ind_tp_customer', $indTpCustomer, null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_user-ind_tp_customer'), 'id' => 'indTpCustomer']) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">{!! Form::label('cpf_cnpj', __('messages.siaf_customer-cpf_cnpj'), ['class' => 'control-label']) !!}</label>
                                        <div class="input-icon right">
                                            <i class="fa fa-info-circle tooltips" data-original-title="{!! __('messages.siaf_customer-cpf_cnpj') !!}" data-container="body"></i>
                                            {!! Form::text('cpf_cnpj', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_customer-cpf_cnpj'), 'id' => 'mask_cpf']) !!}
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">{!! Form::label('rg_ie', __('messages.siaf_customer-rg_ie'), ['class' => 'control-label']) !!}</label>
                                        <div class="input-icon right">
                                            <i class="fa fa-info-circle tooltips" data-original-title="{!! __('messages.siaf_customer-rg_ie') !!}" data-container="body"></i>
                                            {!! Form::text('rg_ie', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_customer-rg_ie')]) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">{!! Form::label('ind_education', __('messages.siaf_customer-ind_education'), ['class' => 'control-label']) !!}</label>
                                        {!! Form::select('ind_education', $indEducation, null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_user-ind_education')]) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">{!! Form::label('ind_gender', __('messages.siaf_customer-ind_gender'), ['class' => 'control-label']) !!}</label>
                                        {!! Form::select('ind_gender', $indGender, null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_user-ind_gender')]) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">{!! Form::label('ind_marital_status', __('messages.siaf_customer-ind_marital_status'), ['class' => 'control-label']) !!}</label>
                                        {!! Form::select('ind_marital_status', $indMaritalStatus, null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_user-ind_marital_status')]) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">{!! Form::label('ind_occupation', __('messages.siaf_customer-ind_occupation'), ['class' => 'control-label']) !!}</label>
                                        {!! Form::select('ind_occupation', $indOccupation, null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_user-ind_occupation')]) !!}
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">{!! Form::label('ind_st_customer', __('messages.siaf_customer-ind_st_customer'), ['class' => 'control-label']) !!}</label>
                                        {!! Form::select('ind_st_customer', $indStCustomer, null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_user-ind_st_customer')]) !!}
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- PASSWORD TAB -->
                        <div class="tab-pane" id="tab_1_2">
                            <div class="form-group">
                                <label class="control-label">{!! Form::label('login', __('messages.siaf_customer-login'), ['class' => 'control-label']) !!}</label>
                                <div class="input-icon right">
                                    <i class="fa fa-info-circle tooltips" data-original-title="{!! __('messages.siaf_customer-login') !!}" data-container="body"></i>
                                    {!! Form::text('login', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_customer-login')]) !!}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">{!! Form::label('password', __('messages.siaf_customer-password'), ['class' => 'control-label']) !!}</label>
                                        <div class="input-icon right">
                                            <i class="fa fa-info-circle tooltips" data-original-title="{!! __('messages.siaf_customer-password') !!}" data-container="body"></i>
                                            {!! Form::password('password', ['class' => 'form-control', 'placeholder' => __('messages.siaf_customer-password')]) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">{!! Form::label('password_confirmation', __('messages.siaf_customer-password_confirmation'), ['class' => 'control-label']) !!}</label>
                                        <div class="input-icon right">
                                            <i class="fa fa-info-circle tooltips" data-original-title="{!! __('messages.siaf_customer-password_confirmation') !!}" data-container="body"></i>
                                            {!! Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => __('messages.siaf_customer-password_confirmation')]) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- CHANGE AVATAR TAB -->
                        <div class="tab-pane" id="tab_1_3">
                            <div class="form-group form-md-line-input has-success">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                        <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                                    <div>
                                        <span class="btn default btn-file">
                                            <span class="fileinput-new"> @lang('messages.select-image') </span>
                                            <span class="fileinput-exists"> @lang('messages.change') </span>
                                            <!--input type="file" name="..."-->
                                            {!! Form::file('photo') !!}
                                        </span>
                                        <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> @lang('messages.remove') </a>
                                    </div>
                                </div>
                                <div class="clearfix margin-top-10">
                                    <span class="label label-danger">@lang('messages.note!')</span>
                                    <span>@lang('messages.supported-browser')</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="margiv-top-10">
                    <button type="submit" class="btn green">@lang('messages.submit')</button>
                    <button type="button" class="btn default">@lang('messages.cancel')</button>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

<!-- Change IndTpCustomer -->
<script type="text/javascript" >

    $(document).ready(function() {
        $("#indTpCustomer").change(function() {
            var indTpCustomer = $(this).val().replace(/\D/g, '');
            if (indTpCustomer == '1'){
                document.getElementById('mask_cnpj').setAttribute('id', 'mask_cpf');
                $('#mask_cpf').val('');
            } else {
                document.getElementById('mask_cpf').setAttribute('id', 'mask_cnpj');
                $('#mask_cnpj').val('');
            }
        });
    });

</script>

<!-- END PROFILE CONTENT -->