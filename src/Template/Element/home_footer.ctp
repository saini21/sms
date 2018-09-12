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
    'PagesprivacyPolicy'=>'',
    'PagestermsAndConditions'=>''
];

$menuItems[$this->request->controller.$this->request->action] = 'active';
?>

<!-- Footer -->
<div id="contacts-section" class="g-bg-black-opacity-0_9 g-color-white-opacity-0_8 g-py-60">
    <div class="container">
        <div class="row">
            <!-- Footer Content -->
            <div class="col-lg-3 col-md-6 g-mb-40 g-mb-0--lg">
                <div class="u-heading-v2-3--bottom g-brd-white-opacity-0_8 g-mb-20">
                    <h2 class="u-heading-v2__title h6 text-uppercase mb-0">About Us</h2>
                </div>
                
                <p>About Unify dolor sit amet, consectetur adipiscing elit. Maecenas eget nisl id libero tincidunt sodales.</p>
            </div>
            <!-- End Footer Content -->
            
            <!-- Footer Content -->
            
            
            
            
            
            <div class="col-lg-3 col-md-6 g-mb-40 g-mb-0--lg">
                <div class="u-heading-v2-3--bottom g-brd-white-opacity-0_8 g-mb-20">
                    <h2 class="u-heading-v2__title h6 text-uppercase mb-0">Useful Links</h2>
                </div>
                
                <nav class="text-uppercase1">
                    <ul class="list-unstyled g-mt-minus-10 mb-0">
                        
                        <li class="g-pos-rel g-brd-bottom g-brd-white-opacity-0_1 g-py-10 ">
                            <h4 class="h6 g-pr-20 mb-0 ">
                                <a class="g-color-white-opacity-0_8 g-color-white--hover <?= $menuItems['Usershome'] ?>" href="<?= SITE_URL ?>">Home</a>
                                <i class="fa fa-angle-right g-absolute-centered--y g-right-0"></i>
                            </h4>
                        </li>
                        <li class="g-pos-rel g-brd-bottom g-brd-white-opacity-0_1 g-py-10">
                            <h4 class="h6 g-pr-20 mb-0">
                                <a class="g-color-white-opacity-0_8 g-color-white--hover <?= $menuItems['Pagesabout'] ?>" href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'about']); ?>">About Us</a>
                                <i class="fa fa-angle-right g-absolute-centered--y g-right-0"></i>
                            </h4>
                        </li>
                        <li class="g-pos-rel g-brd-bottom g-brd-white-opacity-0_1 g-py-10">
                            <h4 class="h6 g-pr-20 mb-0">
                                <a class="g-color-white-opacity-0_8 g-color-white--hover <?= $menuItems['PageshowToWork'] ?>" href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'howToWork']); ?>">How To Work</a>
                                <i class="fa fa-angle-right g-absolute-centered--y g-right-0"></i>
                            </h4>
                        </li>
                        <li class="g-pos-rel g-brd-bottom g-brd-white-opacity-0_1 g-py-10">
                            <h4 class="h6 g-pr-20 mb-0">
                                <a class="g-color-white-opacity-0_8 g-color-white--hover <?= $menuItems['SubscriptionPackagesplans'] ?>" href="<?= $this->Url->build(['controller' => 'SubscriptionPackages', 'action' => 'plans']); ?>">Plans </a>
                                <i class="fa fa-angle-right g-absolute-centered--y g-right-0"></i>
                            </h4>
                        </li>
                        <?php if(!isset($authUser)) { ?>
                        <li class="g-pos-rel g-brd-bottom g-brd-white-opacity-0_1 g-py-10">
                            <h4 class="h6 g-pr-20 mb-0">
                                <a class="g-color-white-opacity-0_8 g-color-white--hover <?= $menuItems['Faqsindex'] ?>" href="<?= $this->Url->build(['controller' => 'Faqs', 'action' => 'index']); ?>">Faq's</a>
                                <i class="fa fa-angle-right g-absolute-centered--y g-right-0"></i>
                            </h4>
                        </li>
                        
                        <?php } ?>
                    </ul>
                </nav>
            </div>
            
            
            
            
            
            
            
            
            <div class="col-lg-3 col-md-6 g-mb-40 g-mb-0--lg">
                <div class="u-heading-v2-3--bottom g-brd-white-opacity-0_8 g-mb-20">
                    <h2 class="u-heading-v2__title h6 text-uppercase mb-0">Quick Links</h2>
                </div>
                
                <nav class="text-uppercase1">
                    <ul class="list-unstyled g-mt-minus-10 mb-0">
                        
                        <li class="g-pos-rel g-brd-bottom g-brd-white-opacity-0_1 g-py-10">
                            <h4 class="h6 g-pr-20 mb-0">
                                <a class="g-color-white-opacity-0_8 g-color-white--hover <?= $menuItems['Pagescontact'] ?>" href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'contact']); ?>">Contact us</a>
                                <i class="fa fa-angle-right g-absolute-centered--y g-right-0"></i>
                            </h4>
                        </li>
                        <?php if(!isset($authUser)) { ?>
                        <li class="g-pos-rel g-brd-bottom g-brd-white-opacity-0_1 g-py-10">
                            <h4 class="h6 g-pr-20 mb-0">
                                <a class="g-color-white-opacity-0_8 g-color-white--hover <?= $menuItems['Userslogin'] ?>" href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'login']); ?>">Sign In </a>
                                <i class="fa fa-angle-right g-absolute-centered--y g-right-0"></i>
                            </h4>
                        </li>
                        <li class="g-pos-rel g-brd-bottom g-brd-white-opacity-0_1 g-py-10">
                            <h4 class="h6 g-pr-20 mb-0">
                                <a class="g-color-white-opacity-0_8 g-color-white--hover <?= $menuItems['Usersregister'] ?>" href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'register']); ?>">Sign Up </a>
                                <i class="fa fa-angle-right g-absolute-centered--y g-right-0"></i>
                            </h4>
                        </li>
                        <?php } else { ?>
                            <li class="g-pos-rel g-brd-bottom g-brd-white-opacity-0_1 g-py-10">
                                <h4 class="h6 g-pr-20 mb-0">
                                    <a class="g-color-white-opacity-0_8 g-color-white--hover <?= $menuItems['Faqsindex'] ?>" href="<?= $this->Url->build(['controller' => 'Faqs', 'action' => 'index']); ?>">Faq's</a>
                                    <i class="fa fa-angle-right g-absolute-centered--y g-right-0"></i>
                                </h4>
                            </li>
                            <li class="g-pos-rel g-brd-bottom g-brd-white-opacity-0_1 g-py-10">
                                <h4 class="h6 g-pr-20 mb-0">
                                    <a class="g-color-white-opacity-0_8 g-color-white--hover <?= $menuItems['Faqsindex'] ?>" href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'logout']); ?>">Sign Out</a>
                                    <i class="fa fa-angle-right g-absolute-centered--y g-right-0"></i>
                                </h4>
                            </li>
                        <?php } ?>
                    
                    
                    </ul>
                </nav>
            </div>
            <!-- End Footer Content -->
            
            <!-- Footer Content -->
            
            <!-- End Footer Content -->
            
            <!-- Footer Content -->
            <div class="col-lg-3 col-md-6">
                <div class="u-heading-v2-3--bottom g-brd-white-opacity-0_8 g-mb-20">
                    <h2 class="u-heading-v2__title h6 text-uppercase mb-0">Our Contacts</h2>
                </div>
                
                <address class="g-bg-no-repeat g-font-size-12 mb-0" style="background-image: url(<?= SITE_URL ?>/img/map2.png);">
                    <!-- Location -->
                    <div class="d-flex g-mb-20">
                        <div class="g-mr-10">
              <span class="u-icon-v3 u-icon-size--xs g-bg-white-opacity-0_1 g-color-white-opacity-0_6">
                <i class="fa fa-map-marker"></i>
              </span>
                        </div>
                        <p class="mb-0">795 Folsom Ave, Suite 600, <br> San Francisco, CA 94107 795</p>
                    </div>
                    <!-- End Location -->
                    
                    <!-- Phone -->
                    <div class="d-flex g-mb-20">
                        <div class="g-mr-10">
              <span class="u-icon-v3 u-icon-size--xs g-bg-white-opacity-0_1 g-color-white-opacity-0_6">
                <i class="fa fa-phone"></i>
              </span>
                        </div>
                        <p class="mb-0">(+123) 456 7890 <br> (+123) 456 7891</p>
                    </div>
                    <!-- End Phone -->
                    
                    <!-- Email and Website -->
                    <div class="d-flex g-mb-20">
                        <div class="g-mr-10">
              <span class="u-icon-v3 u-icon-size--xs g-bg-white-opacity-0_1 g-color-white-opacity-0_6">
                <i class="fa fa-globe"></i>
              </span>
                        </div>
                        <p class="mb-0">
                            <a class="g-color-white-opacity-0_8 g-color-white--hover" href="mailto:info@htmlstream.com">info@htmlstream.com</a>
                            <br>
                            <a class="g-color-white-opacity-0_8 g-color-white--hover" href="#!">www.htmlstream.com</a>
                        </p>
                    </div>
                    <!-- End Email and Website -->
                </address>
            </div>
            <!-- End Footer Content -->
        </div>
    </div>
</div>
<!-- End Footer -->

<!-- Copyright Footer -->
<footer class="g-bg-gray-dark-v1 g-color-white-opacity-0_8 g-py-20">
    <div class="container">
        <div class="row">
            <div class="col-md-8 text-center text-md-left g-mb-10 g-mb-0--md">
                <div class="d-lg-flex">
                    <small class="d-block g-font-size-default g-mr-10 g-mb-10 g-mb-0--md">2018 &copy; All Rights Reserved.</small>
                    <ul class="u-list-inline">
                        <li class="list-inline-item">
                            <a class="g-color-white-opacity-0_8 g-color-white--hover <?= $menuItems['PagesprivacyPolicy'] ?>" href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'privacyPolicy']); ?>">Privacy Policy</a>
                        </li>
                        <li class="list-inline-item">
                            <span>|</span>
                        </li>
                        <li class="list-inline-item">
                            <a class="g-color-white-opacity-0_8 g-color-white--hover <?= $menuItems['PagestermsAndConditions'] ?>" href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'termsAndConditions']); ?>">Terms & Conditions</a>
                        </li>
                    
                    </ul>
                </div>
            </div>
            
            <div class="col-md-4 align-self-center">
                <ul class="list-inline text-center text-md-right mb-0">
                    <li class="list-inline-item g-mx-10" data-toggle="tooltip" data-placement="top" title="Facebook">
                        <a href="#!" class="g-color-white-opacity-0_5 g-color-white--hover">
                            <i class="fa fa-facebook"></i>
                        </a>
                    </li>
                    <li class="list-inline-item g-mx-10" data-toggle="tooltip" data-placement="top" title="Skype">
                        <a href="#!" class="g-color-white-opacity-0_5 g-color-white--hover">
                            <i class="fa fa-skype"></i>
                        </a>
                    </li>
                    <li class="list-inline-item g-mx-10" data-toggle="tooltip" data-placement="top" title="Linkedin">
                        <a href="#!" class="g-color-white-opacity-0_5 g-color-white--hover">
                            <i class="fa fa-linkedin"></i>
                        </a>
                    </li>
                    <li class="list-inline-item g-mx-10" data-toggle="tooltip" data-placement="top" title="Pinterest">
                        <a href="#!" class="g-color-white-opacity-0_5 g-color-white--hover">
                            <i class="fa fa-pinterest"></i>
                        </a>
                    </li>
                    <li class="list-inline-item g-mx-10" data-toggle="tooltip" data-placement="top" title="Twitter">
                        <a href="#!" class="g-color-white-opacity-0_5 g-color-white--hover">
                            <i class="fa fa-twitter"></i>
                        </a>
                    </li>
                    <li class="list-inline-item g-mx-10" data-toggle="tooltip" data-placement="top" title="Dribbble">
                        <a href="#!" class="g-color-white-opacity-0_5 g-color-white--hover">
                            <i class="fa fa-dribbble"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- End Copyright Footer -->
<a class="js-go-to u-go-to-v1" href="#!" data-type="fixed" data-position='{
     "bottom": 15,
     "right": 15
   }' data-offset-top="400" data-compensation="#js-header" data-show-effect="zoomIn">
    <i class="hs-icon hs-icon-arrow-top"></i>
</a>
