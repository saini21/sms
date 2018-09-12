<?php $this->assign('title', __('Login')) ?>

<!-- Login -->
<section class="g-bg-gray-light-v5">
    <div class="container g-py-100">
        <div class="row justify-content-center">
            <div class="col-sm-8 col-lg-5">
                <div class="u-shadow-v21 g-bg-white rounded g-py-40 g-px-30">
                    <header class="text-center mb-4">
                        <h2 class="h2 g-color-black g-font-weight-600">SMS Admin</h2>
                        <?= $this->Flash->render() ?>
                    </header>
                    
                    <!-- Form -->
                    <?= $this->Form->create('',['class'=>'g-py-15']) ?>
                        <div class="mb-4">
                            <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Email:</label>
                            <?= $this->Form->control('email', ['class' => 'form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15', 'placeholder' => 'Email', 'label' => false]) ?>
                        </div>
                        
                        <div class="g-mb-35">
                            <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Password:</label>
                            <?= $this->Form->control('password', ['type' => 'password', 'class' => 'form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15 mb-3', 'placeholder' => 'Password', 'label' => false]) ?>
                        </div>
                        
                        <div class="mb-4">
                            <?= $this->Form->button(__('Sign In'), ['class' => 'btn btn-md btn-block u-btn-primary rounded g-py-13']); ?>
                        </div>
                    <?= $this->Form->end() ?>
                    <!-- End Form -->
                    
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Login -->
