<?php
/*
    Arquivo de modelo de exibição de páginas estáticas
    Arquivo destinado a estrutura padrão das demais páginas do site (exceto a index)
*/

/*
    Captura o arquivo header.php
    Nesse caso, em todas as páginas e subpáginas do site haverão o header padrão
*/
get_header();

/*
    Utiliza o while(have_posts()) para exibir o conteudo de páginas, posts ou outros tipos de conteudo.
    Isso é necessário para que o wordpress consiga acessar o banco de dados e renderizar o conteudo da página corretamente

    have_posts() é uma função do wordpress que retorna TRUE or FALSE dependendo de haver ou não conteudo para mostrar.

*/
while (have_posts()) {
    /*
        the_post(); refere-se a um post especifico do loop
    */
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

        <?php 
            /*
                A variável the_parent receberá o resultado da função que pegará o 
                ID da pagina pai recebendo o ID da página atual

                IMPORTANTE: destacar que caso a página PAI seja o index ele retornará 0
            */

            $the_parent = wp_get_post_parent_id(get_the_ID());

            /*
                Se a página pai da página atual for 0 ou seja, a index, o valor será false
                 e o metabox não será exibido.
            */
            if ($the_parent) { ?>
                <div class="metabox metabox--position-up metabox--with-home-link">
                    <p>
                        <a class="metabox__blog-home-link" href=" <?php echo get_permalink($the_parent); ?> "><i class="fa fa-home" aria-hidden="true"></i> 
                            Back to <?php echo get_the_title($the_parent); ?>
                        </a> <span class="metabox__main"> <?php the_title(); ?> </span>
                    </p>
                </div>       
            <?php }
        ?>

        <?php

            /*
                Verifica se a página atual possui filhos
                Caso possua algum filho terá informações no array associativo (True)
                Caso não possua filhos retornará o array vazio (False)
                
                A função get_pages(), recebe um array associativo e retorna páginas de acordo com parâmetros
                definidos no array.
            */
            $test_array = get_pages(array(
                'child_of' => get_the_ID() // Captura os filhos da página atual passando o ID da página atual
            ));

            /*
                Verifica se página possui filhos com variável $test_array
                Também verifica se a página possui pais com a variável $the_parents
                Se uma das duas condições forem atendidas o menu lateral de naveação será exibida para o usuário
                Caso contrário não será exibida

                IMPORTANTE ($the_parent): destacar que caso a página PAI seja o index ele retornará 0, ou seja,
                será False
            */
            if($the_parent or $test_array) { 
            ?>
                <div class="page-links">
                    <h2 class="page-links__title">
                        <a href=" 
                            <?php 
                                /*
                                    Nesse caso o cabeçalho do menu lateral 
                                */
                                echo get_the_permalink($the_parent); 
                            ?>">
                            <?php 
                                echo get_the_title($the_parent); 
                            ?>
                        </a>
                    </h2>
                    <ul class="min-list">
                        <?php 

                            if($the_parent) {
                                $findChildrenOf = $the_parent;
                            } else {
                                $findChildrenOf = get_the_ID();
                            }

                            wp_list_pages( array(
                                'title_li' => NULL,
                                'child_of' => $findChildrenOf,
                                'sort_column' => 'menu_order'
                            ));
                        ?>
                    </ul>
                </div>
            <?php } ?>

        <div class="generic-content">
            <?php 
                /*
                    Local onde será renderizado todo o conteúdo das páginas
                    Não está dentro de um parágrafo pois o conteudo será renderizado com a tag <p> em conjunto.
                    the_content(); refere-se ao conteudo daquele momento do loop em especifico.
                */
                the_content(); 
            ?>
        </div>
    </div>
<?php
} // Fechamento do while


/*
    Captura o footer da página, ou seja, o arquivo footer.php
    Em todas as páginas haverá o footer presente no arquivo footer.php
    O arquivo footer.php realizará o fechamento das tags HEAD e HTML.  
*/
get_footer();
?>