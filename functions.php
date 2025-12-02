<?php
function changeView(string $file, array $change){
    $layout = file_get_contents($file);
    $strSplit = '';
        foreach($change as $elem){
            $strSplit .= '<option>' . $elem . '</option>';
        }
    
    $layout = str_replace('{{ change }}', 
        $strSplit, 
        $layout);

    return $layout;
}
    
function selectCategories($connect): array {
    $query = "SELECT * FROM categories"; 
    $res = queryDB($connect, $query);
    $arrCategories = pg_fetch_all($res, PGSQL_ASSOC);

    foreach ($arrCategories as $elem){
        $arrCategoriesName[] = $elem['name'];
    }

    return $arrCategoriesName;
}   