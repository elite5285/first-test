<footer id="footer" class="footer-main-block">
    <div class="container">
        <div class="footer-block">
            <div class="row">
                <?php
                    $widgets = App\WidgetSetting::first();
                ?>
                <div class="col-lg-3 col-md-6">
                     <?php
                        $logo = App\Setting::first();
                    ?>
                    <div class="footer-logo">
                        <?php if($logo->logo_type == 'L'): ?>
                            <?php if($logo->footer_logo != NULL): ?>
                            <a href="<?php echo e(url('/')); ?>" title="logo"><img src="<?php echo e(asset('images/logo/'.$logo->footer_logo)); ?>" alt="logo" class="img-fluid" ></a>
                            <?php endif; ?>
                        <?php else: ?>
                            <a href="<?php echo e(url('/')); ?>"><b><?php echo e($logo->project_title); ?></b></a>
                        <?php endif; ?>
                    </div>
                    <?php
                        $languages = App\Language::all(); 
                    ?>
                    <?php if(isset($languages) && count($languages) > 0): ?>
                    <div class="footer-dropdown">
                        <a href="#" class="a" data-toggle="dropdown"><i class="fa fa-globe rgt-15"></i><?php echo e(Session::has('changed_language') ? ucfirst(Session::get('changed_language')) : ''); ?><i class="fa fa-angle-up lft-10"></i></a>
                        
                       
                        <ul class="dropdown-menu">
                          
                            <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <a href="<?php echo e(route('languageSwitch', $language->local)); ?>"><li><?php echo e($language->name); ?></li></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                </div>
                <?php if(isset($widgets)): ?>

                <div class="col-lg-3 col-md-6">
                    <div class="widget"><b><?php echo e($widgets->widget_one); ?></b></div>
                    <div class="footer-link">
                        <ul>
                            <?php if($gsetting->instructor_enable == 1): ?>
                                <?php if(Auth::check()): ?>
                                    <?php if(Auth::User()->role == "user"): ?>
                                    <li><a href="#" data-toggle="modal" data-target="#myModalinstructor" title="Become An Instructor"><?php echo e(__('frontstaticword.BecomeAnInstructor')); ?></a></li>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <li><a href="<?php echo e(route('login')); ?>" title="Become an instructor"><?php echo e(__('frontstaticword.BecomeAnInstructor')); ?></a></li>
                                <?php endif; ?>
                            <?php endif; ?>
                            <li><a href="<?php echo e(route('about.show')); ?>" title="About Us"><?php echo e(__('frontstaticword.Aboutus')); ?></a></li>
                            
                            <li><a href="<?php echo e(url('user_contact')); ?>" title="Contact Us"><?php echo e(__('frontstaticword.Contactus')); ?></a></li>
                            
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="widget"><b><?php echo e($widgets->widget_two); ?></b></div>
                    <div class="footer-link">
                        <ul>
                           <li><a href="<?php echo e(route('careers.show')); ?>" title="Careers"><?php echo e(__('frontstaticword.Careers')); ?></a></li>
                            <li><a href="<?php echo e(route('blog.all')); ?>" title="Blog"><?php echo e(__('frontstaticword.Blog')); ?></a></li> 
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="widget"><b><?php echo e($widgets->widget_three); ?></b></div>
                    <div class="footer-link">
                        <ul>
                            <li><a href="<?php echo e(route('help.show')); ?>" title="Help"><?php echo e(__('frontstaticword.Help&Support')); ?></a></li>
                            <?php
                                $pages = App\Page::get();
                            ?>
                            
                            <?php if(isset($pages)): ?>
                            <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($page->status == 1): ?>
                                <li><a href="<?php echo e(route('page.show', $page->slug)); ?>" title="<?php echo e($page->title); ?>"><?php echo e($page->title); ?></a></li>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                            
                        </ul>
                    </div>
                </div>
                <?php endif; ?>
                
            </div>
        </div>
    </div>
    <hr>
    <div class="tiny-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="logo-footer">
                        <ul>

                            <li><?php echo e($cpy_txt); ?></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="copyright-social">
                        <ul>
                            <li><a href="<?php echo e(url('terms_condition')); ?>" title="Terms"><?php echo e(__('frontstaticword.Terms&Condition')); ?></a></li> 
                            <li><a href="<?php echo e(url('privacy_policy')); ?>" title="Policy"><?php echo e(__('frontstaticword.PrivacyPolicy')); ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php echo $__env->make('instructormodel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php /**PATH /Users/cherif/Desktop/chelearning/resources/views/theme/footer.blade.php ENDPATH**/ ?>