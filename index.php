<?php
  /*
    Arquivo Mais genêrico e o ultimo na hierarquia de arquivos. Ele é um "fallback", ou seja, 
    é usando quando nenhum outro template mais especifico está disponivel.
    Por exemplo: Se você acessa uma página de autor (/author/joao) e não existe author.php, nem archive.php,
    o WordPress cai de volta para o index.php.
  */

  get_header(); // Captura o header do site
?>
    <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri("/images/ocean.jpg"); ?>)"></div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title">Welcome to our blog!</h1>
            <div class="page-banner__intro">
                <p>Keep up with our latest news</p>
            </div>
        </div>
    </div>

    <div class="container container--narrow page-section">
      <?php 
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
        echo paginate_links();
      ?>
    </div>

<?php
  get_footer(); // Captura o rodapé do site
?>