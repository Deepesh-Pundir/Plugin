<?php
    $year=$age=$gross_income=$other_sources=$interest=$rental_income=$self_occupied=$let_out=$basic_ded=$nps=$medical=$charity=$educational_loan=$saving_ac_inter=$basic_sal=$Dallowance=$HRA=$total_rent=0;
    $old_tax=0;
    $new_tax=0;
    $output=0;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $year=$_POST['year1'];
        $age=$_POST['age'];
        
        $gross_income=$_POST['gross_income'];
        $other_sources=$_POST['other_sources'];
        $interest=$_POST['interest'];
        $rental_income=$_POST['rental_income'];
        $self_occupied=$_POST['self_occupied'];
        $let_out=$_POST['let_out'];

        $basic_ded=$_POST['basic_ded'];
        $nps=$_POST['nps'];
        $medical=$_POST['medical'];
        $charity=$_POST['charity'];
        $educational_loan=$_POST['educational_loan'];
        $saving_ac_inter=$_POST['saving_ac_inter'];

        $basic_sal=$_POST['basic_sal'];
        $Dallowance=$_POST['Dallowance'];
        $HRA=$_POST['HRA'];
        $total_rent=$_POST['total_rent'];

        $taxable_income_old= ($gross_income+$other_sources+ $interest+($rental_income-($rental_income*(30/100)))+($basic_sal*(10/100))+$HRA)-($self_occupied+$let_out+$basic_ded+$nps+$medical+$charity+ $educational_loan+ $saving_ac_inter);
        $taxable_income_new= ($gross_income+$other_sources+ $interest+($rental_income-($rental_income*(30/100))))-($self_occupied+$let_out+$nps);
    
        if ($gross_income>0) {
        
            if($age<60){
                $taxable_income_old-=50000;
                switch($taxable_income_old){

                    case $taxable_income_old > 500000 && $taxable_income_old <= 1000000:
                        $old_tax=12500;
                        $taxable_income_old-=500000;
                        $old_tax=$old_tax + ($taxable_income_old*(20/100));
                        $old_tax=$old_tax+($old_tax*(4/100));
                        break;

                    case $taxable_income_old >1000000 && $taxable_income_old <= 1500000:    
                        $old_tax=12500 + 100000;
                        $taxable_income_old-=1000000;
                        $old_tax=$old_tax + ($taxable_income_old*(30/100));
                        $old_tax=$old_tax+($old_tax*(4/100));
                        break;

                    case $taxable_income_old >1500000:     
                        $old_tax=12500 +100000+150000;
                        $taxable_income_old-=1500000;
                        $old_tax=$old_tax + ($taxable_income_old*(30/100));
                        $old_tax=$old_tax+($old_tax*(4/100));
                        break;

                    default:
                        $old_tax=0;
                }

                switch($taxable_income_new){

                    case $taxable_income_new > 500000 && $taxable_income_new <= 750000 : 
                        $new_tax=12500;
                        $taxable_income_new-=500000;
                        $new_tax=$new_tax + ($taxable_income_new*(10/100));
                        $new_tax=$new_tax+($new_tax*(4/100));
                        break;

                    case $taxable_income_new >750000 && $taxable_income_new <= 1000000:     
                        $new_tax=12500 + 25000;
                        $taxable_income_new-=750000;
                        $new_tax=$new_tax + ($taxable_income_new*(15/100));
                        $new_tax=$new_tax+($new_tax*(4/100));
                        break;

                    case $taxable_income_new >1000000 && $taxable_income_new <= 1250000: 
                        $new_tax=12500 +25000+37500;
                        $taxable_income_new-=1000000;
                        $new_tax=$new_tax + ($taxable_income_new*(20/100));
                        $new_tax=$new_tax+($new_tax*(4/100));
                        break;

                    case $taxable_income_new >1250000 && $taxable_income_new <= 1500000:
                        $new_tax=12500 +25000+37500+50000;
                        $taxable_income_new-=1250000;
                        $new_tax=$new_tax + ($taxable_income_new*(25/100));
                        $new_tax=$new_tax+($new_tax*(4/100));
                        break;

                    case $taxable_income_new > 1500000:   
                        $new_tax=12500 +25000+37500+50000+62500;
                        $taxable_income_new-=1250000;
                        $new_tax=$new_tax + ($taxable_income_new*(30/100));
                        $new_tax=$new_tax+($new_tax*(4/100));
                        break;

                    default:
                        $new_tax=0;
                }
            }

            if($age>=60 && $age<80){
                switch($taxable_income_old){

                    case $taxable_income_old > 500000 && $taxable_income_old <= 1000000:
                        $taxable_income_old-=50000;
                        $old_tax=10000;
                        $taxable_income_old-=500000;
                        $old_tax=$old_tax + ($taxable_income_old*(20/100));
                        $old_tax=$old_tax+($old_tax*(4/100));
                        break;

                    case $taxable_income_old >1000000 && $taxable_income_old <= 1500000:    
                        $taxable_income_old-=50000;
                        $old_tax=10000 + 100000;
                        $taxable_income_old-=1000000;
                        $old_tax=$old_tax + ($taxable_income_old*(30/100));
                        $old_tax=$old_tax+($old_tax*(4/100));
                        break;

                    case $taxable_income_old >1500000:     
                        $taxable_income_old-=50000;
                        $old_tax=10000 +100000+150000;
                        $taxable_income_old-=1500000;
                        $old_tax=$old_tax + ($taxable_income_old*(30/100));
                        $old_tax=$old_tax+($old_tax*(4/100));
                        break;

                    default:
                        $old_tax=0;
                }

                switch($taxable_income_new){

                    case $taxable_income_new > 500000 && $taxable_income_new <= 750000 : 
                        $new_tax=12500;
                        $taxable_income_new-=500000;
                        $new_tax=$new_tax + ($taxable_income_new*(10/100));
                        $new_tax=$new_tax+($new_tax*(4/100));
                        break;

                    case $taxable_income_new >750000 && $taxable_income_new <= 1000000:     
                        $new_tax=12500 + 25000;
                        $taxable_income_new-=750000;
                        $new_tax=$new_tax + ($taxable_income_new*(15/100));
                        $new_tax=$new_tax+($new_tax*(4/100));
                        break;

                    case $taxable_income_new >1000000 && $taxable_income_new <= 1250000: 
                        $new_tax=12500 +25000+37500;
                        $taxable_income_new-=1000000;
                        $new_tax=$new_tax + ($taxable_income_new*(20/100));
                        $new_tax=$new_tax+($new_tax*(4/100));
                        break;

                    case $taxable_income_new >1250000 && $taxable_income_new <= 1500000:
                        $new_tax=12500 +25000+37500+50000;
                        $taxable_income_new-=1250000;
                        $new_tax=$new_tax + ($taxable_income_new*(25/100));
                        $new_tax=$new_tax+($new_tax*(4/100));
                        break;

                    case $taxable_income_new > 1500000:   
                        $new_tax=12500 +25000+37500+50000+62500;
                        $taxable_income_new-=1250000;
                        $new_tax=$new_tax + ($taxable_income_new*(30/100));
                        $new_tax=$new_tax+($new_tax*(4/100));
                        break;

                    default:
                        $new_tax=0;
                }
            }

            if($age>=80){
                switch($taxable_income_old){

                    case $taxable_income_old > 500000 && $taxable_income_old <= 1000000:
                        $taxable_income_old-=50000;
                        $old_tax=0;
                        $taxable_income_old-=500000;
                        $old_tax=$old_tax + ($taxable_income_old*(20/100));
                        $old_tax=$old_tax+($old_tax*(4/100));
                        break;

                    case $taxable_income_old >1000000 && $taxable_income_old <= 1500000:    
                        $taxable_income_old-=50000;
                        $old_tax=0 + 100000;
                        $taxable_income_old-=1000000;
                        $old_tax=$old_tax + ($taxable_income_old*(30/100));
                        $old_tax=$old_tax+($old_tax*(4/100));
                        break;

                    case $taxable_income_old >1500000:     
                        $taxable_income_old-=50000;
                        $old_tax=12500 +100000+150000;
                        $taxable_income_old-=1500000;
                        $old_tax=$old_tax + ($taxable_income_old*(30/100));
                        $old_tax=$old_tax+($old_tax*(4/100));
                        break;

                    default:
                        $old_tax=0;
                }

                switch($taxable_income_new){

                    case $taxable_income_new > 500000 && $taxable_income_new <= 750000 : 
                        $new_tax=12500;
                        $taxable_income_new-=500000;
                        $new_tax=$new_tax + ($taxable_income_new*(10/100));
                        $new_tax=$new_tax+($new_tax*(4/100));
                        break;

                    case $taxable_income_new >750000 && $taxable_income_new <= 1000000:     
                        $new_tax=12500 + 25000;
                        $taxable_income_new-=750000;
                        $new_tax=$new_tax + ($taxable_income_new*(15/100));
                        $new_tax=$new_tax+($new_tax*(4/100));
                        break;

                    case $taxable_income_new >1000000 && $taxable_income_new <= 1250000: 
                        $new_tax=12500 +25000+37500;
                        $taxable_income_new-=1000000;
                        $new_tax=$new_tax + ($taxable_income_new*(20/100));
                        $new_tax=$new_tax+($new_tax*(4/100));
                        break;

                    case $taxable_income_new >1250000 && $taxable_income_new <= 1500000:
                        $new_tax=12500 +25000+37500+50000;
                        $taxable_income_new-=1250000;
                        $new_tax=$new_tax + ($taxable_income_new*(25/100));
                        $new_tax=$new_tax+($new_tax*(4/100));
                        break;

                    case $taxable_income_new > 1500000:   
                        $new_tax=12500 +25000+37500+50000+62500;
                        $taxable_income_new-=1250000;
                        $new_tax=$new_tax + ($taxable_income_new*(30/100));
                        $new_tax=$new_tax+($new_tax*(4/100));
                        break;

                    default:
                        $new_tax=0;
                }
            }
        }
    }
   

   