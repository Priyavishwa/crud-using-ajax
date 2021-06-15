<?php
/**
 * Author: Priya V
 * Date:04/06/2021
 */
class Crud extends CI_Controller
{
    public function index()
    {
        $data['allRecords'] = $this->modCrud->getAllRecords();
        $this->load->view('home',$data);
        
    }

    public function addUser()
    {
        if(!$this->input->is_ajax_request()){
            $this->session->set_flashdata('error',
            'please call the ajax request');
            redirect('Crud');
            echo 'redirect to a url';

        }
        else{
            $data['sName'] = $this->input->post('name',true);
            $data['sEmail'] = $this->input->post('email',true);
            $data['sPassword'] = $this->input->post('password',true);
            $data['sDate'] = date('y-m-d h:i:sa');
            $returnType = $this->modCrud->addNewUser($data);
            if(is_integer($returnType)){
                //echo $returnType;
                $lastRecord = $this->modCrud->getLastRecord($returnType);
                if(count($lastRecord) === 1){
                    echo json_encode($lastRecord); 
                    echo 'works';

                }
                else{
                    echo 'not works';

                }
                //echo 'you have successfully added your student.';

            }
            else{
                echo 'you can not add your user right now, please try again';


            }

        }


    }

    public function checkUser()
    {
        if(!$this->input->is_ajax_request()){
            echo 'redirect here';

        }
        else{
            //fetching id
            $data['sId'] = $this->input->post('text',true);
            $data['sId'] = $this->encryption->decrypt($data[sId]);
            $myresult = $this->modCrud->checkUser($data);
            if(count($myresult) === 1){

                //converting result into json format
                echo json_encode($myresult);
                echo 'working';
            }
            else{
                echo 'not found';
            }
        }
    }        
    
    
}

?>