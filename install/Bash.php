<?php

namespace Editable\Assets\Install;

use Composer\Script\Event;
use Composer\Installer\PackageEvent;

class Bash {
    public static function postAutoloadDump(Event $event) {

        $vendorDir  = $event->getComposer()->getConfig()->get('vendor-dir');
        $root_dir   = $vendorDir . '/../';
        $public_dir = $root_dir;

        require $vendorDir . '/autoload.php';

        # 常见框架 设置不同的public_dir
        if(class_exists('\\Illuminate\\Http\\Request')) {
            $public .= 'public/';
        }else if(class_exists('\\think\\Request')) {
            $public .= 'public/';
        }else {
            $public = null;
            echo PHP_EOL;
            echo <<<CLI
8b        d8          88888888888          88  88                       88           88                             db                                                               
 Y8,    ,8P           88                   88  ""    ,d                 88           88                            d88b                                            ,d                
  `8b  d8'            88                   88        88                 88           88                           d8'`8b                                           88                
    Y88P              88aaaaa      ,adPPYb,88  88  MM88MMM  ,adPPYYba,  88,dPPYba,   88   ,adPPYba,              d8'  `8b      ,adPPYba,  ,adPPYba,   ,adPPYba,  MM88MMM  ,adPPYba,  
    d88b    aaaaaaaa  88"""""     a8"    `Y88  88    88     ""     `Y8  88P'    "8a  88  a8P_____88  aaaaaaaa   d8YaaaaY8b     I8[    ""  I8[    ""  a8P_____88    88     I8[    ""  
  ,8P  Y8,  """"""""  88          8b       88  88    88     ,adPPPPP88  88       d8  88  8PP"""""""  """"""""  d8""""""""8b     `"Y8ba,    `"Y8ba,   8PP"""""""    88      `"Y8ba,   
 d8'    `8b           88          "8a,   ,d88  88    88,    88,    ,88  88b,   ,a8"  88  "8b,   ,aa           d8'        `8b   aa    ]8I  aa    ]8I  "8b,   ,aa    88,    aa    ]8I  
8P        Y8          88888888888  `"8bbdP"Y8  88    "Y888  `"8bbdP"Y8  8Y"Ybbd8"'   88   `"Ybbd8"'          d8'          `8b  `"YbbdP"'  `"YbbdP"'   `"Ybbd8"'    "Y888  `"YbbdP"'  
CLI;
            echo PHP_EOL.PHP_EOL.PHP_EOL;
            echo 'Warning: You are using an unknow framework so X-Editable-Assets unable to allocate your web public dir please publish css js files with following command:';
            echo PHP_EOL;
            echo 'cp -R ./vendor/diana/php-x-editable-assets/assets/ #REPLACE_YOUR_WEB_DIR#';
            echo PHP_EOL;
        }

        $public = $root_dir.'/  aaaa';

        if($public) {
            try{
                self::cp($vendorDir.'/diana/php-x-editable-assets/assets/', $public);
                echo 'Assets publish success!';
                echo PHP_EOL;
            }catch(\Exception $e){
                echo 'Assets publish fail!' . $e->getMessage();
                echo PHP_EOL;
            }
        }
    }

    protected static function cp($src,$dst) { 
        $dir = opendir($src); 
        @mkdir($dst); 
        while(false !== ( $file = readdir($dir)) ) { 
            if (( $file != '.' ) && ( $file != '..' )) { 
                if ( is_dir($src . '/' . $file) ) { 
                    self::cp($src . '/' . $file,$dst . '/' . $file); 
                } 
                else { 
                    copy($src . '/' . $file,$dst . '/' . $file); 
                } 
            } 
        } 
        closedir($dir); 
    } 
}