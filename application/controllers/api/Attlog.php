<?php

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/RestController.php';
require APPPATH . '/libraries/Format.php';

use chriskacerguis\RestServer\RestController;

class Attlog extends RestController
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('model');
    }

    //view job
    function index_get($id=null)
    {
        if ($id === null) {
            $result = $this->model->ViewAttlogAPI('attlog');
        } else {
            $result = $this->model->ViewAttlogAPI('attlog', 'pin', $id);
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

    //delete job
    function index_delete($id=null)
    {
        if ($id === null) {
            $this->response([
                'status' => false,
                'message' => 'provide an id'
            ], RestController::HTTP_BAD_REQUEST);
        } else {
            if ($this->model->delete_() > 0) {
                $this->response([
                    'status' => true,
                    'message' => 'deleted'
                ], RestController::HTTP_OK);
            } else {
                //id tidak ditemukan
                $this->response([
                    'status' => false,
                    'message' => 'id not found'
                ], RestController::HTTP_BAD_REQUEST);
            }
        }
    }

    //insert job
    function index_post(){
        $data = [
            'pin'        => $this->post('pin'),
            'attlog'        => $this->post('attlog'),
            'verify'      => $this->post('verify'),
            'status_scan'      => $this->post('status_scan'),
            'cloud_id'     => $this->post('cloud_id')           
        ];
        $data_filter = array_filter($data, 'strlen');
        if ($this->model->insert_('attlog', $data_filter) > 0){
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

    //update job
    function index_put($id=""){
        $data = [];

        
    }
}
