<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DefectHeaders Controller
 *
 * @property \App\Model\Table\DefectHeadersTable $DefectHeaders
 *
 * @method \App\Model\Entity\DefectHeader[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DefectHeadersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Units']
        ];
        $defectHeaders = $this->paginate($this->DefectHeaders);

        $this->set(compact('defectHeaders'));
    }

    /**
     * View method
     *
     * @param string|null $id Defect Header id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $defectHeader = $this->DefectHeaders->get($id, [
            'contain' => ['Units', 'DefectItems']
        ]);

        $this->set('defectHeader', $defectHeader);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $defectHeader = $this->DefectHeaders->newEntity();
        if ($this->request->is('post')) {
            $defectHeader = $this->DefectHeaders->patchEntity($defectHeader, $this->request->getData());
            if ($this->DefectHeaders->save($defectHeader)) {
                $this->Flash->success(__('The defect header has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The defect header could not be saved. Please, try again.'));
        }
        $units = $this->DefectHeaders->Units->find('list', ['limit' => 200]);
        $this->set(compact('defectHeader', 'units'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Defect Header id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $defectHeader = $this->DefectHeaders->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $defectHeader = $this->DefectHeaders->patchEntity($defectHeader, $this->request->getData());
            if ($this->DefectHeaders->save($defectHeader)) {
                $this->Flash->success(__('The defect header has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The defect header could not be saved. Please, try again.'));
        }
        $units = $this->DefectHeaders->Units->find('list', ['limit' => 200]);
        $this->set(compact('defectHeader', 'units'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Defect Header id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $defectHeader = $this->DefectHeaders->get($id);
        if ($this->DefectHeaders->delete($defectHeader)) {
            $this->Flash->success(__('The defect header has been deleted.'));
        } else {
            $this->Flash->error(__('The defect header could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
