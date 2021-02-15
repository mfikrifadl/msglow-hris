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

$cLastNoSurat = "";
foreach ($Nolast->result_array() as $key => $vaDataLast) {
    $cLastNoSurat = $vaDataLast['nomor_surat'];
}

$cNomorSuratFix = "";
if (empty($cLastNoSurat) || $cLastNoSurat == "" || $cLastNoSurat == null) {
    $hasil = "0001";
    $cNomorSuratFix = "No." . $hasil . "/CNTK-ID/PKWT/" . $cRomawai . "/" . date("Y") . " ";
} else {
    $hasil_hit = $cLastNoSurat + 1;
    $hasil = sprintf("%04d", $hasil_hit);
    $cNomorSuratFix = "No." . $hasil . "/CNTK-ID/PKWT/" . $cRomawai . "/" . date("Y") . " ";
}

?>
<?php
if ($action == "Update") {
    // foreach ($field as $column) {
    //     $cId          =   $column['id'];
    //     // $nNomorSurat  =   $column['no_surat'];
    //     $cIdPegawai   =   $column['id_pegawai'];
    //     $cNik         =   $column['nik'];
    //     $cCreate      =   $column['cCreate'];
    //     $cTtl         =   $column['tempat_lahir'] . ', ' . $column['tanggal_lahir'];
    //     $cKtp         =   $column['no_ktp'];
    //     $cAlamat      =   $column['alamat_asal'];
    //     $cJabatan     =   $column['nama_jabatan'];
    //     $cMasuk       =   $column['tanggal_masuk_kerja'];
    //     $cAkhir       =   $column['tgl_kontrak_berakhir'];
    //     $cMasaKontrak       =   $column['masa_kontrak'];
    //     $cIconButton  =   "refresh";
    //     $cValueButton =   "Update Data";
    // }
    foreach ($kontrak_pegawai as $row) {
        $cId          =   $row['id'];
        $cNomorSurat = $row['no_surat'];
        $cIdPegawai   =   $row['id_pegawai'];
        $cNik         =   $row['nik'];
        // $cCreate      =   $row['cCreate'];
        $cTtl         =   $row['tempat_lahir'] . ', ' . $row['tanggal_lahir'];
        $cKtp         =   $row['no_ktp'];
        $cAlamat      =   $row['alamat_asal'];
        $cJabatan     =   $row['nama_jabatan'];
        $cMasuk       =   $row['tanggal_masuk_kerja'];
        $cAkhir       =   $row['tanggal_kontrak_habis'];
        $cMasaKontrak       =   $row['masa_kontrak'];
        $cIconButton  =   "refresh";
        $cValueButton =   "Update Data";
    }
    $cAction = "Update/" . $cId . "";
} else {
    $cId                =   "";
    // $nNomorSurat        =   "";
    $cNomorSurat        = "";
    $cIdPegawai         =   "";
    $cNik               =   "";
    $nNomorSurat        =   $cNomorSuratFix;
    $cMasaKontrak       =   "";
    $cTtl               =   "";
    $cKtp               =   "";
    $cAlamat            =   "";
    $cKeterangan        =   "";
    // $cCreate            =   $this->session->userdata('nama');
    $cJabatan           =   "";
    $cMasuk             =   "";
    $cAkhir         =   "";
    $cIconButton        =   "save";
    $cValueButton       =   "Save Data";
    $cAction            =   "Insert";
}
?>
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
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

        <!--konten halaman ini bisa isi disini mulai dari <div class="row"> pada setiap widgetnya-->
        <div class="row">
            <div class="col-4">
                <div class="kt-portlet">
                    <div class="kt-portlet__head btn btn-success">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title text-light">
                                Form Kontrak Pegawai
                            </h3>
                        </div>
                    </div>
                    <form method="post" enctype="multipart/form-data" action="<?= site_url('transaksi_act/kontrak/' . $cAction . '') ?>">
                        <div class="kt-portlet__body">
                            <?php
                            if ($action == "Update") {
                            ?>
                                <div class="form-group">
                                    <label>Nomor Surat :</label>
                                    <div class="input-group">
                                        <input type="text" readonly="true" class="form-control" style="width:30%" value="<?= $cNomorSurat ?>">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar-o"></i>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            } else {
                            ?>
                                <div class="form-group">
                                    <label>Nomor Surat :</label>
                                    <div class="input-group">
                                        <input type="text" readonly="true" name="nNomorSurat" class="form-control" style="width:30%" placeholder="Nomor Surat" value="<?= $cNomorSuratFix ?>">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar-o"></i>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>

                            <?php
                            if ($action == "Update") {
                                foreach ($kontrak_pegawai as $vaKontrak_Pegawai) {
                            ?>
                                    <div class="form-group">
                                        <label>Nama :</label>
                                        <input type="text" readonly="true" class="form-control" value="<?= $vaKontrak_Pegawai['nama'] ?>">
                                    </div>
                                <?php
                                }
                            } else {
                                ?>
                                <div class="form-group">
                                    <label>Nama :</label>
                                    <select class="comboBox form-control" onchange="cek_pegawai(this.value)" name="cIdPegawai">
                                        <option></option>
                                        <?php
                                        $jsArray = "var jason = new Array();\n";
                                        foreach ($pegawai as $dbRow) {
                                            if ($dbRow['tanggal_kontrak_habis'] == null || $dbRow['tanggal_kontrak_habis'] == "" || empty($dbRow['tanggal_kontrak_habis'])) {
                                        ?>
                                                <option value="<?= $dbRow['id_pegawai'] ?>">
                                                    <?= $dbRow['nik'] ?> : <?= $dbRow['nama'] ?>
                                                </option>
                                        <?php
                                            } else {
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            <?php
                            }
                            ?>

                            <div class="form-group">
                                <label>NIK</label>
                                <div class="input-group">
                                    <input type="text" readonly="true" name="cNik" id="cNik" class="form-control" value="<?= $cNik ?>">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar-o"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tempat Tanggal Lahir</label>
                                <div class="input-group">
                                    <input type="text" readonly="true" name="ttl" id="ttl" class="form-control" data-date-format="dd/mm/yyyy" value="<?= $cTtl ?>">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar-o"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nomor KTP</label>
                                <div class="input-group">
                                    <input type="text" readonly="true" name="ktp" id="ktp" class="form-control" placeholder="Nomor KTP" value="<?= $cKtp ?>">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar-o"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Alamat Sesuai KTP</label>
                                <div class="input-group">
                                    <textarea type="text" readonly="true" name="alamatktp" id="alamatktp" class="form-control" placeholder="Alamat Sesuai KTP"><?= $cAlamat ?></textarea>
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar-o"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Jabatan</label>
                                <div class="input-group">
                                    <input type="text" readonly="true" name="cJabatan" id="cJabatan" class="form-control" placeholder="jabatan" value="<?= $cJabatan ?>">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar-o"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Masa Kontrak</label>
                                <div class="input-group">
                                    <input type="number" name="masa_kontrak" class="form-control" value="<?= $cMasaKontrak ?>" placeholder="Masa Kontrak(Bulan)" data-date-format="dd/mm/yyyy">(bulan)
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar-o"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Masuk Kerja</label>
                                <div class="input-group">
                                    <input type="date" readonly="true" name="dTglMasukKerja" id="dTglMasukKerja" class="form-control" placeholder="Tanggal Masuk Kerja" value="<?= $cMasuk ?>">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar-o"></i>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="form-group">
                                <label>Tanggal Kontrak Berakhir</label>
                                <div class="input-group">
                                    <input type="date" name="dTglKontrakBerakhir" id="dTglKontrakBerakhir" class="form-control" placeholder="Tanggal Kontrak Berakhir" value="<?= $cAkhir ?>">
                                    <input type="hidden" name="cCreate" value="<?= $cCreate ?>">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar-o"></i>
                                    </div>
                                </div>
                            </div> -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-flat btn-primary"><?= $cValueButton ?></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-8">
                <div class="kt-portlet">
                    <div class="kt-portlet__head btn btn-success">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title text-light">
                                Tabel Kontrak Pegawai
                            </h3>
                        </div>
                    </div>

                    <div class="kt-portlet__body">
                        <table class="table table-striped table-bordered" id="DataTable">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Tanggal_Masuk_Kerja</td>
                                    <td>Tanggal_Kontrak_Selesai</td>
                                    <td>Nomor Surat</td>
                                    <td>Nama Pegawai</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0;
                                foreach ($v_kontrak as $key => $vaPeringatan) {
                                    if($vaPeringatan['is_deleted'] == 1){

                                    }else{
                                        ?>
                                        <tr>
                                            <td><?= ++$no; ?></td>
                                            <td><?= $vaPeringatan['tanggal_masuk_kerja'] ?></td>
                                            <td><?= $vaPeringatan['tanggal_kontrak_habis'] ?></td>
                                            <td><?= $vaPeringatan['no_surat'] ?></td>
                                            <td><?= $vaPeringatan['nama'] ?></td>
                                            <td align="center">
                                                <a class="btn-link" title="Print Kontrak" target="_blank" href="<?= site_url('Surat_act/cetak_kontrak/' . $vaPeringatan['id_pegawai'] . '') ?>">
                                                    <i class="fa fa-print"></i>
                                                </a>|
                                                <a class="btn-link" title="Edit Kontrak" href="<?= site_url('transaksi/kontrak/Update/' . $vaPeringatan['id'] . '') ?>">
                                                    <i class="fa fa-pen"></i>
                                                </a>|
                                                <!-- <a class="btn-link" title="Delete Kontrak" href="<?= site_url('transaksi_act/kontrak/Delete/' . $vaPeringatan['id_pegawai'] . '') ?>">
                                                    <i class="fa fa-trash"></i>
                                                </a> -->
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                 } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
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
                document.getElementById('ttl').value = hasil[2] + ', ' + hasil[3];
                document.getElementById('ktp').value = hasil[4];
                document.getElementById('alamatktp').value = hasil[5];
                document.getElementById('dTglMasukKerja').value = hasil[7];
                document.getElementById('dTglKontrakBerakhir').value = hasil[8];
            }
        };
        xmlhttp.open("GET", "<?= site_url('Transaksi_act/get_pegawai/') ?>/" + data, true);
        xmlhttp.send();
    }
</script>