<?php
require("../_config.php");
require("../lib/fun_varclean.php");
// require("../lib/fun_varclean.php");

function LOGIN_validate($IdUser, $password) {
    require("../_config.php");
    // require("../lib/alerts.php");

    $IdUser = VarClean($IdUser);
    $password = VarClean($password);

    $sql = "SELECT count(*) as u FROM usuarios WHERE iduser='".$IdUser."' AND password='".$password."' AND disable=0";
    // echo $sql;
    $r= $db-> query($sql);
    if($f = $r -> fetch_array())
    {
        if ($f['u']>0){
            return TRUE;
        } else {
            return FALSE;
        }
        
    } else {
        return FALSE;
    }
}

?>