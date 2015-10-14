<?php get_header(); ?>
    
    <?php if (have_posts()) : while (have_posts()) : the_post();
        $viewID = get_the_ID();
        $resumo = get_post_meta($viewID, "Resumo");
     ?>
    <main role="main" class="internal" data-page="buildings">
        <aside>
            <h2><?php the_title(); ?></h2>

            <p><? echo __($resumo[0]); ?></p>
        </aside>

        <section class="buildings">
            <div class="entries">
                <h3>Brasília</h3>
                <ul>
                    <?php query_posts( array( 'post_type' => 'imoveis', 'posts_per_page' => '20', 'category__and' => array(5), 'orderby' => 'menu_order', 'order' => 'DESC' ) );

                    if ( have_posts() ) : while ( have_posts() ) : the_post();
                        $customID = get_the_ID();
                        $resumo2 = get_post_meta($customID, "Resumo");
                    ?>
                    <li>
                        <!-- <figure>
                            <?php the_post_thumbnail(); ?>

                            <figcaption>
                                <p><?php the_title(); ?></p>
                                <span><? echo __($resumo2[0]); ?></span>
                            </figcaption>
                        </figure> -->
                        <!-- <p><?php the_title(); ?></p> -->
                        <span><? echo __($resumo2[0]); ?></span>

                        <div class="oder_figures">
                            <?php the_content(); ?>
                        </div>
                    </li>
                    <?php endwhile; endif; wp_reset_query(); ?>
                </ul>
                <h3>São Paulo</h3>
                <ul>
                    <?php query_posts( array( 'post_type' => 'imoveis', 'posts_per_page' => '20', 'category__and' => array(3), 'orderby' => 'menu_order', 'order' => 'ASC' ) );

                    if ( have_posts() ) : while ( have_posts() ) : the_post();
                        $customID = get_the_ID();
                        $resumo2 = get_post_meta($customID, "Resumo");
                    ?>
                    <li>
                        <!-- <figure>
                            <?php the_post_thumbnail(); ?>

                            <figcaption>
                                <p><?php the_title(); ?></p>
                                <span><? echo __($resumo2[0]); ?></span>
                            </figcaption>
                        </figure> -->
                        <!-- <p><?php the_title(); ?></p> -->
                        <span><? echo __($resumo2[0]); ?></span>

                        <!-- <a href="#" class="button bt-lightbox"><?php echo __("<!--:pt-->Veja mais fotos<!--:--><!--:en-->See more photos<!--:--><!--:es-->Ver más fotos<!--:-->") ?></a> -->

                        <div class="oder_figures">
                            <?php the_content(); ?>
                        </div>
                    </li>
                    <?php endwhile; endif; wp_reset_query(); ?>
                </ul>
                <h3>Cuiabá - MT</h3>
                <ul>
                    <?php query_posts( array( 'post_type' => 'imoveis', 'posts_per_page' => '20', 'category__and' => array(6), 'orderby' => 'menu_order', 'order' => 'ASC' ) );

                    if ( have_posts() ) : while ( have_posts() ) : the_post();
                        $customID = get_the_ID();
                        $resumo2 = get_post_meta($customID, "Resumo");
                    ?>
                    <li>
                        <!-- <figure>
                            <?php the_post_thumbnail(); ?>

                            <figcaption>
                                <p><?php the_title(); ?></p>
                                <span><? echo __($resumo2[0]); ?></span>
                            </figcaption>
                        </figure> -->
                        <!-- <p><?php the_title(); ?></p> -->
                        <span><? echo __($resumo2[0]); ?></span>

                        <div class="oder_figures">
                            <?php the_content(); ?>
                        </div>
                    </li>
                    <?php endwhile; endif; wp_reset_query(); ?>
                </ul>

                <h3>Rondonópolis - MT</h3>
                <ul>
                    <?php query_posts( array( 'post_type' => 'imoveis', 'posts_per_page' => '20', 'category__and' => array(7), 'orderby' => 'menu_order', 'order' => 'ASC' ) );

                    if ( have_posts() ) : while ( have_posts() ) : the_post();
                        $customID = get_the_ID();
                        $resumo2 = get_post_meta($customID, "Resumo");
                    ?>
                    <li>
                        <!-- <figure>
                            <?php the_post_thumbnail(); ?>

                            <figcaption>
                                <p><?php the_title(); ?></p>
                                <span><? echo __($resumo2[0]); ?></span>
                            </figcaption>
                        </figure> -->
                        <!-- <p><?php the_title(); ?></p> -->
                        <span><? echo __($resumo2[0]); ?></span>

                        <div class="oder_figures">
                            <?php the_content(); ?>
                        </div>
                    </li>
                    <?php endwhile; endif; wp_reset_query(); ?>
                </ul>
                
            </div>
        </section>

        <?php endwhile; else: ?>
        <?php endif; ?>
    </main>
    <?php get_footer(); ?>