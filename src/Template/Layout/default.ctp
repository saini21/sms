<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= SITE_TITLE ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    
    <script type="text/javascript">
        var SITE_URL = '<?= SITE_URL ?>';
    </script>
    
    
    <?= $this->Html->css([
        'vendor/bootstrap/bootstrap.min',
        'vendor/icon-awesome/css/font-awesome.min',
        'vendor/icon-line/css/simple-line-icons',
        'vendor/icon-etlinefont/style',
        'vendor/icon-line-pro/style',
        'vendor/icon-hs/style',
        'vendor/hs-admin-icons/hs-admin-icons',
        
        'vendor/animate',
        'vendor/malihu-scrollbar/jquery.mCustomScrollbar.min',
        'vendor/flatpickr/dist/css/flatpickr.min',
        'vendor/bootstrap-select/css/bootstrap-select.min',
        'vendor/chartist-js/chartist.min',
        'vendor/chartist-js-tooltip/chartist-plugin-tooltip',
        
        'vendor/fancybox/jquery.fancybox.min',
        'vendor/hamburgers/hamburgers.min',
        'unify-admin',
        'default_custom',
    ]) ?>
    
    <?= $this->Html->script([
        'vendor/jquery/jquery.min',
        'vendor/jquery-migrate/jquery-migrate.min',
        'vendor/popper.min',
        'vendor/bootstrap/bootstrap.min',
        'vendor/cookiejs/jquery.cookie',
        
        
        'vendor/jquery-ui/ui/widget',
        'vendor/jquery-ui/ui/version',
        'vendor/jquery-ui/ui/keycode',
        'vendor/jquery-ui/ui/position',
        'vendor/jquery-ui/ui/unique-id',
        'vendor/jquery-ui/ui/safe-active-element',
        
        'vendor/jquery-ui/ui/widgets/menu',
        'vendor/jquery-ui/ui/widgets/mouse',
        
        'vendor/jquery-ui/ui/widgets/datepicker',
        
        'vendor/appear',
        'vendor/bootstrap-select/js/bootstrap-select.min',
        'vendor/flatpickr/dist/js/flatpickr.min',
        'vendor/malihu-scrollbar/jquery.mCustomScrollbar.concat.min',
        'vendor/chartist-js/chartist.min',
        'vendor/chartist-js-tooltip/chartist-plugin-tooltip',
        'vendor/fancybox/jquery.fancybox.min',
        
        'hs.core.js',
        'components/hs.side-nav',
        'helpers/hs.hamburgers',
        'components/hs.range-datepicker',
        'components/hs.datepicker',
        'components/hs.dropdown',
        'components/hs.scrollbar',
        'components/hs.area-chart',
        'components/hs.donut-chart',
        'components/hs.bar-chart',
        'helpers/hs.focus-state',
        'components/hs.popup',
        'jquery.validate.min',
        'default_custom',
    
    ]) ?>
    
    
    
    <?= $this->fetch('script') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>

</head>
<body>
<main>
    <?= $this->element('default_header') ?>
    <main class="container-fluid px-0 g-pt-65">
        <div class="row no-gutters g-pos-rel g-overflow-x-hidden">
            <?= $this->element('default_sidebar') ?>
            <?= $this->Flash->render() ?>
            <div class="col g-ml-45 g-ml-0--lg g-pb-65--md">
                <section class="g-pa-20">
                    <section class="g-brd-around g-brd-gray-light-v7 g-rounded-4 g-pa-15 g-pa-20--md g-mb-30">
                        <?= $this->fetch('content') ?>
                    </section>
                </section>
                <?= $this->element('default_footer') ?>
            </div>
        </div>
    </main>
</main>
<script>
    $(document).on('ready', function () {
        // initialization of custom select
        $('.js-select').selectpicker();
        
        // initialization of hamburger
        $.HSCore.helpers.HSHamburgers.init('.hamburger');
        
        // initialization of charts
        $.HSCore.components.HSAreaChart.init('.js-area-chart');
        $.HSCore.components.HSDonutChart.init('.js-donut-chart');
        $.HSCore.components.HSBarChart.init('.js-bar-chart');
        
        // initialization of sidebar navigation component
        $.HSCore.components.HSSideNav.init('.js-side-nav', {
            afterOpen: function () {
                setTimeout(function () {
                    $.HSCore.components.HSAreaChart.init('.js-area-chart');
                    $.HSCore.components.HSDonutChart.init('.js-donut-chart');
                    $.HSCore.components.HSBarChart.init('.js-bar-chart');
                }, 400);
            },
            afterClose: function () {
                setTimeout(function () {
                    $.HSCore.components.HSAreaChart.init('.js-area-chart');
                    $.HSCore.components.HSDonutChart.init('.js-donut-chart');
                    $.HSCore.components.HSBarChart.init('.js-bar-chart');
                }, 400);
            }
        });
        
        // initialization of range datepicker
        $.HSCore.components.HSRangeDatepicker.init('#rangeDatepicker, #rangeDatepicker2, #rangeDatepicker3');
        
        
        // initialization of HSDropdown component
        $.HSCore.components.HSDropdown.init($('[data-dropdown-target]'), {dropdownHideOnScroll: false});
        
        // initialization of custom scrollbar
        $.HSCore.components.HSScrollBar.init($('.js-custom-scroll'));
        
    });
</script>

</body>
</html>
