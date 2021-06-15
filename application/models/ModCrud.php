<?php
/**
 * Author: Priya V
 * Date:04/06/2021
 */
class ModCrud extends CI_Model
{
    public function addNewUser($data)
    {
        //return 
        $this->db->insert('students',$data);
        return $this->db->insert_id();
    }

    public function getAllRecords(){
        $this->db->order_by('sId','desc');
        return $this->db->get('students');
    }

    public function getLastRecord($sId){
        return $this->db->get_where('students',
        array('sId'=>$sId))->result_array();


    }

    public function checkUser($data)
    {
        return $this->db->get_where('students',$data)
        ->result_array();
    }

}

?>