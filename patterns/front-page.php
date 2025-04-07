<?php
/**
 * Title: front-page
 * Slug: serinity/front-page
 * Inserter: no
 */
?>
<!-- wp:template-part {"slug":"header","theme":"serinity","tagName":"header","align":"center","className":"serinity-header"} /-->

<!-- wp:group {"tagName":"main","className":"serinity-main serinity-page-home has-nacre-background-color has-background"} -->
<main class="wp-block-group serinity-main serinity-page-home has-nacre-background-color has-background"><!-- wp:html -->
<style>
main.serinity-main {
  padding-bottom: 0;
}
  div.serinity-grid {
    --min-size: clamp(15rem, 13.9583rem + 5.2083vw, 18.125rem);
    grid-template-columns: repeat(auto-fill, minmax(var(--min-size), 1fr));
    grid-auto-rows: auto;
  }

  @media screen and (max-width: 768px) {

    #hero {
      --nav-height: clamp(3.6rem, 3.05rem + 2.75vw, 5.25rem);
      background-image: unset !important;
      min-height: calc(100dvh - var(--nav-height));
    }

    #hero .serinity-hero-text {
      justify-content: flex-start;
    }

    .serinity-basic-section .serinity-basic-section-content-img,
    .serinity-basic-section .serinity-basic-section-content-img.reversed {
      height: 14rem !important;
      max-width: 100vw;
    }
  }

  @media screen and (max-width: 480px) {
    #hero {
      --img-height: 20rem;
    }

    #hero .serinity-hero-text {
      padding-top: calc(var(--img-height) + 1.5rem);
    }

    #hero .serinity-hero-text .serinity-hero-text-img {

      height: var(--img-height);
    }
  }
</style>
<!-- /wp:html -->

<!-- wp:group {"tagName":"section","metadata":{"name":"Section Hero"},"className":"serinity-section animated fadeIn ","style":{"background":{"backgroundImage":{"url":"https://dev-cat-wp.marseaud.fr/wp-content/uploads/2025/02/Background.png","id":190,"source":"file","title":"Background"},"backgroundSize":"contain","backgroundRepeat":"no-repeat"},"spacing":{"margin":{"top":"0","bottom":"0"}}},"backgroundColor":"nacre","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<section id="hero" class="wp-block-group serinity-section animated fadeIn has-nacre-background-color has-background" style="margin-top:0;margin-bottom:0"><!-- wp:group {"metadata":{"name":"Bloc Texte"},"className":"serinity-blur serinity-hero-text","style":{"color":{"background":"#faf7f580"},"shadow":"0rem 0.2rem 0.2rem 0.1rem #00000040"},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"space-between"}} -->
<div class="wp-block-group serinity-blur serinity-hero-text has-background" style="background-color:#faf7f580;box-shadow:0rem 0.2rem 0.2rem 0.1rem #00000040"><!-- wp:group {"metadata":{"name":"mobile-image"},"className":"serinity-hero-text-img","style":{"background":{"backgroundImage":{"url":"https://dev-cat-wp.marseaud.fr/wp-content/uploads/2025/03/iStock-992945918.jpg","id":965,"source":"file","title":"Purple water lily"},"backgroundSize":"cover"}},"layout":{"type":"default"}} -->
<div class="wp-block-group serinity-hero-text-img"></div>
<!-- /wp:group -->

<!-- wp:paragraph {"className":"ticss-eca52e40","fontSize":"serinity-xl","fontFamily":"heading","hasCustomCSS":true,"customCSS":".ticss-eca52e40 {\n  line-height: 1.1;\n}\n\n@media screen and (max-width: 768px) {\n  .ticss-eca52e40 {\n    line-height: 1;\n  }\n}\n"} -->
<p class="ticss-eca52e40 has-heading-font-family has-serinity-xl-font-size">Retrouvez votre paix intérieure et reconnectez-vous à votre <em>Essence </em>profonde</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Se faire aider par une hypnothérapeute spécialiste de l'hypersensibilité à Saint-Brieuc</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"style":{"shadow":"0rem 0.2rem 0.2rem 0.1rem #00000040"}} -->
<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="https://dev-cat-wp.marseaud.fr/seance-decouverte/" style="box-shadow:0rem 0.2rem 0.2rem 0.1rem #00000040">Discutons-en </a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group -->

<!-- wp:image {"id":191,"sizeSlug":"large","linkDestination":"none","className":"is-style-rounded serinity-hero-img","style":{"spacing":{"margin":{"top":"0","bottom":"0"}},"border":{"width":"5px"},"shadow":"0rem 0.2rem 0.2rem 0.1rem #00000040"},"borderColor":"nacre-claire"} -->
<figure class="wp-block-image size-large has-custom-border is-style-rounded serinity-hero-img" style="margin-top:0;margin-bottom:0"><img src="https://dev-cat-wp.marseaud.fr/wp-content/uploads/2025/02/rachel-mcdermott-p0ASrbayoPQ-unsplash-683x1024.jpg" alt="" class="has-border-color has-nacre-claire-border-color wp-image-191" style="border-width:5px;box-shadow:0rem 0.2rem 0.2rem 0.1rem #00000040"/></figure>
<!-- /wp:image --></section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","metadata":{"name":"Vague avec Citation"},"className":"serinity-wave-background serinity-section","style":{"spacing":{"blockGap":"var:preset|spacing|xx-large","padding":{"bottom":"10rem"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","verticalAlignment":"center"}} -->
<section id="questions" class="wp-block-group serinity-wave-background serinity-section" style="padding-bottom:10rem"><!-- wp:group {"metadata":{"name":"Bandeau"},"className":"serinity-blur serinity-bandeau animated fadeIn","style":{"color":{"background":"#f3ede780"},"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small","right":"var:preset|spacing|small"},"margin":{"top":"0","bottom":"0"}},"shadow":"0rem 0.2rem 0.2rem 0.1rem #00000040"},"fontSize":"serinity-base","layout":{"type":"constrained","contentSize":"1280px"}} -->
<div class="wp-block-group serinity-blur serinity-bandeau animated fadeIn has-background has-serinity-base-font-size" style="background-color:#f3ede780;margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small);box-shadow:0rem 0.2rem 0.2rem 0.1rem #00000040"><!-- wp:paragraph {"align":"right","className":"serinity-emphasis","style":{"layout":{"selfStretch":"fit","flexSize":null}}} -->
<p class="has-text-align-right serinity-emphasis"><em>« Celui qui regarde à l'extérieur rêve, celui qui regarde à l'intérieur s'éveille. »</em><br> - Carl Jung</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"symptomes"},"className":"ticss-0973c116","style":{"spacing":{"padding":{"right":"var:preset|spacing|small","left":"var:preset|spacing|small","top":"6rem"},"margin":{"top":"0","bottom":"0"}},"color":{"gradient":"linear-gradient(180deg,rgb(196,194,169) 0%,rgb(243,237,231) 100%)"}},"layout":{"type":"constrained","contentSize":"1280px"},"hasCustomCSS":true,"customCSS":"@media screen and (max-width: 768px) {\n  .ticss-0973c116 {\n    \tpadding-left:0!important;\n    \tpadding-right:0!important;\n\t}\n}"} -->
<div id="symptomes" class="wp-block-group ticss-0973c116 has-background" style="background:linear-gradient(180deg,rgb(196,194,169) 0%,rgb(243,237,231) 100%);margin-top:0;margin-bottom:0;padding-top:6rem;padding-right:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)"><!-- wp:group {"metadata":{"name":"Groupe avec Dégradé"},"className":"serinity-blur ticss-36f355a8 animated fadeInUp","style":{"color":{"gradient":"linear-gradient(180deg,rgba(217,215,199,0.5) 0%,rgb(243,237,231) 100%)"},"border":{"radius":{"topLeft":"50px","topRight":"50px"}},"spacing":{"padding":{"top":"var:preset|spacing|large","right":"var:preset|spacing|medium","bottom":"var:preset|spacing|x-large","left":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|x-large","margin":{"top":"-12rem"}}},"layout":{"type":"constrained"},"hasCustomCSS":true,"customCSS":"\n"} -->
<div class="wp-block-group serinity-blur ticss-36f355a8 animated fadeInUp has-background" style="border-top-left-radius:50px;border-top-right-radius:50px;background:linear-gradient(180deg,rgba(217,215,199,0.5) 0%,rgb(243,237,231) 100%);margin-top:-12rem;padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--x-large);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:heading {"textAlign":"center","className":"ticss-311052f2","style":{"typography":{"textDecoration":"underline","textTransform":"uppercase","fontStyle":"normal","fontWeight":"300"}},"fontFamily":"body","hasCustomCSS":true,"customCSS":".ticss-311052f2 {\n  font-size: clamp(1.5rem, 1.2083rem + 1.4583vw, 2.375rem);\n}\n"} -->
<h2 class="wp-block-heading has-text-align-center ticss-311052f2 has-body-font-family" id="vous-sentez-vous-submergee-par-vos-emotions-1" style="font-style:normal;font-weight:300;text-decoration:underline;text-transform:uppercase"><strong>Vous sentez-vous submergée par vos émotions ?</strong></h2>
<!-- /wp:heading -->

<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|large"}}}} -->
<div class="wp-block-columns"><!-- wp:column {"verticalAlignment":"center","width":"33.33%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:33.33%"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:image {"id":1570,"width":"auto","height":"440px","aspectRatio":"2/3","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"is-style-rounded serinity-hero-img","style":{"spacing":{"margin":{"top":"0","bottom":"0"}},"border":{"width":"5px"},"shadow":"0rem 0.2rem 0.2rem 0.1rem #00000040"},"borderColor":"nacre-claire"} -->
<figure class="wp-block-image size-full is-resized has-custom-border is-style-rounded serinity-hero-img" style="margin-top:0;margin-bottom:0"><img src="https://dev-cat-wp.marseaud.fr/wp-content/uploads/2025/04/femme-epuisee-edited.jpg" alt="Hypnothérapeute Saint Brieuc-Brocéliande" class="has-border-color has-nacre-claire-border-color wp-image-1570" style="border-width:5px;box-shadow:0rem 0.2rem 0.2rem 0.1rem #00000040;aspect-ratio:2/3;object-fit:cover;width:auto;height:440px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"66.66%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:66.66%"><!-- wp:paragraph -->
<p>Chaque jour est une montagne russe émotionnelle que vous traversez en<br>silence. Les lumières trop vives, les bruits trop forts, les ambiances<br>tendues que personne d'autre ne semble remarquer — tout cela vous affecte profondément.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Vous absorbez les émotions des autres comme une éponge, jusqu'à ne plus<br>savoir distinguer ce qui vous appartient de ce qui vient de l'extérieur.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>La nuit, le sommeil est perturbé. Votre esprit rejoue inlassablement les<br>interactions de la journée, analysant chaque mot, chaque regard, chaque sensation. Vous vous demandez pourquoi vous êtes si affectée par des choses qui semblent glisser sur les autres.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:group {"className":"serinity-grid","style":{"spacing":{"blockGap":"var:preset|spacing|medium"}},"layout":{"type":"grid","columnCount":3,"minimumColumnWidth":null}} -->
<div class="wp-block-group serinity-grid"><!-- wp:group {"metadata":{"name":"Carte"},"className":"animated fadeInUp serinity-blur","style":{"border":{"radius":"20px"},"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|small"},"color":{"gradient":"linear-gradient(180deg,rgb(243,237,231) 0%,rgba(242,236,230,0.3) 100%)"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center","verticalAlignment":"top","flexWrap":"nowrap"}} -->
<div class="wp-block-group animated fadeInUp serinity-blur has-background" style="border-radius:20px;background:linear-gradient(180deg,rgb(243,237,231) 0%,rgba(242,236,230,0.3) 100%);padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"serinity-md"} -->
<p class="has-text-align-center has-serinity-md-font-size" style="font-style:normal;font-weight:600">Sensations désagréables dans votre corps : troubles digestifs, douleurs,<br>migraines, insomnies</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Carte"},"className":"animated fadeInUp serinity-blur delay-200ms","style":{"border":{"radius":"20px"},"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|small"},"color":{"gradient":"linear-gradient(180deg,rgb(243,237,231) 0%,rgba(242,236,230,0.3) 100%)"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center","verticalAlignment":"top","flexWrap":"nowrap"}} -->
<div class="wp-block-group animated fadeInUp serinity-blur delay-200ms has-background" style="border-radius:20px;background:linear-gradient(180deg,rgb(243,237,231) 0%,rgba(242,236,230,0.3) 100%);padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"serinity-md"} -->
<p class="has-text-align-center has-serinity-md-font-size" style="font-style:normal;font-weight:600">Besoin incompris de solitude et de connexion à la nature</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Carte"},"className":"animated fadeInUp serinity-blur o-anim-custom-delay o-anim-value-delay-400ms","style":{"border":{"radius":"20px"},"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|small"},"color":{"gradient":"linear-gradient(180deg,rgb(243,237,231) 0%,rgba(242,236,230,0.3) 100%)"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center","verticalAlignment":"top","flexWrap":"nowrap"}} -->
<div class="wp-block-group animated fadeInUp serinity-blur o-anim-custom-delay o-anim-value-delay-400ms has-background" style="border-radius:20px;background:linear-gradient(180deg,rgb(243,237,231) 0%,rgba(242,236,230,0.3) 100%);padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"serinity-md"} -->
<p class="has-text-align-center has-serinity-md-font-size" style="font-style:normal;font-weight:600">Difficulté à poser des limites par peur du rejet ou de blesser</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Carte"},"className":"animated fadeInUp serinity-blur ","style":{"border":{"radius":"20px"},"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|small"},"color":{"gradient":"linear-gradient(180deg,rgb(243,237,231) 0%,rgba(242,236,230,0.3) 100%)"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center","verticalAlignment":"top","flexWrap":"nowrap"}} -->
<div class="wp-block-group animated fadeInUp serinity-blur has-background" style="border-radius:20px;background:linear-gradient(180deg,rgb(243,237,231) 0%,rgba(242,236,230,0.3) 100%);padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"serinity-md"} -->
<p class="has-text-align-center has-serinity-md-font-size" style="font-style:normal;font-weight:600">Sentiment de devoir porter un masque pour paraître "normale"</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Carte"},"className":"animated fadeInUp serinity-blur o-anim-custom-delay o-anim-value-delay-200ms","style":{"border":{"radius":"20px"},"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|small"},"color":{"gradient":"linear-gradient(180deg,rgb(243,237,231) 0%,rgba(242,236,230,0.3) 100%)"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center","verticalAlignment":"top","flexWrap":"nowrap"}} -->
<div class="wp-block-group animated fadeInUp serinity-blur o-anim-custom-delay o-anim-value-delay-200ms has-background" style="border-radius:20px;background:linear-gradient(180deg,rgb(243,237,231) 0%,rgba(242,236,230,0.3) 100%);padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"serinity-md"} -->
<p class="has-text-align-center has-serinity-md-font-size" style="font-style:normal;font-weight:600">Épuisement face aux stimuli quotidiens</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Carte"},"className":"animated fadeInUp serinity-blur o-anim-custom-delay o-anim-value-delay-400ms","style":{"border":{"radius":"20px"},"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|small"},"color":{"gradient":"linear-gradient(180deg,rgb(243,237,231) 0%,rgba(242,236,230,0.3) 100%)"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center","verticalAlignment":"top","flexWrap":"nowrap"}} -->
<div class="wp-block-group animated fadeInUp serinity-blur o-anim-custom-delay o-anim-value-delay-400ms has-background" style="border-radius:20px;background:linear-gradient(180deg,rgb(243,237,231) 0%,rgba(242,236,230,0.3) 100%);padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"serinity-md"} -->
<p class="has-text-align-center has-serinity-md-font-size" style="font-style:normal;font-weight:600">Sentiment d'être différente et incomprise</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:buttons {"className":"animated fadeInUp","layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons animated fadeInUp"><!-- wp:button {"textAlign":"center"} -->
<div class="wp-block-button"><a class="wp-block-button__link has-text-align-center wp-element-button" href="https://dev-cat-wp.marseaud.fr/seance-decouverte/">Réservez un appel</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","metadata":{"name":"contexte social - compréhension du problème"},"className":"serinity-basic-section","style":{"color":{"gradient":"linear-gradient(180deg,rgb(243,237,231) 0%,rgb(207,198,210) 100%)"}},"layout":{"type":"default"}} -->
<section class="wp-block-group serinity-basic-section has-background" style="background:linear-gradient(180deg,rgb(243,237,231) 0%,rgb(207,198,210) 100%)"><!-- wp:group {"metadata":{"name":"Content"},"className":"serinity-basic-section-content","layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group serinity-basic-section-content"><!-- wp:cover {"url":"https://dev-cat-wp.marseaud.fr/wp-content/uploads/2025/04/654b87f2156c9_images_medium.jpeg","id":1409,"hasParallax":true,"dimRatio":50,"customOverlayColor":"#898381","isUserOverlayColor":false,"isDark":false,"className":"serinity-basic-section-content-img","style":{"color":[]}} -->
<div class="wp-block-cover is-light has-parallax serinity-basic-section-content-img"><span aria-hidden="true" class="wp-block-cover__background has-background-dim" style="background-color:#898381"></span><div class="wp-block-cover__image-background wp-image-1409 has-parallax" style="background-position:50% 50%;background-image:url(https://dev-cat-wp.marseaud.fr/wp-content/uploads/2025/04/654b87f2156c9_images_medium.jpeg)"></div><div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"lineHeight":"1.1"}},"fontSize":"large"} -->
<h3 class="wp-block-heading has-text-align-center has-large-font-size" id="on-ne-vous-a-pas-appris-a-comprendre-ni-a-valoriser-votre-sensibilite-1" style="line-height:1.1"><span><mark style="background-color:#e5d7d7" class="has-inline-color">On ne vous a pas appris à comprendre ni à valoriser votre sensibilité</mark></span></h3>
<!-- /wp:heading --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"metadata":{"name":"Texte"},"className":"serinity-basic-section-content-txt","layout":{"type":"default"}} -->
<div class="wp-block-group serinity-basic-section-content-txt"><!-- wp:paragraph -->
<p>Dans notre société valorisant performance et rationalité, votre sensibilité a souvent été perçue comme une faiblesse. "Tu prends les choses trop à cœur", "Ne sois pas si émotive", "Il faut t'endurcir" — ces phrases, vous les avez entendues toute votre vie.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>On vous a enseigné à vous adapter, à vous conformer, mais jamais à honorer cette sensibilité comme le don précieux qu'elle est.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Face à cette souffrance, vous avez peut-être exploré diverses voies : méditation, thérapies conventionnelles, développement personnel, lectures, podcast...</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Ces approches ont pu vous apporter un soulagement temporaire, mais quelque chose manque encore.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p> Ces méthodes généralistes ne sont pas conçues spécifiquement pour les personnes hypersensibles et ne tiennent pas compte de la profondeur de votre expérience sensorielle et émotionnelle.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Les techniques de gestion du stress traditionnelles peuvent sembler efficaces mais pas durablement face à l'intensité de vos ressentis. </p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Les conseils bien intentionnés de votre entourage — "pense positif", "relativise" — sonnent creux lorsque votre système nerveux est en état d'hypervigilance.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Ce que vous cherchez, c'est une approche qui reconnaît la complexité de votre fonctionnement, qui travaille avec votre sensibilité plutôt que contre elle.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","metadata":{"name":"projection positive - vision du changement"},"className":"serinity-basic-section serinity-basic-section-reverse","style":{"color":{"gradient":"linear-gradient(180deg,rgb(207,198,210) 0%,rgb(196,194,169) 100%)"}},"layout":{"type":"default"}} -->
<section class="wp-block-group serinity-basic-section serinity-basic-section-reverse has-background" style="background:linear-gradient(180deg,rgb(207,198,210) 0%,rgb(196,194,169) 100%)"><!-- wp:group {"metadata":{"name":"Content"},"className":"serinity-basic-section-content","layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group serinity-basic-section-content"><!-- wp:cover {"url":"https://dev-cat-wp.marseaud.fr/wp-content/uploads/2025/04/65675f58a8754_images_medium.webp","id":1445,"hasParallax":true,"dimRatio":50,"customOverlayColor":"#7e7f7c","isUserOverlayColor":false,"className":"serinity-basic-section-content-img reversed","style":{"color":[]}} -->
<div class="wp-block-cover has-parallax serinity-basic-section-content-img reversed"><span aria-hidden="true" class="wp-block-cover__background has-background-dim" style="background-color:#7e7f7c"></span><div class="wp-block-cover__image-background wp-image-1445 has-parallax" style="background-position:50% 50%;background-image:url(https://dev-cat-wp.marseaud.fr/wp-content/uploads/2025/04/65675f58a8754_images_medium.webp)"></div><div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center","level":3,"style":{"typography":{"lineHeight":"1.1"}},"fontSize":"large"} -->
<h3 class="wp-block-heading has-text-align-center has-large-font-size" id="imaginez-vous-vivre-en-harmonie-avec-votre-hypersensibilite-1" style="line-height:1.1"><mark style="background-color:#e5d7d7" class="has-inline-color">Imaginez-vous vivre en harmonie avec votre hypersensibilité</mark></h3>
<!-- /wp:heading --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"metadata":{"name":"Texte"},"className":"serinity-basic-section-content-txt","layout":{"type":"default"}} -->
<div class="wp-block-group serinity-basic-section-content-txt"><!-- wp:paragraph -->
<p>Imaginez un monde où votre sensibilité serait enfin reconnue comme votre plus grande force.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p> Un monde où vous pourriez naviguer dans le flot de vos émotions avec aisance et confiance, où chaque sensation intense deviendrait une source d'information précieuse plutôt qu'une source d'anxiété.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Visualisez-vous capable de transformer cette réceptivité émotionnelle en une intuition profonde qui vous guide dans vos choix.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p> Imaginez pouvoir puiser dans l'énergie apaisante des arbres et de la forêt, vous sentir soutenue par la présence bienveillante de la nature qui ne juge pas votre sensibilité mais l'accueille pleinement.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Projetez-vous dans une vie où vous retrouveriez le calme intérieur même dans les moments de tempête émotionnelle.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p> Où vous pourriez être pleinement présente dans vos relations, sans vous sentir vidée ou envahie.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Une vie où vous seriez reconnectée à votre essence véritable, à cette part authentique souvent enfouie sous les couches d'adaptation sociale. </p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->

<!-- wp:cover {"url":"https://dev-cat-wp.marseaud.fr/wp-content/uploads/2025/03/Design-sans-titre-56.png","id":1546,"alt":"Hypnothérapeute Saint Brieuc-Brocéliande","dimRatio":0,"overlayColor":"aubergine","isUserOverlayColor":true,"isDark":false,"metadata":{"name":"suite projection positive"},"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|taupe"}},"heading":{"color":{"text":"var:preset|color|taupe"}}},"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"bottom":"var:preset|spacing|tiny","top":"var:preset|spacing|tiny"}},"color":{"duotone":["#767351","#faf8f6"]}},"textColor":"taupe","layout":{"type":"constrained","contentSize":"1280px"}} -->
<div class="wp-block-cover aligncenter is-light has-taupe-color has-text-color has-link-color" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--tiny);padding-bottom:var(--wp--preset--spacing--tiny)"><span aria-hidden="true" class="wp-block-cover__background has-aubergine-background-color has-background-dim-0 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-1546" alt="Hypnothérapeute Saint Brieuc-Brocéliande" src="https://dev-cat-wp.marseaud.fr/wp-content/uploads/2025/03/Design-sans-titre-56.png" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"align":"center","className":"ticss-daf2548e animated fadeIn","style":{"typography":{"fontStyle":"italic","fontWeight":"700"}},"fontFamily":"heading","hasCustomCSS":true,"customCSS":".ticss-daf2548e {\n    font-size:clamp(1.375rem,.9583rem + 2.0833vw,2.625rem)\n}\n"} -->
<p class="has-text-align-center ticss-daf2548e animated fadeIn has-heading-font-family" style="font-style:italic;font-weight:700"><mark style="background-color:#f3ede7" class="has-inline-color">Cette harmonie n'est pas un rêve inaccessible — c'est un chemin concret que nous pouvons parcourir ensemble.</mark></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--medium);margin-bottom:var(--wp--preset--spacing--medium)"><!-- wp:button {"className":"animated fadeInUp"} -->
<div class="wp-block-button animated fadeInUp"><a class="wp-block-button__link wp-element-button" href="https://dev-cat-wp.marseaud.fr/seance-decouverte/">Prendre rendez-vous</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"metadata":{"name":"Votre accompagnante"},"className":"ticss-0973c116","style":{"spacing":{"padding":{"right":"var:preset|spacing|small","left":"var:preset|spacing|small","top":"6rem"},"margin":{"top":"0","bottom":"0"}},"color":{"gradient":"linear-gradient(180deg,rgb(196,194,169) 0%,rgb(209,183,184) 100%)"}},"layout":{"type":"constrained","contentSize":"1280px"},"hasCustomCSS":true,"customCSS":"@media screen and (max-width: 768px) {\n  .ticss-0973c116 {\n    \tpadding-left:0!important;\n    \tpadding-right:0!important;\n\t}\n}"} -->
<div id="coach-new" class="wp-block-group ticss-0973c116 has-background" style="background:linear-gradient(180deg,rgb(196,194,169) 0%,rgb(209,183,184) 100%);margin-top:0;margin-bottom:0;padding-top:6rem;padding-right:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small)"><!-- wp:group {"metadata":{"name":"Groupe avec Dégradé"},"className":"serinity-blur ticss-36f355a8 animated fadeInUp","style":{"color":{"gradient":"linear-gradient(180deg,rgba(218,216,200,0.5) 0%,rgb(209,183,184) 100%)"},"border":{"radius":{"topLeft":"50px","topRight":"50px"}},"spacing":{"padding":{"top":"var:preset|spacing|large","right":"var:preset|spacing|medium","bottom":"var:preset|spacing|x-large","left":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|medium","margin":{"top":"-12rem"}}},"layout":{"type":"constrained"},"hasCustomCSS":true,"customCSS":"\n"} -->
<div class="wp-block-group serinity-blur ticss-36f355a8 animated fadeInUp has-background" style="border-top-left-radius:50px;border-top-right-radius:50px;background:linear-gradient(180deg,rgba(218,216,200,0.5) 0%,rgb(209,183,184) 100%);margin-top:-12rem;padding-top:var(--wp--preset--spacing--large);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--x-large);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:group {"metadata":{"name":"Titraille"},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","className":"ticss-311052f2","style":{"typography":{"textDecoration":"underline","textTransform":"uppercase","fontStyle":"normal","fontWeight":"300"}},"fontFamily":"body","hasCustomCSS":true,"customCSS":".ticss-311052f2 {\n  font-size: clamp(1.5rem, 1.2083rem + 1.4583vw, 2.375rem);\n}\n"} -->
<h2 class="wp-block-heading has-text-align-center ticss-311052f2 has-body-font-family" id="vous-sentez-vous-submergee-par-vos-emotions-1" style="font-style:normal;font-weight:300;text-decoration:underline;text-transform:uppercase">Catherine Chauvin</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"italic","fontWeight":"700"}},"fontFamily":"heading"} -->
<p class="has-text-align-center has-heading-font-family" style="font-style:italic;font-weight:700"><mark style="background-color:#e5d7d7" class="has-inline-color">Votre hypnothérapeute spécialisée dans l'hypersensibilité et la libération des angoisses et traumatismes.</mark></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:columns {"className":"ticss-d519a351","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|large"}}},"hasCustomCSS":true,"customCSS":"\n@media (max-width: 782px) {\n.ticss-d519a351 {\n  flex-direction: column-reverse;\n}\n}"} -->
<div class="wp-block-columns ticss-d519a351"><!-- wp:column {"verticalAlignment":"center","width":"66.66%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:66.66%"><!-- wp:paragraph -->
<p>Vous êtes prête à décider de passer à l'action pour <strong>reprendre le contrôle</strong> de votre vie et retrouver un équilibre dans votre quotidien .</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>C'est un moment important pour vous, je comprends vos doutes, vos hésitations, mais transformer votre hypersensibilité en puissance personnelle est posssible. </p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Le choix de votre thérapeute est primordial dans cette démarche car une relation de confiance se crée entre vous et lui.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>C'est pourquoi je vous propose, une séance découverte gratuite d'échanges, au cours de laquelle je me mets à l'écoute de vos attentes et de vos besoins.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>En décidant de vous rencontrer et de vous libérer de vos traumatismes vous faites un <strong>choix courageux</strong> pour votre<strong> bien-être</strong>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p> Vous méritez de <strong>profiter de la vie</strong> et de retrouver une <strong>sérénité durable</strong>.ions de la journée, analysant chaque mot, chaque regard, chaque sensation. Vous vous demandez pourquoi vous êtes si affectée par des choses qui semblent glisser sur les autres.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"33.33%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:33.33%"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group"><!-- wp:image {"id":1420,"width":"auto","height":"440px","aspectRatio":"2/3","scale":"cover","sizeSlug":"full","linkDestination":"none","className":"is-style-rounded serinity-hero-img","style":{"spacing":{"margin":{"top":"0","bottom":"0"}},"border":{"width":"5px"},"shadow":"0rem 0.2rem 0.2rem 0.1rem #00000040"},"borderColor":"nacre-claire"} -->
<figure class="wp-block-image size-full is-resized has-custom-border is-style-rounded serinity-hero-img" style="margin-top:0;margin-bottom:0"><img src="https://dev-cat-wp.marseaud.fr/wp-content/uploads/2025/04/676444031e371_images_large.jpeg" alt="" class="has-border-color has-nacre-claire-border-color wp-image-1420" style="border-width:5px;box-shadow:0rem 0.2rem 0.2rem 0.1rem #00000040;aspect-ratio:2/3;object-fit:cover;width:auto;height:440px"/></figure>
<!-- /wp:image --></div>
<!-- /wp:group --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:group {"className":"serinity-grid","style":{"spacing":{"blockGap":"var:preset|spacing|medium"}},"layout":{"type":"grid","columnCount":3,"minimumColumnWidth":null}} -->
<div class="wp-block-group serinity-grid"><!-- wp:group {"metadata":{"name":"Carte"},"className":"animated fadeInUp serinity-blur","style":{"border":{"radius":"20px"},"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|small"},"color":{"gradient":"linear-gradient(180deg,rgba(243,237,231,0.4) 0%,rgba(242,236,230,0.3) 100%)"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center","verticalAlignment":"top","flexWrap":"nowrap"}} -->
<div class="wp-block-group animated fadeInUp serinity-blur has-background" style="border-radius:20px;background:linear-gradient(180deg,rgba(243,237,231,0.4) 0%,rgba(242,236,230,0.3) 100%);padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"serinity-md"} -->
<p class="has-text-align-center has-serinity-md-font-size" style="font-style:normal;font-weight:600">20 années d'expériences</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Carte"},"className":"animated fadeInUp serinity-blur delay-200ms","style":{"border":{"radius":"20px"},"spacing":{"padding":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium","left":"var:preset|spacing|medium","right":"var:preset|spacing|medium"},"blockGap":"var:preset|spacing|small"},"color":{"gradient":"linear-gradient(180deg,rgba(243,237,231,0.4) 0%,rgba(242,236,230,0.3) 100%)"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center","verticalAlignment":"top","flexWrap":"nowrap"}} -->
<div class="wp-block-group animated fadeInUp serinity-blur delay-200ms has-background" style="border-radius:20px;background:linear-gradient(180deg,rgba(243,237,231,0.4) 0%,rgba(242,236,230,0.3) 100%);padding-top:var(--wp--preset--spacing--medium);padding-right:var(--wp--preset--spacing--medium);padding-bottom:var(--wp--preset--spacing--medium);padding-left:var(--wp--preset--spacing--medium)"><!-- wp:paragraph {"align":"center","style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"serinity-md"} -->
<p class="has-text-align-center has-serinity-md-font-size" style="font-style:normal;font-weight:600">Plus de 1000 patients</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons"><!-- wp:button {"textAlign":"center","className":"animated fadeInUp o-anim-custom-delay o-anim-value-delay-600ms"} -->
<div class="wp-block-button animated fadeInUp o-anim-custom-delay o-anim-value-delay-600ms"><a class="wp-block-button__link has-text-align-center wp-element-button" href="https://dev-cat-wp.marseaud.fr/seance-decouverte/">Réserver une discussion</a></div>
<!-- /wp:button -->

<!-- wp:button {"textAlign":"center","backgroundColor":"taupe","className":"animated fadeInUp o-anim-custom-delay o-anim-value-delay-800ms"} -->
<div class="wp-block-button animated fadeInUp o-anim-custom-delay o-anim-value-delay-800ms"><a class="wp-block-button__link has-taupe-background-color has-background has-text-align-center wp-element-button" href="https://dev-cat-wp.marseaud.fr/a-propos/">En apprendre plus sur moi</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"titre témoignages"},"className":"","style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"},"hasCustomCSS":true} -->
<div class="wp-block-group" style="margin-top:0;margin-bottom:0"><!-- wp:heading {"textAlign":"center","className":"ticss-e95e96f1","backgroundColor":"rose","hasCustomCSS":true,"customCSS":".ticss-e95e96f1 {\n  line-height: 1.1;\n}\n"} -->
<h2 class="wp-block-heading has-text-align-center ticss-e95e96f1 has-rose-background-color has-background" id="elles-ont-transforme-leur-hypersensibilite-en-force"><mark style="background-color:#f3ede7" class="has-inline-color">Elles ont transformé leur hypersensibilité en force</mark></h2>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:group {"tagName":"section","metadata":{"name":"Témoignages"},"className":"serinity-section","style":{"background":{"backgroundImage":{"url":"https://dev-cat-wp.marseaud.fr/wp-content/uploads/2025/03/main-bichromie-2-scaled.jpg","id":296,"source":"file","title":"main-bichromie-2"},"backgroundSize":"cover","backgroundAttachment":"scroll","backgroundPosition":"100% 50%"},"spacing":{"padding":{"top":"var:preset|spacing|xxx-large","bottom":"var:preset|spacing|xxx-large"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"stretch","verticalAlignment":"center"}} -->
<section id="testimonies" class="wp-block-group serinity-section" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--xxx-large);padding-bottom:var(--wp--preset--spacing--xxx-large)"><!-- wp:group {"metadata":{"name":"Témoignages Container"},"className":"serinity-testimonies","style":{"spacing":{"padding":{"top":"0","bottom":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group serinity-testimonies" style="padding-top:0;padding-bottom:0"><!-- wp:group {"metadata":{"name":"Témoignage"},"className":"serinity-blur serinity-testimony","style":{"spacing":{"blockGap":"var:preset|spacing|tiny"},"color":{"background":"#f3ede780"},"border":{"radius":"20px"}},"layout":{"type":"default"}} -->
<div class="wp-block-group serinity-blur serinity-testimony has-background" style="border-radius:20px;background-color:#f3ede780"><!-- wp:heading {"level":5,"style":{"typography":{"textDecoration":"underline"}}} -->
<h5 class="wp-block-heading" id="frederique" style="text-decoration:underline"><strong>Frédérique</strong></h5>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"serinity-xs"} -->
<p class="has-serinity-xs-font-size">“Je suis venue voir madame Chauvin pour plusieurs problématiques. Ma première séance en Févier était sur une difficulté d’ordre professionnel. Depuis celle ci même si j’avais réglé une partie de ce problème auparavant, je ne rencontre plus de tensions professionnelles et j’en suis toujours étonnée.<br>La seconde séance en Mars était sur une autre problématique qui me tourmentait au quotidien et voire plus depuis si longtemps.<br>Je ne sais pas si j’ai vraiment connu une période aussi sereine que maintenant et j’en prends conscience tous les jours.<br>Pourvu que ça dure et oui ça marche l’hypnose humaniste et surtout merci à Madame Chauvin pour son travail, ses paroles réconfortantes et ses conseils.”</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Témoignage"},"className":"serinity-blur serinity-testimony","style":{"spacing":{"blockGap":"var:preset|spacing|tiny"},"color":{"background":"#f3ede780"},"border":{"radius":"20px"}},"layout":{"type":"default"}} -->
<div class="wp-block-group serinity-blur serinity-testimony has-background" style="border-radius:20px;background-color:#f3ede780"><!-- wp:heading {"level":5,"style":{"typography":{"textDecoration":"underline"}}} -->
<h5 class="wp-block-heading" id="severine" style="text-decoration:underline"><strong>Séverine</strong></h5>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"serinity-xs"} -->
<p class="has-serinity-xs-font-size">“J’étais une personne très stressée et anxieuse qui ne faisait plus qu’un repas par jour suite à une boule dans l’estomac. <br>Avec une seule séance d’hypnose, 2 jours après plus de boule. Je mange matin, midi et soir.”</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Témoignage"},"className":"serinity-blur serinity-testimony","style":{"spacing":{"blockGap":"var:preset|spacing|tiny"},"color":{"background":"#f3ede780"},"border":{"radius":"20px"}},"layout":{"type":"default"}} -->
<div class="wp-block-group serinity-blur serinity-testimony has-background" style="border-radius:20px;background-color:#f3ede780"><!-- wp:heading {"level":5,"style":{"typography":{"textDecoration":"underline"}}} -->
<h5 class="wp-block-heading" id="amandine" style="text-decoration:underline">Amandine</h5>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"serinity-xs"} -->
<p class="has-serinity-xs-font-size">“Madame, Je tenais à vous exprimer toute ma reconnaissance. Chacun assimile à sa façon et pour ma part, j’entrevois maintenant avec enthousiasme un avenir plus serein. <br>Je vous remercie très chaleureusement de m’avoir aidé.”</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Témoignage"},"className":"serinity-blur serinity-testimony","style":{"spacing":{"blockGap":"var:preset|spacing|tiny"},"color":{"background":"#f3ede780"},"border":{"radius":"20px"}},"layout":{"type":"default"}} -->
<div class="wp-block-group serinity-blur serinity-testimony has-background" style="border-radius:20px;background-color:#f3ede780"><!-- wp:heading {"level":5,"style":{"typography":{"textDecoration":"underline"}}} -->
<h5 class="wp-block-heading" id="brigitte-s" style="text-decoration:underline">Brigitte S.</h5>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"serinity-xs"} -->
<p class="has-serinity-xs-font-size">“Merci infiniment Madame CHAUVIN Les mots me manquent pour vous adresser toute ma gratitude du bien bien-être que vous m avez procuré depuis nos séances.<br>Vous avez métamorphosé ma vie. Tout simplement MERCI”</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Témoignage"},"className":"serinity-blur serinity-testimony","style":{"spacing":{"blockGap":"var:preset|spacing|tiny"},"color":{"background":"#f3ede780"},"border":{"radius":"20px"}},"layout":{"type":"default"}} -->
<div class="wp-block-group serinity-blur serinity-testimony has-background" style="border-radius:20px;background-color:#f3ede780"><!-- wp:heading {"level":5,"style":{"typography":{"textDecoration":"underline"}}} -->
<h5 class="wp-block-heading" id="lucie" style="text-decoration:underline"><strong>Lucie</strong></h5>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"serinity-xs"} -->
<p class="has-serinity-xs-font-size">“Catherine CHAUVIN m’a aidé à traverser une période difficile de ma vie par son écoute, sa bienveillance et sa technicité (hypnose notamment).<br>Je la recommande vivement.”</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Témoignage"},"className":"serinity-blur serinity-testimony","style":{"spacing":{"blockGap":"var:preset|spacing|tiny"},"color":{"background":"#f3ede780"},"border":{"radius":"20px"}},"layout":{"type":"default"}} -->
<div class="wp-block-group serinity-blur serinity-testimony has-background" style="border-radius:20px;background-color:#f3ede780"><!-- wp:heading {"level":5,"style":{"typography":{"textDecoration":"underline"}}} -->
<h5 class="wp-block-heading" id="isa" style="text-decoration:underline"><strong>Isa</strong></h5>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"serinity-xs"} -->
<p class="has-serinity-xs-font-size">“Un travail en profondeur, une écoute et une bienveillance impitoyable. Il est très facile et agréable de dialoguer avec Catherine. Une sagesse et une écoute très réconfortantes.<br>Merci à Catherine.”</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Témoignage"},"className":"serinity-blur serinity-testimony","style":{"spacing":{"blockGap":"var:preset|spacing|tiny"},"color":{"background":"#f3ede780"},"border":{"radius":"20px"}},"layout":{"type":"default"}} -->
<div class="wp-block-group serinity-blur serinity-testimony has-background" style="border-radius:20px;background-color:#f3ede780"><!-- wp:heading {"level":5,"style":{"typography":{"textDecoration":"underline"}}} -->
<h5 class="wp-block-heading" id="justine" style="text-decoration:underline"><strong>Justine</strong></h5>
<!-- /wp:heading -->

<!-- wp:paragraph {"fontSize":"serinity-xs"} -->
<p class="has-serinity-xs-font-size">“C’est une expérience qui s’est révélée positive. Souffrant d’angoisse et d’un gros stress permanent, j’avais d’abord été suivie par un psychologue qui ne m’avait pas vraiment aidée. Ayant eu des retours positifs sur l’hypnose j’ai décidé d’essayer. Les séances m’ont permis de me recentrer sur moi même. j’ai appris à me détendre lorsque je sentais des pensées négatives m’envahir.<br>Aujourd’hui après 3 séances je me sens beaucoup mieux, j’appréhende moins le regard des autres, j’arrive à laisser entrer les pensées positives dans ma tête, ce qui m’était impossible.<br>Je vous remercie beaucoup de m’avoir aidé à revivre.”</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->

<!-- wp:group {"className":"ticss-f8883c1e","style":{"spacing":{"padding":{"top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0"}},"color":{"background":"#faf7f500"}},"layout":{"type":"constrained"},"hasCustomCSS":true,"customCSS":".ticss-f8883c1e {\n  z-index:1;\n  height:0;\n}\n"} -->
<div class="wp-block-group ticss-f8883c1e has-background" style="background-color:#faf7f500;margin-top:0;margin-bottom:0;padding-top:0;padding-bottom:0"><!-- wp:group {"metadata":{"name":"Bandeau Citation"},"className":"serinity-blur serinity-bandeau animated fadeIn ticss-4df2ba1e","style":{"color":{"background":"#f3ede780"},"spacing":{"padding":{"top":"var:preset|spacing|small","bottom":"var:preset|spacing|small","left":"var:preset|spacing|small","right":"var:preset|spacing|small"}},"shadow":"0rem 0.2rem 0.2rem 0.1rem #00000040"},"fontSize":"serinity-base","layout":{"type":"constrained","contentSize":"1280px"},"hasCustomCSS":true,"customCSS":".ticss-4df2ba1e {\n  position: absolute;\n  left: 0;\n  right: 0;\n  top: 50%;\n  transform:    translateY(-50%);\n}\n"} -->
<div class="wp-block-group serinity-blur serinity-bandeau animated fadeIn ticss-4df2ba1e has-background has-serinity-base-font-size" style="background-color:#f3ede780;padding-top:var(--wp--preset--spacing--small);padding-right:var(--wp--preset--spacing--small);padding-bottom:var(--wp--preset--spacing--small);padding-left:var(--wp--preset--spacing--small);box-shadow:0rem 0.2rem 0.2rem 0.1rem #00000040"><!-- wp:paragraph {"align":"right","className":"serinity-emphasis","style":{"layout":{"selfStretch":"fit","flexSize":null}}} -->
<p class="has-text-align-right serinity-emphasis"><em>« Le changement n'est jamais douloureux, seule la résistance au changement est douloureuse. »</em><br> - Bouddha</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->

<!-- wp:cover {"url":"https://dev-cat-wp.marseaud.fr/wp-content/uploads/2025/04/priscilla-du-preez-nF8xhLMmg0c-unsplash-scaled.jpg","id":1300,"dimRatio":0,"overlayColor":"aubergine","isUserOverlayColor":true,"focalPoint":{"x":0.58,"y":0.22},"isDark":false,"metadata":{"name":"Expérience"},"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|taupe"}},"heading":{"color":{"text":"var:preset|color|taupe"}}},"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"bottom":"var:preset|spacing|tiny","top":"5rem"}},"color":{"duotone":["#767351","#faf8f6"]}},"textColor":"taupe","layout":{"type":"constrained","contentSize":"1280px"}} -->
<div class="wp-block-cover aligncenter is-light has-taupe-color has-text-color has-link-color" style="margin-top:0;margin-bottom:0;padding-top:5rem;padding-bottom:var(--wp--preset--spacing--tiny)" id="session-description"><span aria-hidden="true" class="wp-block-cover__background has-aubergine-background-color has-background-dim-0 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-1300" alt="" src="https://dev-cat-wp.marseaud.fr/wp-content/uploads/2025/04/priscilla-du-preez-nF8xhLMmg0c-unsplash-scaled.jpg" style="object-position:58% 22%" data-object-fit="cover" data-object-position="58% 22%"/><div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","className":"ticss-7704c396","style":{"typography":{"textDecoration":"underline","textTransform":"uppercase","fontStyle":"normal","fontWeight":"300"},"spacing":{"margin":{"bottom":"0","top":"var:preset|spacing|medium"}}},"fontSize":"large","fontFamily":"body","hasCustomCSS":true,"customCSS":".ticss-7704c396 {\n    font-size: clamp(1.375rem,.9583rem + 2.0833vw,2.625rem)!important;\n  line-height: 1.2;\n}\n"} -->
<h2 class="wp-block-heading has-text-align-center ticss-7704c396 has-body-font-family has-large-font-size" id="en-decidant-de-vous-liberer-de-vos-traumatismes-vous-faites-un-choix-courageux-pour-votre-bien-etre" style="margin-top:var(--wp--preset--spacing--medium);margin-bottom:0;font-style:normal;font-weight:300;text-decoration:underline;text-transform:uppercase"><mark style="background-color:#faf8f6" class="has-inline-color">En décidant de vous libérer de vos traumatismes, vous faites un choix courageux pour votre bien-être</mark></h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","className":"ticss-daf2548e","style":{"typography":{"fontStyle":"italic","fontWeight":"700"}},"fontFamily":"heading","hasCustomCSS":true,"customCSS":".ticss-daf2548e {\n    font-size:clamp(1.375rem,.9583rem + 2.0833vw,2.625rem)\n}\n"} -->
<p class="has-text-align-center ticss-daf2548e has-heading-font-family" style="font-style:italic;font-weight:700"><mark style="background-color:#faf8f6" class="has-inline-color has-taupe-color">Vous méritez de profiter de la vie et de retrouver une sérénité durable</mark></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|medium","bottom":"var:preset|spacing|medium"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--medium);margin-bottom:var(--wp--preset--spacing--medium)"><!-- wp:button {"className":"animated fadeInUp"} -->
<div class="wp-block-button animated fadeInUp"><a class="wp-block-button__link wp-element-button" href="https://dev-cat-wp.marseaud.fr/seance-decouverte/">Réserver ma séance découverte gratuite</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover --></main>
<!-- /wp:group -->

<!-- wp:template-part {"slug":"footer","theme":"serinity","tagName":"footer","className":"serinity-footer"} /-->