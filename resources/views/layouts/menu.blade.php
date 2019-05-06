<div class="hor-menu  ">
    <ul class="nav navbar-nav">
        <li class="menu-dropdown classic-menu-dropdown active">
            <a href="javascript:;"> @lang('messages.menu-dashboard')
                <span class="arrow"></span>
            </a>
            <ul class="dropdown-menu pull-left">
                <li class=" active">
                    <a href="{{route('home')}}" class="nav-link  active">
                        <i class="icon-bar-chart"></i> @lang('messages.menu-dashboard1')
                        <span class="badge badge-success">1</span>
                    </a>
                </li>
                <li class=" ">
                    <a href="{{route('home')}}" class="nav-link  ">
                        <i class="icon-bulb"></i> @lang('messages.menu-dashboard2') </a>
                </li>
                <li class=" ">
                    <a href="{{route('home')}}" class="nav-link  ">
                        <i class="icon-graph"></i> @lang('messages.menu-dashboard3')
                        <span class="badge badge-danger">3</span>
                    </a>
                </li>
            </ul>
        </li>
        <!-- Register -->
        <li class="menu-dropdown classic-menu-dropdown ">
            <a href="javascript:;"> @lang('messages.menu-register')
                <span class="arrow"></span>
            </a>
            <ul class="dropdown-menu pull-left">
                @can('auth','company/index')
                        <li class=" ">
                            <a href="{{route('company.list')}}" class="nav-link  "> @lang('messages.menu-register-company') </a>
                        </li>
                @endcan
                @can('auth','supplier/index')
                    <li class=" ">
                        <a href="{{route('supplier.list')}}" class="nav-link  "> @lang('messages.menu-register-supplier') </a>
                    </li>
                @endcan
                @can('auth','department/index')
                    <li class=" ">
                        <a href="{{route('department.list')}}" class="nav-link  "> @lang('messages.menu-register-department') </a>
                    </li>
                @endcan
                @can('auth','office/index')
                    <li class=" ">
                        <a href="{{route('office.list')}}" class="nav-link  "> @lang('messages.menu-register-office') </a>
                    </li>
                @endcan
                @can('auth','customer/index')
                    <li class=" ">
                        <a href="{{route('customer.list')}}" class="nav-link  "> @lang('messages.menu-register-customer') </a>
                    </li>
                @endcan
                @can('auth','member/index')
                    <li class=" ">
                        <a href="{{route('member.list')}}" class="nav-link  "> @lang('messages.menu-register-member') </a>
                    </li>
                @endcan
                @can('auth','memberOffice/index')
                    <li class=" ">
                        <a href="{{route('memberOffice.list')}}" class="nav-link  "> @lang('messages.menu-register-member_office') </a>
                    </li>
                @endcan
            </ul>
        </li>
        <!-- Financial -->
        <li class="menu-dropdown classic-menu-dropdown ">
            <a href="javascript:;"> @lang('messages.menu-financial')
                <span class="arrow"></span>
            </a>
            <ul class="dropdown-menu pull-left">
                @can('auth','bank/index')
                    <li class=" ">
                        <a href="{{route('bank.list')}}" class="nav-link  "> @lang('messages.menu-financial-bank') </a>
                    </li>
                @endcan
                @can('auth','accountPlan/index')
                    <li class=" ">
                        <a href="{{route('accountPlan.list')}}" class="nav-link  "> @lang('messages.menu-financial-account_plan') </a>
                    </li>
                @endcan
                @can('auth','budget/index')
                    <li class=" ">
                        <a href="{{route('budget.list')}}" class="nav-link  "> @lang('messages.menu-financial-budget') </a>
                    </li>
                @endcan
                @can('auth','budgetItem/index')
                    <li class=" ">
                        <a href="{{route('budgetItem.list')}}" class="nav-link  "> @lang('messages.menu-financial-budgetItem') </a>
                    </li>
                @endcan
                @can('auth','cashFlow/index')
                    <li class=" ">
                        <a href="{{route('cashFlow.list')}}" class="nav-link  "> @lang('messages.menu-financial-cashFlow') </a>
                    </li>
                @endcan
            </ul>
        </li>
        <!-- Systems -->
        <li class="menu-dropdown classic-menu-dropdown ">
            <a href="javascript:;"> @lang('messages.menu-system')
                <span class="arrow"></span>
            </a>
            <ul class="dropdown-menu pull-left">
                @can('auth','profile/index')
                    <li class=" ">
                        <a href="{{route('profile.list')}}" class="nav-link  "> @lang('messages.menu-profile') </a>
                    </li>
                @endcan
                @can('auth','rule/index')
                    <li class=" ">
                        <a href="{{route('rule.list')}}" class="nav-link  "> @lang('messages.menu-rule') </a>
                    </li>
                @endcan
                @can('auth','profileRule/index')
                    <li class=" ">
                        <a href="{{route('profileRule.list')}}" class="nav-link  "> @lang('messages.menu-profile-rule') </a>
                    </li>
                @endcan
                @can('auth','user/index')
                    <li class=" ">
                        <a href="{{route('user.list')}}" class="nav-link  "> @lang('messages.menu-user') </a>
                    </li>
                @endcan
            </ul>
        </li>

    </ul>
</div>
