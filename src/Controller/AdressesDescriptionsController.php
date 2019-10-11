<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AdressesDescriptions Controller
 *
 * @property \App\Model\Table\AdressesDescriptionsTable $AdressesDescriptions
 *
 * @method \App\Model\Entity\AdressesDescription[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AdressesDescriptionsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Adresses']
        ];
        $adressesDescriptions = $this->paginate($this->AdressesDescriptions);

        $this->set(compact('adressesDescriptions'));
    }

    /**
     * View method
     *
     * @param string|null $id Adresses Description id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $adressesDescription = $this->AdressesDescriptions->get($id, [
            'contain' => ['Adresses']
        ]);

        $this->set('adressesDescription', $adressesDescription);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $adressesDescription = $this->AdressesDescriptions->newEntity();
        if ($this->request->is('post')) {
            $adressesDescription = $this->AdressesDescriptions->patchEntity($adressesDescription, $this->request->getData());
            if ($this->AdressesDescriptions->save($adressesDescription)) {
                $this->Flash->success(__('The adresses description has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The adresses description could not be saved. Please, try again.'));
        }
        $adresses = $this->AdressesDescriptions->Adresses->find('list', ['limit' => 200]);
        $this->set(compact('adressesDescription', 'adresses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Adresses Description id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $adressesDescription = $this->AdressesDescriptions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $adressesDescription = $this->AdressesDescriptions->patchEntity($adressesDescription, $this->request->getData());
            if ($this->AdressesDescriptions->save($adressesDescription)) {
                $this->Flash->success(__('The adresses description has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The adresses description could not be saved. Please, try again.'));
        }
        $adresses = $this->AdressesDescriptions->Adresses->find('list', ['limit' => 200]);
        $this->set(compact('adressesDescription', 'adresses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Adresses Description id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $adressesDescription = $this->AdressesDescriptions->get($id);
        if ($this->AdressesDescriptions->delete($adressesDescription)) {
            $this->Flash->success(__('The adresses description has been deleted.'));
        } else {
            $this->Flash->error(__('The adresses description could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');
        // Les actions 'add' est toujours autorisé pour les utilisateurs
        // authentifiés sur l'application
        if (in_array($action, ['view'])) {
            return true;
        }else if($this->Auth->user('Status') == 1 && $this->Auth->user('email') == 'admin@admin.com'
            && in_array($action, ['add', 'edit', 'delete'])){
            return true;
        }
        else if($this->Auth->user('Status') == 1 && in_array($action, ['add', 'edit'])){
            return true;
        }else if($this->Auth->user('Status') == 0 && in_array($action, ['view'])){
            return true;
        }

    }


}
