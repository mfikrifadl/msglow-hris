<?php

?>
<?php
if ($action == "edit") {
    foreach ($field as $column) {
        $cIdSuratPeringatan     =   $column['id'];
        $cIdPegawai             =   $column['id_pegawai'];
        $cIdKategoriSurat       =   $column['id_kategori_surat'];
        $cJum_teguran_lisan     =   $column['jum_teguran_lisan'];
        $dTgl                   =   $column['tanggal'];
        $cNikPegawai            =   $column['nik'];
        $cNama                  =   $column['nama'];
        $cKeterangan            =   $column['keterangan_teguran'];
        $cIconButton            =   "refresh";
        $cValueButton           =   "Update Data";
    }
    $cAction = "Update/" . $cIdSuratPeringatan . "";
}
// elseif ($action == "view") {
//     foreach ($field as $column) {
//         $cIdSuratPeringatan     =   $column['id'];
//         $cIdPegawai             =   $column['id_pegawai'];
//         $cIdKategoriSurat       =   $column['id_kategori_surat'];
//         $cJum_teguran_lisan     =   $column['jum_teguran_lisan'];
//         $dTgl                   =   $column['tanggal'];
//         $cNikPegawai            =   $column['nik'];
//         $cNama                  =   $column['nama'];
//         $cKeterangan            =   $column['keterangan_teguran'];
//         $cIconButton            =   "refresh";
//         $cValueButton           =   "Kembali";
//     }
//     $cAction = "Update/" . $cIdSuratPeringatan . "";
// } 
else {
    $cIdSuratPeringatan =   "";
    $cIdPegawai =   "";
    $cIdKategoriSurat   =   "";
    $cJum_teguran_lisan =   "";
    $dTgl               =   "";
    $cNikPegawai         =   "";
    $cNama         =   "";
    $cKeterangan        =   "";
    $cIconButton    =   "save";
    $cValueButton   =   "Insert Data";
    $cAction        =   "Insert";
}

?>
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

        <div class="col-4">
            <form method="post" enctype="multipart/form-data" action="<?= site_url('surat_act/teguran_lisan/' . $cAction . '') ?>">
                <!--begin::Portlet-->
                <div class="kt-portlet kt-portlet--height-fluid">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Form Teguran Lisan
                            </h3>
                        </div>
                    </div>

                    <div class="kt-portlet__body">
                        <div style="text-align: center;">
                            <h5 style="color:black">HUMAN RESOURCES DEVELOPMENT</h5>
                            <hr />
                        </div>

                        <?php
                        if ($action == "view") { ?>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-4 col-form-label">Tertanggal: </label>
                                <div class="col-8">
                                    <input type="date" name="dTgl" class="form-control" placeholder="Tanggal" value="<?= $dTgl ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-4 col-form-label">Perihal: </label>
                                <label for="example-text-input" class="col-5 col-form-label"> Teguran Lisan ke - </label>
                                <div class="col-3">
                                    <input type="number" name="tl" class="form-control" value="<?= $cJum_teguran_lisan ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-4 col-form-label">Nama :</label>
                                <div class="col-8">
                                    <input type="text" class="form-control" readonly="true" value=" <?= $cNama ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-4 col-form-label">NIK :</label>
                                <div class="col-8">
                                    <input type="text" name="cNik" id="cNik" class="form-control" readonly="true" value="<?= $cNikPegawai ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-4 col-form-label">Jabatan :</label>
                                <div class="col-8">
                                    <input type="text" name="cJabatan" id="cJabatan" class="form-control" readonly="true" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-4 col-form-label">Keterangan :</label>
                                <div class="col-8">
                                    <textarea class="form-control" name="cKet" placeholder="Keterangan"> <?= $cKeterangan ?> </textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <a href="<?= site_url('transaksi/teguran_lisan') ?>" class="btn btn-primary">
                                    <i class="fa fa-hand-point-left" aria-hidden="true"></i> Kembali
                                </a>
                            </div>

                        <?php
                        } else { ?>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-4 col-form-label">Tertanggal: </label>
                                <div class="col-8">
                                    <input type="date" name="dTgl" class="form-control" placeholder="Tanggal" value="<?= $dTgl ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-4 col-form-label">Perihal: </label>
                                <label for="example-text-input" class="col-5 col-form-label"> Teguran Lisan ke - </label>
                                <div class="col-3">
                                    <input type="number" name="tl" class="form-control" value="<?= $cJum_teguran_lisan ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-4 col-form-label">Nama :</label>
                                <div class="col-8">
                                    <select class="comboBox form-control" onchange="changeValue(this.value)" name="cIdPegawai">
                                        <option></option>
                                        <?php
                                        $jsArray = "var jason = new Array();\n";
                                        foreach ($pegawai as $dbRow) {
                                        ?>
                                            <option value="<?= $dbRow['id_pegawai'] ?>" <?php if ($dbRow['id_pegawai'] == $cIdPegawai) echo 'selected'; ?>>
                                                <?= $dbRow['nik'] ?> : <?= $dbRow['nama'] ?>
                                            </option>';
                                        <?php
                                            $jsArray .= "jason['" . $dbRow['id_pegawai'] . "'] = {nik:'" . addslashes(($dbRow['nik'])) . "'};\n";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-4 col-form-label">NIK :</label>
                                <div class="col-8">
                                    <input type="text" name="cNik" id="cNik" class="form-control" readonly="true" value="<?= $cNikPegawai ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-4 col-form-label">Jabatan :</label>
                                <div class="col-8">
                                    <input type="text" name="cJabatan" id="cJabatan" class="form-control" readonly="true" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-text-input" class="col-4 col-form-label">Keterangan :</label>
                                <div class="col-8">
                                    <textarea class="form-control" name="cKet" placeholder="Keterangan" value="<?= $cKeterangan ?>"></textarea>
                                </div>
                            </div>

                            <input type="hidden" name="idSurat" value="2">

                            <div class="form-group">
                                <button type="submit" class="btn btn-flat btn-danger">
                                    <i class="fa fa-<?= $cIconButton ?>"></i> <?= $cValueButton ?>
                                </button>
                            </div>

                        <?php
                        }
                        ?>



                    </div>
                </div>

                <!--end::Portlet-->
            </form>
        </div>

        <div class="col-8">

            <!--begin::Portlet-->
            <div class="kt-portlet kt-portlet--height-fluid">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            Data Table Teguran Lisan
                        </h3>
                    </div>
                </div>

                <div class="kt-portlet__body">
                    <table class="table table-striped table-bordered" id="DataTable">
                        <thead>
                            <tr>
                                <td>No</td>
                                <td>Tanggal</td>
                                <td>NIK</td>
                                <td>Pegawai</td>
                                <td>Tipe Surat</td>
                                <td>Jumlah</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 0;
                            foreach ($row as $key => $vaPeringatan) {
                            ?>
                                <tr>
                                    <td><?= ++$no; ?></td>
                                    <td><?= ($vaPeringatan['tanggal']) ?></td>
                                    <td><?= ($vaPeringatan['nik']) ?></td>
                                    <td><?= ($vaPeringatan['nama']) ?></td>
                                    <td><?= ($vaPeringatan['Keterangan']) ?></td>
                                    <td><?= ($vaPeringatan['jum_teguran_lisan']) ?></td>
                                    <td>
                                        <a class="btn-link" title="View Data" href="<?= site_url('transaksi/teguran_lisan/view/' . $vaPeringatan['id'] . '') ?>">
                                            <i class="fa fa-eye text-success"></i>
                                        </a>
                                        |
                                        <a class="btn-link" title="Edit Data" href="<?= site_url('transaksi/teguran_lisan/edit/' . $vaPeringatan['id'] . '') ?>">
                                            <i class="fa fa-edit text-info"></i>
                                        </a>
                                        |
                                        <a class="btn-link" title="Hapus Data" onclick="if(confirm('Apakah anda yakin akah menghapus data?'))
                                { window.location.href='<?= site_url('surat_act/teguran_lisan/Delete/' . $vaPeringatan['id'] . '') ?>'}">
                                            <i class="fa fa-trash text-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>

            <!--end::Portlet-->

        </div>
    </div>

    <div class="row">

    </div>
</div>


<script type="text/javascript">
    <?php echo $jsArray; ?>

    function changeValue(id) {
        document.getElementById('cNik').value = jason[id].nik;
        document.getElementById('cJabatan').value = jason[id].nama_jabatan;
    };
</script>