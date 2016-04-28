/**
 * Created by charles on 4/24/16.
 */

var UpdateCase ={
    getBeneficiaryCase : function (beneficiaryId){
        //$("#loading-image").show();
        $.when(
            $.ajax({
                url:"/getbeneficiarycase"+'?id='+beneficiaryId,
                success: function(data){
                    $('#beneficiaryCase').select2({
                        width: '100%',
                        placeholder: 'Select Case',
                        data: $.map(data, function(obj) {
                            return { id: obj.id, text: obj.case_num };
                        })
                    }).on('change', function (e) {
                        $('#case_id').val($(this).val());
                        $('#case_details').show();
                    }).append($('<option selected>Loading...</option>').val(''));
                },
                error: function (err) {

                    $('#loaded-data').html(err.responseText);
                    $("#loading-image").hide();
                }
            })
        ).then(function(data){
                if(data != null && data.length > 0){
                    $('span#search_msg').html('');
                    $('span#ben_id').append(data[0].beneficiary.id);
                    $('span#ben_num').append(data[0].beneficiary.beneficiary_num);
                    $('span#ben_fname').append(data[0].beneficiary.firstname);
                    $('span#ben_lname').append(data[0].beneficiary.lastname);
                    $('span#ben_addr').append(data[0].beneficiary.address);
                    $('#beneficiary span').show();
                    $('#ben_cases').show();
                }else{
                    $('span#search_msg').append('No case exists for selected beneficiary!');
                    $('#beneficiary span').hide();
                    $('#ben_cases').hide();
                    $('#case_details').hide();
                }


            });
    }

}

$(document).ready(function() {
    $('#beneficiary span').hide();
    $('#ben_cases').hide();
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
        UpdateCase.getBeneficiaryCase($(this).val());
    });

    /*$('#beneficiaryCase').select2({
         data: [{ id: 1, text: 'A' }, { id: 3, text: 'C' }]
    });*/

});


