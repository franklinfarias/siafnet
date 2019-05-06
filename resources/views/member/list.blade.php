@extends('layouts.app')
@section('subtitle',__('messages.siaf_member-model-subtitle-list'))
@section('content')

<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="{{asset('assets/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/pages/css/search.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE HEAD-->
<div class="page-head">
    <div class="container">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>@lang('messages.siaf_member-model-name')
                <small>@lang('messages.siaf_member-model-subtitle-list')</small>
            </h1>
        </div>
        <!-- END PAGE TITLE -->
        <!-- BEGIN PAGE TOOLBAR -->
        <div class="page-toolbar">
            <div class="btn-group btn-theme-panel">
                <!-- BEGIN PAGE BREADCRUMBS -->
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <a href="{{route('accountPlan.list')}}">@lang('messages.siaf_member-breadcrumb')</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>@lang('messages.siaf_member-breadcrumb-list')</span>
                    </li>
                </ul>
                <!-- END PAGE BREADCRUMBS -->
            </div>
        </div>
    </div>
</div>
<!-- END PAGE HEAD-->

<!-- BEGIN PAGE CONTENT BODY -->
<div class="page-content">
    <div class="container">
        <!-- BEGIN PAGE CONTENT INNER -->
        <div class="page-content-inner">
            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light">
                        <div class="portlet-filters">
                            <div class="form-group">
                                <label class="control-label">{!! Form::label('id_customer', __('messages.siaf_member-id_customer'), ['class' => 'control-label']) !!}</label>
                                <div class="input-icon right">
                                    {!! Form::select('id_customer', $customer, null, ['class' => 'form-control', 'id' => 'search_customer']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="portlet-title">
                            <div class="caption font-dark">
                                <a href="{{route('member.create')}}">
                                    <i class="icon-plus font-dark popovers" data-container="body" data-trigger="hover"
                                       data-placement="top" data-original-title="@lang('messages.new')"
                                       data-content="@lang('messages.click-here-to-new')"></i>
                                </a>
                                <span class="caption-subject bold">@lang('messages.new')</span>
                            </div>
                            <div class="tools">
                            </div>
                        </div>
                        <div class="portlet-body">
                                <table class="table table-striped table-bordered table-hover" id="sample_1">
                                    <thead>
                                    <tr>
                                        <th class="all">@lang('messages.siaf_member-code_registry')</th>
                                        <th class="all">@lang('messages.siaf_member-dt_initial')</th>
                                        <th class="all">@lang('messages.siaf_member-dt_finish')</th>
                                        <th class="all">@lang('messages.siaf_member-ind_tp_member')</th>
                                        <th class="min-tablet">@lang('messages.actions')</th>
                                        @if(Auth::user()->id_client == 1)
                                            <th class="none">@lang('messages.siaf_member-id_client')</th>
                                        @endif
                                        <th class="none">@lang('messages.siaf_member-observation')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if (($members))
                                    @foreach ($members as $member)
                                        <tr>
                                            <td>{{formatCodeRegistry($member->code_registry)}}</td>
                                            <td>{{$member->dt_initial}}</td>
                                            <td>{{$member->dt_finish}}</td>
                                            <td>{{$member->indTpMember()}}</td>
                                            <td>
                                                <a href="{{route('member.edit',[$member->id_member])}}" class="edit" data-toggle="tooltip" title="@lang('messages.edit')"><i class="fa fa-pencil"></i></a>
                                                <a href="javascript:confirmDelete('{{route('member.delete',[$member->id_member])}}','{{csrf_token()}}');" class="delete" data-toggle="tooltip" title="@lang('messages.delete')"><i class="fa fa-trash"></i></a>
                                            </td>
                                            @if(Auth::user()->id_client == 1)
                                                <td>{{$member->client->name}}</td>
                                            @endif
                                            <td>{{$member->observation}}</td>

                                        </tr>
                                    @endforeach
                                    @endif
                                    </tbody>
                                </table>

                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{asset('assets/global/scripts/datatable.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/bootbox/bootbox.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/global/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{asset('assets/pages/scripts/'.app()->getLocale().'/table-datatables-responsive.min.js')}}" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#search_customer").select2({
            minimumInputLength: 3,
            tags: [],
            ajax: {
                url: "{{route('member.searchCustomer')}}",
                data: {"full_name":$(this).val()},
                processResults: function(obj) {
                    return {
                        results: $.map(JSON.parse(obj.data), function(item, index) {
                            return {
                                'id': item.id_customer,
                                'text': item.full_name
                            };
                        })
                    };
                }
            }
        });

        $("#search_customer").change(function(){
            window.location = "{{route('member.list',['id'=>''])}}"+ $(this).val();
        });
    });
</script>
<!-- END PAGE LEVEL SCRIPTS -->
@endsection