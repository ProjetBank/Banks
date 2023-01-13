<?php

include_once __DIR__ . "/../src/init.php";

$pagecssautre ='';
$pagecss ='';

$page = 'espaceAdmin';
if (isset($_GET['page'])){
    if (in_array($_GET['page'], $pages)){
        $page = $_GET['page'];
    }

}
if ($page == 'accueil'){
    $pagecss = 'accueil';
} elseif ($page == 'espaceAdmin' || $page == 'clientListe' || $page == 'validationUsers' || $page == 'transactions'){
    $pagecss = 'espaceAdmin';
} else {
    $pagecss = 'autre';
}


if ($page == 'accueil'){
    include_once __DIR__ . "/../src/templates/partials/$pagecss/header_".$pagecss.".php";
} elseif ($page == 'login'){

} else {
    include_once __DIR__ . "/../src/templates/partials/$pagecss/header_".$pagecss.".php";
}
include_once __DIR__ . "/../src/templates/pages/$page.php";
include_once __DIR__ . "/../src/templates/template.php";


if ($page == 'accueil'){
    include_once __DIR__ . "/../src/templates/partials/$pagecss/footer_".$pagecss.".php";
    
} elseif ($page == 'login'){
    
}else {
    include_once __DIR__ . "/../src/templates/partials/$pagecss/footer_".$pagecss.".php";
}


?>
