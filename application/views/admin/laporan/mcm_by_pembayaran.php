<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=MCM Bulan ".$bulan." - Tahun ".$tahun." .xls" );
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
header("Pragma: public");

$workbook = new Workbook();
$worksheet1 =& $workbook->add_worksheet(date('dmY_His'));


$title =& $workbook->add_format();
$title->set_color('black'); // set warna huruf
$title->set_size(12); // Set ukuran font 
$title->set_align("left"); // set align rata tengah


$headerstring =& $workbook->add_format();

$headerstring->set_size(10); // Set ukuran font 

$headerstring->set_align("left"); // set align rata tengah

$headernumerik =& $workbook->add_format();

$headernumerik->set_size(10); // Set ukuran font 

$headernumerik->set_align("right"); // set align rata tengah




$worksheet1->write_string(0,0,'P',$headerstring);  // Set Nama kolom
$worksheet1->set_column(0,0,18); // Set lebar kolom


$worksheet1->set_column(0,1,28); // Set lebar kolom 

$worksheet1->write_string(0,2,'1050005478221',$headernumerik);  // Set Nama kolom
$worksheet1->set_column(0,2,17); // Set lebar kolom


$worksheet1->set_column(0,3,12); // Set lebar kolom


$worksheet1->set_column(0,4,12); // Set lebar kolom

$worksheet1->write_string(0,5,'',$headerstring);  // Set Nama kolom
$worksheet1->set_column(0,5,9); // Set lebar kolom

$worksheet1->write_string(0,6,'',$headerstring);  // Set Nama kolom
$worksheet1->set_column(0,6,12); // Set lebar kolom

$worksheet1->write_string(0,7,'',$headerstring);  // Set Nama kolom
$worksheet1->set_column(0,7,9); // Set lebar kolom

$worksheet1->write_string(0,8,'',$headerstring);  // Set Nama kolom
$worksheet1->set_column(0,8,9); // Set lebar kolom

$worksheet1->write_string(0,9,'',$headerstring);  // Set Nama kolom
$worksheet1->set_column(0,9,12); // Set lebar kolom

$worksheet1->write_string(0,10,'',$headerstring);  // Set Nama kolom
$worksheet1->set_column(0,10,12); // Set lebar kolom

$worksheet1->write_string(0,11,'',$headerstring);  // Set Nama kolom
$worksheet1->set_column(0,11,18); // Set lebar kolom

$worksheet1->write_string(0,12,'',$headerstring);  // Set Nama kolom
$worksheet1->set_column(0,12,12); // Set lebar kolom

$worksheet1->write_string(0,13,'',$headerstring);  // Set Nama kolom
$worksheet1->set_column(0,13,9); // Set lebar kolom

$worksheet1->write_string(0,14,'',$headerstring);  // Set Nama kolom
$worksheet1->set_column(0,14,9); // Set lebar kolom

$worksheet1->write_string(0,15,'',$headerstring);  // Set Nama kolom
$worksheet1->set_column(0,15,9); // Set lebar kolom

$worksheet1->write_string(0,16,'',$headerstring);  // Set Nama kolom
$worksheet1->set_column(0,16,9); // Set lebar kolom

$worksheet1->set_column(0,17,27.86); // Set lebar kolom

$For = 0 ;
$Loncat = 17 ; 
for($i=1;$i<=22;$i++){ ++$Loncat;
    $worksheet1->write_string(0,$Loncat,'',$headernumerik);  // Set Nama kolom
    $worksheet1->set_column(0,$Loncat,1.57); // Set lebar kolom
}

$worksheet1->write_string(0,40,'',$headerstring);  // Set Nama kolom
$worksheet1->set_column(0,40,22); // Set lebar kolom





$content =& $workbook->add_format();
$content->set_size(11);



$row = 1;
$jumlahbaris = 0;
$no = 0 ;
$nHarga = 0 ;


$jos = $this->db->query("SELECT 
 a.Pegawai,a.Rekening,a.Atas_Nama,SUM(g.total) AS Nominal,a.Pembayaran,a.KodeBank,a.NamaBank,a.Id_Pembayaran
FROM 
 v_gaji a , tb_gaji g
WHERE a.id_absen = g.id_absen and a.Id_Pembayaran = '".$bayar."' and a.bulan = '".$bulan."' and a.tahun = '".$tahun."' 
GROUP BY 
    Atas_Nama
ORDER BY 
    a.Id_Pembayaran ASC");
$dbrow = $jos->num_rows();


foreach ($jos->result_array() as $key) {
    $nHarga += $key['Nominal'];
    $jumlahbaris = $dbrow;
    $worksheet1->write_string($row,0,  $key['Rekening'] ,$content);
    $worksheet1->write_string($row,1,  $key['Atas_Nama'] ,$content);
    $worksheet1->write_string($row,2,  '' ,$content);
    $worksheet1->write_string($row,3,  '' ,$content);
    $worksheet1->write_string($row,4,  '',$content);
    $worksheet1->write_string($row,5,  'IDR' ,$content);
    $worksheet1->write_string($row,6,  $key['Nominal'] ,$content);
    $worksheet1->write_string($row,7,  '' ,$content);
    $worksheet1->write_string($row,8,  '' ,$content);
    if($key['Id_Pembayaran'] == '0'){
        $worksheet1->write_string($row,9,  'IBU' ,$content);
    }else{
        $worksheet1->write_string($row,9,  'LBU' ,$content);
    }
    $worksheet1->write_string($row,10, $key['KodeBank'] ,$content);
    $worksheet1->write_string($row,11, $key['NamaBank'] ,$content);
    $worksheet1->write_string($row,12, 'Bekasi' ,$content);
    $worksheet1->write_string($row,13, '' ,$content);
    $worksheet1->write_string($row,14, '' ,$content);
    $worksheet1->write_string($row,15, '' ,$content);
    $worksheet1->write_string($row,16, 'N' ,$content);
    $worksheet1->write_string($row,17, '' ,$content);
    $worksheet1->write_string($row,18, '' ,$content);
    $worksheet1->write_string($row,19, '' ,$content);
    $worksheet1->write_string($row,20, '' ,$content);
    $worksheet1->write_string($row,21, '' ,$content);
    $worksheet1->write_string($row,22, '' ,$content);
    $worksheet1->write_string($row,23, '' ,$content);
    $worksheet1->write_string($row,24, '' ,$content);
    $worksheet1->write_string($row,25, '' ,$content);
    $worksheet1->write_string($row,26, '' ,$content);
    $worksheet1->write_string($row,27, '' ,$content);
    $worksheet1->write_string($row,28, '' ,$content);
    $worksheet1->write_string($row,29, '' ,$content);
    $worksheet1->write_string($row,30, '' ,$content);
    $worksheet1->write_string($row,31, '' ,$content);
    $worksheet1->write_string($row,32, '' ,$content);
    $worksheet1->write_string($row,33, '' ,$content);
    $worksheet1->write_string($row,34, '' ,$content);
    $worksheet1->write_string($row,35, '' ,$content);
    $worksheet1->write_string($row,36, '' ,$content);
    $worksheet1->write_string($row,37, '' ,$content);
    $worksheet1->write_string($row,38, '' ,$content);
    $worksheet1->write_string($row,39, '' ,$content);
    $row++;
}

    $worksheet1->write_string(0,1,date("Ymd"),$headernumerik);  // Set Nama kolom
    $worksheet1->write_string(0,3,($jumlahbaris),$headernumerik);  // Set Nama kolom
    $worksheet1->write_string(1,40, 'Gaji November 2017' ,$content);
    $worksheet1->write_string(0,4,$nHarga,$headernumerik);  // Set Nama kolom
$workbook->close();