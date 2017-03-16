
<div class="left-sidebar-wrapper"><a href="#" class="left-sidebar-toggle">Dashboard</a>
  <div class="left-sidebar-spacer">
    <div class="left-sidebar-scroll">
      <div class="left-sidebar-content">
        <ul class="sidebar-elements">
          <li class="divider">Menu</li>
          <li class="active"><a href="{{ url('/dashboard') }}"><i class="icon mdi mdi-home"></i><span>Dashboard</span></a>
          </li>
          <li class="parent"><a href="{{ url('account/profile') }}"><i class="icon mdi mdi-face"></i><span>Account</span></a>
            <ul class="sub-menu">
              <li><a href="{{ url('account/profile') }}">Profile</a>
              </li>
            </ul>
          </li>
          <li class="parent"><a href="network/"><i class="icon mdi mdi-globe"></i><span>Network</span></a>
            <ul class="sub-menu">
              <li><a href="{{ url('network/tree') }}">Tree</a>
              </li>
              <li><a href="{{ url('network/referers') }}">Direct Referals</a>
              </li>
            </ul>
          </li>
          <li class="parent"><a href="{{ url('packages/choose') }}"><i class="icon mdi mdi-dot-circle"></i><span>Packages</span></a>
            <ul class="sub-menu">
              <li><a href="{{ url('/packages/choose') }}">Avaliable packages</a>
              </li>
              <li><a href="{{ url('/packages/subscribed') }}">Subscribed packages</a>
              </li>
            </ul>
          </li>
          <li class="divider">Extra</li>
          <li class="parent"><a href="{{ url('messages/admin') }}"><i class="icon mdi mdi-inbox"></i><span>Support</span></a>
            <ul class="sub-menu">
              <li><a href="{{ url('support/faq') }}">FAQ</a>
              </li>
              <li><a href="{{ url('support/contact_support') }}">Contact Support</a>
              </li>
            </ul>
          </li>
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