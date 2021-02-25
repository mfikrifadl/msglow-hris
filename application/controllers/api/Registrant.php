<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/RestController.php';

use chriskacerguis\RestServer\RestController;

class Registrant extends RestController
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('administrator/registrant/Person_model', 'registrant');
    }

    //view registrant
    function index_get($id="")
    {   
        if ($id == "") {
            $result = $this->registrant->view_('v_data_registrant');
        } else {
            $result = $this->registrant->view_('v_data_registrant', 'reg_id', $id);
        }

        if ($result) {
            $this->response([
                'status' => true,
                'data' => $result
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'data' => 'id_not_found'
            ], RestController::HTTP_NOT_FOUND);
        }
    }

    //delete registrant
    function index_delete($id=null)
    {
        if ($id === null) {
            //jika id tidak ada
            $this->response([
                'status' => false,
                'message' => 'provide an id'
            ], RestController::HTTP_BAD_REQUEST);
        } else {
            if ($this->registrant->delete_('registrant', 'reg_id', $id) > 0) {
                $this->response([
                    'status' => true,
                    'message' => 'deleted'
                ], RestController::HTTP_OK);
            } else {
                //jika id tidak ditemukan
                $this->response([
                    'status' => false,
                    'message' => 'id not found'
                ], RestController::HTTP_BAD_REQUEST);
            }
        }
    }

    //insert registrant
    function index_post(){
        $data = [
            'reg_id'        => $this->put('reg_id'),
            'job_id'        => $this->put('job_id'),
            'reg_name'      => $this->put('reg_name'),
            'graduate'      => $this->put('graduate'),
            'reg_email'     => $this->put('reg_email'),
            'reg_address'   => $this->put('reg_address'),
            'reg_tlp'       => $this->put('reg_tlp'),
            'is_delete'     => $this->put('is_delete'),
            'delete_date'     => $this->put('delete_date')           
        ];
        $data_filter = array_filter($data, 'strlen');
        if ($this->registrant->insert_('registrant', $data_filter) > 0){
            $this->response([
                'status' => true,
                'message' => 'new data has been created'
            ], RestController::HTTP_CREATED);
        } else{
            $this->response([
                'status' => false,
                'message' => 'failed to create new data'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    //update registrant
    function index_put($id=""){
        $data = [
            'reg_id'        => $this->put('reg_id'),
            'job_id'        => $this->put('job_id'),
            'reg_name'      => $this->put('reg_name'),
            'graduate'      => $this->put('graduate'),
            'reg_email'     => $this->put('reg_email'),
            'reg_address'   => $this->put('reg_address'),
            'reg_tlp'       => $this->put('reg_tlp'),
            'is_delete'     => $this->put('is_delete'),
            'delete_date'     => $this->put('delete_date')
        ];
        $data_filter = array_filter($data, 'strlen');
        // echo $this->put('is_delete');
        // print_r($data_filter);
        if ($this->registrant->update_('registrant', 'reg_id', $id, $data_filter) > 0){
            $this->response([
                'status' => true,
                'message' => 'the data has been updated'
            ], RestController::HTTP_CREATED);
        } else{
            $this->response([
                'status' => false,
                'message' => 'failed to update data'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }  
}
