<?php

//OBLIGATOIRE : Récupère les variables globales de Wordpress
  $context = Timber::get_context();

// on récupère le contenu du post actuel grâce à TimberPost
  $post = new TimberPost();

// on ajoute la variable post (qui contient le post) à la variable
// qu'on enverra à la vue twig
  $context['post'] = $post;


// tableau d'arguments pour modifier la requête en base
// de données, et venir récupérer uniquement les trois
// derniers articles
  $args_articles = [
    'post_type' => 'post',
    'category_name' => 'home'

  ];

  $args_articles2 =[
    'post-type' => 'post',
    'category_name' => 'show',
  ];

  $args_articles3 = [
    'post-type' => 'post',
    'category_name' => 'event',
    'post_per_page' => 5
  ];

// récupère les articles en fonction du tableau d'argument $args_posts
// en utilisant la méthode de Timber get_posts
// puis on les enregistre dans l'array $context sous la clé "posts"
  $context['homes'] = Timber::get_posts($args_articles);
  $context['shows'] = Timber::get_posts($args_articles2);
  $context['events'] = Timber::get_posts($args_articles3);

// appelle la vue twig "index.twig" située dans le dossier views
// en lui passant la variable $context qui contient notamment ici les articles
  Timber::render('page-7.twig', $context);