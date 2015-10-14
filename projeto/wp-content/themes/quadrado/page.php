<?php get_header(); ?>
    
    <?php if (have_posts()) : while (have_posts()) : the_post();
        $viewID = get_the_ID();
        $resumo = get_post_meta($viewID, "Resumo");
     ?>
    <main role="main" class="internal" data-page="<?php echo the_slug(); ?>">
        <aside>
            <h2><?php the_title(); ?></h2>

            <p><?php echo __($resumo[0]); ?></p>
        </aside>

        <section class="<?php echo the_slug(); ?>">
            <div class="entries">
                <?php the_content(); ?>
            </div>
        </section>

        <?php endwhile; else: ?>
        <?php endif; ?>
    </main>
    <?php get_footer(); ?>