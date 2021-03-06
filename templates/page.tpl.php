<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
?>

<section id="site-wrapper">

    <?php if ( $main_menu ) : ?>

        <nav id="nav-bar-container">

            <?php if ( $site_name ) : ?>

                <div class="no-display">
                    <section id="site-title-container">

                        <div class="site-title">
                            <a class="no-style" href="<?php print $front_page; ?>"><?php print $site_name; ?></a>
                        </div>

                        <?php if ( $site_slogan ) : ?>

                            <div class="site-slogan">
                                <span><?php print $site_slogan; ?></span>
                            </div>

                        <?php endif; ?>

                    </section> <!-- #site-title-container -->
                </div> <!-- .no-display -->

            <?php endif; ?>

            <div class="vertical-center">
                <?php
                /**
                 * Print out the menu using drupal's theme function. The site title
                 * is placed in the middle of these links with javascript.
                 */
                print theme( 'links__system_main_menu' , array(
                    'links'      => $main_menu,
                    'attributes' => array(
                        'id'    => 'nav-bar-links',
                        'class' => array(),
                    ),
                ) );
                ?>
            </div> <!-- .vertical-center -->

            <section id="nav-toggle">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </section> <!-- .mobile-nav-button -->


            <section id="expanded-navigation">

                <section id="expanded-navigation-toggle">
                    <div class="line"></div>
                    <div class="line"></div>
                </section>

                <?php if ( isset( $search_box ) ) : ?>

                    <section id="navigation-search-toggle">

                        <i class="icon fa fa-search"></i>

                    </section><!-- #navigation-search-toggle -->

                    <section id="navigation-search">

                        <?php print $search_box; ?>

                    </section> <!-- .navigation-search -->

                <?php endif; ?>

                <?php /* Content added using javascript. */ ?>
                <section class="link-category"></section>

            </section> <!-- #expanded-navigation -->

        </nav> <!-- #nav-bar-container -->

    <?php endif; ?>

    <section id="page">

        <section id="page-nav-spaceholder"></section>

        <?php if ( isset( $page['header'] ) ) : ?>
            <section id="header">

                <?php print render( $page['header'] ); ?>

            </section> <!-- #header -->

        <?php endif; ?>

        <?php if ( isset( $page['content'] ) ) : ?>

            <section id="content">

                <?php if ( isset( $messages) ) : ?>

                    <section id="drupal-messages">

                        <?php print $messages; ?>

                    </section>

                <?php endif; ?>

                <?php print render( $page['content'] ); ?>

            </section> <!-- #content -->

        <?php endif; ?>

        <?php if ( isset( $page['below_content'] ) ) : ?>

            <section id="below-content">

                <?php print render( $page['below_content'] ); ?>

            </section> <!-- #below-content -->

        <?php endif; ?>

        <footer id="primary-footer">

            <?php print render( $page['footer'] ); ?>

        </footer> <!-- #footer -->

    </section> <!-- #page -->

</section> <!-- #site-wrapper  -->
