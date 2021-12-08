window.onload = function() {
    render();
};

function render() {
    window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
    recaptchaVerifier.render();
}

function phoneAuth() {
    //get the number
    var number = document.getElementById('number').value;
    // alert(number);
    //it takes two parameter first one is number and second one is recaptcha
    firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function(confirmationResult) {
        //s is in lowercase
        window.confirmationResult = confirmationResult;
        coderesult = confirmationResult;
        console.log(coderesult);
        alert("OTP sent");
    }).catch(function(error) {
        alert(error.message);
    });
}

function codeverify() {
    var code = document.getElementById('verificationCode').value;


    coderesult.confirm(code).then(function(result) {
        alert("OTP Verified");
        var user = result.user;
        console.log(user);
       // $.ajax({
          //  url: "verification.php?OTPauth=true"
          //});
        /*
          jQuery.ajax({
        type: "POST",
        url: 'verification.php',
        data: {functionname: 'verified', arguments: ['true']}, 
            success:function(data) {
        alert(data); 
            }
        });
        */
        document.location = "verification.php?OTPauth=true";
        /*$.ajax({
            url: 'verification.php',
            success: function(data) {
              $('.result').html(data);
              alert("gpk"+data);

              //document.write(' <?php include "../../../logout.php"; ?> ');
            }
          });*/

    }).catch(function(error) {
        alert("Invalid Otp");
        //alert(error.message);
    });
}