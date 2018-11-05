<!-- Sidebar Nav -->
<div id="sideNav" class="col-auto u-sidebar-navigation-v1 u-sidebar-navigation--light">
    <ul id="sideNavMenu" class="u-sidebar-navigation-v1-menu u-side-nav--top-level-menu g-min-height-100vh mb-0">
        <!-- Dashboards -->
        <li class="u-sidebar-navigation-v1-menu-item u-side-nav--has-sub-menu u-side-nav--top-level-menu-item">
            <a class="media u-side-nav--top-level-menu-link u-side-nav--hide-on-hidden g-px-15 g-py-12" href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'dashboard']); ?>">
              <span class="d-flex align-self-center g-pos-rel g-font-size-18 g-mr-18">
      <i class="hs-admin-server"></i>
    </span>
                <span class="media-body align-self-center">Dashboards</span>
            </a>
            
            
        </li>
        <!-- End Dashboards -->
        
        <li class="u-sidebar-navigation-v1-menu-item u-side-nav--has-sub-menu u-side-nav--top-level-menu-item ">
            <a class="media u-side-nav--top-level-menu-link u-side-nav--hide-on-hidden g-px-15 g-py-12" href="<?= $this->Url->build(['controller' => 'SentMessages', 'action' => 'add']); ?>">
              <span class="d-flex align-self-center g-pos-rel g-font-size-18 g-mr-18">
                <i class="hs-admin-comment"></i>
                </span>
                <span class="media-body align-self-center">Send Messages</span>
            </a>
        </li>
    
        <li class="u-sidebar-navigation-v1-menu-item u-side-nav--has-sub-menu u-side-nav--top-level-menu-item ">
            <a class="media u-side-nav--top-level-menu-link u-side-nav--hide-on-hidden g-px-15 g-py-12" href="<?= $this->Url->build(['controller' => 'SentMessages', 'action' => 'index']); ?>">
              <span class="d-flex align-self-center g-pos-rel g-font-size-18 g-mr-18">
                <i class="hs-admin-check-box"></i>
                </span>
                <span class="media-body align-self-center">My Activities</span>
            </a>
        </li>
    
        <li class="u-sidebar-navigation-v1-menu-item u-side-nav--has-sub-menu u-side-nav--top-level-menu-item ">
            <a class="media u-side-nav--top-level-menu-link u-side-nav--hide-on-hidden g-px-15 g-py-12" href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'profile']); ?>">
              <span class="d-flex align-self-center g-pos-rel g-font-size-18 g-mr-18">
                <i class="hs-admin-user"></i>
                </span>
                <span class="media-body align-self-center">My Profile</span>
            </a>
        </li>
    
    </ul>
</div>
<!-- End Sidebar Nav -->
