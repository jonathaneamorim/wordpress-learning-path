<?php
    /*
        Arquivo de modelo de exibição de posts
        Arquivo destinado a estrutura padrão dos posts UNICOS do site
    */

    get_header();
    
    while(have_posts()) {
        the_post(); ?>
        <div class="page-banner">
            <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri("/images/ocean.jpg"); ?>)"></div>
            <div class="page-banner__content container container--narrow">
                <h1 class="page-banner__title"><?php the_title(); ?></h1>
                <div class="page-banner__intro">
                    <p>DONT FORGET TO REPLACE ME LATER</p>
                </div>
            </div>
        </div>

        <div class="container container--narrow page-section">
            
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p>
                <a class="metabox__blog-home-link" href=" <?php echo site_url('/blog'); ?> "><i class="fa fa-home" aria-hidden="true"></i> 
                    Blog Home
                </a> <span class="metabox__main"> Posted by <?php the_author(); ?> on <?php the_time('j/n/y'); ?> in <?php echo get_the_category_list(' '); ?></span>
            </p>
        </div>  

            <div class="generic-content">
                <?php the_content(); ?>
            </div>
        </div>

        <?php 
    }

    /*
        the_author(): Presente neste arquivo insere em todos os Posts do tipo POST o nome do autor da postagem
            returns:
                string 'post_author';
    */
    // the_author();


    /*
        the_date(): Presente neste arquivo insere em todos os Posts do tipo POST a data da postagem
            returns:
                date 'post_date';
    */
    // the_date();
    
    /*
        the_shortlinl(): Presente neste arquivo insere em todos os Posts do tipo POST o link completo da postagem
            returns:
                string 'post_url';
    */
    // the_shortlink();

    get_footer();
?>