body {
	<?php if ( $general_background_image = get_theme_mod( 'ats_general_background_image' ) ) : ?>
	background-image: url('<?php echo $general_background_image; ?>');
	<?php endif; ?>
	<?php if ( $general_background_repeat = get_theme_mod( 'ats_general_background_repeat' ) ) : ?>
	background-repeat: <?php echo $general_background_repeat; ?>;
	<?php endif; ?>
	<?php if ( $general_background_position = get_theme_mod( 'ats_general_background_position' ) ) : ?>
	background-position: <?php echo $general_background_position; ?>;
	<?php endif; ?>
	<?php if ( $general_background_color = get_theme_mod( 'ats_general_background_color' ) ) : ?>
	background-color: <?php echo $general_background_color; ?>;
	<?php endif; ?>
	<?php if ( $general_background_attachment = get_theme_mod( 'ats_general_background_attachment' ) ) : ?>
	background-attachment: <?php echo $general_background_attachment; ?>;
	<?php endif; ?>
	<?php if ( $general_color = get_theme_mod( 'ats_general_color' ) ) : ?>
	color: <?php echo $general_color; ?>;
	<?php endif; ?>
}

<?php if ( $heading_color = get_theme_mod( 'ats_general_heading_color' ) ) : ?>
h1, h2, h3, h4, h5, h6 {
	color: <?php echo $heading_color; ?>;
}
<?php endif; ?>

<?php if ( $link_color = get_theme_mod( 'ats_general_link_color' ) ) : ?>
a {
	color: <?php echo $link_color; ?>;
}
<?php endif; ?>

<?php if ( $link_color_hover = get_theme_mod( 'ats_general_link_color_hover' ) ) : ?>
a:hover {
	color: <?php echo $link_color_hover; ?>;
}
<?php endif; ?>

.site-header {
	<?php if ( $header_background_image = get_theme_mod( 'ats_header_background_image' ) ) : ?>
	background-image: url('<?php echo $header_background_image; ?>');
	<?php endif; ?>
	<?php if ( $header_background_repeat = get_theme_mod( 'ats_header_background_repeat' ) ) : ?>
	background-repeat: <?php echo $header_background_repeat; ?>;
	<?php endif; ?>
	<?php if ( $header_background_position = get_theme_mod( 'ats_header_background_position' ) ) : ?>
	background-position: <?php echo $header_background_position; ?>;
	<?php endif; ?>
	<?php if ( $header_background_color = get_theme_mod( 'ats_header_general_background_color' ) ) : ?>
	background-color: <?php echo $header_background_color; ?>;
	<?php endif; ?>
}

.site-branding .site-branding-text .site-title,
.site-branding .site-branding-text .site-title a {
	<?php if ( $site_title_color = get_theme_mod( 'ats_header_site_title_color' ) ) : ?>
	color: <?php echo $site_title_color; ?>;
	<?php endif; ?>
}

.site-branding .site-branding-text .site-description {
	<?php if ( $site_description_color = get_theme_mod( 'ats_header_site_description_color' ) ) : ?>
		color: <?php echo $site_description_color; ?>;
	<?php endif; ?>
}

<?php if ( $menu_align = get_theme_mod( 'ats_menu_align' ) ) : ?>
.navigation-top .menu {
	text-align: <?php echo $menu_align; ?>
}
<?php endif; ?>

.navigation-top .menu > li > a {
	<?php if ( $menu_color = get_theme_mod( 'ats_menu_color' ) ) : ?>
	color: <?php echo $menu_color; ?>;
	<?php endif; ?>
	<?php if ( $menu_font_size = get_theme_mod( 'ats_menu_font_size' ) ) : ?>
	font-size: <?php echo $menu_font_size; ?>;
	<?php endif; ?>
	<?php if ( $menu_text_transform = get_theme_mod( 'ats_menu_text_transform' ) ) : ?>
	text-transform: <?php echo $menu_text_transform; ?>
	<?php endif; ?>
}

.navigation-top .menu > li > a:hover {
	<?php if ( $menu_color_hover = get_theme_mod( 'ats_menu_color_hover' ) ) : ?>
		color: <?php echo $menu_color_hover; ?>;
	<?php endif; ?>
}

.navigation-top {
	<?php if ( $menu_background_image = get_theme_mod( 'ats_menu_background_image' ) ) : ?>
		background-image: url('<?php echo $menu_background_image; ?>');
	<?php endif; ?>
	<?php if ( $menu_background_repeat = get_theme_mod( 'ats_menu_background_repeat' ) ) : ?>
		background-repeat: <?php echo $menu_background_repeat; ?>;
	<?php endif; ?>
	<?php if ( $menu_background_position = get_theme_mod( 'ats_menu_background_position' ) ) : ?>
		background-position: <?php echo $menu_background_position; ?>;
	<?php endif; ?>
	<?php if ( $menu_background_color = get_theme_mod( 'ats_menu_background_color' ) ) : ?>
		background-color: <?php echo $menu_background_color; ?>;
	<?php endif; ?>
}

<?php if ( get_theme_mod( 'ats_menu_border_top' ) || get_theme_mod( 'ats_menu_border_bottom' ) ) ?>
@media screen and (min-width: 48em) {
	.navigation-top {
		<?php if ( $menu_border_top = get_theme_mod( 'ats_menu_border_top' ) ) : ?>
		border-top: <?php echo $menu_border_top; ?>;
		<?php endif; ?>
		<?php if ( $menu_border_bottom = get_theme_mod( 'ats_menu_border_bottom' ) ) : ?>
		border-bottom: <?php echo $menu_border_bottom; ?>;
		<?php endif; ?>
	}
}