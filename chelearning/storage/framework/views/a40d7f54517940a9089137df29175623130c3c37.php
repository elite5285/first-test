
<?php $__env->startSection('title', 'Currency - Admin'); ?>
<?php $__env->startSection('body'); ?>
 
<section class="content">
   <?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<div class="row">
        <div class="col-xs-12">
        	<div class="box box-primary">
	           	<div class="box-header with-border">
              	<h3 class="box-title"><?php echo e(__('adminstaticword.Currency')); ?></h3>
           		</div>
	          	<div class="panel-body">
	          		<form action="<?php echo e(action('CurrencyController@update')); ?>" method="POST" enctype="multipart/form-data">
		                <?php echo e(csrf_field()); ?>

		                <?php echo e(method_field('PUT')); ?>

		                
		              	<div class="row">
		                  <div class="col-md-6">
		                    <label for="icon"><?php echo e(__('adminstaticword.Icon')); ?><sup class="redstar">*</sup></label>
		                    <input value="<?php echo e($show['icon']); ?>" name="icon" type="text" class="form-control icp-auto icp" placeholder="Select Icon" autocomplete="off"/>

		                  </div>
		              	
		                  <div class="col-md-6">
		                    <label for="currency"><?php echo e(__('adminstaticword.Currency')); ?><sup class="redstar">*</sup></label>
		                    <input value="<?php echo e($show['currency']); ?>" name="currency" type="text" class="form-control" placeholder="Ex:INR" autocomplete="off" />
		                  </div>
		              	</div>
		              	<br>
						<div class="box-footer">
		              		<button value="" type="submit"  class="btn btn-md col-md-1 btn-primary"><?php echo e(__('adminstaticword.Save')); ?></button>
		              	</div>

		              	

		          	</form>
	          	</div>
	      	</div>
      	</div>
  	</div>
</section>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>

<script>
(function($) {
"use strict";
   $('.icp-auto').iconpicker({

     icons: ['fa fa-inr', 'fa fa-bitcoin', 'fa fa-btc', 'fa fa-cny','fa fa-dollar', 'fa fa-eur', 'fa fa-ngn', 'fa fa-cedi', 'fa fa-rial', 'fa fa-dinar', 'fa fa-tugrik', 'fa fa-brazilian-real', 'fa fa-idr', 'fa fa-shillings', 'fa-gg-circle','fa fa-gg','fa fa-rub','fa fa-ils','fa fa-try','fa fa-krw','fa fa-gbp','fa fa-zar','fa fa-rs','fa fa-pula','fa fa-aud','fa fa-egy','fa fa-taka','fa fa-mal','fa fa-rub','fa fa-brl','fa fa-zwl','fa fa-ngr','fa fa-eutho','fa fa-sgd', 
     	 'fa fa-lkr', 'fa fa-mad'],

    
     selectedCustomClass: 'label label-success',
     selectedCustomClass: 'label label-success',
     mustAccept: true,
     hideOnSelect: true,
   });
})(jQuery);
</script>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/cherif/Desktop/PFELearning/resources/views/admin/currency/edit.blade.php ENDPATH**/ ?>