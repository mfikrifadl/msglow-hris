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
                                <div class="row">
                                    <div class="col-md-12">
                                    
                                        <div class="form-group">
                                            <a href="<?php echo base_url(); ?>recruitment/wawancara/" class="btn btn-primary btn-sm"><i class="fa fa-arrow-left"></i> Back</a>
                                        </div>
                                        <div class="kt-portlet">

                                            <!--begin::Accordion-->
                                            <div class="accordion accordion-solid accordion-toggle-plus" id="accordionDATA">
                                                <div class="card">
                                                    <div class="card-header" id="headingDATA">
                                                        <div class="card-title btn btn-primary text-info" data-toggle="collapse" data-target="#collapseDataDATA" aria-expanded="true" aria-controls="collapseDataDATA">
                                                            <strong> Data Pelamar </strong>
                                                        </div>
                                                    </div>
                                                    <div id="collapseDataDATA" class="collapse show" aria-labelledby="headingDATA" data-parent="#accordionDATA">
                                                        <div class="card-body">
                                                            <!--begin::Form-->
                                                            <div class="kt-portlet__body">
                                                                <div class="row">
                                                                    <div class="col-xl-4 col-lg-4 order-lg-1 order-xl-1">

                                                                        <div class="form-group">
                                                                            <label>ID Pendaftar</label>
                                                                            <input type="text" class="form-control" placeholder="<?php echo $row['reg_id']; ?>" style="background-color:#fff;" disabled>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label>Email Pendaftar</label>
                                                                            <input type="text" class="form-control" placeholder="<?php echo $row['reg_email']; ?>" style="background-color:#fff;" disabled>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label>Telp Pendaftar</label>
                                                                            <input type="text" class="form-control" placeholder="<?php echo $row['reg_tlp']; ?>" style="background-color:#fff;" disabled>
                                                                        </div>



                                                                    </div>

                                                                    <div class="col-xl-4 col-lg-4 order-lg-1 order-xl-1">
                                                                        <div class="form-group">
                                                                            <label>Nama Pendaftar</label>
                                                                            <input type="text" class="form-control" placeholder="<?php echo $row['reg_name']; ?>" style="background-color:#fff;" disabled>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label>Graduates</label>
                                                                            <input type="text" class="form-control" placeholder="<?php echo $row['graduate']; ?>" style="background-color:#fff;" disabled>
                                                                        </div>

                                                                    </div>

                                                                    <div class="col-xl-4 col-lg-4 order-lg-1 order-xl-1">
                                                                        <div class="form-group">
                                                                            <label>Mendaftar Sebagai</label>
                                                                            <input type="text" class="form-control" placeholder="<?php echo $row['job_name']; ?>" style="background-color:#fff;" disabled>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <label>Alamat Pendaftar</label>
                                                                            <input type="text" class="form-control" placeholder="<?php echo $row['reg_address']; ?>" style="background-color:#fff;" disabled>
                                                                        </div>

                                                                    </div>

                                                                </div>

                                                            </div>
                                                            <!--end::Portlet Data Kontak-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Accordion-->
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-md-6 kt-align-center">
                                        <div class="kt-portlet">

                                            <!--begin::Accordion-->

                                            <div class="accordion accordion-solid accordion-toggle-plus" id="accordionKTP">
                                                <div class="card">
                                                    <div class="card-header" id="heading1">
                                                        <div class="card-title btn btn-primary text-info" data-toggle="collapse" data-target="#collapseDataKTP" aria-expanded="true" aria-controls="collapseDataKTP">
                                                            <strong> Kartu Tanda Penduduk </strong>
                                                        </div>
                                                    </div>
                                                    <div id="collapseDataKTP" class="collapse show" aria-labelledby="heading1" data-parent="#accordionKTP">
                                                        <div class="card-body">
                                                            <!--begin::Form-->
                                                            <div class="kt-portlet__body">
                                                                <div class="row">
                                                                    <?php
                                                                    if ($row['reg_ktp'] != null) { ?>
                                                                        <iframe height="400px" width="100%" src="<?= "http://103.157.96.97/msglow-career/" . $row['reg_ktp']; ?>" style="width:100%; border:none;"></iframe>
                                                                    <?php } else {
                                                                    }
                                                                    ?>
                                                                </div><!-- /.row -->
                                                            </div>
                                                            <!--end::Portlet Data Kontak-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Accordion-->
                                        </div>
                                    </div>

                                    <div class="col-md-6 kt-align-center">
                                        <div class="kt-portlet">

                                            <!--begin::Accordion-->

                                            <div class="accordion accordion-solid accordion-toggle-plus" id="accordionKK">
                                                <div class="card">
                                                    <div class="card-header" id="headingKK">
                                                        <div class="card-title btn btn-primary text-info" data-toggle="collapse" data-target="#collapseDataKK" aria-expanded="true" aria-controls="collapseDataKK">
                                                            <strong> Kartu Keluarga </strong>
                                                        </div>
                                                    </div>
                                                    <div id="collapseDataKK" class="collapse show" aria-labelledby="headingKK" data-parent="#accordionKK">
                                                        <div class="card-body">
                                                            <!--begin::Form-->
                                                            <div class="kt-portlet__body">
                                                                <div class="row">
                                                                    <?php
                                                                    if ($row['reg_kk'] != null) { ?>
                                                                        <iframe height="400px" width="100%" src="<?= "http://103.157.96.97/msglow-career/" . $row['reg_kk']; ?>" style="width:100%; border:none;"></iframe>
                                                                    <?php } else {
                                                                    }
                                                                    ?>
                                                                </div><!-- /.row -->
                                                            </div>
                                                            <!--end::Portlet Data Kontak-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Accordion-->
                                        </div>
                                    </div>

                                    <div class="col-md-6 kt-align-center">
                                        <div class="kt-portlet">

                                            <!--begin::Accordion-->

                                            <div class="accordion accordion-solid accordion-toggle-plus" id="accordionIJAZAH">
                                                <div class="card">
                                                    <div class="card-header" id="headingIJAZAH">
                                                        <div class="card-title btn btn-primary text-info" data-toggle="collapse" data-target="#collapseDataIJAZAH" aria-expanded="true" aria-controls="collapseDataIJAZAH">
                                                            <strong> Ijazah Terakhir </strong>
                                                        </div>
                                                    </div>
                                                    <div id="collapseDataIJAZAH" class="collapse show" aria-labelledby="headingIJAZAH" data-parent="#accordionIJAZAH">
                                                        <div class="card-body">
                                                            <!--begin::Form-->
                                                            <div class="kt-portlet__body">
                                                                <div class="row">
                                                                    <?php
                                                                    if ($row['reg_ijazah'] != null) { ?>
                                                                        <iframe height="400px" width="100%" src="<?= "http://103.157.96.97/msglow-career/" . $row['reg_ijazah']; ?>" style="width:100%; border:none;"></iframe>
                                                                    <?php } else {
                                                                    }
                                                                    ?>
                                                                </div><!-- /.row -->
                                                            </div>
                                                            <!--end::Portlet Data Kontak-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Accordion-->
                                        </div>
                                    </div>

                                    <div class="col-md-6 kt-align-center">
                                        <div class="kt-portlet">

                                            <!--begin::Accordion-->

                                            <div class="accordion accordion-solid accordion-toggle-plus" id="accordionTN">
                                                <div class="card">
                                                    <div class="card-header" id="headingTN">
                                                        <div class="card-title btn btn-primary text-info" data-toggle="collapse" data-target="#collapseDataTN" aria-expanded="true" aria-controls="collapseDataTN">
                                                            <strong> Transkrip Nilai </strong>
                                                        </div>
                                                    </div>
                                                    <div id="collapseDataTN" class="collapse show" aria-labelledby="headingTN" data-parent="#accordionTN">
                                                        <div class="card-body">
                                                            <!--begin::Form-->
                                                            <div class="kt-portlet__body">
                                                                <div class="row">
                                                                    <?php
                                                                    if ($row['reg_transkrip_nilai'] != null) { ?>
                                                                        <iframe height="400px" width="100%" src="<?= "http://103.157.96.97/msglow-career/" . $row['reg_transkrip_nilai']; ?>" style="width:100%; border:none;"></iframe>
                                                                    <?php } else {
                                                                    }
                                                                    ?>
                                                                </div><!-- /.row -->
                                                            </div>
                                                            <!--end::Portlet Data Kontak-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Accordion-->
                                        </div>
                                    </div>

                                    <div class="col-md-6 kt-align-center">
                                        <div class="kt-portlet">

                                            <!--begin::Accordion-->

                                            <div class="accordion accordion-solid accordion-toggle-plus" id="accordionSKCK">
                                                <div class="card">
                                                    <div class="card-header" id="headingSKCK">
                                                        <div class="card-title btn btn-primary text-info" data-toggle="collapse" data-target="#collapseDataSKCK" aria-expanded="true" aria-controls="collapseDataSKCK">
                                                            <strong> SKCK </strong>
                                                        </div>
                                                    </div>
                                                    <div id="collapseDataSKCK" class="collapse show" aria-labelledby="headingSKCK" data-parent="#accordionSKCK">
                                                        <div class="card-body">
                                                            <!--begin::Form-->
                                                            <div class="kt-portlet__body">
                                                                <div class="row">
                                                                    <?php
                                                                    if ($row['reg_skck'] != null) { ?>
                                                                        <!-- <iframe height="400px" width="100%" src="<?php //echo base_url() . $row['reg_skck']; 
                                                                                                                        ?>" style="width:100%; border:none;"></iframe> -->
                                                                        <iframe height="400px" width="100%" src="<?= "http://103.157.96.97/msglow-career/" . $row['reg_skck']; ?>" style="width:100%; border:none;"></iframe>
                                                                    <?php } else {
                                                                    }
                                                                    ?>
                                                                </div><!-- /.row -->
                                                            </div>
                                                            <!--end::Portlet Data Kontak-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Accordion-->
                                        </div>
                                    </div>

                                    <div class="col-md-6 kt-align-center">
                                        <div class="kt-portlet">

                                            <!--begin::Accordion-->

                                            <div class="accordion accordion-solid accordion-toggle-plus" id="accordionCV">
                                                <div class="card">
                                                    <div class="card-header" id="headingCV">
                                                        <div class="card-title btn btn-primary text-info" data-toggle="collapse" data-target="#collapseDataCV" aria-expanded="true" aria-controls="collapseDataCV">
                                                            <strong> Curiculum Vitae </strong>
                                                        </div>
                                                    </div>
                                                    <div id="collapseDataCV" class="collapse show" aria-labelledby="headingCV" data-parent="#accordionCV">
                                                        <div class="card-body">
                                                            <!--begin::Form-->
                                                            <div class="kt-portlet__body">
                                                                <div class="row">
                                                                    <?php
                                                                    if ($row['reg_cv'] != null) { ?>
                                                                        <iframe height="400px" width="100%" src="<?= "http://103.157.96.97/msglow-career/" . $row['reg_cv']  ?>" style="width:100%; border:none;"></iframe>
                                                                        <!-- <iframe height="400px" width="100%" src="<?php //echo base_url() . $row['reg_cv'] . "/" . $row['reg_judul']; 
                                                                                                                        ?>" style="width:100%; border:none;"></iframe> -->
                                                                    <?php } else {
                                                                    }
                                                                    ?>
                                                                </div><!-- /.row -->
                                                            </div>
                                                            <!--end::Portlet Data Kontak-->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Accordion-->
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                    <?php
                    }
                    ?>

                    <!--end: Datatable -->
                </div>

            </div>
        </div>
        <!--End Content-->
    </div>

</div>

<!-- end:: Content -->