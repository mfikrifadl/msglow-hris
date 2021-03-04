<?php
    
    if($bayar == 0){
        $cPembayaran = "Mandiri";
    }elseif($bayar == 2){
        $cPembayaran = "Bank Syariah Mandiri";
    }elseif($bayar == 3){
        $cPembayaran = "Bni Syariah";
    }elseif($bayar == 4){
        $cPembayaran = "Cash";
    }elseif($bayar == 5){
        $cPembayaran = "Semua Pembayaran";
    }elseif($bayar == 6){
        $cPembayaran = "BNI";
    }elseif($bayar == 7){
        $cPembayaran = "GNC";
    }

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
header("Content-Disposition: attachment; filename=GNC Payroll - PT. Global Insight Utama - ".$cBulan."-".date("Y")." .xls" );
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
header("Pragma: public");

$workbook = new Workbook();
$worksheet1 =& $workbook->add_worksheet(date('dmY_His'));

$header =& $workbook->add_format();
$header->set_color('black'); // set warna huruf
$header->set_bg_color('black'); // set warna border

$header->set_size(12); // Set ukuran font 

$header->set_align("center"); // set align rata tengah

$header->set_top(2); // set ketebalan border bagian atas cell 0 = border tidak tampil
$header->set_bottom(2); // set ketebalan border bagian atas cell 0 = border tidak tampil
$header->set_left(2); // set ketebalan border bagian atas cell 0 = border tidak tampil
$header->set_right(2); // set ketebalan border bagian atas cell 0 = border tidak tampil


$worksheet1->write_string(0,0,'REKENING',$header);  // Set Nama kolom
$worksheet1->set_column(0,0,24); // Set lebar kolom

$worksheet1->write_string(0,1,'PLUS',$header);  // Set Nama kolom
$worksheet1->set_column(0,1,7); // Set lebar kolom 

$worksheet1->write_string(0,2,'NOMINAL',$header);  // Set Nama kolom
$worksheet1->set_column(0,2,18); // Set lebar kolom

$worksheet1->write_string(0,3,'CD',$header);  // Set Nama kolom
$worksheet1->set_column(0,3,5); // Set lebar kolom

$worksheet1->write_string(0,4,'NO',$header);  // Set Nama kolom
$worksheet1->set_column(0,4,6); // Set lebar kolom

$worksheet1->write_string(0,5,'NAMA',$header);  // Set Nama kolom
$worksheet1->set_column(0,5,38); // Set lebar kolom

$worksheet1->write_string(0,6,'KETERANGAN',$header);  // Set Nama kolom
$worksheet1->set_column(0,6,31); // Set lebar kolom




$content =& $workbook->add_format();
$content->set_size(11);

$content->set_top(1); // set ketebalan border bagian atas cell 0 = border tidak tampil
$content->set_bottom(1); // set ketebalan border bagian atas cell 0 = border tidak tampil
$content->set_left(1); // set ketebalan border bagian atas cell 0 = border tidak tampil
$content->set_right(1); // set ketebalan border bagian atas cell 0 = border tidak tampil

$row = 1;


if($bayar == 5){
$jos = $this->db->query("CALL rekapan_gaji('".$bulan."','".$tahun."')");
}else{
$jos = $this->db->query("SELECT 
 a.Pegawai,a.Rekening,a.Atas_Nama,SUM(g.total) AS Nominal,a.Pembayaran
FROM 
 v_gaji a , tb_gaji g
WHERE a.id_absen = g.id_absen and a.Id_Pembayaran = '".$bayar."' and a.bulan = '".$bulan."' and a.tahun = '".$tahun."' 
GROUP BY 
    Atas_Nama
ORDER BY 
    a.Rekening ASC");   
}

$no         = 0 ;
$nTotal     = 0 ;
$nTotal     = ($nGajiPokok + $nUangMakanHariBiasa + $nUangMakanHariLibur + 
             $nUangMakanLongshiftBiasa + $nUangMakanLongshiftLibur + $nUangLaporan +
             $nUangKesehatan + $nBonusSebelumnya + $nInsentif1 + $nInsentif2 +
             $nInsentif3 + $nInsentif4 + $nInsentif5) - $nPinjaman - $nDenda - $nLainLain  ;

foreach ($jos->result_array() as $key) {

    $nTotal             += $key['Nominal'] ;                
    $worksheet1->write_string($row,0,  $key['Rekening'] ,$content);
    $worksheet1->write_string($row,1,  '' ,$content);
    $worksheet1->write_string($row,2,  (round($key['Nominal'],-3)) ,$content);
    $worksheet1->write_string($row,3,  '' ,$content);
    $worksheet1->write_string($row,4,  ++$no ,$content);
    $worksheet1->write_string($row,5,  $key['Atas_Nama'] ,$content);
    $worksheet1->write_string($row,6,  'PT.GLOBAL INSIGHT UTAMA',$content);    
    $row++;
}


$worksheet1->write_string($row+1,0, 'Bekasi, '.date("d").' '.$cBulan.' '.date("Y").' ');
$worksheet1->write_string($row+2,0, 'PT. Global Insight Utama');
$worksheet1->write_string($row+3,0, '');
$worksheet1->write_string($row+4,0, '');
$worksheet1->write_string($row+5,0, '');
$worksheet1->write_string($row+6,0, 'Dewi M. Ratnasari');
$worksheet1->write_string($row+7,0, 'HRD  Payroll');

$workbook->close();

