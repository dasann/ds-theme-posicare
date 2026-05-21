<?php get_header(); ?>
<main class="section">
    <div class="container content-card">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article <?php post_class(); ?>>
                <h1><?php echo esc_html(get_the_title()); ?></h1>
                <div class="entry-content pp-delay-1"><?php the_content(); ?></div>
            </article>
        <?php endwhile; else : ?>
            <p>Keine Inhalte gefunden.</p>
        <?php endif; ?>
    </div>
</main>
<?php get_footer(); ?>
