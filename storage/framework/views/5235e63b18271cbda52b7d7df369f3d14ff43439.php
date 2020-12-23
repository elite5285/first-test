<?php if($gsetting->promo_enable == 1): ?>
<div id="promo-outer">
    <div id="promo-inner">
        <a href="<?php echo e($gsetting['promo_link']); ?>"><?php echo e($gsetting['promo_text']); ?></a>
        <span id="close">x</span>
    </div>
</div>
<div id="promo-tab" class="display-none">SHOW</div>
<?php endif; ?>

<section id="nav-bar" class="nav-bar-main-block">
    <div class="container">
        <!-- start navigation -->
        <div class="navigation fullscreen-search-block">
            <span style="font-size:30px;cursor:pointer" onclick="openNav()" class="hamburger">&#9776; </span>
            <div class="logo">
                <?php
                    $setting = App\Setting::first();
                ?>

                <?php if($setting->logo_type == 'L'): ?>
                    <a href="<?php echo e(url('/')); ?>" ><img src="<?php echo e(asset('images/logo/'.$setting->logo)); ?>" class="img-fluid" alt="logo"></a>
                <?php else: ?>
                    <a href="<?php echo e(url('/')); ?>"><b><div class="logotext"><?php echo e($setting->project_title); ?></div></b></a>
                <?php endif; ?>
            </div>
            <div class="nav-search nav-wishlist">
                <a href="#find"><i class="fa fa-search"></i></a>
            </div>
            <?php if(auth()->guard()->check()): ?>
            <div class="shopping-cart">
                <a href="<?php echo e(route('cart.show')); ?>" title="Cart"><i class="flaticon-shopping-cart"></i></a>
                <span class="red-menu-badge red-bg-success">
                    <?php
                        $item = App\Cart::where('user_id', Auth::User()->id)->get();
                        if(count($item)>0){

                            echo count($item);
                        }
                        else{

                            echo "0";
                        }
                    ?>
                </span>
            </div>
            <div class="nav-wishlist">
                <div id="notification_li">
                    <a href="<?php echo e(url('send')); ?>" id="notificationLinkk" title="Notification"><i class="fa fa-bell"></i></a>
                    <span class="red-menu-badge red-bg-success">
                        <?php echo e(Auth()->user()->unreadNotifications->count()); ?>

                    </span>
                    <div id="notificationContainerr">
                    <div id="notificationTitle"><?php echo e(__('frontstaticword.Notifications')); ?></div>
                    <div id="notificationsBody" class="notifications">
                        <ul>
                            <?php $__currentLoopData = Auth()->user()->unreadNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="unread-notification">
                                    <a href="<?php echo e(url('notifications/'.$notification->id)); ?>">          
                                    <div class="notification-image">
                                        <?php if($notification->data['image'] !== NULL ): ?>
                                            <img src="<?php echo e(asset('images/course/'.$notification->data['image'])); ?>" alt="course" class="img-fluid" >
                                        <?php else: ?>
                                            <img src="<?php echo e(Avatar::create($notification->data['id'])->toBase64()); ?>" alt="course" class="img-fluid">
                                        <?php endif; ?>
                                    </div>
                                    <div class="notification-data">
                                        In <?php echo e(str_limit($notification->data['id'], $limit = 20, $end = '...')); ?>

                                        <br>
                                        <?php echo e(str_limit($notification->data['data'], $limit = 20, $end = '...')); ?>

                                    </div>
                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <?php $__currentLoopData = Auth()->user()->readNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a href="<?php echo e(route('mycourse.show')); ?>">
                                    <div class="notification-image">
                                        <?php if($notification->data['image'] !== NULL ): ?>
                                            <img src="<?php echo e(asset('images/course/'.$notification->data['image'])); ?>" alt="course" class="img-fluid" >
                                        <?php else: ?>
                                           <img src="<?php echo e(Avatar::create($notification->data['id'])->toBase64()); ?>" alt="course" class="img-fluid">
                                        <?php endif; ?>
                                    </div>
                                    <div class="notification-data">
                                        In <?php echo e(str_limit($notification->data['id'], $limit = 20, $end = '...')); ?>

                                        <br>
                                        <?php echo e(str_limit($notification->data['data'], $limit = 20, $end = '...')); ?>

                                    </div>
                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <div id="notificationFooter"><a href="<?php echo e(route('deleteNotification')); ?>"><?php echo e(__('frontstaticword.ClearAll')); ?></a></div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            

            <div id="mySidenav" class="sidenav">
              <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <?php if(auth()->guard()->guest()): ?>
                <div class="login-block">
                    <a href="<?php echo e(route('register')); ?>" class="btn btn-primary" title="register"><?php echo e(__('frontstaticword.Signup')); ?></a>
                    <a href="<?php echo e(route('login')); ?>" class="btn btn-secondary" title="login"><?php echo e(__('frontstaticword.Login')); ?></a>
                </div>
                <?php endif; ?>
                <?php if(auth()->guard()->check()): ?>

                <div id="notificationTitle">
                    <?php if(Auth::User()->user_img != null || Auth::User()->user_img !=''): ?>
                      <img src="<?php echo e(url('/images/user_img/'.Auth::User()->user_img)); ?>" class="dropdown-user-circle" alt="user">
                    <?php else: ?>
                        <img src="<?php echo e(asset('images/default/user.jpg')); ?>" class="dropdown-user-circle" alt="user">
                    <?php endif; ?>
                    <div class="user-detailss">
                        Hi, <?php echo e(Auth::User()->fname); ?>

                        
                    </div>
                    
                </div>

                <div class="login-block">

                    <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <div id="notificationFooter">
                            <?php echo e(__('frontstaticword.Logout')); ?>

                            
                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="display-none">
                                <?php echo csrf_field(); ?>
                            </form>
                        </div>
                    </a>
                </div>

                <?php endif; ?>
                
                <div class="wrapper center-block">
                    <?php
                     $categories = App\Categories::orderBy('position','ASC')->get();
                    ?>
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <?php $__currentLoopData = $categories->where('status', '1'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="panel panel-default">
                        <div class="panel-heading active" role="tab" id="headingOne">
                            <h4 class="panel-title">
                            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne<?php echo e($cate->id); ?>" aria-expanded="true" aria-controls="collapseOne">
                                <i class="fa <?php echo e($cate->icon); ?> rgt-10"></i> <label class="prime-cat" data-url="<?php echo e(route('category.page',$cate->id)); ?>"><?php echo e(str_limit($cate->title, $limit = 20, $end = '..')); ?></label> 
                            </a>
                            </h4>
                        </div>

                        
                        <div id="collapseOne<?php echo e($cate->id); ?>" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                        <?php $__currentLoopData = $cate->subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php if($sub->status ==1): ?>
                          <div class="panel-body">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingeleven">
                                  <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseeleven<?php echo e($sub->id); ?>" aria-expanded="false" aria-controls="collapseeleven">
                                      <i class="fa <?php echo e($sub->icon); ?> rgt-10"></i> <label class="sub-cate" data-url="<?php echo e(route('subcategory.page',$sub->id)); ?>"><?php echo e(str_limit($sub->title, $limit = 15, $end = '..')); ?></label>

                                    </a>
                                  </h4>
                                </div>

                                <div id="collapseeleven<?php echo e($sub->id); ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingeleven">
                                  <?php $__currentLoopData = $sub->childcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <?php if($child->status ==1): ?>
                                  <div class="panel-body sub-cat">
                                    <i class="fa <?php echo e($child->icon); ?> rgt-10"></i> <label class="child-cate" data-url="<?php echo e(route('childcategory.page',$child->id)); ?>"><?php echo e($child->title); ?> </label>
                                  </div>
                                  <?php endif; ?>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                
                            </div>
                          </div>
                          <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        
                      </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
                      
                </div>
              
                <!-- ........  -->
                <?php if(auth()->guard()->check()): ?>


                <div class="sidebar-nav-icon">
                    <ul>
                         <?php if(Auth::User()->role == "admin" ): ?>
                        <a target="_blank" href="<?php echo e(url('/admins')); ?>"><li><i class="fa fa-dashboard"></i><?php echo e(__('frontstaticword.AdminDashboard')); ?></li></a>
                        <?php endif; ?>
                        <?php if(Auth::User()->role == "instructor"): ?>

                        <a target="_blank" href="<?php echo e(url('/admins')); ?>"><li><i class="fa fa-dashboard"></i><?php echo e(__('frontstaticword.InstructorDashboard')); ?></li></a>
                        <?php endif; ?>
                        <a href="<?php echo e(route('mycourse.show')); ?>"><li><i class="fa fa-diamond"></i><?php echo e(__('frontstaticword.MyCourses')); ?></li></a>
                        <a href="<?php echo e(route('wishlist.show')); ?>"><li><i class="fa fa-heart"></i><?php echo e(__('frontstaticword.MyWishlist')); ?></li></a>
                        <a href="<?php echo e(route('purchase.show')); ?>"><li><i class="fa fa-shopping-cart"></i><?php echo e(__('frontstaticword.PurchaseHistory')); ?></li></a>
                        <a href="<?php echo e(route('profile.show',Auth::User()->id)); ?>"><li ><i class="fa fa-user"></i><?php echo e(__('frontstaticword.UserProfile')); ?></li></a>
                        <?php if(Auth::User()->role == "user"): ?>
                            <?php if($gsetting->instructor_enable == 1): ?>
                            <a href="#" data-toggle="modal" data-target="#myModalinstructor" title="Become An Instructor"><li><i class="fas fa-chalkboard-teacher"></i><?php echo e(__('frontstaticword.BecomeAnInstructor')); ?></li></a>
                            <?php endif; ?>
                
                        <?php endif; ?>

                       
                    </ul>
                </div>
                
               
                <?php endif; ?>
            </div>
        </div>
        
        <!-- end navigation -->
        <div class="row smallscreen-search-block">
            <div class="col-lg-5">
                <div class="row">
                    <div class="col-lg-6 col-md-4 col-sm-12">
                        <div class="logo">
                            <?php
                                $setting = App\Setting::first();
                            ?>

                            <?php if($setting->logo_type == 'L'): ?>
                                <a href="<?php echo e(url('/')); ?>" ><img src="<?php echo e(asset('images/logo/'.$setting->logo)); ?>" class="img-fluid" alt="logo"></a>
                            <?php else: ?>
                                <a href="<?php echo e(url('/')); ?>"><b><div class="logotext"><?php echo e($setting->project_title); ?></div></b></a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4 col-sm-12">
                        <div class="navigation">
                            <div id="cssmenu">
                                <ul>
                                    <li><a href="#" title="Categories"><i class="flaticon-grid"></i><?php echo e(__('frontstaticword.Categories')); ?></a>
                                        <?php
                                         $categories = App\Categories::orderBy('position','ASC')->get();
                                        ?>
                                        <ul>
                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($cate->status == 1 ): ?>
                                            <li><a href="<?php echo e(route('category.page',$cate->id)); ?>" title="<?php echo e($cate->title); ?>"><i class="fa <?php echo e($cate->icon); ?> rgt-20"></i><?php echo e(str_limit($cate->title, $limit = 25, $end = '..')); ?><i class="fa fa-chevron-right float-rgt"></i></a>
                                            <ul>   
                                                <?php $__currentLoopData = $cate->subcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($sub->status ==1): ?>
                                                <li><a href="<?php echo e(route('subcategory.page',$sub->id)); ?>" title="<?php echo e($sub->title); ?>"><i class="fa <?php echo e($sub->icon); ?> rgt-20"></i><?php echo e(str_limit($sub->title, $limit = 25, $end = '..')); ?>

                                                    <i class="fa fa-chevron-right float-rgt"></i></a>
                                                    <ul>
                                                        <?php $__currentLoopData = $sub->childcategory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($child->status ==1): ?>
                                                        <li>
                                                            <a href="<?php echo e(route('childcategory.page',$child->id)); ?>" title="<?php echo e($child->title); ?>"><i class="fa <?php echo e($child->icon); ?> rgt-20"></i><?php echo e(str_limit($child->title, $limit = 25, $end = '..')); ?></a>
                                                        </li>
                                                        <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                </li>
                                                <?php endif; ?>
                                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                            </li>
                                            <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <?php if(auth()->guard()->guest()): ?>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="learning-business">
                            
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="Login-btn">
                            <a href="#find" class="nav-search nav-wishlist"><i class="fa fa-search"></i></a>
                            <a href="<?php echo e(route('login')); ?>" class="btn btn-secondary" title="login"><?php echo e(__('frontstaticword.Login')); ?></a>
                            <a href="<?php echo e(route('register')); ?>" class="btn btn-primary" title="register"><?php echo e(__('frontstaticword.Signup')); ?></a>
                            
                        </div> 
                    </div>
                <?php endif; ?>

                <?php if(auth()->guard()->check()): ?>
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-6">
                        <div class="learning-business learning-business-two">
                            <?php if(Auth::User()->role == "user"): ?>
                                <?php if($setting->instructor_enable == 1): ?>
                                    <a href="#" class="btn btn-link" data-toggle="modal" data-target="#myModalinstructor" title="Become An Instructor"><?php echo e(__('frontstaticword.BecomeAnInstructor')); ?></a>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-6">
                        <div class="learning-business">
                            <a href="<?php echo e(route('mycourse.show')); ?>" class="btn btn-link" title="My Course"><?php echo e(__('frontstaticword.MyCourses')); ?></a>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-2 col-2">
                        <div class="nav-wishlist">
                            <ul id="nav">
                                <li id="notification_li">
                                    <a href="<?php echo e(url('send')); ?>" id="notificationLink" title="Notification"><i class="fa fa-bell"></i></a>
                                    <span class="red-menu-badge red-bg-success">
                                        <?php echo e(Auth()->user()->unreadNotifications->count()); ?>

                                    </span>
                                    <div id="notificationContainer">
                                    <div id="notificationTitle"><?php echo e(__('frontstaticword.Notifications')); ?></div>
                                    <div id="notificationsBody" class="notifications">
                                        <ul>
                                            <?php $__currentLoopData = Auth()->user()->unreadNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li class="unread-notification">
                                                    <a href="<?php echo e(url('notifications/'.$notification->id)); ?>">          
                                                    <div class="notification-image">
                                                        <?php if($notification->data['image'] !== NULL ): ?>
                                                            <img src="<?php echo e(asset('images/course/'.$notification->data['image'])); ?>" alt="course" class="img-fluid" >
                                                        <?php else: ?>
                                                            <img src="<?php echo e(Avatar::create($notification->data['id'])->toBase64()); ?>" alt="course" class="img-fluid">
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="notification-data">
                                                        In <?php echo e(str_limit($notification->data['id'], $limit = 20, $end = '...')); ?>

                                                        <br>
                                                        <?php echo e(str_limit($notification->data['data'], $limit = 20, $end = '...')); ?>

                                                    </div>
                                                    </a>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            <?php $__currentLoopData = Auth()->user()->readNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                    <a href="<?php echo e(route('mycourse.show')); ?>">
                                                    <div class="notification-image">
                                                        <?php if($notification->data['image'] !== NULL ): ?>
                                                            <img src="<?php echo e(asset('images/course/'.$notification->data['image'])); ?>" alt="course" class="img-fluid" >
                                                        <?php else: ?>
                                                           <img src="<?php echo e(Avatar::create($notification->data['id'])->toBase64()); ?>" alt="course" class="img-fluid">
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="notification-data">
                                                        In <?php echo e(str_limit($notification->data['id'], $limit = 20, $end = '...')); ?>

                                                        <br>
                                                        <?php echo e(str_limit($notification->data['data'], $limit = 20, $end = '...')); ?>

                                                    </div>
                                                    </a>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </div>
                                    <div id="notificationFooter"><a href="<?php echo e(route('deleteNotification')); ?>"><?php echo e(__('frontstaticword.ClearAll')); ?></a></div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-2 col-2">
                        <div class="nav-wishlist">
                            <a href="<?php echo e(route('wishlist.show')); ?>" title="Go to Wishlist"><i class="fa fa-heart"></i></a>
                            <span class="red-menu-badge red-bg-success">
                                <?php
                                    $data = App\Wishlist::where('user_id', Auth::User()->id)->get();
                                    if(count($data)>0){

                                        echo count($data);
                                    }
                                    else{

                                        echo "0";
                                    }
                                ?>
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-2 col-2">
                        <div class="shopping-cart">
                            <a href="<?php echo e(route('cart.show')); ?>" title="Cart"><i class="flaticon-shopping-cart"></i></a>
                            <span class="red-menu-badge red-bg-success">
                                <?php
                                    $item = App\Cart::where('user_id', Auth::User()->id)->get();
                                    if(count($item)>0){

                                        echo count($item);
                                    }
                                    else{

                                        echo "0";
                                    }
                                ?>
                            </span>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-2 col-2">
                        <div class="nav-search nav-wishlist">
                            <a href="#find"><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                        <div class="my-container">
                          <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle  my-dropdown" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <?php if(Auth::User()->user_img != null || Auth::User()->user_img !=''): ?>
                                  <img src="<?php echo e(url('/images/user_img/'.Auth::User()->user_img)); ?>" class="circle" alt="user">
                                <?php else: ?>
                                    <img src="<?php echo e(asset('images/default/user.jpg')); ?>"  class="circle" alt="user">
                                <?php endif; ?>
                                <span class="dropdown__item name" id="name"><?php echo e(str_limit(Auth::User()->fname, $limit = 10, $end = '..')); ?></span>
                                <span class="dropdown__item caret"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right User-Dropdown U-open" aria-labelledby="dropdownMenu1">
                                <div id="notificationTitle">
                                    <?php if(Auth::User()->user_img != null || Auth::User()->user_img !=''): ?>
                                      <img src="<?php echo e(url('/images/user_img/'.Auth::User()->user_img)); ?>" class="dropdown-user-circle" alt="user">
                                    <?php else: ?>
                                        <img src="<?php echo e(asset('images/default/user.jpg')); ?>" class="dropdown-user-circle" alt="user">
                                    <?php endif; ?>
                                    <div class="user-detailss">
                                        <?php echo e(Auth::User()->fname); ?>

                                        <br>
                                        <?php echo e(Auth::User()->email); ?>

                                    </div>
                                    
                                </div>
                                <?php if(Auth::User()->role == "admin" ): ?>
                                <a target="_blank" href="<?php echo e(url('/admins')); ?>"><li><i class="fa fa-dashboard"></i><?php echo e(__('frontstaticword.AdminDashboard')); ?></li></a>
                                <?php endif; ?>
                                <?php if(Auth::User()->role == "instructor"): ?>

                                <a target="_blank" href="<?php echo e(url('/admins')); ?>"><li><i class="fa fa-dashboard"></i><?php echo e(__('frontstaticword.InstructorDashboard')); ?></li></a>
                                <?php endif; ?>
                                <a href="<?php echo e(route('mycourse.show')); ?>"><li><i class="fa fa-diamond"></i><?php echo e(__('frontstaticword.MyCourses')); ?></li></a>
                                <a href="<?php echo e(route('wishlist.show')); ?>"><li><i class="fa fa-heart"></i><?php echo e(__('frontstaticword.MyWishlist')); ?></li></a>
                                <a href="<?php echo e(route('purchase.show')); ?>"><li><i class="fa fa-shopping-cart"></i><?php echo e(__('frontstaticword.PurchaseHistory')); ?></li></a>
                                <a href="<?php echo e(route('profile.show',Auth::User()->id)); ?>"><li ><i class="fa fa-user"></i><?php echo e(__('frontstaticword.UserProfile')); ?></li></a>
                                <?php if(Auth::User()->role == "user"): ?>
                                <?php if($gsetting->instructor_enable == 1): ?>
                                <a href="#" data-toggle="modal" data-target="#myModalinstructor" title="Become An Instructor"><li><i class="fas fa-chalkboard-teacher"></i><?php echo e(__('frontstaticword.BecomeAnInstructor')); ?></li></a>

                                <?php endif; ?>
                        
                                <?php endif; ?>

                                <?php if(Auth::User()->role == "user" || Auth::User()->role == "instructor"): ?>
                                <?php if($gsetting->device_control == 1): ?>
                                <a href="<?php echo e(route('active.courses')); ?>" title="Watchlist"><li><i class="fas fa-swatchbook"></i><?php echo e(__('frontstaticword.Watchlist')); ?></li></a>
                                <?php endif; ?>
                                <?php endif; ?>

                                <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <div id="notificationFooter">
                                        <?php echo e(__('frontstaticword.Logout')); ?>

                                        
                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="display-none">
                                            <?php echo csrf_field(); ?>
                                        </form>
                                    </div>
                                </a>
                            </ul>
                          </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
        
    </div>
</section>

<!-- start search -->
<div id="find" class="small-screen-navigation">
    <button type="button" class="close">×</button>
     <form action="<?php echo e(route('search')); ?>" class="form-inline search-form" method="GET">
         <input type="find" name="searchTerm" class="form-control" id="search"  placeholder="<?php echo e(__('frontstaticword.Searchforcourses')); ?>" value="<?php echo e(isset($searchTerm) ? $searchTerm : ''); ?>">
         <button type="submit" class="btn btn-outline-info btn_sm">Search</button> 
     </form>
</div>
<!-- start end -->


<!-- side navigation  -->
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>

<?php $__env->startSection('custom-script'); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('instructormodel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php /**PATH /Users/cherif/Desktop/chelearning/resources/views/theme/nav.blade.php ENDPATH**/ ?>