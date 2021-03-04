<?php
    
   

    if($bulan == '1'){
        $cBulan     = 'Januari'; 
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
header("Content-Disposition: attachment; filename=Insentif Operator(".$supervisor.") - PT. Global Insight Utama - ".$cBulan."-".date("Y")." .xls" );
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
header("Pragma: public");

$workbook = new Workbook();
$worksheet1 =& $workbook->add_worksheet(date('dmY_His'));

$header =& $workbook->add_format();
$header->set_color('black'); // set warna huruf
$header->set_bg_color('white'); // set warna border

$header->set_size(12); // Set ukuran font 

$header->set_align("center"); // set align rata tengah

$header->set_top(2); // set ketebalan border bagian atas cell 0 = border tidak tampil
$header->set_bottom(2); // set ketebalan border bagian atas cell 0 = border tidak tampil
$header->set_left(2); // set ketebalan border bagian atas cell 0 = border tidak tampil
$header->set_right(2); // set ketebalan border bagian atas cell 0 = border tidak tampil


$worksheet1->write_string(2,0,'Pegawai',$header);  // Set Nama kolom
$worksheet1->set_column(0,0,24); // Set lebar kolom

$worksheet1->write_string(2,1,'Outlet',$header);  // Set Nama kolom
$worksheet1->set_column(0,1,35); // Set lebar kolom 

$worksheet1->write_string(2,2,'Nik',$header);  // Set Nama kolom
$worksheet1->set_column(0,2,18); // Set lebar kolom

$worksheet1->write_string(2,3,'Pembayaran',$header);  // Set Nama kolom
$worksheet1->set_column(0,3,17); // Set lebar kolom

$worksheet1->write_string(2,4,'Rekening',$header);  // Set Nama kolom
$worksheet1->set_column(0,4,25); // Set lebar kolom

$worksheet1->write_string(2,5,'Tanggal Kerja',$header);  // Set Nama kolom
$worksheet1->set_column(0,5,22); // Set lebar kolom

$worksheet1->write_string(2,6,'Masa Kerja',$header);  // Set Nama kolom
$worksheet1->set_column(0,6,15); // Set lebar kolom

$worksheet1->write_string(2,7,'Total Masuk',$header);  // Set Nama kolom
$worksheet1->set_column(0,7,16); // Set lebar kolom

$worksheet1->write_string(2,8,'Insentif',$header);  // Set Nama kolom
$worksheet1->set_column(0,8,31); // Set lebar kolom

$worksheet1->write_string(2,9,'Tambahan',$header);  // Set Nama kolom
$worksheet1->set_column(0,9,16); // Set lebar kolom

$worksheet1->write_string(2,10,'Total',$header);  // Set Nama kolom
$worksheet1->set_column(0,10,15); // Set lebar kolom



$judul =& $workbook->add_format();
$judul->set_color('black'); // set warna huruf
$judul->set_size(20); // Set ukuran font 
$judul->set_align("center"); // set align rata tengah
$worksheet1->write_string(0,0,'Insentif  Operator Bulan  Tahun '.$tahun.' - SUPERVISOR '.$supervisor.' ',$judul);  // Set Nama kolom
$worksheet1->merge_cells(0, 0, 1, 6);


$content =& $workbook->add_format();
$content->set_size(11);

$content->set_top(1); // set ketebalan border bagian atas cell 0 = border tidak tampil
$content->set_bottom(1); // set ketebalan border bagian atas cell 0 = border tidak tampil
$content->set_left(1); // set ketebalan border bagian atas cell 0 = border tidak tampil
$content->set_right(1); // set ketebalan border bagian atas cell 0 = border tidak tampil

$row = 3;



$jos = $this->db->query("SELECT * FROM v_insentif WHERE bulan = '".$bulan."' and tahun = '".$tahun."' and id_spv = '".$spv."' ORDER BY nama_outlet");
$no         = 0 ;
foreach ($jos->result_array() as $key) {

   

    $nTotal = $key['total_insentif'] + $key['insentif_lain_lain'] ;
               
    $worksheet1->write_string($row,0,  $key['nama_pegawai'] ,$content);
    $worksheet1->write_string($row,1,  $key['nama_outlet'] ,$content);
    $worksheet1->write_string($row,2,  $key['nik'] ,$content);
    $worksheet1->write_string($row,3,  $key['jenis_pembayaran'] ,$content);
    $worksheet1->write_string($row,4,  $key['no_rekening'] ,$content);
    $worksheet1->write_string($row,5,  $key['tanggal_masuk_kerja'] ,$content);
    $worksheet1->write_string($row,6,  $key['MasaKerja'],$content); 
    $worksheet1->write_string($row,7,  $key['TotalMasuk'],$content);  
    $worksheet1->write_string($row,8,  $key['total_insentif'],$content); 
    $worksheet1->write_string($row,9,  $key['insentif_lain_lain'],$content); 
    $worksheet1->write_string($row,10, round($nTotal,-3),$content);    
    $row++;
}
$workbook->close();

