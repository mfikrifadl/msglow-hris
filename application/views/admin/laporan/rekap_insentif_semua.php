<?php


	if($bulan == '1'){
		$cBulan 	= 'Januari'; 
	}elseif ($bulan == '2') {
		$cBulan     =  'Februari' ;
	}elseif ($bulan == '3') {
		$cBulan     =  'Maret' ;
	}elseif ($bulan == '4') {
		$cBulan     =  'April' ;
	}elseif ($bulan == '5') {
		$cBulan     =  'Mei' ;
	}elseif ($bulan == '6') {
		$cBulan     =  'Juni' ;
	}elseif ($bulan == '7') {
		$cBulan     =  'Juli' ;
	}elseif ($bulan == '8') {
		$cBulan     =  'Agustus' ;
	}elseif ($bulan == '9') {
		$cBulan     =  'September' ;
	}elseif ($bulan == '10') {
		$cBulan     =  'Oktober' ;
	}elseif ($bulan == '11') {
		$cBulan     =  'November' ;
	}elseif ($bulan == '12') {
		$cBulan     =  'Desember' ;
	}


header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=RekapInsentif Bulan - ".$cBulan." Tahun - ".$tahun.".xls" );
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
header("Pragma: public");

$workbook = new Workbook();
$worksheet1 =& $workbook->add_worksheet(date('dmY_His'));

$header =& $workbook->add_format();
$header->set_color('blue'); // set warna huruf
$header->set_border_color('red'); // set warna border

$header->set_size(12); // Set ukuran font 

$header->set_align("center"); // set align rata tengah

$header->set_top(2); // set ketebalan border bagian atas cell 0 = border tidak tampil
$header->set_bottom(2); // set ketebalan border bagian atas cell 0 = border tidak tampil
$header->set_left(2); // set ketebalan border bagian atas cell 0 = border tidak tampil
$header->set_right(2); // set ketebalan border bagian atas cell 0 = border tidak tampil


$worksheet1->write_string(2,0,'No',$header);  // Set Nama kolom
$worksheet1->set_column(0,0,5); // Set lebar kolom

$worksheet1->write_string(2,1,'Nama',$header);  // Set Nama kolom
$worksheet1->set_column(0,1,40); // Set lebar kolom 

$worksheet1->write_string(2,2,'Kode Outlet',$header);  // Set Nama kolom
$worksheet1->set_column(0,2,13); // Set lebar kolom

$worksheet1->write_string(2,3,'Outlet',$header);  // Set Nama kolom
$worksheet1->set_column(0,3,36); // Set lebar kolom

$worksheet1->write_string(2,4,'Pembayaran',$header);  // Set Nama kolom
$worksheet1->set_column(0,4,12); // Set lebar kolom

$worksheet1->write_string(2,5,'Rekening',$header);  // Set Nama kolom
$worksheet1->set_column(0,5,12); // Set lebar kolom

$worksheet1->write_string(2,6,'Atas Nama',$header);  // Set Nama kolom
$worksheet1->set_column(0,6,12); // Set lebar kolom

$worksheet1->write_string(2,7,'NIK',$header);  // Set Nama kolom
$worksheet1->set_column(0,7,12); // Set lebar kolom

$worksheet1->write_string(2,8,'Masa Kerja',$header);  // Set Nama kolom
$worksheet1->set_column(0,8,15); // Set lebar kolom

$worksheet1->write_string(2,9,'Tgl Masuk',$header);  // Set Nama kolom
$worksheet1->set_column(0,9,14); // Set lebar kolom

$worksheet1->write_string(2,10,'Total Masuk',$header);  // Set Nama kolom
$worksheet1->set_column(0,10,13); // Set lebar kolom

$worksheet1->write_string(2,11,'Total Insentif',$header);  // Set Nama kolom
$worksheet1->set_column(0,11,13); // Set lebar kolom


$worksheet1->write_string(2,12,'Lain-Lain',$header);  // Set Nama kolom
$worksheet1->set_column(0,12,20); // Set lebar kolo

$worksheet1->write_string(2,13,'Total Insentif+Lain-Lain',$header);  // Set Nama kolom
$worksheet1->set_column(0,13,20); // Set lebar kolo

$worksheet1->write_string(2,14,'24',$header);  // Set Nama kolom
$worksheet1->set_column(0,14,4); // Set lebar kolom

$worksheet1->write_string(2,15,'25',$header);  // Set Nama kolom
$worksheet1->set_column(0,15,4); // Set lebar kolom

$worksheet1->write_string(2,16,'26',$header);  // Set Nama kolom
$worksheet1->set_column(0,16,4); // Set lebar kolom

$worksheet1->write_string(2,17,'27',$header);  // Set Nama kolom
$worksheet1->set_column(0,17,4); // Set lebar kolom

$worksheet1->write_string(2,18,'28',$header);  // Set Nama kolom
$worksheet1->set_column(0,18,4); // Set lebar kolom

$worksheet1->write_string(2,19,'29',$header);  // Set Nama kolom
$worksheet1->set_column(0,19,4); // Set lebar kolom

$worksheet1->write_string(2,20,'30',$header);  // Set Nama kolom
$worksheet1->set_column(0,20,4); // Set lebar kolom


$worksheet1->write_string(2,21,'31',$header);  // Set Nama kolom
$worksheet1->set_column(0,21,4); // Set lebar kolom

$worksheet1->write_string(2,22,'Supervisor',$header);  // Set Nama kolom
$worksheet1->set_column(0,22,40); // Set lebar kolom


$judul =& $workbook->add_format();
$judul->set_color('black'); // set warna huruf
$judul->set_size(20); // Set ukuran font 
$judul->set_align("center"); // set align rata tengah
$worksheet1->write_string(0,0,'Insentif  Operator Bulan '.$cBulan.' Tahun '.$tahun.' ',$judul);  // Set Nama kolom
$worksheet1->merge_cells(0, 0, 1, 6);


$content =& $workbook->add_format();
$content->set_size(11);

$content->set_top(1); // set ketebalan border bagian atas cell 0 = border tidak tampil
$content->set_bottom(1); // set ketebalan border bagian atas cell 0 = border tidak tampil
$content->set_left(1); // set ketebalan border bagian atas cell 0 = border tidak tampil
$content->set_right(1); // set ketebalan border bagian atas cell 0 = border tidak tampil

$row = 3;

$jos = $this->db->query("SELECT * FROM v_insentif WHERE bulan = '".$bulan."' and 
    tahun = '".$tahun."' ORDER BY kode_outlet ASC");
$no = 0 ;

$nInsentif = 0 ;
$nLainLain = 0 ;

$nTotal    = 0 ;

foreach ($jos->result_array() as $key) {
    $nInsentif      += round($key['total_insentif'],-3) ;
    $nLainLain   += round($key['insentif_lain_lain'],-3) ;

    $nTotal             += $key['total_insentif']+$key['insentif_lain_lain'] ;

    $nTotalKolom        = $key['total_insentif']+$key['insentif_lain_lain'] ;

    $worksheet1->write_string($row,0,  ++$no ,$content);
    $worksheet1->write_string($row,1,  $key['nama_pegawai'] ,$content);
    $worksheet1->write_string($row,2,  $key['kode_outlet'],$content);
    $worksheet1->write_string($row,3,  $key['nama_outlet'] ,$content);
    $worksheet1->write_string($row,4,  $key['jenis_pembayaran'] ,$content);
    $worksheet1->write_string($row,5,  $key['no_rekening'] ,$content);
    $worksheet1->write_string($row,6,  $key['atas_nama'] ,$content);
    $worksheet1->write_string($row,7,  $key['nik'] ,$content);
    $worksheet1->write_string($row,8,  $key['MasaKerja'] ,$content);
    $worksheet1->write_string($row,9,  $key['tanggal_masuk_kerja'] ,$content);
    $worksheet1->write_string($row,10,  $key['TotalMasuk'] ,$content);
    $worksheet1->write_string($row,11,  $key['total_insentif'] ,$content);
    $worksheet1->write_string($row,12,  $key['insentif_lain_lain'] ,$content);
    $worksheet1->write_string($row,13,  $nTotalKolom ,$content);
    $worksheet1->write_string($row,14,  $key['tanggal_24'] ,$content);
    $worksheet1->write_string($row,15,  $key['tanggal_25'] ,$content);
    $worksheet1->write_string($row,16,  $key['tanggal_26'] ,$content);
    $worksheet1->write_string($row,17,  $key['tanggal_27'] ,$content);
    $worksheet1->write_string($row,18,  $key['tanggal_28'] ,$content);
    $worksheet1->write_string($row,19,  $key['tanggal_29'] ,$content);
    $worksheet1->write_string($row,20,  $key['tanggal_30'] ,$content);
    $worksheet1->write_string($row,21,  $key['tanggal_31'] ,$content);
    $worksheet1->write_string($row,22,  $key['nama_spv'] ,$content);
    $row++;
}
    $worksheet1->write_string($row+1,11,  ($nInsentif) ,$content);
    $worksheet1->write_string($row+1,12,  ($nLainLain) ,$content);
    $worksheet1->write_string($row+1,13,  ($nTotal) ,$content);


$workbook->close();

