<?php

namespace MailReplace;

/**
 * Replaces information from email template
 */
class MailReplace {

    /**
     * Making changes within a string
     * 
     * @param string $mail
     * @param array $data
     * 
     * @return string
     */
    public static function replace (string $mail, array $data) :string
    {

        if (is_file ($mail)){
            $mail_data = self::openFile ($mail);
        }else {
            $mail_data = $mail;
        }

        foreach ($data as $key => $value){
            $search [] = $key;
            $replace [] = $value;
        }

        return str_replace ($search, $replace, $mail_data);

    }

    public static function replaceToFile (string $file, string $mail, array $data)
    {
        $data_replaced = self::replace ($mail, $data);
        return self::writeFile ($file, $data_replaced);
    }

    /**
     * Open a file and get its information
     * 
     * @param string $file
     * 
     * @return string
     */
    public static function openFile (string $file) :string
    {
        
        $open = fopen ($file, 'r');
        $data = '';

        while ($part = fread ($open, 1024))
        {
            $data .= $part;
        }

        fclose ($open);

        return $data;

    }
    
    /**
     * Write data to a file
     * 
     * @param string $file
     * @param string $data
     * 
     * @return bool
     */
    public static function writeFile (string $file, string $data) :bool
    {
        
        $open = fopen ($file, 'w');
        $status = (fwrite ($open, $data) !== false);
        fclose ($open);

        return $status;
    }

}