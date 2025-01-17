<?php // BEGIN PHP
$websitekey=basename(__DIR__); if (empty($websitepagefile)) $websitepagefile=__FILE__;
if (! defined('USEDOLIBARRSERVER') && ! defined('USEDOLIBARREDITOR')) {
	$pathdepth = count(explode('/', $_SERVER['SCRIPT_NAME'])) - 2;
	require_once ($pathdepth ? str_repeat('../', $pathdepth) : './').'master.inc.php';
} // Not already loaded
require_once DOL_DOCUMENT_ROOT.'/core/lib/website.lib.php';
require_once DOL_DOCUMENT_ROOT.'/core/website.inc.php';
ob_start();
// END PHP ?>
<html lang="en">
<head>
<title>product_page</title>
<meta charset="utf-8">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="robots" content="index, follow" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="keywords" content="" />
<meta name="title" content="product_page" />
<meta name="description" content="" />
<meta name="generator" content="Dolibarr 19.0.2 (https://www.dolibarr.org)" />
<meta name="dolibarr:pageid" content="154" />
<?php if ($website->use_manifest) { print '<link rel="manifest" href="/manifest.json.php" />'."\n"; } ?>
<!-- Include link to CSS file -->
<link rel="stylesheet" href="/styles.css.php?website=<?php echo $websitekey; ?>" type="text/css" />
<!-- Include link to JS file -->
<script nonce="e6acdc87" async src="/javascript.js.php?website=<?php echo $websitekey; ?>"></script>
<!-- Include HTML header from common file -->
<?php if (file_exists(DOL_DATA_ROOT."/website/".$websitekey."/htmlheader.html")) include DOL_DATA_ROOT."/website/".$websitekey."/htmlheader.html"; ?>
<!-- Include HTML header from page header block -->

</head>
<!-- File generated by Dolibarr website module editor -->
<body id="bodywebsite" class="bodywebsite bodywebpage-product_page">
<!-- Enter here your HTML content. Add a section with an id tag and tag contenteditable="true" if you want to use the inline editor for the content  -->
<div class="head-content<?php echo ($websitepage->ref == 'index' ? ' head-abso' : ''); ?>" >
    
    <?php includeContainer('header'); 
    $link_to_page = dol_buildpath('Panier.php', 1);
    ?>
    
</div>

<style>
    .head-content {
    position: relative;
    top: 0;
    width: 100%;
    z-index: 100;
    }

    .head-abso {
    position: absolute !important;
    }
    
    
    .landing-hero {
        position: relative;
        width: 100%;
        height: 100vh;
        background: linear-gradient(0deg, rgb(139, 152, 167) 0%, rgba(38, 60, 92, 1) 100%);
    }
    
    .hero-grid-container {
        position: relative;
        height:100%;
        display: grid;
        grid-template-columns: 1fr 1fr;
        align-content: center;
        margin: 0 5% ;
        justify-items: center;
    }
    
    .LEFT-SIDE {
        display: flex ;
        flex-direction: column;
        align-items: flex-start;
        justify-content: center;
        gap: 50px;
    }
    
    .LEFT-SIDE h1 {
        font-family: "JetBrains Mono", monospace;
        font-size: 78px;  
        color: var(--color-second);
        text-transform: uppercase;
        letter-spacing: 4px;
    }
    
    .LEFT-SIDE h1 span {
        color: var(--color-first); 
    }
    
    
    .LEFT-SIDE button  {
        position: relative;
        display: flex;
        color: var(--color-first);
        background: var(--color-second);
        border: solid 1px var(--color-first);
        border-radius: 16px;
        padding: 5px 6px;
        align-items: center;
        font-size: 32px;
        text-transform: uppercase;
        font-family: "Roboto", sans-serif;
        font-weight: 800;
        letter-spacing: 1px;
        gap: 8px;
        margin-left: 10px;
    }
    
    .LEFT-SIDE button span {
        background: var(--color-first);
        color: var(--color-second);
        padding: 12px 24px;
        border-radius: 13px;
        transition: .4s;
        z-index: 2;
    }
    
    .LEFT-SIDE button:hover span{
        transform: translateX(83px);
    }
    
    .LEFT-SIDE button:hover .btn-none {
         opacity: .9;
    }

    .btn-none {
        position: absolute;
        position: absolute;
        font-size: 54px;
        left: 19px;
        z-index: 1;
        opacity: 0;
        transition: .4s;
    }
    
    
    .RIGHT-SIDE img{
        width: 90%;
    }
    .RIGHT-SIDE{
        display: flex;
        justify-content: flex-end;
    }
    
    
    .scroll-down {
        position:absolute;
        bottom: -2vh;
        width: 65PX;
        height: 210px;
        right: -45px;
    }
    
    .first-color {
        color: var(--color-first);
    }
    
    
    
    
    
    
    
    .title-sec {
        font-family: "JetBrains Mono", monospace;
        color: var(--color-third);
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-bottom: 6vh !important;
        text-align: center;
    }
    
    
    .container-product-shop  {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 56px;
    }
    
    .card-product {
        position: relative;
        background: #ffffff;
        display: flex;
        width: 400px;
        height:auto;
        flex-direction: column;
        padding: 8px;
        border: solid 1px var(--color-first);
        border-radius: 24px;
        box-shadow: 0 3px 6px rgb(0 0 0 / 25%);
        gap: 18px;
        transition: .3s;
        will-change: transform; /* cancel the noise effect */

    }
    
    .card-product:hover {
        transform: scale(104%) translateY(-10px);
        box-shadow: 0 8px 10px rgb(0 0 0 / 20%);
    }
    
    .card-product .container-card-image {
        position: relative;
        overflow: hidden;
        aspect-ratio: 1 / 1;
        width: 100%;
        height:270px;
        border-radius: 16px;
        margin-bottom: 12px;
    }
    
    .container-card-image img {
        object-fit: cover;
        width: 100%;
        object-position: center;
        height: 100%;
    }
    
    .container-card-details{
        margin-left: 3px;
    }
    .container-card-details  p{
        font-family: "Roboto", sans-serif !important;
        font-size: 26px;
        font-weight: 500;
        color: var(--color-third);
        letter-spacing: 1px;
    }
    
    .name-product {
        margin: 0 !important;
    }
    .price-product {
        margin-bottom: 4px !important;
    }
    
    
    .line-sep {
        position: relative;
        left: -11px;
        width: 40%;
        height: 1px;
        background: var(--color-first);
        margin: 3.5% 0;
    }
    
    .sala {
        position: absolute;
        bottom: 10px;
        right: 10px;
    }
     
    .circle-deco {
        width: 40px;
        height: 40px;
        background: var(--color-first);
        z-index: 2;
        border: none;
        color: #ffffff;
        border-radius: 50% !important;
        font-weight: 900;
        font-size: 25px !important;
        display: flex;
        padding-bottom: 2px !important;
        justify-content: center;
        will-change: transform;
        transition: .2s;
    }
    
    .circle-deco:hover {
        transform: scale(120%) rotate(90deg);
    }
    

    
    .landing-hero.index {
        background: transparent ;
        position: relative !important;
        height: 75vh;
        /*background-size: cover;*/
        box-shadow: 0px 4px 6px rgb(0 0 0 / 24%);
    }
    
    .landing-hero.index .hero-grid-container  {
        grid-template-columns: 30% 70%;
        justify-items: end;
    }
    
    
    .splide__slide img {
        height: 102% !important;
        width: 100%;
        object-fit: cover;
        object-position: center;
    }
    
    .splide__arrow {
        background: transparent;
    }
    
    .splide__arrow svg {
        fill: var(--color-second);
        height: 2.2em;
        width: 2.2em;
    }
    .splide__pagination {
        gap: 16px;
    }
    
    .splide__pagination__page {
        width: 40px !important;
        border-radius: 24px !important;
        height: 2px !important;
        background: #919191!important;
    }
    .splide__pagination__page.is-active {
        background: #000000 !important;
    }
    
    .landing-hero.index .LEFT-SIDE {
        gap: 0px;
    }
    
    .landing-hero.index .hero-grid-container.index{
        position: absolute;
        top: 0;
        left: 0;
        display: flex;
        align-items: center;
        width: 100%;
        margin: 0;
        padding: 0 5%;
        justify-content: flex-end;
        background: linear-gradient(270deg, rgba(38,60,92,98%) 42%, rgba(0,0,0,0.052258403361344574) 100%);

    }
    
    .landing-hero.index .hero-grid-container.index h2 {
        font-size: 72px;
        letter-spacing: 8px;
        font-family: "Roboto", sans-serif !important;
        text-align: right;
        margin-bottom: 5px;
        color: #ffffff;
        animation: letterSpacingAnimation 4s infinite;
    }
    
    .landing-hero.index .hero-grid-container.index h3 {
        font-size: 32px;
        font-family: "Roboto", sans-serif !important;
        letter-spacing: 6px;
        text-align: right;
        font-weight: 300;
        color: #ffffff;
        animation: letterSpacingAnimation2 4.25s infinite;
    }
    
    .name-title {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }
    
    .align-left {
        text-align: left;
        letter-spacing: 1px !important;
    }
    
    .container-card-image.categories-image {
        height: 323px;
        border-radius: 16px 16px 8px 8px;
    }
    .container-card-image.categories-image img {
        transition: .4s;
        height: 105%;
    }
    .card-product:hover .container-card-image.categories-image img{
        transform: scale(105%);
    }
    
    
    .container-card-details.categories-name {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;  
        padding: 0 5px;
    }
    
    
    .container-card-details.categories-name i { 
        font-size: 23px;
        margin-right: 4px;
        color: var(--color-first);
    }
    .card-product.categories-card {
        padding-bottom: 10px;
        width: 508px;
    }

    .line-sep.home {
        position: relative;
        width: 35%;  
        height: 2px;
        background: var(--color-first);
        margin: 5.5% 0 0 0 !important;
    }
    
    
    
    .details-grid {
        position: relative;
        display: grid;
        width: 100%;
        grid-template-columns: 1fr 1fr;
        justify-items: end;
        gap: 40px;
    }


    .details-image {
        position: relative;
        width: 70%;
        height: 100%;
        overflow: hidden;    
    }
    .details-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }
    
    .details-text {
        position: relative;
        display: flex;
        width: 100%;
        /*gap: 6%;*/
        flex-direction: column;
        align-items: flex-start;
    }
    
    p.details-name {
        font-family: "Roboto", sans-serif;
        color: var(--color-first);
        letter-spacing: 2px;
        font-size: 52px;
        font-weight: 400;
    }
    
    
    p.details-price {
        font-size: 30px;
        font-weight: 400;
        letter-spacing: 2px;
        color: #00000094;
        font-family: "Roboto", sans-serif;
    }
    
    
    
    p.details-desc {
        width: 85%;
        font-family: "Roboto", sans-serif;
        font-size: 23px;
        line-height: 36px;
        color: var(--color-third);
        letter-spacing: 1px;
        text-align: justify;
    }

    .line-sep.details {
        left: 0;
        margin: 1.5% 0 6.5% 0px;
    }
    
    .normaldzq.details {
        margin-bottom: 28px !important;
        padding: 18px 16px !important;
        color: var(--color-second) !important;
        background: var(--color-first);
        box-shadow: 0 4px 6px rgb(0,0,0, 20%);
    }
    .normaldzq.details:hover {
        color: var(--color-first) !important;
        background: var(--color-second);
        box-shadow: 0 6px 8px rgb(0,0,0, 18%);
    }
    
    
</style>


<?php 
    $product_id = htmlspecialchars($_GET['product_id']);
    

?>



<section id="mysection1" contenteditable="true">
        <main>
            
             <section class="menu section-padding" id="cat_caisses" style="background: var(--color-second); padding-bottom: 16vh; min-height: 87vh;">
                <div class="container-section" style="margin: 0 3%;">
                    <h2 class="title-sec" style="margin-bottom: 9vh !important;"><span class="first-color">DÉTAILS</h2>
                    
                    
                    <div class="container-product-shop">
                        
                        <?php 
                            global $db;
                            
                            // Requête de l'information de product_id
                            $sql = "SELECT * FROM " . MAIN_DB_PREFIX . "product WHERE rowid = " . $product_id;
                            $result = $db->query($sql);
                        ?>
                        
                        <?php if($result) : ?>
                        
                            <!-- Boucle pour afficher chaque produit-->
                            
                            <?php while ($row = $db->fetch_object($result)) : ?>
                            
                            <div class="details-container">
                                
                                <div class="details-grid">
                                    <div class="details-image">
                                        <img src="image/ebusinessTester1/logiciel_caisse_magasin.jpg" alt="Produit" loading="lazy"/>
                                    </div>
                                    <div class="details-text">
                                        <p class="details-name"><?php echo htmlspecialchars($row->label); ?></p>
                                        <!--<div class="line-sep home"></div>-->
                                        <p class="details-price"><?php echo number_format($row->price, 3, ',', ''); ?> TND</p>
                                        <div class="line-sep details"></div>
                                        <a href="<?php echo htmlspecialchars($link_to_page . '?product_id=' . $row->rowid); ?>">
                                            <button class="normaldzq details"><i class='bx bx-cart-add' style="font-size: 24px; !important"></i>Ajouter au panier </button>
                                        </a>
                                        <p class="details-desc">Le lorem ipsum est, en imprimerie, une suite de mots sans signification utilisée à titre provisoire pour calibrer une mise en page, le texte définitif venant remplacer le faux-texte dès qu'il est prêt ou que la mise en page est achevée. Généralement, on utilise un texte en faux latin, le Lorem ipsum ou Lipsum</p>
                                        <!--<p class="details-desc"><?php echo htmlspecialchars($row->description); ?></p>-->
                                    </div>
                                </div>
            
                            </div>
                        
                        
                            <?php endwhile; ?>
                            
                            <!--PAS DE PRODUIT DANS LA DB-->
                            <?php else : ?>
                            
                                <div class='col-12'>
                                    <p>Aucun produit trouvé.</p>
                                </div>
                                
                        <?php endif; ?>
                </div>
                </div>
                
            </section>
            
        </main>

</section>


<?php includeContainer('footer'); ?>

</body>
</html>
<?php // BEGIN PHP
$tmp = ob_get_contents(); ob_end_clean(); dolWebsiteOutput($tmp, "html", 154); dolWebsiteIncrementCounter(9, "page", 154);
// END PHP ?>
