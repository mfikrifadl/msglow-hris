<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Laporan Mutasi Karyawan PT.GIU ".$tgl_awal." s/d ".$tgl_akhir." .xls" );
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
header("Pragma: public");

$workbook = new Workbook();
$worksheet1 =& $workbook->add_worksheet(date('dmY_His'));

$title =& $workbook->add_format();
$title->set_size(12); // Set ukuran font 
$title->set_bold(1);

$worksheet1->write_string(1,1,'PT. GLOBAL INSIGHT UTAMA',$title);  // Set Nama kolom
$worksheet1->write_string(2,1,'Laporan Mutasi Karyawan',$title);  // Set Nama kolom
$worksheet1->write_string(3,1,'Per - '.$tgl_awal.' s/d '.$tgl_akhir ,$title);  // Set Nama kolom


$header =& $workbook->add_format();
$header->set_color('black'); // set warna huruf
$header->set_bg_color('0x41'); // set warna border

$header->set_size(12); // Set ukuran font 

$header->set_align("center"); // set align rata tengah

$header->set_top(2); // set ketebalan border bagian atas cell 0 = border tidak tampil
$header->set_bottom(2); // set ketebalan border bagian atas cell 0 = border tidak tampil
$header->set_left(2); // set ketebalan border bagian atas cell 0 = border tidak tampil
$header->set_right(2); // set ketebalan border bagian atas cell 0 = border tidak tampil


$worksheet1->write_string(4,1,'No',$header);  // Set Nama kolom
$worksheet1->set_column(0,1,5); // Set lebar kolom

$worksheet1->write_string(4,2,'Nik',$header);  // Set Nama kolom
$worksheet1->set_column(0,2,18); // Set lebar kolom 

$worksheet1->write_string(4,3,'Nama',$header);  // Set Nama kolom
$worksheet1->set_column(0,3,34); // Set lebar kolom

$worksheet1->write_string(4,4,'Tgl Masuk Kerja',$header);  // Set Nama kolom
$worksheet1->set_column(0,4,17); // Set lebar kolom

$worksheet1->write_string(4,5,'Jabatan Sebelumnya',$header);  // Set Nama kolom
$worksheet1->set_column(0,5,22); // Set lebar kolom

$worksheet1->write_string(4,6,'Kode Outlet Sebelumnya',$header);  // Set Nama kolom
$worksheet1->set_column(0,6,26); // Set lebar kolom

$worksheet1->write_string(4,7,'Nama Outlet Sebelumnya',$header);  // Set Nama kolom
$worksheet1->set_column(0,7,43); // Set lebar kolom

$worksheet1->write_string(4,8,'Area Kerja Sebelumnya',$header);  // Set Nama kolom
$worksheet1->set_column(0,8,25); // Set lebar kolom

$worksheet1->write_string(4,9,'Tgl Mutasi',$header);  // Set Nama kolom
$worksheet1->set_column(0,9,17); // Set lebar kolom

$worksheet1->write_string(4,10,'Jabatan Baru',$header);  // Set Nama kolom
$worksheet1->set_column(0,10,22); // Set lebar kolom

$worksheet1->write_string(4,11,'Kode Outlet Baru',$header);  // Set Nama kolom
$worksheet1->set_column(0,11,26); // Set lebar kolom

$worksheet1->write_string(4,12,'Nama Outlet Baru',$header);  // Set Nama kolom
$worksheet1->set_column(0,12,43); // Set lebar kolom

$worksheet1->write_string(4,13,'Area Kerja Baru',$header);  // Set Nama kolom
$worksheet1->set_column(0,13,25); // Set lebar kolom

$worksheet1->write_string(4,14,'Keterangan',$header);  // Set Nama kolom
$worksheet1->set_column(0,14,130); // Set lebar kolom




$content =& $workbook->add_format();
$content->set_size(11);

$content->set_top(1); // set ketebalan border bagian atas cell 0 = border tidak tampil
$content->set_bottom(1); // set ketebalan border bagian atas cell 0 = border tidak tampil
$content->set_left(1); // set ketebalan border bagian atas cell 0 = border tidak tampil
$content->set_right(1); // set ketebalan border bagian atas cell 0 = border tidak tampil

$row = 5;



$jos = $this->db->query("SELECT * FROM v_mutasi WHERE tanggal >= '".$tgl_awal_query."' and 
                                                 tanggal <= '".$tgl_akhir_query."'");   

$no         = 0 ;

foreach ($jos->result_array() as $key) {
             
    $worksheet1->write_string($row,1,  ++$no ,$content);
    $worksheet1->write_string($row,2,  $key['Nik'] ,$content);
    $worksheet1->write_string($row,3,  $key['Pegawai'] ,$content);
    $worksheet1->write_string($row,4,  (($key['TanggalKerja'])) ,$content);
    $worksheet1->write_string($row,5,  $key['JabatanLama'] ,$content);  
    $worksheet1->write_string($row,6,  $key['KodeTempatLama'] ,$content);
    $worksheet1->write_string($row,7,  $key['TempatLama'] ,$content);
    $worksheet1->write_string($row,8,  $key['AreaLama'] ,$content);
    $worksheet1->write_string($row,9,  $key['tanggal'] ,$content);
    $worksheet1->write_string($row,10,  $key['JabatanBaru'] ,$content);  
    $worksheet1->write_string($row,11,  $key['KodeTempatBaru'] ,$content);
    $worksheet1->write_string($row,12,  $key['TempatBaru'] ,$content);
    $worksheet1->write_string($row,13,  $key['AreaBaru'] ,$content);
    $worksheet1->write_string($row,14,  $key['tugas'] ,$content);
    $row++;
}


$worksheet1->write_string($row+1,1, 'Bekasi, '.date("d").' Agustus '.date("Y").' ');
$worksheet1->write_string($row+2,1, 'PT. Global Insight Utama');
$worksheet1->write_string($row+3,1, '');
$worksheet1->write_string($row+4,1, '');
$worksheet1->write_string($row+5,1, '');
$worksheet1->write_string($row+6,1, 'Dewi M. Ratnasari');
$worksheet1->write_string($row+7,1, 'HRD  Manager');
$workbook->close();

