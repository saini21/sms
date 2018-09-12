<?php

$menuItems = [
  'Userslogin'=>'',
  'Usersregister'=>'',
  'Usershome'=>'',
  'Pagesabout'=>'',
  'Pagescontact'=>'',
  'PageshowToWork'=>'',
  'SubscriptionPackagesplans'=>'',
  'Faqsindex'=>'',
  'Usersdashboard'=>'',
];

$menuItems[$this->request->controller.$this->request->action] = 'active';
?>



<header id="js-header"
        class="u-header u-header--static u-header--show-hide u-header--change-appearance u-header--has-hidden-element"
        data-header-fix-moment="500" data-header-fix-effect="slide">
    <div class="u-header__section u-header__section--light g-bg-white g-transition-0_3 g-py-15"
         data-header-fix-moment-exclude="g-py-15" data-header-fix-moment-classes="u-shadow-v18 g-py-7">
        <div class="container">
            <div class="d-lg-flex flex-md-row align-items-center g-pos-rel">
                <!-- Responsive Toggle Button -->
                <button
                    class="navbar-toggler navbar-toggler-right btn g-hidden-lg-up g-line-height-1 g-brd-none g-pa-0 g-pos-abs g-top-3 g-right-0"
                    type="button" aria-label="Toggle navigation" aria-expanded="false" aria-controls="navBar"
                    data-toggle="collapse" data-target="#navBar">
              <span class="hamburger hamburger--slider">
            <span class="hamburger-box">
              <span class="hamburger-inner"></span>
              </span>
              </span>
                </button>
                <!-- End Responsive Toggle Button -->
                <!-- Logo -->
                <?php if(!isset($authUser)) { ?>
                <a href="<?= SITE_URL ?>" class="navbar-brand <?= $menuItems['Usershome'] ?>">
                    <?php } else { ?>
                    <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'dashboard']); ?>" class="navbar-brand <?= $menuItems['Usershome'] ?>">
                    <?php } ?>
                    <?= $this->Html->image('logo.png', ['alt' => SITE_TITLE]); ?>
                </a>
                <!-- End Logo -->
                
                <div class="col g-mt-10 g-mt-0--lg g-px-0">
                    
                    <ul class="list-inline text-uppercase g-font-weight-600 text-lg-right u-header--hidden-element g-line-height-1 g-font-size-12 g-mt-minus-10 g-mx-minus-4 g-mb-20">
                        <li class="list-inline-item g-mx-4 g-mt-10 " style="color: #599722 !important">
                            <?= $this->Flash->render() ?>
                        </li>
                    <?php if(!isset($authUser)) { ?>
                    
                        
                        <li class="list-inline-item g-mx-4 g-mt-10 ">
                            <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'login']); ?>"
                               class="g-color-gray-dark-v2 g-color-primary--hover g-text-underline--none--hover <?= $menuItems['Userslogin'] ?>">Sign In</a>
                        </li>
                        <li class="list-inline-item g-mx-4 g-mt-10">|</li>
                        <li class="list-inline-item g-mx-4 g-mt-10 ">
                            <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'register']); ?>"
                               class="g-color-gray-dark-v2 g-color-primary--hover g-text-underline--none--hover <?= $menuItems['Usersregister'] ?>">Sign
                                Up</a>
                        </li>
                    
    
                    <?php } else { ?>
                        
        
                            <li class="list-inline-item g-mx-4 g-mt-10 ">
                                <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'logout']); ?>"
                                   class="g-color-gray-dark-v2 g-color-primary--hover g-text-underline--none--hover <?= $menuItems['Userslogin'] ?>">Sign Out</a>
                            </li>
                            
                        
                    <?php } ?>

                    </ul>
                    
                    <nav class="navbar navbar-expand-lg p-0">
                        <!-- Navigation -->
                        <div
                            class="collapse navbar-collapse align-items-center flex-sm-row g-pt-10 g-pt-5--lg g-mr-40--sm"
                            id="navBar">
                            <ul class="navbar-nav text-uppercase g-font-weight-600 ml-auto">
                                <li class="nav-item g-mx-20--lg <?= $menuItems['Usershome'] ?>">
                                    <a href="<?= SITE_URL ?>" class="nav-link px-0">Home</a>
                                </li>
                                <li class="nav-item g-mx-20--lg <?= $menuItems['Pagesabout'] ?>">
                                    <a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'about']); ?>"
                                       class="nav-link px-0">About</a>
                                </li>
                                <li class="nav-item g-mx-20--lg <?= $menuItems['PageshowToWork'] ?>">
                                    <a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'howToWork']); ?>"
                                       class="nav-link px-0">how to work</a>
                                </li>
                                <li class="nav-item g-mx-20--lg <?= $menuItems['SubscriptionPackagesplans'] ?>">
                                    <a href="<?= $this->Url->build(['controller' => 'SubscriptionPackages', 'action' => 'plans']); ?>"
                                       class="nav-link px-0">Plans</a>
                                </li>
                                <li class="nav-item g-mx-20--lg <?= $menuItems['Faqsindex'] ?>">
                                    <a href="<?= $this->Url->build(['controller' => 'Faqs', 'action' => 'index']); ?>"
                                       class="nav-link px-0">Faq's</a>
                                </li>
                                <li class="nav-item g-ml-20--lg g-mr-0--lg <?= $menuItems['Pagescontact'] ?>">
                                    <a href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'contact']); ?>"
                                       class="nav-link px-0">Contact</a>
                                </li>
                            </ul>
                        </div>
                        <!-- End Navigation -->
                        <?php if(!isset($authUser)) { ?>
                        <div class="d-inline-block g-hidden-xs-down g-pos-rel g-valign-middle g-pl-30 g-pl-0--lg <?= $menuItems['Usersregister'] ?>">
                            <a class="btn u-btn-outline-primary g-font-size-13 text-uppercase g-py-10 g-px-15 "
                               href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'register']); ?>">Join now</a>
                        </div>
                        <?php } else { ?>
                            <div class="d-inline-block g-hidden-xs-down g-pos-rel g-valign-middle g-pl-30 g-pl-0--lg <?= $menuItems['Usersdashboard'] ?>">
                                <a class="btn u-btn-outline-primary g-font-size-13 text-uppercase g-py-10 g-px-15 "
                                   href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'dashboard']); ?>">Dashboard</a>
                            </div>
                        <?php } ?>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
