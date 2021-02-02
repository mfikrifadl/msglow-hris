<?php
//SetKode
if (date("m") == '01') {
    $cRomawai = 'I';
} elseif (date("m") == '02') {
    $cRomawai = 'II';
} elseif (date("m") == '03') {
    $cRomawai = 'III';
} elseif (date("m") == '04') {
    $cRomawai = 'IV';
} elseif (date("m") == '05') {
    $cRomawai = 'V';
} elseif (date("m") == '06') {
    $cRomawai = 'VI';
} elseif (date("m") == '07') {
    $cRomawai = 'VII';
} elseif (date("m") == '08') {
    $cRomawai = 'VIII';
} elseif (date("m") == '09') {
    $cRomawai = 'IX';
} elseif (date("m") == '10') {
    $cRomawai = 'X';
} elseif (date("m") == '11') {
    $cRomawai = 'XI';
} elseif (date("m") == '12') {
    $cRomawai = 'XII';
}

foreach ($Nolast->result_array() as $key => $vaDataLast) {
    $cLastNoSurat = $vaDataLast['nomor_surat'];
}


if ($Nolast->num_rows() > 0) {
    $NoSuratTerakhir = $cLastNoSurat;
} else {
    $NoSuratTerakhir = "No.0001/ST/HRD/" . $cRomawai . "/" . date("Y") . "";
}

$cNomorSuratFix = "No." . "####" . "/ST/HRD/" . $cRomawai . "/" . date("Y") . " ";
?>
<?php

if ($action == "edit") {
    $cNikPegawai = $nik_select;
    $cNamaJabatan = $nj_select;

    foreach ($field as $column) {
        $cIdSuratPeringatan =   $column['id'];
        $cIdKategoriSurat   =   $column['id_kategori_surat'];
        $dTgl               =   $column['tanggal'];
        $tgl_mulai_berlaku               =   $column['mulai_berlaku'];
        $tgl_berlaku_sampai               =   $column['berlaku_sampai'];
        $nNomorSurat        =   $column['nomor_surat'];
        $cIdPegawai         =   $column['id_pegawai'];
        // $cNikPegawai            =   $column['nik'];
        // $cNama                  =   $column['nama'];
        // $cOutlet            =   $column['outlet'];
        $cUraian            =   $column['uraian'];
        // $cKeterangan        =   $column['keterangan'];
        $cCreate            =   $column['create'];
        $cCC                =   $column['general_manager'];
        $cIconButton        =   "refresh";
        $cValueButton       =   "Update Data";
    }
    $cAction = "Update/" . $cIdSuratPeringatan . "";
} else {
    $cIdSuratPeringatan =   "";
    $cIdKategoriSurat   =   "";
    $dTgl               =   "";
    $tgl_mulai_berlaku               =   "";
    $tgl_berlaku_sampai               =   "";
    $nNomorSurat        =   $cNomorSuratFix;
    $cIdPegawai         =   "";
    $cNikPegawai            =   "";
    $cNama                  =  "";
    // $cOutlet            =   "";
    $cUraian            =   "";
    // $cKeterangan        =   "";
    $cCreate            =   "Venna Rosia Marheta";
    $cCC                =   "";
    $cIconButton    =   "save";
    $cValueButton   =   "Save Data";
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
        <div class="col-md-12">
            <!--begin::Portlet Data Kontak-->
            <div class="kt-portlet">

                <!--begin::Accordion-->

                <div class="accordion accordion-solid accordion-toggle-plus" id="accordionDataTable">
                    <div class="card">
                        <div class="card-header" id="headingDataTable">
                            <div class="card-title btn btn-primary text-info" data-toggle="collapse" data-target="#collapseDataTable" aria-expanded="true" aria-controls="collapseDataTable">
                                <strong> Data Table Surat Teguran </strong>
                            </div>
                        </div>
                        <div id="collapseDataTable" class="collapse show" aria-labelledby="headingDataTable" data-parent="#accordionDataTable">
                            <div class="card-body">
                                <!--begin::Form-->
                                <div class="kt-portlet__body">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">

                                            <table class="table table-striped table-bordered" id="DataTable">
                                                <thead>
                                                    <tr>
                                                        <td>No</td>
                                                        <td>Tanggal</td>
                                                        <td>Nomor Surat</td>
                                                        <td>Pegawai</td>
                                                        <td>Tipe Surat</td>
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
                                                            <td><?= ($vaPeringatan['nomor_surat']) ?></td>
                                                            <td><?= ($vaPeringatan['nama']) ?></td>
                                                            <td><?= ($vaPeringatan['keterangan_surat']) ?></td>
                                                            <td class="text-center">
                                                                <a class="btn-link" title="View Data" href="<?= site_url('transaksi/surat_teguran/view/' . $vaPeringatan['id'] . '') ?>">
                                                                    <i class="fa fa-eye text-success"></i>
                                                                </a>
                                                                |
                                                                <a class="btn-link" title="Edit Data" href="<?= site_url('transaksi/surat_teguran/edit/' . $vaPeringatan['id'] . '') ?>">
                                                                    <i class="fa fa-edit text-info"></i>
                                                                </a>
                                                                |
                                                                <a class="btn-link" title="Hapus Data" onclick="if(confirm('Apakah anda yakin akah menghapus data?'))
                                                                    { window.location.href='<?= site_url('surat_act/surat_teguran/Delete/' . $vaPeringatan['id'] . '') ?>'}">
                                                                    <i class="fa fa-trash text-danger"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>

                                        </div> <!-- /.col-form -->

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

    <div class="row">
        <div class="col-md-12">
            <!--begin::Portlet Data Kontak-->
            <div class="kt-portlet">

                <!--begin::Accordion-->

                <div class="accordion accordion-solid accordion-toggle-plus" id="accordionExample6">
                    <div class="card">
                        <div class="card-header" id="headingOne6">
                            <div class="card-title btn btn-primary text-info" data-toggle="collapse" data-target="#collapseDataKontak" aria-expanded="true" aria-controls="collapseDataKontak">
                                <strong> Form Surat Teguran </strong>
                            </div>
                        </div>
                        <div id="collapseDataKontak" class="collapse show" aria-labelledby="headingOne6" data-parent="#accordionExample6">
                            <div class="card-body">
                                <!--begin::Form-->
                                <div class="kt-portlet__body">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12">
                                            <form method="post" enctype="multipart/form-data" action="<?= site_url('surat_act/surat_teguran/' . $cAction . '') ?>">
                                                <div class="kt-portlet__body">
                                                    <div style="text-align: center;">
                                                        <h3>HUMAN RESOURCES DEVELOPMENT</h3>
                                                        <h5>HRD</h5>
                                                        <hr />
                                                    </div>
                                                    <?php
                                                    if ($action == "view") {
                                                        $cNamaJabatan = $nj_select;
                                                        foreach ($field as $column) {
                                                            $cIdSuratPeringatan =   $column['id'];
                                                            $cIdKategoriSurat   =   $column['id_kategori_surat'];
                                                            $dTgl               =   $column['tanggal'];
                                                            $tgl_mulai_berlaku  =   $column['mulai_berlaku'];
                                                            $tgl_berlaku_sampai =   $column['berlaku_sampai'];
                                                            $nNomorSurat        =   $column['nomor_surat'];
                                                            $cIdPegawai         =   $column['id_pegawai'];
                                                            $cNikPegawai        =   $column['nik'];
                                                            $cNama              =   $column['nama'];
                                                            // $cOutlet         =   $column['outlet'];
                                                            $cUraian            =   $column['uraian'];
                                                            // $cKeterangan     =   $column['keterangan'];
                                                            $cCreate            =   $column['create'];
                                                            $cCC                =   $column['general_manager'];
                                                            $cIconButton        =   "refresh";
                                                            $cValueButton       =   "Update Data";
                                                        }

                                                    ?>
                                                        <div class="form-group row">
                                                            <label for="example-text-input" class="col-1 col-form-label">Tertanggal </label>
                                                            <label for="example-text-input" class="col-1 col-form-label"> : </label>
                                                            <div class="col-2">
                                                                <input class="form-control" readonly="true" placeholder="Tanggal" value="<?= $dTgl ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="example-text-input" class="col-1 col-form-label">Perihal </label>
                                                            <label for="example-text-input" class="col-1 col-form-label"> : </label>
                                                            <label for="example-text-input" class="col-2 col-form-label">Surat Teguran</label>
                                                        </div>
                                                        <div style="text-align: center;">
                                                            <h4 style="text-decoration: underline;">SURAT TEGURAN</h4>

                                                            <!-- <strong class="text-center"><?= $NoSuratTerakhir ?></strong> -->
                                                            <div style="justify-content: center;display: flex;">
                                                                <?php
                                                                if ($nNomorSurat == "") {
                                                                    echo "No. -";
                                                                } else { ?>
                                                                    <input readonly="true" class="form-control text-center" style="width:30%" placeholder="Nomor Surat" value="<?= $nNomorSurat ?>">
                                                                <?php
                                                                }
                                                                ?>

                                                            </div>

                                                        </div>
                                                        <div class="col-12 text-left">
                                                            <p>
                                                            <h6>&emsp;&emsp;Dalam rangka menegakkan kedisiplinan dan tanggung jawab serta menjalankan peraturan perusahaan maka atas nama perusahaan, dengan ini menerangkan bahwa:</h6>
                                                            </p>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="example-text-input" class="col-1 col-form-label">Nama :</label>
                                                            <div class="col-3">
                                                                <input type="text" class="form-control" readonly="true" value=" <?= $cNama ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="example-text-input" class="col-1 col-form-label">NIK :</label>
                                                            <div class="col-3">
                                                                <input type="text" class="form-control" readonly="true" value=" <?= $cNikPegawai ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="example-text-input" class="col-1 col-form-label">Jabatan :</label>
                                                            <div class="col-3">
                                                                <input type="text" class="form-control" readonly="true" value="<?= $cNamaJabatan ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 text-left">
                                                            <p>
                                                            <h6>Maka dengan ini, Diberikan <b> <u> Surat Teguran </u> </b> terkait dengan tindak pelanggaran yang saudara lakukan, yakni </h6>
                                                            </p>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-12">
                                                                <?= $cUraian ?>
                                                            </div>
                                                            <!-- <textarea class="form-control" name="cUraian" placeholder="Uraian" rows="10"><?php // $cUraian 
                                                                                                                                                ?></textarea> -->
                                                        </div>
                                                        <div class="col-12 text-left">
                                                            <p>
                                                            <h6>Surat Peringatan ini belaku mulai tanggal <?= $tgl_mulai_berlaku ?> dan berakhir pada tanggal <?= $tgl_berlaku_sampai ?> </h6>
                                                            </p>
                                                        </div>
                                                        <div class="col-12 text-left">
                                                            <p>
                                                            <h6> &emsp;&emsp;Selama masih dalam status Teguran, yang bersangkutan tidak diperbolehkan melanggar tata tertib kerja sebagaimana sudah diatur dalam Peraturan Perusahaan, atau bersedia menerima resiko ke tingkat lebih lanjut.<br />
                                                                &emsp;&emsp;Harapan kami agar yang bersangkutan untuk lebih mentaati peraturan dan lebih disiplin serta tanggung jawab sebagai karyawan yang baik.
                                                                Semoga dengan diterbitkan surat ini ybs bisa menerima hal ini.<br />
                                                                &emsp;&emsp;Demikian Surat Peringatan I ini dibuat agar dapat ditaati sebagaimana mestinya. Diharapkan yang bersangkutan berkenan merubah sikap dan mampu menunjukkan sikap profesinoalisme dalam bekerja.
                                                            </h6>
                                                            </p>
                                                        </div>
                                                        <div class="col-12 text-left">
                                                            <p>
                                                            <h6>&emsp;&emsp;Atas perhatian dan kerjasamanya kami selaku manajemen mengucapkan terima kasih. Dan bisa sebagai koreksi dan intropeksi diri selanjutnya.</h6>
                                                            </p>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="example-text-input" class="col-2 col-form-label">Manager HRD :</label>
                                                            <div class="col-3">
                                                                <input readonly="true" class="form-control" value="<?= $cCreate ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="example-text-input" class="col-2 col-form-label">General Manager :</label>
                                                            <div class="col-3">
                                                                <input readonly="true" class="form-control" value="<?= $cCC ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <a href="<?= site_url('transaksi/surat_teguran') ?>" class="btn btn-primary">
                                                                <i class="fa fa-hand-point-left" aria-hidden="true"></i> Kembali
                                                            </a>
                                                        </div>
                                                    <?php } else { ?>

                                                        <div class="form-group row">
                                                            <label for="example-text-input" class="col-1 col-form-label">Tertanggal </label>
                                                            <label for="example-text-input" class="col-1 col-form-label"> : </label>
                                                            <div class="col-2">
                                                                <input type="date" name="dTgl" class="form-control" placeholder="Tanggal" value="<?= $dTgl ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="example-text-input" class="col-1 col-form-label">Perihal </label>
                                                            <label for="example-text-input" class="col-1 col-form-label"> : </label>
                                                            <label for="example-text-input" class="col-2 col-form-label">Surat Teguran</label>
                                                        </div>
                                                        <div style="text-align: center;">
                                                            <h4 style="text-decoration: underline;">SURAT TEGURAN</h4>
                                                            Nomor Terakhir : <strong><?= $NoSuratTerakhir ?></strong>
                                                            <div style="justify-content: center;display: flex;">
                                                                <input type="text" name="nNomorSurat" class="form-control text-center" style="width:30%" placeholder="Nomor Surat" value="<?= $nNomorSurat ?>">
                                                            </div>

                                                        </div>
                                                        <div class="col-12 text-left">
                                                            <p>
                                                            <h6>&emsp;&emsp;Dalam rangka menegakkan kedisiplinan dan tanggung jawab serta menjalankan peraturan perusahaan maka atas nama perusahaan, dengan ini menerangkan bahwa:</h6>
                                                            </p>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="example-text-input" class="col-1 col-form-label">Nama :</label>
                                                            <div class="col-3">
                                                                <select class="comboBox form-control" onchange="cek_pegawai(this.value)" name="cIdPegawai">
                                                                    <option></option>
                                                                    <?php
                                                                    $jsArray = "var jason = new Array();\n";
                                                                    foreach ($pegawai as $dbRow) {
                                                                    ?>
                                                                        <option value="<?= $dbRow['id_pegawai'] ?>" <?php if ($dbRow['id_pegawai'] == $cIdPegawai) echo 'selected'; ?>>
                                                                            <?= $dbRow['nik'] ?> : <?= $dbRow['nama'] ?>
                                                                        </option>';
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="example-text-input" class="col-1 col-form-label">NIK :</label>
                                                            <div class="col-3">
                                                                <?php
                                                                if ($action == "edit") { ?>
                                                                    <input type="text" name="cNik" id="cNik" class="form-control" readonly="true" value="<?= $cNikPegawai ?>">

                                                                <?php } else { ?>
                                                                    <input type="text" name="cNik" id="cNik" class="form-control" readonly="true">
                                                                <?php   } ?>

                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="example-text-input" class="col-1 col-form-label">Jabatan :</label>
                                                            <div class="col-3">
                                                                <?php if ($action == "edit") { ?>
                                                                    <input type="text" name="cJabatan" id="cJabatan" class="form-control" readonly="true" value="<?= $cNamaJabatan ?>">

                                                                <?php } else { ?>
                                                                    <input type="text" name="cJabatan" id="cJabatan" class="form-control" readonly="true">
                                                                <?php   } ?>

                                                            </div>
                                                        </div>
                                                        <div class="col-12 text-left">
                                                            <p>
                                                            <h6>Maka dengan ini, Diberikan <b> <u> Surat Teguran </u> </b> terkait dengan tindak pelanggaran yang saudara lakukan, yakni </h6>
                                                            </p>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-12">
                                                                <?php if ($action == "edit") { ?>
                                                                    <textarea name="cUraian" class="summernote form-control" id="kt_summernote_1"><?= $cUraian ?></textarea>

                                                                <?php } else { ?>
                                                                    <textarea name="cUraian" class="summernote form-control" id="kt_summernote_1"></textarea>
                                                                <?php   } ?>

                                                            </div>

                                                        </div>
                                                        <div class="col-12 text-left">

                                                            <?php if ($action == "edit") { ?>
                                                                <p>
                                                                <h6>Surat Peringatan ini belaku mulai tanggal <input type="date" name="cMulai_berlaku" value="<?= $tgl_mulai_berlaku ?>"> dan berakhir pada tanggal <input type="date" name="cBerlaku_sampai" value="<?= $tgl_berlaku_sampai ?>"> </h6>
                                                                </p>

                                                            <?php } else { ?>
                                                                <p>
                                                                <h6>Surat Peringatan ini belaku mulai tanggal <input type="date" name="cMulai_berlaku"> dan berakhir pada tanggal <input type="date" name="cBerlaku_sampai"> </h6>
                                                                </p>
                                                            <?php   } ?>

                                                        </div>
                                                        <div class="col-12 text-left">
                                                            <p>
                                                            <h6> &emsp;&emsp;Selama masih dalam status Teguran, yang bersangkutan tidak diperbolehkan melanggar tata tertib kerja sebagaimana sudah diatur dalam Peraturan Perusahaan, atau bersedia menerima resiko ke tingkat lebih lanjut.<br />
                                                                &emsp;&emsp;Harapan kami agar yang bersangkutan untuk lebih mentaati peraturan dan lebih disiplin serta tanggung jawab sebagai karyawan yang baik.
                                                                Semoga dengan diterbitkan surat ini ybs bisa menerima hal ini.<br />
                                                                &emsp;&emsp;Demikian Surat Peringatan I ini dibuat agar dapat ditaati sebagaimana mestinya. Diharapkan yang bersangkutan berkenan merubah sikap dan mampu menunjukkan sikap profesinoalisme dalam bekerja.
                                                            </h6>
                                                            </p>
                                                        </div>
                                                        <div class="col-12 text-left">
                                                            <p>
                                                            <h6>&emsp;&emsp;Atas perhatian dan kerjasamanya kami selaku manajemen mengucapkan terima kasih. Dan bisa sebagai koreksi dan intropeksi diri selanjutnya.</h6>
                                                            </p>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="example-text-input" class="col-2 col-form-label">Manager HRD :</label>
                                                            <div class="col-3">
                                                                <?php if ($action == "edit") { ?>
                                                                    <input type="text" name="cCreate" id="cCreate" class="form-control" value="<?= $cCreate ?>">
                                                                <?php } else { ?>
                                                                    <input type="text" name="cCreate" id="cCreate" class="form-control">
                                                                <?php   } ?>

                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="example-text-input" class="col-2 col-form-label">General Manager :</label>
                                                            <div class="col-3">
                                                                <?php if ($action == "edit") { ?>
                                                                    <input type="text" name="cGeneral_manager" id="cGeneral_manager" class="form-control" value="<?= $cCC ?>">
                                                                <?php } else { ?>
                                                                    <input type="text" name="cGeneral_manager" id="cGeneral_manager" class="form-control">
                                                                <?php   } ?>

                                                            </div>
                                                        </div>

                                                        <input type="hidden" name="idSurat" value="1">

                                                        <div class="form-group">
                                                            <button type="submit" class="btn btn-flat btn-danger">
                                                                <i class="fa fa-<?= $cIconButton ?>"></i> <?= $cValueButton ?>
                                                            </button>
                                                        </div>


                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </form>
                                        </div> <!-- /.col-form -->

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

<script type="text/javascript">
    function cek_pegawai(data) {
        // alert(data);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                hasil = (this.responseText).split('~');

                // alert (hasil);
                document.getElementById('cNik').value = hasil[0];
                document.getElementById('cJabatan').value = hasil[1];
            }
        };
        xmlhttp.open("GET", "<?= site_url('Transaksi_act/get_pegawai/') ?>/" + data, true);
        xmlhttp.send();
    }
</script>