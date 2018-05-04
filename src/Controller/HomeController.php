<?php
namespace App\Controller;
//use Cake\Event\Event;
use Cake\ORM\Query;
use Cake\ORM\Table;
use App\Controller\AppController;
use Cake\Controller\Component\RequestHandlerComponent ;
use Cake\I18n\Time;
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
        $listData = $this->DefectItemsTable->find();
        // select date created as month
        $month = $listData->func()->month([
            'created' => 'identifier'
        ]);
        // select count(DefectItemID)
        $value = $listData->func()->count('DefectItemID');
        $listData->select([
            'month' => $month,
            'value' => $value
        ]);
        // group by created
        $listData->group('created');
        // where created date in last 12 month
        $listData->where(['created >=' => new Time('-12 months')]);

        /*
             query("SELECT COUNT(DefectItemID),MONTH(created) FROM defect_items GROUP BY YEAR(created), MONTH(created);")->toArray();
        */
        $this->set(['listData' => $listData,
                    '_serialize' => ['listData']
                ]);
    }
}
