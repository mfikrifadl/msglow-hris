<?php $whois = $this->session->userdata('nama'); ?>
<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
    <div class="row">
        <div class="col-sm-12">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                <li class="breadcrumb-item"><?= $menu ?></li>
                <li class="breadcrumb-item active"><?= $file ?></li>
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <!--Begin Content-->
            <div class="kt-portlet kt-portlet--mobile">
                <div class="kt-portlet__head kt-portlet__head--lg">
                    <div class="kt-portlet__head-label">
                        <span class="kt-portlet__head-icon">
                            <i class="kt-font-brand flaticon2-user"></i>
                        </span>
                        <h3 class="kt-portlet__head-title">
                            REGISTRANT DATA DETAILS
                        </h3>
                    </div>
                </div>
                <div class="kt-portlet__body">

                    <!--begin: Datatable -->
                    <?php
                    foreach ($registrant as $row) {
                    ?>

                        <div class="kt-form kt-form--label-right">
                            <div class="kt-portlet__body">
                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        <label>ID Pendaftar</label>
                                        <input type="text" class="form-control" placeholder="<?php echo $row['reg_id']; ?>" style="background-color:#fff;" disabled>
                                    </div>

                                    <div class="col-lg-4">
                                        <label>Nama Pendaftar</label>
                                        <input type="text" class="form-control" placeholder="<?php echo $row['reg_name']; ?>" style="background-color:#fff;" disabled>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Graduates</label>
                                        <input type="text" class="form-control" placeholder="<?php echo $row['graduate']; ?>" style="background-color:#fff;" disabled>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        <label>Mendaftar Sebagai</label>
                                        <input type="text" class="form-control" placeholder="<?php echo $row['job_name']; ?>" style="background-color:#fff;" disabled>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Email Pendaftar</label>
                                        <input type="text" class="form-control" placeholder="<?php echo $row['reg_email']; ?>" style="background-color:#fff;" disabled>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Alamat Pendaftar</label>
                                        <input type="text" class="form-control" placeholder="<?php echo $row['reg_address']; ?>" style="background-color:#fff;" disabled>
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        <label>Telp Pendaftar</label>
                                        <input type="text" class="form-control" placeholder="<?php echo $row['reg_tlp']; ?>" style="background-color:#fff;" disabled>
                                    </div>
                                    <?php
                                    foreach ($wawancara as $vData) {
                                    ?>
                                        <div class="col-lg-4">
                                            <label>Tgl Mendaftar</label>
                                            <input type="text" class="form-control" placeholder="<?php echo $vData['tanggal_wawancara']; ?>" style="background-color:#fff;" disabled>
                                        </div>
                                        <div class="col-lg-4">
                                            <label>Status</label>
                                            <input type="text" class="form-control" placeholder="<?php echo $vData['status']; ?>" style="background-color:#fff;" disabled>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-1 kt-align-center">

                                    </div>
                                    <div class="col-lg-10 kt-align-center">
                                        <h4 style="text-align: center; width: 100%;">Curriculum Vitae(CV)</h4>
                                        <iframe height="1000px" width="70%" src="<?php echo "http://192.168.100.16/career2/" . $row['reg_cv'] . "/" . $row['reg_judul']; ?>" style="width:100%; border:none;"></iframe>
                                    </div>
                                    <div class="col-lg-1 kt-align-center">

                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                    <!--end: Datatable -->
                </div>
                <div class="kt-portlet__foot">
                    <div class="kt-form__actions">
                        <a href="<?php echo base_url(); ?>recruitment/wawancara/" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
                    </div>
                </div>
            </div>
        </div>
        <!--End Content-->
    </div>

</div>

<!-- end:: Content -->