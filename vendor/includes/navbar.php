	<div class="kt-header__topbar-item kt-header__topbar-item--user">
								<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">

									<!--use "kt-rounded" class for rounded avatar style-->
									<div class="kt-header__topbar-user kt-rounded-">
										<span class="kt-header__topbar-welcome kt-hidden-mobile">Hi,</span>
										<span class="kt-header__topbar-username kt-hidden-mobile"><?php echo $_SESSION['NCE_TT_vendor'] ;?></span>
										<img alt="Pic" src="assets/media/logos/logo-1.png" class="kt-rounded-" />

										<!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
										<span class="kt-badge kt-badge--username kt-badge--lg kt-badge--brand kt-hidden kt-badge--bold">S</span>
									</div>
								</div>
								<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-sm">
									<div class="kt-user-card kt-margin-b-40 kt-margin-b-30-tablet-and-mobile" style="background-image: url(assets/media/logos/logo-1.png)">
										 
									</div>
									<ul class="kt-nav kt-margin-b-10">
									
									 
									 
										
								 
										<li class="kt-nav__custom kt-space-between">
											<a href="logout.php" class="btn btn-label-brand btn-upper btn-sm btn-bold">Sign Out</a>
										 
										</li>
									</ul>
								</div>
							</div>
