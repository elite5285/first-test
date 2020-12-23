<?php


use App\User;
use App\Setting;
use App\CourseClass;
use App\Course;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::middleware(['web'])->group(function () {
   

    Route::get('getsecretkey', 'GenerateApiController@getkey')->name('get.api.key')->middleware('is_admin');
    Route::post('createkey', 'GenerateApiController@createKey')->middleware('is_admin')->name('apikey.create');

  
  Route::middleware(['IsInstalled' ,'switch_languages', 'ip_block', 'maintanance_mode'])->group(function () {

    // Auth Routes
    

    Route::middleware(['is_verified'])->group(function () {

        Route::get('/', 'HomeController@index');
        Route::get('/home', 'HomeController@index')->name('home');

    });

    Auth::routes(['verify' => true]);

    Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
    Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify');
    

    Route::prefix('admins')->group(function (){
        Route::get('/', 'AdminController@index')->name('admin.index');
    });

    Route::middleware(['is_active', 'auth'])->group(function () {

        Route::middleware(['is_admin'])->group(function () {

            
            Route::get('/admin/playersetting','PlayerSettingController@get')->name('player.set');
            Route::post('/admin/playersetting/update','PlayerSettingController@update')->name('player.update');

            Route::get('admin/ads','AdsController@getAds')->name('ads');
            Route::post('admin/ads/insert','AdsController@store')->name('ad.store');

            Route::get('admin/ads/setting','AdsController@getAdsSettings')->name('ad.setting');

            ;

            Route::prefix('user')->group(function (){
            Route::get('/','UserController@viewAllUser')->name('user.index');
            Route::get('/adduser','UserController@create')->name('user.add');
            Route::post('/insertuser','UserController@store')->name('user.store');
            Route::get('edit/{id}','UserController@edit')->name('user.edit');
            Route::put('/edit/{id}','UserController@update')->name('user.update');   
            Route::delete('delete/{id}','UserController@destroy')->name('user.delete');
            });           
            Route::get('settings','SettingController@genreal')->name('gen.set');         
            Route::post('setting/addjs','SettingController@storeJS')->name('js.store');   
            Route::get('/admin/api','ApiController@setApiView')->name('api.setApiView');
             Route::put('/review/update/{id}','ReviewratingController@update')
            ->name('review.update');
            Route::get('terms', 'TermsController@show')->name('termscondition');
            Route::put('termscondition', 'TermsController@update');
            Route::get('policy', 'TermsController@showpolicy')->name('policy');
            Route::put('privacypolicy', 'TermsController@updatepolicy');
           
            Route::get('aboutpage', 'AboutController@show')->name('about.page');
            Route::put('aboutupdate', 'AboutController@update');
            Route::get('comingsoon', 'ComingSoonController@show')->name('comingsoon.page');
            Route::put('comingsoonupdate', 'ComingSoonController@update');
            Route::get('careers', 'CareersController@show')->name('careers.page');
            Route::put('careers/update', 'CareersController@update');
           
            Route::resource('carts', 'CartController');

            Route::get('currency', 'CurrencyController@show');
            Route::put('currency/update', 'CurrencyController@update');

            Route::get('widget', 'WidgetController@edit')->name('widget.setting');
            Route::put('widget/update', 'WidgetController@update');
            Route::post('admin/class/{id}/addsubtitle','SubtitleController@post')->name('add.subtitle');
            Route::post('admin/class/{id}/delete/subtitle','SubtitleController@delete')->name('del.subtitle');

            Route::get('frontslider', 'CategorySliderController@show')->name('category.slider');
            Route::put('frontslider/update', 'CategorySliderController@update');
            Route::get('all/instructor', 'InstructorRequestController@allinstructor')->name('all.instructor');
            Route::resource('user/course/report','CourseReportController');

            Route::get('banktransfer', 'BankTransferController@show')->name('bank.transfer');
            Route::put('banktransfer/update', 'BankTransferController@update');

            Route::get('admin/lang', 'LanguageController@showlang')->name('show.lang');

           

            Route::post('/admin/update/{lang}/frontTranslations/content','LanguageController@frontupdate')->name('static.trans.update');

            Route::get('admin/adminstatic/{local}', 'LanguageController@adminstaticword')->name('adminstatic.lang');           

            Route::post('/flashmsg/update/{lang}/flashmsgTranslations/content','LanguageController@flashupdate')->name('flashmsg.update');

            Route::get('admin/pwa', 'PwaSettingController@index')->name('show.pwa');

            Route::post('/admin/pwa/update/manifest','PwaSettingController@updatemanifest')->name('manifest.update');

            Route::post('/admin/pwa/update/sw','PwaSettingController@updatesw')->name('sw.update');

            Route::post('/admin/pwa/update/icons','PwaSettingController@updateicons')->name('icons.update');

            Route::post('/admin/manualcity','CityController@addcity')->name('city.manual');

            Route::post('/admin/manualstate','StateController@addstate')->name('state.manual');

            Route::resource('user/question/report','QuestionReportController');
            
           
            Route::post('sitemap', 'SiteMapController@sitemap');
            Route::get('show/sitemap', 'SiteMapController@index')->name('show.sitemap');
            Route::post('download/sitemap', 'SiteMapController@download')->name('download.sitemap');
            Route::get('whatsapp/settings', 'WhatsappButtonController@show')->name('whatsapp.button');
            Route::post('whatsapp/update', 'WhatsappButtonController@update')->name('whatsapp.update');

        });

        Route::middleware(['admin_instructor'])->group(function () {

                    if(\DB::connection()->getDatabaseName() && Schema::hasTable('settings')){
                if(env('IS_INSTALLED') == 1){
                    $zoom_enable = Setting::first()->zoom_enable;

                    $bbl_enable  = Setting::first()->bbl_enable;
                    
                    if(isset($zoom_enable) && $zoom_enable == 1){
                        
                        Route::prefix('zoom')->group(function (){
                            
                        });
                    }

                    if(isset($bbl_enable) && $bbl_enable == 1){
                        Route::prefix('bigblue')->group(function (){
                            
                        });
                    }
                }
            }

            Route::prefix('user')->group(function (){
              Route::get('edit/{id}','UserController@edit')->name('user.edit');
              Route::put('/edit/{id}','UserController@update')->name('user.update');
            });

            Route::resource('category','CategoriesController');
            Route::get('/category/{slug}','CategoriesController@show')->name('category.show'); 
            Route::resource('subcategory','SubcategoryController');
            Route::resource('childcategory','ChildcategoryController');
            Route::resource('course','CourseController');
            Route::resource('courseinclude','CourseincludeController');
            Route::resource('coursechapter','CoursechapterController');
            Route::resource('whatlearns','WhatlearnsController');
            Route::resource('relatedcourse','RelatedcourseController');
            Route::resource('questionanswer','QuestionanswerController');
            Route::resource('courseanswer', 'AnswerController');
            Route::resource('courseclass','CourseclassController');
            Route::resource('reviewrating','ReviewratingController');
            Route::resource('announsment','AnnounsmentController');
            Route::get('/course/create/{id}','CourseController@showCourse')->name('course.show');
            Route::post('/category/insert','CategoriesController@categoryStore')->name('cat.store');
            Route::post('/subcategory/insert','SubcategoryController@SubcategoryStore')->name('child.store');
            Route::put('/course/include/{id}','CourseController@testup')->name('corinc.update');
            Route::put('/course/whatlearns/{id}','CourseController@test')->name('what.update');
            Route::put('/course/coursechapter/{id}','CourseController@tes')->name('chapter.update');
            Route::get('send', 'CourseclassController@store')->name('notification');
            Route::resource('courselang','CourseLanguageController');
            Route::get("admin/dropdown","CourseController@upload_info");
            Route::get("admin/gcat","CourseController@gcato");


            Route::get('instructor', 'InstructorController@index')->name('instructor.index');
            Route::resource('userenroll', 'InstructorEnrollController');
            Route::resource('instructorquestion', 'InstructorQuestionController');
            Route::resource('instructoranswer', 'InstructorAnswerController');
            Route::get('coursereview', 'CourseReviewController@index');

            Route::resource('instructor/announcement', 'InstructorAnnouncementController');
            Route::resource('usermessage', 'ContactUsController');
            Route::resource('languages', 'LanguageController');

            Route::get('reposition/category', 'CategoriesController@reposition')->name('category_reposition');
            Route::post('reposition/class', 'CourseclassController@sort')->name('class-sort');
            Route::get('reposition/slider', 'SliderController@reposition')->name('slider_reposition');
            Route::get('getfeaturedstatus', 'FeatureCourseController@getPaymentStatus')->name('featured');  
            Route::get('view/order/admin/{id}', 'OrderController@vieworder')->name('view.order');
            Route::get('all/assignment', 'AssignmentController@view')->name('assignment.view');
            Route::get('view/assignment/{id}', 'AssignmentController@assignment')->name('list.assignment');
            
            
            Route::get('/admin/request/involve/','RequestInvolveController@index')->name('allrequestinvolve');
            Route::post('/admin/involve/create/{id}','InvolvementController@store')->name('involve.store');
            Route::get('/involve/request', 'InvolvementController@index')->name('involve.request.index');
            Route::post('/involve/request/edit/{id}', 'InvolvementController@update')->name('involve.request.edit');
            Route::delete('/involve/request/destroy/{id}', 'InvolvementController@destroy')->name('involve.request.destroy');
            Route::get('/involve/request/allcourse', 'InvolvementController@show')->name('involve.request.course');

            
        });
    });
      
    Route::middleware(['is_verified'])->group(function () {

        

        Route::post('rating/show/{id}','ReviewratingController@rating')->name('course.rating');
        Route::post('reports/insert/{id}','ReportReviewController@store')->name('report.review');
        Route::get('/course/{id}/{slug}','CourseController@CourseDetailPage')->name('user.course.show');
        Route::get('all/blog','BlogController@blogpage')->name('blog.all');
        Route::get('about/show','AboutController@aboutpage')->name('about.show');
        
        Route::get('show/careers','CareersController@careerpage')->name('careers.show');
        Route::get('detail/blog/{id}','BlogController@blogdetailpage')->name('blog.detail');
        Route::get('gotomycourse', 'CourseController@mycoursepage')->name('mycourse.show');

        Route::get('show/help', function(){
        
        return view('front.help.faq',compact('data', 'item')); 
        })->name('help.show');        

        Route::post('show/wishlist/{id}','WishlistController@wishlist');
        Route::post('remove/wishlist/{id}','WishlistController@removewishlist');

        Route::get('enroll/show/{id}', 'EnrollmentController@enroll')->name('show.enroll');

        Route::get('show/coursecontent/{id}', 'CourseController@CourseContentPage');

        Route::post('addquestion/{id}','QuestionanswerController@question');
        Route::post('addanswer/{id}','AnswerController@answer');

        Route::get('all/wishlist', 'WishlistController@wishlistpage')->name('wishlist.show');
        Route::post('delete/wishlist/{id}', 'WishlistController@deletewishlist');

        Route::post('addtocart', 'CartController@addtocart')->name('addtocart');
        Route::post('removefromcart/{id}','CartController@removefromcart')
          ->name('remove.item.cart');
        Route::get('all/cart', 'CartController@cartpage')->name('cart.show');
        Route::post('gotocheckout', 'CheckoutController@checkoutpage');
        
        Route::get('notifications/{id}', 'NotificationController@markAsRead')
        ->name('markAsRead');
        Route::get('delete/notifications', 'NotificationController@delete')
        ->name('deleteNotification');

        Route::get('/view', 'DownloadController@getDownload');
        Route::get('/download/{id}', 'DownloadController@getDownload')->name('downloadPdf')->middleware('auth');

        Route::post('review/helpful/{id}', 'ReviewHelpfulController@store')->name('helpful');
        Route::post('review/delete/{id}', 'ReviewHelpfulController@destroy')
        ->name('helpful.delete');

        Route::get('gotocategory/page/{id}', 'CategoriesController@categorypage')->name('category.page');
        Route::get('gotosubcategory/page/{id}', 'CategoriesController@subcategorypage')->name('subcategory.page');
        Route::get('gotochildcategory/page/{id}', 'CategoriesController@childcategorypage')->name('childcategory.page');

        Route::post('apply/instructor', 'InstructorRequestController@instructor')
        ->name('apply.instructor');

        Route::get('search', 'SearchController@index')->name('search');

        Route::get('/user/movie/time/{endtime}/{movie_id}/{user_id}','TimeHistoryController@movie_time');

        Route::get('all/purchase', 'OrderController@purchasehistory')->name('purchase.show');
        Route::get('invoice/show/{id}', 'OrderController@invoice')->name('invoice.show');
        
        Route::get('profile/show/{id}', 'UserProfileController@userprofilepage')->name('profile.show');
        Route::put('/edit/{id}','UserProfileController@userprofile')->name('user.profile');

        Route::post('course/reports/{id}','CourseReportController@store')->name('course.report');

        Route::get('watch/course/{id}', 'WatchController@watch')->name('watchcourse');
        Route::get('watch/courseclass/{id}', 'WatchController@watchclass')->name('watchcourseclass');
        Route::get('audio/courseclass/{id}', 'WatchController@audioclass')->name('audiocourseclass');

        Route::get('language-switch/{local}', 'LanguageSwitchController@languageSwitch')->name('languageSwitch');

        Route::get("country/dropdown","CountryController@upload_info");
        Route::get("country/gcity","CountryController@gcity");

       

        Route::get('detail/faq/{id}','HelpController@faqstudentpage')->name('faq.detail');
       

        Route::view('user_contact', 'front.contact');
        Route::post('contact/user', 'ContactUsController@usermessage')
        ->name('contact.user');

        Route::get('tabcontent/{id}','TabController@show');

        Route::post('paywithpaypal', 'PaypalController@payWithpaypal')->name('payWithpaypal');
        Route::get('getpaymentstatus', 'PaypalController@getPaymentStatus')->name('status');
               
        Route::get('watchcourse/in/frame/{url}/{course_id}', 'WatchController@view')->name('watchinframe');
       
        Route::get('invoice/download/{id}', 'OrderController@pdfdownload')->name('invoice.download');

        Route::get('watch/lightbox/{id}', 'WatchController@lightbox')->name('lightbox');

        Route::post('question/reports/{id}','QuestionReportController@store')->name('question.report');
        Route::get('answersheet/{id}', 'QuizTopicController@delete')->name('answersheet');
        Route::get('tryagain/{id}', 'QuizStartController@tryagain')->name('tryagain');
    
        Route::get('admin/instructor/settings', 'InstructorSettingController@view')->name('instructor.settings');
        Route::post('admin/instructor/update', 'InstructorSettingController@update')->name('instructor.update');
        Route::get('instructor/pay/details', 'InstructorSettingController@instructor')->name('instructor.pay');
        Route::post('instructor/payout/{id}', 'InstructorSettingController@settings')->name('instructor.payout');
        Route::get('pending/payout', 'PayoutController@pending')->name('pending.payout');
        Route::get('admin/instructor', 'AdminPayoutController@index')->name('admin.instructor');
        Route::get('admin/pending/{id}', 'AdminPayoutController@pending')->name('admin.pending');
        Route::get('admin/paid/{id}', 'AdminPayoutController@paid')->name('admin.paid');
        Route::post('admin/payout/bulk_payout/{id}', 'AdminPayoutController@bulk_payout');

        Route::post('admin/paypal/{id}', 'PaymentController@paypal')->name('admin.paypal');
        Route::post('admin/banktransfer/{id}', 'PaymentController@banktransfer')->name('admin.banktransfer');
        Route::post('admin/paytm/{id}', 'PaymentController@paytm')->name('admin.paytm');

        Route::get('admin/completed/payout', 'CompletedPayoutController@show')->name('admin.completed');
        Route::get('payout/completed/view/{id}', 'CompletedPayoutController@view')->name('completed.view');

        Route::get('admin/meeting/show', 'MeetingController@index')->name('meeting.show');
        Route::delete('destroy/meeting/{id}','MeetingController@destroy')->name('zoom.destroy');

        Route::post('course/checked/{id}', 'CourseProgressController@checked');

        Route::post('bundle/cart/{id}', 'BundleCourseController@addtocart')->name('bundlecart');
        Route::get('bundle/detail/{id}', 'BundleCourseController@detailpage')->name('bundle.detail');
        Route::get('bundle/enroll/{id}', 'BundleCourseController@enroll')->name('bundle.enroll');

        Route::get('bbl/detail/{id}', 'BigBlueController@detailpage')->name('bbl.detail');

        Route::get('join/meeting/{meetingid}','BigBlueController@joinview')->name('bbluserjoin');
        Route::post('api/join/meeting','BigBlueController@apiJoin')->name('bbl.api.join');

        Route::post('course/assignment/{id}', 'AssignmentController@submit')->name('assignment.submit');
        Route::post('assignment/delete/{id}', 'AssignmentController@delete');

        Route::post('course/appointment/{id}', 'AppointmentController@request')->name('appointment.request');
        Route::post('appointment/delete/{id}', 'AppointmentController@delete');

        Route::get('/activestatus', 'WatchCourseController@active');

        Route::get('active/courses', 'WatchCourseController@watchlist')->name('active.courses');
        Route::post('active/delete/{id}', 'WatchCourseController@delete')->name('active.delete');

    });

  });

});

