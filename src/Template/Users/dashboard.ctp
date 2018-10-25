<?php $this->assign('title', __('Dashboard')) ?>
<div class="g-bg-lightblue-v10-opacity-0_5 g-pa-20">
    
    <?php if (isset($subscriptionPackages)) { ?>
        <!-- Promo Block -->
        <section
            class="dzsparallaxer auto-init height-is-based-on-content use-loading mode-scroll loaded dzsprx-readyall "
            data-options='{direction: "fromtop", animation_duration: 25, direction: "reverse"}'>
            <!-- Parallax Image -->
            <div
                class="divimage dzsparallaxer--target w-100 g-bg-cover g-bg-size-cover g-bg-pos-top-center g-bg-primary-gradient-opacity-v1--after"
                style="height: 70%; background-image: url(images/pricing-plan.jpg);"></div>
            <!-- End Parallax Image -->
            
            <!-- Promo Block Content -->
            <div class="container g-color-white text-center g-pos-rel g-z-index-1 g-pt-50 g-pb-100">
                <h3 class="h2 g-font-weight-300 mb-0" style="color: #000000">Finding your perfect plan.</h3>
                <h2 class="g-font-weight-700 g-font-size-65 text-uppercase" style="color: #000000">Pricing plan</h2>
                <h4 class="g-font-weight-300  text-uppercase" style="color: #000000">Purchase Package of your choice to
                    enjoy the services.</h4>
            </div>
            <!-- Promo Block Content -->
        </section>
        <div class="row">
            <?php foreach ($subscriptionPackages as $subscriptionPackage) { ?>
                <div class="col-md-4 g-mb-30">
                    <!-- Article -->
                    <article
                        class="u-shadow-v21 u-shadow-v21--hover g-bg-white text-center g-overflow-hidden g-rounded-4 g-pos-rel g-z-index-2 g-cursor-pointer g-transition-0_3">
                        <!-- Article Header -->
                        <header class="g-bg-primary g-pos-rel g-px-20 g-py-70"><strong
                                class="d-block g-color-white g-font-size-50 g-line-height-0_7 g-mb-20"> <span
                                    class="g-valign-top g-font-size-default">INR</span><?= $subscriptionPackage->price ?>
                                <span
                                    class="g-font-size-default"></span> </strong>
                            <h3 class="h6 text-uppercase g-color-white-opacity-0_7 g-letter-spacing-3 g-mb-20"><?= $subscriptionPackage->name ?></h3>
                        </header>
                        <!-- End Article Header -->
                        
                        <!-- Article Content -->
                        <div class="g-px-20 g-py-40">
                            <ul class="list-unstyled g-mb-40">
                                <li class="g-mb-20">Package <?= $subscriptionPackage->price ?></li>
                                <li class="g-mb-20">Earn <?= $subscriptionPackage->earn_per_sms ?> paisa / Sms</li>
                                <li class="g-mb-20">Cost <?= $subscriptionPackage->price ?> INR</li>
                                <li class="g-mb-20">Pay By Paytm 7728020359</li>
                            </ul>
                            <form action="<?= $this->Url->build(['controller' => 'Subscriptions', 'action' => 'paytm']); ?>" method="post">
                                <input type="hidden" name="ORDER_ID" value="<?= "EWS_" . rand(1000, 9999) . "_" . $orderNumber ?>">
                                <input type="hidden" name="CUST_ID" value="CUST00<?= $authUser['id'] ?>">
                                <input type="hidden" name="INDUSTRY_TYPE_ID" value="Retail">
                                <input type="hidden" name="CUST_ID" value="CUST001">
                                <input type="hidden" name="CHANNEL_ID" value="WEB">
                                <input type="hidden" name="TXN_AMOUNT" value="1">
                                <button
                                    class="btn text-uppercase u-btn-primary g-rounded-50 g-font-size-12 g-font-weight-700 g-pa-15-30 g-mb-10">
                                    Purchase
                                </button>
                            </form>
                        
                        </div>
                        <!-- End Article Content -->
                    </article>
                    <!-- End Article -->
                </div>
            <?php } ?>
        </div>
    <?php } else { ?>
        <div class="row">
            <div class="col-sm-6 col-lg-6 col-xl-3 g-mb-30">
                <!-- Panel -->
                <div class="card h-100 g-brd-gray-light-v7 u-card-v1 g-rounded-3">
                    <div class="card-block g-font-weight-300 g-pa-20">
                        <div class="media">
                            <div class="d-flex g-mr-15">
                                <div
                                    class="u-header-dropdown-icon-v1 g-pos-rel g-width-60 g-height-60 g-bg-lightblue-v4 g-font-size-18 g-font-size-24--md g-color-white rounded-circle">
                                    <i class="hs-admin-user g-absolute-centered"></i>
                                </div>
                            </div>
                            
                            <div class="media-body align-self-center">
                                <div class="d-flex align-items-center g-mb-5">
                                <span
                                    class="g-font-size-24 g-line-height-1 g-color-black"><?= $totalActivities ?> </span>
                                </div>
                                
                                <h6 class="g-font-size-16 g-font-weight-300 g-color-gray-dark-v6 mb-0">Total
                                    Activities</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Panel -->
            </div>
            
            <div class="col-sm-6 col-lg-6 col-xl-3 g-mb-30">
                <!-- Panel -->
                <div class="card h-100 g-brd-gray-light-v7 u-card-v1 g-rounded-3">
                    <div class="card-block g-font-weight-300 g-pa-20">
                        <div class="media">
                            <div class="d-flex g-mr-15">
                                <div
                                    class="u-header-dropdown-icon-v1 g-pos-rel g-width-60 g-height-60 g-bg-teal-v2 g-font-size-18 g-font-size-24--md g-color-white rounded-circle">
                                    <i class="hs-admin-check-box g-absolute-centered"></i>
                                </div>
                            </div>
                            
                            <div class="media-body align-self-center">
                                <div class="d-flex align-items-center g-mb-5">
                                <span
                                    class="g-font-size-24 g-line-height-1 g-color-black"><?= $processedActivities ?> </span>
                                </div>
                                
                                <h6 class="g-font-size-16 g-font-weight-300 g-color-gray-dark-v6 mb-0">Processed
                                    Activities</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Panel -->
            </div>
            
            <div class="col-sm-6 col-lg-6 col-xl-3 g-mb-30">
                <!-- Panel -->
                <div class="card h-100 g-brd-gray-light-v7 u-card-v1 g-rounded-3">
                    <div class="card-block g-font-weight-300 g-pa-20">
                        <div class="media">
                            <div class="d-flex g-mr-15">
                                <div
                                    class="u-header-dropdown-icon-v1 g-pos-rel g-width-60 g-height-60 g-bg-darkblue-v2 g-font-size-18 g-font-size-24--md g-color-white rounded-circle">
                                    <i class="hs-admin-comment g-absolute-centered"></i>
                                </div>
                            </div>
                            
                            <div class="media-body align-self-center">
                                <div class="d-flex align-items-center g-mb-5">
                                <span
                                    class="g-font-size-24 g-line-height-1 g-color-black"><?= $pendingActivities ?></span>
                                </div>
                                
                                <h6 class="g-font-size-16 g-font-weight-300 g-color-gray-dark-v6 mb-0">Pending
                                    Activities</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Panel -->
            </div>
            
            <div class="col-sm-6 col-lg-6 col-xl-3 g-mb-30">
                <!-- Panel -->
                <div class="card h-100 g-brd-gray-light-v7 u-card-v1 g-rounded-3">
                    <div class="card-block g-font-weight-300 g-pa-20">
                        <div class="media">
                            <div class="d-flex g-mr-15">
                                <div
                                    class="u-header-dropdown-icon-v1 g-pos-rel g-width-60 g-height-60 g-bg-lightred-v2 g-font-size-18 g-font-size-24--md g-color-white rounded-circle">
                                    <i class="hs-admin-wallet g-absolute-centered"></i>
                                </div>
                            </div>
                            
                            <div class="media-body align-self-center">
                                <div class="d-flex align-items-center g-mb-5">
                                <span
                                    class="g-font-size-24 g-line-height-1 g-color-black">INR <?= $totalEarning ?></span>
                                </div>
                                
                                <h6 class="g-font-size-16 g-font-weight-300 g-color-gray-dark-v6 mb-0">Total
                                    Earning</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Panel -->
            </div>
        </div>
    <?php } ?>
    
    <!-- Statistic Card -->
    <div class="row">
        <div class="col-xl-12"></div>
    </div>
</div>




