/**
 * Created by charles on 5/26/17.
 */

$(document).ready(function() {

    $("#beneficiary").select2({
        minimumInputLength: 3,
        placeholder: 'Search for Beneficiary By name',
        width: 'resolve',
        ajax: {
            url: "/searchbeneficiary",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term // search term
                };
            },
            processResults: function (data, params) {
                params.page = params.page || 1;
                return {
                    results: $.map(data, function(obj) {
                        return { id: obj.id, text: obj.firstname+', '+obj.lastname+' ('+obj.beneficiary_num+')' };
                    })
                };
            },
            cache: true
        }
    }).on('change', function (e) {
        $("#beneficiary_id").val($(this).val());
        $("#benfiles").submit();
        return false;
    });


});


