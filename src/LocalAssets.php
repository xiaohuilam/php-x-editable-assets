<?php
namespace Editable\Assets;

class LocalAssets extends Assets{

    /**
     * 获取资源地址
     * @return array
     */
    public function getVendorAssetsRoutingUrl() {
        return $this->vendor_assets;
    }
}