<div class="modal fade" id="myModalinstructor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">

          <h4 class="modal-title" id="myModalLabel"><?php echo e(__('frontstaticword.BecomeAnInstructor')); ?></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="box box-primary">
          <div class="panel panel-sum">
            <div class="modal-body">
              <?php if(Auth::check()): ?>
              <?php
                $users = App\Instructor::where('user_id', Auth::user()->id)->first();

              ?>

              <?php if($users != NULL): ?>
                  
                  <div class="alert alert-danger" role="alert">
                    <?php echo e(__('frontstaticword.AlreadyRequest')); ?> 
                  </div>

                 

                  <form  method="post" action="<?php echo e(url('requestinstructor/'.$users->id)); ?>" data-parsley-validate class="form-horizontal form-label-left">
                      <?php echo e(csrf_field()); ?>

                      <?php echo e(method_field('DELETE')); ?>

                      <div class="cancel-button" style="text-align:center">
                      <button type="submit" class="btn btn-primary"> Cancel Request</button>
                    </div>
                  </form>
              <?php else: ?>
                <form id="demo-form2" method="post" action="<?php echo e(route('apply.instructor')); ?>" data-parsley-validate 
                  class="form-horizontal form-label-left" enctype="multipart/form-data">
                    <?php echo e(csrf_field()); ?>


                    
                    
                    <input type="hidden" name="user_id"  value="<?php echo e(Auth::User()->id); ?>" />
                      
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="fname">First Name:<sup class="redstar">*</sup></label>
                          <input type="text" class="form-control" name="fname" id="title" placeholder="Please Enter First Name" value="<?php echo e(Auth::User()->fname); ?>" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="lname">Last Name:<sup class="redstar">*</sup></label>
                          <input type="text" class="form-control" name="lname" id="title" placeholder="Please Enter Last Name" value="<?php echo e(Auth::User()->lname); ?>" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="date">Date of Birth:<sup class="redstar">*</sup></label>
                          <input type="date" class="form-control" name="dob" id="title" value="<?php echo e(Auth::User()->dob); ?>" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="gender">Gender:<sup class="redstar">*</sup></label>
                          <select class="form-control" name="gender" required>
                              <option value="none" selected> 
                                Select an Option 
                              </option>
                              <option value="Male" <?php echo e(Auth::User()->gender == 'm' ? 'selected' : ''); ?>>Male</option>
                              <option value="Female" <?php echo e(Auth::User()->gender == 'f' ? 'selected' : ''); ?>>Female</option>
                              <option value="Other" <?php echo e(Auth::User()->gender == 'o' ? 'selected' : ''); ?>>Other</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="email">Email:<sup class="redstar">*</sup></label>
                          <input type="email" value="<?php echo e(Auth::User()->email); ?>" class="form-control" name="email" id="title" placeholder="Please Enter Email" value="">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="contact">Contact No:<sup class="redstar">*</sup></label>
                          <input type="text" class="form-control" name="mobile" id="contact" placeholder="Please Enter Contact No." value="" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="detail">Detail:<sup class="redstar">*</sup></label>
                          <textarea name="detail" rows="5"  class="form-control" placeholder="" required></textarea>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="file">Upload Resume:<sup class="redstar">*</sup></label>
                          <input type="file" class="form-control" name="file" id="file" value="" required>
                        </div>
                         <div class="form-group">
                          <label for="image">Upload Image:<sup class="redstar">*</sup></label>
                          <input type="file" class="form-control" name="image"  id="image" required>
                        </div>
                      </div>
                    </div>
                    <br>
                    <div class="box-footer">
                     <button type="submit" class="btn btn-lg col-md-3 btn-primary"><?php echo e(__('frontstaticword.Submit')); ?></button>
                    </div>
                </form>
              <?php endif; ?>
              <?php else: ?>
                <div class="box-footer">
                  <button type="submit" onclick="window.location.href = '<?php echo e(route('login')); ?>';" class="btn btn-lg col-md-3 btn-primary"><?php echo e(__('frontstaticword.Submit')); ?></button>
                </div>
              <?php endif; ?>  
            </div>
          </div>
        </div>
      </div>
    </div>
</div><?php /**PATH /Users/cherif/Desktop/PFELearning/resources/views/instructormodel.blade.php ENDPATH**/ ?>