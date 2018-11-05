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
                        <li class="g-mb-20">Pay By Paytm <?= $paytmNumber ?></li>
                    </ul>
                    <form
                        action="<?= $this->Url->build(['controller' => 'Subscriptions', 'action' => 'paytm']); ?>"
                        method="post">
                        <input type="hidden" name="ORDER_ID" value="<?= "EWS_" . $subscriptionPackage->id . "_" . $orderNumber ."_".rand(10000,99999) ?>">
                        <input type="hidden" name="CUST_ID" value="CUST_<?= $authUser['id'] ?>">
                        <input type="hidden" name="INDUSTRY_TYPE_ID" value="Retail">
                        <input type="hidden" name="CUST_ID" value="CUST001">
                        <input type="hidden" name="CHANNEL_ID" value="WEB">
                        <input type="hidden" name="TXN_AMOUNT" value="<?= (int)$subscriptionPackage->price ?>">
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
