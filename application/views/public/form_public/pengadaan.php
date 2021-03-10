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
                    Form Pengadaan
                </h3>
                <span class="kt-subheader__separator kt-hidden"></span>
            </div>
        </div>
    </div>

    <!-- end:: Subheader -->

    <form action="<?= base_url() ?>form_public/set_pengadaan" method="POST" enctype="multipart/form-data">
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
                                        <input type="text" class="form-control" name="name" placeholder="Nama Pelapor" value="" required />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1" style="color: #00b26a;">EMAIL</label>
                                        <input type="email" class="form-control" name="email" placeholder="Email" value="" required />
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1" style="color: #00b26a;">TELEPON</label>
                                        <input type="number" class="form-control" name="telepon" placeholder="Contact Person" value="" required />
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
                                    DATA PENGADAAN
                                </h3>
                            </div>
                        </div>
                        <!--begin::Form-->
                        <div class="kt-portlet__body">
                            <div class="form-group row">
                                <div class="table-responsive">
                                    <table class="table table-hovered table-striped" id="table">
                                        <thead>
                                            <tr class="info">
                                                <th width="25%">Nama Barang</th>
                                                <th width="15%">Harga</th>
                                                <th width="10%">Jumlah</th>
                                                <th width="5%"></th>
                                            </tr>
                                        <tbody id="additional">
                                            <?php $i = 0; ?>
                                            <tr class="active" id='tr0'>
                                                <td>
                                                    <input type="text" class="form-control ronly" id="nama0" name="input[0][nama]">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" id="harga0" value="0" name="input[0][harga]">
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control ronly" id="jumlah0" name="input[0][jumlah]">
                                                </td>
                                                <td>
                                                    <span class="btn btn-warning btn-sm fa fa-plus" id="luar" onclick="add()">+</span>
                                                </td>
                                            </tr>
                                        </tbody>

                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="kt-portlet__foot">
                            <div class="kt-form__actions">
                                <button type="submit" class="btn btn-primary">Ajukan Pengadaan</button>
                                <a href="/dashboard" class="btn btn-warning">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<script>
    var count = <?= $i; ?>;

    function add() {
        count = count + 1;
        var html = '<tr class="active" id="tr' + count + '"><td><input type="text" class="form-control ronly" id="nama' + count + '" name="input[' + count + '][nama]"></td><td>    <input type="text" class="form-control" id="harga' + count + '" value="0" name="input[' + count + '][harga]"></td><td>    <input type="text" class="form-control ronly" id="jumlah' + count + '" name="input[' + count + '][jumlah]"></td><td>    <span class="btn btn-warning btn-sm fa fa-plus" id="luar" onclick="add()">+</span><span class="btn btn-danger btn-sm fa fa-plus" id="luar" onclick="cdelete(' + count + ')">-</span></td></tr>';
        $('#additional').append(html);
    }

    function cdelete(id) {
        $('#tr' + id).remove();
    }
</script>