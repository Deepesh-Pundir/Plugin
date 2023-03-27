    <?php 
        $year=$age=$gross_income=$other_sources=$interest=$rental_income=$self_occupied=$let_out=$basic_ded=$nps=$medical=$charity=$educational_loan=$saving_ac_inter=$basic_sal=$Dallowance=$HRA=$total_rent=0;
        $old_tax=0;
        $new_tax=0;
        $output=0;

        // $year=$arr['year1'];
        // $age=$arr['age'];
    ?>
    <form method="post" id="itc_c8x2s9">

        <label for="year1" class="label"><h4>Assessment Year :</h4></label>
        <select id="year1" class="input" name="year1">
            <!-- <option value="" selected>Select</option> -->
            <option value="2024-2025" <?php if(isset($_POST['year1'])=="2024-2025"){ echo "selected";}?> >2024-2025</option>
            <option value="2023-2024" <?php if(isset($_POST['year1'])=="2023-2024"){ echo "selected";}?>>2023-2024</option>
            <option value="2022-2023" <?php if(isset($_POST['year1'])=="2022-2023"){ echo "selected";}?>>2022-2023</option>
            <option value="2021-2022" <?php if(isset($_POST['year1'])=="2021-2022"){ echo "selected";}?> >2021-2022</option>
        </select>

        <label for="age1" class="label"><h4>Age Category :</h4></label>
        <select id="age1" class="input" name="age">
        <!-- <option value="" selected>Select</option> -->
            <option value="59" <?php if(isset($_POST['age'])=="59"){ echo "selected";}?>>Below 60</option>
            <option value="60"  <?php if(isset($_POST['age'])=="60"){ echo "selected";}?>>60 or above 60</option>
            <option value="80"  <?php if(isset($_POST['age'])=="80"){ echo "selected";}?>>80 or above 80</option>
        </select>

        <h4>Income :</h4>
        <div class="income_fields">
            <div class="income">
                <label for="gross_income">Gross salary income</label>
                <input type="number" name="gross_income" id="gross_income" minlength="1" value="<?php if(isset($gross_income)){echo $gross_income;} ?>">
            </div>
            <div class="income">
                <label for="other_sources">Annual income from other sources</label>
                <input type="number" name="other_sources" id="other_sources" value="<?php if(isset($other_sources)){echo $other_sources;} ?>">
            </div>
            <div class="income">
                <label for="interest">Annual income from interest</label>
                <input type="number" name="interest" id="interest" value="<?php if(isset($interest)){echo $interest ;} ?>">
            </div>
            <div class="income">
                <label for="rental_income">Annual income from let-out house property (rental income)</label>
                <input type="number" name="rental_income" id="rental_income" value="<?php if(isset($rental_income)){echo $rental_income;} ?>">
            </div>
            <div class="income">
                <label for="self_occupied">Annual interest paid on home loan (self-occupied)</label>
                <input type="number" name="self_occupied" id="self_occupied" value="<?php if(isset($self_occupied)){echo $self_occupied;} ?>">
            </div>
            <div class="income">
                <label for="let_out">Annual interest paid on home loan (let-out)</label>
                <input type="number" name="let_out" id="let_out" value="<?php if(isset($let_out)){echo $let_out;} ?>">
            </div>
       </div>

       <h4>Deductions :</h4>
        <div class="income_fields">
            <div class="income">
                <label for="basic_ded">Basic deductions u/s 80C</label>
                <input type="number" id="basic_ded" name="basic_ded" min="0" max="150000" value="<?php if(isset($basic_ded)){echo $basic_ded;} ?>">
            </div>
            <div class="income">
                <label for="nps">Contribution to NPS u/s 80CCD(1B)</label>
                <input type="number" id="nps" name="nps" value="<?php if(isset($nps)){echo $nps;} ?>">
            </div>
            <div class="income">
                <label for="medical">Medical Insurance Premium u/s 80D</label>
                <input type="number" id="medical" name="medical" value="<?php if(isset($medical)){echo $medical;} ?>">
            </div>
            <div class="income">
                <label for="charity">Donation to charity u/s 80G</label>
                <input type="number" id="charity" name="charity" value="<?php if(isset($charity)){echo $charity;} ?>">
            </div>
            <div class="income">
                <label for="educational_loan">Interest on Educational Loan u/s 80E</label>
                <input type="number" id="educational_loan" name="educational_loan" value="<?php if(isset($educational_loan)){echo $educational_loan;} ?>">
            </div>
            <div class="income">
                <label for="">Interest on deposits in saving account u/s 80TTA/TTB</label>
                <input type="number" id="saving_ac_inter" name="saving_ac_inter" value="<?php if(isset($saving_ac_inter)){echo $saving_ac_inter;} ?>">
            </div>
       </div>

       <h4>HRA Exemption :</h4>
        <div class="income_fields">
            <div class="income">
                <label for="basic_sal">Basic salary received per annum</label>
                <input type="number" id="basic_sal" name="basic_sal" value="<?php if(isset( $basic_sal)){echo $basic_sal;} ?>">
            </div>
            <div class="income">
                <label for="Dallowance">Dearness allowance (DA) received per annum</label>
                <input type="number" id="Dallowance" name="Dallowance" value="<?php if(isset($Dallowance)){echo $Dallowance; } ?>">
            </div>
            <div class="income">
                <label for="HRA">HRA received per annum</label>
                <input type="number" id="HRA" name="HRA" value="<?php if(isset($HRA)){echo $HRA;} ?>">
            </div>
            <div class="income">
                <label for="">Total rent paid per annum</label>
                <input type="number" id="total_rent" name="total_rent" value="<?php if(isset($total_rent))echo $total_rent; ?>">
            </div>
       </div>
       <div class="button">
         <input type="submit" id="calculate" name="submit" value="Calculate">
       </div>

       <div class="demo"></div>
    </form>
    <div class="result" id="itc_result_xsa91a">
        <div class="old_regime regime">
            <h5>Total tax (Old regime)</h5>
            <p><?php echo "₹ ".$old_tax; ?> </p>
        </div>
        <div class="new_regime regime">
            <h5>Total tax (New regime)</h5>
            <p><?php echo "₹ ".$new_tax; ?></p>
        </div>
        <div class="regime result_des">
            <div class="result_block">
                <h5>Decision</h5>
                <p><?php if($old_tax > $new_tax){
                    echo "Old Tax Slab result in Higher Taxes";
                }
                else if($old_tax < $new_tax){
                    echo "New Tax Slab result in Higher Taxes"; 
                }
                else{
                    echo "Both slabs Tax result is same";
                }?></p>
            </div>
            <div class="result_block">
                <h5>Tax Savings</h5>
                <p><?php echo "₹ ".abs($old_tax-$new_tax); ?></p>
            </div>
            <div class="result_block">
                <h5>Better Option</h5>
                <p><?php if($old_tax > $new_tax){
                echo "New Regime Tax Slab";
                }
                else if($old_tax < $new_tax){
                    echo "Old Regime Tax Slab"; 
                }
                else{
                    echo "Both are same";
                }?></p>
            </div>

        </div>
    </div>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> -->
    
   

