jQuery(document).ready(function() {  

    jQuery('#view-more-photo').click(function() {
        jQuery('.no-post').css('display','none');
        jQuery(".post_loader").css('display','block');
        var pagenumber  = jQuery('#page_number').val();
        var totalpages  = jQuery('#total_pages').val();
        totalPages = parseInt(totalpages);
        page = parseInt(pagenumber) + 1;
        if (totalPages >= page) { 
            formData = {};
            formData.action = 'load_more_photos';
            formData.page = page;
            jQuery.ajax({
                type: "post",
                url: ajax_load_photo.ajaxurl,
                data: formData,
                success: function(response) {
                    if (response != "") {
                        var objJson = JSON.parse(response);
                        jQuery(".post_loader").css('display','none');
                        if (objJson.status == 1) {
                            if(objJson.page == 1 ) {
                                jQuery(".gallery-image").html(objJson.html);    
                            } else {
                                jQuery(".gallery-image").append(objJson.html);
                            }
                            jQuery("#page_number").val(objJson.page);
                            jQuery("#total_pages").val(objJson.total_pages);
                            if (objJson.page == objJson.total_pages) {
                                jQuery("#view-more-photo").hide();
                            } else {
                                jQuery("#view-more-photo").css('display','block');
                            }
                            jQuery(".post_loader").css('display','none');
                        }
                    } else {}
                }
            });
        }
    });
});