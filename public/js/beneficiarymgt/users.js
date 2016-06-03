/**
 * Created by charles on 5/30/16.
 */


var User ={
    updateUser : function (userids){
        $.ajax({
            url: 'resetuser',
            type: 'POST',
            data: userids,
            dataType: 'json',
            success: function(info){
                $('#ajaxResponse').empty();
                $("#ajaxResponse").html("<div class='"+info.messageClass+"'>"+info.msg+"</div>");
                console.log(info.msg);
            },
            error: function(info){
               console.error(info);
            }
        });
    },
    setStatus : function(data){
        var checkedValues = $('input[name="userid"]:checked').map(function() {
            return this.value;
        }).get();

        if(checkedValues.length < 1){
            alert('Please select at least one user !');
            return false;
        }
        data.userids = checkedValues;
        User.updateUser(data);
    }

}

$(document).ready(function() {
    $('#users').DataTable();

    $('.approve').on('click',function(e){
        var userData = {};
        userData.active = 1;
        User.setStatus(userData);
        e.preventDefault();
    });

    $('.deactivate').on('click',function(e){
        var userData = {};
        userData.active = 0;
        User.setStatus(userData);
        e.preventDefault();
    });
});

