<?php get_header(); ?>
    <?php if (have_posts()) : while (have_posts()) : the_post();
        $viewID = get_the_ID();
        $resumo = get_post_meta($viewID, "Resumo");
     ?>

    <main role="main" class="contact">
        <section class="block__post">
            <div class="center">
                <div class="row">
                    <div class="col-m-12">
                        <div class="block__post--title">
                            <h1><?php the_title(); ?></h1>

                            <div class="block__post--time"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white">
                <div class="center">
                    <div class="block__post--content <?php echo the_slug(); ?>">
                        <div class="block__post--entries">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <?php endwhile; else: ?>
    <?php endif; ?>
<?php get_footer(); ?>