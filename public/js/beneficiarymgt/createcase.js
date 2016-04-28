/**
 * Created by charles on 4/17/16.
 */

var CreateCase ={
    getBeneficiary : function (beneficiaryId){
    //$("#loading-image").show();
    $.when(
        $.ajax({
            url:"/getbeneficiary"+'?id='+beneficiaryId,
            success: function(data){

            },
            error: function (err) {

                $('#loaded-data').html(err.responseText);
                $("#loading-image").hide();
            }
        })
    ).then(function(data){
            $('#beneficiary_id').val(data.id);
            $('span#ben_id').append(data.id);
            $('span#ben_num').append(data.beneficiary_num);
            $('span#ben_fname').append(data.firstname);
            $('span#ben_lname').append(data.lastname);
            $('span#ben_addr').append(data.address);
            $('#beneficiary span').show();
            $('#case_details').show();

        });
}

    }

$(document).ready(function() {
    $('#beneficiary span').hide();
    $('#case_details').hide();
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
        CreateCase.getBeneficiary($(this).val());
    });

    $("#bkup_case_officer").select2({
        minimumInputLength: 3,
        placeholder: 'Search for Back up officer By name',
        width: '100%',
        ajax: {
            url: "/searchcaseofficer",
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
                        return { id: obj.id, text: obj.name };
                    })
                };
            },
            cache: true
        }
    }).trigger('change')
});

