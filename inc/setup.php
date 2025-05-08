<?php

/*
    add_action: Executa uma função em um ponto específico do carregamento do WordPress.
    Sintaxe: add_action('nome_do_hook', 'nome_da_função');
    Aqui usamos o hook 'wp_enqueue_scripts' para carregar os scripts e estilos no front-end.
*/
add_action('wp_enqueue_scripts', 'university_files');
add_action('after_setup_theme', 'university_features');
add_action('pre_get_posts', 'university_adjust_queries');


function university_adjust_queries($query) {

    if(!is_admin() AND is_post_type_archive('program') AND is_main_query()) {
        $query->set('orderby', 'title');
        $query->set('order', 'ASC');
        $query->set('posts_per_page', -1); // Listar todos de uma vez, sem paginação
    }

    $today = date('Ymd');

    if(!is_admin() AND is_post_type_archive('event') AND $query->is_main_query()) {
        $query->set('meta_key', 'event_date');
        $query->set('orderby', 'meta_value_num');
        $query->set('order', 'ASC');
        $query->set('meta_query', [
            'key' => 'event_date',
            'compare' => '>=',
            'value' => $today,
            'type' => 'numeric'
        ]);
    }
}

/*
    Função que carrega os arquivos CSS e JavaScript no tema.
    - wp_enqueue_script(): Adiciona arquivos JS ao front-end.
    - wp_enqueue_style(): Adiciona arquivos CSS ao front-end.
    - get_theme_file_uri(): Retorna a URL de um arquivo localizado na pasta do tema.
*/
function university_files() {
    wp_enqueue_script('main_university_javascript', get_theme_file_uri('/build/index.js'), array('jquery'), '1.0', true);
    // Parâmetros: (identificador, caminho do arquivo, dependências, versão, carregar no footer? true/false)

    wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

    wp_enqueue_style('university_main_styles', get_theme_file_uri('/build/style-index.css'));
    wp_enqueue_style('university_extra_styles', get_theme_file_uri('/build/index.css'));
}


function university_features() {
    /*
        register_nav_menu(): Registrar um menu de navegação
        Arguments: 
            Nome para o menu específico
            Nome que aparecerá no painel de administração do wordpress

    */
    // register_nav_menu('headerMenuLocation', 'Header Menu Location');
    // register_nav_menu('footerExploreMenuLocation', 'Footer Explore Menu Location');
    // register_nav_menu('footerLearnMenuLocation', 'Footer Learn Menu Location');

    /*
        https://usablewp.com/learn-wordpress/home-page/how-to-add-theme-support-for-the-title-tag/
    */
    add_theme_support( 'title-tag' );

    // Habilitar thumbnails dos posts (ainda é necessário habilitar no post especifico)
    add_theme_support( 'post-thumbnails' );

    /*
        Nativamente, ao inserir uma nova thumbnail o wordpress gera 5 imagens redimensionadas da imagem para
        alocá-la em telas especificas.
        O Comando add_image_size() adiciona mais tamanhos para a imagem
    */
    add_image_size('professorLandscape', 400, 260, true);
    add_image_size('professorPortrait', 480, 650, true);
}