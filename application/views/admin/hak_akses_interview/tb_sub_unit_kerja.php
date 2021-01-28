<?php

?>
<select name="pSuk" class="form-control kt-selectpicker" data-live-search="true">
    <option></option>
    <?php
        $jsArray = "var jason = new Array();\n";
        foreach ($row as $rowUk) {
    ?>
    <option value="<?= $rowUk['id_unit_kerja'] ?>" <?php //if ($rowUk['id_unit_kerja'] == $cIdUnitKerja) echo 'selected'; ?>>
        <?= $rowUk['nama_sub_unit_kerja'] ?>
    </option>';
    <?php
       }
    ?>
</select>
                                                    