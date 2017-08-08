<?php
/**
 * Displays footer widgets if assigned
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?>

<?php if ( ! get_theme_mod( 'ats_advanced_widgets' ) ) : ?>

    <?php
    if ( is_active_sidebar( 'sidebar-2' ) ||
         is_active_sidebar( 'sidebar-3' ) ) :
    ?>

        <aside class="widget-area" role="complementary">
            <?php
            if ( is_active_sidebar( 'sidebar-2' ) ) { ?>
                <div class="widget-column footer-widget-1">
                    <?php dynamic_sidebar( 'sidebar-2' ); ?>
                </div>
            <?php }
            if ( is_active_sidebar( 'sidebar-3' ) ) { ?>
                <div class="widget-column footer-widget-2">
                    <?php dynamic_sidebar( 'sidebar-3' ); ?>
                </div>
            <?php } ?>
        </aside><!-- .widget-area -->

    <?php endif; ?>
<?php else : ?>
    <?php
        $widget_sections = Kirki::get_option( 'ats', 'ats_footer_widgets' );
        $widget_section_count = count( $widget_sections );
    ?>

    <aside class="widget-area ats-widget-area-advanced" role="complementary">
        <?php
        if ( $widget_section_count >= 1 && is_active_sidebar( 'sidebar-2' ) ) { ?>
            <div class="widget-column footer-widget-1" style="width: <?php echo esc_attr( $widget_sections[0]['section_width'] ); ?>">
                <?php dynamic_sidebar( 'sidebar-2' ); ?>
            </div>
        <?php }

        if ( $widget_section_count >= 2 && is_active_sidebar( 'sidebar-3' ) ) { ?>
            <div class="widget-column footer-widget-2" style="width: <?php echo esc_attr( $widget_sections[1]['section_width'] ); ?>">
                <?php dynamic_sidebar( 'sidebar-3' ); ?>
            </div>
        <?php } ?>

        <?php for ( $i = 3; $i <= $widget_section_count; $i++ ) : ?>
            <?php if ( is_active_sidebar( 'ats-sidebar-' . $i ) ) : ?>
                <div class="widget-column footer-widget-<?php echo esc_attr( $i ); ?>" style="width: <?php echo esc_attr( $widget_sections[ $i - 1 ]['section_width'] ); ?>">
                    <?php dynamic_sidebar( 'ats-sidebar-' . $i ); ?>
                </div>
            <?php endif; ?>
        <?php endfor; ?>
    </aside><!-- .widget-area -->

<?php endif; ?>