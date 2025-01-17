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
<title>catalogue</title>
<meta charset="utf-8">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="robots" content="index, follow" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="keywords" content="" />
<meta name="title" content="catalogue" />
<meta name="description" content="" />
<meta name="generator" content="Dolibarr 19.0.2 (https://www.dolibarr.org)" />
<meta name="dolibarr:pageid" content="74" />
<?php if ($website->use_manifest) { print '<link rel="manifest" href="/manifest.json.php" />'."\n"; } ?>
<!-- Include link to CSS file -->
<link rel="stylesheet" href="/styles.css.php?website=<?php echo $websitekey; ?>" type="text/css" />
<!-- Include link to JS file -->
<script nonce="63a18ccb" async src="/javascript.js.php?website=<?php echo $websitekey; ?>"></script>
<!-- Include HTML header from common file -->
<?php if (file_exists(DOL_DATA_ROOT."/website/".$websitekey."/htmlheader.html")) include DOL_DATA_ROOT."/website/".$websitekey."/htmlheader.html"; ?>
<!-- Include HTML header from page header block -->

</head>
<!-- File generated by Dolibarr website module editor -->
<body id="bodywebsite" class="bodywebsite bodywebpage-catalogue">
<?php 
$main_inc_path = $_SERVER['DOCUMENT_ROOT'] . '/main.inc.php';

// Inclure le fichier de Dolibarr
require_once $main_inc_path;

session_start();
if (!isset($_SESSION['valid'])) {
    include 'login.php';
    exit;
}
?>

<!-- Enter here your HTML content. Add a section with an id tag and tag contenteditable="true" if you want to use the inline editor for the content  -->
<div class="head-content<?php echo ($websitepage->ref == 'catalogue' || $websitepage->ref == 'index' ? ' head-abso' : ''); ?>" >

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
        height: 80vh;
        background: linear-gradient(0deg, rgb(139, 152, 167) 0%, rgba(38, 60, 92, 1) 100%);
    }
    
    .hero-grid-container {
        position: relative;
        height:90vh;
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
    
    
    
    
    
</style>



<section id="mysection1" contenteditable="true">
        <main>
            <section class="landing-hero">
                <div class="hero-grid-container">
                    <div class="LEFT-SIDE">
                        <h1>Decouvrez <br><span>nos</span> <br>produits</h1>
                        <a href="catalogue#produit-section">
                        <button>
                            <span>Decouvrir</span>
                            <i class='btn-none bx bx-x' ></i>
                            <lord-icon
                            src="https://cdn.lordicon.com/whtfgdfm.json"
                            trigger="loop"
                            delay="1000"
                            state="hover-ternd-flat-6"
                            colors="primary:#263c5c"
                            style="width: 70px; margin-right: 6px; height: 62px;"
                            </lord-icon> 
                        </button>
                        </a>
                    </div>
                    <div class="RIGHT-SIDE">
                        <img  src="image/ebusinessTester1/sapiens1.png" alt="WORK"/>
                    </div>
                </div>
            </section>





            <section class="menu section-padding" id="produit-section" style="background: var(--color-second); padding-bottom: 16vh;">
                <div class="container-section" style="margin: 0 6%;">
                    <h2 class="title-sec"><span class="first-color">Nos</span> produits </h2>
                    
                    <div class="container-product-shop">
  
                        
                            
                        <?php 
                            global $db;
                            
                            // Requête SQL pour obtenir tous les produits
                            $sql = "SELECT * FROM " . MAIN_DB_PREFIX . "product";
                            $result = $db->query($sql);
                        ?>
                        
                        <?php if($result) : ?>
                        
                            <!-- Boucle pour afficher chaque produit-->
                            
                            <?php while ($row = $db->fetch_object($result)) : ?>
                    
                            
                                    <div class="card-product">
                                    <a href="<?php echo htmlspecialchars('product_page.php?product_id=' . $row->rowid); ?>">
                                        <div class="container-card-image">
                                            <!--IMAGE DOIT ETRE DYNAMIC-->
                                            <img src="image/ebusinessTester1/logiciel_caisse_magasin.jpg" alt="Produit"/>
                                        </div>
                                        <div class="container-card-details">
                                            <p class="name-product"><?php echo htmlspecialchars($row->label); ?></p>
                                            <div class="line-sep"></div>
                                            <p class="price-product"><?php echo number_format($row->price, 3, ',', ''); ?> TND</p>
                                        </div>
                                        <a class="sala" href="<?php echo htmlspecialchars($link_to_page . '?product_id=' . $row->rowid); ?>"><button class="circle-deco">+</button></a>
                                    </a>
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
$tmp = ob_get_contents(); ob_end_clean(); dolWebsiteOutput($tmp, "html", 74); dolWebsiteIncrementCounter(9, "page", 74);
// END PHP ?>
