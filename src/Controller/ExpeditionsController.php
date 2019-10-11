<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Expeditions Controller
 *
 * @property \App\Model\Table\ExpeditionsTable $Expeditions
 *
 * @method \App\Model\Entity\Expedition[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ExpeditionsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $expeditions = $this->paginate($this->Expeditions);

        $this->set(compact('expeditions'));
    }

    /**
     * View method
     *
     * @param string|null $id Expedition id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $expedition = $this->Expeditions->get($id, [
            'contain' => ['Adresses']
        ]);

        $this->set('expedition', $expedition);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $expedition = $this->Expeditions->newEntity();
        if ($this->request->is('post')) {
            $expedition = $this->Expeditions->patchEntity($expedition, $this->request->getData());
            if ($this->Expeditions->save($expedition)) {
                $this->Flash->success(__('The expedition has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The expedition could not be saved. Please, try again.'));
        }
        $adresses = $this->Expeditions->Adresses->find('list', ['limit' => 200]);
        $this->set(compact('expedition', 'adresses'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Expedition id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $expedition = $this->Expeditions->get($id, [
            'contain' => ['Adresses']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $expedition = $this->Expeditions->patchEntity($expedition, $this->request->getData());
            if ($this->Expeditions->save($expedition)) {
                $this->Flash->success(__('The expedition has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The expedition could not be saved. Please, try again.'));
        }
        $adresses = $this->Expeditions->Adresses->find('list', ['limit' => 200]);
        $this->set(compact('expedition', 'adresses'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Expedition id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $expedition = $this->Expeditions->get($id);
        if ($this->Expeditions->delete($expedition)) {
            $this->Flash->success(__('The expedition has been deleted.'));
        } else {
            $this->Flash->error(__('The expedition could not be deleted. Please, try again.'));
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
            && in_array($action, ['add', 'edit','delete'])){
            return true;
        }

    }

}
