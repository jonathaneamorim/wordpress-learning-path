<?php
    /*
        Arquivo que será utilizado para renderizar a listagem do POST ARQUIVADO (events) ou post_type event.
    */
    
  get_header();
?>
    <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri("/images/ocean.jpg"); ?>)"></div>
        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title">
                All Events
            </h1>
            <div class="page-banner__intro">
                <p>
                    Se what is going on in our world.
                </p>
            </div>
        </div>
    </div>

    <div class="container container--narrow page-section">
      <?php 

        while(have_posts()) {
            the_post(); ?>
                <div class="event-summary">
                <a class="event-summary__date t-center" href=" <?php the_permalink(); ?> ">
                        <span class="event-summary__month">
                        <?php 
                            $eventDate = new DateTime(get_field('event_date'));
                            echo $eventDate->format('M');
                        ?></span>
                        <span class="event-summary__day">
                        <?php 
                            echo $eventDate->format('d');
                        ?></span>
                    </a>
                    <div class="event-summary__content">
                        <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                    <p>
                        <?php 
                        /*
                            wp_trim_words(): É um método nativo do wordpress que formata um texto de acordo com parâmetros passados
                            No exemplo a baixo o conteudo (get_the_content) é alterado para ter apenas 18 letras.
                        */
                        echo wp_trim_words(get_the_content(), 18);
                        ?>
                        <a href="<?php echo the_permalink(); ?>" class="nu gray">Read more</a></p>
                    </div>
                </div>
          <?php }
          
        /*
            método que insere uma paginação automática na listagem de posts
        */  
        echo paginate_links();
      ?>

      <hr class="section-break" />

      <p>Looking for a recap of past events? <a href="<?php echo site_url('/past-events'); ?>">Check out our past events archive</a>.</p>

    </div>

<?php
  get_footer();
?>