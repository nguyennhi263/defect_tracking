<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Controller\Component\RequestHandlerComponent;
/**
 * Projects Controller
 *
 * @property \App\Model\Table\ProjectsTable $Projects
 *
 * @method \App\Model\Entity\Project[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProjectsController extends AppController
{
    public function initialize()
    {
            parent::initialize();
            $this->loadComponent('RequestHandler');
    }
    
    public function index()
    {
        $projects = $this->paginate($this->Projects);

        $this->set(compact('projects'));
    }

    public function view($id = null)
    {
        $project = $this->Projects->get($id, [
            'contain' => ['Phases']
        ]);
        
        
        $this->set('projectCur', $project);
       
        /**
            render chart
        */
        // get phase
        $listProject = $this->Projects->find('all')->contain(['Phases'])->toArray();
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

  
    public function add()
    {
        $project = $this->Projects->newEntity();
        if ($this->request->is('post')) {
            $project = $this->Projects->patchEntity($project, $this->request->getData());
            if ($this->Projects->save($project)) {
                $this->Flash->success(__('The project has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project could not be saved. Please, try again.'));
        }
        //debug ($project->ProjectName);
        $this->set(compact('project'));
    }

  
    public function edit($id = null)
    {
        $project = $this->Projects->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $project = $this->Projects->patchEntity($project, $this->request->getData());
            if ($this->Projects->save($project)) {
                $this->Flash->success(__('The project has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project could not be saved. Please, try again.'));
        }
        $this->set(compact('project'));
    }

   
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $project = $this->Projects->get($id);
        if ($this->Projects->delete($project)) {
            $this->Flash->success(__('The project has been deleted.'));
        } else {
            $this->Flash->error(__('The project could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function getDefectHeader($id = null){
        $this->autoRender = false;
        // get phase
        $phases = $this->PhasesTable->find('all')->contain(['Blocks'])->where(['ProjectID'=>$id])->toArray();
        //get blocks
        $blockArray = [];
        foreach ($phases as  $phase) {
            foreach ($phase->blocks as $block) {
                array_push($blockArray,$block->BlockID); 
            }
        }
        // get Units
        $units = $this->UnitsTable->find('all')->where(['BlockID in '=>$blockArray])->toArray();
        $unitArray = [];
        foreach ($units as $unit) {
            array_push($unitArray, $unit->UnitID);
        }
       return $unitArray;
        //get Defect Headers
        $defectHeaderArray = $this->DefectHeadersTables->find('all')->where(['UnitID in' => $unitArray])->toArray();
        
    }
}
