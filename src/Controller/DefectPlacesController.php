<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Controller\Component\RequestHandlerComponent ;
use Cake\ORM\TableRegistry;
/**
 * DefectPlaces Controller
 *
 * @property \App\Model\Table\DefectPlacesTable $DefectPlaces
 *
 * @method \App\Model\Entity\DefectPlace[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DefectPlacesController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }
    public function index()
    {
        $this->paginate = [
            'contain' => ['UnitTypes']
        ];
        $defectPlaces = $this->paginate($this->DefectPlaces);

        $this->set(compact('defectPlaces'));
    }
    public function viewByUnitType($id = null){
        $listDefectPlace = $this->DefectPlaces
        ->find()
        ->where(['unitTypeID' => $id])
        ->toList();
        $this->set(['listDefectPlace' => $listDefectPlace,
                    '_serialize' => ['listDefectPlace']
                ]);
    }
    
    public function view($id = null)
    {
        $defectPlace = $this->DefectPlaces->get($id, [
            'contain' => ['UnitTypes']
        ]);
        $this->set(['defectPlace' => $defectPlace,
                    '_serialize' => ['defectPlace']
                ]);
        $this->set('defectPlace', $defectPlace);
    }

    public function add()
    {
        $defectPlace = $this->DefectPlaces->newEntity();
        if ($this->request->is('ajax')) {
            $defectPlace = $this->DefectPlaces->patchEntity($defectPlace, $this->request->getData());
            if ($this->DefectPlaces->save($defectPlace)) {
                $message = 'Saved';
                $this->set(['message' => $message,
                    '_serialize' => ['message']
                ]);
            }
            else{
                $message = 'Error';
                $this->set(['message' => $message,
                    '_serialize' => ['message']
                ]);
            }
        }
    }

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
