<?php

//print_r($_POST);
//print_r($_FILES);

$sortie = print_r($_FILES, TRUE);

$fp = fopen('/home/charly/public_html/brouillon/espion2.txt', 'w');
fwrite($fp, "$sortie\n\n\n");
foreach ($_FILES as $key => $value) {
    if (is_array($value)) {
        fwrite($fp, "dans la branche array, la cle : $key\n");
        foreach ($value as $key1 => $value1)
            fwrite($fp, "$key1 => $value1\n");
    } else {
        fwrite($fp, "dans la branche directe\n");
        fwrite($fp, "$key => $value\n");
    }
}

fclose($fp);


foreach ($_FILES as $key => $value) {
    $nom = $_FILES[$key]['name'];
    if (is_uploaded_file($_FILES[$key]['tmp_name']))
        move_uploaded_file($_FILES[$key]['tmp_name'], 'lesimages/' . $nom);
    else {
        $fp = fopen('/home/charly/public_html/brouillon/espion2.txt', 'w');
        fwrite($fp, "ça n'a pas marché");
        fclose($fp);
    }
}

/*
  if(is_uploaded_file($_FILES['userfile']['tmp_name']))
  move_uploaded_file($_FILES['userfile']['tmp_name'], 'lesimages/toto.jpg');
  else
  {
  $fp = fopen('/home/charly/public_html/brouillon/espion2.txt', 'w');
  fwrite($fp, "ça n'a pas marché");
  fclose($fp);
  }
 */
?>