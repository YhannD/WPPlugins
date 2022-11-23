

<div class="greatslider">

    <?php
    /**
     * Recréer le code HTML de la galerie à partir des ids
     *
     * La fonction wp_get_attachment_image() renvoie le code HTML
     * d'une image (table wp_posts)
     *  -> à partir de son id
     *  -> en précisant la taille (thumbnail par défaut)
     *
     * https://developer.wordpress.org/reference/functions/wp_get_attachment_image/
     *
     * La fonction wp_get_attachment_caption() renvoie la légende
     * (à saisir pour chaque image dans Medias pour chaque image)
     *
     * https://developer.wordpress.org/reference/functions/wp_get_attachment_caption/
     *
     */
    $ids_attachement=explode(",",$atts['ids']);

//    foreach ($ids_attachement as $id => $value){
//        var_dump($id);
//        var_dump($value);
//    }

    foreach ($ids_attachement as $id => $value):?>

<!--        <figure class="greatslider-figure active">-->
            <?php if($id==0):?>
                <figure class="greatslider-figure active">
                <?php echo(wp_get_attachment_image($value,'thumbnail',false,'class="greatslider-picture"'));?>
            <?php else:?>
                <figure class="greatslider-figure ">
                <?php echo(wp_get_attachment_image($value,'thumbnail',false,'class="greatslider-picture"'));?>
            <?php endif;?>

        </figure>
        <figcaption>
            <?php echo wp_get_attachment_caption( $value ) ; ?>
        </figcaption>
    <?php endforeach;?>

    <nav class="greatslider-navigation">
<!--        <a href="#" rel="prev" class="prev" aria-label="Image précédente">-->
            <i class="bi bi-arrow-left-circle" aria-hidden="true"></i>
<!--        </a>-->

<!--        <a href="#" rel="next" class="next" aria-label="Image suivante">-->
            <i class="bi bi-arrow-right-circle" aria-label="true"></i>
<!--        </a>-->
    </nav>
</div>
