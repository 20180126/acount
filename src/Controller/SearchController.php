<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Search Controller
 *
 *
 * @method \App\Model\Entity\Search[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SearchController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $search = $this->paginate($this->Search);

        $this->set(compact('search'));
    }

    /**
     * View method
     *
     * @param string|null $id Search id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $search = $this->Search->get($id, [
            'contain' => []
        ]);

        $this->set('search', $search);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $search = $this->Search->newEntity();
        if ($this->request->is('post')) {
            $search = $this->Search->patchEntity($search, $this->request->getData());
            if ($this->Search->save($search)) {
                $this->Flash->success(__('The search has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The search could not be saved. Please, try again.'));
        }
        $this->set(compact('search'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Search id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $search = $this->Search->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $search = $this->Search->patchEntity($search, $this->request->getData());
            if ($this->Search->save($search)) {
                $this->Flash->success(__('The search has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The search could not be saved. Please, try again.'));
        }
        $this->set(compact('search'));
    }

    public function execute($id = null){
        
        if(!$this->request->is('post')) return $this->redirect('/');

        $c = $this->request->getData();
        $name = $c['name'] ;
        $suuser = TableRegistry::get("users")
                ->find()
                ->where(['name' => $name])
                ->first();

        $id = $suuser->user_id;
        $id ? $token = 'success' : $token = 'false';
        $this->redirect(
            [
                'controller' => 'Users',
                'action' => 'index',
                '?' => [
                    '0' => $id,
                    '1' => $token
                ]
            ]
        );
    }

    /**
     * Delete method
     *
     * @param string|null $id Search id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $search = $this->Search->get($id);
        if ($this->Search->delete($search)) {
            $this->Flash->success(__('The search has been deleted.'));
        } else {
            $this->Flash->error(__('The search could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
