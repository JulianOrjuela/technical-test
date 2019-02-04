/* Ready elements of form-modal */

$('document').ready(function()
{
    /* validation */
    $("#register-form").validate({
        rules:
        {
            f_name: {
                required: true,
                minlength: 3
            },
            l_name: {
                required: true,
                minlength: 3
            },
            email: {
                required: true,
                email: true
            },
            address: {
                required: true,
                minlength: 6
            },
            postal: {
                required: true
            },
            city: {
                required: true
            },
            psw: {
                required: true,
                minlength: 8,
                maxlength: 15
            },
            psw_repeat: {
                required: true,
                equalTo: '#psw'
            },
            
        },
        messages:
        {
            f_name: "Enter a Valid First Name",
            l_name: "Enter a Valid Last Name",
            psw:{
                required: "Provide a Password",
                minlength: "Password Needs To Be Minimum of 8 Characters"
            },
            email: "Enter a Valid Email",
            psw_repeat:{
                required: "Retype Your Password",
                equalTo: "Password Mismatch! Retype"
            }
        },
        submitHandler: submitForm
    });
    /* validation */

    /* form submit */
    function submitForm()
    {
        var data = $("#register-form").serialize();

        $.ajax({

            type : 'POST',
            url  : 'send.php',
            data : data,
            beforeSend: function()
            {
                $("#error").fadeOut();
                $("#btn-reg").html('<span class="glyphicon glyphicon-transfer"></span>   sending ...');
            },
            success :  function(data)
            {
                if(data==1){

                    $("#error").fadeIn(1000, function(){


                        $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span>   Sorry email already taken !</div>');

                        $("#btn-reg").html('<span class="glyphicon glyphicon-log-in"></span> Send Form');

                    });

                }
              
            }
        });
        return false;
    }
    /* form submit */

});

var modal = document.getElementById('form-modal'); 
  
  
window.onclick = function(event) { 
    if (event.target == modal) { 
        modal.style.display = "none"; 
    } 
} 

