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
header("Content-Disposition: attachment; filename=THR Operator(".$nama_spv.") - PT. Global Insight Utama - ".$cBulan."-".date("Y")." .xls" );
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

$worksheet1->write_string(2,5,'Atas Nama',$header);  // Set Nama kolom
$worksheet1->set_column(0,5,30); // Set lebar kolom


$worksheet1->write_string(2,6,'Tanggal Kerja',$header);  // Set Nama kolom
$worksheet1->set_column(0,6,22); // Set lebar kolom

$worksheet1->write_string(2,7,'Masa Kerja',$header);  // Set Nama kolom
$worksheet1->set_column(0,7,15); // Set lebar kolom

$worksheet1->write_string(2,8,'Gaji Pokok',$header);  // Set Nama kolom
$worksheet1->set_column(0,8,16); // Set lebar kolom

$worksheet1->write_string(2,9,'Proporsi Gaji Pokok',$header);  // Set Nama kolom
$worksheet1->set_column(0,8,31); // Set lebar kolom

$worksheet1->write_string(2,10,'Tambahan',$header);  // Set Nama kolom
$worksheet1->set_column(0,10,16); // Set lebar kolom

$worksheet1->write_string(2,11,'Bingkisan',$header);  // Set Nama kolom
$worksheet1->set_column(0,11,15); // Set lebar kolom

$worksheet1->write_string(2,12,'Pengganti Buka Puasa',$header);  // Set Nama kolom
$worksheet1->set_column(0,11,25); // Set lebar kolom

$worksheet1->write_string(2,13,'Total',$header);  // Set Nama kolom
$worksheet1->set_column(0,12,25); // Set lebar kolom

$judul =& $workbook->add_format();
$judul->set_color('black'); // set warna huruf
$judul->set_size(20); // Set ukuran font 
$judul->set_align("center"); // set align rata tengah
$worksheet1->write_string(0,0,'THR  Operator Bulan  Tahun '.$tahun.' - Supervisor '.$nama_spv.' ',$judul);  // Set Nama kolom
$worksheet1->merge_cells(0, 0, 1, 6);


$content =& $workbook->add_format();
$content->set_size(11);

$content->set_top(1); // set ketebalan border bagian atas cell 0 = border tidak tampil
$content->set_bottom(1); // set ketebalan border bagian atas cell 0 = border tidak tampil
$content->set_left(1); // set ketebalan border bagian atas cell 0 = border tidak tampil
$content->set_right(1); // set ketebalan border bagian atas cell 0 = border tidak tampil

$row = 3;



$jos = $this->db->query("CALL thr_per_spv('".$bulan."','".$tahun."','".$spv."')");
$no         = 0 ;
$nGajiPokok =   0   ;
$nGajiPokokProporsional =   0   ;
$nTambahan  =   0   ;
$nBingkisan =   0   ;
$nPenggantiBukaPuasa    =   0;  
$nTotalFix = 0 ;
foreach ($jos->result_array() as $key) {
    $nTotal = $key['Proporsi_Gaji_Pokok'] + $key['Tambahan'] +  $key['Bingkisan'] + $key['PeggantiBukaPuasa'] ;


    $nGajiPokok += $key['GajiPokok'] ;
    $nGajiPokokProporsional += $key['Proporsi_Gaji_Pokok'] ;
    $nTambahan  += $key['Tambahan'] ;
    $nBingkisan += $key['Bingkisan'] ;
    $nPenggantiBukaPuasa += $key['PeggantiBukaPuasa'] ;
    $nTotalFix  += $nTotal ;
               
    $worksheet1->write_string($row,0,  $key['Pegawai'] ,$content);
    $worksheet1->write_string($row,1,  $key['Outlet'] ,$content);
    $worksheet1->write_string($row,2,  $key['Nik'] ,$content);
    $worksheet1->write_string($row,3,  $key['Pembayaran'] ,$content);
    $worksheet1->write_string($row,4,  $key['Rekening'] ,$content);
    $worksheet1->write_string($row,5,  $key['Atas_Nama'] ,$content);
    $worksheet1->write_string($row,6,  $key['TanggalKerja'] ,$content);
    $worksheet1->write_string($row,7,  $key['MasaKerja'],$content); 
    $worksheet1->write_string($row,8,  $key['GajiPokok'],$content);  
    $worksheet1->write_string($row,9,  $key['Proporsi_Gaji_Pokok'],$content); 
    $worksheet1->write_string($row,10,  $key['Tambahan'],$content); 
    $worksheet1->write_string($row,11, $key['Bingkisan'],$content); 
    $worksheet1->write_string($row,12, $key['PeggantiBukaPuasa'],$content); 
    $worksheet1->write_string($row,13, round($nTotal,-3),$content);  
    $row++;
}

     $worksheet1->write_string($row+1,8,  ($nGajiPokok) ,$content);
     $worksheet1->write_string($row+1,9,  ($nGajiPokokProporsional) ,$content);
     $worksheet1->write_string($row+1,10,  ($nTambahan) ,$content);
     $worksheet1->write_string($row+1,11,  ($nBingkisan) ,$content);
     $worksheet1->write_string($row+1,12,  ($nPenggantiBukaPuasa) ,$content);
     $worksheet1->write_string($row+1,13,  ($nTotalFix  ) ,$content);
$workbook->close();

