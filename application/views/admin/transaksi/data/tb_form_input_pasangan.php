<?php

foreach ($st_pernikahan as $row) {
    if ($cStatusKawin == "0") {
?>
        <div class="row">

            <!-- <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <label>Status Perkawinan</label>
                    <select name="cStatusKawin" class="form-control kt-selectpicker" data-live-search="true">
                        <option></option>
                        <option value="0" <?php if ($row['status_kawin'] == 0) echo "selected"; ?>>Menikah</option>
                        <option value="1" <?php if ($row['status_kawin'] == 1) echo "selected"; ?>>Belum Menikah</option>
                    </select> -->
                    <!-- <input type="text" name="cStatusKawin" class="form-control" placeholder="Status Perkawinan" value="<?= $cStatusKawin ?>"> -->

                <!-- </div>
            </div>  -->
            <!-- /.col-form -->

            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <label>Nama Istri/Suami</label>
                    <input type="text" name="cNamaPasangan" class="form-control" placeholder="Nama Istri/Suami" value="<?= $row['istri_suami'] ?>">

                </div>
            </div> <!-- /.col-form -->

            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <label>Tgl Lahir Istri/Suami</label>
                    <div class="input-group">
                        <!-- <input type="text" name="dTglLahirIstri" class="form-control" data-date-format="dd-mm-yyyy" value="<?= $dTglLahirIstri ?>" id="tglDT"> -->
                        <input type="date" name="dTglLahirIstri" onchange="umurPasangan();" class="form-control" value="<?= $row['tgl_lahir_istri'] ?>" id="dobPasangan">
                        <button type="button" onclick="javascript:dobPasangan.value=''">X</button>
                        <div class="input-group-addon">
                            <i class="fa fa-calendar-o"></i>
                        </div>
                    </div>
                </div>
            </div> <!-- /.col-form -->

            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <label>Umur</label>
                    <input type="text" name="nUmurPasangan" id="agesPasangan" class="form-control" placeholder="Umur" value="<?= $row['umur_istri'] ?>" style="background-color:#fff;" disabled>

                </div>
            </div> <!-- /.col-form -->

            <div class="col-sm-12">
                <div class="kt-portlet__foot">
                </div>
            </div>

            <div class="col-sm-4 col-md-4">
                <div class="form-group">
                    <label>Nama Anak Ke-1</label>
                    <input type="text" name="nAnak1" class="form-control" placeholder="Nama Anak Ke-1" value="<?= $row['anak_1'] ?>">

                </div>
            </div> <!-- /.col-form -->

            <div class="col-sm-4 col-md-4">
                <div class="form-group">
                    <label>Tgl Lahir Anak Ke-1</label>
                    <div class="input-group">
                        <!-- <input type="text" name="dTglLahirAnak1" class="form-control" data-date-format="dd-mm-yyyy" value="<?= $dTglLahirAnak1 ?>" id="tglDT"> -->
                        <input type="date" name="dTglLahirAnak1" onchange="umurAnak1();" class="form-control" value="<?= $row['tgl_lahir_anak_1'] ?>" id="dobAnak1">
                        <button type="button" onclick="javascript:dobAnak1.value=''">X</button>
                        <div class="input-group-addon">
                            <i class="fa fa-calendar-o"></i>
                        </div>
                    </div>
                </div>
            </div> <!-- /.col-form -->

            <div class="col-sm-4 col-md-4">
                <div class="form-group">
                    <label>Umur Anak Ke-1</label>
                    <input type="text" name="nUmurAnak1" id="agesAnak1" class="form-control" placeholder="Umur" value="<?= $row['umur_anak_1'] ?>" style="background-color:#fff;" disabled>

                </div>
            </div> <!-- /.col-form -->

            <div class="col-sm-4 col-md-4">
                <div class="form-group">
                    <label>Nama Anak Ke-2</label>
                    <input type="text" name="nAnak2" class="form-control" placeholder="Nama Anak Ke-2" value="<?= $row['anak_2'] ?>">

                </div>
            </div> <!-- /.col-form -->

            <div class="col-sm-4 col-md-4">
                <div class="form-group">
                    <label>Tgl Lahir Anak Ke-2</label>
                    <div class="input-group">
                        <!-- <input type="text" name="dTglLahirAnak2" class="form-control" data-date-format="dd-mm-yyyy" value="<?= $dTglLahirAnak2 ?>" id="tglDT"> -->
                        <input type="date" name="dTglLahirAnak2" onchange="umurAnak2();" class="form-control" value="<?= $row['tgl_lahir_anak_2'] ?>" id="dobAnak2">
                        <button type="button" onclick="javascript:dobAnak2.value=''">X</button>
                        <div class="input-group-addon">
                            <i class="fa fa-calendar-o"></i>
                        </div>
                    </div>
                </div>
            </div> <!-- /.col-form -->

            <div class="col-sm-4 col-md-4">
                <div class="form-group">
                    <label>Umur Anak Ke-2</label>
                    <input type="text" name="nUmurAnak2" id="agesAnak2" class="form-control" placeholder="Umur" value="<?= $row['umur_anak_2'] ?>" style="background-color:#fff;" disabled>

                </div>
            </div> <!-- /.col-form -->

            <div class="col-sm-4 col-md-4">
                <div class="form-group">
                    <label>Nama Anak Ke-3</label>
                    <input type="text" name="nAnak3" class="form-control" placeholder="Nama Anak Ke-3" value="<?= $row['anak_3'] ?>">

                </div>
            </div> <!-- /.col-form -->

            <div class="col-sm-4 col-md-4">
                <div class="form-group">
                    <label>Tgl Lahir Anak Ke-3</label>
                    <div class="input-group">
                        <!-- <input type="text" name="dTglLahirAnak3" class="form-control" data-date-format="dd-mm-yyyy" value="<?= $dTglLahirAnak3 ?>" id="tglDT"> -->
                        <input type="date" name="dTglLahirAnak3" onchange="umurAnak3();" class="form-control" value="<?= $row['tgl_lahir_anak_3'] ?>" id="dobAnak3">
                        <button type="button" onclick="javascript:dobAnak3.value=''">X</button>
                        <div class="input-group-addon">
                            <i class="fa fa-calendar-o"></i>
                        </div>
                    </div>
                </div>
            </div> <!-- /.col-form -->

            <div class="col-sm-4 col-md-4">
                <div class="form-group">
                    <label>Umur Anak Ke-3</label>
                    <input type="text" name="nUmurAnak3" id="agesAnak3" class="form-control" placeholder="Umur" value="<?= $row['umur_anak_3'] ?>" style="background-color:#fff;" disabled>

                </div>
            </div> <!-- /.col-form -->
        </div>
    <?php
    } elseif ($cStatusKawin == "1") {
    ?>
        <!-- <div class="row">
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <label>Status Perkawinan</label>
                    <select name="cStatusKawin" class="form-control kt-selectpicker" data-live-search="true">
                        <option></option>
                        <option value="0" <?php if ($row['status_kawin'] == 0) echo "selected"; ?>>Menikah</option>
                        <option value="1" <?php if ($row['status_kawin'] == 1) echo "selected"; ?>>Belum Menikah</option>
                    </select> -->
                    <!-- <input type="text" name="cStatusKawin" class="form-control" placeholder="Status Perkawinan" value="<?= $cStatusKawin ?>"> -->

                <!-- </div>
            </div>  -->
            <!-- /.col-form -->
        <!-- </div> -->
    <?php
    } else {
    ?>
        <!-- <div class="row">
            <div class="col-sm-6 col-md-6">
                <div class="form-group">
                    <label>Status Perkawinan blbl</label>
                    <select name="cStatusKawin" class="form-control kt-selectpicker" data-live-search="true">
                        <option></option>
                        <option value="0" <?php if ($row['status_kawin'] == 0) echo "selected"; ?>>Menikah</option>
                        <option value="1" <?php if ($row['status_kawin'] == 1) echo "selected"; ?>>Belum Menikah</option>
                    </select> -->
                    <!-- <input type="text" name="cStatusKawin" class="form-control" placeholder="Status Perkawinan" value="<?= $cStatusKawin ?>"> -->

                <!-- </div>
            </div>  -->
            <!-- /.col-form -->
        <!-- </div> -->
<?php
    }
}
?>

<script type="text/javascript">
    function umurPasangan() {
        //collect input from HTML form and convert into date format
        var userinput = document.getElementById("dobPasangan").value;
        var dob = new Date(userinput);

        //check user provide input or not
        if (userinput == null || userinput == '') {
            document.getElementById("message").innerHTML = "**Choose a date please!";
            return false;
        }

        //execute if the user entered a date 
        else {
            //extract the year, month, and date from user date input
            var dobYear = dob.getYear();
            var dobMonth = dob.getMonth();
            var dobDate = dob.getDate();

            //get the current date from the system
            var now = new Date();
            //extract the year, month, and date from current date
            var currentYear = now.getYear();
            var currentMonth = now.getMonth();
            var currentDate = now.getDate();

            //declare a variable to collect the age in year, month, and days
            var age = {};
            var ageString = "";

            //get years
            yearAge = currentYear - dobYear;

            //get months
            if (currentMonth >= dobMonth)
                //get months when current month is greater
                var monthAge = currentMonth - dobMonth;
            else {
                yearAge--;
                var monthAge = 12 + currentMonth - dobMonth;
            }

            //get days
            if (currentDate >= dobDate)
                //get days when the current date is greater
                var dateAge = currentDate - dobDate;
            else {
                monthAge--;
                var dateAge = 31 + currentDate - dobDate;

                if (monthAge < 0) {
                    monthAge = 11;
                    yearAge--;
                }
            }
            //group the age in a single variable
            age = {
                years: yearAge,
                months: monthAge,
                days: dateAge
            };

            if ((age.years > 0) && (age.months > 0) && (age.days > 0))
                // ageString = age.years + " Tahun, " + age.months + " Bulan, and " + age.days + " days old.";
                ageString = age.years + " Tahun " + age.months + " Bulan";
            // else if ((age.years == 0) && (age.months == 0) && (age.days > 0))
            //   ageString = "Only " + age.days + " days old!";
            // when current month and date is same as birth date and month
            else if ((age.years > 0) && (age.months == 0) && (age.days == 0))
                ageString = age.years + " Tahun";
            else if ((age.years > 0) && (age.months > 0) && (age.days == 0))
                ageString = age.years + " Tahun " + age.months + " Bulan";
            // else if ((age.years == 0) && (age.months > 0) && (age.days > 0))
            //   ageString = age.months + " Bulan and " + age.days + " days old.";
            else if ((age.years > 0) && (age.months == 0) && (age.days > 0))
                // ageString = age.years + " Tahun, and" + age.days + " days old.";
                ageString = age.years + " Tahun ";
            // else if ((age.years == 0) && (age.months > 0) && (age.days == 0))
            //   ageString = age.months + " Bulan old.";
            // when current date is same as dob(date of birth)
            else ageString = "Welcome to Earth!, It's first day on Earth!";

            //display the calculated age
            return document.getElementById("agesPasangan").value = ageString;

        }
    }

    function umurAnak1() {
        //collect input from HTML form and convert into date format
        var userinput = document.getElementById("dobAnak1").value;
        var dob = new Date(userinput);

        //check user provide input or not
        if (userinput == null || userinput == '') {
            document.getElementById("message").innerHTML = "**Choose a date please!";
            return false;
        }

        //execute if the user entered a date 
        else {
            //extract the year, month, and date from user date input
            var dobYear = dob.getYear();
            var dobMonth = dob.getMonth();
            var dobDate = dob.getDate();

            //get the current date from the system
            var now = new Date();
            //extract the year, month, and date from current date
            var currentYear = now.getYear();
            var currentMonth = now.getMonth();
            var currentDate = now.getDate();

            //declare a variable to collect the age in year, month, and days
            var age = {};
            var ageString = "";

            //get years
            yearAge = currentYear - dobYear;

            //get months
            if (currentMonth >= dobMonth)
                //get months when current month is greater
                var monthAge = currentMonth - dobMonth;
            else {
                yearAge--;
                var monthAge = 12 + currentMonth - dobMonth;
            }

            //get days
            if (currentDate >= dobDate)
                //get days when the current date is greater
                var dateAge = currentDate - dobDate;
            else {
                monthAge--;
                var dateAge = 31 + currentDate - dobDate;

                if (monthAge < 0) {
                    monthAge = 11;
                    yearAge--;
                }
            }
            //group the age in a single variable
            age = {
                years: yearAge,
                months: monthAge,
                days: dateAge
            };

            if ((age.years > 0) && (age.months > 0) && (age.days > 0))
                // ageString = age.years + " Tahun, " + age.months + " Bulan, and " + age.days + " days old.";
                ageString = age.years + " Tahun " + age.months + " Bulan";
            else if ((age.years == 0) && (age.months == 0) && (age.days > 0))
                ageString = "Umur " + age.days + " Hari";
            //when current month and date is same as birth date and month
            else if ((age.years > 0) && (age.months == 0) && (age.days == 0))
                ageString = age.years + " Tahun";
            else if ((age.years > 0) && (age.months > 0) && (age.days == 0))
                ageString = age.years + " Tahun " + age.months + " Bulan ";
            else if ((age.years == 0) && (age.months > 0) && (age.days > 0))
                ageString = age.months + " Bulan " + age.days + " Hari";
            else if ((age.years > 0) && (age.months == 0) && (age.days > 0))
                ageString = age.years + " Tahun " + age.days + " Hari";
            else if ((age.years == 0) && (age.months > 0) && (age.days == 0))
                ageString = age.months + " Bulan";
            //when current date is same as dob(date of birth)
            else ageString = "Welcome to Earth!, It's first day on Earth!";

            //display the calculated age
            return document.getElementById("agesAnak1").value = ageString;

        }
    }

    function umurAnak2() {
        //collect input from HTML form and convert into date format
        var userinput = document.getElementById("dobAnak2").value;
        var dob = new Date(userinput);

        //check user provide input or not
        if (userinput == null || userinput == '') {
            document.getElementById("message").innerHTML = "**Choose a date please!";
            return false;
        }

        //execute if the user entered a date 
        else {
            //extract the year, month, and date from user date input
            var dobYear = dob.getYear();
            var dobMonth = dob.getMonth();
            var dobDate = dob.getDate();

            //get the current date from the system
            var now = new Date();
            //extract the year, month, and date from current date
            var currentYear = now.getYear();
            var currentMonth = now.getMonth();
            var currentDate = now.getDate();

            //declare a variable to collect the age in year, month, and days
            var age = {};
            var ageString = "";

            //get years
            yearAge = currentYear - dobYear;

            //get months
            if (currentMonth >= dobMonth)
                //get months when current month is greater
                var monthAge = currentMonth - dobMonth;
            else {
                yearAge--;
                var monthAge = 12 + currentMonth - dobMonth;
            }

            //get days
            if (currentDate >= dobDate)
                //get days when the current date is greater
                var dateAge = currentDate - dobDate;
            else {
                monthAge--;
                var dateAge = 31 + currentDate - dobDate;

                if (monthAge < 0) {
                    monthAge = 11;
                    yearAge--;
                }
            }
            //group the age in a single variable
            age = {
                years: yearAge,
                months: monthAge,
                days: dateAge
            };

            if ((age.years > 0) && (age.months > 0) && (age.days > 0))
                // ageString = age.years + " Tahun, " + age.months + " Bulan, and " + age.days + " days old.";
                ageString = age.years + " Tahun " + age.months + " Bulan";
            else if ((age.years == 0) && (age.months == 0) && (age.days > 0))
                ageString = "Umur " + age.days + " Hari";
            //when current month and date is same as birth date and month
            else if ((age.years > 0) && (age.months == 0) && (age.days == 0))
                ageString = age.years + " Tahun";
            else if ((age.years > 0) && (age.months > 0) && (age.days == 0))
                ageString = age.years + " Tahun " + age.months + " Bulan ";
            else if ((age.years == 0) && (age.months > 0) && (age.days > 0))
                ageString = age.months + " Bulan " + age.days + " Hari";
            else if ((age.years > 0) && (age.months == 0) && (age.days > 0))
                ageString = age.years + " Tahun " + age.days + " Hari";
            else if ((age.years == 0) && (age.months > 0) && (age.days == 0))
                ageString = age.months + " Bulan";
            //when current date is same as dob(date of birth)
            else ageString = "Welcome to Earth!, It's first day on Earth!";

            //display the calculated age
            return document.getElementById("agesAnak2").value = ageString;

        }
    }

    function umurAnak3() {
        //collect input from HTML form and convert into date format
        var userinput = document.getElementById("dobAnak3").value;
        var dob = new Date(userinput);

        //check user provide input or not
        if (userinput == null || userinput == '') {
            document.getElementById("message").innerHTML = "**Choose a date please!";
            return false;
        }

        //execute if the user entered a date 
        else {
            //extract the year, month, and date from user date input
            var dobYear = dob.getYear();
            var dobMonth = dob.getMonth();
            var dobDate = dob.getDate();

            //get the current date from the system
            var now = new Date();
            //extract the year, month, and date from current date
            var currentYear = now.getYear();
            var currentMonth = now.getMonth();
            var currentDate = now.getDate();

            //declare a variable to collect the age in year, month, and days
            var age = {};
            var ageString = "";

            //get years
            yearAge = currentYear - dobYear;

            //get months
            if (currentMonth >= dobMonth)
                //get months when current month is greater
                var monthAge = currentMonth - dobMonth;
            else {
                yearAge--;
                var monthAge = 12 + currentMonth - dobMonth;
            }

            //get days
            if (currentDate >= dobDate)
                //get days when the current date is greater
                var dateAge = currentDate - dobDate;
            else {
                monthAge--;
                var dateAge = 31 + currentDate - dobDate;

                if (monthAge < 0) {
                    monthAge = 11;
                    yearAge--;
                }
            }
            //group the age in a single variable
            age = {
                years: yearAge,
                months: monthAge,
                days: dateAge
            };

            if ((age.years > 0) && (age.months > 0) && (age.days > 0))
                // ageString = age.years + " Tahun, " + age.months + " Bulan, and " + age.days + " days old.";
                ageString = age.years + " Tahun " + age.months + " Bulan";
            else if ((age.years == 0) && (age.months == 0) && (age.days > 0))
                ageString = "Umur " + age.days + " Hari";
            //when current month and date is same as birth date and month
            else if ((age.years > 0) && (age.months == 0) && (age.days == 0))
                ageString = age.years + " Tahun";
            else if ((age.years > 0) && (age.months > 0) && (age.days == 0))
                ageString = age.years + " Tahun " + age.months + " Bulan ";
            else if ((age.years == 0) && (age.months > 0) && (age.days > 0))
                ageString = age.months + " Bulan " + age.days + " Hari";
            else if ((age.years > 0) && (age.months == 0) && (age.days > 0))
                ageString = age.years + " Tahun " + age.days + " Hari";
            else if ((age.years == 0) && (age.months > 0) && (age.days == 0))
                ageString = age.months + " Bulan";
            //when current date is same as dob(date of birth)
            else ageString = "Welcome to Earth!, It's first day on Earth!";

            //display the calculated age
            return document.getElementById("agesAnak3").value = ageString;

        }
    }
</script>