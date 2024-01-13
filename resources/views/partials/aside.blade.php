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
          <li><a href="{{ url('/view-users') }}"><i class="fa fa-users"></i> Users</a></li>
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
                  </i> View Companies</a>
        </li>

        <li>
            <a href="{{ url('/view/companies/create') }}"><i class="fa fa-circle-o">
                </i> Add Company</a>
        </li>
            </ul>

      </li>

      {<li class="treeview">

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
                  </i> View Trucks</a>
        </li>

        <li>
            <a href="{{ url('/view/trucks/create') }}"><i class="fa fa-circle-o">
                </i> Add Truck</a>
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

          <li>
          <a href="{{ url('/settings/manage_users/permissions/entrust_role') }}"><i class="fa fa-circle-o"></i> Assign Permissions to Role</a>
          </li>

          <li>
          <a href="{{ url('/settings/manage_users/permissions/entrust_user') }}"><i class="fa fa-circle-o"></i> Entrust Permission to User</a>
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

          <li>
          <a href="{{ url('/settings/manage_users/roles/create') }}"><i class="fa fa-circle-o"></i> Entrust Role to User</a>
          </li>
          
        </ul>
     
      </li>
      @endif
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
