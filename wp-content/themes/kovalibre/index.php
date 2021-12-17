<?php get_header(); ?> 

<div id="primary" class="content-area">
    <div id="content" class="site-content" role="main">
        <?php kovalibre_content_nav( 'nav-above' ); ?>
        <h2>Realisation</h2>
        <?php 
        query_posts(array('post_type' => 'post', 'posts_per_page' => '5', 'cat' => 6)); ?>
        <?php while(have_posts()){ the_post();?>
            <?php //if (in_category(6)) : 
                 get_template_part('partial/content', get_post_format());
            //endif;
            ?>
        <?php };?>
        <?php wp_reset_query();?>        
        <?php wp_reset_postdata();?>

        <h2> Compétences</h2>
        <?php query_posts(array('post_type' => 'post', 'posts_per_page' => '5', 'cat' => 7)); ?>
        <?php while(have_posts()){ the_post();?>
            <?php //if (in_category(6)) :
                the_title();
                 //get_template_part('partial/content', get_post_format());
            //endif;
            ?>
        <?php };?>
        <?php wp_reset_postdata();?>
                
        <?php //kovalibre_content_nav( 'nav-below' ); ?>
        
        <?php //Methode plus rapide pour afficher la nav d'un article the_post_navigation(); ?>
        <?php //Methode plus rapide pour afficher la nav des articles  the_posts_pagination(); ?>
    </div><!-- #content .site-content -->
</div><!-- #primary .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>