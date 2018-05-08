<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Controller\Component\RequestHandlerComponent ;
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
        $defectItem->DefectID = $headerID;
        //
        $defectItem->TradeDescriptionID = $TradeDescriptionID;
        $defectItem->PlaceID = $PlaceID;
        $defectItem->DefectStatus = "open";
        $defectItem->Note = $note;
        
        // xử lý ảnh

        
                /**     Xử lý ảnh
            */

            // lấy tên file upload
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $time = date("Ymd_His");
            $image=$_FILES['ImageFileNameBefore']['ImageFileNameBefore'];
            // Lấy tên gốc của file
            $filename = stripslashes($_FILES['ImageFileNameBefore']['ImageFileNameBefore']);
            $filetype = $_FILES['ImageFileNameBefore']['type'];
            $file_tmp = $_FILES['ImageFileNameBefore']['tmp_name'];
            //Lấy phần mở rộng của file
            $explore = explode ('.',$filename); //chia chuoi bang '.'
            $ext = end($explore);
            //kiểm tra file phải hình ảnh ko
            $chophep = array('jpeg','png','bpm','jpg','JPEG','JPG');
            if (in_array($ext,$chophep) === false){
                    $this->Flash->success(__('File upload không hợp lệ'));
                }
            /*----------UPLOADING----------*/
            // đặt tên mới cho file hình up lên
            $image_name = $time.'.'.$ext;
            // gán thêm cho file này đường dẫn
            $newname=$_SERVER["DOCUMENT_ROOT"]. '/defect_tracking/webroot/img/DefectItem/' .$image_name;
            //nếu ko có lỗi xảy ra->> tiếp tục upload
                if (move_uploaded_file($file_tmp,$newname)){
                      $defectItem->ImageFileNameBefore =$image_name;
                    }
                /*
                *   Tiếp tục lưu data
                */
        if ($this->DefectItemsTable->save($defectItem)){
            $this->set(['defectItem' => $defectItem,
                    '_serialize' => ['defectItem']
                ]);
        }
    }
}
