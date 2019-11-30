<?php

class Input
{

    public static function getSingleChar()
    {
        $fh = fopen('php://stdin','r') or die($php_errormsg); 
        $message = ''; 
        
        $next_line = fgets($fh, 1024); 
        $message .= $next_line;
        return $message; 
    }
    
}