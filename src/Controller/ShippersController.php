<?php
namespace App\Controller;

use App\Controller\AppController;

class ShippersController extends AppController
{
    public function initialize() {
        parent::initialize();
        // Set the layout.
        $this->viewBuilder()->setLayout('monopage');
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


    public function index()
    {
        $shippers = $this->paginate($this->Shippers);

        $this->set(compact('shippers'));
    }

    /**
     * View method
     *
     * @param string|null $id Shipper id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $shipper = $this->Shippers->get($id, [
            'contain' => []
        ]);

        $this->set('shipper', $shipper);
    }


}
