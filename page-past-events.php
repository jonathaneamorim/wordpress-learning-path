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
                Past Events
            </h1>
            <div class="page-banner__intro">
                <p>
                    A recap of our past events.
                </p>
            </div>
        </div>
    </div>

    <div class="container container--narrow page-section">
      <?php 

        $today = date('Ymd');

        $queryArray = array(
            /*
                O valor -1 indica que o WordPress trará todos os posts que obedecem à condição de post_type, 
                sem limitar a quantidade de resultados.
            */
            'post_type' => 'event',     // Define que a consulta trará posts do tipo 'event'
            /*
                Paged: Esse parâmetro é utilizado para indicar em qual página de uma consulta você está.
                A função "get_query_var('paged', 1)" associada busca o valor da variável de consulta chamada 'paged' que 
                normalmente é passada na URL (ex: ?paged=2), se ela não estiver definida, o segundo parâmtro será usado
                como valor padrão (situação útil para quando ainda não houve paginações)  
            */
            'paged' => get_query_var('paged', 1),

            /*
            Define o metadado 'event_date' como base para ordenação e/ou filtro dos resultados
            */
            'meta_key' => 'event_date',
            
            /*
            Define o critério de ordenação da consulta.
            Exemplos: 'title', 'rand'. Padrão: 'post_date'.
            Neste caso, os resultados serão ordenados com base no valor numérico do metadado 'event_date'.
            */
            'orderby' => 'meta_value_num',
            /*
            Define a direção da ordenação: 
                'ASC' para crescente, 'DESC' para decrescente
            */
            'order' => 'ASC',
            'meta_query' => [
            [
                'key' => 'event_date',
                'compare' => '<',
                'value' => $today,
                'type' => 'numeric'
            ],
            ]    
        );

        $pastEvents = new WP_Query($queryArray);

        while($pastEvents->have_posts()) {
            $pastEvents->the_post(); ?>
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
        echo paginate_links([
            'total' => $pastEvents->max_num_pages
        ]);

        wp_reset_postdata();
        
      ?>
    </div>

<?php
  get_footer();
?>