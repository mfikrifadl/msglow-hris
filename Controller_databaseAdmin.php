<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Controller_databaseAdmin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('root_crud_model');
        $this->load->model('relasi');
        $this->load->helper('form', 'url');
    }

    public function inputJobAdmin()
    {

        $job_name = $this->input->post('job_name');
        $job_req = $this->input->post('job_req');
        $career_lvl = $this->input->post('career_lvl');
        $job_desc = $this->input->post('job_desc');
        $qualification = $this->input->post('qualification');
        $ctg_job = $this->input->post('ctg_job');
        $sex = $this->input->post('sex');
        $exp = $this->input->post('exp');
        $study = $this->input->post('study');
        $wt = $this->input->post('wt');
        $date = $this->input->post('date');

        $idJ = date("YmdHis");       

        $ekstensi_diperbolehkan    = array('png', 'jpg', 'jpeg');
        $nama = $_FILES['poto']['name'];
        $x = explode('.', $nama);
        $ekstensi = strtolower(end($x));
        $ukuran    = $_FILES['poto']['size'];        

        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            if ($ukuran < 1000000) {
                //mengganti nama pdf
                $nama_baru = $idJ . "." . $ekstensi; //ganti nama file sesuai ekstensi
                $file_temp = $_FILES['poto']['tmp_name']; //data temp yang di upload
                $folder    = "assets/images/img_job_admin/$nama_baru"; //folder tujuan
               
                $data = array(
                    'job_name' => $job_name,
                    'job_req' => $job_req,
                    'career_lvl' => $career_lvl,
                    'job_desc' => $job_desc,
                    'qualification' => $qualification,
                    'ctg_job' => $ctg_job,
                    'sex' => $sex,
                    'exp' => $exp,
                    'study' => $study,
                    'wt' => $wt,
                    'date' => $date,
                    'idJ' => $idJ,
                    'nama_baru' => $nama_baru,
                    'file_temp' => $file_temp,
                    'folder' => $folder
                );
                $this->relasi->insertJobData($data);
            } else {
                $this->session->set_flashdata('login_stats', '** Sorry Your File is to Big.');
                $this->load->view('administrator/inputJob');
            }
        } else {
            $this->session->set_flashdata('login_stats', '** Sorry Your Ekstension File is not allowed.');
            $this->load->view('administrator/inputJob');
        }
    }
    public function inputEditJobAdmin()
    {
        $idEdit = $this->input->post('idEdit');
        $nama_job = $this->input->post('job_name_e');
        $ct_name = $this->input->post('category_name_e');
        $ct_sex = $this->input->post('category_sex_e');
        $career_lvl = $this->input->post('career_level_e');
        $pend = $this->input->post('study_e');
        $qual = $this->input->post('qualification_e');
        $exp = $this->input->post('exp_e');
        $wt = $this->input->post('work_time_e');
        $date_e = $this->input->post('date_e');
        $jr = $this->input->post('job_req_e');
        $jd = $this->input->post('job_desc_e');
        $old_path = $this->input->post('old_path');

        // echo "$old_path <br />";
        // echo "$idEdit <br />";
        // echo "$nama_job <br />";
        // echo "$ct_name <br />";
        // echo "$ct_sex <br />";
        // echo "$career_lvl <br />";
        // echo "$pend <br />";
        // echo "$qual <br />";
        // echo "$exp <br />";
        // echo "$wt <br />";
        // echo "$date_e <br />";
        // echo "$jr <br />";
        // echo "$jd <br />";

        $ekstensi_diperbolehkan    = array('png', 'jpg', 'jpeg');
        $nama = $_FILES['poto_e']['name'];
        $x = explode('.', $nama);
        $ekstensi = strtolower(end($x));
        $ukuran    = $_FILES['poto_e']['size'];

        // echo "nama file : " . $nama . " <br />";
        // echo "ekstensi : $ekstensi <br />";
        // echo "ukuran : $ukuran <br />";

        if ($nama == null && $ekstensi == null && $ukuran == 0) {
            //mengganti nama file
            $nama_baru = $nama;
            $file_temp = $_FILES['poto_e']['tmp_name']; //data temp yang di upload

            $nama_baru = null;
            $ekstensi = null;
            $ukuran = 0;
            $file_temp = null;

            // echo "nama baru file : $nama_baru <br />";
            // echo "file temp : $file_temp <br />";

            $data = array(
                'getId' => $idEdit,
                'ct_job_id' => $ct_name,
                's_date' => $date_e,
                'idEdit' => $idEdit,
                'nama_job' => $nama_job,
                'ct_name' => $ct_name,
                'ct_sex' => $ct_sex,
                'career_lvl' => $career_lvl,
                'pend' => $pend,
                'qual' => $qual,
                'exp' => $exp,
                'wt' => $wt,
                'date_e' => $date_e,
                'jr' => $jr,
                'jd' => $jd,
                'old_path' => $old_path,
                'nama_baru' => $nama_baru,
                'file_temp' => $file_temp
            );
             $this->relasi->insertJobDataEdit($data);
        } else {
            $data = [];
            if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
                if ($ukuran < 1000000) {
                    //mengganti nama file
                    $nama_baru = $idEdit . "." . $ekstensi; //ganti nama file sesuai ekstensi
                    $file_temp = $_FILES['poto_e']['tmp_name']; //data temp yang di upload
                    //$folder    = "assets/images/img_job_admin/$nama_baru"; //folder tujuan

                    // echo "nama baru file : $nama_baru <br />";
                    // echo "file temp : $file_temp <br />";

                    $data = array(
                        'getId' => $idEdit,
                        'pic_url' => $old_path,
                        'ct_job_id' => $ct_name,
                        's_date' => $date_e,
                        'idEdit' => $idEdit,
                        'nama_job' => $nama_job,
                        'ct_name' => $ct_name,
                        'ct_sex' => $ct_sex,
                        'career_lvl' => $career_lvl,
                        'pend' => $pend,
                        'qual' => $qual,
                        'exp' => $exp,
                        'wt' => $wt,
                        'date_e' => $date_e,
                        'jr' => $jr,
                        'jd' => $jd,
                        'old_path' => $old_path,
                        'nama_baru' => $nama_baru,
                        'file_temp' => $file_temp
                    );

                     $this->relasi->insertJobDataEdit($data);
                } else {
                    $this->session->set_flashdata('login_stats', '** Sorry Your File is to Big.');
                     $this->load->view('administrator/editViewJob', $data);
                }
            } else {
                $this->session->set_flashdata('login_stats', '** Sorry Your Ekstension File is not allowed.');
                 $this->load->view('administrator/editViewJob', $data);
            }
        }
    }
    public function getDataDeleteViewJob()
    {
        $getId = $_GET['idJob'];
        //echo "$getId";
        $data = array(
            'jobId' => $getId
        );
        $this->root_crud_model->deleteDataViewJob($data);
    }
    public function deleteRegistrant()
    {
        $getId = $_GET['regId'];
        //echo "$getId";
        $data = array(
            'getId' => $getId
        );
        $this->root_crud_model->deleteDataReg($data);
    }
    public function addNewJobPart()
    {
        $newJob = $this->input->post('New_job');
        $newJobName = ucwords($newJob);
        $id = date("YmdHis");
        $new = "ctg_job_$id";

        $data = array(
            'category_id' => $new,
            'category_name' => $newJob
        );
        
        $cView = $this->db->query("SELECT * FROM category_part  WHERE category_name = '" . $newJobName . "' ");
        if ($cView->num_rows() > 0) {
            $this->session->set_flashdata('login_stats', '** Job Name is Exist, Please Input Another Job Name.');            
            redirect(site_url('administrator/Controller_Root/inputNewCat/I'));
            // echo"gk masuk database <br />";
        } else {
            $this->root_crud_model->Insert('category_part', $data);
            $this->session->set_flashdata('login_stats', '** Data berhasil disimpan.');            
            redirect(site_url('administrator/Controller_Root/inputNewCat/I'));
            // echo"masuk database <br />";
        }
       
    }
    public function editJobPart()
    {
        $editJobPart = $this->input->post('edit_job');
        $idJobPart = $this->input->post('idJobCat');
        $ct_name = $this->input->post('job_name');

        $data = array(
            'editJobPart' => $editJobPart,
            'idJobPart' => $idJobPart,
            'ct_name' => $ct_name
        );
        $this->root_crud_model->getDataEditJobPart($data);
    }
    public function deleteJobCat()
    {
        $getId = $_GET['idJob'];
        //echo "$getId";
        $data = array(
            'getId' => $getId
        );
        $this->root_crud_model->getDeleteDataJobCat($data);
    }
}
