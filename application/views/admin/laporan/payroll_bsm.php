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
header("Content-Disposition: attachment; filename=Bank Syariah Mandiri Payroll - PT. Global Insight Utama - ".$cBulan."-".date("Y")." .xls" );
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
header("Pragma: public");

$workbook = new Workbook();
$worksheet1 =& $workbook->add_worksheet(date('dmY_His'));

$title =& $workbook->add_format();
$title->set_size(12); // Set ukuran font 
$title->set_bold(1);

$worksheet1->write_string(1,1,'PT. GLOBAL INSIGHT UTAMA',$title);  // Set Nama kolom
$worksheet1->write_string(2,1,'Rekapitulasi Payroll Karyawan',$title);  // Set Nama kolom
$worksheet1->write_string(3,1,'Per - '.$cBulan.' '.date("Y").' ',$title);  // Set Nama kolom


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

$worksheet1->write_string(4,2,'Nama',$header);  // Set Nama kolom
$worksheet1->set_column(0,2,35); // Set lebar kolom 

$worksheet1->write_string(4,3,'No. Rek',$header);  // Set Nama kolom
$worksheet1->set_column(0,3,14); // Set lebar kolom

$worksheet1->write_string(4,4,'Total Gaji ( Rp)',$header);  // Set Nama kolom
$worksheet1->set_column(0,4,16); // Set lebar kolom

$worksheet1->write_string(4,5,'NIK',$header);  // Set Nama kolom
$worksheet1->set_column(0,5,11); // Set lebar kolom





$content =& $workbook->add_format();
$content->set_size(11);

$content->set_top(1); // set ketebalan border bagian atas cell 0 = border tidak tampil
$content->set_bottom(1); // set ketebalan border bagian atas cell 0 = border tidak tampil
$content->set_left(1); // set ketebalan border bagian atas cell 0 = border tidak tampil
$content->set_right(1); // set ketebalan border bagian atas cell 0 = border tidak tampil

$row = 5;


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
    $worksheet1->write_string($row,1,  ++$no ,$content);
    $worksheet1->write_string($row,2,  $key['Atas_Nama'] ,$content);
    $worksheet1->write_string($row,3,  $key['Rekening'] ,$content);
    $worksheet1->write_string($row,4,  (round($key['Nominal'],-3)) ,$content);
    $worksheet1->write_string($row,5,  '' ,$content);  
    $row++;
}


$worksheet1->write_string($row+1,1, 'Bekasi, '.date("d").' '.$cBulan.' '.date("Y").' ');
$worksheet1->write_string($row+2,1, 'PT. Global Insight Utama');
$worksheet1->write_string($row+3,1, '');
$worksheet1->write_string($row+4,1, '');
$worksheet1->write_string($row+5,1, '');
$worksheet1->write_string($row+6,1, 'Dewi M. Ratnasari');
$worksheet1->write_string($row+7,1, 'HRD  Payroll');
$workbook->close();

