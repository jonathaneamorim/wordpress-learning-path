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
      ```
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


## Documentações
[Documentação oficial do wordpress](https://developer.wordpress.org/).