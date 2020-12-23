<!DOCTYPE html>

<?php
$language = Session::get('changed_language'); //or 'english' //set the system language
$rtl = array('ar','he','ur', 'arc', 'az', 'dv', 'ku', 'fa'); //make a list of rtl languages
?>

<html lang="en" <?php if(in_array($language,$rtl)): ?> dir="rtl" <?php endif; ?>>
<!-- <![endif]-->
<!-- head -->
<?php echo $__env->make('theme.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- end head -->
<!-- body start-->
<body>
<!-- preloader --> 
<?php if($gsetting->preloader_enable == 1): ?>

<div class="preloader">
    <div class="status">
      <?php if(isset($gsetting->preloader_logo)): ?>
        <div class="status-message">
        	<img src="<?php echo e(asset('images/logo/'.$gsetting['preloader_logo'])); ?>" alt="logo" class="img-fluid">
        </div>
      <?php endif; ?>
    </div>
</div>

<?php endif; ?>

<div id="myButton"></div>


<?php
  if(isset(Auth::user()->orders)){
      
  }
?>
<!-- end preloader -->
<!-- top-nav bar start-->
<?php echo $__env->make('theme.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- top-nav bar end-->
<!-- home start -->
<?php echo $__env->yieldContent('content'); ?>
<!-- testimonial end -->
<!-- footer start -->
<?php echo $__env->make('theme.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- footer end -->
<!-- jquery -->
<?php echo $__env->make('theme.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- end jquery -->
</body>
<!-- body end -->
</html> 
<?php /**PATH /Users/cherif/Desktop/chelearning/resources/views/theme/master.blade.php ENDPATH**/ ?>