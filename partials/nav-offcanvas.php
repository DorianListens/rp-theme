<div class="large-12 columns">
	<div class="" style="margin-top:20px;">

		<!-- If you want to use the more traditional "fixed" navigation.
		 simply replace "sticky" with "fixed" -->

		<nav class="top-bar" data-topbar>
			<ul class="title-area">
				<!-- Title Area -->
				<li class="name">
					<!-- <i class="fa fa-globe fa-lg"></i>  -->
					<span class="main-head">
						<a href="<?php echo home_url(); ?>" rel="nofollow">
							<img id="headerlogo" src="<?php echo get_stylesheet_directory_uri(); ?>/library/images/rp-logo-white-shadow.png" />
							<?php bloginfo('name'); ?>
						</a>
					</span>
				</li>
				<li class="toggle-topbar menu-icon">
					<a href="#"><span>Menu</span></a>
				</li>
			</ul>
			<section class="top-bar-section">
				<?php joints_main_nav(); ?>
			</section>
		</nav>
	</div>
</div>

<!-- <div class="large-12 columns show-for-small-only">
	<div class="contain-to-grid">
		<nav class="tab-bar">
			<section class="middle tab-bar-section">
				<h1 class="title"><?php bloginfo('name'); ?></h1>
			</section>
			<section class="left-small">
				<a class="left-off-canvas-toggle menu-icon" ><span></span></a>
			</section>
		</nav>
	</div>
</div>

<aside class="left-off-canvas-menu show-for-small-only">
	<ul class="off-canvas-list">
		<li><label>Navigation</label></li>
			<?php joints_main_nav(); ?>
	</ul>
</aside>

<a class="exit-off-canvas"></a> -->
