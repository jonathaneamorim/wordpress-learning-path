<?php 
  /*
    Arquivo destinado a renderização padrão da homepage do site

    Captura o header da página presente no arquivo header.php
    Nele estará presente a configuração do head da página e o inicio do body assim como o header
    Detalhe: Sem o fechamento das tags, pois serão fechadas no footer
  */
  get_header(); 
?>

<div class="page-banner">
      <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/library-hero.jpg'); ?>)"></div>
      <div class="page-banner__content container t-center c-white">
        <h1 class="headline headline--large">Welcome!</h1>
        <h2 class="headline headline--medium">We think you&rsquo;ll like it here.</h2>
        <h3 class="headline headline--small">Why don&rsquo;t you check out the <strong>major</strong> you&rsquo;re interested in?</h3>
        <a href="#" class="btn btn--large btn--blue">Find Your Major</a>
      </div>
    </div>

    <div class="full-width-split group">
      <div class="full-width-split__one">
        <div class="full-width-split__inner">
          <h2 class="headline headline--small-plus t-center">Upcoming Events</h2>

          <?php
            /*
              - A variável "$queryArrayEvent" é responsável por armazenar o array de configuração do WP_Query
              - A variável $homepageEvents armazena o objeto de Query do wordpress, tal qual recebe o valor de 
              $queryArrayEvent que estabelece os parâmetros de consulta
            */
            $queryArrayEvent = array(
              'posts_per_page' => 2, // Esse item do array indica que a consulta será realizada e serão trazidos apenas os ultimos 2 posts realizados
              'post_type' => 'event' // Define que o tipo de post trazido na consulta será o post do tipo event
            );

            /*
              - WP_query é uma classe do wordpress que é utilizada para realizar QUERYs em banco de dados do wordpress
              - Por padrão, todos arquivos (single, index, archive, etc) possuem uma classe WP_query padrão a qual caputura algumas informações sobre
              post_type do arquivo e posts_per_page (que por padrão é 10). 
              - A classe WP_Query possui métodos que são utilizados para renderizar posts e manipular loops, como have_posts, the_post, the_title etc
              - Essa classe pode ser alterada instanciando a mesma e passando o array de informações ($queryArrayEvent), isso fará com que a WP_Query
              padrão seja alterada para a que for criada. Por boas práticas é sempre interessante resetar a classe padrão com o método wp_reset_postdata();
            */
            $homepageEvents = new WP_Query($queryArrayEvent);

            /*
              O loop em questão utiliza o objeto $homepageEvents que possui um método chamado have_posts()
              Nesse caso esse método verifica se existe posts no post_type do objeto em questão.
              Todas as informações desse novo post_type renderizado utilizarão o objeto $homepageEvents após o $homepageEvents->the_post();
            */
            while($homepageEvents->have_posts()) {
              $homepageEvents->the_post(); ?>
            <div class="event-summary">
              <a class="event-summary__date t-center" href="<?php the_permalink(); ?>">
                <span class="event-summary__month"><?php the_time('M'); ?></span>
                <span class="event-summary__day"><?php the_time('d'); ?></span>
              </a>
              <div class="event-summary__content">
                <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                <p>
                  <?php 
                    /*
                      A diferença de utilizar o get_the_excerpt e o the_excerpt basicamente se dá a fato de o the_except trazer consigo o parágrafo <p>
                      já o get_the_excerpt tráz apenas o texto. O mesmo se aplica para os demais métodos
                    */
                    if(has_excerpt()) {
                      echo get_the_excerpt();
                    } else {
                      echo wp_trim_words(get_the_content(), 18);
                    }
                  ?>
                  <a href="<?php the_permalink(); ?>" class="nu gray">Learn more</a>
                </p>
              </div>
            </div>
            <?php
            }
            /*
              Depois de executar um loop em uma consulta separada, esta função restaura o $post global para o post atual na consulta principal.
            */
            wp_reset_postdata();
          ?>

          <p class="t-center no-margin">
            <a href="<?php echo get_post_type_archive_link('event') ?>" class="btn btn--blue">View All Events</a>
          </p>
        </div>
      </div>
      <div class="full-width-split__two">
        <div class="full-width-split__inner">
          <h2 class="headline headline--small-plus t-center">From Our Blogs</h2>

          <?php
          
            $queryArray = array(
              'posts_per_page' => 2
              // 'category_name' => 'awards'
            );
            
            /*
              - WP_query é uma classe do wordpress que é utilizada para realizar QUERYs em banco de dados do wordpress
              - Por padrão, todos arquivos (single, index, archive, etc) possuem uma classe WP_query padrão a qual caputura algumas informações sobre
              post_type do arquivo e posts_per_page (que por padrão é 10). 
              - A classe WP_Query possui métodos que são utilizados para renderizar posts e manipular loops, como have_posts, the_post, the_title etc
              - Essa classe pode ser alterada instanciando a mesma e passando o array de informações ($queryArrayEvent), isso fará com que a WP_Query
              padrão seja alterada para a que for criada. Por boas práticas é sempre interessante resetar a classe padrão com o método wp_reset_postdata();
            */
            $homepageposts = new WP_Query($queryArray);

            while($homepageposts->have_posts()) {
              $homepageposts->the_post(); ?>
                <div class="event-summary">
                  <a class="event-summary__date event-summary__date--beige t-center" href="<?php the_permalink(); ?>">
                    <span class="event-summary__month"><?php the_time('M') ?></span>
                    <span class="event-summary__day"><?php the_time('d') ?></span>
                  </a>
                  <div class="event-summary__content">
                    <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                    <p>
                      <?php 
                        /*
                          A diferença de utilizar o get_the_excerpt e o the_excerpt basicamente se dá a fato de o the_except trazer consigo o parágrafo <p>
                          já o get_the_excerpt tráz apenas o texto. O mesmo se aplica para os demais métodos
                        */
                        if(has_excerpt()) {
                          echo get_the_excerpt();
                        } else {
                          echo wp_trim_words(get_the_content(), 18);
                        }
                      ?>
                      <a href="<?php echo the_permalink(); ?>" class="nu gray">Read more</a></p>
                  </div>
                </div>
              <?php
            }
            /*
              Boa prática sempre resetar
            */
            wp_reset_postdata();
          ?>

          <p class="t-center no-margin"><a href="<?php echo site_url('/blog') ?>" class="btn btn--yellow">View All Blog Posts</a></p>
        </div>
      </div>
    </div>

    <div class="hero-slider">
      <div data-glide-el="track" class="glide__track">
        <div class="glide__slides">
          <div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('/images/bus.jpg') ?>)">
            <div class="hero-slider__interior container">
              <div class="hero-slider__overlay">
                <h2 class="headline headline--medium t-center">Free Transportation</h2>
                <p class="t-center">All students have free unlimited bus fare.</p>
                <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
              </div>
            </div>
          </div>
          <div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('/images/apples.jpg') ?>)">
            <div class="hero-slider__interior container">
              <div class="hero-slider__overlay">
                <h2 class="headline headline--medium t-center">An Apple a Day</h2>
                <p class="t-center">Our dentistry program recommends eating apples.</p>
                <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
              </div>
            </div>
          </div>
          <div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('/images/bread.jpg') ?>)">
            <div class="hero-slider__interior container">
              <div class="hero-slider__overlay">
                <h2 class="headline headline--medium t-center">Free Food</h2>
                <p class="t-center">Fictional University offers lunch plans for those in need.</p>
                <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
              </div>
            </div>
          </div>
        </div>
        <div class="slider__bullets glide__bullets" data-glide-el="controls[nav]"></div>
      </div>
    </div>


<?php 
  /*
    Captura o footer.php para a página
  */
  get_footer(); 
?>