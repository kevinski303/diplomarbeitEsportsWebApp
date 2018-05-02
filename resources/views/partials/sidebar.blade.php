@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">

             

            <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="title">@lang('quickadmin.qa_dashboard')</span>
                </a>
            </li>

            
            @can('user_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span class="title">@lang('quickadmin.user-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                
                @can('role_access')
                <li class="{{ $request->segment(2) == 'roles' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.roles.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                @lang('quickadmin.roles.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('user_access')
                <li class="{{ $request->segment(2) == 'users' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.users.index') }}">
                            <i class="fa fa-user"></i>
                            <span class="title">
                                @lang('quickadmin.users.title')
                            </span>
                        </a>
                    </li>
                @endcan
                </ul>
            </li>
            @endcan
            @can('tournament_access')
            <li class="{{ $request->segment(2) == 'tournaments' ? 'active' : '' }}">
                <a href="{{ route('admin.tournaments.index') }}">
                    <i class="fa fa-gears"></i>
                    <span class="title">@lang('quickadmin.tournament.title')</span>
                </a>
            </li>
            @endcan
            
            @can('team_access')
            <li class="{{ $request->segment(2) == 'teams' ? 'active' : '' }}">
                <a href="{{ route('admin.teams.index') }}">
                    <i class="fa fa-group"></i>
                    <span class="title">@lang('quickadmin.team.title')</span>
                </a>
            </li>
            @endcan
            
            @can('game_access')
            <li class="{{ $request->segment(2) == 'games' ? 'active' : '' }}">
                <a href="{{ route('admin.games.index') }}">
                    <i class="fa fa-handshake-o"></i>
                    <span class="title">@lang('quickadmin.game.title')</span>
                </a>
            </li>
            @endcan
            
            @can('mode_access')
            <li class="{{ $request->segment(2) == 'modes' ? 'active' : '' }}">
                <a href="{{ route('admin.modes.index') }}">
                    <i class="fa fa-columns"></i>
                    <span class="title">@lang('quickadmin.mode.title')</span>
                </a>
            </li>
            @endcan
            
            @can('playoff_access')
            <li class="{{ $request->segment(2) == 'playoffs' ? 'active' : '' }}">
                <a href="{{ route('admin.playoffs.index') }}">
                    <i class="fa fa-sitemap"></i>
                    <span class="title">@lang('quickadmin.playoff.title')</span>
                </a>
            </li>
            @endcan
            

            

            



            <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                <a href="{{ route('auth.change_password') }}">
                    <i class="fa fa-key"></i>
                    <span class="title">@lang('quickadmin.qa_change_password')</span>
                </a>
            </li>

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('quickadmin.qa_logout')</span>
                </a>
            </li>
        </ul>
    </section>
</aside>

