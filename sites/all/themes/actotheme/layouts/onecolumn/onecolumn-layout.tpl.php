<?php  $theme = base_path() . drupal_get_path("theme",$GLOBALS['theme']) ;?>
<div class="l-header">
    <div class="logo">
        <a href="/">
            <img src="<?php print $theme ?>/imgs/logo-actolis.png" alt="logo" title="logo" />
            <div class="c-txt">
                <h1>ACTOLIS</h1>
                <p>le partenaire des industrie de la santé</p>
            </div>
        </a>
    </div>

    <div class="user">
        <?php print render($page['user']); ?>
        <ul class="menu">
            <li class="active-trail"><a href="">Consultants</a></li>
            <li><a href="">Partenaires</a></li>
            <li><a href="">Clients</a></li>
        </ul>
             
    </div>
    <div class="clear"></div>
</div>
<div class="l-menu">
    <?php print render($page['menus']); ?>
     <ul class="menu">
            <li class="active-trail"><a href="">Consultants</a></li>
            <li><a href="">Partenaires</a></li>
            <li><a href="">Clients</a></li>
    </ul>
    <div class="domaine-menu">
        <ul class="menu">
            <li class="active-trail"><a href="" class="b1"><div class="picto"></div><span class="c-txt">dispositifs médicaux</span></a></li>
            <li><a href="" class="b2"><div class="picto"></div><span class="c-txt">pharma & biotechnologie</span></a></li>
            <li><a href="" class="b3"><div class="picto"></div><span class="c-txt">cosmétiques</span></a></li>
        </ul>
    </div>
</div>
<div <?php print $attributes;?>>
    <div class="l-content">
        <?php print $messages; ?>
        <?php print render($page['content']); ?>
    </div>
</div>
<footer class="l-footer text-presentation" >
    <div class="footer-menu">

        <?php print render($page['footer']); ?>

    </div>
</footer>
<div class="l-shield"></div>
<div class="l-off">
    <a href="/">
        <img class="logo" src="<?php print $theme ?>/images/ilot_vert.svg" alt="logo" title="logo" />
    </a>
    <?php print render($page['off']); ?>
</div>
<div class="burger h">
    <svg id="Calque_1" data-name="Calque 1" viewBox="0 0 55.4 55.4">
        <circle class="cls-1" cx="27.7" cy="27.7" r="27.7"/>
        <path class="cls-2" id="burger_3"
            d="M31,33H2.7a1.06,1.06,0,0,0,0,2H31a0.85,0.85,0,0,0,.7-1C31.7,33.4,31.5,33,31,33Z"
            transform="translate(10.8 5.7)"/>
        <path class="cls-2" id="burger_2"
            d="M2.7,11H31a0.85,0.85,0,0,0,.7-1c0-.6-0.2-1-0.7-1H2.7A0.85,0.85,0,0,0,2,10,0.85,0.85,0,0,0,2.7,11Z" transform="translate(10.8 5.7)"/>
        <path class="cls-2" id="burger_1"
            d="M31,21H2.7A0.85,0.85,0,0,0,2,22a0.85,0.85,0,0,0,.7,1H31a0.85,0.85,0,0,0,.7-1C31.7,21.4,31.5,21,31,21Z" transform="translate(10.8 5.7)"/>
    </svg>
</div>

<div class="web-charte-graphique hide">

    <div class="c-slider">

        <a href="" class="bt-scroll">
            
        </a>
        
        <div class="slide">
            <div class="c-text">
                <h1>ACTOLIS<div class="sep"></div></h1>
                
                <p class="big">Le partenaire des industries de la santé</p>
                <p>Le partenaire des industries de la santé</p>
            </div>
        </div>

    </div>

    <div class="c-big-cta">

        <div class="b-big-cta b1">
            <div class="gradient"></div>
            <a href="#">
                
                <div class="picto"></div>
                <h3>Titre</h3>
                <div class="cta">voir plus</div>
            </a>
        </div>
        <div class="b-big-cta b2">
            <div class="gradient"></div>
            <a href="#">
                
                <div class="picto"></div>
                <h3>pharma & biotechnologie</h3>
                <div class="cta">voir plus</div>
            </a>
        </div>
        <div class="b-big-cta b3">
            <div class="gradient"></div>
            <a href="#">
                
                <div class="picto"></div>
                <h3>Titre</h3>
                <div class="cta">voir plus</div>
            </a>
        </div>

    </div>

    <div class="c-icones-cta">
        
        <div class="b-i i1">
            
            <div class="picto"></div>
            <h3>Titre</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>

        </div>
        <div class="b-i i2">
            
            <div class="picto"></div>
            <h3>Titre</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>

        </div>
        <div class="b-i i3">
            
            <div class="picto"></div>
            <h3>Titre</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>

        </div>
        <div class="b-i i4">
            
            <div class="picto"></div>
            <h3>Titre</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>

        </div>

    </div>

    <div class="c-news">
        
        <div class="slide">
            <div class="news">
                <div class="c-img">
                    <img src="http://actolis.dinde.pro/sites/all/themes/actotheme/imgs/home_news_photo.jpg" alt="">
                </div>
                <div class="c-text">
                    <h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </h4>
                    <p>Sed et neque facilisis, pellentesque est ac, pellentesque ante. Fusce cursus dapibus aliquet. Maecenas non pellentesque urna, ac aliquam ligula. Suspendisse sit amet dolor tempor, hendrerit est nec, tincidunt elit. </p>
                </div>
            </div>
        </div>

    </div>

    <div class="c-block">

        <div class="c-gradient">
                
            <div class="c-text">
                <h4>Rejoignez-nous!</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur non augue faucibus, ullamcorper est vitae, hendrerit lorem. </p>
                <div class="c-cta">
                <a href="" class="cta">formulaire en ligne</a>
                 </div>
            </div>
            <div class="c-img"> 
                
            </div>

        </div>
    
    </div>

</div>
