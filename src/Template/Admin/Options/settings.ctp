<style>
    .nav {
        padding-left: 0;
        margin-bottom: 0;
        list-style: none
    }

    .nav > li {
        position: relative;
        display: block
    }

    .nav > li > a {
        position: relative;
        display: block;
        padding: 10px 15px
    }

    .nav > li > a:focus, .nav > li > a:hover {
        text-decoration: none;
        background-color: #eee
    }

    .nav > li.disabled > a {
        color: #777
    }

    .nav > li.disabled > a:focus, .nav > li.disabled > a:hover {
        color: #777;
        text-decoration: none;
        cursor: not-allowed;
        background-color: transparent
    }

    .nav .open > a, .nav .open > a:focus, .nav .open > a:hover {
        background-color: #eee;
        border-color: #337ab7
    }

    .nav .nav-divider {
        height: 1px;
        margin: 9px 0;
        overflow: hidden;
        background-color: #e5e5e5
    }

    .nav > li > a > img {
        max-width: none
    }

    .nav-tabs {
        border-bottom: 1px solid #ddd
    }

    .nav-tabs > li {
        float: left;
        margin-bottom: -1px
    }

    .nav-tabs > li > a {
        margin-right: 2px;
        line-height: 1.42857143;
        border: 1px solid transparent;
        border-radius: 4px 4px 0 0
    }

    .nav-tabs > li > a:hover {
        border-color: #eee #eee #ddd
    }

    .nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover {
        color: #555;
        cursor: default;
        background-color: #fff;
        border: 1px solid #ddd;
        border-bottom-color: transparent
    }

    .nav-tabs.nav-justified {
        width: 100%;
        border-bottom: 0
    }

    .nav-tabs.nav-justified > li {
        float: none
    }

    .nav-tabs.nav-justified > li > a {
        margin-bottom: 5px;
        text-align: center
    }

    .nav-tabs.nav-justified > .dropdown .dropdown-menu {
        top: auto;
        left: auto
    }

    @media (min-width: 768px) {
        .nav-tabs.nav-justified > li {
            display: table-cell;
            width: 1%
        }

        .nav-tabs.nav-justified > li > a {
            margin-bottom: 0
        }
    }

    .nav-tabs.nav-justified > li > a {
        margin-right: 0;
        border-radius: 4px
    }

    .nav-tabs.nav-justified > .active > a, .nav-tabs.nav-justified > .active > a:focus, .nav-tabs.nav-justified > .active > a:hover {
        border: 1px solid #ddd
    }

    @media (min-width: 768px) {
        .nav-tabs.nav-justified > li > a {
            border-bottom: 1px solid #ddd;
            border-radius: 4px 4px 0 0
        }

        .nav-tabs.nav-justified > .active > a, .nav-tabs.nav-justified > .active > a:focus, .nav-tabs.nav-justified > .active > a:hover {
            border-bottom-color: #fff
        }
    }

    .nav-pills > li {
        float: left
    }

    .nav-pills > li > a {
        border-radius: 4px
    }

    .nav-pills > li + li {
        margin-left: 2px
    }

    .nav-pills > li.active > a, .nav-pills > li.active > a:focus, .nav-pills > li.active > a:hover {
        color: #fff;
        background-color: #337ab7
    }

    .nav-stacked > li {
        float: none
    }

    .nav-stacked > li + li {
        margin-top: 2px;
        margin-left: 0
    }

    .nav-justified {
        width: 100%
    }

    .nav-justified > li {
        float: none
    }

    .nav-justified > li > a {
        margin-bottom: 5px;
        text-align: center
    }

    .nav-justified > .dropdown .dropdown-menu {
        top: auto;
        left: auto
    }

    @media (min-width: 768px) {
        .nav-justified > li {
            display: table-cell;
            width: 1%
        }

        .nav-justified > li > a {
            margin-bottom: 0
        }
    }

    .nav-tabs-justified {
        border-bottom: 0
    }

    .nav-tabs-justified > li > a {
        margin-right: 0;
        border-radius: 4px
    }

    .nav-tabs-justified > .active > a, .nav-tabs-justified > .active > a:focus, .nav-tabs-justified > .active > a:hover {
        border: 1px solid #ddd
    }

    @media (min-width: 768px) {
        .nav-tabs-justified > li > a {
            border-bottom: 1px solid #ddd;
            border-radius: 4px 4px 0 0
        }

        .nav-tabs-justified > .active > a, .nav-tabs-justified > .active > a:focus, .nav-tabs-justified > .active > a:hover {
            border-bottom-color: #fff
        }
    }

    .tab-content > .tab-pane {
        display: none
    }

    .tab-content > .active {
        display: block
    }

    .nav-tabs .dropdown-menu {
        margin-top: -1px;
        border-top-left-radius: 0;
        border-top-right-radius: 0
    }

    .navbar {
        position: relative;
        min-height: 50px;
        margin-bottom: 20px;
        border: 1px solid transparent
    }

    @media (min-width: 768px) {
        .navbar {
            border-radius: 4px
        }
    }

    @media (min-width: 768px) {
        .navbar-header {
            float: left
        }
    }

    .navbar-collapse {
        padding-right: 15px;
        padding-left: 15px;
        overflow-x: visible;
        -webkit-overflow-scrolling: touch;
        border-top: 1px solid transparent;
        -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, .1);
        box-shadow: inset 0 1px 0 rgba(255, 255, 255, .1)
    }

    .navbar-collapse.in {
        overflow-y: auto
    }

    @media (min-width: 768px) {
        .navbar-collapse {
            width: auto;
            border-top: 0;
            -webkit-box-shadow: none;
            box-shadow: none
        }

        .navbar-collapse.collapse {
            display: block !important;
            height: auto !important;
            padding-bottom: 0;
            overflow: visible !important
        }

        .navbar-collapse.in {
            overflow-y: visible
        }

        .navbar-fixed-bottom .navbar-collapse, .navbar-fixed-top .navbar-collapse, .navbar-static-top .navbar-collapse {
            padding-right: 0;
            padding-left: 0
        }
    }

    .navbar-fixed-bottom .navbar-collapse, .navbar-fixed-top .navbar-collapse {
        max-height: 340px
    }

    @media (max-device-width: 480px) and (orientation: landscape) {
        .navbar-fixed-bottom .navbar-collapse, .navbar-fixed-top .navbar-collapse {
            max-height: 200px
        }
    }

    .container-fluid > .navbar-collapse, .container-fluid > .navbar-header, .container > .navbar-collapse, .container > .navbar-header {
        margin-right: -15px;
        margin-left: -15px
    }

    @media (min-width: 768px) {
        .container-fluid > .navbar-collapse, .container-fluid > .navbar-header, .container > .navbar-collapse, .container > .navbar-header {
            margin-right: 0;
            margin-left: 0
        }
    }

    .navbar-static-top {
        z-index: 1000;
        border-width: 0 0 1px
    }

    @media (min-width: 768px) {
        .navbar-static-top {
            border-radius: 0
        }
    }

    .navbar-fixed-bottom, .navbar-fixed-top {
        position: fixed;
        right: 0;
        left: 0;
        z-index: 1030
    }

    @media (min-width: 768px) {
        .navbar-fixed-bottom, .navbar-fixed-top {
            border-radius: 0
        }
    }

    .navbar-fixed-top {
        top: 0;
        border-width: 0 0 1px
    }

    .navbar-fixed-bottom {
        bottom: 0;
        margin-bottom: 0;
        border-width: 1px 0 0
    }

    .navbar-brand {
        float: left;
        height: 50px;
        padding: 15px 15px;
        font-size: 18px;
        line-height: 20px
    }

    .navbar-brand:focus, .navbar-brand:hover {
        text-decoration: none
    }

    .navbar-brand > img {
        display: block
    }

    @media (min-width: 768px) {
        .navbar > .container .navbar-brand, .navbar > .container-fluid .navbar-brand {
            margin-left: -15px
        }
    }

    .navbar-toggle {
        position: relative;
        float: right;
        padding: 9px 10px;
        margin-top: 8px;
        margin-right: 15px;
        margin-bottom: 8px;
        background-color: transparent;
        background-image: none;
        border: 1px solid transparent;
        border-radius: 4px
    }

    .navbar-toggle:focus {
        outline: 0
    }

    .navbar-toggle .icon-bar {
        display: block;
        width: 22px;
        height: 2px;
        border-radius: 1px
    }

    .navbar-toggle .icon-bar + .icon-bar {
        margin-top: 4px
    }

    @media (min-width: 768px) {
        .navbar-toggle {
            display: none
        }
    }

    .navbar-nav {
        margin: 7.5px -15px
    }

    .navbar-nav > li > a {
        padding-top: 10px;
        padding-bottom: 10px;
        line-height: 20px
    }

    @media (max-width: 767px) {
        .navbar-nav .open .dropdown-menu {
            position: static;
            float: none;
            width: auto;
            margin-top: 0;
            background-color: transparent;
            border: 0;
            -webkit-box-shadow: none;
            box-shadow: none
        }

        .navbar-nav .open .dropdown-menu .dropdown-header, .navbar-nav .open .dropdown-menu > li > a {
            padding: 5px 15px 5px 25px
        }

        .navbar-nav .open .dropdown-menu > li > a {
            line-height: 20px
        }

        .navbar-nav .open .dropdown-menu > li > a:focus, .navbar-nav .open .dropdown-menu > li > a:hover {
            background-image: none
        }
    }

    @media (min-width: 768px) {
        .navbar-nav {
            float: left;
            margin: 0
        }

        .navbar-nav > li {
            float: left
        }

        .navbar-nav > li > a {
            padding-top: 15px;
            padding-bottom: 15px
        }
    }

    .navbar-form {
        padding: 10px 15px;
        margin-top: 8px;
        margin-right: -15px;
        margin-bottom: 8px;
        margin-left: -15px;
        border-top: 1px solid transparent;
        border-bottom: 1px solid transparent;
        -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, .1), 0 1px 0 rgba(255, 255, 255, .1);
        box-shadow: inset 0 1px 0 rgba(255, 255, 255, .1), 0 1px 0 rgba(255, 255, 255, .1)
    }

    @media (min-width: 768px) {
        .navbar-form .form-group {
            display: inline-block;
            margin-bottom: 0;
            vertical-align: middle
        }

        .navbar-form .form-control {
            display: inline-block;
            width: auto;
            vertical-align: middle
        }

        .navbar-form .form-control-static {
            display: inline-block
        }

        .navbar-form .input-group {
            display: inline-table;
            vertical-align: middle
        }

        .navbar-form .input-group .form-control, .navbar-form .input-group .input-group-addon, .navbar-form .input-group .input-group-btn {
            width: auto
        }

        .navbar-form .input-group > .form-control {
            width: 100%
        }

        .navbar-form .control-label {
            margin-bottom: 0;
            vertical-align: middle
        }

        .navbar-form .checkbox, .navbar-form .radio {
            display: inline-block;
            margin-top: 0;
            margin-bottom: 0;
            vertical-align: middle
        }

        .navbar-form .checkbox label, .navbar-form .radio label {
            padding-left: 0
        }

        .navbar-form .checkbox input[type=checkbox], .navbar-form .radio input[type=radio] {
            position: relative;
            margin-left: 0
        }

        .navbar-form .has-feedback .form-control-feedback {
            top: 0
        }
    }

    @media (max-width: 767px) {
        .navbar-form .form-group {
            margin-bottom: 5px
        }

        .navbar-form .form-group:last-child {
            margin-bottom: 0
        }
    }

    @media (min-width: 768px) {
        .navbar-form {
            width: auto;
            padding-top: 0;
            padding-bottom: 0;
            margin-right: 0;
            margin-left: 0;
            border: 0;
            -webkit-box-shadow: none;
            box-shadow: none
        }
    }

    .navbar-nav > li > .dropdown-menu {
        margin-top: 0;
        border-top-left-radius: 0;
        border-top-right-radius: 0
    }

    .navbar-fixed-bottom .navbar-nav > li > .dropdown-menu {
        margin-bottom: 0;
        border-top-left-radius: 4px;
        border-top-right-radius: 4px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0
    }

    .navbar-btn {
        margin-top: 8px;
        margin-bottom: 8px
    }

    .navbar-btn.btn-sm {
        margin-top: 10px;
        margin-bottom: 10px
    }

    .navbar-btn.btn-xs {
        margin-top: 14px;
        margin-bottom: 14px
    }

    .navbar-text {
        margin-top: 15px;
        margin-bottom: 15px
    }

    @media (min-width: 768px) {
        .navbar-text {
            float: left;
            margin-right: 15px;
            margin-left: 15px
        }
    }

    @media (min-width: 768px) {
        .navbar-left {
            float: left !important
        }

        .navbar-right {
            float: right !important;
            margin-right: -15px
        }

        .navbar-right ~ .navbar-right {
            margin-right: 0
        }
    }

    .navbar-default {
        background-color: #f8f8f8;
        border-color: #e7e7e7
    }

    .navbar-default .navbar-brand {
        color: #777
    }

    .navbar-default .navbar-brand:focus, .navbar-default .navbar-brand:hover {
        color: #5e5e5e;
        background-color: transparent
    }

    .navbar-default .navbar-text {
        color: #777
    }

    .navbar-default .navbar-nav > li > a {
        color: #777
    }

    .navbar-default .navbar-nav > li > a:focus, .navbar-default .navbar-nav > li > a:hover {
        color: #333;
        background-color: transparent
    }

    .navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:focus, .navbar-default .navbar-nav > .active > a:hover {
        color: #555;
        background-color: #e7e7e7
    }

    .navbar-default .navbar-nav > .disabled > a, .navbar-default .navbar-nav > .disabled > a:focus, .navbar-default .navbar-nav > .disabled > a:hover {
        color: #ccc;
        background-color: transparent
    }

    .navbar-default .navbar-toggle {
        border-color: #ddd
    }

    .navbar-default .navbar-toggle:focus, .navbar-default .navbar-toggle:hover {
        background-color: #ddd
    }

    .navbar-default .navbar-toggle .icon-bar {
        background-color: #888
    }

    .navbar-default .navbar-collapse, .navbar-default .navbar-form {
        border-color: #e7e7e7
    }

    .navbar-default .navbar-nav > .open > a, .navbar-default .navbar-nav > .open > a:focus, .navbar-default .navbar-nav > .open > a:hover {
        color: #555;
        background-color: #e7e7e7
    }

    @media (max-width: 767px) {
        .navbar-default .navbar-nav .open .dropdown-menu > li > a {
            color: #777
        }

        .navbar-default .navbar-nav .open .dropdown-menu > li > a:focus, .navbar-default .navbar-nav .open .dropdown-menu > li > a:hover {
            color: #333;
            background-color: transparent
        }

        .navbar-default .navbar-nav .open .dropdown-menu > .active > a, .navbar-default .navbar-nav .open .dropdown-menu > .active > a:focus, .navbar-default .navbar-nav .open .dropdown-menu > .active > a:hover {
            color: #555;
            background-color: #e7e7e7
        }

        .navbar-default .navbar-nav .open .dropdown-menu > .disabled > a, .navbar-default .navbar-nav .open .dropdown-menu > .disabled > a:focus, .navbar-default .navbar-nav .open .dropdown-menu > .disabled > a:hover {
            color: #ccc;
            background-color: transparent
        }
    }

    .navbar-default .navbar-link {
        color: #777
    }

    .navbar-default .navbar-link:hover {
        color: #333
    }

    .navbar-default .btn-link {
        color: #777
    }

    .navbar-default .btn-link:focus, .navbar-default .btn-link:hover {
        color: #333
    }

    .navbar-default .btn-link[disabled]:focus, .navbar-default .btn-link[disabled]:hover, fieldset[disabled] .navbar-default .btn-link:focus, fieldset[disabled] .navbar-default .btn-link:hover {
        color: #ccc
    }

    .navbar-inverse {
        background-color: #222;
        border-color: #080808
    }

    .navbar-inverse .navbar-brand {
        color: #9d9d9d
    }

    .navbar-inverse .navbar-brand:focus, .navbar-inverse .navbar-brand:hover {
        color: #fff;
        background-color: transparent
    }

    .navbar-inverse .navbar-text {
        color: #9d9d9d
    }

    .navbar-inverse .navbar-nav > li > a {
        color: #9d9d9d
    }

    .navbar-inverse .navbar-nav > li > a:focus, .navbar-inverse .navbar-nav > li > a:hover {
        color: #fff;
        background-color: transparent
    }

    .navbar-inverse .navbar-nav > .active > a, .navbar-inverse .navbar-nav > .active > a:focus, .navbar-inverse .navbar-nav > .active > a:hover {
        color: #fff;
        background-color: #080808
    }

    .navbar-inverse .navbar-nav > .disabled > a, .navbar-inverse .navbar-nav > .disabled > a:focus, .navbar-inverse .navbar-nav > .disabled > a:hover {
        color: #444;
        background-color: transparent
    }

    .navbar-inverse .navbar-toggle {
        border-color: #333
    }

    .navbar-inverse .navbar-toggle:focus, .navbar-inverse .navbar-toggle:hover {
        background-color: #333
    }

    .navbar-inverse .navbar-toggle .icon-bar {
        background-color: #fff
    }

    .navbar-inverse .navbar-collapse, .navbar-inverse .navbar-form {
        border-color: #101010
    }

    .navbar-inverse .navbar-nav > .open > a, .navbar-inverse .navbar-nav > .open > a:focus, .navbar-inverse .navbar-nav > .open > a:hover {
        color: #fff;
        background-color: #080808
    }

    @media (max-width: 767px) {
        .navbar-inverse .navbar-nav .open .dropdown-menu > .dropdown-header {
            border-color: #080808
        }

        .navbar-inverse .navbar-nav .open .dropdown-menu .divider {
            background-color: #080808
        }

        .navbar-inverse .navbar-nav .open .dropdown-menu > li > a {
            color: #9d9d9d
        }

        .navbar-inverse .navbar-nav .open .dropdown-menu > li > a:focus, .navbar-inverse .navbar-nav .open .dropdown-menu > li > a:hover {
            color: #fff;
            background-color: transparent
        }

        .navbar-inverse .navbar-nav .open .dropdown-menu > .active > a, .navbar-inverse .navbar-nav .open .dropdown-menu > .active > a:focus, .navbar-inverse .navbar-nav .open .dropdown-menu > .active > a:hover {
            color: #fff;
            background-color: #080808
        }

        .navbar-inverse .navbar-nav .open .dropdown-menu > .disabled > a, .navbar-inverse .navbar-nav .open .dropdown-menu > .disabled > a:focus, .navbar-inverse .navbar-nav .open .dropdown-menu > .disabled > a:hover {
            color: #444;
            background-color: transparent
        }
    }

    .navbar-inverse .navbar-link {
        color: #9d9d9d
    }

    .navbar-inverse .navbar-link:hover {
        color: #fff
    }

    .navbar-inverse .btn-link {
        color: #9d9d9d
    }

    .navbar-inverse .btn-link:focus, .navbar-inverse .btn-link:hover {
        color: #fff
    }
</style>
<nav class="large-3 medium-4 columns">
    <ul class="breadcrumb">
        <li class="heading g-mr-10"><?= __('Actions') ?></li>
        <li class="g-mr-10">|</li>
        <li class="heading g-mr-10"><?= __('Settings') ?></li>
    </ul>
</nav>
<h3 class="g-font-weight-300 g-font-size-28 g-color-black g-mb-30"><?= __('Settings') ?></h3>
<ul class="nav nav-tabs">
    <?php foreach ($categories as $c) {
        ; ?>
        <li class="option-tab <?= ($category == $c['category']) ? "active" : "" ?>"><a
                    href="<?= $this->Url->build(['controller' => 'Options', 'action' => 'settings', urlencode($c['category'])]); ?>"><?= $c['category'] ?></a>
        </li>
    <?php } ?>
</ul>

<div class="tab-content">
    <?php foreach ($categories as $c) {
        ; ?>
        <div class="tab-pane <?= ($category == $c['category']) ? "active" : "" ?>">
            <h4><?= $c['category'] ?></h4>
            <br/>
            <?php if($category == $c['category']){ ?>
            <?php foreach ($options as $o) { ?>
                <div class="row">
                    <div class="col-lg-1">&nbsp;</div>
                    <div class="col-lg-7">
                        <label class="label">
                            <b><?= ucwords(str_replace("_", " ", $o->option_name)) ?></b>
                        </label>
                        <input type="text" name="<?= $o->option_name ?>"
                               value="<?= (empty($o->option_value) ? $o->default_value : $o->option_value) ?>"
                               class="form-control save-option" />
                    </div>
                    <div class="col-lg-4">
                        <i class="fa fa-check saved-sign" id="<?= $o->option_name ?>"                            style="margin: 30px 0 0 0; color:#63bd5c; font-size: 30px;"  title="Saved"></i>
                    </div>
                </div>
                    <br/>
                <?php } ?>

            <?php } ?>
        </div>
    <?php } ?>
</div>

<script>
    $(function () {
        $('.saved-sign').hide();
        $('.save-option').blur(function () {
            var name = $(this).attr('name');
            var value = $(this).val();
            $.ajax({
                type: 'POST',
                url: SITE_URL + '/admin/options/save',
                data: {name, value},
                dataType: 'json',
                success: function (data) {
                    $('#' + data.data.name ).fadeIn();
                }
            });

        });
    });
</script>
