<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Blocks Controller
 *
 * @property \App\Model\Table\BlocksTable $Blocks
 *
 * @method \App\Model\Entity\Block[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BlocksController extends AppController
{
    public function initialize()
        {
            parent::initialize();
            $this->loadComponent('RequestHandler');
        }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Phases', 'Contractors']
        ];
        $blocks = $this->paginate($this->Blocks);

        $this->set(compact('blocks'));
    }

    /**
     * View method
     *
     * @param string|null $id Block id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $blockCur = $this->Blocks->get($id, [
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

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $block = $this->Blocks->newEntity();
        if ($this->request->is('post')) {
            $block = $this->Blocks->patchEntity($block, $this->request->getData());
            if ($this->Blocks->save($block)) {
                $this->Flash->success(__('The block has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The block could not be saved. Please, try again.'));
        }
        $phases = $this->Blocks->Phases->find('list', ['limit' => 200]);
        $contractors = $this->Blocks->Contractors->find('list', ['limit' => 200]);
        $this->set(compact('block', 'phases', 'contractors'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Block id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $block = $this->Blocks->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $block = $this->Blocks->patchEntity($block, $this->request->getData());
            if ($this->Blocks->save($block)) {
                $this->Flash->success(__('The block has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The block could not be saved. Please, try again.'));
        }
        $phases = $this->Blocks->Phases->find('list', ['limit' => 200]);
        $contractors = $this->Blocks->Contractors->find('list', ['limit' => 200]);
        $this->set(compact('block', 'phases', 'contractors'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Block id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $block = $this->Blocks->get($id);
        if ($this->Blocks->delete($block)) {
            $this->Flash->success(__('The block has been deleted.'));
        } else {
            $this->Flash->error(__('The block could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
