<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;
use Cake\Event\Event;
use Cake\Controller\Controller;
use Cake\Controller\Component\RequestHandlerComponent;
use Cake\ORM\TableRegistry;

class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public $BlocksTable;
    public $ContractorsTable;
    public $DefectHeadersTable;
    public $DefectItemsTable;
    public $DefectPlacesTable;
    public $PhasesTable;
    public $ProjectsTable;
    public $TradeDescriptionsTable;
    public $TradesTable;
    public $TradeTypesTable;
    public $UnitsTable;
    public $UnitTypesTable;
    public $UserPositionsTable;
    public $UsersTable;

    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

         $this->loadComponent('Auth', [
            'authorize'=> 'Controller',
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'LoginName',
                        'password' => 'UserPass'
                    ]
                ],
                'Basic' => [
                    'fields' => [
                        'username' => 'LoginName',
                        'password' => 'UserPass'
                    ]
                ]
            ],
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            'loginRedirect' => [
                'controller' => 'DefectHeaders',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login',
                'home'
            ],
             // If unauthorized, return them to page they were just on
            'unauthorizedRedirect' => $this->referer()
        ]);

        // Allow the display action so our PagesController
        // continues to work. Also enable the read only actions.
       // $this->Auth->allow(['display', 'view', 'index']);
    }
    public function beforeRender(Event $event){
        $this->set('Auth',$this->Auth);
    }
    public function beforeFilter(\Cake\Event\Event $event)
    {
        $this->BlocksTable = TableRegistry::get('Blocks');
        $this->ContractorsTable = TableRegistry::get('Contractors');
        $this->DefectHeadersTable = TableRegistry::get('DefectHeaders');
        $this->DefectItemsTable = TableRegistry::get('DefectItems');
        $this->DefectPlacesTable = TableRegistry::get('DefectPlaces');
        $this->PhasesTable = TableRegistry::get('Phases');
        $this->ProjectsTable = TableRegistry::get('Projects');
        $this->TradeDescriptionsTable = TableRegistry::get('TradeDescriptions');
        $this->TradesTable = TableRegistry::get('Trades');
        $this->TradeTypesTable = TableRegistry::get('TradeTypes');
        $this->UnitsTable = TableRegistry::get('Units');
        $this->UnitTypesTable = TableRegistry::get('UnitTypes');
        $this->UserPositionsTable = TableRegistry::get('UserPositions');
        $this->UsersTable = TableRegistry::get('Users');

        // allow authen
        $this->Auth->allow(['login', 'logout','display']);
    }

    public function isAuthorized($user)
    {
        // Admin can access every action
        if ( $user['PositionID'] == '1') {
            return true;
        }
        // Default deny
        return true;
    }
    

}
