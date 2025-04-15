<!DOCTYPE html>
<html 
    <?php 
        language_attributes(); // define a linguagem da página web que foi configurada no painel do wordpress
    ?>
> 
    <head>
        <meta charset="
            <?php
                bloginfo('charset'); // adiciona informações da página web como por exemplo o charset da página
            ?>
        ">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php
            /*
                Com a função wp_head() é assumido que o wordpress cuidará de toda configuração presente
                no head da página como, links de estilos, fontes, javascript, title e etc.
            */ 
            wp_head(); 
        ?> 
    </head>
    <body 
        <?php 
            /*
                Função do wordpress que adiciona classes especificas com informações da página atual, mundando de acordo com a página atual
                Pode ser utilizada para realizar estilizações personalizadas no CSS
            */
            body_class(); 
        ?> 
    >
        <header class="site-header">
        <div class="container">
            <h1 class="school-logo-text float-left">
                <a href=" 
                    <?php 
                        echo site_url(); // Imprimindo o link da raiz da página, ou seja, voltando ao index 
                    ?>">
                    <strong>Fictional</strong> University
                </a>
            </h1>
            <span class="js-search-trigger site-header__search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
            <i class="site-header__menu-trigger fa fa-bars" aria-hidden="true"></i>
            <div class="site-header__menu group">
            <nav class="main-navigation">

                <?php 
                    /*
                        wp_nav_menu(): Aloca um menu que foi criado no painel e registrado no functions, após adicionado poder ser manipulado através do painel,
                        como, ter sua ordem e links alterados.
                        Arguments: 
                            (array de configurações)
                                'theme_location' => '<nome do menu definido no arquivo Functions>'
                    */
                    // wp_nav_menu(array(
                    //     'theme_location' => 'headerMenuLocation'
                    // ));
                ?>

                <ul>
                    <li 
                        <?php 
                            /*
                                is_page(): Verifica se a página atual é igual a página passada como argumento
                                    returns:
                                        bool TRUE || FALSE

                                get_the_id(): Captura o id da página atual
                                    returns: 
                                        int id;
                                wp_get_post_parent_id(): Captura o id da página PAI (precisa receber o id de uma página para procurar o ID)
                                    returns: 
                                        int id || 0 (caso a página pai seja a index)


                                Nesse caso se a página for a about-us ou a página pai seja a about-us, é inserido a classe current-menu-item que estiliza o item
                            */
                            if(is_page('about-us') or wp_get_post_parent_id(0) == 14) 
                                echo 'class=current-menu-item'; 
                        ?>>
                        <a href=" 
                            <?php 
                                echo site_url('/about-us'); // Imprimindo o link raiz da página + o parâmetro 'about-us' ?> 
                                ">About Us</a>
                    </li>

                    <li><a href="#">Programs</a></li>
                    <li
                        <?php
                            if(get_post_type() == 'event') echo 'class="current-menu-item"';
                        ?>
                    ><a href="<?php echo get_post_type_archive_link('event'); ?>">Events</a></li>
                    <li><a href="#">Campuses</a></li>
                    <li 
                        <?php 
                            /*
                                get_post_type(): Captura o tipo de post da página atual, dependendo do resultado retorna uma string com o nome do post
                                Nesse caso, se a página for um post, retornará post.
                            */
                            if(get_post_type() == 'post') 
                                echo 'class="current-menu-item"'; 
                            ?>>
                        <a href="<?php echo site_url('/blog'); ?>">Blog</a>
                    </li>
                </ul>
            </nav>
            <div class="site-header__util">
                <a href="#" class="btn btn--small btn--orange float-left push-right">Login</a>
                <a href="#" class="btn btn--small btn--dark-orange float-left">Sign Up</a>
                <span class="search-trigger js-search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
            </div>
            </div>
        </div>
        </header>

<?php
    // As tags Body e HTML não serão fechadas nesse arquivo e sim no footer.php
?>