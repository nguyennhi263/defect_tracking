<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Phases Controller
 *
 * @property \App\Model\Table\PhasesTable $Phases
 *
 * @method \App\Model\Entity\Phase[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PhasesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Projects']
        ];
        $phases = $this->paginate($this->Phases);

        $this->set(compact('phases'));
    }

    /**
     * View method
     *
     * @param string|null $id Phase id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $phase = $this->Phases->get($id, [
            'contain' => ['Projects', 'Blocks']
        ]);

        $this->set('phase', $phase);

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
        $phase = $this->Phases->newEntity();
        if ($this->request->is('post')) {
            $phase = $this->Phases->patchEntity($phase, $this->request->getData());
            if ($this->Phases->save($phase)) {
                $this->Flash->success(__('The phase has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The phase could not be saved. Please, try again.'));
        }
        $projects = $this->Phases->Projects->find('list', ['limit' => 200]);
        $this->set(compact('phase', 'projects'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Phase id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $phase = $this->Phases->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $phase = $this->Phases->patchEntity($phase, $this->request->getData());
            if ($this->Phases->save($phase)) {
                $this->Flash->success(__('The phase has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The phase could not be saved. Please, try again.'));
        }
        $projects = $this->Phases->Projects->find('list', ['limit' => 200]);
        $this->set(compact('phase', 'projects'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Phase id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $phase = $this->Phases->get($id);
        if ($this->Phases->delete($phase)) {
            $this->Flash->success(__('The phase has been deleted.'));
        } else {
            $this->Flash->error(__('The phase could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
