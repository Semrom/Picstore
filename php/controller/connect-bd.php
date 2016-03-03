<?php
  try
  {
    $bdd = new PDO('mysql:host=localhost;dbname=picstore;charset=utf8', 'root', '');
    //$bdd = new PDO('mysql:host=mysql.hostinger.fr;dbname=u765007937_base;charset=utf8', 'u765007937_id', 'ponsestunesalope');
  }
  catch (Exception $e)
  {
    die('Erreur : ' . $e->getMessage());
  }
?>
