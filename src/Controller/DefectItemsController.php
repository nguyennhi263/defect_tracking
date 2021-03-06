<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Controller\Component\RequestHandlerComponent ;
use Cake\I18n\Time;
use Cake\Event\Event;
/**
 * DefectItems Controller
 *
 * @property \App\Model\Table\DefectItemsTable $DefectItems
 *
 * @method \App\Model\Entity\DefectItem[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DefectItemsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    public function isAuthorized($user)
    {
        return true;
    }
    public function beforeFilter(Event $event)
    {   
        parent::beforeFilter($event);
        $this->Auth->allow();   
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['DefectHeaders', 'DefectPlaces', 'TradeDescriptions']
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
            'contain' => ['DefectHeaders', 'DefectPlaces', 'TradeDescriptions']
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
        $defectPlaces = $this->DefectItems->DefectPlaces->find('list', ['limit' => 200]);
        $tradeDescriptions = $this->DefectItems->TradeDescriptions->find('list', ['limit' => 200]);
        $this->set(compact('defectItem', 'defectHeaders', 'defectPlaces', 'tradeDescriptions'));
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
        $defectPlaces = $this->DefectItems->DefectPlaces->find('list', ['limit' => 200]);
        $tradeDescriptions = $this->DefectItems->TradeDescriptions->find('list', ['limit' => 200]);
        $this->set(compact('defectItem', 'defectHeaders', 'defectPlaces', 'tradeDescriptions'));
    }

    public function close($id = null, $defectID = null){
        $defectItem = $this->DefectItems->get($id);
        
        $defectItem->DefectStatus = "close";
            $defectItem->CloseDate = new Time();
            if ($this->DefectItems->save($defectItem)) {
                
                return $this->redirect(['controller' => 'DefectHeaders', 'action' => 'view',$defectID]);
            }
         $this->Flash->error(__('The defect item could not be saved. Please, try again.'));
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

    public function newHeader($UnitID = null ){
        if ($UnitID == null ){ $UnitID = 1 ; }
        $defectHeader = $this->DefectHeadersTable->newEntity();
        $defectHeader->UnitID = $UnitID ;
        

        if ($this->DefectHeadersTable->save($defectHeader)){
            $this->set(['defectHeader' => $defectHeader,
                    '_serialize' => ['defectHeader']
                ]);
        }
    }
    public function newDefectItem($TradeDescriptionID = null,$PlaceID = nul,$note = null ){
       
        $headerID = $this->DefectHeadersTable->find('all',['fields'=>'DefectID'])->last()->DefectID;

        $defectItem = $this->DefectItemsTable->newEntity();
        $defectItem->DefectID = $headerID+1;
        //
        $defectItem->TradeDescriptionID = $TradeDescriptionID;
        $defectItem->PlaceID = $PlaceID;
        $defectItem->DefectStatus = "open";
        $defectItem->Note = $note;
        
        if ($this->DefectItemsTable->save($defectItem)){
            $this->set(['defectItem' => $defectItem,
                    '_serialize' => ['defectItem']
                ]);
        }
    }
}
