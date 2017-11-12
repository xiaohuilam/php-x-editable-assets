<?php

namespace Editable\Assets\Install;

use Composer\Script\Event;
use Composer\Installer\PackageEvent;

class Bash {
    public static function postAutoloadDump(Event $event) {

        $vendorDir  = $event->getComposer()->getConfig()->get('vendor-dir').'/../../../';
        $root_dir   = $vendorDir . '/../';
        $public_dir = $root_dir;

        require $vendorDir . '/autoload.php';

        # 常见框架 设置不同的public_dir
        if(class_exists('\\Illuminate\\Http\\Request')) {
            $public .= 'public/';
        }else if(class_exists('\\think\\Request')) {
            $public .= 'public/';
        }else {
            $public = realpath($root_dir).'/';
            echo PHP_EOL;
            echo 'Warning: You are using an unknow framework, We are going to publish "x-editable-assets" dir into '.$public;
            echo PHP_EOL;
            echo PHP_EOL;
            echo 'If it is not the right diretory, please manually run command:';
            echo PHP_EOL;
            echo 'cp -R ./vendor/diana/php-x-editable-assets/assets/ #REPLACE_YOUR_WEB_DIR#';
            echo PHP_EOL;
        }

        if($public) {
            try{
                self::cp($vendorDir.'/diana/php-x-editable-assets/assets/', $public);
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