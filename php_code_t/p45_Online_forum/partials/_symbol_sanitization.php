<?php
    function replaceString($str){ // try to handle xss attack , but we have many more symbols ( it call sanitization of symbols )
            $str=str_replace(">","&gt;",$str);//html entity names
            $str=str_replace("<","&lt;",$str);
            $str=str_replace("'","&prime;",$str);
            $str=str_replace('"',"&Prime;",$str);
            $str=str_replace("/","&frasl;",$str);
            $str=str_replace("&","&amp;",$str);
            return $str;
        }

        function str_desalinization($str){ // try to handle xss attack , but we have many more symbols ( it call sanitization of symbols )
            $str=str_replace("&gt;",">",$str);//html entity names
            $str=str_replace("&lt;","<",$str);
            $str=str_replace("&prime;","'",$str);
            $str=str_replace("&Prime;",'"',$str);
            $str=str_replace("&frasl;","/",$str);
            $str=str_replace("&amp;","&",$str);
            return $str;
        }
?>