<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
/**
 * UserPositions Controller
 *
 * @property \App\Model\Table\UserPositionsTable $UserPositions
 *
 * @method \App\Model\Entity\UserPosition[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UserPositionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $userPositions = $this->paginate($this->UserPositions);

        $this->set(compact('userPositions'));
    }

    /**
     * View method
     *
     * @param string|null $id User Position id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $userPosition = $this->UserPositions->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('userPosition', $userPosition);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $userPosition = $this->UserPositions->newEntity();
        if ($this->request->is('post')) {
            $userPosition = $this->UserPositions->patchEntity($userPosition, $this->request->getData());
            if ($this->UserPositions->save($userPosition)) {
                $this->Flash->success(__('The user position has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user position could not be saved. Please, try again.'));
        }
        $this->set(compact('userPosition'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User Position id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $userPosition = $this->UserPositions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userPosition = $this->UserPositions->patchEntity($userPosition, $this->request->getData());
            if ($this->UserPositions->save($userPosition)) {
                $this->Flash->success(__('The user position has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user position could not be saved. Please, try again.'));
        }
        $this->set(compact('userPosition'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User Position id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $userPosition = $this->UserPositions->get($id);
        if ($this->UserPositions->delete($userPosition)) {
            $this->Flash->success(__('The user position has been deleted.'));
        } else {
            $this->Flash->error(__('The user position could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
