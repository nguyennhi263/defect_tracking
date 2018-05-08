<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Date;
use Cake\Controller\Component\RequestHandlerComponent ;

class DefectHeadersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }
    public function insert(){
        if ($this->request->is('get')) {
        $test = $this->request->getData('DefectItemNote');
        $this->set(compact('test'));
        }
        
    }
    public function block($id = null)
    {
        if ($id == null){
            $id = $this->BlocksTable->find('all')->first()->BlockID;
        }
        $blockCur = $this->BlocksTable->get($id, [
            'contain' => ['Phases', 'Contractors', 'Units']
        ]);

        $this->set('blockCur', $blockCur);
        /*
            ** Get List Floor
        */
        $floorArray=[];
        
        $listUnits = $blockCur->units;
        if (!empty($listUnits)){
            $i = $listUnits[0]['UnitFloor'];
             $floorArray[$i]=[];
            foreach ($listUnits as $unit){
                /*
                    get next floor
                */
                if ($unit->UnitFloor > (int) ($i)){
                    $i++;
                    //array_push($floorArray,$i);
                    $floorArray[$i]=[];
                }
            }
        }
        if (!empty($listUnits)){
            $i = 0;
            foreach ($listUnits as $unit){
                /*
                    get next floor
                */
                array_push($floorArray[$unit->UnitFloor],$unit);
            }
        }
        $this->set(compact('floorArray'));

        /**
            render chart
        */
        // get phase
        $listProject = $this->ProjectsTable->find('all')->contain(['Phases'])->toArray();
       // $projectArray = $listProject;
        if (!empty($listProject)){

            foreach ($listProject as $projectKey => $project ){

                if (!empty($project->phases)){
                    foreach ($project->phases as $phaseKey => $phase) {
                        $blocks = $this->BlocksTable->find('all')->where(['PhaseID'=>$phase->PhaseID])->toArray();
                        if (!empty($blocks)){
                            $listProject[$projectKey]->phases[$phaseKey]->blocks= [];
                            array_push($listProject[$projectKey]->phases[$phaseKey]->blocks, $blocks);
                        }
                    }
                }
            }
        }
        $this->set('listProject', $listProject); 
    }
    public function new($id = null ){
        // get unit info
        $unit = $this->UnitsTable->get($id, [
            'contain' => ['Blocks', 'UnitTypes']
        ]);
        $this->set('unit', $unit);
        // get list trade
        $trades = $this->TradesTable->find('list',['limit'=>200],
                ['contain'=>['TradeDescriptions']]);
        $trade = $this->TradesTable->find('all',['limit'=>200,'contain'=>['TradeDescriptions']]);
        $defectPlaces = $this->DefectItemsTable->DefectPlaces->find('list', ['limit' => 200]);
        $tradeDescriptions = $this->TradeDescriptionsTable->find('list',['limit'=>200])->where(['TradeID'=> $trade->first()->TradeID]);
        
        $this->set(compact('trades', 'defectPlaces', 'tradeDescriptions'));
    }
    public function index()
    {
        /*
            ** Get total defect open
        */
        $query = $this->DefectItemsTable
                    ->find()
                    ->where(['DefectStatus'=>'open']);
        $defectItems = $query->toArray();
        $this->set(compact('defectItems'));
        /*
            ** Get total defect open today
        */
        $query = $this->DefectItemsTable
                    ->find()
                    ->where(['DefectStatus'=>'open','created '=>new Date()]);
        $defectItemsToday = $query->toArray();
        $this->set(compact('defectItemsToday'));
        /*
            ** Get total defect close today
        */
        $query = $this->DefectItemsTable
                    ->find()
                    ->where(['DefectStatus'=>'close','created '=>new Date()]);
        $defectItemsClose = $query->toArray();
        $this->set(compact('defectItemsClose'));
    }
    public function list_header()
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
            'contain' => ['Units', 'DefectItems','Units.UnitTypes']
        ]);
        /*
            **Get Project Info
        */
        $query = $this->BlocksTable->find()->where(['BlockID'=>$defectHeader->UnitName->BlockID]);
        $block = $query->first();

        $query = $this->PhasesTable->find()->where(['PhaseID'=>$block->PhaseID]);
        $phase = $query->first();

        $query = $this->ProjectsTable->find()->where(['ProjectID'=>$phase->ProjectID]);
        $project = $query->first();
        /*
            ** Get list data association
        */
        $tradeArray=[];
        $detailArray= [];
        $placeArray = [];
        $listDefectItem = $defectHeader->defect_items;
        if (!empty($listDefectItem)){
            foreach ($defectHeader->defect_items as $defectItems){
                /*
                    get ID
                */
                $detailID = $defectItems->TradeDescriptionID;
                $placeID = $defectItems->PlaceID;
                $test =  $defectItems->DefectItemID;
                /*
                    get Name
                */
                $query = $this->TradeDescriptionsTable->find()->where(['TradeDescriptionID'=>$detailID]);
                $desc = $query->first();
                array_push($detailArray,$desc->TradeDescriptionDetail);

                $query = $this->TradesTable->find()->where([
                    'TradeID' => $desc->TradeID]);
                $trade = $query->first();
                array_push($tradeArray,$trade->TradeName);

                $query = $this->DefectPlacesTable->find()
                ->where(['DefectPlaceID' => $placeID]);
                $place = $query->first();
                array_push($placeArray,$place->DefectPlaceName);

            }
        }
        
        $this->set(['listDefectItem' => $listDefectItem,
                            '_serialize' => ['listDefectItem']
                        ]);
        $this->set('defectHeader', $defectHeader);
        $this->set('tradeArray',$tradeArray);
        $this->set('detailArray',$detailArray);
        $this->set('placeArray',$placeArray);
        $this->set('phase',$phase);
        $this->set('block',$block);
        $this->set('project',$project);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $defectHeader = $this->DefectHeaders->newEntity();
        if ($this->request->is('post')||$this->request->is('ajax') ) {

            $defectHeader = $this->DefectHeaders->patchEntity($defectHeader, $this->request->getData());
            
            if ($this->DefectHeaders->save($defectHeader)) {

                $defectIDs = $defectHeader->DefectID;

                 $this->set(['defectIDs' => $defectIDs,
                    '_serialize' => ['defectIDs']]);
                
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

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $defectHeader = $this->DefectHeaders->get($id);
        if ($this->DefectHeaders->delete($defectHeader)) {
            $this->Flash->success(__('Delete successful.'));
        }
        else{
        $this->Flash->error(__('The defect header could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
