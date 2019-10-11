<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Adresses Controller
 *
 * @property \App\Model\Table\AdressesTable $Adresses
 *
 * @method \App\Model\Entity\Adress[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AdressesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $adresses = $this->paginate($this->Adresses);

        $this->set(compact('adresses'));
    }

    /**
     * View method
     *
     * @param string|null $id Adress id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $adress = $this->Adresses->get($id, [
            'contain' => ['Users', 'Expeditions', 'Files', 'AdressesDescriptions']
        ]);

        $this->set('adress', $adress);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $adress = $this->Adresses->newEntity();
        if ($this->request->is('post')) {
            $adress = $this->Adresses->patchEntity($adress, $this->request->getData());

            $adress->user_id = $this->Auth->user('id');

            if ($this->Adresses->save($adress)) {
                $this->Flash->success(__('The adress has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The adress could not be saved. Please, try again.'));
        }
        $users = $this->Adresses->Users->find('list', ['limit' => 200]);
        $expeditions = $this->Adresses->Expeditions->find('list', ['limit' => 200]);
        $files = $this->Adresses->Files->find('list', ['limit' => 200]);
        $this->set(compact('adress', 'users', 'expeditions', 'files'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Adress id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($slug = null)
    {
        $adress= $this->Adresses
            ->findBySlug($slug)
            ->contain('expeditions') // load associated Tags
            ->firstOrFail();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $adress = $this->Adresses->patchEntity($adress, $this->request->getData(), [
                'accessibleFields' => ['user_id' => false]
            ]);
            if ($this->Adresses->save($adress)) {
                $this->Flash->success(__('The adress has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The adress could not be saved. Please, try again.'));
        }
        $users = $this->Adresses->Users->find('list', ['limit' => 200]);
        $expeditions = $this->Adresses->Expeditions->find('list', ['limit' => 200]);
        $files = $this->Adresses->Files->find('list', ['limit' => 200]);
        $this->set(compact('adress', 'users', 'expeditions', 'files'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Adress id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($slug = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $adress = $this->Adresses->findBySlug($slug)->first();
        if ($this->Adresses->delete($adress)) {
            $this->Flash->success(__('The adress has been deleted.'));
        } else {
            $this->Flash->error(__('The adress could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');
        // Les actions 'add' et 'expeditions' sont toujours autorisés pour les utilisateur
        // authentifiés sur l'application
        if (in_array($action, ['view']) ) {
            return true;
        }else if($this->Auth->user('Status') == 1 && $this->Auth->user('email') == "admin@admin.com"
            && in_array($action, ['add', 'expeditions', 'users','adressesDescriptions', 'files'])){
            return true;
        }else if($this->Auth->user('Status') == 1 && in_array($action, ['add','expeditions'])){
            return true;
        }else if($this->Auth->user('Status') == 0 && in_array($action, ['add'])){
            return true;
        }

        // Toutes les autres actions nécessitent un slug
        $slug = $this->request->getParam('pass.0');
        if (!$slug) {
            return false;
        }

        // On vérifie que l'adresse appartient à l'utilisateur connecté
        if($this->Auth->user('email') != "admin@admin.com"){
            $adress = $this->Adresses->findBySlug($slug)->first();

            return $adress->user_id === $user['id'];
        }else{
            $adress = $this->Adresses->findBySlug($slug)->first();

            return $adress->user_id;
        }

    }



}
