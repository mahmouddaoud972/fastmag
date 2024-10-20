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
<title>produit</title>
<meta charset="utf-8">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="robots" content="index, follow" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="keywords" content="" />
<meta name="title" content="produit" />
<meta name="description" content="produit" />
<meta name="generator" content="Dolibarr 19.0.2 (https://www.dolibarr.org)" />
<meta name="dolibarr:pageid" content="89" />
<?php if ($website->use_manifest) { print '<link rel="manifest" href="/manifest.json.php" />'."\n"; } ?>
<!-- Include link to CSS file -->
<link rel="stylesheet" href="/styles.css.php?website=<?php echo $websitekey; ?>" type="text/css" />
<!-- Include link to JS file -->
<script nonce="041ff60c" async src="/javascript.js.php?website=<?php echo $websitekey; ?>"></script>
<!-- Include HTML header from common file -->
<?php if (file_exists(DOL_DATA_ROOT."/website/".$websitekey."/htmlheader.html")) include DOL_DATA_ROOT."/website/".$websitekey."/htmlheader.html"; ?>
<!-- Include HTML header from page header block -->

</head>
<!-- File generated by Dolibarr website module editor -->
<body id="bodywebsite" class="bodywebsite bodywebpage-produit">
<!-- Enter here your HTML content. Add a section with an id tag and tag contenteditable="true" if you want to use the inline editor for the content  -->

<?php includeContainer('header'); 
$link_to_page = dol_buildpath('Panier.php', 1);

?>

<section id="mysection1" contenteditable="true">
    <main>
        <header class="site-header site-menu-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-12 mx-auto">
                        <h1 class="text-white">Les produits</h1>
                        <strong class="text-white">Zai Le 1er Fournisseur des solutions Caisses en Tunisie</strong>
                    </div>
                </div>
            </div>
            <div class="overlay"></div>
        </header>

        <section class="menu section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="mb-lg-5 mb-4">Caisses</h2>
                    </div>

                    <?php
                    // Connexion à la base de données
                    global $db;

                    // Requête SQL pour obtenir tous les produits
                    $sql = "SELECT * FROM " . MAIN_DB_PREFIX . "product";
                    $result = $db->query($sql);

                    if ($result) {
                        // Boucle pour afficher chaque produit
                        while ($row = $db->fetch_object($result)) {
                            ?>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="menu-thumb">
                                    <img
                                        src="image/Zai.tn/breakfast/logiciel_caisse_magasin.jpg"
                                        class="img-fluid menu-image"
                                        alt=""
                                    />
                                    <div class="menu-info d-flex flex-wrap align-items-center">
                                        <h4 class="mb-0"><?php echo htmlspecialchars($row->label); ?></h4>
                                        <span class="price-tag bg-white shadow-lg ms-4">
                                            <small><?php echo number_format($row->price, 2, ',', ''); ?> TND</small>
                                        </span>
                                         <a href="<?php echo htmlspecialchars($link_to_page . '?product_id=' . $row->rowid); ?>" class="butAction ms-4">ajouter au panier</a>

                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        echo "<div class='col-12'><p>Aucun produit trouvé.</p></div>";
                    }
                    ?>
                </div>
            </div>
        </section>

        <section class="menu section-padding bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="mb-lg-5 mb-4">Accessoires</h2>
                    </div>

                    <?php
                    // Connexion à la base de données
                    global $db;

                    // Requête SQL pour obtenir tous les produits
                    $sql = "SELECT * FROM " . MAIN_DB_PREFIX . "product";
                    $result = $db->query($sql);

                    if ($result) {
                        // Boucle pour afficher chaque produit
                        while ($row = $db->fetch_object($result)) {
                            ?>
                          <div class="col-lg-6 col-12">
    <div class="menu-thumb">
        <img
            src="image/Zai.tn/lunch/louis-hansel-cH5IPjaAYyo-unsplash.jpg"
            class="img-fluid menu-image"
            alt="<?php echo htmlspecialchars($row->label); ?>"
        />
        <div class="menu-info d-flex flex-wrap align-items-center">
            <h4 class="mb-0"><?php echo htmlspecialchars($row->label); ?></h4>
            <span class="price-tag bg-white shadow-lg ms-4">
                <small><?php echo number_format($row->price, 2, ',', ''); ?> TND</small>
            </span>
            <a href="<?php echo htmlspecialchars($link_to_page . '?product_id=' . $row->rowid); ?>" class="butAction ms-4">ajouter au panier</a>
            <del class="ms-4"><small>$</small>55</del>
        </div>
    </div>
</div>

                            <?php
                        }
                    } else {
                        echo "<div class='col-12'><p>Aucun produit trouvé.</p></div>";
                    }
                    ?>
                </div>
            </div>
        </section>
    </main>
</section>

<?php includeContainer('footer'); ?>

</body>
</html>
<?php // BEGIN PHP
$tmp = ob_get_contents(); ob_end_clean(); dolWebsiteOutput($tmp, "html", 89); dolWebsiteIncrementCounter(9, "page", 89);
// END PHP ?>