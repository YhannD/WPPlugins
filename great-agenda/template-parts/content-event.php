<article
    <?php post_class(); ?>
    itemscope itemptype="https://schema.org/Event"
>
    <?php if (is_singular()): ?>
        <h1><?php the_title(); ?></h1>

    <?php else : ?>
        <h2><?php the_title();?></h2>

    <?php endif;?>

    <div class="entry-metas">
        <time itemprop="startDate" datetime="<?= get_date_format('date_start');?>"><?= get_date_format('date_start','d F Y');?></time>
    </div>

    <?php the_post_thumbnail('medium',['itemprop' => 'image']) ?>

    <div itemprop="description">
        <?php the_content();?>
    </div>

</article>
