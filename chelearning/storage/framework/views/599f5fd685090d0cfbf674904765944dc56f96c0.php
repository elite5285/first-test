<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <?php if(Auth::User()->user_img != null || Auth::User()->user_img !=''): ?>
          <img src="<?php echo e(asset('images/user_img/'.Auth::User()->user_img)); ?>" class="img-circle" alt="User Image">

          <?php else: ?>
          <img src="<?php echo e(asset('images/default/user.jpg')); ?>" class="img-circle" alt="User Image">

          <?php endif; ?>
        </div>
        <div class="pull-left info">
          <p><?php echo e(Auth::User()->fname); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> <?php echo e(__('adminstaticword.Online')); ?></a>
        </div>
      </div>

      <?php if(Auth::User()->role == "admin"): ?>
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header"><?php echo e(__('adminstaticword.Navigation')); ?></li>
        
          <li class="<?php echo e(Nav::isRoute('admin.index')); ?>"><a href="<?php echo e(route('admin.index')); ?>"><i class="flaticon-web-browser" aria-hidden="true"></i><span><?php echo e(__('adminstaticword.Dashboard')); ?></span></a></li>

          <li class="<?php echo e(Nav::isRoute('user.index')); ?> <?php echo e(Nav::isRoute('user.add')); ?> <?php echo e(Nav::isRoute('user.edit')); ?>"><a href="<?php echo e(route('user.index')); ?>"><i class="flaticon-user" aria-hidden="true"></i><span><?php echo e(__('adminstaticword.Users')); ?></span></a></li>

          <?php if(isset($zoom_enable) && $zoom_enable == 1): ?>
          <li class="<?php echo e(Nav::isRoute('meeting.create')); ?> <?php echo e(Nav::isRoute('zoom.show')); ?> <?php echo e(Nav::isRoute('zoom.edit')); ?> <?php echo e(Nav::isRoute('zoom.setting')); ?> <?php echo e(Nav::isRoute('zoom.index')); ?> <?php echo e(Nav::isRoute('meeting.show')); ?> treeview">
            <a href="#">
             <i class="flaticon-live-1" aria-hidden="true"></i> <span><?php echo e(__('Zoom Live Meetings')); ?></span>
              <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php echo e(Nav::isRoute('zoom.setting')); ?>"><a href="<?php echo e(route('zoom.setting')); ?>"><i class="flaticon-settings-1"></i><?php echo e(__('Zoom Settings')); ?></a></li>
              <li class="<?php echo e(Nav::isRoute('zoom.index')); ?> <?php echo e(Nav::isRoute('zoom.show')); ?> <?php echo e(Nav::isRoute('zoom.edit')); ?> <?php echo e(Nav::isRoute('meeting.create')); ?>"><a href="<?php echo e(route('zoom.index')); ?>"><i class="fa fa-file-text-o"></i><?php echo e(__('Zoom Dashboard')); ?></a></li>
              <li class="<?php echo e(Nav::isRoute('meeting.show')); ?>"><a href="<?php echo e(route('meeting.show')); ?>"><i class="flaticon-online-education"></i><?php echo e(__('adminstaticword.AllMeetings')); ?></a></li>
            </ul>
          </li>
       <?php endif; ?>

       <?php if(isset($gsetting) && $gsetting->bbl_enable == 1): ?>
          <li class="<?php echo e(Nav::isRoute('bbl.setting')); ?> <?php echo e(Nav::isRoute('bbl.all.meeting')); ?> <?php echo e(Nav::isRoute('download.meeting')); ?> treeview">
            <a href="#">
             <i class="flaticon-honesty" aria-hidden="true"></i> <span><?php echo e(__('Big Blue Meetings')); ?></span>
              <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php echo e(Nav::isRoute('bbl.setting')); ?>"><a href="<?php echo e(route('bbl.setting')); ?>"><i class="flaticon-settings"></i><?php echo e(__('Big Blue Button Settings')); ?></a></li>
              <li class="<?php echo e(Nav::isRoute('bbl.all.meeting')); ?>"><a href="<?php echo e(route('bbl.all.meeting')); ?>"><i class="flaticon-terms-and-conditions"></i><?php echo e(__('List Meetings')); ?></a></li>


            </ul>
          </li>
       <?php endif; ?>

          <li class="<?php echo e(Nav::isResource('admin/country')); ?> <?php echo e(Nav::isResource('admin/state')); ?> <?php echo e(Nav::isResource('admin/city')); ?> treeview">
            <a href="#">
              <i class="flaticon-location" aria-hidden="true"></i> <span><?php echo e(__('adminstaticword.Location')); ?></span>
              <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php echo e(Nav::isResource('admin/country')); ?>"><a href="<?php echo e(url('admin/country')); ?>"><i class="flaticon-flag"></i><?php echo e(__('adminstaticword.Country')); ?></a></li>
              <li class="<?php echo e(Nav::isResource('admin/state')); ?>"><a href="<?php echo e(url('admin/state')); ?>"><i class="flaticon-placeholder"></i><?php echo e(__('adminstaticword.State')); ?></a></li>
              <li class="<?php echo e(Nav::isResource('admin/city')); ?>"><a href="<?php echo e(url('admin/city')); ?>"><i class="flaticon-home"></i><?php echo e(__('adminstaticword.City')); ?></a></li>
            </ul>
          </li>

          <li class="<?php echo e(Nav::isResource('currency')); ?>"><a href="<?php echo e(url('currency')); ?>"> <i class="flaticon-wallet"></i><span><?php echo e(__('adminstaticword.Currency')); ?></span></a></li>
         

          <li class="<?php echo e(Nav::isResource('category')); ?> <?php echo e(Nav::isResource('subcategory')); ?> <?php echo e(Nav::isResource('childcategory')); ?> <?php echo e(Nav::isResource('course')); ?> <?php echo e(Nav::isResource('bundle')); ?> <?php echo e(Nav::isResource('courselang')); ?> treeview">
            <a href="#">
                <i class="flaticon-browser-1"></i><?php echo e(__('adminstaticword.Course')); ?>

                <i class="fa fa-angle-left pull-right"></i>
            </a>                            

            <ul class="treeview-menu">
              <li class="<?php echo e(Nav::isResource('category')); ?> <?php echo e(Nav::isResource('subcategory')); ?> <?php echo e(Nav::isResource('childcategory')); ?> <?php echo e(Nav::isResource('courselang')); ?> <?php echo e(Nav::isResource('coursereview')); ?>  treeview">
                  <a href="#"><i class="flaticon-interface" aria-hidden="true"></i><?php echo e(__('adminstaticword.Category')); ?><i class="fa fa-angle-left pull-right"></i></a>
                  
                  <ul class="treeview-menu">
                    <li class="<?php echo e(Nav::isResource('category')); ?>"><a href="<?php echo e(url('category')); ?>"><i class="flaticon-rec"></i><?php echo e(__('adminstaticword.Category')); ?></a></li>
                    <li class="<?php echo e(Nav::isResource('subcategory')); ?>"><a href="<?php echo e(url('subcategory')); ?>"><i class="flaticon-rec"></i><?php echo e(__('adminstaticword.SubCategory')); ?></a></li>
                    <li class="<?php echo e(Nav::isResource('childcategory')); ?>"><a href="<?php echo e(url('childcategory')); ?>"><i class="flaticon-rec"></i><?php echo e(__('adminstaticword.ChildCategory')); ?></a></li>
                  </ul>

                  <li class="<?php echo e(Nav::isResource('course')); ?>"><a href="<?php echo e(url('course')); ?>"><i class="flaticon-document" aria-hidden="true"></i><span><?php echo e(__('adminstaticword.Courses')); ?></span></a></li>

                  <li class="<?php echo e(Nav::isResource('bundle')); ?>"><a href="<?php echo e(url('bundle')); ?>"><i class="flaticon-interface" aria-hidden="true"></i><span><?php echo e(__('adminstaticword.BundleCourse')); ?></span></a></li>

                  <li class="<?php echo e(Nav::isResource('courselang')); ?>"><a href="<?php echo e(url('courselang')); ?>"><i class="flaticon-translation" aria-hidden="true"></i><span><?php echo e(__('adminstaticword.CourseLanguage')); ?></span></a></li>

                  <li class="<?php echo e(Nav::isResource('coursereview')); ?>"><a href="<?php echo e(url('coursereview')); ?>"><i class="flaticon-rate" aria-hidden="true"></i><span><?php echo e(__('adminstaticword.CourseReview')); ?></span></a></li>
                  
                  <?php if($gsetting->assignment_enable == 1): ?>
                  <li class="<?php echo e(Nav::isRoute('assignment.view')); ?>"><a href="<?php echo e(route('assignment.view')); ?>"><i class="flaticon-computer" aria-hidden="true"></i><span><?php echo e(__('adminstaticword.Assignment')); ?></span></a></li>
                  <?php endif; ?>

              </li>
            </ul>
          </li>

          <li class="<?php echo e(Nav::isRoute('allrequestinvolve')); ?> <?php echo e(Nav::isRoute('involve.request.index')); ?> <?php echo e(Nav::isRoute('involve.request.course')); ?> treeview">
            <a href="#">
              <i class="flaticon-test" aria-hidden="true"></i> <span><?php echo e(__('adminstaticword.CourseInvolvement')); ?></span>
              <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php echo e(Nav::isRoute('allrequestinvolve')); ?>"><a href="<?php echo e(route('allrequestinvolve')); ?>"> <i class="flaticon-pending"></i><?php echo e(__('adminstaticword.RequestToInvolve')); ?></a></li>
              <li class="<?php echo e(Nav::isRoute('involve.request.index')); ?>"><a href="<?php echo e(route('involve.request.index')); ?>"><i class="flaticon-question" aria-hidden="true"></i><?php echo e(__('adminstaticword.InvolveRequest')); ?></a></li>
               <li class="<?php echo e(Nav::isRoute('involve.request.course')); ?>"><a href="<?php echo e(route('involve.request.course')); ?>"><i class="flaticon-web-browser" aria-hidden="true"></i><?php echo e(__('adminstaticword.ApplyCourse')); ?></a></li>
            </ul>
          </li>

          <li class="<?php echo e(Nav::isResource('coupon')); ?>"><a href="<?php echo e(url('coupon')); ?>"><i class="flaticon-coupon" aria-hidden="true"></i><span><?php echo e(__('adminstaticword.Coupon')); ?></span></a></li>

          <li class="<?php echo e(Nav::isRoute('all.instructor')); ?> <?php echo e(Nav::isResource('requestinstructor')); ?> treeview">
           <a href="#">
             <i class="flaticon-teacher" aria-hidden="true"></i> <span><?php echo e(__('adminstaticword.Instructors')); ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php echo e(Nav::isRoute('all.instructor')); ?>"><a href="<?php echo e(route('all.instructor')); ?>"><i class="flaticon-customer"></i><?php echo e(__('adminstaticword.AllInstructor')); ?></a></li>
              <li class="<?php echo e(Nav::isResource('requestinstructor')); ?>"><a href="<?php echo e(url('requestinstructor')); ?>"><i class="flaticon-graduation"></i><?php echo e(__('adminstaticword.InstructorRequest')); ?></a></li>
            </ul>
          </li>
          

          <li class="<?php echo e(Nav::isResource('order')); ?>"><a href="<?php echo e(url('order')); ?>"><i class="flaticon-shopping-cart" aria-hidden="true"></i><span><?php echo e(__('adminstaticword.Order')); ?></span></a></li>

    
          <li class="<?php echo e(Nav::isResource('page')); ?>"><a href="<?php echo e(url('page')); ?>"><i class="flaticon-computer" aria-hidden="true"></i><span><?php echo e(__('adminstaticword.Pages')); ?></span></a></li>

          <li class="<?php echo e(Nav::isResource('faq')); ?> <?php echo e(Nav::isResource('faqinstructor')); ?>  treeview">
           <a href="#">
             <i class="flaticon-faq" aria-hidden="true"></i> <span><?php echo e(__('adminstaticword.Faq')); ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php echo e(Nav::isResource('faq')); ?>"><a href="<?php echo e(url('faq')); ?>"><i class="flaticon-chat"></i><?php echo e(__('adminstaticword.FaqStudent')); ?></a></li>
              <li class="<?php echo e(Nav::isResource('faqinstructor')); ?>"><a href="<?php echo e(url('faqinstructor')); ?>"><i class="flaticon-question"></i><?php echo e(__('adminstaticword.FaqInstructor')); ?></a></li>
            </ul>
          </li>

          <li class="<?php echo e(Nav::isRoute('instructor.settings')); ?> <?php echo e(Nav::isRoute('admin.instructor')); ?> <?php echo e(Nav::isRoute('admin.completed')); ?>  treeview">
           <a href="#">
             <i class="flaticon-payment" aria-hidden="true"></i> <span><?php echo e(__('adminstaticword.InstructorPayout')); ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php echo e(Nav::isRoute('instructor.settings')); ?>"><a href="<?php echo e(route('instructor.settings')); ?>"><i class="flaticon-settings-3"></i><?php echo e(__('adminstaticword.PayoutSettings')); ?></a></li>
              <li class="<?php echo e(Nav::isRoute('admin.instructor')); ?>"><a href="<?php echo e(route('admin.instructor')); ?>"><i class="flaticon-pending"></i><?php echo e(__('adminstaticword.PendingPayout')); ?></a></li>

              <li class="<?php echo e(Nav::isRoute('admin.completed')); ?>"><a href="<?php echo e(route('admin.completed')); ?>"><i class="flaticon-file"></i><?php echo e(__('adminstaticword.CompletedPayout')); ?></a></li>
            
            </ul>
          </li>

          <li class="<?php echo e(Nav::isResource('user/course/report')); ?>  treeview">
           <a href="#">
             <i class="flaticon-flag" aria-hidden="true"></i> <span><?php echo e(__('adminstaticword.Report')); ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php echo e(Nav::isResource('user/course/report')); ?>"><a href="<?php echo e(url('user/course/report')); ?>"><i class="flaticon-error"></i><span><?php echo e(__('adminstaticword.Report')); ?> Course</span></a></li>
              <li class="<?php echo e(Nav::isResource('user/question/report')); ?>"><a href="<?php echo e(url('user/question/report')); ?>"><i class="flaticon-question-mark"></i><span><?php echo e(__('adminstaticword.Report')); ?> Question</span></a></li>
            </ul>
          </li>

          <li class="<?php echo e(Nav::isResource('slider')); ?> <?php echo e(Nav::isResource('facts')); ?> <?php echo e(Nav::isRoute('category.slider')); ?> <?php echo e(Nav::isResource('getstarted')); ?> <?php echo e(Nav::isResource('trusted')); ?> <?php echo e(Nav::isRoute('widget.setting')); ?> <?php echo e(Nav::isRoute('terms')); ?> <?php echo e(Nav::isResource('testimonial')); ?> treeview">
           <a href="#">
             <i class="flaticon-optimization" aria-hidden="true"></i> <span><?php echo e(__('adminstaticword.FrontSetting')); ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php echo e(Nav::isResource('slider')); ?>"><a href="<?php echo e(url('slider')); ?>"><i class="flaticon-slider-tool"></i><span><?php echo e(__('adminstaticword.Slider')); ?></span></a></li>
              <li class="<?php echo e(Nav::isResource('facts')); ?>"><a href="<?php echo e(url('facts')); ?>"><i class="flaticon-project-management"></i><span><?php echo e(__('adminstaticword.FactsSlider')); ?></span></a></li>
              <li class="<?php echo e(Nav::isRoute('category.slider')); ?>"><a href="<?php echo e(route('category.slider')); ?>"><i class="flaticon-interface"></i><span><?php echo e(__('adminstaticword.CategorySlider')); ?></span></a></li>
              <li class="<?php echo e(Nav::isResource('getstarted')); ?>"><a href="<?php echo e(url('getstarted')); ?>"><i class="flaticon-shuttle"></i><?php echo e(__('adminstaticword.GetStarted')); ?></a></li>
              <li class="<?php echo e(Nav::isResource('trusted')); ?>"><a href="<?php echo e(url('trusted')); ?>"><i class="flaticon-sliders"></i><span><?php echo e(__('adminstaticword.TrustedSlider')); ?></span></a></li>
              <li class="<?php echo e(Nav::isRoute('widget.setting')); ?>"><a href="<?php echo e(route('widget.setting')); ?>"><i class="flaticon-real-state"></i><?php echo e(__('adminstaticword.WidgetSetting')); ?></a></li>
              <li class="<?php echo e(Nav::isResource('testimonial')); ?>"><a href="<?php echo e(url('testimonial')); ?>"><i class="flaticon-customer-1"></i><?php echo e(__('adminstaticword.Testimonial')); ?></a></li>
            </ul>
          </li>
          
          <li class="<?php echo e(Nav::isRoute('gen.set')); ?> <?php echo e(Nav::isRoute('api.setApiView')); ?> <?php echo e(Nav::isResource('blog')); ?> <?php echo e(Nav::isRoute('about.page')); ?> <?php echo e(Nav::isRoute('careers.page')); ?> <?php echo e(Nav::isRoute('comingsoon.page')); ?> <?php echo e(Nav::isRoute('termscondition')); ?> <?php echo e(Nav::isRoute('policy')); ?> <?php echo e(Nav::isRoute('bank.transfer')); ?> <?php echo e(Nav::isRoute('show.pwa')); ?> <?php echo e(Nav::isRoute('adsense')); ?> treeview">
           <a href="#">
             <i class="flaticon-tools" aria-hidden="true"></i> <span><?php echo e(__('adminstaticword.SiteSetting')); ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php echo e(Nav::isRoute('gen.set')); ?>"><a href="<?php echo e(route('gen.set')); ?>"><i class="flaticon-admin"></i><span><?php echo e(__('adminstaticword.Setting')); ?></span></a></li>
              <li class="<?php echo e(Nav::isRoute('api.setApiView')); ?>"><a href="<?php echo e(route('api.setApiView')); ?>"><i class="flaticon-report"></i><?php echo e(__('adminstaticword.APISetting')); ?></a></li>
              
              <li class="<?php echo e(Nav::isResource('blog')); ?>"><a href="<?php echo e(url('blog')); ?>"><i class="flaticon-real-state"></i><?php echo e(__('adminstaticword.Blog')); ?></a></li>
              <li class="<?php echo e(Nav::isRoute('about.page')); ?>"><a href="<?php echo e(route('about.page')); ?>"><i class="flaticon-book"></i><?php echo e(__('adminstaticword.About')); ?></a></li>
              <li class="<?php echo e(Nav::isRoute('careers.page')); ?>"><a href="<?php echo e(route('careers.page')); ?>"><i class="flaticon-mobile-marketing"></i><?php echo e(__('adminstaticword.Career')); ?></a></li>
              <li class="<?php echo e(Nav::isRoute('comingsoon.page')); ?>"><a href="<?php echo e(route('comingsoon.page')); ?>"><i class="flaticon-fast-time"></i><?php echo e(__('adminstaticword.ComingSoon')); ?></a></li>
              <li class="<?php echo e(Nav::isRoute('termscondition')); ?>"><a href="<?php echo e(route('termscondition')); ?>"><i class="flaticon-terms-and-conditions"></i><?php echo e(__('adminstaticword.Terms&Condition')); ?> </a></li>
              <li class="<?php echo e(Nav::isRoute('policy')); ?>"><a href="<?php echo e(route('policy')); ?>"><i class="flaticon-smartphone"></i> <?php echo e(__('adminstaticword.PrivacyPolicy')); ?></a></li>

              <li class="<?php echo e(Nav::isRoute('bank.transfer')); ?>"><a href="<?php echo e(route('bank.transfer')); ?>"><i class="flaticon-bank"></i> <?php echo e(__('adminstaticword.BankDetails')); ?></a></li>

              <li class="<?php echo e(Nav::isRoute('show.pwa')); ?>"><a href="<?php echo e(route('show.pwa')); ?>"><i class="flaticon-mobile-marketing" aria-hidden="true"></i><span> <?php echo e(__('adminstaticword.PWASetting')); ?></span></a></li>
              <li class="<?php echo e(Nav::isRoute('adsense')); ?>"><a href="<?php echo e(url('/admin/adsensesetting')); ?>" title="Page Setting"><span><i class="flaticon-settings-3"></i> <?php echo e(__('adminstaticword.AdsenseSetting')); ?></span></a></li>
              
              <?php if(isset($gsetting) && $gsetting->ipblock_enable == 1): ?>
              <li class="<?php echo e(Nav::isRoute('ipblock.view')); ?>"><a href="<?php echo e(url('admin/ipblock')); ?>" title="IPBlock Setting"><span><i class="flaticon-error"></i> <?php echo e(__('adminstaticword.IPBlockSettings')); ?></span></a></li>
              <?php endif; ?>


              <li class="<?php echo e(Nav::isRoute('whatsapp.button')); ?>"><a href="<?php echo e(route('whatsapp.button')); ?>" title="Whatsapp Button Setting"><span><i class="flaticon-error"></i> <?php echo e(__('adminstaticword.WhatsappButtonSetting')); ?></span></a></li>
             

            </ul>
          </li>

          <li class="<?php echo e(Nav::isRoute('player.set')); ?> <?php echo e(Nav::isRoute('ads')); ?> <?php echo e(Nav::isRoute('ad.setting')); ?> treeview">
           <a href="#">
             <i class="flaticon-video" aria-hidden="true"></i> <span><?php echo e(__('adminstaticword.PlayerSettings')); ?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">

              <li class="<?php echo e(Nav::isRoute('player.set')); ?>"><a href="<?php echo e(route('player.set')); ?>"><i class="flaticon-digital-marketing"></i> <?php echo e(__('adminstaticword.PlayerCustomization')); ?></a></li>

              <li class="<?php echo e(Nav::isRoute('ads')); ?>"><a href="<?php echo e(url('admin/ads')); ?>" title="Create ad"><i class="flaticon-video-advertising"></i><?php echo e(__('adminstaticword.Advertise')); ?></a></li>
              <?php $ads = App\Ads::all(); ?>
              <?php if($ads->count()>0): ?>
              <li class="<?php echo e(Nav::isRoute('ad.setting')); ?>"><a href="<?php echo e(url('admin/ads/setting')); ?>" title="Ad Settings"><i class="flaticon-project-management"></i><?php echo e(__('adminstaticword.AdvertiseSettings')); ?></a></li>
              <?php endif; ?>

            </ul>
          </li>

          <li class="<?php echo e(Nav::isRoute('show.lang')); ?>"><a href="<?php echo e(route('show.lang')); ?>"><i class="flaticon-translation" aria-hidden="true"></i><span><?php echo e(__('adminstaticword.Language')); ?></span></a></li>

          <li class="<?php echo e(Nav::isResource('usermessage')); ?>"><a href="<?php echo e(url('usermessage')); ?>"><i class="flaticon-phone-book" aria-hidden="true"></i><span><?php echo e(__('adminstaticword.ContactUs')); ?></span></a></li>


          <li class="<?php echo e(Nav::isResource('show.sitemap')); ?>"><a href="<?php echo e(route('show.sitemap')); ?>"><i class="flaticon-location" aria-hidden="true"></i><span><?php echo e(__('adminstaticword.SiteMap')); ?></span></a></li>

          <li class="<?php echo e(Nav::isRoute('get.api.key')); ?>"><a href="<?php echo e(route('get.api.key')); ?>"><i class="flaticon-test" aria-hidden="true"></i><span>Get API Keys</span></a></li>
          

        </ul>
      <?php endif; ?>


    </section>
    <!-- /.sidebar -->
</aside><?php /**PATH /Users/cherif/Desktop/PFELearning/resources/views/admin/layouts/sidebar.blade.php ENDPATH**/ ?>