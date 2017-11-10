<?php
namespace Editable\Assets\Interfaces;

interface EditableAssetsInterface{
    /**
     * 实例化
     *
     * @return self
     */
    public static function instance();

    /**
     * 获取资源地址
     * @return array
     */
    public function getVendorAssetsRoutingUrl();
}