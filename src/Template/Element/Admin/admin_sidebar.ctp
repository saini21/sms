<!-- Sidebar Nav u-side-nav-opened has-active active  -->
<?php
$topLevelMenu = [
    'Admins' => 'none',
    'Users' => 'none',
    'MessageCategories' => 'none',
    'Messages' => 'none',
    'SubscriptionPackages' => 'none',
    'Subscriptions' => 'none',
    'Faqs' => 'none',
    'Options' => 'none',
    'PaymentProofs' => 'none',
];

$topLevelMenu[$this->request->controller] = "block";

$topLevelMenuClass = [
    'Admins' => '',
    'Users' => '',
    'Subscriptions' => '',
    'Options' => '',
];

$topLevelMenuClass[$this->request->controller] = "active";


$secondLevelMenu = [
    'MessageCategories' => [
        'index' => '',
        'add' => '',
        'class' => '',
    ],
    'Messages' => [
        'index' => '',
        'add' => '',
        'class' => '',
    ],
    'SubscriptionPackages' => [
        'index' => '',
        'add' => '',
        'class' => '',
    ],
    'PaymentProofs' => [
        'index' => '',
        'add' => '',
        'class' => '',
    ],
    'Faqs' => [
        'index' => '',
        'add' => '',
        'class' => '',
    ],
];

$secondLevelMenu[$this->request->controller][$this->request->action] = "active";
$secondLevelMenu[$this->request->controller]['class'] = "u-side-nav-opened has-active";
?>
<div id="sideNav" class="col-auto u-sidebar-navigation-v1 u-sidebar-navigation--dark">
    <ul id="sideNavMenu" class="u-sidebar-navigation-v1-menu u-side-nav--top-level-menu g-min-height-100vh mb-0">
        <!-- Dashboards -->
        <li class="u-sidebar-navigation-v1-menu-item u-side-nav--has-sub-menu u-side-nav--top-level-menu-item">
            <a class="media u-side-nav--top-level-menu-link u-side-nav--hide-on-hidden g-px-15 g-py-12 <?= $topLevelMenuClass['Admins'] ?>"
               href="<?= $this->Url->build(['controller' => 'Admins', 'action' => 'dashboard']); ?>">
              <span class="d-flex align-self-center g-pos-rel g-font-size-18 g-mr-18">
      <i class="hs-admin-server"></i>
    </span>
                <span class="media-body align-self-center">Dashboards</span>
            </a>
        
        
        </li>
        <!-- End Dashboards -->
        
        <li class="u-sidebar-navigation-v1-menu-item u-side-nav--has-sub-menu u-side-nav--top-level-menu-item">
            <a class="media u-side-nav--top-level-menu-link u-side-nav--hide-on-hidden g-px-15 g-py-12 <?= ($this->request->action == "index")? $topLevelMenuClass['Users'] : "" ?>"
               href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'index']); ?>">
              <span class="d-flex align-self-center g-pos-rel g-font-size-18 g-mr-18">
                <i class="hs-admin-user"></i>
                </span>
                <span class="media-body align-self-center">Users</span>
            </a>
        </li>
        
        <li class="u-sidebar-navigation-v1-menu-item u-side-nav--has-sub-menu u-side-nav--top-level-menu-item ">
            <a class="media u-side-nav--top-level-menu-link u-side-nav--hide-on-hidden g-px-15 g-py-12"
               href="javascript:void(0);"
               data-hssm-target="#messageCategorySub">
              <span class="d-flex align-self-center g-pos-rel g-font-size-18 g-mr-18">
                <i class="hs-admin-layout-list-thumb"></i>
                </span>
                <span class="media-body align-self-center">Message Categories</span>
            </a>
            <ul id="messageCategorySub" class="u-sidebar-navigation-v1-menu u-side-nav--second-level-menu mb-0 <?= $secondLevelMenu['MessageCategories']['class'] ?>" style="display: <?= $topLevelMenu['MessageCategories'] ?>;">
                <li class="u-sidebar-navigation-v1-menu-item u-side-nav--second-level-menu-item ">
                    <a class="media u-side-nav--top-level-menu-link u-side-nav--hide-on-hidden g-px-15 g-py-12 <?= $secondLevelMenu['MessageCategories']['index'] ?>"
                       href="<?= $this->Url->build(['controller' => 'MessageCategories', 'action' => 'index']); ?>"
                    >
              <span class="d-flex align-self-center g-pos-rel g-font-size-18 g-mr-18">
                <i class="hs-admin-list"></i>
                </span>
                        <span class="media-body align-self-center">Message Categories</span>
                    </a>
                </li>
                <li class="u-sidebar-navigation-v1-menu-item u-side-nav--second-level-menu-item ">
                    <a class="media u-side-nav--second-level-menu-link g-px-15 g-py-12 <?= $secondLevelMenu['MessageCategories']['add'] ?>"
                       href="<?= $this->Url->build(['controller' => 'MessageCategories', 'action' => 'add']); ?>">
                                <span class="d-flex align-self-center g-mr-15 g-mt-minus-1">
                                    <i class="hs-admin-plus"></i>
                             </span>
                        <span class="media-body align-self-center">Add Message Category</span>
                    </a>
                </li>
            </ul>
        </li>
        
        <li class="u-sidebar-navigation-v1-menu-item u-side-nav--has-sub-menu u-side-nav--top-level-menu-item ">
            <a class="media u-side-nav--top-level-menu-link u-side-nav--hide-on-hidden g-px-15 g-py-12"
               href="javascript:void(0);"
               data-hssm-target="#messageSub">
              <span class="d-flex align-self-center g-pos-rel g-font-size-18 g-mr-18">
                <i class="hs-admin-comment"></i>
                </span>
                <span class="media-body align-self-center">Messages</span>
            </a>
            <ul id="messageSub" class="u-sidebar-navigation-v1-menu u-side-nav--second-level-menu mb-0 <?= $secondLevelMenu['Messages']['class'] ?>" style="display: <?= $topLevelMenu['Messages'] ?>;">
                <li class="u-sidebar-navigation-v1-menu-item u-side-nav--second-level-menu-item">
                    <a class="media u-side-nav--top-level-menu-link u-side-nav--hide-on-hidden g-px-15 g-py-12 <?= $secondLevelMenu['Messages']['index'] ?>"
                       href="<?= $this->Url->build(['controller' => 'Messages', 'action' => 'index']); ?>"
                    >
              <span class="d-flex align-self-center g-pos-rel g-font-size-18 g-mr-18">
                <i class="hs-admin-list"></i>
                </span>
                        <span class="media-body align-self-center">Messages</span>
                    </a>
                </li>
                <li class="u-sidebar-navigation-v1-menu-item u-side-nav--second-level-menu-item ">
                    <a class="media u-side-nav--second-level-menu-link g-px-15 g-py-12 <?= $secondLevelMenu['Messages']['add'] ?>"
                       href="<?= $this->Url->build(['controller' => 'Messages', 'action' => 'add']); ?>">
                                <span class="d-flex align-self-center g-mr-15 g-mt-minus-1">
                                    <i class="hs-admin-plus"></i>
                             </span>
                        <span class="media-body align-self-center">Add Message</span>
                    </a>
                </li>
            </ul>
        </li>
        
        <li class="u-sidebar-navigation-v1-menu-item u-side-nav--has-sub-menu u-side-nav--top-level-menu-item ">
            <a class="media u-side-nav--top-level-menu-link u-side-nav--hide-on-hidden g-px-15 g-py-12 <?= (in_array($this->request->action , ["activitiesUsers", "activities"])) ? $topLevelMenuClass['Users'] : "" ?>"
               href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'activitiesUsers']); ?>">
              <span class="d-flex align-self-center g-pos-rel g-font-size-18 g-mr-18">
                <i class="fa fa-users"></i>
                </span>
                <span class="media-body align-self-center">Activity Users</span>
            </a>
        </li>
        
        <li class="u-sidebar-navigation-v1-menu-item u-side-nav--has-sub-menu u-side-nav--top-level-menu-item ">
            <a class="media u-side-nav--top-level-menu-link u-side-nav--hide-on-hidden g-px-15 g-py-12"
               href="javascript:void(0);" data-hssm-target="#subscriptionPackagesSub">
              <span class="d-flex align-self-center g-pos-rel g-font-size-18 g-mr-18">
                <i class="hs-admin-bag"></i>
                </span>
                <span class="media-body align-self-center">Subscription Packages</span>
            </a>
            <ul id="subscriptionPackagesSub" class="u-sidebar-navigation-v1-menu u-side-nav--second-level-menu mb-0 <?= $secondLevelMenu['SubscriptionPackages']['class'] ?>" style="display: <?= $topLevelMenu['SubscriptionPackages'] ?>;">
                <li class="u-sidebar-navigation-v1-menu-item u-side-nav--second-level-menu-item">
                    <a class="media u-side-nav--top-level-menu-link u-side-nav--hide-on-hidden g-px-15 g-py-12 <?= $secondLevelMenu['SubscriptionPackages']['index'] ?>"
                       href="<?= $this->Url->build(['controller' => 'SubscriptionPackages', 'action' => 'index']); ?>"
                    >
              <span class="d-flex align-self-center g-pos-rel g-font-size-18 g-mr-18">
                <i class="hs-admin-list"></i>
                </span>
                        <span class="media-body align-self-center">Subscription Packages</span>
                    </a>
                </li>
                <li class="u-sidebar-navigation-v1-menu-item u-side-nav--second-level-menu-item">
                    <a class="media u-side-nav--second-level-menu-link g-px-15 g-py-12  <?= $secondLevelMenu['SubscriptionPackages']['add'] ?>"
                       href="<?= $this->Url->build(['controller' => 'SubscriptionPackages', 'action' => 'add']); ?>">
                                <span class="d-flex align-self-center g-mr-15 g-mt-minus-1">
                                    <i class="hs-admin-plus"></i>
                             </span>
                        <span class="media-body align-self-center">Add Subscription Package</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="u-sidebar-navigation-v1-menu-item u-side-nav--has-sub-menu u-side-nav--top-level-menu-item ">
            <a class="media u-side-nav--top-level-menu-link u-side-nav--hide-on-hidden g-px-15 g-py-12 <?= $topLevelMenuClass['Subscriptions'] ?>"
               href="<?= $this->Url->build(['controller' => 'Subscriptions', 'action' => 'index']); ?>">
              <span class="d-flex align-self-center g-pos-rel g-font-size-18 g-mr-18">
                <i class="hs-admin-briefcase"></i>
                </span>
                <span class="media-body align-self-center">Subscriptions</span>
            </a>
        </li>
    
        <li class="u-sidebar-navigation-v1-menu-item u-side-nav--has-sub-menu u-side-nav--top-level-menu-item ">
            <a class="media u-side-nav--top-level-menu-link u-side-nav--hide-on-hidden g-px-15 g-py-12"
               href="javascript:void(0);" data-hssm-target="#paymentProofsSub">
              <span class="d-flex align-self-center g-pos-rel g-font-size-18 g-mr-18">
                <i class="hs-admin-bag"></i>
                </span>
                <span class="media-body align-self-center">Payment Proofs</span>
            </a>
            <ul id="paymentProofsSub" class="u-sidebar-navigation-v1-menu u-side-nav--second-level-menu mb-0 <?= $secondLevelMenu['PaymentProofs']['class'] ?>" style="display: <?= $topLevelMenu['PaymentProofs'] ?>;">
                <li class="u-sidebar-navigation-v1-menu-item u-side-nav--second-level-menu-item">
                    <a class="media u-side-nav--top-level-menu-link u-side-nav--hide-on-hidden g-px-15 g-py-12 <?= $secondLevelMenu['PaymentProofs']['index'] ?>"
                       href="<?= $this->Url->build(['controller' => 'PaymentProofs', 'action' => 'index']); ?>"
                    >
              <span class="d-flex align-self-center g-pos-rel g-font-size-18 g-mr-18">
                <i class="hs-admin-list"></i>
                </span>
                        <span class="media-body align-self-center">Payment Proofs</span>
                    </a>
                </li>
                <li class="u-sidebar-navigation-v1-menu-item u-side-nav--second-level-menu-item">
                    <a class="media u-side-nav--second-level-menu-link g-px-15 g-py-12  <?= $secondLevelMenu['PaymentProofs']['add'] ?>"
                       href="<?= $this->Url->build(['controller' => 'PaymentProofs', 'action' => 'add']); ?>">
                                <span class="d-flex align-self-center g-mr-15 g-mt-minus-1">
                                    <i class="hs-admin-plus"></i>
                             </span>
                        <span class="media-body align-self-center">Add New Payment Proof</span>
                    </a>
                </li>
            </ul>
        </li>
        
        <li class="u-sidebar-navigation-v1-menu-item u-side-nav--has-sub-menu u-side-nav--top-level-menu-item ">
            <a class="media u-side-nav--top-level-menu-link u-side-nav--hide-on-hidden g-px-15 g-py-12"
               href="javascript:void(0);" data-hssm-target="#Faqs">
              <span class="d-flex align-self-center g-pos-rel g-font-size-18 g-mr-18">
                <i class="hs-admin-help-alt"></i>
                </span>
                <span class="media-body align-self-center">FAQs</span>
            </a>
            <ul id="Faqs" class="u-sidebar-navigation-v1-menu u-side-nav--second-level-menu mb-0 <?= $secondLevelMenu['Faqs']['class'] ?>" style="display: <?= $topLevelMenu['Faqs'] ?>;">
                <li class="u-sidebar-navigation-v1-menu-item u-side-nav--second-level-menu-item">
                    <a class="media u-side-nav--top-level-menu-link u-side-nav--hide-on-hidden g-px-15 g-py-12  <?= $secondLevelMenu['Faqs']['index'] ?>"
                       href="<?= $this->Url->build(['controller' => 'Faqs', 'action' => 'index']); ?>"
                    >
              <span class="d-flex align-self-center g-pos-rel g-font-size-18 g-mr-18">
                <i class="hs-admin-list"></i>
                </span>
                        <span class="media-body align-self-center">FAQs</span>
                    </a>
                </li>
                <li class="u-sidebar-navigation-v1-menu-item u-side-nav--second-level-menu-item">
                    <a class="media u-side-nav--second-level-menu-link g-px-15 g-py-12  <?= $secondLevelMenu['Faqs']['add'] ?>"
                       href="<?= $this->Url->build(['controller' => 'Faqs', 'action' => 'add']); ?>">
                                <span class="d-flex align-self-center g-mr-15 g-mt-minus-1">
                                    <i class="hs-admin-plus"></i>
                             </span>
                        <span class="media-body align-self-center">Add FAQ</span>
                    </a>
                </li>
            </ul>
        </li>
        
        
        
        <li class="u-sidebar-navigation-v1-menu-item u-side-nav--has-sub-menu u-side-nav--top-level-menu-item ">
            <a class="media u-side-nav--top-level-menu-link u-side-nav--hide-on-hidden g-px-15 g-py-12 <?= $topLevelMenuClass['Options'] ?>"
               href="<?= $this->Url->build(['controller' => 'Options', 'action' => 'settings']); ?>">
              <span class="d-flex align-self-center g-pos-rel g-font-size-18 g-mr-18">
                <i class="hs-admin-settings"></i>
                </span>
                <span class="media-body align-self-center">Settings</span>
            </a>
        </li>
    
    
    </ul>
</div>
<!-- End Sidebar Nav -->
