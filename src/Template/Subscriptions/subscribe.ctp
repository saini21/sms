<div class="row">
    <div class="col-md-1">&nbsp;</div>
    <div class="col-md-10"><?= $this->Html->image('paytm_logo.png', ['alt' => 'PayTM']); ?></div>
    <div class="col-md-1">&nbsp;</div>
</div>
<div class="row" style="margin: 0px;">
    <div class="col-md-1">&nbsp;</div>
    <div class="col-md-10"><h2 style="padding-left: 50px;">Please pay Rs. <?= $package->price; ?> via PayTM to
            subscribe.</h2></div>
    <div class="col-md-1">&nbsp;</div>
</div>

<div class="row" style="margin: 0px;">
    <div class="col-md-1">&nbsp;</div>
    <div class="col-md-6"><?= $this->Html->image('paytm.jpeg', ['alt' => 'PayTM', 'width' => '500']); ?></div>
    <div class="col-md-5">&nbsp;</div>
</div>

<div class="row" style="margin: 0px;">
    <div class="col-md-1">&nbsp;</div>
    <div class="col-md-6">
        <form action="<?= $this->Url->build(['controller' => 'Subscriptions', 'action' => 'subscribeApi']); ?>"
              method="post" id="subscribeForm">
            
            <label>Please enter transaction number or Paytm Order Number, we'll verify within 24 hours and activate your
                subscription package.</label>
            <input type="hidden" name="p" value="<?= base64_encode($package->id); ?>">
            <input type="text" name="response" placeholder="Order / Transaction Number" value=""
                   class="form-control"/><br/>
            
            
            <button class="btn btn-info">Payment made, Submit for verification</button>
        </form>
    
    </div>
    <div class="col-md-5">&nbsp;</div>
</div>

<script>
    $(document).ready(function () {
        
        
        $("#subscribeForm").validate({
            ignore: ":hidden:not(#iAccept)",
            rules: {
                response: {
                    required: true
                }
            },
            messages: {
                response: {
                    required: "Please enter Order / Transaction Number."
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

