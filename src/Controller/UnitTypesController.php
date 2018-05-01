<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * UnitTypes Controller
 *
 * @property \App\Model\Table\UnitTypesTable $UnitTypes
 *
 * @method \App\Model\Entity\UnitType[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UnitTypesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $unitTypes = $this->paginate($this->UnitTypes);

        $this->set(compact('unitTypes'));
    }

    /**
     * View method
     *
     * @param string|null $id Unit Type id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $unitType = $this->UnitTypes->get($id, [
            'contain' => []
        ]);

        $this->set('unitType', $unitType);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $unitType = $this->UnitTypes->newEntity();
        if ($this->request->is('post')) {
            $unitType = $this->UnitTypes->patchEntity($unitType, $this->request->getData());

                /**     Xử lý ảnh
            */

            // lấy tên file upload
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $time = date("Ymd_His");
            $image=$_FILES['image']['name'];
            // Lấy tên gốc của file
            $filename = stripslashes($_FILES['image']['name']);
            $filetype = $_FILES['image']['type'];
            $file_tmp = $_FILES['image']['tmp_name'];
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
            $newname=$_SERVER["DOCUMENT_ROOT"]. '/defect_tracking/webroot/ArchirecturalDrawing/' .$image_name;
            //nếu ko có lỗi xảy ra->> tiếp tục upload
                if (move_uploaded_file($file_tmp,$newname)){
                      $this->Flash->success(__('Saved image'));
                      $unitType->image=$image_name;
                    }
                /*
                *   Tiếp tục lưu data
                */
            if ($this->UnitTypes->save($unitType)) {
                $this->Flash->success(__('The unit type has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The unit type could not be saved. Please, try again.'));
        }
        $this->set(compact('unitType'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Unit Type id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $unitType = $this->UnitTypes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $unitType = $this->UnitTypes->patchEntity($unitType, $this->request->getData());
            if ($this->UnitTypes->save($unitType)) {
                $this->Flash->success(__('The unit type has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The unit type could not be saved. Please, try again.'));
        }
        $this->set(compact('unitType'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Unit Type id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $unitType = $this->UnitTypes->get($id);
        if ($this->UnitTypes->delete($unitType)) {
            $this->Flash->success(__('The unit type has been deleted.'));
        } else {
            $this->Flash->error(__('The unit type could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
