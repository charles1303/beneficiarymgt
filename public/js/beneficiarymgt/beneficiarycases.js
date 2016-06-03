/**
 * Created by charles on 6/2/16.
 */
var BeneficiaryCases ={

}

$(document).ready(function() {
    $('#filter-date .input-daterange').datetimepicker();

    $('#dt_start, #dt_end').datetimepicker({
        format: 'YYYY-MM-DD'
    });

    var table = $('#beneficiarycases').DataTable({
        dom: 'lBfrtip',
        buttons: [
            {
                extend: 'csv',
                text: 'Download data',
                exportOptions: {
                    modifier: {
                        search: 'none'
                    }
                }
            }
        ]

    });


});