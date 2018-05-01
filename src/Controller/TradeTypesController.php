<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TradeTypes Controller
 *
 * @property \App\Model\Table\TradeTypesTable $TradeTypes
 *
 * @method \App\Model\Entity\TradeType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TradeTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $tradeTypes = $this->paginate($this->TradeTypes);

        $this->set(compact('tradeTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Trade Type id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tradeType = $this->TradeTypes->get($id, [
            'contain' => ['Trades']
        ]);

        $this->set('tradeType', $tradeType);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tradeType = $this->TradeTypes->newEntity();
        if ($this->request->is('post')) {
            $tradeType = $this->TradeTypes->patchEntity($tradeType, $this->request->getData()); 
                if ($this->TradeTypes->save($tradeType)) {
                    $this->Flash->success(__('The trade type has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }
            $this->Flash->error(__('The trade type could not be saved. Please, try again.'));
        }
        $this->set(compact('tradeType'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Trade Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tradeType = $this->TradeTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tradeType = $this->TradeTypes->patchEntity($tradeType, $this->request->getData());
            if ($this->TradeTypes->save($tradeType)) {
                $this->Flash->success(__('The trade type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The trade type could not be saved. Please, try again.'));
        }
        $this->set(compact('tradeType'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Trade Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tradeType = $this->TradeTypes->get($id);
        if ($this->TradeTypes->delete($tradeType)) {
            $this->Flash->success(__('The trade type has been deleted.'));
        } else {
            $this->Flash->error(__('The trade type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
