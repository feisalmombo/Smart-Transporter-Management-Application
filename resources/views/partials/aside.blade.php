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

      <li class="treeview">
      <?php
        if (Auth::user()->can('view_user'))
        {?>
        <a href="#">
          <i class="fa fa-user"></i>
          <span>Manage Users</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
        <?php if(Auth::user()->can('view_user')){?>
          <li><a href="{{ url('/view-users') }}"><i class="fa fa-users"></i> Users</a></li>
          <?php }?>
        </ul>
        <?php }?>
      </li>




       <li class="treeview">
            <?php
            if (Auth::user()->can('view_driver'))
            {?>
        <a href="#">
          <i class="fa fa-id-card"></i>
          <span>Manage Driver</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
            <?php if(Auth::user()->can('view_driver')){?>
          <li>
              <a href="{{ url('/view-drivers') }}"><i class="fa fa-circle-o">
                  </i> View drivers</a>
                </li>
          <?php }?>
        </ul>
        <?php }?>
      </li>


      <li class="treeview">
            <?php
            if (Auth::user()->can('view_vehicle'))
            {?>
        <a href="#">
          <i class="fa fa-car"></i>
          <span>Manage Vehicle</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
            <?php if(Auth::user()->can('view_vehicle')){?>
          <li>
              <a href="{{ url('/view-vehicles') }}"><i class="fa fa-circle-o">
                  </i> View vehicles</a>
                </li>
        <?php }?>
        </ul>
        <?php }?>
      </li>


      @if(Auth::user()->hasRole('developer') || Auth::user()->hasRole('transporter') || Auth::user()->hasRole('administrator'))
      <li class="treeview">

        <a href="#">
          <i class="fa fa-registered"></i>
          <span>Manage Coompany</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
        <li>
              <a href="{{ url('/request-item') }}"><i class="fa fa-circle-o">
                  </i> View Companies</a>
        </li>

        <li>
            <a href="{{ url('/request-customer/create') }}"><i class="fa fa-circle-o">
                </i> Add Company</a>
        </li>
            </ul>

      </li>

      {{-- <li class="treeview">

        <a href="#">
          <i class="fa fa-sun-o"></i>
          <span>Attended Request</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
        <li>
              <a href="{{ url('/attend-requests') }}"><i class="fa fa-circle-o">
                  </i> View AttendedRequest</a>
        </li>

            </ul>

      </li> --}}

    @endif


      {{-- <li class="treeview">

    <a href="#">
      <i class="fa fa-neuter"></i>
      <span>All Status</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">

    <li>
          <a href="{{ url('/view-attendedfeedback') }}"><i class="fa fa-circle-o">

    </li>

    </ul>

</li> --}}



      <li class="treeview">
            <?php
            if (Auth::user()->can('view_containertype'))
            {?>
        <a href="#">
          <i class="fa fa-connectdevelop"></i>
          <span>Manage Container</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
            <?php if(Auth::user()->can('view_request')){?>
        <li>
              <a href="{{ url('/view-containertypes') }}"><i class="fa fa-circle-o">
                  </i> View Containertypes</a>
        </li>
        <?php }?>
            </ul>
        <?php }?>
      </li>


      <li class="treeview">
            <?php
            if (Auth::user()->can('view_trucktype'))
            {?>
        <a href="#">
          <i class="fa fa-truck"></i>
          <span>Manage Truck</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
            <?php if(Auth::user()->can('view_trucktype')){?>
        <li>
              <a href="{{ url('/view-trucktypes') }}"><i class="fa fa-circle-o">
                  </i> View trucktypes</a>
        </li>
        <?php }?>
            </ul>
        <?php }?>
      </li>


      <li class="treeview">
            <?php
            if (Auth::user()->can('view_bodytype'))
            {?>
        <a href="#">
          <i class="fa fa-shield"></i>
          <span>Manage BodyTypes</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
            <?php if(Auth::user()->can('view_bodytype')){?>
        <li>
              <a href="{{ url('/view-bodytypes') }}"><i class="fa fa-circle-o">
                  </i> View Bodytypes</a>
        </li>
        <?php }?>
            </ul>
        <?php }?>
      </li>

      <li class="treeview">
            <?php
            if (Auth::user()->can('view_trailer'))
            {?>
    <a href="#">
      <i class="fa fa-train"></i>
      <span>Manage Trailer</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
        <?php if(Auth::user()->can('view_trailer')){?>
    <li>
          <a href="{{ url('/view-trailers') }}"><i class="fa fa-circle-o">
              </i> View Trailer</a>
    </li>
    <?php }?>
        </ul>
     <?php }?>
  </li>



      <li class="treeview">
          <?php
        if (Auth::user()->can('manage_privileges'))
        {?>
        <a href="#">
          <i class="fa fa-universal-access"></i> <span>Manage Permissions</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
        <?php if(Auth::user()->can('manage_privileges')){?>
          <li>
          <a href="{{ url('/settings/manage_users/permissions') }}"><i class="fa fa-circle-o"></i> View Permission</a>
          </li>

          <li>
          <a href="{{ url('/settings/manage_users/permissions/entrust_role') }}"><i class="fa fa-circle-o"></i> Assign Permissions to Role</a>
          </li>

          <li>
          <a href="{{ url('/settings/manage_users/permissions/entrust_user') }}"><i class="fa fa-circle-o"></i> Entrust Permission to User</a>
          </li>
          <?php }?>
        </ul>
        <?php }?>
      </li>

      <li class="treeview">
          <?php
        if (Auth::user()->can('manage_privileges'))
        {?>
        <a href="#">
          <i class="fa fa-check"></i> <span>Manage Roles</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
        <?php if(Auth::user()->can('manage_privileges')){?>
          <li>
          <a href="{{ url('/settings/manage_users/roles') }}"><i class="fa fa-circle-o"></i> View Roles</a>
          </li>

          <li>
          <a href="{{ url('/settings/manage_users/roles/create') }}"><i class="fa fa-circle-o"></i> Entrust Role to User</a>
          </li>
          <?php }?>
        </ul>
        <?php }?>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
