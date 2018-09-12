<!-- Login -->
<section class="g-bg-gray-light-v5">
    <div class="container g-py-100">
        <div class="row justify-content-center">
            <div class="col-sm-8 col-lg-5">
                <div class="u-shadow-v21 g-bg-white rounded g-py-40 g-px-30">
                    <header class="text-center mb-4">
                        <h2 class="h2 g-color-black g-font-weight-600">Login</h2>
                    </header>
                    
                    <!-- Form -->
                    <?= $this->Form->create(null, ['url' => ['controller' => 'Users', 'action' => 'login'], 'id' => 'loginForm', 'class' => "g-py-15"]) ?>
                    
                    <div class="mb-4">
                        <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Email:</label>
                        <?= $this->Form->input('email', ['class' => 'form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15', 'type' => 'text', 'label' => false, 'placeholder' => 'Email']) ?>
                    </div>
                    
                    <div class="g-mb-35">
                        <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Password:</label>
                        <?= $this->Form->input('password', ['class' => 'form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15 mb-3', 'label' => false, 'placeholder' => 'Password']) ?>
                        <div class="row justify-content-between">
                            <div class="col align-self-center">
                                <label
                                    class="form-check-inline u-check g-color-gray-dark-v5 g-font-size-12 g-pl-25 mb-0">
                                    <?= $this->Form->control('remember_me', ['type' => 'checkbox', 'class' => 'g-hidden-xs-up g-pos-abs g-top-0 g-left-0', 'label'=>false]); ?>
                                    <div class="u-check-icon-checkbox-v6 g-absolute-centered--y g-left-0">
                                        <i class="fa" data-check-icon="&#xf00c"></i>
                                    </div>
                                    Keep signed in
                                </label>
                            </div>
                            <div class="col align-self-center text-right">
                                <a class="g-font-size-12" href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'forgotPassword']); ?>">Forgot password?</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <?= $this->Form->button(__('Sign In'), ['id' => 'loginBtn', 'class' => "btn btn-md btn-block u-btn-primary rounded g-py-13"]) ?>
                    </div>
                    <?= $this->Form->end() ?>
                    <!-- End Form -->
                    
                    <footer class="text-center">
                        <p class="g-color-gray-dark-v5 g-font-size-13 mb-0">Don't have an account? <a
                                class="g-font-weight-600"
                                href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'register']); ?>">Sign
                                Up</a>
                        </p>
                    </footer>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Login -->

<script>
    $(document).ready(function () {
        
        
        $("#loginForm").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true
                }
            },
            messages: {
                email: {
                    required: "Please enter email.",
                    email: "Please enter valid email."
                },
                password: {
                    required: "Please enter password."
                }
            }
        });
        
    });
</script>
