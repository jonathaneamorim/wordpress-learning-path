# Wordpress

## O que é o wordpress?

- É um sistema de gerenciamento de conteúdo (CMS - Content Management System) que permite criar e administrar sites, blogs, lojas virtuais, e muito mais. É gratuito e de código aberto, por esse motivo, é a plataforma mais utilizada no mundo.
- Exmplos de CMSs:
  - Wordpress - (O mais popular do mundo)
  - Wix
  - Shopfy
  - Joomla
  - Drupal
- O Wordpress é baseado em PHP, MySQL e MariaDB, executando em um servidor interpretador.
- Aplicações: Blogs, sites empresariais, e-commerces, fóruns, redes sociais e etc.
- Existem o wordpress.com e o wordpress.or
  - O Wordpress.com é o sistema de criação e hospedagem próprio do wordpress, mais simples e limitado, porém não há necessidade de aprendizagem em programação.
  - Wordpress.org é o software gratuito e de código aberto, tendo liberdade total e acesso a todas as funcionalidades do wordpress.
- Temas: Os temas são basicamente modelos pré-definidos do wordpress. Eles determinam o visual das paginas, posicionamento de conteudos e muito mais.
- Plugins: Os plugins são extesões que adicionam funções especificas ao site, como por exemplo, formularios, melhorar desempenho e integrar serviço de terceiros como o google analitcs. Alguns plugins podem ser pagos.
- Editor Gutenberg: Basicamente se refere ao editor de blocos padrão do wordpress. Cada bloco pode ser um texto, uma imagem, um video ou outro elemento. Sistema de arrasta e solta.
- O wordpress foi inteiramente adaptado para práticas de SEO, mas também existem plugins de SEO

## Themes

- Para criar um novo tema basta entrar na pasta de temas localizada geralmente em app/public/wp-content/themes e criar uma nova pasta para o novo tema.
- O arquivo principal do tema será o index.php na raiz da pastas
- Nomear tema, informações de autor e versão: Na raiz da pasta do tema criar o arquivo style.css (Muito importante ser esse nome), e no topo do documento comentar as informações principais.

```
/*
    Theme Name: Fictional University
    Author: Jonathan
    Version: 1.0
*/
```

- Para definir uma imagem para o tema no WP basta criar um arquivo de imagem na raiz do tema e inserir o nome de screnshot.png

- Funções pré-programadas em PHP:
  - bloginfo(): Captura as principais informações da aplicação como nome e descrição
  - have_posts(): Geralmente utilizado no loop while, o have_posts permite que o while continue rodando enquanto existem posts para recorrer, nesse caso, os posts se tratam dos posts da aba posts do wordpress;
    - the_post(): Indica que o post será exibido.
    - the_title(): Indica o titulo do post.
    - the_content(): Indica o conteudo do post.
    - the_permalink(): Retorna o link de acesso ao post especifico, sendo utilizado dentro da tag `<a>`;
      ```php
      // Atenção, por padrão o wordpress quando esse comando for utilizado na homepage tratá do banco de dados os 10 ultimos posts criados.
      <?php
        while(have_posts()) {
          the_post(); ?>
          <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          <?php the_content(); ?>
          <hr>
          <?php
        }
        ?>
      ```
  - get_footer()/get_header(): Capturam o conteudo dos arquivos footer.php e header.php criados na raiz do tema. Para inseri-los em todos os posts ou paginas basta aplicar o comando get_header ou get_footer no topo e no fim do documento.
  - wp_head(): Utilizada no arquivo header.php, mais especificamente dentro da tag head, ela permite que o wordpress tenha controle total da seção head da página onde o mesmo descarrega arquivos de estilos e arquivos de plugin. Resumindo, carrega todo tipo de configuração no head da pagina.
  - wp_enqueue_style(): Esta função do WordPress é usada para adicionar arquivos CSS ao site. Recebe dois parâmetros o primeiro é o handle do arquivo ou identificador unico que será utilizado pelo wordpress, e o segundo geralmente é o get_stylesheet_uri(), o qual captura o arquivo principal de estilos da raiz do tema.
- Para obter um modelo de template de posts individuais basta criar na raiz do tema um arquivo chamado single.php.
- Para obter um modelo de template de paginas individuais basta criar na raiz do tema um arquivo chamado page.php.

- Arquivo functions.php: O arquivo functions.php é um arquivo privado criado na raiz do tema

## Learning Path Content

- Introduction
  - Course Wordpress:
- Basic concepts

  - Sintaxe básica de PHP e funcionamento básico da linguagem
    - [Documentação PHP](https://www.w3schools.com/php/)
  - Painel Wordpress, criar posts, configurar permalinks e etc
    - ![post image](git/assets/add_post.png)
      - Vermelho: Aba de posts, abaixo e acima dela é possivel ver as demais abas de outros tipos de POST, configurações e ferramentas do painel do wordpress
      - Amarelo: Visualiza todos os posts
      - Verde: Adiciona um novo post
    - ![config post image](git/assets/config_post.png)
  - Post Type e principais tipos de POST (post, page, nav_menu_item)
    - IMPORTANTE: Um post também é um tipo de POST
    - Todos os POSTS são armazenados na tabela wp_posts e diferenciados na coluna post_type
    - Além do tipo de Post Padrão, é possível criar tipos de postagens personalizadas
    - Tipos mais comuns de POSTS
      - Postagem (Tipo de postagem: 'postagem')
      - Página (Tipo de postagem: 'página')
      - Anexo (Tipo de postagem: 'anexo')
      - Revisão (Tipo de postagem: 'revisão')
      - Menu de navegação (Tipo de postagem: 'nav_menu_item')
      - Modelos de bloco (Tipo de postagem: 'wp_template')
      - Partes do modelo (Tipo de postagem: 'wp_template_part')
  - Conceito Taxonomia e principais taxonomias (Categorias, tags e taxonomias personalizadas):
    - Categorias, tags e taxonomias estão todas relacionadas e podem confundir, então como exemplo é utilizado uma página de receita.
    - (Exemplificando) Em nosso site de receitas as categorias seriam
      - Café da manhã
      - Almoço
      - Jantar
      - Aperitivos
      - Sopas
      - Saladas
      - Acompanhamentos
      - Sobremesas
    - Tags representam outro nível de especificidade, que fornece significado ao usuário como por exemplo:
      - Chocolate
      - Gengibre
      - Frango
    - A respeito das taxonomias, na verdade, Categorias e tags são exemplos de taxonomias, que são simplesmente uma forma de organizar o conteudo.
    - Taxonomias são o método de classificação de conteúdo e dados no wordpress, ao usar taxonomias é agrupado elementos semelhantes, e a taxonomia se refere a soma desses grupos, assim como a taxonomia na biologia, que classifica e descreve os seres vivos e os coloca em grupos.
    - Categorias e tags são taxonomias padrão do Wordpress, mas é possivel criar uma nova taxonomia de acordo com a necessidade.
    - Por fim existem os `termos || terms`, que são itens dentro da sua taxonomia.
  - Loop e como funciona(Uso de variáveis globais $wp_query e $post, função wp_query)
    - Loop em Wordpress é um código PHP que é utilizado para exibir posts de acordo com critérios especificados nas tags do Loop.
    - Exemplo básico de loop
      ```php
        <?php
          /*
            Primeiramente o sistema verifica se existem posts
            A função have posts é uma função do wordpress que realiza um query do banco de dados e verifica se existem posts, podendo retornar true or false dependendo do resultado
          */
          if ( have_posts() ) {
            /*
              Enquanto houver posts ele continuará renderizando item por item dos posts encontrados
            */
            while ( have_posts() ) {
              the_post(); // The post representa o post em sí, ou sejam cada item do post
              /*
                Neste ponto é possível fazer qualquer coisa quando a posts, tendo em vista que todo o conteúdo desse local estará dentro do while.
                Então é possível utilizar HTML pra renderizar e deixar da forma que desejar
              */
            } // end while
          } // end if
          ?>
      ```
    - Com loop também é possivel renderizar conteudos de acordo com a categoria daquele momento, utilizando um expressão condicional IF com o método in_category('category');
  - WP_query{}:
    ```php
      - WP_query é uma classe do wordpress que é utilizada para realizar QUERYs em banco de dados do wordpress
      - Por padrão, todos arquivos (single, index, archive, etc) possuem uma classe WP_query padrão a qual caputura algumas informações sobre
      post_type do arquivo e posts_per_page (que por padrão é 10).
      - A classe WP_Query possui métodos que são utilizados para renderizar posts e manipular loops, como have_posts, the_post, the_title etc
      - Essa classe pode ser alterada instanciando a mesma e passando o array de informações ($queryArrayEvent), isso fará com que a WP_Query
      padrão seja alterada para a que for criada. Por boas práticas é sempre interessante resetar a classe padrão com o método wp_reset_postdata();

      $queryArray = array(
        'posts_per_page' => 2
      // 'category_name' => 'awards'
      );
      $homepageposts = new WP_Query($queryArray);
    ```

- Basic content

  - Hierarquia de temas e arquivos
    - O Wordpress possue uma estrutura hierarquica bem definida
      - Para posts:
        1. single-post-meu-post.php: Quando este post especifico do tipo "post" for renderizado utilizará esse arquivo como template
        2. single-post.php: Arquivo template para post do tipo "post"
        3. single.php: Arquivo template para qualquer tipo de post
        4. singular.php: Arquivo template para qualquer conteudo individual (page ou post)
        5. index.php: Fallback final
      - Para uma pagina com o slug `sobre`:
        1. page-sobre.php: Primeiro procura um arquivo `page-<pageName>.php` para usar de template
        2. page-23.php: Procura um arquivo que contenha `page-<id>.php` para usar de template
        3. page.php: Arquivo padrão para todos os pages
        4. singular.php: Arquivo geral para todos os conteudos isolados
        5. index.php: Fallback final
      - Para uma categoria chamada `Noticias`:
        1. category-noticias.php: Procura um arquivo de modelo `category-<name>.php`
        2. category-5.php: Procura um arquivo de modelo `category-<id>.php`
        3. category.php: Arquivo padrão para a renderização de categorias
        4. archive.php: Arquivo padrão para a renderização de Taxonomias e posts personalizados
        5. index.php: Fallback Final
  - Criando e customizando menus

    - No Wordpress um menu é tratado como um tipo de post "nav_menu_item", eles são ligados a um menu maior chamado `nav_menu`.
    - Para criar um menu novo, basta ir no arquivo functions e configurar o novo menu a partir do método a baixo:
      ```php
        /*
          register_nav_menu(): Registrar um menu de navegação
          Arguments:
            Nome para o menu específico
            Nome que aparecerá no painel de administração do wordpress
          Esse método precisa estar associado a um `add_action` com o hook (init) ou (after_setup_theme)
        */
        register_nav_menu('headerMenuLocation', 'Header Menu Location');


        /*
          Após registrado basta configurá-lo no painel wp-admin e para chamá-lo basta utilizar:
            wp_nav_menu(array(
              'theme_location' => 'headerMenuLocation'
            ));
          Utilizado geralmente no header e no footer.

          has_nav_menu(): verificar se existe um menu
        */
      ```

    - Para registrar mais de um menu por vez
      ```php
          function register_my_menus() {
            register_nav_menus(
              array(
                'header-menu' => __( 'Header Menu' ),
                'extra-menu' => __( 'Extra Menu' )
              )
            );
          }
          add_action( 'init', 'register_my_menus' );
      ```

  - Criar posts customizados
    - Como vimos anteriormente, posts na verdade são tipos especificos de elementos que indicam um certo conteudo, como uma página, uma postagem, revision, menu ou anexos.
    - No wordpress também é possivel a criação de post_types personalizados de acordo com a necessidade. Para criar um novo post_type é simples, mas, por garantia, devemos criá-lo fora do tema para que o mesmo seja utilizado a qualquer momento independente do tema presente.
    - Então neste caso vamo utilizar o método "Must-Use Plugins" que são um tipo especial de plugin no wordpress. **Carregam automaticamente**, sem precisar ser ativados no painel do wordpress. Usados quando queremos garantir que certas funcionalidades estejam sempre ativas, sem chance do usuário desativar.
    - Cenários em que o "Must-Use Plugins" geralmente é utilizado:
      - Coisas críticas para o funcionamento do site
      - Código que não faz sentido ser desativado
      - Funcionalidades personalizadas em ambientes corporativos/multisite
      - Scripts de segurança, performance ou integrações obrigatorias
      - Automatizações internas, rotinas do time dev, etc.
      - Criar e manter post_types personalizados. <- (Nosso caso)
    - Para criarmos um novo post_type utilizando o Must-Use basta ir na pasta wp_content e criar uma nova pasta chamada `mu-plugins`. Dentro desta pasta basta criar um arquivo .php (para fins informativos ->) indicando o tema e a finalidade do arquivo.
    - Dentro dele basta inserir funções com add_action para inicializar uma função especifica.
    - Neste caso iremos criar um novo post_type, estão teremos um `add_action` que será acionado com o hook init:
    ```php
      add_action('init', 'university_post_types');
    ```
    - Neste mesmo arquivo criaremos uma função para inserir novos tipos de post que se chamará `university_post_types`.
    - Dentro dessa funçao executaremos um método do wordpress chamado `register_post_type`, esse método recebe 2 parâmetros, o primeiro é o nome do post_type criado, e o segundo é um array com as informações pertinentes ao post_type:
      ```php
        function university_post_types() {
          register_post_type('event', array(
            'supports' => array( // Habilita funcionalidades para o novo tipo de post, como titulo, editor e resumo (trecho)
              'title',
              'editor',
              'excerpt'
            ),
            'rewrite' => array(
              slug' => 'events'
            ),
            /*
                Habilitar uma página de arquivos (uma listagem) para o custom type
                Ou seja, habilitar o /post_type para listar todos os items do custom type
            */
            'has_archive' => true,
            /*
                'show_in_rest': Para utilizar a tela moderna do editor de blocos
                Por padrão vem false, caso seja false, todos os posts serão exibidos no editor antigo
                Para utilizar o editor de blocos novo é necessário que na lista de SUPPORTS possua o editor
            */
            'show_in_rest' => true,
            'public' =>  true, // Esse item do array tornará o tipo de postagem visível para editores e visualizadores do site.
            'labels' => array( // Define os parâmetros de rotulo como o nome e configuração do painel wp
                'name' => 'Events', // Altera o nome da seção do Painel para Events
                'add_new_item' => 'Add New Event', // Altera o botão add_new_item para Add New Event
                'edit_item' => 'Edit Event', // Altera o botão edit_item para Edit Event
                'all_items' => 'All events', // Altera o botão all_items para All Events
                'singular_name' => 'Event'
            ),
            /*
                Site para captura de icones do wordpress: https://developer.wordpress.org/resource/dashicons/#buddicons-groups
                menu_icon: se trata do icone do painel wordpress
            */
            'menu_icon' => 'dashicons-calendar'
                ));
            }
      ```
  - Criar taxonomias customizadas
    - Assim como post_types personalizados, as taxonomias vão seguir a mesma linha de criação. Taxonomias tem a função de auxiliar na organização de conteudos de post_types com mais assertividade. Por exemplo, para um post_type 'Eventos' por exemplo, é possível que dentre esses eventos, possuam reuniões, seminários, confraternizações etc., para isso, eles são organizados em taxonomias.
    - Para criar uma taxonomias customizada é possível inserí-la diretamente no arquivo `functions.php` ou no modo "Must-Use" inserindo a taxonomia no mu-plugins assim como o Custom post type.
    - No local escolhido basta seguir essa estrutura:
      ```php
      <?php
        function university_taxonomy() {
          $labels = [ // Define os parâmetros de rotulo como o nome e configuração do painel wp
            'name' => 'Tipos de Evento',
            'singular_name' => 'Tipo de Evento',
            'search_items' => 'Buscar tipos',
            'all_items' => 'Todos os tipos',
            'edit_item' => 'Editar tipo',
            'update_item' => 'Atualizar Tipo',
            'add_new_item' => 'Adicionar Novo Tipo',
            'new_item_name' => 'Novo Tipo',
            'menu_name' => 'Tipos de Evento',
          ];

          $args = [ // Define os argumentos da nova taxonomia como, visibilidade, hierarquia, e habilitar visualização wp-blocks
              'labels'            => $labels,
              'public'            => true,
              /*
                O parâmetro 'hierarchical' define se a taxonomia será uma tag ou uma categoria
                true = estilo categorias;
                false = estilo tags;

                Diferença entre categoria e tag:
                    Tag: Não possui hierarquia entre os termos(itens da tag)
                    Categoria: Pode possuir termos pai e filho
              */
              'hierarchical'      => true,
              'show_admin_column' => true, // mostra coluna no admin
              'rewrite'           => ['slug' => 'tipo-evento'], // URL: /tipo-evento/palestra
              'show_in_rest'      => true, // importante se usar Gutenberg ou API
          ];

            /*
              register_taxonomy é o método que efetivamente registra uma taxonomia,
              Ela recebe 3 argumentos
                  - Nome da taxonomia
                  - Qual post_type essa taxonomia será associada
                  - Argumentos da taxonomia
            */
            register_taxonomy('tipo_evento', ['event'], $args);
        }
        add_action('init', 'university_taxonomy');
      ```
- Plugin ACF e quando utilizar
  - Antes de enter o que é o ACF é interessante entender o que é um plugin. Como o próprio nome já diz, um "plugin" é um "plug in", ou seja, algo que "conecta" ou "encaixa" a um sistema e atribui novas funções ao sistema, assim como um acessório.
  - No Wordpress um plugin é um conjunto de arquivos (PHP, CSS, JS, ETC) que:
    - Estende o que o Wordpress pode fazer
    - Pode ser ativado ou desativado sem quebrar o site
    - Funciona como uma peça adicional, "encaixada" ao wordpress
  - Tendo isso em mente, podemos concluir que o os plugins podem:
    - Criar Sliders
    - Gerar formulários de contato
    - Melhorar o SEO
    - Adicionar campos personalizados (<- Nosso caso)
    - Criar lojas virtuais
    - Criar backups
    - Bloquear spam
    - etc
  - Os plugins estão localizado na pasta `wp_content/plugins` e podem ser só um arquivo .PHP com um cabeçalho:
    ```php
      <?php
        /*
        Plugin Name: Meu Plugin Simples
        Description: Um plugin de exemplo.
        Version: 1.0
        Author: Seu Nome
        */

        // Código do plugin aqui
    ``` 
  - O ACF (Advanced Custom Fields) é um dos plugins mais pupulares do wordpress, especialmente para desenvolvedores.
  - O ACF Permite que sejam criados campos personalizados (Custom Fields) facilmente, sem precisar escrever muito código. Esses campos podem ser adicionados a:
    - Posts
    - Pages
    - Custom post types
    - Users
    - Termos de Taxonomias
    - Comentários
    - Opções globais do site
  - Com ele é possivel adicionar:
    - Texto
    - Area de texto (textarea)
    - imagem
    - Galeria
    - Repeater (campos repetíveis)
    - Select, Checkbox, Radio
    - Arquivo
    - Google Maps
    - Relacionamento entre posts
    - etc
  - Usar o ACF quando:
    - Precisa adicionar informações extras aos posts
    - Controles de conteudo de sites personalizados
    - Paineis administrativos amigáveis para o cliente ou outro editor não-dev
    - Quando trabalhar com custom_types
  - Também é possível importar e exportar campos personalizados de outros projetos a partir do ACF.
- Incluir CSS e JS usando enqueue
  - Para incluir JS e CSS no wordpress, é necessário realizar algumas configurações para que os mesmos sejam ativados e chamados ao carregar a página.
    - Primeiramente é necessário que possuam arquivos JS ou CSS presentes na pasta do tema. Após isso basta inserir o seguinte modelo no arquivo `functions.php`:
      ```php
        <?php
          /*
            add_action: Executa uma função em um ponto específico do carregamento do WordPress.
            Sintaxe: add_action('nome_do_hook', 'nome_da_função');
            Aqui usamos o hook 'wp_enqueue_scripts' para carregar os scripts e estilos no front-end.
          */
          add_action('wp_enqueue_scripts', 'university_files');

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
      ``` 
    - Após isso os arquivos serão carregados no header ou footer da página conforme configurado
- Medium content
  - WP_QUERY e Query loop (Como o wordpress puxa os posts)
    - Como explicado anteriormente, o WordPress possui uma classe global padrão chamada WP_Query. Essa classe está presente em todos os arquivos e é configurada de acordo com o contexto do arquivo em que é utilizada.
    - Para renderizar posts, não é necessário instanciar a classe WP_Query manualmente, pois sua configuração padrão já está ativa, precisando apenas chamar seus métodos:
      - have_posts()
      - the_post()
      - the_title()
      - the_content()
      - the_permalink()
      - the_time()
      - the_author()
      - etc
      ```php
        // Atenção, por padrão, quando esses comandos são utilizados na homepage, o WordPress trará os 10 últimos posts cadastrados no banco de dados.
        <?php
          while(have_posts()) {
            the_post(); ?>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <?php the_content(); ?>
            <hr>
            <?php
          }
        ?>
      ``` 
    - Mas em alguns casos se faz necessário que a consulta seja realizada referenciando outro post, por exemplo, na tela de front-page quero exibir 3 itens do `custom type - Evento` e 3 itens do `post_type - post`, nesse caso, é possível utilizar a classe WP_Query manualmente, instanciando-a, e passando com parâmetro um array indicando o tipo de dado que será trazido na consulta.
    - A classe `WP_Query` é utilizada para realizar consultas no banco de dados e trazer informações de acordo com parâmetros pré-estabelecidos.
      ```php
        <?php
          
            $queryArray = array(
              'posts_per_page' => 2
              // 'category_name' => 'awards'
            );
            
            /*
              - WP_Query é a classe utilizada para realizar consultas ao banco de dados no WordPress.
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
                          A diferença de utilizar o get_the_excerpt e the_excerpt():
                            the_excerpt(): imprime o conteúdo já com as tags HTML (ex: <p>); 
                            get_the_excerpt() retorna apenas o texto
                            O mesmo se aplica para os demais métodos
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
      ``` 
    - Uma boa prática é sempre utilizar o método `wp_reset_postdata()` para resetar o valor da classe global, Isso garante que o loop global continue funcionando normalmente nas demais partes do código.
    - O método de renderização do conteúdo utiliza o while (have_posts()) para exibir os posts enquanto houver conteúdo disponível.
    - Por padrão, o WordPress realiza a consulta em ordem decrescente de data de publicação, ou seja, os posts mais recentes são exibidos primeiro. 
  
  - Como salvar um metadado customizado em um post (custom field)? o que são e como acessar os metadados de um post (e custom fields):
    - Antes de explicar como salvar um metadado em um post precisamos entender qual a diferença entre um metadado e um custom field:
      - Em um contexto geral, os dois termos se traram da mesma coisa, alterando apenas sua localização:
        - Custom field (Campo customizado {Informação adicional}): Uso exclusivo do painel de administração do wordpress (wp-admin). Vamos supor que utilizando o ACF nós geramos um campo de data e alocamos ele para o post_type 'event'. Nesse caso, ao inserir um novo evento, a data estará na tela de inserção para ser inserida e facilitar a vida dos administradores e moderadores do site.
        - Metadado: É a forma como o wordpress armazena dados adicionais de um post, comentário ou termo. 
          - Quando é criado um novo custom field o wordpress armazena o mesmo na tabela chamada "wp_postmeta"
          - A informação pode ser acessada por funções como:
            - `get_post_meta()`: Captura a informação do metadado
            - `update_post_meta()`: Atualiza a informação do metadado
            - `delete_post_meta`: Remove as informações de um metadado
            - OBS: Todos esses métodos precisam receber o id do post, o metadado e o valor de alteração (caso houver);
    - Agora, já esclarecido qual a diferença entre custom field e metadado, vamos entender, como criar um custom field?
      - É possível criar o custom field manualmente através da função `add_meta_box()` do wordpress, ele pode ser criado no formato `"Must Use"` ou diretamente no `functions.php`, acionado por add_actions('add_meta_boxes').
      - Mas o melhor método é utilizando o plugin ACF (Advanced custom fields), ele é utilizado para criar campos customizados facilmente. Para usar basta instalar e ativar. Para criar um novo custom field basta acessar o ACF no painel `wp-admin`:
        - Clicar em `Adicionar novo`
        - Inserir as informações do novo campo como, rótulo, nome, valor padrão, obrigatoriedade e tipo de post em que será utilizado
          - Detalhe: o campo `nome` é muito importante pois ele é o parâmetro que será utilizado para consultas e exibição em tela.
        - Para acessar o custom field criado basta chamar o método get_field como no exemplo abaixo:
          ```php
            // Realiza uma consulta em um post_type que possui um custom field criado no ACF
            $homepageEvents = new WP_Query($queryArrayEvent);
            while($homepageEvents->have_posts()) { // Renderiza os posts do post_type 
              /*
                $homepageEvents->the_post(); ?>
                Define o valor da variável Global POST para os demais métodos não precisarem utilizar o retorno da query
              */
              $homepageEvents->the_post(); ?>
              <div class="event-summary">
                <a class="event-summary__date t-center" href="<?php the_permalink(); ?>">
                  <span class="event-summary__month">
                    <?php 
                      /*
                        Contextualizado, o custom field criado foi uma data com o nome de event_date, o que acontece aqui é basicamente inserir essa data em um datetime para acessar seus métodos para formatação de data

                        O get_field('event_date') captura a informação do custom field event_date daquela query especifica
                      */
                      $eventDate = new DateTime(get_field('event_date'));
                      echo $eventDate->format('M');
                    ?></span>
                  <span class="event-summary__day">
                    <?php 
                      echo $eventDate->format('d');
                    ?></span>
                </a>
              (...)
          ```
- Advanced content
  - Ajax Function wordpress
  - Gutenberg Blocks(outra maneira de fazer temas componentizados no wordpress)
- Extra content
  - Segurança do wordpress e vulnerabilidades comuns
  - Boas práticas de wordpress


## Documentações
- Documentação Oficial:
  - [Documentação oficial do wordpress](https://developer.wordpress.org/).
- Documentação Pessoal: