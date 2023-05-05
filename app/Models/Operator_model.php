<?php 

namespace App\Models;
use CodeIgniter\Model;

class Operator_model extends Model{
    protected $db;
    protected $session;
    function __construct(){
        $this->db      = \Config\Database::connect("another_db");
       $this->session = \Config\Services::session();
    }
    public function login($username,$pass){
        // $dmeo =  "username".$username."password:".$pass;

        // return $dmeo;
        
        $builder = $this->db->table('user as u');
        $builder->select('u.*,p.*');
        $builder->join('user_credintials as p','u.user_id=p.user_id');
        $builder->where('u.username', $username);

        // $builder->where('Password', $pass);
        $query = $builder->get()->getResultArray();
        if (count($query)>0) {
            $existing_pass = $query[0]['password'];
            if ($query[0]['status']==1) {
                if (password_verify($pass,$existing_pass)) {
                    $this->session->set('op_id', $query[0]['user_id']);
                    $this->session->set('op_user_name', $query[0]["username"]);
                    return "password_matched";
                }else{
                    return "password_mismatched";
                }
            }else{
                return "inactive_user";
            }
        }else{
            return "New_User";
        }
       

    }

    public function getmachine_part($site_id){
        $builder = $this->db->table('settings_site_machine');
        $builder->select('Machine_Id');
        $builder->where('Site_ID', $site_id);
        $query = $builder->get()->getResult();

        foreach($query as $row){
            $machine_id = $row->Machine_Id;
        }

        $this->session->set('machine_id',$machine_id);

        $build = $this->db->table('settings_site_part');
        $build->select('Part_Id,Part_Name');
        $build->where('Machine_Id',$machine_id);
        $output = $build->get()->getResult();

        foreach($output as $data){
            $part_id = $data->Part_Id;
            $part_name = $data->Part_Name;
        }
        $this->session->set('part_id',$part_id);
        $this->session->set('part_name',$part_name);

        return $output;
        
    }
}




?>