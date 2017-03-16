
<div class="left-sidebar-wrapper"><a href="{{ url('admin/dashboard/') }}" class="left-sidebar-toggle">Dashboard</a>
  <div class="left-sidebar-spacer">
    <div class="left-sidebar-scroll">
      <div class="left-sidebar-content">
        <ul class="sidebar-elements">
          <li class="divider">Menu</li>
          <li class="active"><a href="{{ url('admin/dashboard') }}"><i class="icon mdi mdi-home"></i><span>Dashboard</span></a>
          </li>
          <li class="parent"><a href="{{ url('admin/people') }}"><i class="icon mdi mdi-accounts-alt"></i><span>People</span></a>
            <ul class="sub-menu">
              <li><a href="{{ url('admin/people/manage') }}">Manage Accounts</a>
              </li>
              <!--<li><a href="{{ url('admin/people/import') }}">Account Import</a>
              </li>-->
              <!--<li><a href="{{ url('admin/people/log') }}">Activity Log</a>
              </li>-->
            </ul>
          </li>
          <!--<li class="parent"><a href="genealogy"><i class="icon mdi mdi-face"></i><span>Genealogy</span></a>
            <ul class="sub-menu">
              <li><a href="genealogy/holes">Manage Holes</a>
              </li>
              <li><a href="genealogy/orphans">Manage Ophans</a>
              </li>
              <li><a href="genealogy/placement">Manage Placement</a>
              </li>
              <li><a href="genealogy/move">Move Positions</a>
              </li>
            </ul>
          </li>-->
          <li class="parent"><a href="{{ url('admin/packages/manage') }}"><i class="icon mdi mdi-chart-donut"></i><span>Packages</span></a>
            <ul class="sub-menu">
              <li><a href="{{ url('admin/packages/manage') }}">Manage Packages</a>
              </li>
              <li><a href="{{ url('admin/packages/create') }}">Create Package</a>
              </li>
              </li>
            </ul>
          </li>
          <li class="divider">Extra</li>
          <!--<li class="parent"><a href="#"><i class="icon mdi mdi-inbox"></i><span>Messaging</span></a>
            <ul class="sub-menu">
              <li><a href="messages/">Inbox</a>
              </li>
              <li><a href="messages/compose">Compose Message</a>
              </li>
            </ul>
          </li>-->
          <li><a href="{{ url('admin/settings/') }}"><i class="icon mdi mdi-settings"></i><span>Settings</span></a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="progress-widget">
    <div class="progress-data"><span class="progress-value">60%</span><span class="name">Current Project</span></div>
    <div class="progress">
      <div style="width: 60%;" class="progress-bar progress-bar-primary"></div>
    </div>
  </div>
</div>