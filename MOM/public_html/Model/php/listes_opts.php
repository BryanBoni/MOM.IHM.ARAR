<?php

$tb_villes = array();
$tb_ids_villes = array();
$tb_regions = array();
$tb_ids_regions = array();
$tb_pays = array();
$tb_ids_pays = array();
$tb_sites = array();
$tb_ids_sites = array();
$tb_nature = array();
$tb_id_nature = array();
$tb_nature_material = array();
$tb_id_nature_material = array();
$tb_part_object = array();
$tb_id_waster = array();
$tb_waster = array();
$tb_id_firing_mode = array();
$tb_firing_mode = array();
$tb_local_users = array();
$tb_id_local_users = array();
$tb_atelier = array();
$tb_id_atelier = array();

$req_sites = "SELECT * FROM site ORDER BY name_site";
$req_villes = "SELECT * FROM town ORDER BY name_town";
$req_regions = "SELECT * FROM region ORDER BY name_region";
$req_pays = "SELECT * FROM country ORDER BY name_country";
$req_nature = "SELECT * FROM nature ORDER BY options";
$req_nature_material = "SELECT * FROM nature_material ORDER BY options";
$req_part_object = "SELECT * FROM part_object ORDER BY options";
$req_waster = "SELECT * FROM waster ORDER BY options";
$req_firing_mode = "SELECT * FROM firing_mode ORDER BY options";
$req_local_users = "SELECT * FROM local_user ORDER BY pseudo";
$req_atelier = "SELECT * FROM atelier";

$streq_nature = $pdodb->prepare($req_nature);
$streq_nature_material = $pdodb->prepare($req_nature_material);

$streq_sites = $pdodb->prepare($req_sites);
$streq_villes = $pdodb->prepare($req_villes);
$streq_regions = $pdodb->prepare($req_regions);
$streq_pays = $pdodb->prepare($req_pays);
$streq_part_object = $pdodb->prepare($req_part_object);
$streq_waster = $pdodb->prepare($req_waster);
$streq_firing_mode = $pdodb->prepare($req_firing_mode);
$streq_local_users = $pdodb->prepare($req_local_users);
$streq_atelier = $pdodb->prepare($req_atelier);