<?php

namespace App\Controllers;
use App\Models\Work_Order_Management_Model;

class Work_Order_Management_controller extends BaseController{

	protected $datas;
	function __construct(){

		$this->session = \Config\Services::session();

		$this->datas = new Work_Order_Management_Model();
	}

    public function generateWorkOrderId(){
        $rec = $this->datas->getWorkOrderId();
        if (!empty($rec)) {
            $newId = $rec['work_order_id'];
        }
        else{
            $newId = 0;
        }
        return $newId;
    }

    public function generateCommentsId(){
        $rec = $this->datas->generateCommentsId();
        if (!empty($rec)) {
            $newId = $rec['comment_id'];
        }
        else{
            $newId = 0;
        }
        return $newId;
    }

    public function save_work_order_data(){
            $data['title']= $this->request->getVar('title');
            $data['type'] = $this->request->getVar('type');
            $data['description'] = $this->request->getVar('description');
            $data['priority_id'] = $this->request->getVar('priority');
            $data['due_date'] = $this->request->getVar('due_date');
            $data['status_id'] = $this->request->getVar('status');
            $data['assignee'] = $this->request->getVar('assignee');
            if ($data['type'] == "issue") {
                $data['cause_id'] = $this->request->getVar('cause_list');
            }
            $data['action_id'] = $this->request->getVar('action_list');
            $data['lable_id'] = $this->request->getVar('lable_list');
            $data['attachment_id'] = $this->request->getVar('file_list_collection');
            $data['status'] = 1;
            $data['last_updated_by'] = $this->session->get('user_name');

            $id_gen = $this->generateWorkOrderId();
            $db_name = $this->session->get('active_site');
            $db_name = str_split($db_name);

            $data['work_order_id'] = strtoupper($db_name[0]).$db_name[1]."-W".(string)$id_gen;

            // $comment = $this->request->getVar('comments_list');
            // if ($comment != "") {
            //     $id_gen_comment = $this->generateCommentsId();
            //     $data['comment_id'] = strtoupper($db_name[0]).$db_name[1]."-CO".(string)$id_gen_comment;

            //     $c['comment_id'] = $data['comment_id'];
            //     $c['comment'] = $comment;
            //     $c['status'] = 1;
            //     $c['last_updated_by'] = $this->session->get('user_name');

            //     $r =  $this->datas->insertComments($c);
            //     if ($r != true) {
            //         echo json_encode(false);
            //     }
            // }


            // $data['site_id'] = $this->session->get('active_site');
            $res =  $this->datas->insertWorkOrder($data);
            if ($res == true) {
                echo json_encode($id_gen);
            }else{
                echo json_encode(false);
            }
    }

    public function update_work_order_data(){
            $ref = $this->request->getVar('work_order_id');
            $data['title']= $this->request->getVar('title');
            $data['type'] = $this->request->getVar('type');
            $data['description'] = $this->request->getVar('description');
            $data['priority_id'] = $this->request->getVar('priority');
            $data['due_date'] = $this->request->getVar('due_date');
            $data['status_id'] = $this->request->getVar('status');
            $data['assignee'] = $this->request->getVar('assignee');
            if ($data['type'] == "issue") {
                $data['cause_id'] = $this->request->getVar('cause_list');
            }
            $data['action_id'] = $this->request->getVar('action_list');
            $data['lable_id'] = $this->request->getVar('lable_list');
            $data['attachment_id'] = $this->request->getVar('file_list_collection');
            $data['last_updated_by'] = $this->session->get('user_name');

            $comment = $this->request->getVar('comments_list');
            $data['comment_id'] = "";
            if ($comment != "") {
                $id_gen_comment = $this->generateCommentsId();
                $db_name = $this->session->get('active_site');
                $db_name = str_split($db_name);
                $data['comment_id'] = strtoupper($db_name[0]).$db_name[1]."-CO".(string)$id_gen_comment;

                $c['comment_id'] = $data['comment_id'];
                $c['comment'] = $comment;
                $c['status'] = 1;
                $c['last_updated_by'] = $this->session->get('user_name');

                $r =  $this->datas->insertComments($c);
                if ($r != true) {
                    echo json_encode(false);
                }
            }

            $res =  $this->datas->updateWorkOrder($data,$ref);
            if ($res == true) {
                echo json_encode(true);
            }else{
                echo json_encode(false);
            }
    }

    public function get_work_order_data(){
        if ($this->request->isAJAX()) {
            $status = $this->request->getVar('status');
            $lables = $this->request->getVar('lables');
            $priority = $this->request->getVar('priority');
            $assignee= $this->request->getVar('assignee');
            $filter= $this->request->getVar('filter');

            // $status = ['1', '2', '3'];
            // $lables = ['S1-L0', 'S1-L1', 'S1-L2', 'S1-L3', 'S1-L4', 'S1-L5', 'S1-L6', 'S1-L7', 'S1-L8', 'S1-L9', 'S1-L10', 'S1-L11', 'S1-L12', 'S1-L13', 'S1-L14', 'S1-L15', 'S1-L16', 'S1-L17', 'S1-L18', 'S1-L19', 'S1-L20', 'S1-L21', 'S1-L22', 'S1-L23', 'S1-L24', 'S1-L25', 'S1-L26', 'S1-L27', 'S1-L28', 'S1-L29', 'S1-L30', 'S1-L31', 'S1-L32', 'S1-L33', 'S1-L34', 'S1-L35', 'S1-L36', 'S1-L37', 'S1-L38', 'S1-L39', 'S1-L40', 'S1-L41', 'S1-L42', 'S1-L43', 'S1-L44', 'S1-L45', 'S1-L46', 'S1-L47', 'S1-L48', 'S1-L49', 'S1-L50', 'S1-L51', 'S1-L52', 'S1-L53', 'S1-L54', 'S1-L55'];
            // $priority = ['1', '2', '3'];
            // $assignee= ['UM1002', 'UM1003', 'UM1004', 'UM1006', 'UM1007', 'UM1008', 'UO1001', 'UO1002', 'UO1003'];
            // $filter=false;

            $res = $this->datas->get_work_order_data();

            $final_list = [];
            foreach ($res as $value) {
                if (in_array($value['priority_id'], $priority)) {
                    if (in_array($value['status_id'], $status)) {
                        if (in_array($value['assignee'], $assignee)) {
                            $temp = explode(",", $value['lable_id']);
                            $common_elements = array_intersect($temp, $lables);
                            if (!empty($common_elements)) {
                                array_push($final_list, $value);
                            }
                        }
                    }
                }
            }

            if ($filter == false) {
                foreach ($res as $value) {
                    $temp=0;
                    if (($value['assignee']=="" || !$value['assignee'] || $value['assignee']==null) and $temp==0) {
                        array_push($final_list, $value);
                        $temp=1;
                    }
                    if (($value['priority_id']=="" || !$value['priority_id'] || $value['priority_id']==null) and $temp==0) {
                        array_push($final_list, $value);
                        $temp=1;
                    }
                    if (($value['lable_id']=="" || !$value['lable_id'] || $value['lable_id']==null) and $temp==0) {
                        array_push($final_list, $value);
                        $temp=1;
                    }
                    if (($value['status_id']=="" || !$value['status_id'] || $value['status_id']==null) and $temp==0) {
                        array_push($final_list, $value);
                        $temp=1;
                    }
                }
            }

            // echo "<pre>";
            // print_r($final_list);
            echo json_encode($final_list); 
        }
    }

    public function getFileData(){
        if ($this->request->isAJAX()) {
            $file = $this->datas->getFileData($this->request->getVar('ref'));
            echo json_encode($file);
        }
    }

    public function getAssignee(){
        if ($this->request->isAJAX()) {
            $users = $this->datas->getAssigneeId($this->session->get('active_site'));
            echo json_encode($users);
        }
    }

    public function getAction(){
        if ($this->request->isAJAX()) {
            $action = $this->datas->getAction();
            echo json_encode($action);
        }
    }

    public function getPriority(){
        if ($this->request->isAJAX()) {
            $priority = $this->datas->getPriority();
            echo json_encode($priority);
        }
    }

    public function getIssue(){
        if ($this->request->isAJAX()) {
            $issue = $this->datas->getIssue();
            echo json_encode($issue);
        }
    }

    public function getAttach(){
        if ($this->request->isAJAX()) {
            $attach = $this->datas->getAttach();
            echo json_encode($attach);
        }
    }

    public function getComments(){
        if ($this->request->isAJAX()) {
            $comment = $this->datas->getComments();
            echo json_encode($comment);
        }
    }

    public function getStatus(){
        if ($this->request->isAJAX()) {
            $status = $this->datas->getStatus();
            echo json_encode($status);
        }
    }

    public function getLable(){
        if ($this->request->isAJAX()) {
            $lable = $this->datas->getLableData();
            echo json_encode($lable);
        }
    }

    public function deleteWorkOrderRec(){
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('order_id');
            $lable = $this->datas->deleteWorkOrderRec($id);
            echo json_encode($lable);
        }
    }

    public function getEditRec(){
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('order_id');
            $lable = $this->datas->getEditRec($id);
            echo json_encode($lable);
        }
    }


    public function updateComments(){
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('ref');
            $val = $this->request->getVar('value');
            $ref = $this->request->getVar('c_ref');
            $res = $this->datas->updateComments($id,$val,$ref);
            echo json_encode($res);
        }
    }

    public function getCauseID(){
        if ($this->request->isAJAX()) {
            $cause = $this->request->getVar('cause');
            $cause_count = $this->datas->getCauseId($cause);
            $cause_count = $cause_count['cause_id'];
            $db_name = $this->session->get('active_site');
            $db_name = str_split($db_name);
            $id_gen = strtoupper($db_name[0]).$db_name[1]."-C".(string)$cause_count;

            // Insert Cause
            $data['cause_id'] = $id_gen;
            $data['cause'] = $cause;
            $data['status'] = 1;
            $data['last_updated_by'] = $this->session->get('user_name');
            $res = $this->datas->insertCause($data);
            if ($res == true) {
                echo json_encode($id_gen);
            }else{
                echo json_encode(false);
            }
                
        }
    }

    public function getActionID(){
        if ($this->request->isAJAX()) {
            $cause = $this->request->getVar('action');
            $cause_count = $this->datas->getActionId();
            $cause_count = $cause_count['action_id'];
            $db_name = $this->session->get('active_site');
            $db_name = str_split($db_name);
            $id_gen = strtoupper($db_name[0]).$db_name[1]."-A".(string)$cause_count;

            // Insert Action
            $data['action_id'] = $id_gen;
            $data['action'] = $cause;
            $data['status'] = 1;
            $data['last_updated_by'] = $this->session->get('user_name');
            $res = $this->datas->insertAction($data);
            if ($res == true) {
                echo json_encode($id_gen);
            }else{
                echo json_encode(false);
            }
                
        }
    }

    public function getAttachFileID(){
        if ($this->request->isAJAX()) {
            helper(['filesystem']);
            $file = $this->request->getFile('attach');
            $attach_count = $this->datas->getAttachFileID();
            $attach_count = $attach_count['attach_file_id'];
            $db_name = $this->session->get('active_site');
            $db_name = str_split($db_name);
            $id_gen = strtoupper($db_name[0]).$db_name[1]."-F".(string)$attach_count;

            if ($file->getSize() > 0) {      
                if ($file->isValid()) {
                    // if new site is create the folder then exisiting site ismove on
                    $directory = "./public/uploads/".$this->session->get('active_site');
                    if (!is_dir($directory)) {
                        mkdir($directory, 0777, TRUE);
                    }

                    $fileName = $id_gen;
                    $update['attach_file_id'] = $id_gen;
                    $update['original_file_name']= $file->getName();
                    $update['original_file_extension']= $file->getExtension();
                    $update['original_file_size_kb']= $file->getSizeByUnit('kb');
                    $update['uploaded_file_name'] = $fileName;
                    $update['uploaded_file_extension'] = $file->getExtension();
                    $update['status'] = 1;
                    $update['last_updated_by'] = $this->session->get('user_name');

                    $img_location_add = "/public/uploads/".$this->session->get('active_site');
                    $update['uploaded_file_location'] = base_url().$img_location_add.'/'."Work_Order_Files/";

                    if ($file->move($directory.'/'.'Work_Order_Files/',''.$fileName.''.'.'.$update['original_file_extension'])) {
                        if ($output = $this->datas->uploadWorkOrderFile($update)) {
                            //Redirect to Dahsboard
                            echo json_encode($fileName);
                        }else{
                            echo json_encode(false);
                        }
                    }            
                }
            }                
        }
    }

    public function getLableID(){
        if ($this->request->isAJAX()) {
            $cause = $this->request->getVar('lable');
            $cause_count = $this->datas->getLableId();
            $cause_count = $cause_count['lable_id'];
            $db_name = $this->session->get('active_site');
            $db_name = str_split($db_name);
            $id_gen = strtoupper($db_name[0]).$db_name[1]."-L".(string)$cause_count;

            // Insert Action
            $data['lable_id'] = $id_gen;
            $data['lable'] = $cause;
            $data['status'] = 1;
            $data['last_updated_by'] = $this->session->get('user_name');
            $res = $this->datas->insertLable($data);
            if ($res == true) {
                echo json_encode($id_gen);
            }else{
                echo json_encode(false);
            }
                
        }
    }
}
 ?>