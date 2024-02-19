<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">

    <li class="treeview">

      <a href="#">
          <i class="fa fa-home"></i>
          <span>Dashboard</span>
      <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Overview</a></li>
        </ul>

    </li>

      @if(Auth::user()->hasRole('developer') || Auth::user()->hasRole('manager') || Auth::user()->hasRole('administrator') || Auth::user()->hasRole('superadmin'))
      <li class="treeview">
        <a href="#">
          <i class="fa fa-user"></i>
          <span>Manage Users</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ url('/view-users') }}"><i class="fa fa-users"></i>View Users</a></li>

            <li>
                <a href="{{ url('/view-users/create') }}"><i class="fa fa-user">
                    </i> Add User</a>
            </li>
        </ul>
      </li>
      @endif


      @if(Auth::user()->hasRole('developer') || Auth::user()->hasRole('transporter') || Auth::user()->hasRole('administrator'))
      <li class="treeview">

        <a href="#">
          <i class="fa fa-registered"></i>
          <span>Manage Company</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">

        <li>
              <a href="{{ url('/view/companies') }}"><i class="fa fa-circle-o">
                  </i> Company for User</a>
        </li>

        @if(Auth::user()->hasRole('developer') || Auth::user()->hasRole('director') || Auth::user()->hasRole('administrator'))
        <li>
            <a href="{{ url('/view/all/companies') }}"><i class="fa fa-circle-o">
                </i>All Companies</a>
        </li>
        @endif

        <li>
            <a href="{{ url('/view/companies/create') }}"><i class="fa fa-circle-o">
                </i> Add Company</a>
        </li>
            </ul>

      </li>

      <li class="treeview">

        <a href="#">
          <i class="fa fa-truck"></i>
          <span>Manage Truck</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
        <li>
              <a href="{{ url('/view/trucks') }}"><i class="fa fa-circle-o">
                  </i> Truck for User</a>
        </li>

        @if(Auth::user()->hasRole('developer') || Auth::user()->hasRole('director') || Auth::user()->hasRole('administrator'))
        <li>
            <a href="{{ url('/view/all/trucks') }}"><i class="fa fa-circle-o">
                </i> All Trucks</a>
        </li>
        @endif

        <li>
            <a href="{{ url('/view/trucks/create') }}"><i class="fa fa-circle-o">
                </i> Add Truck</a>
        </li>
            </ul>

      </li>

    @endif



    @if(Auth::user()->hasRole('developer') || Auth::user()->hasRole('superadmin') || Auth::user()->hasRole('administrator'))
      <li class="treeview">

        <a href="#">
          <i class="fa fa-money"></i>
          <span>Manage Finance</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">

        {{-- <li>
              <a href="{{ url('/view/invoices') }}"><i class="fa fa-circle-o">
                  </i> Invoices for User</a>
        </li> --}}

        <li>
            <a href="{{ url('/view/all/invoices') }}"><i class="fa fa-circle-o">
                </i> View All Invoices</a>
        </li>

        <li>
            <a href="{{ url('/view/invoices/create') }}"><i class="fa fa-circle-o">
                </i> Add Invoice</a>
        </li>
            </ul>

      </li>

    @endif


    @if(Auth::user()->hasRole('customer') || Auth::user()->hasRole('superadmin') )
      <li class="treeview">

        <a href="#">
          <i class="fa fa-money"></i>
          <span>Manage Finance</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
            <li>
                <a href="{{ url('/view/invoices') }}"><i class="fa fa-circle-o">
                    </i> View Invoices</a>
            </li>
        </ul>
      </li>

    @endif


    @if(Auth::user()->hasRole('developer') || Auth::user()->hasRole('director') )
    <li class="treeview">

      <a href="#">
        <i class="fa fa-cogs"></i>
        <span>Log Activity Lists</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li>
                <a href="#"><i class="fa fa-circle-o">
                    </i> All Activity Logs</a>
        </li>
       </ul>
    </li>

    @endif


    @if(Auth::user()->hasRole('developer') || Auth::user()->hasRole('manager') || Auth::user()->hasRole('administrator') || Auth::user()->hasRole('superadmin'))

      <li class="treeview">
        <a href="#">
          <i class="fa fa-universal-access"></i> <span>Manage Permissions</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">

          <li>
          <a href="{{ url('/settings/manage_users/permissions') }}"><i class="fa fa-circle-o"></i> View Permission</a>
          </li>
        </ul>
      </li>
    @endif


    @if(Auth::user()->hasRole('developer') || Auth::user()->hasRole('manager') || Auth::user()->hasRole('administrator') || Auth::user()->hasRole('superadmin'))
      <li class="treeview">

        <a href="#">
          <i class="fa fa-check"></i> <span>Manage Roles</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">

          <li>
          <a href="{{ url('/settings/manage_users/roles') }}"><i class="fa fa-circle-o"></i> View Roles</a>
          </li>

        </ul>

      </li>
    @endif
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
