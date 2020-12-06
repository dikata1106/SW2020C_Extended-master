<?php

session_start();

if (isset($_SESSION['correo'])) {
    if ($_SESSION['correo'] == "admin@ehu.es") {
        echo
            "<script> 
					alert('Debes de iniciar sesion como usuario');
                    window.location.href='Layout.php';
				</script>";
    } else {
// if (isset($_REQUEST['logInMail'])) {
   //     $logInMail = $_REQUEST['logInMail'];
   $xml = simplexml_load_file("../xml/Questions.xml");
   $count = 0;
   $countTot = 0;
   foreach ($xml->children() as $assessmentItem){
       $atributos = $assessmentItem->attributes();
       if ($atributos['author'] == /*$logInMail*/$_SESSION['correo']){ $count = $count + 1;}
       $countTot = $countTot + 1;
   }
   echo $countTot." / ".$count;
// }
    }
} else {
    echo
        "<script> 
      alert('Debes de iniciar sesion como usuario');
      window.location.href = 'Layout.php';
    </script>";
}

   
?>
