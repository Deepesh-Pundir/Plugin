<?php

    /*
        Plugin Name:Income Tax Calculator   
        Plugin URI:http://localhost/stripe/
        Description: A Simple Income Tax Calculator Plugin
        Author:Deepesh Pundir
        Author URI:http://localhost/stripe/
        Version:1.0
    */

    // register_activation_hook(__FILE__,'Income_Tax_Calculator_activate');
    // register_deactivation_hook(__FILE__,'Income_Tax_Calculator_deactivate');

    // function Income_Tax_Calculator_activate(){

    // }
    // function Income_Tax_Calculator_deactivate(){
        
    // }
       
    
    add_action( 'wp_enqueue_scripts', 'add_file');
    function add_file(){
        wp_enqueue_style('style_custom', plugin_dir_url(__FILE__)."/public_css/style1.css");
       
        wp_enqueue_script( 'my_custom_script', plugin_dir_url(__FILE__) . '/js/my-script.js' );
    }


    add_action('admin_menu','Income_Tax_Calculator_menu');

    function Income_Tax_Calculator_menu(){

        add_menu_page('Income Tax Calculator','Income Tax Calculator','manage_options','income_tax_calculator','Income_Tax_Calculator_list_call');
    
    }

    function Income_Tax_Calculator_list_call(){
        echo Income_Tax_Calculator_list();
    }

    add_shortcode('Income_Tax_Calculator_shortcode','Income_Tax_Calculator_list');
    


    function Income_Tax_Calculator_list(){
        // wp_enqueue_style('style_custom', plugin_dir_url(__FILE__)."style1.css");
        // include('config.php');
        ob_start();
        include('income_tax_form.php');
        return ob_get_clean();
        
    }
    
    // add admin css
    add_action('admin_head', 'my_custom_fonts');

    function my_custom_fonts() {
        wp_enqueue_style('style_custom', plugin_dir_url(__FILE__)."/admin_css/style2.css");
        wp_enqueue_script( 'my_custom_script', plugin_dir_url(__FILE__) . '/js/my-script.js' );
    }

    // add defer in js file
    function mind_defer_scripts($tag, $handle, $src)
    {
        $defer = array(
            'my_custom_script',
        );
        if (in_array($handle, $defer)) {
            return '<script src="' . $src . '" defer="defer" type="text/javascript"></script>' . "\n";
        }

        return $tag;
    }
    add_filter('script_loader_tag', 'mind_defer_scripts', 10, 3);


// *********************ajax wordpress function******************
// Call function when the form action prformed ***'wp_ajax_' wordpress func and 'form_data' is from action
    add_action('wp_ajax_form_data','ajax_form_data');
    add_action('wp_ajax_nopriv_form_data', 'ajax_form_data');   
    function ajax_form_data(){
        $arr=[];

        wp_parse_str($_POST['form_data'],$arr);
        // wp_send_json_success("test");
        // print_r($arr);

        //incom tax calculation start***************

        // $year=$age=$gross_income=$other_sources=$interest=$rental_income=$self_occupied=$let_out=$basic_ded=$nps=$medical=$charity=$educational_loan=$saving_ac_inter=$basic_sal=$Dallowance=$HRA=$total_rent=0;
        // $old_tax=0;
        // $new_tax=0;
        // $output=0;
    
        $year=$arr['year1'];
        $age=$arr['age'];
        $gross_income=$arr['gross_income'];
        $other_sources=$arr['other_sources'];
        $interest=$arr['interest'];
        $rental_income=$arr['rental_income'];
        $self_occupied=$arr['self_occupied'];
        $let_out=$arr['let_out'];

        $basic_ded=$arr['basic_ded'];
        $nps=$arr['nps'];
        $medical=$arr['medical'];
        $charity=$arr['charity'];
        $educational_loan=$arr['educational_loan'];
        $saving_ac_inter=$arr['saving_ac_inter'];

        $basic_sal=$arr['basic_sal'];
        $Dallowance=$arr['Dallowance'];
        $HRA=$arrT['HRA'];
        $total_rent=$arr['total_rent'];

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
        // incom tax calculation end***************
        // return the data where ajax call***
       
        echo '<div class="old_regime regime">
                    <h5>Total tax (Old regime)</h5>
                    <p>₹ '.$old_tax.'</p>
            </div>
            <div class="new_regime regime">
                <h5>Total tax (New regime)</h5>
                <p>₹ '.$new_tax.' </p>
            </div>
            <div class="regime result_des">
                <div class="result_block">
                    <h5>Decision</h5>';

                    if($old_tax > $new_tax){
                        echo '<p>Old Tax Slab result in Higher Taxes</p>';
                    }
                    else if($old_tax < $new_tax){
                        echo '<p>New Tax Slab result in Higher Taxes</p>';
                    }
                    else{
                        echo '<p>Both slabs Tax result is same</p>';
                    };
                    echo '
                </div>
                <div class="result_block">
                    <h5>Tax Savings</h5>
                    <p> ₹ '.abs($old_tax-$new_tax).'</p>
                </div>
                <div class="result_block">
                    <h5>Better Option</h5>';

                    if($old_tax > $new_tax){
                    echo '<p>New Regime Tax Slab</p>';
                    }
                    else if($old_tax < $new_tax){
                    echo '<p>Old Regime Tax Slab</p>'; 
                    }
                    else{
                    echo '<p>Both are same</p>';
                    };
                echo '</div>';
                wp_die();
}   

   

   

    


 