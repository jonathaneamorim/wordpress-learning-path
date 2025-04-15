<?php
/*
    Função para inserir a estilização na página.
    wp_enqueue_style: Insere os arquivos CSS, bootstrap e fontes personalizadas na página
    wp_enqueue_script: Insere os arquivos javascript
*/
function university_files() {
    wp_enqueue_script('main_university_javascript', get_theme_file_uri('/build/index.js'), array('jquery'), '1.0', true);
    // Argumentos ('nome para o wordpress', 'onde está o arquivo', 'tem alguma dependecia? caso nao inserir NULL', 'rodar dentro do body ou dentro do head - true or false')
    
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
}
/*
    add_action: Indica que o sistema vai rodar certas funções em determinados tempos de execução do código
    estrutura > add_action('<hook ou momento de execução>', '<função que será executada>').
    after_setup_theme: Chamado durante cada carregamento da página depois que o tema é inicializado.
*/

add_action('after_setup_theme', 'university_features');
add_action('wp_enqueue_scripts', 'university_files');