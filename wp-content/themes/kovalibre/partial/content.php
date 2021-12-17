<?php
/**
 * @package Kovalibre
 * @since Kovalibre 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
     <header class="entry-header">
          <h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', '_s' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
 
          <?php if ( 'post' == get_post_type() ) : // Only display post date and author if this is a Post, not a Page. ?>
          <div class="entry-meta">
               <?php kovalibre_posted_on(); ?>
          </div><!-- .entry-meta -->
          <?php endif; ?>
     </header><!-- .entry-header -->
 
     <?php if ( is_search() ) : // Only display Excerpts on Search results pages ?>
     <div class="entry-summary">
          <?php the_excerpt(); ?>
     </div><!-- .entry-summary -->
     <?php else : ?>
     <div class="entry-content">
          <?php the_content( __( 'Continue reading <span class="meta-nav">→</span>', 'kovalibre' ) ); ?>
          <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'kovalibre' ), 'after' => '</div>' ) ); ?>
     </div><!-- .entry-content -->
     <?php endif; ?>
 
<?php /* Show the post's tags, categories, and a comment link. */ ?>
     <footer class="entry-meta">
          <?php if ( 'post' == get_post_type() ) : // Hide category and tag text for Pages in Search results ?>
          <?php
               /* translators: used between list items, there is a space after the comma */
               $categories_list = get_the_category_list( __( ', ', 'kovalibre' ) );
               if ( $categories_list && kovalibre_categorized_blog() ) :
          ?>
          <span class="cat-links">
               <?php printf( __( 'Posted in %1$s', 'kovalibre' ), $categories_list ); ?>
          </span>
          <?php endif; // End if categories ?>
 
          <?php
               /* translators: used between list items, there is a space after the comma */
               $tags_list = get_the_tag_list( '', __( ', ', 'kovalibre' ) );
               if ( $tags_list ) :
          ?>
               <span class="sep"> | </span>
               <span class="tag-links">
                    <?php printf( __( 'Tagged %1$s', 'kovalibre' ), $tags_list ); ?>
               </span>
               <?php endif; // End if $tags_list ?>
          <?php endif; // End if 'post' == get_post_type() ?>
 
          <?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
          <span class="sep"> | </span>
          <span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'kovalibre' ), __( '1 Comment', 'kovalibre' ), __( '% Comments', 'kovalibre' ) ); ?></span>
          <?php endif; ?>
 
          <?php edit_post_link( __( 'Edit', 'kovalibre' ), '<span class="sep"> |   </span><span class="edit-link">', '</span>' ); ?>
     </footer><!-- .entry-meta -->
<?php /* Close up the article and end the loop. */ ?>
</article><!-- #post-<?php the_ID(); ?> -->