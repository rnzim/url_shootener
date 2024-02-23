<?php

//Checa A Url
function urlCheck($url){
    // Todos os caracteres que são possíveis em uma URL
    $map = "! # $ % & ( ) * + , / : ; = ? @ [ ] a b c d e f g h i j k l m n o p q r s t u v w x y z A B C D E F G H I J K L M N O P Q R S T U V W X Y Z 0 1 2 3 4 5 6 7 8 9 - . _ ~";
    $mapArray = explode(' ', $map);
    $count = 1;

    // Verifica se todos os caracteres da URL estão no mapa de caracteres
    foreach ($mapArray as $l) {
        if (!empty($l) && substr_count($url, $l) !== false) {
            $count += substr_count($url, $l);
        }
    }

    // Se estiver de acordo com os padrões, retorna verdadeiro
    if ($count == strlen($url)) {
        return true;
    } else {
        return false;
    }
}

//Remove Caracteres Perigosos Pro Banco De Dados
function sqlInjectionRemove($sql){
      $dangerous_chars = array("'", '"', ";", "--", "/*", "*/", "#", "%", "\x00", "\x0A", "\x0D", "\x2D", "\x2F", "\x5C", "\x26", "\x3B", "\x3C", "\x3E", "\x28", "\x29", "\x25", "\x3F");

      // Substitui os caracteres potencialmente perigosos por uma string vazia
      $sanitized_string = str_replace($dangerous_chars, '', $sql);

      return $sanitized_string;
      
}


?>