


<?php


$pages = ['accueil' , 'login'];

$page ='accueil';
if (isset($_GET['page'])){
    if (in_array($_GET['page'], $pages)){
        $page = $_GET['page'];
    }

}

if ($page == 'accueil'){
    include_once __DIR__ . "/../src/templates/partials/$page/header_accueil.php";
} elseif ($page == 'login'){

} else {
    include_once __DIR__ . "/../src/templates/partials/header.php";
}
include_once __DIR__ . "/../src/templates/pages/$page.php";
include_once __DIR__ . "/../src/templates/template.php";


if ($page == 'accueil'){
    include_once __DIR__ . "/../src/templates/partials/$page/footer_accueil.php";
    
} elseif ($page == 'login'){
    
}else {
    include_once __DIR__ . "/../src/templates/partials/footer.php";
}

?>
