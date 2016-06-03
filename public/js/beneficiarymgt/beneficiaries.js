/**
 * Created by charles on 6/2/16.
 */
var Beneficiaries ={

}

$(document).ready(function() {
    var table = $('#beneficiaries').DataTable({
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


