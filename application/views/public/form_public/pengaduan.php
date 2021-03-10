<div class="kt-content kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
    <?php if ($this->session->flashdata('flash')) { ?>
        <div class="alert alert-primary" role="alert">
            <?= $this->session->flashdata('flash'); ?>
        </div>
    <?php } ?>
    <!-- begin:: Subheader -->
    <div class="kt-subheader kt-grid__item" id="kt_subheader">
        <div class="kt-container kt-container--fluid">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    Form Keluhan
                </h3>
                <span class="kt-subheader__separator kt-hidden"></span>
            </div>
        </div>
    </div>

    <!-- end:: Subheader -->

    <form action="<?= base_url() ?>Form_public/set_pengaduan" method="POST" enctype="multipart/form-data">
        <div class="kt-container kt-container--fluid kt-grid__item kt-grid__item--fluid">
            <div class="row">
                <div class="col-md-6">
                    <!--begin::Portlet-->
                    <div class="kt-portlet">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    FORM DATA CUSTOMER
                                </h3>
                            </div>
                        </div>

                        <div class="kt-portlet__body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1" style="color: #00b26a;">NAMA</label>
                                        <input type="text" class="form-control" name="input[name]" placeholder="Nama Pelapor" value="" required />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1" style="color: #00b26a;">EMAIL</label>
                                        <input type="text" class="form-control" name="input[email]" placeholder="Email" value="" required />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1" style="color: #00b26a;">TELEPON</label>
                                        <input type="text" class="form-control" name="input[telepon]" placeholder="Contact Person" value="" required />
                                    </div>
                                </div>

                            </div>
                            <!--end::Form-->
                        </div>

                    </div>
                </div>
                <div class="col-md-6">
                    <!--begin::Portlet-->
                    <div class="kt-portlet">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    DATA KELUHAN
                                </h3>
                            </div>
                        </div>
                        <!--begin::Form-->
                        <div class="kt-portlet__body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1" style="color: #00b26a;">Permasalahan</label>
                                        <select class="form-control" name="input[permasalahan_id]">
                                            <option value=""></option>
                                            <?php foreach ($permasalahans as $permasalahan) { ?>
                                                <option value="<?= $permasalahan['id'] ?>"><?= $permasalahan['name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1" style="color: #00b26a;">Informasi Permasalahan</label>
                                        <input type="text" class="form-control" name="input[description]" placeholder="Informasi Permasalahan" value="" required />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                                <button type="submit" class="btn btn-primary">Buat Pengaduan</button>
                                <a href="/dashboard" class="btn btn-warning">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>