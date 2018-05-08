<?php
namespace App\Controller;
//use Cake\Event\Event;
use Cake\ORM\Query;
use Cake\ORM\Table;
use App\Controller\AppController;
use Cake\Controller\Component\RequestHandlerComponent ;
use Cake\I18n\Time;
use Cake\Event\Event;
class HomeController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    public function isAuthorized($user)
    {
        parent::isAuthorized($user);
        return true;
    }
    public function beforeFilter(Event $event)
    {   
        parent::beforeFilter($event);
        $this->Auth->allow();   
    }


    public function index()
    {

    }
    public function getCountDefectByMonth()
    {      
        /*
             query("SELECT COUNT(DefectItemID),MONTH(created) FROM defect_items GROUP BY YEAR(created), MONTH(created);")
        */
        $listDataOpen = $this->DefectItemsTable->find();
        // select date created as month
        $month = $listDataOpen->func()->month([
            'created' => 'identifier'
        ]);
        // select count(DefectItemID)
        $value = $listDataOpen->func()->count('DefectItemID');
        $listDataOpen->select([
            'month' => $month,
            'value' => $value
        ]);
        // group by created
        $listDataOpen->group(['MONTH(created)','YEAR(created)']);
        $listDataOpen->order(['created' => 'ASC']);
        // where created date in last 12 month
        $listDataOpen->where(['created >=' => new Time('-12 months')]);
        /**
            get list defect closed
        */

        $listDataClose = $this->DefectItemsTable->find();
        // select date created as month
        $month = $listDataClose->func()->month([
            'created' => 'identifier'
        ]);
        // select count(DefectItemID)
        $value = $listDataClose->func()->count('DefectItemID');
        $listDataClose->select([
            'month' => $month,
            'value2' => $value
        ]);
        // group by created
        $listDataClose->group('created');
        // where created date in last 12 month
        $listDataClose->where(['created >=' => new Time('-12 months'),
                            'DefectStatus'=>'close']);
       
        
        $this->set(['listDataOpen' => $listDataOpen,'listDataClose'=>$listDataClose,
                    '_serialize' => ['listDataOpen']
                ]);
    }
}
