<?php
session_start(); 
if(isset($_SESSION['id']) && $_SESSION['type'] == "pro"){
    include('connexion.php');
    // get infos event

    $getinfos = $bdd->prepare("SELECT website, linkedin, instagram, facebook FROM companies WHERE ID = ?");
    $getinfos->execute(array($_SESSION['orga']));

    $infos = $getinfos->fetch();

    $json['200'] = array($infos['website'], $infos['linkedin'], $infos['instagram'], $infos['facebook']);

    echo json_encode($json);

}
?>