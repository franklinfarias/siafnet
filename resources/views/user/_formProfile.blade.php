<!-- BEGIN PROFILE SIDEBAR -->
<div class="profile-sidebar">
    <!-- PORTLET MAIN -->
    <div class="portlet light profile-sidebar-portlet ">
        <!-- SIDEBAR USERPIC -->
        <div class="profile-userpic">
            <img src="{{empty($user->name)?url('assets/img/avatar-blank.png'):route('user.image', [$user->id_user])}}" class="img-responsive" alt=""> </div>
        <!-- END SIDEBAR USERPIC -->
        <!-- SIDEBAR USER TITLE -->
        <div class="profile-usertitle">
            <div class="profile-usertitle-name"> {{empty($user->name)?__('messages.empty'):$user->name}} </div>
            <div class="profile-usertitle-job"> {{empty($user->name)?__('messages.empty'):$user->profile()->first()->name_profile}} </div>
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
                <div class="uppercase profile-stat-title"> {{$user->notifications->only(['ind_tp_notification',1])->count()}} </div>
                <div class="uppercase profile-stat-text"> @lang('messages.notify-notifications') </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-6">
                <div class="uppercase profile-stat-title"> {{$user->notifications->only(['ind_tp_notification',2])->count()}} </div>
                <div class="uppercase profile-stat-text"> @lang('messages.notify-messages') </div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-6">
                <div class="uppercase profile-stat-title"> {{$user->notifications->count()}} </div>
                <div class="uppercase profile-stat-text"> @lang('messages.notify-notifys') </div>
            </div>
        </div>
        <!-- END STAT -->
        <div>
            <h4 class="profile-desc-title">@lang('messages.about') {{empty($user->name)?__('messages.empty'):$user->name}}</h4>
            <span class="profile-desc-text"> @lang('messages.about-me') </span>
            <div class="margin-top-20 profile-desc-link">
                <i class="fa fa-globe"></i>
                <a href="http://siafnet.fksapiens.com.br">siafnet.fksapiens.com.br</a>
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
                <div class="portlet-title tabbable-line">
                    <div class="caption caption-md">
                        <i class="icon-globe theme-font hide"></i>
                        <span class="caption-subject font-blue-madison bold uppercase">@lang('messages.profile-account')</span>
                    </div>
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#tab_1_1" data-toggle="tab">@lang('messages.personal-info')</a>
                        </li>
                    </ul>
                </div>
                <div class="portlet-body form">
                    <div class="tab-content">
                        <!-- PERSONAL INFO TAB -->
                        <div class="tab-pane active" id="tab_1_1">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            {!! Form::model($user, ['id'=> 'myForm', 'url' => 'user/storeProfile', 'enctype' => 'multipart/form-data', 'role' => 'form']) !!}
                            {!! Form::hidden('id_user') !!}
                            <div class="form-group form-md-line-input has-success">
                                {!! Form::label('name', __('messages.siaf_user-name'), ['class' => 'control-label']) !!}
                                {!! Form::text('name', null, ['class' => 'form-control', 'disabled' => '', 'placeholder' => __('messages.siaf_user-name')]) !!}
                            </div>
                            <div class="form-group form-md-line-input has-success">
                                {!! Form::label('login', __('messages.siaf_user-login'), ['class' => 'control-label']) !!}
                                {!! Form::text('login', null, ['class' => 'form-control', 'disabled' => '', 'placeholder' => __('messages.siaf_user-login')]) !!}
                            </div>
                            <div class="form-group form-md-line-input has-success">
                                {!! Form::label('email', __('messages.siaf_user-email'), ['class' => 'control-label']) !!}
                                {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => __('messages.siaf_user-email')]) !!}
                            </div>
                            <div class="form-group form-md-line-input has-success">
                                {!! Form::label('cpf', __('messages.siaf_user-cpf'), ['class' => 'control-label']) !!}
                                {!! Form::text('cpf', null, ['class' => 'form-control', 'placeholder' => '000.000.000-00', 'id' => 'mask_cpf']) !!}
                            </div>

                            <div class="form-group form-md-line-input has-success">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                        <img src="{{asset('assets/img/avatar-blank.png')}}" alt="" />
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
                            <div class="form-group form-md-line-input has-success">
                                {!! Form::label('password', __('messages.siaf_user-password'), ['class' => 'control-label']) !!}
                                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => __('messages.siaf_user-password')]) !!}
                            </div>
                            <div class="margiv-top-10">
                                <a href="javascript:myForm.submit();" class="btn green"> @lang('messages.save') </a>
                                <a href="javascript:;" class="btn default"> @lang('messages.cancel') </a>
                            </div>
                            {!! Form::close() !!}
                        </div>
                        <!-- END PERSONAL INFO TAB -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END PROFILE CONTENT -->