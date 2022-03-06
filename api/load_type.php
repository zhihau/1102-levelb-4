<?php

include_once "../base.php";

switch($_POST['type']){
    case 'big':
        $rows=$Type->all(['parent'=>0]);
        break;
    case 'mid':
        $rows=$Type->all(['parent'=>$_POST['parent']]);
        break;
}

$html="";
    foreach($rows as $row){
        // dd($row);
    $html.="<option value='".$row['id']."'>{$row['name']}</option>";
}
echo $html;