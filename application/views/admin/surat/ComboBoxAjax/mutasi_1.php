<!-- Select2 -->
<link href="<?=base_url()?>assets/plugins/select2/select2.css" rel="stylesheet" type="text/css" />

<?php 
	foreach ($outlet as $key => $vaOutlet) {
		$cIdSpvLama = $vaOutlet['id_spv'];
	}
?>
<select class="comboBoxs form-control" name="cAtasanLama">
   <option></option>
   <?php foreach ($supervisor as $key => $vaSupervisor) { ?>
    <option value="<?=$vaSupervisor['id_spv']?>"
    <?php if($vaSupervisor['id_spv'] == $cIdSpvLama)echo "selected"; ?>>
      <?=$vaSupervisor['nama']?>
    </option>
   <?php } ?>
 </select>	

 


 <!-- Select2 -->
 <script src="<?=base_url()?>assets/plugins/select2/select2.js" type="text/javascript"></script>
 <script type="text/javascript">
     
       $(".comboBoxs").select2({
          placeholder: "Select Data",
          allowClear: true
      });
 </script>