/**
 * Created by charles on 4/17/16.
 */

var CreateCase ={
    getBeneficiary : function (beneficiaryId){
    $("#loading-image").show();
    $.when(
        $.ajax({
            url:"/getbeneficiary"+'?id='+beneficiaryId,
            success: function(data){
                $('#loaded-data').html(data);
            },
            error: function (err) {

                $('#loaded-data').html(err.responseText);
                $("#loading-image").hide();
            }
        })
    ).then(function(){
            $("#loading-image").hide();
        });
}

    }

$(document).ready(function() {
    $("#beneficiary").select2({
        minimumInputLength: 3,
        placeholder: 'Search for Beneficiary By name',
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
                        return { id: obj.id, text: obj.firstname };
                    })
                };
            },
            cache: true
        }
    }).on('change', function (e) {
        CreateCase.getBeneficiary($(this).val());
    });
});

