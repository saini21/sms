<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>

<div class="message warning noty_bar noty_type__warning noty_theme__unify--v1 noty_close_with_click noty_close_with_button g-mb-25"
     style="position: fixed; top: 10%; right: 2% !important; width: 50%; margin: 0px; ">
    <div class="noty_close_button pull-right" id="ntfMsg"><b>&times;</b></div>
    <div class="noty_body">
        <div class="g-mr-20">
            <div class="noty_body__icon">
                <i class="hs-admin-bolt"></i>
            </div>
        </div>
        
        <div><b><?= $message ?></b></div>
    </div>


</div>
<script>
    $(function () {
        $('#ntfMsg').click(function () {
            $(this).parent().fadeOut();
        });
    });
</script>
