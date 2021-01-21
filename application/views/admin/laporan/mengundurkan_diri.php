<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=List Mengundurkan Diri.xls" );
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

$worksheet1->write_string(2,1,'Nik',$header);  // Set Nama kolom
$worksheet1->set_column(0,1,12); // Set lebar kolom 

$worksheet1->write_string(2,2,'Nama',$header);  // Set Nama kolom
$worksheet1->set_column(0,2,30); // Set lebar kolom

$worksheet1->write_string(2,3,'Tgl Lahir',$header);  // Set Nama kolom
$worksheet1->set_column(0,3,16); // Set lebar kolom

$worksheet1->write_string(2,4,'Alamat',$header);  // Set Nama kolom
$worksheet1->set_column(0,4,40); // Set lebar kolom


$worksheet1->write_string(2,5,'No KTP',$header);  // Set Nama kolom
$worksheet1->set_column(0,5,20); // Set lebar kolom

$worksheet1->write_string(2,6,'Tgl Masuk',$header);  // Set Nama kolom
$worksheet1->set_column(0,6,12); // Set lebar kolom


$worksheet1->write_string(2,7,'Tgl Keluar',$header);  // Set Nama kolom
$worksheet1->set_column(0,7,12); // Set lebar kolo

$worksheet1->write_string(2,8,'Status',$header);  // Set Nama kolom
$worksheet1->set_column(0,8,20); // Set lebar kolo

$worksheet1->write_string(2,9,'Keterangan',$header);  // Set Nama kolom
$worksheet1->set_column(0,9,80); // Set lebar kolo







$judul =& $workbook->add_format();
$judul->set_color('black'); // set warna huruf
$judul->set_size(20); // Set ukuran font 
$judul->set_align("center"); // set align rata tengah
$worksheet1->write_string(0,0,'List Data yang telah Mengundurkan Diri',$judul);  // Set Nama kolom
$worksheet1->merge_cells(0, 0, 1, 6);


$content =& $workbook->add_format();
$content->set_size(11);

$content->set_top(1); // set ketebalan border bagian atas cell 0 = border tidak tampil
$content->set_bottom(1); // set ketebalan border bagian atas cell 0 = border tidak tampil
$content->set_left(1); // set ketebalan border bagian atas cell 0 = border tidak tampil
$content->set_right(1); // set ketebalan border bagian atas cell 0 = border tidak tampil

$row = 3;
$no = 0 ;
foreach($view as $key) {
    $worksheet1->write_string($row,0,  ++$no ,$content);
    $worksheet1->write_string($row,1,  $key['nik'] ,$content);
    $worksheet1->write_string($row,2,  $key['nama'] ,$content);
    $worksheet1->write_string($row,3,  $key['tanggal_lahir'] ,$content);
    $worksheet1->write_string($row,4,  $key['alamat'] ,$content);
    $worksheet1->write_string($row,5,  $key['no_ktp'] ,$content);
    $worksheet1->write_string($row,6,  $key['tanggal_masuk_kerja'] ,$content);
    $worksheet1->write_string($row,7,  $key['tanggal'] ,$content);
    $worksheet1->write_string($row,8,  $key['status'] ,$content);
    $worksheet1->write_string($row,9,  $key['keterangan'] ,$content);

    $row++;
}
$workbook->close();

