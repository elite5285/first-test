<form enctype="multipart/form-data" method="POST" action="<?php echo e(route('setting.store')); ?>">
	<?php echo csrf_field(); ?>

	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="exampleInputDetails"><?php echo e(__('adminstaticword.TextLogo')); ?>:</label>
			    <li class="tg-list-item">
			        <input class="tgl tgl-skewed" id="opp" type="checkbox" name="project_logo" <?php echo e($gsetting->logo_type == 'L' ? 'checked' : ''); ?>>
			        <label class="tgl-btn" data-tg-off="Text" data-tg-on="Logo" for="opp"></label>
			    </li>
			    <input type="hidden" name="free" value="0" for="opp" id="oppp">
		    </div>
		</div>
	</div>
	<br>

	<div class="row">
		<div class="col-md-6">
			<div class="row">

				<?php if($errors->has('logo')): ?>
				<div class="display-none" id="logo">
                    <strong class="text-danger"><?php echo e($errors->first('logo')); ?></strong>
                </div>
                <?php endif; ?>
				<div class="col-md-6">
					<div class="form-group">
						<label for="exampleInputDetails"><?php echo e(__('adminstaticword.Logo')); ?></label>- <p class="inline info">Size: 300x90</p>
						<br>	
						<input type="file" name="logo" value="<?php echo e($setting->logo); ?>" id="logo" class="<?php echo e($errors->has('logo') ? ' is-invalid' : ''); ?> inputfile inputfile-1"/>
				<label for="logo"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="30" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span><?php echo e(__('adminstaticword.ChooseaLogo')); ?></span></label>
				<span class="text-danger invalid-feedback" role="alert"></span>
					</div>
				 	  
				</div>
				<div class="col-md-4">
					<div class="well">
						<?php if($setting->logo !=""): ?>
							<div class="logo-settings">
								<img src="<?php echo e(asset('images/logo/'.$setting->logo)); ?>" alt="<?php echo e($setting->logo); ?>" class="img-responsive">
							</div>
						<?php else: ?>
							<div class="alert alert-danger">
								<?php echo e(__('adminstaticword.Nologofound')); ?>

							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<br>
		</div>
		<div class="col-md-6">
			<div class="row">

				<?php if($errors->has('footer_logo')): ?>
				<div class="display-none" id="footer_logo">
                    <strong class="text-danger"><?php echo e($errors->first('footer_logo')); ?></strong>
                </div>
                <?php endif; ?>
				<div class="col-md-6">
					<div class="form-group">
						<label for="exampleInputDetails"><?php echo e(__('adminstaticword.footerlogo')); ?></label>- <p class="inline info">Size: 300x90</p>
						<br>	
						<input type="file" name="footer_logo" value="<?php echo e($setting->footer_logo); ?>" id="footer_logo" class="<?php echo e($errors->has('footer_logo') ? ' is-invalid' : ''); ?> inputfile inputfile-1"/>
						<label for="footer_logo"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="30" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span><?php echo e(__('adminstaticword.ChooseaLogo')); ?></span></label>
						<span class="text-danger invalid-feedback" role="alert"></span>
					</div>
				 	  
				</div>
				<div class="col-md-4">
					<div class="well">
						<?php if($setting->footer_logo !=""): ?>
							<div class="logo-settings">
								<img src="<?php echo e(asset('images/logo/'.$setting->footer_logo)); ?>" alt="<?php echo e($setting->footer_logo); ?>" class="img-responsive">
							</div>
						<?php else: ?>
							<div class="alert alert-danger">
								<?php echo e(__('adminstaticword.Nologofound')); ?>

							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<br>
		</div>
	</div>


	<div class="row">
		<div class="col-md-6">
			<div class="row">
				
				<?php if($errors->has('favicon')): ?>
                    <strong class="text-danger"><?php echo e($errors->first('favicon')); ?></strong>
                <?php endif; ?>
				<div class="col-md-6">
					<label for="exampleInputDetails"><?php echo e(__('adminstaticword.Favicon')); ?></label>- <p class="inline info">Size: 35x35</p>
					<br>	
					<input type="file" name="favicon" id="favi" class="<?php echo e($errors->has('favicon') ? ' is-invalid' : ''); ?> inputfile inputfile-1"/>

					<label for="favi"><svg xmlns="http://www.w3.org/2000/svg" width="100" height="30" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span><?php echo e(__('adminstaticword.Chooseafavicon')); ?></span></label>
				</div>
				<div class="col-md-4">
					<div class="well">
						<?php if($setting->favicon !=""): ?>
							<div class="favicon-settings">
								<img src="<?php echo e(asset('images/favicon/'.$setting->favicon)); ?>" alt="<?php echo e($setting->favicon); ?>" class="img-responsive">
							</div>
						<?php else: ?>
							<div class="alert alert-danger">
								<?php echo e(__('adminstaticword.NoFaviconfound')); ?>

							</div>
						<?php endif; ?>
					</div>

				</div>
			</div>
			<br>
		</div>
		<div class="col-md-6">
			<div class="row">

				<?php if($errors->has('preloader_logo')): ?>
				<div class="display-none" id="preloader_logo">
                    <strong class="text-danger"><?php echo e($errors->first('preloader_logo')); ?></strong>
                </div>
                <?php endif; ?>
				<div class="col-md-6">
					<div class="form-group">
						<label for="exampleInputDetails"><?php echo e(__('adminstaticword.Preloaderlogo')); ?></label>- <p class="inline info">Size: 300x90</p>
						<br>	
						<input type="file" name="preloader_logo" value="<?php echo e($setting->preloader_logo); ?>" id="preloader_logo" class="<?php echo e($errors->has('preloader_logo') ? ' is-invalid' : ''); ?> inputfile inputfile-1"/>
						<label for="preloader_logo"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="30" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span><?php echo e(__('adminstaticword.ChooseaLogo')); ?></span></label>
						<span class="text-danger invalid-feedback" role="alert"></span>
					</div>
				 	  
				</div>
				<div class="col-md-4">
					<div class="well">
						<?php if($setting->preloader_logo !=""): ?>
							<div class="favicon-settings">
								<img src="<?php echo e(asset('images/logo/'.$setting->preloader_logo)); ?>" alt="<?php echo e($setting->preloader_logo); ?>" class="img-responsive">
							</div>
						<?php else: ?>
							<div class="alert alert-danger">
								<?php echo e(__('adminstaticword.Nologofound')); ?>

							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
			<br>
		</div>
	</div>

	

	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="project_title"><?php echo e(__('adminstaticword.ProjectTitle')); ?>:<sup class="redstar">*</sup></label>
			  	<input value="<?php echo e($setting->project_title); ?>" placeholder="Enter project title" name="project_title" type="text" class="<?php echo e($errors->has('project_title') ? ' is-invalid' : ''); ?> form-control">
			  	<?php if($errors->has('project_title')): ?>
	                <span class="text-danger invalid-feedback" role="alert">
	                    <strong><?php echo e($errors->first('project_title')); ?></strong>
	                </span>
	            <?php endif; ?>
	        </div>
		</div>
		<div class="col-md-6">
			<label for="APP_URL"><?php echo e(__('adminstaticword.APPURL')); ?>:<sup class="redstar">*</sup></label>
		  	<input placeholder="http://localhost/" name="APP_URL" type="text" class="<?php echo e($errors->has('APP_URL') ? ' is-invalid' : ''); ?> form-control" value="<?php echo e($env_files['APP_URL']); ?>" >
		  	<?php if($errors->has('APP_URL')): ?>
                <span class="text-danger invalid-feedback" role="alert">
                    <strong><?php echo e($errors->first('APP_URL')); ?></strong>
                </span>
            <?php endif; ?>
            <br>
		</div>
		
	</div>

	<div class="row">
		
		<div class="col-md-6">
			<label for="phone"><?php echo e(__('adminstaticword.Contact')); ?>:<sup class="redstar">*</sup></label>
            <input value="<?php echo e($setting->default_phone); ?>" name="default_phone" placeholder="Enter contact no." type="text" class="<?php echo e($errors->has('default_phone') ? ' is-invalid' : ''); ?> form-control" required>
		</div>
		<div class="col-md-6">
			<label for="wel_email"><?php echo e(__('adminstaticword.Email')); ?>:<sup class="redstar">*</sup></label>
            <input value="<?php echo e($setting->wel_email); ?>" name="wel_email" placeholder="Enter your email" type="text" class="<?php echo e($errors->has('wel_email') ? ' is-invalid' : ''); ?> form-control" required>
		</div>
	</div>
	<br>

	<div class="row">
		<div class="col-md-6">
            <label for="cpy_txt"><?php echo e(__('adminstaticword.CopyrightText')); ?>:<sup class="redstar">*</sup></label>
            <input value="<?php echo e($setting->cpy_txt); ?>" name="cpy_txt" placeholder="Enter Copyright Text" type="text" required class="<?php echo e($errors->has('cpy_txt') ? ' is-invalid' : ''); ?> form-control">
		</div>
		<div class="col-md-6">
			<label for="feature_amount">Amount to feature a course:</label>
			<small>(Instructor can feature its course, by paying this amount)</small>
            <input min="1" class="form-control" name="feature_amount" type="number" value="<?php echo e($setting->feature_amount); ?>" id="duration"  placeholder="Enter amount to feature course ex: 100" class="<?php echo e($errors->has('feature_amount') ? ' is-invalid' : ''); ?> form-control">
		</div>
		
	</div>
	<br>

	<div class="row">
		<div class="col-md-12">
			<label for="exampleInputDetails"><?php echo e(__('adminstaticword.Address')); ?>:<sup class="redstar">*</sup></label>
            <textarea name="default_address" rows="2" class="form-control" placeholder="Enter your address" required><?php echo e($setting->default_address); ?></textarea>
		</div>
		
		
	</div>
	<br>

	<h4 class="box-title"><?php echo e(__('adminstaticword.MapCoordinates')); ?></h4>

	<div class="row">
		<div class="col-md-6">
            <label for="map_lat"><?php echo e(__('adminstaticword.MapEnable')); ?>:</label>
            <li class="tg-list-item">              
	            <input class="tgl tgl-skewed" id="map_enable" type="checkbox" name="map_enable" <?php echo e($gsetting->map_enable == 'map' ? 'checked' : ''); ?> >
	            <label class="tgl-btn" data-tg-off="Image" data-tg-on="Map" for="map_enable"></label>
	        </li>
	        <div>
	            <small>(Enable Map on contact page)</small>
			</div>
		</div>
		<div class="col-md-6">
			<div class="row" style="<?php echo e($setting['map_enable'] == 'image' ? '' : 'display:none'); ?>" id="sec_one">
				<div class="col-md-6">
					<label for="contact_image"><?php echo e(__('adminstaticword.ContactPageImage')); ?>:</label>
					<br>
		            <input type="file" name="contact_image" value="<?php echo e($setting->contact_image); ?>" id="contact" class="<?php echo e($errors->has('contact_image') ? ' is-invalid' : ''); ?> inputfile inputfile-1">

		            <label for="contact"><svg xmlns="http://www.w3.org/2000/svg" width="100" height="30" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span><?php echo e(__('adminstaticword.Chooseaimage')); ?></span></label>
				</div>
				<div class="col-md-6">
					<?php if($setting->contact_image !=""): ?>
						<div class="contact-settings">
							<img src="<?php echo e(asset('images/contact/'.$setting->contact_image)); ?>" alt="<?php echo e($setting->contact_image); ?>" class="img-responsive">
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<br>

	<div class="row" style="<?php echo e($setting['map_enable'] == 'map' ? '' : 'display:none'); ?>" id="sec1_one">
		<div class="col-md-4">
            <label for="map_lat"><?php echo e(__('adminstaticword.MapLatitude')); ?>:</label>
            <input value="<?php echo e($setting->map_lat); ?>" name="map_lat" placeholder="Enter Latitude" type="text" class="<?php echo e($errors->has('map_lat') ? ' is-invalid' : ''); ?> form-control">
		</div>
		<div class="col-md-4">
			<label for="map_long"><?php echo e(__('adminstaticword.MapLongitude')); ?>:</label>
            <input value="<?php echo e($setting->map_long); ?>" name="map_long" placeholder="Enter Longitude" type="text" class="<?php echo e($errors->has('map_long') ? ' is-invalid' : ''); ?> form-control">
		</div>
		<div class="col-md-4">
			<label for="map_api"><?php echo e(__('adminstaticword.MapApiKey')); ?>:</label>
            <input value="<?php echo e($setting->map_api); ?>" name="map_api" placeholder="Enter Map Api" type="text" class="<?php echo e($errors->has('map_api') ? ' is-invalid' : ''); ?> form-control">
		</div>
	</div>
	
	<hr>

	<h4 class="box-title"><?php echo e(__('adminstaticword.PromoBar')); ?></h4>

	<div class="row">
		<div class="col-md-6">
            <label for="promo_enable"><?php echo e(__('adminstaticword.PromoEnable')); ?>: </label> (Enable Promobar on site)
            <li class="tg-list-item">              
	            <input class="tgl tgl-skewed" id="promo_enable" type="checkbox" name="promo_enable" <?php echo e($gsetting->promo_enable == 1 ? 'checked' : ''); ?> >
	            <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="promo_enable"></label>
	        </li>
	        <div>
	            <small></small>
			</div>
		</div>
	</div>
	<br>
	<div class="row" style="<?php echo e($setting['promo_enable'] == 1 ? '' : 'display:none'); ?>" id="sec2_one">
		<div class="col-md-6">
            <label for="promo_text"><?php echo e(__('adminstaticword.PromoText')); ?>:</label>
            <input value="<?php echo e($setting->promo_text); ?>" name="promo_text" placeholder="Enter Promo Text" type="text" class="<?php echo e($errors->has('promo_text') ? ' is-invalid' : ''); ?> form-control">
		</div>
		<div class="col-md-6">
			<label for="promo_link"><?php echo e(__('adminstaticword.PromoLink')); ?>:</label>
            <input value="<?php echo e($setting->promo_link); ?>" name="promo_link" placeholder="Enter Promo Text Link" type="text" class="<?php echo e($errors->has('promo_link') ? ' is-invalid' : ''); ?> form-control">
		</div>
	</div>
	<hr>



	<h4 class="box-title"><?php echo e(__('adminstaticword.FacebookChatBubble')); ?></h4>

	<div class="row">
		<div class="col-md-12">
			 
            <label for="promo_text"><?php echo e(__('adminstaticword.FacebookChatBubble')); ?>:</label>
            <input value="<?php echo e($setting->chat_bubble); ?>" name="chat_bubble" placeholder="Enter Your Chat Bubble Link" type="text" class="<?php echo e($errors->has('chat_bubble') ? ' is-invalid' : ''); ?> form-control">

            <small>Facebook Bubble Chat will not work on localhost (eg. xampp & wampp)</small>
			<br>
			<small><a target="__blank" href="https://app.respond.io/">Get URL For Facebook Messenger Chat Bubble</a></small>
		</div>
		
	</div>

	<hr>
	

	<div class="row">
		<div class="col-md-6">
			<br>
			<div class="row">
				<div  class="col-md-6">
					<label for=""><?php echo e(__('adminstaticword.RightClick')); ?>: </label>
					<br>
					<li class="tg-list-item">              
			            <input class="tgl tgl-skewed" id="cb3" type="checkbox" name="rightclick" <?php echo e($gsetting->rightclick == '0' ? 'checked' : ''); ?> >
			            <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="cb3"></label>
		            </li>
		            <input type="hidden"  name="free" value="0" for="cb3" id="cb3"> 
				</div>
				<div  class="col-md-6">
					<label for=""><?php echo e(__('adminstaticword.InspectElement')); ?>: </label>
					<br>
		    		<li class="tg-list-item">              
			            <input class="tgl tgl-skewed" id="cb4" type="checkbox" name="inspect" <?php echo e($setting->inspect == '0' ? 'checked' : ''); ?> >
			            <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="cb4"></label>
		            </li>
		            <input type="hidden" id="inspect" name="free" value="0" for="cb4" id="cb4">
				</div>
				
			</div>
		</div>
		<div class="col-md-3">
			<br>
        	<label for=""><?php echo e(__('adminstaticword.PreloaderEnable')); ?>: </label>
			<li class="tg-list-item">              
	            <input class="tgl tgl-skewed" id="preloader" type="checkbox" name="preloader_enable" <?php echo e($gsetting->preloader_enable == '1' ? 'checked' : ''); ?> >
	            <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="preloader"></label>
            </li>
            <input type="hidden"  name="free" value="0" for="preloader" id="preloader">
        </div>
        <div  class="col-md-3">
        	<br>
            <label><?php echo e(__('adminstaticword.APPDebug')); ?>:</label>
            <br>
            <li class="tg-list-item">              
	            <input class="tgl tgl-skewed" id="debug" type="checkbox" name="APP_DEBUG" <?php echo e(env('APP_DEBUG') == true ? "checked" : ""); ?> >
	            <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="debug"></label>
            </li>
            <input type="hidden"  name="free" value="0" for="debug" id="debug">
		</div>
	</div>
	

	<hr>

	<div class="row">
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-6">
					<div >
						<label for=""><?php echo e(__('adminstaticword.WelcomeEmail')); ?>: </label>

						<li class="tg-list-item">              
				            <input class="tgl tgl-skewed" id="welmail" type="checkbox" name="w_email_enable" <?php echo e($gsetting->w_email_enable == '1' ? 'checked' : ''); ?> >
				            <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="welmail"></label>
			            </li>
			            <input type="hidden"  name="free" value="0" for="welmail" id="welmail">
			          
					</div>
				</div>
				<div class="col-md-6">
					<div >
						<label for=""><?php echo e(__('adminstaticword.VerifyEmail')); ?>: </label>

						<li class="tg-list-item">              
				            <input class="tgl tgl-skewed" id="verify" type="checkbox" name="verify_enable" <?php echo e($gsetting->verify_enable == '1' ? 'checked' : ''); ?> >
				            <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="verify"></label>
			            </li>
			            <input type="hidden" name="free" value="0" for="verify" id="verify">
			          
					</div>
				</div>
			</div>

			<div>
	            <small>(If you enable it, a welcome email will be sent to user's register email id,<br> make sure you updated your mail setting in Site Setting >> Mail Settings before enable it.)</small>
      			<small class="text-danger"><?php echo e($errors->first('color')); ?></small> 
			</div>
			
		</div>
		<div class="row">
			<div class="col-md-3">
	        	<label for=""><?php echo e(__('adminstaticword.BecomeAnInstructor')); ?>: </label>
				<li class="tg-list-item">              
		            <input class="tgl tgl-skewed" id="instructor" type="checkbox" name="instructor_enable" <?php echo e($gsetting->instructor_enable == '1' ? 'checked' : ''); ?> >
		            <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="instructor"></label>
	            </li>
	            <input type="hidden"  name="free" value="0" for="instructor" id="instructor">
	            <div>
		            <small>(Enable Become an instructor option for users)</small>
	      			<small class="text-danger"><?php echo e($errors->first('color')); ?></small> 
				</div>
	        </div>
	        <div class="col-md-3">
	        	<label for=""><?php echo e(__('adminstaticword.CategoryMenu')); ?>: </label>
				<li class="tg-list-item">              
		            <input class="tgl tgl-skewed" id="category" type="checkbox" name="cat_enable" <?php echo e($gsetting->cat_enable == '1' ? 'checked' : ''); ?> >
		            <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="category"></label>
	            </li>
	            <input type="hidden"  name="free" value="0" for="category" id="category">
	            <div>
		            <small>(If you enable it, Category menu will show on instructor Dashboard)</small>
	      			<small class="text-danger"><?php echo e($errors->first('color')); ?></small> 
				</div>
	        </div>

	    </div>
		
	</div>
	<hr>

    <div class="row">
    	<div class="col-md-3">
	    	<label for=""><?php echo e(__('Enable Zoom On Portal')); ?>: </label>
			<li class="tg-list-item">              
	            <input class="tgl tgl-skewed" id="zoom_enable" type="checkbox" name="zoom_enable" <?php echo e($gsetting->zoom_enable == 1 ? 'checked' : ''); ?> >
	            <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="zoom_enable"></label>
	        </li>
	        <div>
	            <small>(Enable Live zoom meetings on portal)</small>
			</div>
    	</div>


    	<div class="col-md-3">
	    	<label for=""><?php echo e(__('Enable Big Blue Meetings')); ?>: </label>
			<li class="tg-list-item">              
	            <input class="tgl tgl-skewed" id="bbl_enable" type="checkbox" name="bbl_enable" <?php echo e($gsetting->bbl_enable == 1 ? 'checked' : ''); ?> >
	            <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="bbl_enable"></label>
	        </li>
	        <div>
	            <small>(Enable Big Blue meetings on portal)</small>
			</div>
    	</div>

    	<div class="col-md-3">
	    	<label for=""><?php echo e(__('Mobile no. on SignUp')); ?>: </label>
			<li class="tg-list-item">              
	            <input class="tgl tgl-skewed" id="mobile_enable" type="checkbox" name="mobile_enable" <?php echo e($gsetting->mobile_enable == 1 ? 'checked' : ''); ?> >
	            <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="mobile_enable"></label>
	        </li>
	        <div>
	            <small>(Enable mobile no. on SignUp)</small>
			</div>
    	</div>

    	<div class="col-md-3">
	    	<label for=""><?php echo e(__('adminstaticword.CertificateEnable')); ?>: </label>
			<li class="tg-list-item">              
	            <input class="tgl tgl-skewed" id="certificate_enable" type="checkbox" name="certificate_enable" <?php echo e($gsetting->certificate_enable == 1 ? 'checked' : ''); ?> >
	            <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="certificate_enable"></label>
	        </li>
	        <div>
	            <small>(Enable Certificate on courses)</small>
			</div>
    	</div>

    </div>
    <hr>

    <div class="row">

    	<div class="col-md-3">
	    	<label for=""><?php echo e(__('adminstaticword.DeviceControl')); ?>: </label>
			<li class="tg-list-item">              
	            <input class="tgl tgl-skewed" id="device_enable" type="checkbox" name="device_enable" <?php echo e($gsetting->device_control == 1 ? 'checked' : ''); ?> >
	            <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="device_enable"></label>
	        </li>
	        <div>
	            <small>(Enable Device Control on Courses)</small>
			</div>
    	</div>

    	<div class="col-md-3">
	    	<label for=""><?php echo e(__('adminstaticword.IPBlock')); ?>: </label>
			<li class="tg-list-item">              
	            <input class="tgl tgl-skewed" id="ipblock_enable" type="checkbox" name="ipblock_enable" <?php echo e($gsetting->ipblock_enable == 1 ? 'checked' : ''); ?> >
	            <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="ipblock_enable"></label>
	        </li>
	        <div>
	            <small>(Enable Ip block on portal)</small>
			</div>
    	</div>

    	<div class="col-md-3">
	    	<label for=""><?php echo e(__('adminstaticword.Assignment')); ?>: </label>
			<li class="tg-list-item">              
	            <input class="tgl tgl-skewed" id="assignment_enable" type="checkbox" name="assignment_enable" <?php echo e($gsetting->assignment_enable == 1 ? 'checked' : ''); ?> >
	            <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="assignment_enable"></label>
	        </li>
	        <div>
	            <small>(Enable Assignment on Course)</small>
			</div>
    	</div>

    	<div class="col-md-3">
	    	<label for=""><?php echo e(__('adminstaticword.Appointment')); ?>: </label>
			<li class="tg-list-item">              
	            <input class="tgl tgl-skewed" id="appointment_enable" type="checkbox" name="appointment_enable" <?php echo e($gsetting->appointment_enable == 1 ? 'checked' : ''); ?> >
	            <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="appointment_enable"></label>
	        </li>
	        <div>
	            <small>(Enable Appointment on Course)</small>
			</div>
    	</div>

    </div>

    <hr>

    <div class="row">

    	<div class="col-md-3">
	    	<label for=""><?php echo e(__('adminstaticword.HideIdentity')); ?>: </label>
			<li class="tg-list-item">              
	            <input class="tgl tgl-skewed" id="hide_identity" type="checkbox" name="hide_identity" <?php echo e($gsetting->hide_identity == 1 ? 'checked' : ''); ?> >
	            <label class="tgl-btn" data-tg-off="Disable" data-tg-on="Enable" for="hide_identity"></label>
	        </li>
	        <div>
	            <small>(Hide User Indentity from Instructor)</small>
			</div>
    	</div>
    </div>

    
	<br>
	<br>
	
	<div class="box-footer">
		<button type="Submit" class="btn btn-lg col-md-3 btn-primary btn-md"><i class="fa fa-save"></i> <?php echo e(__('adminstaticword.Save')); ?></button>
	</div>

</form>
<?php /**PATH /Users/cherif/Desktop/PFELearning/resources/views/admin/setting/genral.blade.php ENDPATH**/ ?>