jQuery("#itc_c8x2s9").submit(function(e){
    //stop submitting the form to see the disabled button effect
    e.preventDefault();
    // var link="<?php echo admin_url('admin-ajax.php'); ?>";
    var link="/stripe/wp-admin/admin-ajax.php";
    var form=jQuery("#itc_c8x2s9").serialize();
    var formData=new FormData;
    formData.append('action','form_data');
    formData.append('form_data',form);

    console.log(link);
    console.log(form);
    jQuery.ajax({
        url:link,
        data:formData,
        processData:false,
        contentType:false,
        type:'POST',
        success:function(result){
            jQuery("#itc_result_xsa91a").html(result);
            // alert(result);
    }
});
});
