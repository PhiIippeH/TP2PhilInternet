<?php

namespace App\Controller\api;

use App\Controller\api\AppController;

class ShippersController extends AppController {

    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['add', 'index','view','edit']);
    }


    public $paginate = [
        'page' => 1,
        'limit' => 100,
        'maxLimit' => 150,
/*        'fields' => [
            'id', 'name', 'description'
        ],
*/        'sortWhitelist' => [
            'shipper_id', 'company_name', 'phone'
        ]
    ];

}
