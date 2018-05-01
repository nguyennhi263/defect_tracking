<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TradeDescriptions Controller
 *
 * @property \App\Model\Table\TradeDescriptionsTable $TradeDescriptions
 *
 * @method \App\Model\Entity\TradeDescription[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TradeDescriptionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Trades']
        ];
        $tradeDescriptions = $this->paginate($this->TradeDescriptions);

        $this->set(compact('tradeDescriptions'));
    }

    /**
     * View method
     *
     * @param string|null $id Trade Description id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tradeDescription = $this->TradeDescriptions->get($id, [
            'contain' => ['Trades']
        ]);

        $this->set('tradeDescription', $tradeDescription);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tradeDescription = $this->TradeDescriptions->newEntity();
        if ($this->request->is('post')) {
            $tradeDescription = $this->TradeDescriptions->patchEntity($tradeDescription, $this->request->getData());
            if ($this->TradeDescriptions->save($tradeDescription)) {
                $this->Flash->success(__('The trade description has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The trade description could not be saved. Please, try again.'));
        }
        $trades = $this->TradeDescriptions->Trades->find('list', ['limit' => 200]);
        $this->set(compact('tradeDescription', 'trades'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Trade Description id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tradeDescription = $this->TradeDescriptions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tradeDescription = $this->TradeDescriptions->patchEntity($tradeDescription, $this->request->getData());
            if ($this->TradeDescriptions->save($tradeDescription)) {
                $this->Flash->success(__('The trade description has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The trade description could not be saved. Please, try again.'));
        }
        $trades = $this->TradeDescriptions->Trades->find('list', ['limit' => 200]);
        $this->set(compact('tradeDescription', 'trades'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Trade Description id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tradeDescription = $this->TradeDescriptions->get($id);
        if ($this->TradeDescriptions->delete($tradeDescription)) {
            $this->Flash->success(__('The trade description has been deleted.'));
        } else {
            $this->Flash->error(__('The trade description could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
