<?php get_header(); ?>
    
    <?php if (have_posts()) : while (have_posts()) : the_post();
        $viewID = get_the_ID();
        $resumo = get_post_meta($viewID, "Resumo");
     ?>
    <main role="main" class="internal" data-page="client">
        <aside>
            <h2><?php the_title(); ?></h2>

            <p><? echo $resumo[0]; ?></p>
        </aside>

        <section class="client">
            <div class="entries">
                <ul>
                    <?php query_posts( array( 'post_type' => 'clientes', 'posts_per_page' => '40', 'orderby' => 'menu_order', 'order' => 'ASC' ) );

                    if ( have_posts() ) : while ( have_posts() ) : the_post();
                        $programID = get_the_ID();
                    ?>
                    <li>
                        <!-- <figure>
                            <?php the_post_thumbnail(); ?>
                        </figure> -->
                        <p><?php the_title(); ?></p>
                    </li>
                    <?php endwhile; endif; wp_reset_query(); ?>
                </ul>
            </div>
        </section>

        <?php endwhile; else: ?>
        <?php endif; ?>
    </main>
    <?php get_footer(); ?>