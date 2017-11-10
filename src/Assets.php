<?php
namespace Editable\Assets;

use Editable\Integrates\EditableException;

class Assets implements \Editable\Assets\Interfaces\EditableAssetsInterface{
    protected $vendor_assets = [
        'text'          => ['css' => [], 'js' => []],
        'select'        => ['css' => [], 'js' => []],
        'checklist'     => ['css' => [], 'js' => []],
        'textarea'      => ['css' => [], 'js' => []],
        'date'          => [
            'css' => [], 
            'js' => [
                '/x-editable-assets/moment/moment@2.19.1/min/moment.min.js',
            ]
        ],
        'datetime'      => [
            'css' => [], 
            'js' => [
                '/x-editable-assets/moment/moment@2.19.1/min/moment.min.js',
            ]
        ],
        'typeaheadjs'     => [
            'css'   => [
                '/x-editable-assets/vitalets/x-editable@1.5.1/dist/inputs-ext/typeaheadjs/lib/typeahead.js-bootstrap.min.css',
            ],
            'js'    => [
                '/x-editable-assets/vitalets/x-editable@1.5.1/dist/inputs-ext/typeaheadjs/lib/typeahead.min.js',
                '/x-editable-assets/vitalets/x-editable@1.5.1/dist/inputs-ext/typeaheadjs/typeaheadjs.min.js'
            ],
        ],
        'tag'           => [
            'css'   => [
                '/x-editable-assets/xiaohuilam/x-editable@9.8.1/assets/select2/select2.css',
                '/x-editable-assets/xiaohuilam/x-editable@9.8.1/assets/select2/select2-bootstrap.css',
            ],
            'js'    => [
                '/x-editable-assets/xiaohuilam/x-editable@9.8.1/assets/select2/select2.js',
            ],
        ],
        'wysiwyg'       => [
            'css'   => [
                '/x-editable-assets/xiaohuilam/x-editable@9.8.1/assets/x-editable/inputs-ext/wysihtml5/bootstrap-wysihtml5-0.0.3/bootstrap-wysihtml5-0.0.3.min.css',
            ],
            'js'    => [
                '/x-editable-assets/xiaohuilam/x-editable@9.8.1/assets/x-editable/inputs-ext/wysihtml5/bootstrap-wysihtml5-0.0.3/wysihtml5-0.3.0.min.js',
                '/x-editable-assets/xiaohuilam/x-editable@9.8.1/assets/x-editable/inputs-ext/wysihtml5/bootstrap-wysihtml5-0.0.3/bootstrap-wysihtml5-0.0.3.min.js',
                '/x-editable-assets/xiaohuilam/x-editable@9.8.1/assets/x-editable/inputs-ext/wysihtml5/wysihtml5-0.0.3.js',
            ],
        ]
    ];

    /**
     * 实例化
     *
     * @return static
     */
    public static function instance() {
    	return new static();
    }

    /**
     * 获取资源地址
     * @return array
     */
    public function getVendorAssetsRoutingUrl() {
        throw new EditableException('Please override '.__FUNCTION__);
    }
}