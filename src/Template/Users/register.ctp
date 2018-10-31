<!-- Signup -->
<section class="g-bg-gray-light-v5">
    <div class="container g-py-100">
        <div class="row justify-content-center">
            <div class="col-sm-10 col-md-9 col-lg-6">
                <div class="u-shadow-v21 g-bg-white rounded g-py-40 g-px-30">
                    <header class="text-center mb-4">
                        <h2 class="h2 g-color-black g-font-weight-600">Signup</h2>
                    </header>
                    
                    <!-- Form -->
                    <?= $this->Form->create(null, ['url' => ['controller' => 'Users', 'action' => 'add'], 'id' => 'registerForm', 'class' => "g-py-15"]) ?>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 mb-4">
                                <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">First name:</label>
                                <?= $this->Form->input('first_name', ['class' => 'form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15', 'label' => false, 'placeholder' => 'First Name']) ?>
                            </div>
                            
                            <div class="col-xs-12 col-sm-6 mb-4">
                                <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Last name:</label>
                                <?= $this->Form->input('last_name', ['class' => 'form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15', 'label' => false, 'placeholder' => 'Last Name']) ?>
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Email:</label>
                            <?= $this->Form->input('email', ['class' => 'form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15', 'type' => 'text', 'label' => false, 'placeholder' => 'Email']) ?>
                        </div>
                        
                        <div class="row">
                            <div class="col-xs-12 col-sm-6 mb-4">
                                <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Password:</label>
                                <?= $this->Form->input('password', ['class' => 'form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15', 'label' => false, 'placeholder' => 'Password']) ?>
                            </div>
                            
                            <div class="col-xs-12 col-sm-6 mb-4">
                                <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Confirm
                                    Password:</label>
                                <?= $this->Form->input('confirm_password', ['type'=>'password', 'class' => 'form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15', 'label' => false, 'placeholder' => 'Confirm Password']) ?>
                            </div>
                        </div>
                        
                        <div class="row justify-content-between mb-5">
                            <div class="col-8 align-self-center">
                                <label class="form-check-inline u-check g-color-gray-dark-v5 g-font-size-13 g-pl-25">
                                    
                                    <input name="i_accept" class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" id="iAccept">
                                    <div class="u-check-icon-checkbox-v6 g-absolute-centered--y g-left-0">
                                        <i class="fa" data-check-icon="&#xf00c"></i>
                                    </div>
                                    I accept the <a
                                        href="<?= $this->Url->build(['controller' => 'Pages', 'action' => 'termsAndConditions']); ?>">Terms
                                        and Conditions</a>
                                </label>
                                <label for="i_accept" class="error" style="display: none">Please accept terms and conditions.</label>
                            </div>
                            <div class="col-4 align-self-center text-right">
                                <?= $this->Form->button(__('Sign Up'), ['id' => 'registerBtn', 'class' => "btn btn-md u-btn-primary rounded g-py-13 g-px-25"]) ?>
                            </div>
                        </div>
                    </form>
                    <!-- End Form -->
                    
                    <footer class="text-center">
                        <p class="g-color-gray-dark-v5 g-font-size-13 mb-0">Already have an account?
                            <a class="g-font-weight-600"
                               href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'register']); ?>">Sign
                                In</a>
                        </p>
                    </footer>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Signup -->
<script>
    $(document).on('ready', function () {
        // initialization of tabs
        $.HSCore.components.HSTabs.init('[role="tablist"]');
        
        // initialization of go to
        $.HSCore.components.HSGoTo.init('.js-go-to');
    });
    
    $(window).on('load', function () {
        // initialization of header
        $.HSCore.components.HSHeader.init($('#js-header'));
        $.HSCore.helpers.HSHamburgers.init('.hamburger');
        
        // initialization of HSMegaMenu component
        $('.js-mega-menu').HSMegaMenu({
            event: 'hover',
            pageContainer: $('.container'),
            breakpoint: 991
        });
    });
    
    $(window).on('resize', function () {
        setTimeout(function () {
            $.HSCore.components.HSTabs.init('[role="tablist"]');
        }, 200);
    });
</script>

<script>
    $(document).ready(function () {
        
        setTimeout(function () {
            $('#freeMembership').modal('show');
        }, 1000);
        
        
        $("#registerForm").validate({
            ignore: ":hidden:not(#iAccept)",
            rules: {
                role: {
                    required: true
                },first_name: {
                    required: true
                },
                last_name: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true
                },
                confirm_password: {
                    required: true,
                    equalTo:"#password"
                },
                i_accept: {
                    required: true
                }
            },
            messages: {
                role: {
                    required: "Please select your type."
                },
                first_name: {
                    required: "Please enter first name."
                },
                last_name: {
                    required: "Please enter last name."
                },
                email: {
                    required: "Please enter email.",
                    email: "Please enter valid email."
                },
                password: {
                    required: "Please enter password."
                },
                confirm_password: {
                    required: "Please confirm password.",
                    equalTo:"Password does not match."
                },
                i_accept: {
                    required: "Please accept terms and conditions."
                }
            }
        });
        
        $(document).on("click", "#register_btn", function () {
            if ($("#register_form").valid() == true) {
                $("#register_form").submit();
            }
            
        });
    });
</script>
