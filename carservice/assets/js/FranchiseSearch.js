var data_service = [];
jQuery('#franchise_search_input_id').on('input', function () {
    var postal_code = jQuery('#franchise_search_input_id').val();
    var url = '/wp-content/plugins/carservice/ajax/search_service.php';
    jQuery.ajax({
        url: url,
        method: 'POST',
        mode: 'no-cors',
        cache: 'no-cache',
        type: 'POST',
        data: {action_car_service : 'action', postal_code : postal_code},
        beforeSend: function () {
            jQuery('.prload_franchize').show();
        },
        complete: function () {
            jQuery('.prload_franchize').hide();
        },
        success: function (data) {
                data_service = data;
                if(!data.error) {
                    jQuery('.top-block-search-service-result').css('display', 'block')
                    jQuery('.top-block-search-service-result').html(set_link(data_service));
                }
                else {
                    jQuery('.top-block-search-service-result').css('display', 'none')
                    jQuery('.top-block-search-service-result').html('');
                    jQuery('.bottom-block-search_service_result').css('display', 'none');
                    jQuery('.bottom-block-search_service_result').html('');
                }
        }


    });
});


function set_link(data) {
    let str = '';
    str = '<ul class="list-franchize-name">';
    for(i=0; i<data.auto_srv.length; i++) {
        str += '<li onclick="set_num('+i+')" class="list-franchize-name-li" id="'+i+'">'+data.auto_srv[i].franchise_name+'</li>';
    }
    str += '</ul>';

    return str;
}

function set_num(id) {
    jQuery('.bottom-block-search_service_result').css('display', 'block');
    jQuery('.bottom-block-search_service_result').html(set_data_service(data_service.auto_srv[id], data_service.region_map_str));
}

function set_data_service(data, region_map_str) {
    let str = '';
    str = '<div class="p-franchize-name"> '+data.franchise_name+' </div>';
    str += '<div class="p-franchize-info">';
    str += '<a class="franchize-tel">'+data.phone+'</a>';
    str += '<a class="franchize-website">'+data.website+'</a>';
    str += '<a class="franchize-email">'+data.email+'</a>';
    str += '</div>';
    str += '<div class="p-franchize-txt"> '+region_map_str.region_code+', '+region_map_str.region+', '+region_map_str.city+', '+region_map_str.state+' </div>';
    str += '<div class="p-franchize-img"> <img width="250" src="'+data.images+'" /> </div>';

    return str;
}