<!doctype html>
<html lang='<?=PrintData('data','language')?>'>
<head>
    <meta charset='utf-8'/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?=PrintData('data','browser-title')?></title>
    <meta name="description" content="<?=PrintData('data','meta_description')?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='shortcut icon' href='<?=base_url().'project/'.PROJECT.'/data/img/'.PrintData('data','favicon')?>'/>
    <?php echo GetStylesheetes()?>
    <style></style>
    <?=GetJavascriptInlineBottom('head')?>
</head>
<body>
<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!--HEADER-->
<div id='outer-wrap-header'>
    <div id='inner-wrap-header'>
        <div id='header'>
            <div id='login-menu'><a title="" href="#">Login</a></div>
            <div id='banner'>

                <a href='<?=base_url()?>'>
                    <img id='site-logo' src='<?=base_url().'project/'.PROJECT.'/data/img/'.PrintData('data','site-logo')?>' alt='logo' width='<?=PrintData('data','logo-width')?>' height='<?=PrintData('data','logo-height')?>' />
                </a>

                <span id='site-title'>
                    <a href='<?=base_url(PROJECT)?>'>
                        <?=PrintData('data','site-title')?>
                    </a>
                </span>
                <?php if(RegionHaveContent('data','slogan')): ?>
                    <span id='site-slogan'>
                        <?=PrintData('data','slogan')?>
                    </span>
                <?php endif; ?>

                <?php if(RegionHaveContent('regions','site-menu')): ?>
                    <div id='site-menu'>
                        <?=PrintData('regions','site-menu')?>
                    </div>
                <?php endif; ?>
            </div>


                <div id='navbar'>
                    <?php if(RegionHaveContent('regions','navbar')): ?>
                        <?=PrintData('regions','navbar')?>
                    <?php endif; ?>
                    <!--The menu-->
                    <?=GetMenu()?>
                </div>
        </div>
        <div id='header-below'>
            <?php if(RegionHaveContent('regions','breadcrumb')):?>
                <div id='breadcrumb'><?=PrintData('regions','breadcrumb')?></div>
            <?php endif; ?>
        </div>
        <div class="clear""></div>
    </div>
    <div class="clear""></div>
</div>

<!--FLASH-->
<?php if(RegionHaveContent('regions','flash')): ?>
    <div id='outer-wrap-flash'>
        <div id='inner-wrap-flash'>
            <div class="animated slideInDown" id='flash'><?=PrintData('regions','flash')?></div>
        </div>
    </div>

<?php endif; ?>


<?php if(RegionHaveContent('regions','flash2')): ?>
    <div id='outer-wrap-flash-2'>
        <div id='inner-wrap-flash-2'>
            <div class="animated bounceInLeft" id='flash-2'><?=PrintData('regions','flash2')?></div>
        </div>
    </div>
<?php endif; ?>


<?php if(RegionHaveContent('regions','featured-first')): ?>
    <div id='outer-wrap-featured'>
        <div id='inner-wrap-featured'>
            <div id="center-featured">

                <?php if(RegionHaveContent('regions','over-featured')): ?>
                    <div class="animated bounceInLeft" id='over-featured'><?=PrintData('regions','over-featured')?></div>
                <?php endif;?>

                <div class="animated bounceInLeft" id='featured-first'><?=PrintData('regions','featured-first')?></div>
                <?php if(!RegionHaveContent('regions','featured-middle')): ?>
                    <div class="animated fadeInDown" id='featured-middle-default'><?=PrintData('regions','featured-middle')?></div>
                <?php else: ?>
                    <div class="animated fadeInDown" id='featured-middle'><?=PrintData('regions','featured-middle')?></div>
                <?php endif; ?>
                <div class="animated bounceInRight" id='featured-last'><?=PrintData('regions','featured-last')?></div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="clear"></div>
    </div>
<?php endif; ?>

<?php if(RegionHaveContent('regions','ad')): ?>
    <div id="outer-wrap-ad">
        <div id="inner-wrap-ad">
            <?=PrintData('regions','ad')?>
        </div>
    </div>
<?php endif; ?>

<!--
ERROR
-->
<?php if(RegionHaveContent('regions','error')):?>
    <div id='outer-wrap-error'>
        <div id='inner-wrap-error'>
            <div class="animated bounceInLeft" id='error'>
                <?=PrintData('regions','error')?>
            </div>
        </div>
    </div>
<?php endif;?>


<!--
PRIMARY
-->
<div id='outer-wrap-main'>
    <div id='inner-wrap-main'>
        <div id='primary'>
            <?=PrintData('data','session')?>
            <?=PrintData('regions','primary')?>
        </div>

        <?php if(RegionHaveContent('regions','sidebar')):?>
            <div id='sidebar'>
                <?=PrintData('regions','sidebar')?>
            </div>
        <?php endif; ?>

        <?php if(RegionHaveContent('regions','sidebar-ad')):?>
            <div class='sidebar-ad'><?=PrintData('regions','sidebar-ad')?></div>
        <?php endif; ?>

    </div>
</div>


<!--
PRIMARY
-->
<?php if(RegionHaveContent('regions','primary-center')):?>
<div id='outer-wrap-main2'>
    <div id='inner-wrap-main2'>
        <div id='primary2'>
            <?=PrintData('regions','primary-center')?>
        </div>
    </div>
</div>
<?php endif;?>


<?php if(RegionHaveContent('regions','full-bar-down')):?>
    <div id="full-bar-down"><?=PrintData('regions','full-bar-down')?></div>
<?php endif; ?>

<?php if(RegionHaveContent('regions','triptych-first')): ?>
    <div id='outer-wrap-triptych'>
        <div id='inner-wrap-triptych'>
            <div id='triptych-first'><?=PrintData('regions','triptych-first')?></div>
            <div id='triptych-middle'><?=PrintData('regions','triptych-middle')?></div>
            <div id='triptych-last'><?=PrintData('regions','triptych-last')?></div>
        </div>
    </div>
<?php endif; ?>




<div id='outer-wrap-footer'>
    <?php if(RegionHaveContent('regions','footer-column-one')): ?>
        <div id='inner-wrap-footer-column'>
            <div id='footer-column-one'><?=PrintData('regions','footer-column-one')?></div>
            <div id='footer-column-two'><?=PrintData('regions','footer-column-two')?></div>
            <div id='footer-column-three'><?=PrintData('regions','footer-column-three')?></div>
            <div id='footer-column-four'><?=PrintData('regions','footer-column-four')?></div>
            <div id='footer-column-five'><?=PrintData('regions','footer-column-five')?></div>
        </div>
    <?php endif; ?>

    <div style="float:right;"></div>
    <div id='inner-wrap-footer'>
        <div id="owner"><?=PrintData('data','owner')?></div>
        <div id='footer'><?=PrintData('regions','footer')?><?=PrintDebug()?></div>
    </div>
</div>













<!--JQUERY-->
<?php if(PrintData('data','jquery') != false): ?>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="<?=base_url('project/'.PROJECT.'/data/js/jquery.js')?>"><\/script>')</script>
<?php endif; ?>

<!--JAVASCRIPT FILES-->
<?=GetJavascriptFiles()?>



<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<?php if(PrintData('data','google-analytics') != false):?>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-49837310-1', 'servicelake.se');
        ga('send', 'pageview');

    </script>
<?php endif; ?>
<?=GetJavascriptInlineBottom('bottom')?>

<?php
$end = (float) array_sum(explode(' ',microtime()));

echo "Processing time: ". sprintf("%.4f", ($end-START))." seconds";
?>
</body>
</html>