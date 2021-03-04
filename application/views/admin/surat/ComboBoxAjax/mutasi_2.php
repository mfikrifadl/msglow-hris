<!-- Select2 -->
<link href="<?=base_url()?>assets/plugins/select2/select2.css" rel="stylesheet" type="text/css" />

<?php 
	foreach ($outlet as $key => $vaOutlet) {
		$cIdSpvBaru = $vaOutlet['id_spv'];
	}
?>
<select class="comboBoxs_2 form-control" name="cAtasanBaru">
   <option></option>
   <?php foreach ($supervisor as $key => $vaSupervisor) { ?>
    <option value="<?=$vaSupervisor['id_spv']?>"
    <?php if($vaSupervisor['id_spv'] == $cIdSpvBaru)echo "selected"; ?>>
      <?=$vaSupervisor['nama']?>
    </option>
   <?php } ?>
 </select>	

 


 <!-- Select2 -->
 <script src="<?=base_url()?>assets/plugins/select2/select2.js" type="text/javascript"></script>
 <script type="text/javascript">
     
       $(".comboBoxs_2").select2({
          placeholder: "Select Data",
          allowClear: true
      });
 </script>