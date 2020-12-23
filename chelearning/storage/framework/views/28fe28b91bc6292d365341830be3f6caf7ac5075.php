<?php $__env->startSection('title', 'Online Courses'); ?>
<?php $__env->startSection('content'); ?>

<?php echo $__env->make('admin.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- categories-tab start-->
<section id="categories-tab" class="categories-tab-main-block">
    <div class="container">
        <div id="categories-tab-slider" class="categories-tab-block owl-carousel">
           
            <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($cat->status == 1): ?>
                <div class="item categories-tab-dtl">
                    <a href="<?php echo e(route('category.page',$cat->id)); ?>" title="<?php echo e($cat->title); ?>"><i class="fa <?php echo e($cat->icon); ?>"></i><?php echo e($cat->title); ?></a>
                </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<!-- categories-tab end-->

<?php if(isset($sliders)): ?>
<section id="home-background-slider" class="background-slider-block owl-carousel">
    <div class="item home-slider-img">
        <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($slider->status == 1): ?>
        <div id="home" class="home-main-block" style="background-image: url('<?php echo e(asset('images/slider/'.$slider['image'])); ?>')">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 <?php echo e($slider['left'] == 1 ? 'col-md-offset-6 col-sm-offset-6 col-sm-6 col-md-6 text-right' : ''); ?>">
                        <div class="home-dtl">
                            <div class="home-heading text-white"><?php echo e($slider['heading']); ?></div>
                            <p class="text-white btm-10"><?php echo e($slider['sub_heading']); ?></p>
                            <p class="text-white btm-20"><?php echo e($slider['detail']); ?></div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</section>
<?php endif; ?>

<!-- home end -->
<!-- learning-work start -->

<?php if(isset($facts)): ?>
<section id="learning-work" class="learning-work-main-block">
    <div class="container">
        <div class="row">
            <?php $__currentLoopData = $facts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fact): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-4 col-sm-6">
                <div class="learning-work-block text-white">
                    <div class="row">
                        <div class="col-lg-3 col-md-3">
                            <div class="learning-work-icon">
                                <i class="fa <?php echo e($fact['icon']); ?>"></i>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <div class="learning-work-dtl">
                                <div class="work-heading"><?php echo e($fact['heading']); ?></div>
                                <p><?php echo e($fact['sub_heading']); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- learning-work end -->
<!-- Student start -->
<?php if(Auth::check()): ?>
<?php
$enroll = App\Order::where('user_id', Auth::user()->id)->get();
?>
<section id="student" class="student-main-block top-40">
    <div class="container">
       
        <?php if( ! $enroll->isEmpty() ): ?>
        <h4 class="student-heading"><?php echo e(__('frontstaticword.MyCourses')); ?></h4>
        <div id="my-courses-slider" class="student-view-slider-main-block owl-carousel">
            <?php $__currentLoopData = $enroll; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enrol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($enrol->courses->status == 1 && $enrol->courses->featured == 1): ?>
                <div class="item student-view-block student-view-block-1">
                    <div class="genre-slide-image">
                        <div class="view-block">
                            <div class="view-img">
                                <?php if($enrol->courses['preview_image'] !== NULL && $enrol->courses['preview_image'] !== ''): ?>
                                    <a href="<?php echo e(url('show/coursecontent',$enrol->courses->id)); ?>"><img src="<?php echo e(asset('images/course/'.$enrol->courses['preview_image'])); ?>" alt="course" class="img-fluid"></a>
                                <?php else: ?>
                                    <a href="<?php echo e(url('show/coursecontent',$enrol->courses->id)); ?>"><img src="<?php echo e(Avatar::create($enrol->courses->title)->toBase64()); ?>" alt="course" class="img-fluid"></a>
                                <?php endif; ?>
                            </div>
                            <div class="view-dtl">
                                <div class="view-heading btm-10"><a href="<?php echo e(url('show/coursecontent',$enrol->courses->id)); ?>"><?php echo e(str_limit($enrol->courses->title, $limit = 30, $end = '...')); ?></a></div>
                                <p class="btm-10"><a herf="#"><?php echo e(__('frontstaticword.by')); ?> <?php echo e($enrol->courses->user['fname']); ?></a></p>
                                <div class="rating">
                                    <ul>
                                        <li>
                                            <?php 
                                            $learn = 0;
                                            $price = 0;
                                            $value = 0;
                                            $sub_total = 0;
                                            $sub_total = 0;
                                            $reviews = App\ReviewRating::where('course_id',$enrol->courses->id)->get();
                                            ?> 
                                            <?php if(!empty($reviews[0])): ?>
                                            <?php
                                            $count =  App\ReviewRating::where('course_id',$enrol->courses->id)->count();

                                            foreach($reviews as $review){
                                                $learn = $review->price*5;
                                                $price = $review->price*5;
                                                $value = $review->value*5;
                                                $sub_total = $sub_total + $learn + $price + $value;
                                            }

                                            $count = ($count*3) * 5;
                                            $rat = $sub_total/$count;
                                            $ratings_var = ($rat*100)/5;
                                            ?>
                            
                                            <div class="pull-left">
                                                <div class="star-ratings-sprite"><span style="width:<?php echo $ratings_var; ?>%" class="star-ratings-sprite-rating"></span>
                                                </div>
                                            </div>
                                       
                                             
                                            <?php else: ?>
                                                <div class="pull-left"><?php echo e(__('frontstaticword.NoRating')); ?></div>
                                            <?php endif; ?>
                                        </li>
                                        <!-- overall rating-->
                                        <?php 
                                        $learn = 0;
                                        $price = 0;
                                        $value = 0;
                                        $sub_total = 0;
                                        $count =  count($reviews);
                                        $onlyrev = array();

                                        $reviewcount = App\ReviewRating::where('course_id', $enrol->courses->id)->WhereNotNull('review')->get();

                                        foreach($reviews as $review){

                                            $learn = $review->learn*5;
                                            $price = $review->price*5;
                                            $value = $review->value*5;
                                            $sub_total = $sub_total + $learn + $price + $value;
                                        }

                                        $count = ($count*3) * 5;
                                         
                                        if($count != "")
                                        {
                                            $rat = $sub_total/$count;
                                     
                                            $ratings_var = ($rat*100)/5;
                                   
                                            $overallrating = ($ratings_var/2)/10;
                                        }
                                         
                                        ?>

                                        <?php
                                            $reviewsrating = App\ReviewRating::where('course_id', $enrol->courses->id)->first();
                                        ?>
                                        <?php if(!empty($reviewsrating)): ?>
                                        <li>
                                            <b><?php echo e(round($overallrating, 1)); ?></b>
                                        </li>
                                        <?php endif; ?>
                                      <li>(<?php echo e($enrol->courses->order->count()); ?>)</li> 
                                    </ul>
                                </div>
                                <?php if( $enrol->courses->type == 1): ?>
                                    <div class="rate text-right">
                                        <ul>
                                            <?php
                                                $currency = App\Currency::first();
                                            ?>

                                            <?php if($enrol->courses->discount_price == !NULL): ?>

                                                <li><a><b><i class="<?php echo e($currency->icon); ?>"></i><?php echo e($enrol->courses->discount_price); ?></b></a></li>&nbsp;
                                                <li><a><b><strike><i class="<?php echo e($currency->icon); ?>"></i><?php echo e($enrol->courses->price); ?></strike></b></a></li>
                                                
                                            <?php else: ?>
                                                <li><a><b><i class="<?php echo e($currency->icon); ?>"></i><?php echo e($enrol->courses->price); ?></b></a></li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                <?php else: ?>
                                    <div class="rate text-right">
                                        <ul>
                                            <li><a><b><?php echo e(__('frontstaticword.Free')); ?></b></a></li>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                                <div class="img-wishlist">
                                    <div class="protip-wishlist">
                                        <ul>
                                            <?php if(Auth::check()): ?>
                                                <?php
                                                    $wish = App\Wishlist::where('user_id', Auth::User()->id)->where('course_id', $enrol->courses->id)->first();
                                                ?>
                                                <?php if($wish == NULL): ?>
                                                    <li class="protip-wish-btn">
                                                        <form id="demo-form2" method="post" action="<?php echo e(url('show/wishlist', $enrol->courses->id)); ?>" data-parsley-validate 
                                                            class="form-horizontal form-label-left">
                                                            <?php echo e(csrf_field()); ?>


                                                            <input type="hidden" name="user_id"  value="<?php echo e(Auth::User()->id); ?>" />
                                                            <input type="hidden" name="course_id"  value="<?php echo e($enrol->courses->id); ?>" />

                                                            <button class="wishlisht-btn" title="Add to wishlist" type="submit"><i class="fa fa-heart rgt-10"></i></button>
                                                        </form>
                                                    </li>
                                                <?php else: ?>
                                                    <li class="protip-wish-btn-two">
                                                        <form id="demo-form2" method="post" action="<?php echo e(url('remove/wishlist', $enrol->courses->id)); ?>" data-parsley-validate 
                                                            class="form-horizontal form-label-left">
                                                            <?php echo e(csrf_field()); ?>


                                                            <input type="hidden" name="user_id"  value="<?php echo e(Auth::User()->id); ?>" />
                                                            <input type="hidden" name="course_id"  value="<?php echo e($enrol->courses->id); ?>" />

                                                            <button class="wishlisht-btn" title="Remove from Wishlist" type="submit"><i class="fa fa-heart rgt-10"></i></button>
                                                        </form>
                                                    </li>
                                                <?php endif; ?> 
                                            <?php else: ?>
                                                <li class="protip-wish-btn"><a href="<?php echo e(route('login')); ?>" title="heart"><i class="fa fa-heart rgt-10"></i></a></li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div> 
              <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>
<!-- Students end -->

<!-- learning-courses start -->
<?php if(isset($categories)): ?>
<section id="learning-courses" class="learning-courses-main-block">
    <div class="container">
        <h4 class="student-heading"><?php echo e(__('frontstaticword.RecentCourses')); ?></h4>
        <div class="row">
            
            <div class="col-lg-12">
                <div class="learning-courses">
                    <?php if(isset($categories->category_id)): ?>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                      <?php $__currentLoopData = $categories->category_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $cats= App\Categories::find($cate);
                        ?>
                        <?php if($cats['status'] == 1): ?>
                            <li class="btn nav-item" ><a class="nav-item nav-link" id="home-tab" data-toggle="tab" href="#content-tabs" role="tab" aria-controls="home" onclick="showtab('<?php echo e($cats->id); ?>')" aria-selected="true"><?php echo e($cats['title']); ?></a></li>
                        <?php endif; ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                    <?php endif; ?>
                </div>
                <div class="tab-content" id="myTabContent">
                    <?php if(!empty($categories)): ?>
                        <?php $__currentLoopData = $categories->category_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="tab-pane fade show active" id="content-tabs" role="tabpanel" aria-labelledby="home-tab">
                                
                                <div id="tabShow">
                                    
                                </div>
                                
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- learning-courses end -->
<!-- Student start -->
<section id="student" class="student-main-block">
    <div class="container">
       
        <?php if( ! $cor->isEmpty() ): ?>
        <h4 class="student-heading"><?php echo e(__('frontstaticword.FeaturedCourses')); ?></h4>
        <div id="student-view-slider" class="student-view-slider-main-block owl-carousel">
            <?php $__currentLoopData = $cor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($c->status == 1 && $c->featured == 1): ?>
                <div class="item student-view-block student-view-block-1">
                    <div class="genre-slide-image protip" data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#prime-next-item-description-block<?php echo e($c->id); ?>">
                        <div class="view-block">
                            <div class="view-img">
                                <?php if($c['preview_image'] !== NULL && $c['preview_image'] !== ''): ?>
                                    <a href="<?php echo e(route('user.course.show',['id' => $c->id, 'slug' => $c->slug ])); ?>"><img src="<?php echo e(asset('images/course/'.$c['preview_image'])); ?>" alt="course" class="img-fluid"></a>
                                <?php else: ?>
                                    <a href="<?php echo e(route('user.course.show',['id' => $c->id, 'slug' => $c->slug ])); ?>"><img src="<?php echo e(Avatar::create($c->title)->toBase64()); ?>" alt="course" class="img-fluid"></a>
                                <?php endif; ?>
                            </div>
                            <div class="view-dtl">
                                <div class="view-heading btm-10"><a href="<?php echo e(route('user.course.show',['id' => $c->id, 'slug' => $c->slug ])); ?>"><?php echo e(str_limit($c->title, $limit = 30, $end = '...')); ?></a></div>
                                <p class="btm-10"><a herf="#"><?php echo e(__('frontstaticword.by')); ?> <?php echo e($c->user['fname']); ?></a></p>
                                <div class="rating">
                                    <ul>
                                        <li>
                                            <?php 
                                            $learn = 0;
                                            $price = 0;
                                            $value = 0;
                                            $sub_total = 0;
                                            $sub_total = 0;
                                            $reviews = App\ReviewRating::where('course_id',$c->id)->get();
                                            ?> 
                                            <?php if(!empty($reviews[0])): ?>
                                            <?php
                                            $count =  App\ReviewRating::where('course_id',$c->id)->count();

                                            foreach($reviews as $review){
                                                $learn = $review->price*5;
                                                $price = $review->price*5;
                                                $value = $review->value*5;
                                                $sub_total = $sub_total + $learn + $price + $value;
                                            }

                                            $count = ($count*3) * 5;
                                            $rat = $sub_total/$count;
                                            $ratings_var = ($rat*100)/5;
                                            ?>
                            
                                            <div class="pull-left">
                                                <div class="star-ratings-sprite"><span style="width:<?php echo $ratings_var; ?>%" class="star-ratings-sprite-rating"></span>
                                                </div>
                                            </div>
                                       
                                             
                                            <?php else: ?>
                                                <div class="pull-left"><?php echo e(__('frontstaticword.NoRating')); ?></div>
                                            <?php endif; ?>
                                        </li>
                                        <!-- overall rating-->
                                        <?php 
                                        $learn = 0;
                                        $price = 0;
                                        $value = 0;
                                        $sub_total = 0;
                                        $count =  count($reviews);
                                        $onlyrev = array();

                                        $reviewcount = App\ReviewRating::where('course_id', $c->id)->WhereNotNull('review')->get();

                                        foreach($reviews as $review){

                                            $learn = $review->learn*5;
                                            $price = $review->price*5;
                                            $value = $review->value*5;
                                            $sub_total = $sub_total + $learn + $price + $value;
                                        }

                                        $count = ($count*3) * 5;
                                         
                                        if($count != "")
                                        {
                                            $rat = $sub_total/$count;
                                     
                                            $ratings_var = ($rat*100)/5;
                                   
                                            $overallrating = ($ratings_var/2)/10;
                                        }
                                         
                                        ?>

                                        <?php
                                            $reviewsrating = App\ReviewRating::where('course_id', $c->id)->first();
                                        ?>
                                        <?php if(!empty($reviewsrating)): ?>
                                        <li>
                                            <b><?php echo e(round($overallrating, 1)); ?></b>
                                        </li>
                                        <?php endif; ?>
                                      <li>(<?php echo e($c->order->count()); ?>)</li> 
                                    </ul>
                                </div>
                                <?php if( $c->type == 1): ?>
                                    <div class="rate text-right">
                                        <ul>
                                            <?php
                                                $currency = App\Currency::first();
                                            ?>

                                            <?php if($c->discount_price == !NULL): ?>

                                                <li><a><b><i class="<?php echo e($currency->icon); ?>"></i><?php echo e($c->discount_price); ?></b></a></li>&nbsp;
                                                <li><a><b><strike><i class="<?php echo e($currency->icon); ?>"></i><?php echo e($c->price); ?></strike></b></a></li>
                                                
                                            <?php else: ?>
                                                <li><a><b><i class="<?php echo e($currency->icon); ?>"></i><?php echo e($c->price); ?></b></a></li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                <?php else: ?>
                                    <div class="rate text-right">
                                        <ul>
                                            <li><a><b><?php echo e(__('frontstaticword.Free')); ?></b></a></li>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                                <div class="img-wishlist">
                                    <div class="protip-wishlist">
                                        <ul>
                                            <?php if(Auth::check()): ?>
                                                <?php
                                                    $wish = App\Wishlist::where('user_id', Auth::User()->id)->where('course_id', $c->id)->first();
                                                ?>
                                                <?php if($wish == NULL): ?>
                                                    <li class="protip-wish-btn">
                                                        <form id="demo-form2" method="post" action="<?php echo e(url('show/wishlist', $c->id)); ?>" data-parsley-validate 
                                                            class="form-horizontal form-label-left">
                                                            <?php echo e(csrf_field()); ?>


                                                            <input type="hidden" name="user_id"  value="<?php echo e(Auth::User()->id); ?>" />
                                                            <input type="hidden" name="course_id"  value="<?php echo e($c->id); ?>" />

                                                            <button class="wishlisht-btn" title="Add to wishlist" type="submit"><i class="fa fa-heart rgt-10"></i></button>
                                                        </form>
                                                    </li>
                                                <?php else: ?>
                                                    <li class="protip-wish-btn-two">
                                                        <form id="demo-form2" method="post" action="<?php echo e(url('remove/wishlist', $c->id)); ?>" data-parsley-validate 
                                                            class="form-horizontal form-label-left">
                                                            <?php echo e(csrf_field()); ?>


                                                            <input type="hidden" name="user_id"  value="<?php echo e(Auth::User()->id); ?>" />
                                                            <input type="hidden" name="course_id"  value="<?php echo e($c->id); ?>" />

                                                            <button class="wishlisht-btn" title="Remove from Wishlist" type="submit"><i class="fa fa-heart rgt-10"></i></button>
                                                        </form>
                                                    </li>
                                                <?php endif; ?> 
                                            <?php else: ?>
                                                <li class="protip-wish-btn"><a href="<?php echo e(route('login')); ?>" title="heart"><i class="fa fa-heart rgt-10"></i></a></li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="prime-next-item-description-block<?php echo e($c->id); ?>" class="prime-description-block">
                        <div class="prime-description-under-block">
                            <div class="prime-description-under-block">
                                <h5 class="description-heading"><?php echo e($c['title']); ?></h5>
                                <div class="protip-img">
                                    <?php if($c['preview_image'] !== NULL && $c['preview_image'] !== ''): ?>
                                        <a href="<?php echo e(route('user.course.show',['id' => $c->id, 'slug' => $c->slug ])); ?>"><img src="<?php echo e(asset('images/course/'.$c['preview_image'])); ?>" alt="student" class="img-fluid">
                                        </a>
                                    <?php else: ?>
                                        <a href="<?php echo e(route('user.course.show',['id' => $c->id, 'slug' => $c->slug ])); ?>"><img src="<?php echo e(Avatar::create($c->title)->toBase64()); ?>" alt="student" class="img-fluid">
                                        </a>
                                    <?php endif; ?>
                                </div>

                                <ul class="description-list">
                                    <li><?php echo e(__('frontstaticword.Classes')); ?>: 
                                        <?php
                                            $data = App\CourseClass::where('course_id', $c->id)->get();
                                            if(count($data)>0){

                                                echo count($data);
                                            }
                                            else{

                                                echo "0";
                                            }
                                        ?>
                                    </li>
                                    &nbsp;
                                    <li>
                                        <?php if( $c->type == 1): ?>
                                            <div class="rate text-right">
                                                <ul>
                                                    <?php
                                                        $currency = App\Currency::first();
                                                    ?>

                                                    <?php if($c->discount_price == !NULL): ?>

                                                        <li><a><b><i class="<?php echo e($currency->icon); ?>"></i><?php echo e($c->discount_price); ?></b></a></li>&nbsp;
                                                        <li><a><b><strike><i class="<?php echo e($currency->icon); ?>"></i><?php echo e($c->price); ?></strike></b></a></li>
                                                        
                                                    <?php else: ?>
                                                        <li><a><b><i class="<?php echo e($currency->icon); ?>"></i><?php echo e($c->price); ?></b></a></li>
                                                    <?php endif; ?>
                                                </ul>
                                            </div>
                                        <?php else: ?>
                                            <div class="rate text-right">
                                                <ul>
                                                    <li><a><b><?php echo e(__('frontstaticword.Free')); ?></b></a></li>
                                                </ul>
                                            </div>
                                        <?php endif; ?>
                                    </li>
                                </ul>

                                <div class="main-des">
                                    <p><?php echo e($c->short_detail); ?></p>
                                </div>
                                <div class="des-btn-block">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <?php if($c->type == 1): ?>
                                                <?php if(Auth::check()): ?>
                                                    <?php if(Auth::User()->role == "admin"): ?>
                                                        <div class="protip-btn">
                                                            <a href="<?php echo e(url('show/coursecontent',$c->id)); ?>" class="btn btn-secondary" title="course"><?php echo e(__('frontstaticword.GoToCourse')); ?></a>
                                                        </div>
                                                    <?php else: ?>
                                                        <?php
                                                            $order = App\Order::where('user_id', Auth::User()->id)->where('course_id', $c->id)->first();
                                                        ?>
                                                        <?php if(!empty($order) && $order->status == 1): ?>
                                                            <div class="protip-btn">
                                                                <a href="<?php echo e(url('show/coursecontent',$c->id)); ?>" class="btn btn-secondary" title="course"><?php echo e(__('frontstaticword.GoToCourse')); ?></a>
                                                            </div>
                                                        <?php else: ?>
                                                            <?php
                                                                $cart = App\Cart::where('user_id', Auth::User()->id)->where('course_id', $c->id)->first();
                                                            ?>
                                                            <?php if(!empty($cart)): ?>
                                                                <div class="protip-btn">
                                                                    <form id="demo-form2" method="post" action="<?php echo e(route('remove.item.cart',$cart->id)); ?>">
                                                                        <?php echo e(csrf_field()); ?>

                                                                                
                                                                        <div class="box-footer">
                                                                         <button type="submit" class="btn btn-primary"><?php echo e(__('frontstaticword.RemoveFromCart')); ?></button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            <?php else: ?>
                                                                <div class="protip-btn">
                                                                    <form id="demo-form2" method="post" action="<?php echo e(route('addtocart',['course_id' => $c->id, 'price' => $c->price, 'discount_price' => $c->discount_price ])); ?>"
                                                                        data-parsley-validate class="form-horizontal form-label-left">
                                                                            <?php echo e(csrf_field()); ?>


                                                                        <input type="hidden" name="category_id"  value="<?php echo e($c->category['id']); ?>" />
                                                                                
                                                                        <div class="box-footer">
                                                                         <button type="submit" class="btn btn-primary"><?php echo e(__('frontstaticword.AddToCart')); ?></button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <div class="protip-btn">
                                                        <a href="<?php echo e(route('login')); ?>" class="btn btn-primary"><i class="fa fa-cart-plus" aria-hidden="true"></i>&nbsp;<?php echo e(__('frontstaticword.AddToCart')); ?></a>
                                                    </div>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                 <?php if(Auth::check()): ?>
                                                    <?php if(Auth::User()->role == "admin"): ?>
                                                        <div class="protip-btn">
                                                            <a href="<?php echo e(url('show/coursecontent',$c->id)); ?>" class="btn btn-secondary" title="course"><?php echo e(__('frontstaticword.GoToCourse')); ?></a>
                                                        </div>
                                                    <?php else: ?>
                                                        <?php
                                                            $enroll = App\Order::where('user_id', Auth::User()->id)->where('course_id', $c->id)->first();
                                                        ?>
                                                        <?php if($enroll == NULL): ?>
                                                            <div class="protip-btn">
                                                                <a href="<?php echo e(url('enroll/show',$c->id)); ?>" class="btn btn-primary" title="Enroll Now"><?php echo e(__('frontstaticword.EnrollNow')); ?></a>
                                                            </div>
                                                        <?php else: ?>
                                                            <div class="protip-btn">
                                                                <a href="<?php echo e(url('show/coursecontent',$c->id)); ?>" class="btn btn-secondary" title="Cart"><?php echo e(__('frontstaticword.GoToCourse')); ?></a>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <div class="protip-btn">
                                                        <a href="<?php echo e(route('login')); ?>" class="btn btn-primary" title="Enroll Now"><?php echo e(__('frontstaticword.EnrollNow')); ?></a>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
              <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php endif; ?>
    </div>
</section>
<!-- Students end -->

<!-- Bundle start -->
<section id="student" class="student-main-block">
    <div class="container">

        
        <?php if( ! $bundles->isEmpty() ): ?>
        <h4 class="student-heading"><?php echo e(__('frontstaticword.BundleCourses')); ?></h4>
        <div id="bundle-view-slider" class="student-view-slider-main-block owl-carousel">
            <?php $__currentLoopData = $bundles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bundle): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($bundle->status == 1): ?>
             
                <div class="item student-view-block student-view-block-1">
                    <div class="genre-slide-image protip" data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#prime-next-item-description-block-3<?php echo e($bundle->id); ?>">
                        <div class="view-block">
                            <div class="view-img">
                                <?php if($bundle['preview_image'] !== NULL && $bundle['preview_image'] !== ''): ?>
                                    <a href="<?php echo e(route('bundle.detail', $bundle->id)); ?>"><img src="<?php echo e(asset('images/bundle/'.$bundle['preview_image'])); ?>" alt="course" class="img-fluid"></a>
                                <?php else: ?>
                                    <a href="<?php echo e(route('bundle.detail', $bundle->id)); ?>"><img src="<?php echo e(Avatar::create($bundle->title)->toBase64()); ?>" alt="course" class="img-fluid"></a>
                                <?php endif; ?>
                            </div>
                            <div class="view-dtl">
                                <div class="view-heading btm-10"><a href="<?php echo e(route('bundle.detail', $bundle->id)); ?>"><?php echo e(str_limit($bundle->title, $limit = 30, $end = '...')); ?></a></div>
                                <p class="btm-10"><a herf="#"><?php echo e(__('frontstaticword.by')); ?> <?php echo e($bundle->user['fname']); ?></a></p>

                                <p class="btm-10"><a herf="#">Created At: <?php echo e(date('d-m-Y',strtotime($bundle['created_at']))); ?></a></p>

                                <?php if($bundle->type == 1): ?>
                                    <div class="rate text-right">
                                        <ul>
                                            <?php
                                                $currency = App\Currency::first();
                                            ?>

                                            <?php if($bundle->discount_price == !NULL): ?>

                                                <li><a><b><i class="<?php echo e($currency->icon); ?>"></i><?php echo e($bundle->discount_price); ?></b></a></li>&nbsp;
                                                <li><a><b><strike><i class="<?php echo e($currency->icon); ?>"></i><?php echo e($bundle->price); ?></strike></b></a></li>
                                                
                                            <?php else: ?>
                                                <li><a><b><i class="<?php echo e($currency->icon); ?>"></i><?php echo e($bundle->price); ?></b></a></li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                <?php else: ?>
                                    <div class="rate text-right">
                                        <ul>
                                            <li><a><b><?php echo e(__('frontstaticword.Free')); ?></b></a></li>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                              
                            </div>
                           
                        </div>
                    </div>
                    <div id="prime-next-item-description-block-3<?php echo e($bundle->id); ?>" class="prime-description-block">
                        <div class="prime-description-under-block">
                            <div class="prime-description-under-block">
                                <h5 class="description-heading"><?php echo e($bundle['title']); ?></h5>
                                <div class="protip-img">
                                    <?php if($bundle['preview_image'] !== NULL && $bundle['preview_image'] !== ''): ?>
                                        <a href="<?php echo e(route('bundle.detail', $bundle->id)); ?>"><img src="<?php echo e(asset('images/bundle/'.$bundle['preview_image'])); ?>" alt="student" class="img-fluid">
                                        </a>
                                    <?php else: ?>
                                        <a href="<?php echo e(route('bundle.detail', $bundle->id)); ?>"><img src="<?php echo e(Avatar::create($bundle->title)->toBase64()); ?>" alt="student" class="img-fluid">
                                        </a>
                                    <?php endif; ?>
                                </div>

                                

                                <div class="main-des">
                                    <p><?php echo str_limit($bundle['detail'], $limit = 200, $end = '...'); ?></p>
                                </div>
                                <div class="des-btn-block">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <?php if($bundle->type == 1): ?>
                                                <?php if(Auth::check()): ?>
                                                    <?php if(Auth::User()->role == "admin"): ?>
                                                        <div class="protip-btn">
                                                            <a href="" class="btn btn-secondary" title="course"><?php echo e(__('frontstaticword.Purchased')); ?></a>
                                                        </div>
                                                    <?php else: ?>
                                                        <?php
                                                            $order = App\Order::where('user_id', Auth::User()->id)->where('bundle_id', $bundle->id)->first();
                                                        ?>
                                                        <?php if(!empty($order) && $order->status == 1): ?>
                                                            <div class="protip-btn">
                                                                <a href="" class="btn btn-secondary" title="course"><?php echo e(__('frontstaticword.Purchased')); ?></a>
                                                            </div>
                                                        <?php else: ?>
                                                            <?php
                                                                $cart = App\Cart::where('user_id', Auth::User()->id)->where('bundle_id', $bundle->id)->first();
                                                            ?>
                                                            <?php if(!empty($cart)): ?>
                                                                <div class="protip-btn">
                                                                    <form id="demo-form2" method="post" action="<?php echo e(route('remove.item.cart',$cart->id)); ?>">
                                                                        <?php echo e(csrf_field()); ?>

                                                                                
                                                                        <div class="box-footer">
                                                                         <button type="submit" class="btn btn-primary"><?php echo e(__('frontstaticword.RemoveFromCart')); ?></button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            <?php else: ?>
                                                                <div class="protip-btn">
                                                                    <form id="demo-form2" method="post" action="<?php echo e(route('bundlecart', $bundle->id)); ?>"
                                                                        data-parsley-validate class="form-horizontal form-label-left">
                                                                            <?php echo e(csrf_field()); ?>


                                                                        <input type="hidden" name="user_id"  value="<?php echo e(Auth::User()->id); ?>" />
                                                                        <input type="hidden" name="bundle_id"  value="<?php echo e($bundle->id); ?>" />
                                                                                
                                                                        <div class="box-footer">
                                                                         <button type="submit" class="btn btn-primary"><?php echo e(__('frontstaticword.AddToCart')); ?></button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <div class="protip-btn">
                                                        <a href="<?php echo e(route('login')); ?>" class="btn btn-primary"><i class="fa fa-cart-plus" aria-hidden="true"></i>&nbsp;<?php echo e(__('frontstaticword.AddToCart')); ?></a>
                                                    </div>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                 <?php if(Auth::check()): ?>
                                                    <?php if(Auth::User()->role == "admin"): ?>
                                                        <div class="protip-btn">
                                                            <a href="" class="btn btn-secondary" title="course"><?php echo e(__('frontstaticword.Purchased')); ?></a>
                                                        </div>
                                                    <?php else: ?>
                                                        <?php
                                                            $enroll = App\Order::where('user_id', Auth::User()->id)->where('course_id', $c->id)->first();
                                                        ?>
                                                        <?php if($enroll == NULL): ?>
                                                            <div class="protip-btn">
                                                                <a href="<?php echo e(url('enroll/show',$bundle->id)); ?>" class="btn btn-primary" title="Enroll Now"><?php echo e(__('frontstaticword.EnrollNow')); ?></a>
                                                            </div>
                                                        <?php else: ?>
                                                            <div class="protip-btn">
                                                                <a href="" class="btn btn-secondary" title="Cart"><?php echo e(__('frontstaticword.Purchased')); ?></a>
                                                            </div>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <div class="protip-btn">
                                                        <a href="<?php echo e(route('login')); ?>" class="btn btn-primary" title="Enroll Now"><?php echo e(__('frontstaticword.EnrollNow')); ?></a>
                                                    </div>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div> 

                <?php endif; ?>
             
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php endif; ?>
    </div>
</section>
<!-- Bundle end -->

<!-- Zoom start -->
<?php if($gsetting->zoom_enable == '1'): ?>
<section id="student" class="student-main-block">
    <div class="container">
        <?php
            $mytime = Carbon\Carbon::now();
        ?>
        <?php if( ! $meetings->isEmpty() ): ?>
        <h4 class="student-heading"><?php echo e(__('frontstaticword.ZoomMeetings')); ?></h4>
        <div id="zoom-view-slider" class="student-view-slider-main-block owl-carousel">
            <?php $__currentLoopData = $meetings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $meeting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item student-view-block student-view-block-1">
                    <div class="genre-slide-image protip" data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#prime-next-item-description-block-2<?php echo e($meeting->id); ?>">
                        <div class="view-block">
                            <div class="view-img">
                                <?php if($meeting['meeting_title'] !== NULL && $meeting['meeting_title'] !== ''): ?>
                                    <a href="<?php echo e(route('zoom.detail', $meeting->id)); ?>"><img src="<?php echo e(Avatar::create($meeting['meeting_title'])->toBase64()); ?>" alt="course" class="img-fluid"></a>
                                <?php endif; ?>
                            </div>
                            <div class="view-dtl">
                                <div class="view-heading btm-10"><?php echo e(str_limit($meeting->meeting_title, $limit = 30, $end = '...')); ?></div>
                                <p class="btm-10"><a herf="#"><?php echo e(__('frontstaticword.by')); ?> <?php echo e($meeting->user['fname']); ?></a></p>

                                <p class="btm-10"><a herf="#">Start At: <?php echo e(date('d-m-Y | h:i:s A',strtotime($meeting['start_time']))); ?></a></p>
                            </div>
                        </div>
                    </div>
                    <div id="prime-next-item-description-block-2<?php echo e($meeting->id); ?>" class="prime-description-block">
                        <div class="prime-description-under-block">
                            <div class="prime-description-under-block">
                                <h5 class="description-heading"><a href="<?php echo e(route('zoom.detail', $meeting->id)); ?>"><?php echo e($meeting['meeting_title']); ?></a></h5>
                                <div class="protip-img">
                                    <h3 class="description-heading"><?php echo e(__('frontstaticword.by')); ?> <?php echo e($meeting->user['fname']); ?></h>
                                    <p class="meeting-owner btm-10"><a herf="#">Meeting Owner: <?php echo e($meeting->owner_id); ?></a></p>
                                </div>
                                <div class="main-des">
                                    <p class="btm-10"><a herf="#">Start At: <?php echo e(date('d-m-Y | h:i:s A',strtotime($meeting['start_time']))); ?></a></p>
                                </div>
                                <div class="des-btn-block">
                                    <a href="<?php echo e($meeting->zoom_url); ?>" target="_blank" class="btn btn-light">Join Meeting</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>
<!-- Zoom end -->


<!-- Bundle start -->
<?php if($gsetting->bbl_enable == '1'): ?>
<section id="student" class="student-main-block">
    <div class="container">
        
        <?php if( ! $bigblue->isEmpty() ): ?>
        <h4 class="student-heading"><?php echo e(__('frontstaticword.BigBlueMeetings')); ?></h4>
        <div id="bbl-view-slider" class="student-view-slider-main-block owl-carousel">
            <?php $__currentLoopData = $bigblue; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bbl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
             
                <div class="item student-view-block student-view-block-1">
                    <div class="genre-slide-image protip" data-pt-placement="outside" data-pt-interactive="false" data-pt-title="#prime-next-item-description-block-4<?php echo e($bbl->id); ?>">
                        <div class="view-block">
                            <div class="view-img">
                                <a href="<?php echo e(route('bbl.detail', $bbl->id)); ?>"><img src="<?php echo e(Avatar::create($bbl['meetingname'])->toBase64()); ?>" alt="course" class="img-fluid"></a>
                            </div>
                            <div class="view-dtl">
                                <div class="view-heading btm-10"><a href="<?php echo e(route('bbl.detail', $bbl->id)); ?>"><?php echo e(str_limit($bbl['meetingname'], $limit = 30, $end = '...')); ?></a></div>
                                <p class="btm-10"><a herf="#"><?php echo e(__('frontstaticword.by')); ?> <?php echo e($bbl->user['fname']); ?></a></p>

                                <p class="btm-10"><a herf="#">Start At: <?php echo e(date('d-m-Y | h:i:s A',strtotime($bbl['start_time']))); ?></a></p>
                              
                            </div>
                           
                        </div>
                    </div>
                    <div id="prime-next-item-description-block-4<?php echo e($bbl->id); ?>" class="prime-description-block">
                        <div class="prime-description-under-block">
                            <div class="prime-description-under-block">
                                <h5 class="description-heading"><?php echo e($bbl['meetingname']); ?></h5>
                                <div class="protip-img">
                                    <a href="<?php echo e(route('bbl.detail', $bbl->id)); ?>"><img src="<?php echo e(Avatar::create($bbl->user['fname'])->toBase64()); ?>" alt="course" class="img-fluid"></a>
                                </div>

                                <div class="main-des">
                                    <p><?php echo $bbl['detail']; ?></p>
                                </div>
                                <div class="des-btn-block">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>
<!-- Bundle end -->
<!-- recommendations start -->
<section id="border-recommendation" class="border-recommendation">
    <?php
        $gets = App\GetStarted::first();
    ?>
    <?php if(isset($gets)): ?> 
    <div class="top-border"></div>
    <div class="recommendation-main-block  text-center" style="background-image: url('<?php echo e(asset('images/getstarted/'.$gets['image'])); ?>')">
        <div class="container">
            <h3 class="text-white"><?php echo e($gets['heading']); ?></h3>
            <p class="text-white btm-20"><?php echo e($gets['sub_heading']); ?></p>
            <?php if($gets->button_txt == !NULL): ?>
            <div class="recommendation-btn text-white">
                <a href="<?php echo e($gets['link']); ?>" class="btn btn-primary" title="search"><?php echo e($gets['button_txt']); ?></a>
            </div>
            <?php endif; ?> 
        </div>
    </div>
    <?php endif; ?>
</section>
<!-- recommendations end -->
<!-- categories start -->

<?php if(!$category->isEmpty()): ?>

<section id="categories" class="categories-main-block">
    <div class="container">
        <h3 class="categories-heading btm-30"><?php echo e(__('frontstaticword.FeaturedCategories')); ?></h3>
        <div class="row">

            <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($t->status == 1 && $t->featured == 1): ?>

            <div class="col-lg-3 col-md-4 col-sm-6">

                <div class="image-container">
                <a href="<?php echo e(route('category.page',$t->id)); ?>">

                  <div class="image-overlay">
                    <i class="fa <?php echo e($t['icon']); ?>"></i><?php echo e($t['title']); ?>

                  </div>

                  <?php if($t['cat_image'] == !NULL): ?>
                    <img src="<?php echo e(asset('images/category/'.$t['cat_image'])); ?>">
                  <?php else: ?>
                    <img src="<?php echo e(Avatar::create($t->title)->toBase64()); ?>">
                  <?php endif; ?>
                </a>
                </div>
                
            </div>

            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>



<?php endif; ?>

<!-- categories end -->
<!-- testimonial start -->
 <?php
    $testi = App\Testimonial::all();
?>
<?php if( ! $testi->isEmpty() ): ?>
<section id="testimonial" class="testimonial-main-block">
    <div class="container">
        <h3 class="btm-30"><?php echo e(__('frontstaticword.HomeTestimonial')); ?></h3>
        <div id="testimonial-slider" class="testimonial-slider-main-block owl-carousel">
            
            <?php $__currentLoopData = $testi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <?php if($tes->status == 1): ?>
            <div class="item testimonial-block">
                <ul>
                    <li><img src="<?php echo e(asset('images/testimonial/'.$tes['image'])); ?>" alt="blog"></li>
                    <li><h5 class="testimonial-heading"><?php echo e($tes['client_name']); ?></h5></li>
                </ul>
                <p><?php echo str_limit($tes->details , $limit = 300, $end = '...'); ?></p>
            </div>
             <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div> 
        
    </div>
</section>
<?php endif; ?>


<?php if( !$trusted->isEmpty() ): ?>
<section id="trusted" class="trusted-main-block">
    <div class="container">
        <div class="patners-block">
            
            <h6 class="patners-heading text-center btm-40"><?php echo e(__('frontstaticword.Trusted')); ?></h6>
            <div id="patners-slider" class="patners-slider owl-carousel">
                <?php $__currentLoopData = $trusted; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trust): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($trust->status == 1): ?>
                    <div class="item-patners-img">
                        <a href="<?php echo e($trust['url']); ?>" target="_blank"><img src="<?php echo e(asset('images/trusted/'.$trust['image'])); ?>" class="img-fluid" alt="patners-1"></a>
                    </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    
</section>
<?php endif; ?>

<section id="trusted" class="trusted-main-block">
    <!-- google adsense code -->
    <div class="container-fluid" id="adsense">
        <?php
            $ad = App\Adsense::first();
        ?>
        <?php
            if (isset($ad) ) {
             if ($ad->ishome==1 && $ad->status==1) {
                $code = $ad->code;
                echo html_entity_decode($code);
             }
            }
        ?>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('custom-script'); ?>
<script>
    (function($) {
      "use strict";
        $(function() {
           $( "#home-tab" ).trigger( "click" );
        });
    })(jQuery);

    function showtab(id){
        $.ajax({
            type : 'GET',
            url  : '<?php echo e(url('/tabcontent')); ?>/'+id,
            dataType  : 'html',
            success : function(data){

                $('#tabShow').html('');
                $('#tabShow').append(data);
            }
        });
    }
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('theme.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/cherif/Desktop/chelearning/resources/views/home.blade.php ENDPATH**/ ?>