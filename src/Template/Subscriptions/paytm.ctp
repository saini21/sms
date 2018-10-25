<div class="row" style="margin:10% 0px 0px 0px;">
    <div class="col-md-4">&nbsp;</div>
    <div class="col-md-4"><?= $this->Html->image('paytm_logo.png', ['alt' => 'PayTM']); ?></div>
    <div class="col-md-4">&nbsp;</div>
</div>
<div class="row" style="margin: 0px;">
    <div class="col-md-4">&nbsp;</div>
    <div class="col-md-4"><h2 class="text-center">Please do not refresh this page...</h2></div>
    <div class="col-md-4">&nbsp;</div>
</div>

<form method="post" action="<?php echo PAYTM_TXN_URL ?>" name="f1">
    <div class="row" style="margin: 0px;">
        <div class="col-md-4">&nbsp;</div>
        <div class="col-md-4">
            <?php
            foreach ($params as $name => $value) {
                echo '<input type="hidden" name="' . $name . '" value="' . $value . '"> <br />';
            }
            ?>
            <input type="hidden" name="CHECKSUMHASH" value="<?= $checkSum ?>"><br/>
            <input type="submit" value="Submit" />
            <script type="text/javascript">
                document.f1.submit();
            </script>
        </div>
        <div class="col-md-4">&nbsp;</div>
    </div>
</form>
