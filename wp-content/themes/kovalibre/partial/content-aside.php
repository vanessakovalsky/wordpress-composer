<article id="post-<?php the_ID(); ?>" <?php post_class();?>>
                <header>
                    <h1><a href="<?php the_permalink();?>"><?php the_title();?></a></h1>
                </header>
                <div class="author">
                    <?php kovalibre_get_post_metadata();?>
                </div>
                <div class="excerpt">
                    <?php the_excerpt();?>
                </div>
                <div class="entry-content">
                    <?php the_content(); ?>
                </div>
                <div class="categories">
                    <?php
                    the_category(); 
                    $cat = get_the_category_list();
                    printf(__('Categories %1$s','kovalibre'), $cat);?>
                </div>
                <div class="tags">
                    <?php 
                    $tags = get_the_tag_list('',__(', ','kovalibre'));
                    printf(__('Tags %1$s','kovalibre'), $tags);
                    ?>
                </div>
            </article>