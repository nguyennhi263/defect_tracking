<?php
namespace App\Controller;
//use Cake\Event\Event;
use Cake\ORM\Query;
use Cake\ORM\Table;
use App\Controller\AppController;
use Cake\Controller\Component\RequestHandlerComponent ;
class HomeController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }
    public function index()
    {

    }
    public function getCountDefectByMonth()
    {
        $query = $this->DefectItemsTable->find()->toList();
        $this->set(['query' => $query,
                    '_serialize' => ['query']
                ]);
    }
}
