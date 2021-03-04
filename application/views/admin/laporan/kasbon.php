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
header("Content-Disposition: attachment; filename=Kasbon Bulan Pinjaman - ".$cBulan." Tahun - ".$tahun."- Spv - ".$nama_spv." .xls" );
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

$worksheet1->write_string(2,2,'Outlet',$header);  // Set Nama kolom
$worksheet1->set_column(0,2,36); // Set lebar kolom


$worksheet1->write_string(2,3,'NIK',$header);  // Set Nama kolom
$worksheet1->set_column(0,3,12); // Set lebar kolom


$worksheet1->write_string(2,4,'Pinjaman',$header);  // Set Nama kolom
$worksheet1->set_column(0,4,20); // Set lebar kolo

$worksheet1->write_string(2,5,'Keterangan Pinjaman',$header);  // Set Nama kolom
$worksheet1->set_column(0,5,20); // Set lebar kolo







$judul =& $workbook->add_format();
$judul->set_color('black'); // set warna huruf
$judul->set_size(20); // Set ukuran font 
$judul->set_align("center"); // set align rata tengah
$worksheet1->write_string(0,0,'Kasbon Pinjaman Operator '.$cBulan.' Tahun '.$tahun.'',$judul);  // Set Nama kolom
$worksheet1->merge_cells(0, 0, 1, 6);


$content =& $workbook->add_format();
$content->set_size(11);

$content->set_top(1); // set ketebalan border bagian atas cell 0 = border tidak tampil
$content->set_bottom(1); // set ketebalan border bagian atas cell 0 = border tidak tampil
$content->set_left(1); // set ketebalan border bagian atas cell 0 = border tidak tampil
$content->set_right(1); // set ketebalan border bagian atas cell 0 = border tidak tampil

$row = 3;

$jos = $this->db->query("CALL kasbon_pinjaman('".$bulan."','".$tahun."')");
$no = 0 ;
foreach ($jos->result_array() as $key) {
    $worksheet1->write_string($row,0,  ++$no ,$content);
    $worksheet1->write_string($row,1,  $key['Pegawai'] ,$content);
    $worksheet1->write_string($row,2,  $key['Outlet'] ,$content);
    $worksheet1->write_string($row,3,  $key['Nik'] ,$content);
    $worksheet1->write_string($row,4,  $key['pinjaman'] ,$content);
    $worksheet1->write_string($row,5,  $key['keterangan_pinjaman'] ,$content);

    $row++;
}
$workbook->close();

