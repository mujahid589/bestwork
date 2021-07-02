<script>
    $('#updprofile').submit(function(){
        if($('#cname').val()==""){
            $('#validerror').fadeIn();
            $('#validerror').html("<li>Please Enter Your Company Name</li>");
            return false;
        }
        else   if($('#country').val()==""){
            $('#validerror').fadeIn();
            $('#validerror').html("<li>Please Select Your Country</li>");
            return false;
        }
        else if($('#city').val()==""){
            $('#validerror').fadeIn();
            $('#validerror').html("<li>Please Enter Your City Name</li>");
            return false;
        }
        // else if($('#description').val()==""){
        //     $('#validerror').fadeIn();
        //     $('#validerror').html("<li>Please Enter Your Other Details</li>");
        //     return false;
        // }

        else {
            $('#validerror').removeClass('alert-danger');
            // $('#validerror').addClass('alert-success');
            // $('#validerror').html("<li>Form Submitted Successfully</li>");
            $('#submit').html('<i>Updating Profile .... <i class="fa fa-spinner fa-spin" ></i></i> ')
            $('#updprofile').submit();
            return true
        }
        return false;
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imageUpload").change(function() {
        readURL(this);
    });



</script>