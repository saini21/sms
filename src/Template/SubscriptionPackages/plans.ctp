<!-- Promo Block -->
<section class="dzsparallaxer auto-init height-is-based-on-content use-loading mode-scroll loaded dzsprx-readyall "
         data-options='{direction: "fromtop", animation_duration: 25, direction: "reverse"}'>
    <!-- Parallax Image -->
    <div
        class="divimage dzsparallaxer--target w-100 g-bg-cover g-bg-size-cover g-bg-pos-top-center g-bg-primary-gradient-opacity-v1--after"
        style="height: 140%; background-image: url(images/pricing-plan.jpg);"></div>
    <!-- End Parallax Image -->
    
    <!-- Promo Block Content -->
    <div class="container g-color-white text-center g-pos-rel g-z-index-1 g-pt-150 g-pb-200">
        <h3 class="h2 g-font-weight-300 mb-0">Finding your perfect plan.</h3>
        <h2 class="g-font-weight-700 g-font-size-65 text-uppercase">Pricing plan</h2>
    </div>
    <!-- Promo Block Content -->
</section>
<!-- End Promo Block -->
<?php //pr($authUser); ?>
<!-- Pricing Plans -->
<section class="g-bg-gray-light-v5">
    <div class="container g-pb-100">
        <!-- Pricing Plans -->
        <div class="row g-mt-minus-100 g-mb-70">
            <?php if (!empty($authUser)) { ?>
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
                                <a class="btn text-uppercase u-btn-primary g-rounded-50 g-font-size-12 g-font-weight-700 g-pa-15-30 g-mb-10"
                                   href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'register']); ?>">Order
                                    Now</a></div>
                            <!-- End Article Content -->
                        </article>
                        <!-- End Article -->
                    </div>
                <?php } ?>
            <?php } else { ?>
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
                                <a class="btn text-uppercase u-btn-primary g-rounded-50 g-font-size-12 g-font-weight-700 g-pa-15-30 g-mb-10"
                                   href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'register']); ?>">Order
                                    Now</a></div>
                            <!-- End Article Content -->
                        </article>
                        <!-- End Article -->
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
    <!-- End Pricing Plans -->
</section>

<!-- End Pricing Plans -->
