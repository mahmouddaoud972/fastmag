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
<title>facture</title>
<meta charset="utf-8">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="robots" content="index, follow" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="keywords" content="" />
<meta name="title" content="facture" />
<meta name="description" content="facture" />
<meta name="generator" content="Dolibarr 19.0.2 (https://www.dolibarr.org)" />
<meta name="dolibarr:pageid" content="80" />
<?php if ($website->use_manifest) { print '<link rel="manifest" href="/manifest.json.php" />'."\n"; } ?>
<!-- Include link to CSS file -->
<link rel="stylesheet" href="/styles.css.php?website=<?php echo $websitekey; ?>" type="text/css" />
<!-- Include link to JS file -->
<script nonce="08808a3a" async src="/javascript.js.php?website=<?php echo $websitekey; ?>"></script>
<!-- Include HTML header from common file -->
<?php if (file_exists(DOL_DATA_ROOT."/website/".$websitekey."/htmlheader.html")) include DOL_DATA_ROOT."/website/".$websitekey."/htmlheader.html"; ?>
<!-- Include HTML header from page header block -->

</head>
<!-- File generated by Dolibarr website module editor -->
<body id="bodywebsite" class="bodywebsite bodywebpage-facture">
<?php
// Résoudre le chemin absolu vers main.inc.php
$main_inc_path = $_SERVER['DOCUMENT_ROOT'] . '/main.inc.php';

// Inclure le fichier de Dolibarr
require_once $main_inc_path;

session_start();
if (!isset($_SESSION['valid'])) {
    include 'login.php';
    exit;
}

// Connexion à la base de données Dolibarr
global $db;

if ($db) {
    // Récupérer l'ID de la société connectée
    $societe_id = $_SESSION['id'];

    // Initialisation des variables de recherche
    $ref = isset($_GET['ref']) ? $_GET['ref'] : '';
    $datec = isset($_GET['datec']) ? $_GET['datec'] : '';
    $date_lim_reglement = isset($_GET['date_lim_reglement']) ? $_GET['date_lim_reglement'] : '';
    $filter_statut = isset($_GET['filter-statut']) ? $_GET['filter-statut'] : ''; // Filtre statut

    // Requête SQL pour obtenir la somme totale des total_ht des factures de la société connectée
    $query_total_ht = "SELECT SUM(total_ht) AS total_ht_sum FROM " . MAIN_DB_PREFIX . "facture WHERE fk_soc = " . intval($societe_id);
    $result_total_ht = $db->query($query_total_ht);
    $total_ht_sum = 0;

    if ($result_total_ht) {
        $row_total_ht = $db->fetch_object($result_total_ht);
        if ($row_total_ht) {
            $total_ht_sum = $row_total_ht->total_ht_sum;
        }
    }

    // Requête SQL initiale pour récupérer les factures et les montants payés
    $sql = "SELECT f.rowid AS facture_id, 
               f.ref, 
               f.datec, 
               f.date_lim_reglement, 
               f.total_ht, 
               f.total_tva, 
               f.total_ttc, 
               f.multicurrency_total_ttc, 
               f.fk_statut, 
               f.type, 
               f.paye, 
               (SELECT SUM(pf.amount) 
                FROM " . MAIN_DB_PREFIX . "paiement_facture pf 
                WHERE pf.fk_facture = f.rowid) AS total_amount_recu
        FROM " . MAIN_DB_PREFIX . "facture f
        WHERE f.fk_soc = " . intval($societe_id) . "
          AND f.type != 3 AND f.fk_statut !=0";
          /* $sql = "SELECT f.rowid AS facture_id, f.ref, f.datec, f.date_lim_reglement, f.total_ht, f.total_tva, f.total_ttc, f.multicurrency_total_ttc, f.fk_statut, f.type, f.paye, 
                   (SELECT SUM(pf.amount) FROM " . MAIN_DB_PREFIX . "paiement_facture pf WHERE pf.fk_facture = f.rowid) AS total_amount_recu
            FROM " . MAIN_DB_PREFIX . "facture f
            WHERE f.fk_soc = " . intval($societe_id); */

    
    // Ajouter les critères de recherche selon les paramètres fournis
    if (!empty($ref)) {
        $sql .= " AND f.ref LIKE '%" . $db->escape($ref) . "%'";
    }
    if (!empty($datec)) {
        $sql .= " AND f.datec = '" . $db->escape($datec) . "'";
    }
    if (!empty($date_lim_reglement)) {
        $sql .= " AND f.date_lim_reglement = '" . $db->escape($date_lim_reglement) . "'";
    }
    if (!empty($filter_statut)) {
        if ($filter_statut == '1') {
            $sql .= " AND f.fk_statut = 1 AND f.paye = 0 AND f.type = 0 AND (SELECT SUM(pf.amount) FROM " . MAIN_DB_PREFIX . "paiement_facture pf WHERE pf.fk_facture = f.rowid) = 0";
        } elseif ($filter_statut == '2') {
            $sql .= " AND f.fk_statut = 1 AND f.paye = 0 AND f.type = 0";
        } elseif ($filter_statut == '3') {
            $sql .= " AND f.fk_statut = 2 AND f.paye = 1 AND f.type = 2";
        } elseif ($filter_statut == '4') {
            $sql .= " AND f.fk_statut = 2 AND f.paye = 1 AND f.type = 3";
        } elseif ($filter_statut == '5') {
            $sql .= " AND NOT (f.fk_statut = 1 AND f.paye = 0 AND f.type = 0 AND (SELECT SUM(pf.amount) FROM " . MAIN_DB_PREFIX . "paiement_facture pf WHERE pf.fk_facture = f.rowid) = 0)
                      AND NOT (f.fk_statut = 1 AND f.paye = 0 AND f.type = 0)
                      AND NOT (f.fk_statut = 2 AND f.paye = 1 AND f.type = 2)
                      AND NOT (f.fk_statut = 2 AND f.paye = 1 AND f.type = 3)";
        }
    }

    // Exécuter la requête SQL
    $result = $db->query($sql);
} else {
    echo "Erreur de connexion à la base de données";
    exit;
}

$link_to_page_imp = dol_buildpath('Detailsfacture.php', 1);
$link_to_page = dol_buildpath('public/website/index.php', 1) . '?website=ebusinessTester1&pageref=facture';
?>

<?php includeContainer('header'); ?>
<?php includeContainer('aside_bar'); ?>
<section id="mysection1" contenteditable="true">
    <main>
        <div class="ccontainer">
            <div class="table-container">
                <table class="oorder-table">
                    <thead>
                        <tr>
                            <th>N° DE FACTURE</th>
                            <th>DATE facturation</th>
                            <th>Date échéance</th>
                            <th>mode de règlement</th>
                            <th>MONTANT HT</th>
                            <th>MONTANT TVA</th>
                            <th>MONTANT TTC</th>
                            <th>reçu</th>
                            <th>créance</th>
                            
                            <style>
                                .filter-statut {
                                    position: absolute;
                                    top: 0;
                                    width: 100%;
                                    height: 80%;
                                    left: 10px;
                                    font-size: 14px;
                                }
                                
                                #filter-statut {
                                    opacity: 0;
                                    height: 100%;
                                    width: 100%;
                                    padding: 10px;
                                    cursor: pointer;
                                }
                                
                                .box-filter {
                                    display: flex;
                                    align-items: center;
                                }
                                
                            </style>
                            
                            <th style="position: relative;">
                                <div class="filter-statut">
                                    <form action="<?php echo htmlspecialchars($link_to_page); ?>" method="get">
                                        <input type="hidden" name="website" value="ebusinessTester1">
                                        <input type="hidden" name="pageref" value="facture">
                                        <label></i></label>
                                        <select name="filter-statut" id="filter-statut" onchange="this.form.submit()">
                                            <option value="" <?php if ($filter_statut == '') echo 'selected'; ?>>Tout</option>
                                            <option value="1" <?php if ($filter_statut == '1') echo 'selected'; ?>>Commencée</option>
                                            <option value="2" <?php if ($filter_statut == '2') echo 'selected'; ?>>Impayée</option>
                                            <option value="3" <?php if ($filter_statut == '3') echo 'selected'; ?>>Remboursé</option>
                                            <option value="4" <?php if ($filter_statut == '4') echo 'selected'; ?>>Payé</option>
                                            <option value="5" <?php if ($filter_statut == '5') echo 'selected'; ?>>Autre</option>
                                        </select>
                                    </form>
                                </div>
                                <span class="box-filter">
                                    STATUT<i class='bx bx-filter' style="margin-left: 4px;"></i>
                                </span>
                            </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Initialisation des totaux
                        $total_ht_sum = 0;
                        $total_tva_sum = 0;
                        $total_ttc_sum = 0;
                        $total_recu_sum = 0;
                        $total_creance_sum = 0;

                        if ($result) {
                            while ($row = $db->fetch_object($result)) {
                                // Calcul de la créance
                                $creance = $row->total_ttc - $row->total_amount_recu;

                                // Ajouter les valeurs aux totaux
                                $total_ht_sum += $row->total_ht;
                                $total_tva_sum += $row->total_tva;
                                $total_ttc_sum += $row->total_ttc;
                                $total_recu_sum += $row->total_amount_recu;
                                $total_creance_sum += $creance;

                                echo "<tr>";
                                echo "<td>{$row->ref}</td>";
                                echo "<td>" . date("d/m/Y", strtotime($row->datec)) . "</td>";
                                echo "<td>" . date("d/m/Y", strtotime($row->date_lim_reglement)) . "</td>";
                                echo "<td></td>";
                                echo "<td>" . number_format($row->total_ht, 3, ',', ' ') . " TND</td>";
                                echo "<td>" . number_format($row->total_tva, 3, ',', ' ') . " TND</td>";
                                echo "<td>" . number_format($row->total_ttc, 3, ',', ' ') . " TND</td>";
                                echo "<td>" . number_format($row->total_amount_recu, 3, ',', ' ') . " TND</td>";
                                echo "<td>" . number_format($creance, 3, ',', ' ') . " TND</td>";

                                // Affichage du statut en fonction de la valeur de fk_statut
                                if ($row->fk_statut == 1 && $row->paye == 0 && $row->type == 0 && $row->total_amount_recu == 0) {
                                    echo "<td>impayée</td>";
                                    
                                } elseif ($row->fk_statut == 1 && $row->paye == 0 && $row->type == 0) {
                                    echo "<td>Commencée</td>";
                                    
                                } elseif ($row->fk_statut == 2 && $row->paye == 1 && $row->type == 2) {
                                    echo "<td>Remboursé</td>";
                                } elseif ($row->fk_statut == 2 && $row->paye == 1 && $row->type == 3) {
                                    echo "<td>Payé</td>";
                                } else {
                                    echo "<td>Autre</td>"; // Gérer les autres cas si nécessaire
                                }

                                echo "<td><a href=\"" . htmlspecialchars($link_to_page_imp . '?facture_id=' . $row->facture_id) . "\" class=\"aaction-btn\">Imprimer</a></td>";
                                echo "</tr>";
                            }
                            $db->free($result);
                        } else {
                            echo "<tr><td colspan='12'>Aucune Facture trouvée</td></tr>"; // Modifié pour correspondre au nombre de colonnes
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4"><strong>Total</strong></td>
                            <td><strong><?php echo number_format($total_ht_sum, 3, ',', ' ') . " TND"; ?></strong></td>
                            <td><strong><?php echo number_format($total_tva_sum, 3, ',', ' '); ?></strong></td>
                            <td><strong><?php echo number_format($total_ttc_sum, 3, ',', ' ') . " TND"; ?></strong></td>
                            <td><strong><?php echo number_format($total_recu_sum, 3, ',', ' ') . " TND"; ?></strong></td>
                            <td><strong><?php echo number_format($total_creance_sum, 3, ',', ' ') . " TND"; ?></strong></td>
                            <td colspan="3"></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </main>
</section>

</body>
</html>
<?php // BEGIN PHP
$tmp = ob_get_contents(); ob_end_clean(); dolWebsiteOutput($tmp, "html", 80); dolWebsiteIncrementCounter(9, "page", 80);
// END PHP ?>
