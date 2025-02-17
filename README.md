<h1 align="center">Verona Framework</h1>

**verona** Est un framework php MVC très légers adapter inspirer de JSP (JAVAEE) pour des petits sites vitrines.

# Installation #
Vous pouvez installer et tester le framework verona en utilisant composer
```bash
composer create-project verona/verona --stability=dev nom_du_projet
```
Pour l'instant le framework est encore en version dev. Nous espérons très vite sortir une version stable. N'hésiter pas à nous contacter pour des éventuels retour au bug.

# Fonctionnement #
Comme la majorité de framrwork, Verona est basé sur une architecture MVC. enfin le modèle n'est pas encore implémenté.

## Controller ##
Sur Verona, un controller est une classe php qui hérite de la classe AbstractController puis selon la methode HTTP utilisée (GET ou POST) vous devez redéfinir les méthodes appropriés. les méthode sont préfixées par do. pour une requête GET la méthode à redefinir est doGet ainsi de suite.
Voici un exemple de controller

```php
<?php

namespace App\Controller;

use Verona\Component\Controller\AbstractController;
use Verona\Component\HttpFoundation\Response;
use Verona\Component\HttpFoundation\Request;
use Verona\Component\Routing\Route;

#[Route('/main', "app_main")]
class MainController extends AbstractController {

    public function doGet(Request $request): ?Response
    {
        return $this->render("main/index.php", []);
    }

}
```
Une fois la méthode redéfinis, vous devez renvoyer un object Response. 
- `Response` Si vous souhaitez renvoyer du texte `return new Response("Helloword")`
- `JSonResponse` Si vous souhaitez renvoyer du texte Json `return new JSonResponse($data)`. data ici représente un tableau.
- `RedirectResponse` pour effectuer une redirection `return new RedirectResponse (url)`. url, l'url de redirection.

la methode render permet de renvoyer un template (une vue), elle prend deux paramètres le chemin de la vue. Les vues sont stockées dans le dossier templates. le chemin de la vue est donc spécifier à partir du dossier templates.
l'url de chaque controller est spécité à travers l'attribute `#[Route('/main', "app_main")]` placée au début de chaque class. elle prend deux paramètre l'url et un nom pour cette route

Si vous souhaitez créer un controller, vous pouvez utiliser la commande suivante : 
```bash
php bin/console create:controller App\Controller\NomDuController
```
App\Console\NomDuController est le namespace de votre controller. par exemple pour mon controller MainController le code donnerait ceci.
```bash
php bin/console create:controller App\Controller\MainController
```

Si jamais vous modifiez l'url au niveau de l'attribut Route, vous pouvez utiliser la commande suivante pour regenérer ou mettre à jour les routes.
```bash
php bin/console cache:clear
```

## Vue ##
Pour l'instant notre Framework n'utilise que php (avec du code HTML) comme vue, nous espérons vites sortir notre propre moteur de template.

## Tester le projet ##
Pour tester le projet vous pouvez démarrer notre serveur à travers la commande : 
```bash
php bin/console server:start
```
ou
```bash
php bin/console server:start --port=numeroDePort
```

## A propos de nous ##
Ce projet est Open source et ouvert à tous le monde si vous souhaitez nous rejoindre et contribuer au projet, vous pouvez nous contacter à studio.tailor.game@gmail.com