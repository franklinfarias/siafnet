<?php
/**
 * header.blade.php : PHP SIAFNET
 * Website: http://fksapiens.com.br/
 *
 * Copyright (c) 1999 - 2017 Franklin Farias <franklin@fksapiens.com.br>
 * All Rights Reserved.
 *
 * This software is released under the terms of the GNU Lesser General Public License v2.1
 * A copy of which is available from http://www.gnu.org/copyleft/lesser.html
 *
 * Written for PHP 5.4, should work with older PHP 4.x versions.
 *
 * Please submit bug reports, patches, etc to http://wiki.fksapiens.com.br/
 * Thanks. :)
 *
 *
 * @version 1.0
 */

$notifys = \App\Http\Controllers\Controller::getAllNotificationUser();
$messages = \App\Http\Controllers\Controller::getAllMessagesUser();

?>

<div class="page-header">
    <!-- BEGIN HEADER TOP -->
    <div class="page-header-top">
        <div class="container">
            <!-- BEGIN LOGO -->
            <div class="page-logo">
                <a href="/" data-toggle="tooltip" title="@lang('messages.welcome')">
                    <img src={{asset('assets/layouts/layout3/img/logo-default.png')}} alt="logo" class="logo-default">
                </a>
                <small>{{Auth::user()->client->name}}</small>
            </div>
            <!-- END LOGO -->
            <!-- BEGIN RESPONSIVE MENU TOGGLER -->
            <a href="javascript:;" class="menu-toggler"></a>
            <!-- END RESPONSIVE MENU TOGGLER -->
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <!-- BEGIN NOTIFICATION DROPDOWN -->
                    @if ($notifys->count() > 0)
                    <li class="dropdown dropdown-extended dropdown-notification dropdown-dark" id="header_notification_bar">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <i class="icon-bell"></i>
                                <span class="badge badge-default">{{$notifys->count()}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                                    @foreach ($notifys as $notify)
                                        <li>
                                            <a href="javascript:;">
                                                <span class="time">{{ time_elapsed_string($notify->notification_time) }}</span>
                                                <span class="details">
                                                    <span class="label label-sm label-icon label-warning">
                                                       <i class="fa fa-bell-o"></i>
                                                    </span>
                                                    {{  $notify->subject }}
                                                </span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </li>
                    @endif
                    <!-- END NOTIFICATION DROPDOWN -->
                    <li class="droddown dropdown-separator">
                        <span class="separator"></span>
                    </li>
                    <!-- BEGIN INBOX DROPDOWN -->
                    @if ($messages->count() > 0)
                    <li class="dropdown dropdown-extended dropdown-inbox dropdown-dark" id="header_inbox_bar">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <span class="circle">{{$messages->count()}}</span>
                                <span class="corner"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                    @foreach ($messages as $message)
                                        <li>
                                            <a href="#">
                                                <span class="photo">
                                                    <img src="{{url('user/image/' . $message->id_user_origin)}}" class="img-circle" alt="">
                                                </span>
                                                <span class="subject">
                                                    <span class="from"> {{$message->userOrigin->name}} </span>
                                                    <span class="time">{{ time_elapsed_string($notify->notification_time) }}</span>
                                                </span>
                                                <span class="message">{{$message->subject}}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </li>
                    @endif
                    <!-- END INBOX DROPDOWN -->
                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <li class="dropdown dropdown-user dropdown-dark">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <img alt="" class="img-circle" src="{{url('user/image/' . Auth::user()->id_user)}}">
                            <span class="username username-hide-mobile">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-default">
                            <li>
                                <a href="{{route('user.profile')}}">
                                    <i class="icon-user"></i> @lang('messages.my-profile') </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="icon-calendar"></i> @lang('messages.my-calendar') </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="icon-envelope-open"></i> @lang('messages.my-inbox')
                                    <span class="badge badge-danger"> 3 </span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="icon-rocket"></i> @lang('messages.my-tasks')
                                    <span class="badge badge-success"> 7 </span>
                                </a>
                            </li>
                            <li>
                                @if (app()->getLocale() == 'en')
                                    <a href="{{URL::to('locale/br')}}">
                                        <i class="icon-rocket"></i> @lang('messages.language')
                                        <span class="badge flag-icon flag-icon-br"></span>
                                    </a>
                                @else
                                    <a href="{{URL::to('locale/en')}}">
                                        <i class="icon-rocket"></i> @lang('messages.language')
                                        <span class="badge flag-icon flag-icon-us"></span>
                                    </a>
                                @endif
                            </li>
                            <li class="divider"> </li>
                            <li>
                                <a href="#">
                                    <i class="icon-lock"></i> @lang('messages.lock-screen') </a>
                            </li>
                            <li>
                                <a href="{{URL::to('logout')}}">
                                    <i class="icon-key"></i> @lang('messages.logout') </a>
                            </li>
                        </ul>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->
                    <!-- BEGIN QUICK SIDEBAR TOGGLER -->

                    <!-- END QUICK SIDEBAR TOGGLER -->
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
    </div>
    <!-- END HEADER TOP -->
    <!-- BEGIN HEADER MENU -->
    <div class="page-header-menu">
        <div class="container">
            <!-- BEGIN MEGA MENU -->
            <!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a horizontal menu with white background -->
            <!-- DOC: Remove data-hover="dropdown" and data-close-others="true" attributes below to disable the dropdown opening on mouse hover -->
            @include('layouts.menu')
            <!-- END MEGA MENU -->
        </div>
    </div>
    <!-- END HEADER MENU -->
</div>
