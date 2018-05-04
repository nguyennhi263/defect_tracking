<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DefectItems Controller
 *
 * @property \App\Model\Table\DefectItemsTable $DefectItems
 *
 * @method \App\Model\Entity\DefectItem[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DefectItemsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['DefectHeaders', 'Contractors', 'DefectPlaces', 'TradeDescriptions']
        ];
        $defectItems = $this->paginate($this->DefectItems);

        $this->set(compact('defectItems'));
    }

    /**
     * View method
     *
     * @param string|null $id Defect Item id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $defectItem = $this->DefectItems->get($id, [
            'contain' => ['DefectHeaders', 'Contractors', 'DefectPlaces', 'TradeDescriptions']
        ]);

        $this->set('defectItem', $defectItem);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $defectItem = $this->DefectItems->newEntity();
        if ($this->request->is('post')) {
            $defectItem = $this->DefectItems->patchEntity($defectItem, $this->request->getData());
            if ($this->DefectItems->save($defectItem)) {
                $this->Flash->success(__('The defect item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The defect item could not be saved. Please, try again.'));
        }
        $defectHeaders = $this->DefectItems->DefectHeaders->find('list', ['limit' => 200]);
        $contractors = $this->DefectItems->Contractors->find('list', ['limit' => 200]);
        $defectPlaces = $this->DefectItems->DefectPlaces->find('list', ['limit' => 200]);
        $tradeDescriptions = $this->TradeDescriptionsTable->find('list', ['limit' => 200]);
        $this->set(compact('defectItem', 'defectHeaders', 'contractors', 'defectPlaces', 'tradeDescriptions'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Defect Item id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $defectItem = $this->DefectItems->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $defectItem = $this->DefectItems->patchEntity($defectItem, $this->request->getData());
            if ($this->DefectItems->save($defectItem)) {
                $this->Flash->success(__('The defect item has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The defect item could not be saved. Please, try again.'));
        }
        $defectHeaders = $this->DefectItems->DefectHeaders->find('list', ['limit' => 200]);
        $contractors = $this->DefectItems->Contractors->find('list', ['limit' => 200]);
        $defectPlaces = $this->DefectItems->DefectPlaces->find('list', ['limit' => 200]);
        $tradeDescriptions = $this->DefectItems->TradeDescriptions->find('list', ['limit' => 200]);
        $this->set(compact('defectItem', 'defectHeaders', 'contractors', 'defectPlaces', 'tradeDescriptions'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Defect Item id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $defectItem = $this->DefectItems->get($id);
        if ($this->DefectItems->delete($defectItem)) {
            $this->Flash->success(__('The defect item has been deleted.'));
        } else {
            $this->Flash->error(__('The defect item could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
