<?php
    /*
        Arquivo de template utilizado para exibir listagens de POSTS ARQUIVADOS como 
        - Categorias
        - Tags
        - Autor
        - Data
        - Posts Personalizados (IMPORTANTE)
        - Taxonomias personalizadas
    */

    get_header();
?>
    <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri("/images/ocean.jpg"); ?>)"></div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title">
                <?php 
                    the_archive_title(); // Captura o titulo do post arquvado 
                ?>
            </h1>
            <div class="page-banner__intro">
                <p>
                    <?php 
                        /*
                            Captura a descrição do post arquivado
                            A descrição será trazida a partir do campo descrição de cada POST ARQUIVO no painel 
                        */
                        the_archive_description();
                    ?>
                </p>
            </div>
        </div>
    </div>

    <div class="container container--narrow page-section">
      <?php 

        /*
            Renderiza o POST ARQUIVADO
        */
        while(have_posts()) {
          the_post(); ?>
            <div class=post-item>
              <h2 class="headline headline--medium headline--post--title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
              <div class="metabox">
                <p>Posted by <?php the_author(); ?> on <?php the_time('j/n/y'); ?> in <?php echo get_the_category_list(' '); ?> </p>
              </div>

              <div class="generic-content">
                <?php
                  the_excerpt();
                ?>

                <p><a class="btn btn--blue" href="<?php the_permalink(); ?>">Continue reading &raquo;</a></p>
              </div>
            </div>
          <?php }
        echo paginate_links(); // Método de paginação padrão do wordpress
      ?>
    </div>

<?php
  get_footer(); 
?>