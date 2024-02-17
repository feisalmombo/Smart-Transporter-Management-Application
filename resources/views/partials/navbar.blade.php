<div class="navbar-custom-menu">
<ul class="nav navbar-nav">
    <!-- Messages: style can be found in dropdown.less-->

    <!-- Notifications: style can be found in dropdown.less -->
    <li class="dropdown notifications-menu">

        @if(Auth::user()->hasRole('developer'))
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-bell-o"></i>
            <span class="label label-danger">
              0
            </span>
          </a>
      @endif

        <ul class="dropdown-menu">
            <li class="header">This is the part for notifications menu</li>

            {{-- <li>
                <a href="#">
                <div>
                <i class="fa fa-comment fa-fw"></i>
                <span class="pull-right text-muted small">54</span>
                </div>
                </a>
            </li>
            <li class="divider"></li>

            <li>
                <a href="#">
                    <div>
                    <i class="fa fa-comment fa-fw"></i>yes
                    <span class="pull-right text-muted small">No</span>
                    </div>
                </a>
            </li>
            <li class="divider"></li> --}}

            <li>
                <a class="text-center" href="#">
                <strong>See all notification </strong>
                <i class="fa fa-angle-right"></i>
                </a>
            </li>
        </ul>

    </li>
    <!-- style can be found in dropdown.less -->

<!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php $i = 0;?>
                @foreach(App\Role::All() as $role)
                @if(Auth::user()->hasRole($role->slug))
                <?php $i++;?>
                @if($i>1)
                    ,
                @endif
                {{$role->name}}
                @endif
                @endforeach
                {!!": <strong>".Auth::user()->first_name."</i></strong>"!!} <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu">

            <!-- Menu Footer-->
                <li class="user-footer">
                    <div>
                      <a href="{{ url('/change-password') }}"><i class="fa fa-gear fa-fw"></i> Change Password</a>
                    </div>
                    <div>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out fa-fw"></i>Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                        </form>
                    </div>
                </li>
        </ul>
        </li>
</ul>
</div>
