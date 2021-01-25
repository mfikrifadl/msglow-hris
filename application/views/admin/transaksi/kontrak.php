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
    $NoSuratTerakhir = "No.0001/CNTK-ID/PKWT/" . $cRomawai . "/" . date("Y") . "";
}

$cNomorSuratFix = "No." . "####" . "/CNTK-ID/PKWT/" . $cRomawai . "/" . date("Y") . " ";
?>
<?php
if ($action == "edit") {
    foreach ($field as $column) {
        $cIdSuratPeringatan =   $column['id'];
        $cIdKategoriSurat   =   $column['id_kategori_surat'];
        $dTgl               =   $column['tanggal'];
        $nNomorSurat        =   $column['nomor_surat'];
        $cIdPegawai         =   $column['id_pegawai'];
        $cOutlet            =   $column['outlet'];
        $cUraian            =   $column['uraian'];
        $cKeterangan        =   $column['keterangan'];
        $cCreate            =   $column['create'];
        $cCC                =   $column['cc'];
        $cIconButton        =   "refresh";
        $cValueButton       =   "Update Data";
    }
    $cAction = "Update/" . $cIdSuratPeringatan . "";
} else {
    $cIdSuratPeringatan =   "";
    $cIdKategoriSurat   =   "";
    $dTgl               =   "";
    $nNomorSurat        =   $cNomorSuratFix;
    $cIdPegawai         =   "";
    $cOutlet            =   "";
    $cUraian            =   "";
    $cKeterangan        =   "";
    $cCreate            =   $this->session->userdata('nama');
    $cCC                =   "";
    $cIconButton    =   "save";
    $cValueButton   =   "Save Data";
    $cAction        =   "Insert";
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
        <form method="post" enctype="multipart/form-data" action="<?= site_url('transaksi_act/kontrak/' . $cAction . '') ?>">
            <div class="row">
                <div class="col-6">
                    <div class="kt-portlet">
                        <div class="kt-portlet__head btn btn-success">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title text-light">
                                    Form Kontrak Pegawai
                                </h3>
                            </div>
                        </div>
                        <div class="kt-portlet__body">
                            <div class="form-group">
                                Nomor Terakhir : <strong><?= $NoSuratTerakhir ?></strong>
                            </div>
                            <div class="form-group">
                                <label>Nomor Surat :</label>
                                <div class="input-group">
                                    <input type="text" name="nNomorSurat" class="form-control" style="width:30%" placeholder="Nomor Surat" value="<?= $nNomorSurat ?>">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar-o"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nama :</label>
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
                                        $jsArray .= "jason['" . $dbRow['id_pegawai'] . "'] ={ nik:'" . $dbRow['nik'] . "',
                                                                            nama_jabatan:'" . addslashes(($dbRow['nama_jabatan'])) . "'};\n";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>NIK</label>
                                <div class="input-group">
                                    <input type="text" name="cNik" id="cNik" class="form-control" readonly="true">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar-o"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tempat Tanggal Lahir</label>
                                <div class="input-group">
                                    <input type="date" name="ttl" class="form-control" data-date-format="dd/mm/yyyy">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar-o"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nomor KTP</label>
                                <div class="input-group">
                                    <input type="text" name="ktp" class="form-control" placeholder="Nomor KTP" data-date-format="dd/mm/yyyy">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar-o"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Alamat Sesuai KTP</label>
                                <div class="input-group">
                                    <textarea type="text" name="alamatktp" class="form-control" placeholder="Alamat Sesuai KTP" data-date-format="dd/mm/yyyy"></textarea>
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar-o"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Jabatan</label>
                                <div class="input-group">
                                    <input type="text" name="cJabatan" class="form-control" placeholder="jabatan" data-date-format="dd/mm/yyyy">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar-o"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Masa Kontrak</label>
                                <div class="input-group">
                                    <input type="number" name="masa_kontrak" class="form-control" placeholder="Masa Kontrak(Bulan)" data-date-format="dd/mm/yyyy">(bulan)
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar-o"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Masuk Kerja</label>
                                <div class="input-group">
                                    <input type="date" name="dTglMasukKerja" class="form-control" placeholder="Tanggal Masuk Kerja" data-date-format="dd/mm/yyyy">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar-o"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Kontrak Berakhir</label>
                                <div class="input-group">
                                    <input type="date" name="dTglKontrakBerakhir" class="form-control" placeholder="Tanggal Kontrak Berakhir" data-date-format="dd/mm/yyyy">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar-o"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
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
                                            <td><?= $vaPeringatan['tanggal'] ?></td>
                                            <td><?= $vaPeringatan['nomor_surat'] ?></td>
                                            <td><?= $vaPeringatan['nama'] ?></td>
                                            <td><?= $vaPeringatan['Keterangan'] ?></td>
                                            <td></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    <?php echo $jsArray; ?>

    function changeValue(id) {
        document.getElementById('cNik').value = jason[id].nik;
        // document.getElementById('cJabatan').value = jason[id].nama_jabatan;
    };
</script>