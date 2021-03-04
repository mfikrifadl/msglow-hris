<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Rekap Gaji.xls");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
header("Pragma: public");

$workbook = new Workbook();
$worksheet1 =& $workbook->add_worksheet("Hai");
$judul =& $workbook->add_format();
$judul->set_color('black'); // set warna huruf
$judul->set_size(20); // Set ukuran font 
$judul->set_align("center"); // set align rata tengah
$worksheet1->write_string(0,0,'Rekap Gaji',$judul);  // Set Nama kolom
$worksheet1->merge_cells(0, 0, 1, 6);




$workbook->close();

?>