<?php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Controller\Component\RequestHandlerComponent ;
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

    public function view($id = null)
    {
        $defectPlace = $this->DefectPlaces->get($id, [
            'contain' => ['UnitTypes']
        ]);

        $this->set('defectPlace', $defectPlace);
    }

    public function add1()
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
        $defectPlace->UnitTypeID="asd";
       // $defectPlace->DefectPlaceName = "asdasd";
        $defectPlace->coordX="235";
        $defectPlace->coordY="34";
        $unitTypes = $this->DefectPlaces->UnitTypes->find('list', ['limit' => 200]);
        $this->set(compact('defectPlace', 'unitTypes'));

        // Specify which view vars JsonView should serialize.
        $this->set('_serialize', ['defectPlace', 'unitTypes']);
    }
   public function add()
    {
       // $this->autoRender = false;
        $defectPlace = $this->DefectPlaces->newEntity($this->request->getData());
        $message = 'null';
        if ($this->DefectPlaces->save($defectPlace)) {
            $message = 'Saved';
        } else {
            $message = 'Error';
        }
        $this->set('_serialize', ['message']);
        $this->set(['message' => $message,
            '_serialize' => ['message']
        ]);
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
