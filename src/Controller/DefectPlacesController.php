<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DefectPlaces Controller
 *
 * @property \App\Model\Table\DefectPlacesTable $DefectPlaces
 *
 * @method \App\Model\Entity\DefectPlace[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DefectPlacesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['UnitTypes']
        ];
        $defectPlaces = $this->paginate($this->DefectPlaces);

        $this->set(compact('defectPlaces'));
    }

    /**
     * View method
     *
     * @param string|null $id Defect Place id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $defectPlace = $this->DefectPlaces->get($id, [
            'contain' => ['UnitTypes']
        ]);

        $this->set('defectPlace', $defectPlace);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $defectPlace = $this->DefectPlaces->newEntity();
        if ($this->request->is('post')) {
            $defectPlace = $this->DefectPlaces->patchEntity($defectPlace, $this->request->getData());
            if ($this->DefectPlaces->save($defectPlace)) {
                $this->Flash->success(__('The defect place has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The defect place could not be saved. Please, try again.'));
        }
        $unitTypes = $this->DefectPlaces->UnitTypes->find('list', ['limit' => 200]);
        $this->set(compact('defectPlace', 'unitTypes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Defect Place id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $defectPlace = $this->DefectPlaces->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $defectPlace = $this->DefectPlaces->patchEntity($defectPlace, $this->request->getData());
            if ($this->DefectPlaces->save($defectPlace)) {
                $this->Flash->success(__('The defect place has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The defect place could not be saved. Please, try again.'));
        }
        $unitTypes = $this->DefectPlaces->UnitTypes->find('list', ['limit' => 200]);
        $this->set(compact('defectPlace', 'unitTypes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Defect Place id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $defectPlace = $this->DefectPlaces->get($id);
        if ($this->DefectPlaces->delete($defectPlace)) {
            $this->Flash->success(__('The defect place has been deleted.'));
        } else {
            $this->Flash->error(__('The defect place could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
