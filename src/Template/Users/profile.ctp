<?php $this->assign('title', __('Profile')) ?>
<section class="g-pa-20">
    
    <section class="g-brd-around g-brd-gray-light-v7 g-rounded-4 g-pa-15 g-pa-20--md g-mb-30">
        <h3 class="g-font-weight-300 g-font-size-28 g-color-black g-mb-28">
            <?= $authUser['first_name'] ?>
            <small><?= $authUser['last_name'] ?></small>
        </h3>
        <div class="row">
            <!-- left column -->
            <div class="col-md-1"></div>
            <div class="col-md-8">
                <!-- general form elements -->
                <!-- form start -->
                <?= $this->Form->create($user, ['enctype' => 'multipart/form-data', 'id' => 'adminProfileForm']) ?>
                
                <div class="form-group g-mb-30">
                    <label><?= __('Profile Image') ?></label>
                    <div class="g-pos-rel">
                        <div class="row">
                            <div class="col-lg-3">
                                <?php if (!empty($authUser['profile_image'])) { ?>
                                    <img src="<?= PROFILE_IMAGE_PATH . $authUser['profile_image'] ?>" alt='Admin'
                                         width='180'/>
                                
                                <?php } ?>
                            
                            </div>
                            <div class="col-lg-9">
                                
                                <div class="form-group">
                                    <div class="input-group u-file-attach-v1 g-brd-gray-light-v2">
                                        <input class="form-control form-control-md rounded-0" placeholder="Select Image"
                                               readonly="" id="selectedFile" type="text">
                                        <div class="input-group-btn">
                                            <button class="btn btn-md h-100 u-btn-primary rounded-0" type="submit">
                                                Browse
                                            </button>
                                            <input type="file" name="profile_image" class="form-control"
                                                   id="profileImage">
                                        </div>
                                    </div>
                                </div>
                                <p class="help-block"><?= __('Only these files extension are allowed: .png , .jpeg and .jpg') ?></p>
                            </div>
                        
                        </div>
                    </div>
                </div>
                
                <div class="form-group g-mb-30">
                    <label class="g-mb-10"><?= __('First Name') ?></label>
                    <div class="g-pos-rel">
                        
                        <?= $this->Form->control('first_name', ['class' => 'form-control g-brd-gray-light-v3--focus g-py-10', 'placeholder' => 'First Name', 'label' => false, 'required' => false]) ?>
                    </div>
                </div>
                <div class="form-group g-mb-30">
                    <label class="g-mb-10"><?= __('Last Name') ?></label>
                    <div class="g-pos-rel">
            
                        <?= $this->Form->control('last_name', ['class' => 'form-control g-brd-gray-light-v3--focus g-py-10', 'placeholder' => 'Last Name', 'label' => false, 'required' => false]) ?>
                    </div>
                </div>
                <div class="form-group g-mb-30">
                    <label class="g-mb-10"><?= __('Email') ?></label>
                    <div class="g-pos-rel">
                        <?= $this->Form->control('email', ['class' => 'form-control g-brd-gray-light-v3--focus g-py-10', 'placeholder' => 'Email', 'label' => false, 'required' => false, 'type' => 'email', 'readonly' => 'readonly']) ?>
                    </div>
                </div>
                <div class="form-group g-mb-30">
                    <label class="g-mb-10"><?= __('Password') ?></label>
                    <div class="g-pos-rel">
                        <?= $this->Form->control('password', ['value' => "", 'class' => 'form-control g-brd-gray-light-v3--focus g-py-10', 'placeholder' => 'Password', 'id' => 'Password', 'label' => false, 'required' => false]) ?>
                    </div>
                </div>
                <div class="form-group g-mb-30">
                    <label class="g-mb-10"><?= __('Confirm Password') ?></label>
                    <div class="g-pos-rel">
                        <?= $this->Form->control('confirm_password', ['value' => "", 'class' => 'form-control g-brd-gray-light-v3--focus g-py-10', 'placeholder' => 'Confirm Password', 'label' => false, 'required' => false, 'type' => 'password']) ?>
                    </div>
                </div>
                
                <div class="form-group g-mb-30">
                    <div class="input-group-btn">
                        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
                    </div>
                </div>
                <?= $this->Form->end() ?>
            </div>
            <!-- /.box -->
        </div>
        
        <!-- /.row -->
    </section>
</section>


<script>
    $(function () {
        $('#profileImage').change(function () {
            var file = document.getElementById('profileImage');
            $('#selectedFile').val(file.files.item(0).name);
        });
        
        $("#adminProfileForm").validate({
            rules: {
                first_name: {
                    required: true
                },
                last_name: {
                    required: true
                },
                confirm_password: {
                    equalTo: "#Password"
                }
            },
            messages: {
                first_name: {
                    required: "Please enter first name.",
                },
                last_name: {
                    required: "Please enter last name.",
                },
                confirm_password: {
                    equalTo: "Password does not match"
                }
            }
        });
    });

</script>
