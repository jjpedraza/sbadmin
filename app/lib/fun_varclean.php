<?php


// FUNCIONES PARA MEJORAR LA SEGURIDAD
function ValidaVAR($valor){
    $output = TRUE;
    $peligro = "SCRIPT"; if(preg_match('/'.$peligro.'/i', $valor)){ $output = FALSE; } 
    $peligro = "<"; if(preg_match('/'.$peligro.'/i', $valor)){ $output = FALSE; } 
    $peligro = "script"; if(preg_match('/'.$peligro.'/i', $valor)){ $output = FALSE; } 
    $peligro = ">"; if(preg_match('/'.$peligro.'/i', $valor)){ $output = FALSE; } 
    $peligro = "SELECT"; if(preg_match('/'.$peligro.'/i', $valor)){ $output = FALSE; } 
    $peligro = "COPY"; if(preg_match('/'.$peligro.'/i', $valor)){ $output = FALSE; } 
    $peligro = "DROP"; if(preg_match('/'.$peligro.'/i', $valor)){ $output = FALSE; } 
    $peligro = "DUMP"; if(preg_match('/'.$peligro.'/i', $valor)){ $output = FALSE; } 
    // $peligro = "OR"; if(preg_match('/'.$peligro.'/i', $valor)){ $output = FALSE; } 
    $peligro = "LIKE"; if(preg_match('/'.$peligro.'/i', $valor)){ $output = FALSE; } 
    $peligro = "'"; if(preg_match('/'.$peligro.'/i', $valor)){ $output = FALSE; } 
    $peligro = "\""; if(preg_match('/'.$peligro.'/i', $valor)){ $output = FALSE; } 

    return $output;
}

function LimpiarVAR($valor){
    $output = LimpiarVAR_FrontEnd($valor);
	$output = LimpiarVAR_BackEnd($valor);
	$output =  LimpiarComillas($valor);
    return $output;
}

        

function LimpiarComillas($valor)
{
	
	$valor = addslashes($valor);     
	$valor = str_ireplace("'","",$valor);
	$valor = str_ireplace('"',"",$valor);
	$valor = str_ireplace("'","",$valor);
	$valor = str_ireplace('"',"",$valor);
	$valor = str_ireplace("'","",$valor);
	$valor = str_ireplace('"',"",$valor);
	$valor = str_ireplace("'","",$valor);
	$valor = str_ireplace('"',"",$valor);
	$valor = str_ireplace("'","",$valor);
	$valor = str_ireplace('"',"",$valor);
	$valor = str_ireplace("'","",$valor);
	$valor = str_ireplace('"',"",$valor);
	$valor = str_ireplace("'","",$valor);
	$valor = str_ireplace('"',"",$valor);
	$valor = str_ireplace("'","",$valor);
	$valor = str_ireplace('"',"",$valor);
	$valor = str_ireplace("'","",$valor);
	$valor = str_ireplace('"',"",$valor);
	$valor = str_ireplace("'","",$valor);
	$valor = str_ireplace('"',"",$valor);
	$valor = str_ireplace("'","",$valor);
	$valor = str_ireplace('"',"",$valor);
	$valor = str_ireplace("'","",$valor);
	$valor = str_ireplace('"',"",$valor);
	$valor = str_ireplace("'","",$valor);
	$valor = str_ireplace('"',"",$valor);
	$valor = str_ireplace("'","",$valor);
	$valor = str_ireplace('"',"",$valor);
	$valor = str_ireplace("'","",$valor);
	$valor = str_ireplace('"',"",$valor);
	
	
	return $valor;
}


function LimpiarVAR_BackEnd($valor)
{
    
    $valor = addslashes($valor);     
    $valor = str_ireplace("SELECT","",$valor);
    $valor = str_ireplace("COPY","",$valor);
    $valor = str_ireplace("DELETE","",$valor);
    $valor = str_ireplace("DROP","",$valor);
    $valor = str_ireplace("DUMP","",$valor);
    // $valor = str_ireplace(" OR ","",$valor);
    $valor = str_ireplace("%","",$valor);
    $valor = str_ireplace("LIKE","",$valor);
    $valor = str_ireplace("--","",$valor);
    $valor = str_ireplace("^","",$valor);
    $valor = str_ireplace("[","",$valor);
    $valor = str_ireplace("]","",$valor);	
    $valor = str_ireplace("!","",$valor);
    $valor = str_ireplace("¡","",$valor);
    $valor = str_ireplace("?","",$valor);
    $valor = str_ireplace("=","",$valor);
    $valor = str_ireplace("&","",$valor);
    $valor = str_ireplace("<SCRIPT>","",$valor);
    $valor = str_ireplace("<script>","",$valor);
    $valor = str_ireplace(">","",$valor);
    $valor = str_ireplace("<","",$valor);
    
    return $valor;
}


function LimpiarVAR_FrontEnd($input) {
    
    $search = array(
    '@<script[^>]*?>.*?</script>@si',   // Elimina javascript
    '@<[\/\!]*?[^<>]*?>@si',            // Elimina las etiquetas HTML
    '@<style[^>]*?>.*?</style>@siU',    // Elimina las etiquetas de estilo
    '@<![\s\S]*?--[ \t\n\r]*>@'         // Elimina los comentarios multi-línea
    );
    
    $output = preg_replace($search, '', $input);
    return $output;
    }
    
function sanitize($input) {
    if (is_array($input)) {
        foreach($input as $var=>$val) {
            $output[$var] = sanitize($val);
        }
    }
    else {
        if (get_magic_quotes_gpc()) {
            $input = stripslashes($input);
        }
        $input  = cleanInput($input);
        $output = mysql_real_escape_string($input);
    }
    return $output;
}
	
function VarClean($var){    
    if (ValidaVAR($var)==TRUE){
        $var = LimpiarVAR($var);
        return $var;
    } else {
        return "";
    }

}
?>