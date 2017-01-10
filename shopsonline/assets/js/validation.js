function masking(input, textbox, e) {
    //v m j 4-4-4-4
    //amex 4-6-5
    //
    var foo = input.split("-").join("");
    if (foo.length > 0) {
        foo = foo.match(new RegExp('.{1,4}', 'g')).join("-");
    }
    textbox.value = foo;
}

//cc script start
function cc_onkeyup() {
    var scream1 = document.getElementById('ccform_cardnumber_TB').value;
    var scream = scream1.substring(0, 1);

    var scream2 = scream1.substring(scream1.length, scream1.length - 1);

    if (isNaN(scream2)) {
        if (scream2 != "-") {
            document.getElementById("ccform_cardnumber_TB").value = "";
            document.getElementById("errorMsgTXT").innerHTML = "Numeric only";
            $('#errorMsgModal').modal('toggle');
        }
    }
    else {
        if (scream == "4") {
            document.getElementById("ccform_cardtype_TB").value = "visa";

            document.getElementById("icon_visa").style.display = "inline-block";
            document.getElementById("icon_master").style.display = "none";
            document.getElementById("icon_amex").style.display = "none";
            document.getElementById("icon_jcb").style.display = "none";

            if (scream1.length == 16) {
                document.getElementById("ccform_expmonth_DD2").focus();
            }
            else if (scream1.length >= 17) {
                document.getElementById('ccform_cardnumber_TB').value = scream1.substring(0, scream1.length - 1);
            }
        }
        else if (scream == "5") {
            document.getElementById("ccform_cardtype_TB").value = "mastercard";

            document.getElementById("icon_visa").style.display = "none";
            document.getElementById("icon_master").style.display = "inline-block";
            document.getElementById("icon_amex").style.display = "none";
            document.getElementById("icon_jcb").style.display = "none";

            if (scream1.length == 16) {
                document.getElementById("ccform_expmonth_DD2").focus();
                document.getElementById("ccform_expmonth_DD2").click();
            }
            else if (scream1.length >= 17) {
                document.getElementById('ccform_cardnumber_TB').value = scream1.substring(0, scream1.length - 1);
            }
        }
        else {
            document.getElementById("ccform_cardtype_TB").value = "";
            document.getElementById("ccform_cardnumber_TB").value = "";
            document.getElementById("errorMsgTXT").innerHTML = "Invalid card type, please only use Visa or Mastercard";
        }


        if (scream1 == "") {
            var size = document.getElementById("ccform_cardtype_TB").length;
            var data = document.getElementById("ccform_cardtype_TB").options;

            for (var i = 0; i < size; i++) {
                if (data[i].value == "visa") {
                    document.getElementById("icon_visa").style.display = "inline-block";
                }
                else if (data[i].value == "mastercard") {
                    document.getElementById("icon_master").style.display = "inline-block";
                }
            }
        }

    }
}

function pad(num, size) {
    var s = num + "";
    while (s.length < size) s = "0" + s;
    return s;
}

function cc_exp_month_onblur() {
    var month = document.getElementById("ccform_expmonth_DD2").value;
    if (month.length == 1) {
        if (month == 0) {
            document.getElementById("ccform_expmonth_DD2").value = "";
            document.getElementById("errorMsgTXT").innerHTML = "Invalid card expiry month";
            $('#errorMsgModal').modal('toggle');
        }
        else { document.getElementById("ccform_expmonth_DD2").value = pad(month, 2); }
    }
}

function cc_exp_year_onblur() {
    var year = document.getElementById("ccform_expyear_DD2").value;
    if (year.length < 4 && year.length != 0) {
        document.getElementById("ccform_expyear_DD2").value = "";
        document.getElementById("errorMsgTXT").innerHTML = "Invalid card expiry month";
        $('#errorMsgModal').modal('toggle');
    }
    else { }
}

function cc_exp_month_onkeyup() {

    var scream1 = document.getElementById('ccform_expmonth_DD2').value;
    var scream2 = scream1.substring(scream1.Length, scream1.Length);

    if (isNaN(scream2)) {
        document.getElementById("ccform_expyear_DD2").value = "";
        document.getElementById("errorMsgTXT").innerHTML = "Numeric only";
        $('#errorMsgModal').modal('toggle');
    }
    else {
        if (scream1.length == 2) {
            if (scream1 < 1) {
                document.getElementById("ccform_expmonth_DD2").value = "";
                document.getElementById("errorMsgTXT").innerHTML = "Invalid card expiry month";
                $('#errorMsgModal').modal('toggle');
            }
            else if (scream1 > 12) {
                document.getElementById("ccform_expmonth_DD2").value = "";
                document.getElementById("errorMsgTXT").innerHTML = "Invalid card expiry month";
                $('#errorMsgModal').modal('toggle');
            }
            else {
                document.getElementById("ccform_expyear_DD2").focus();
                document.getElementById("ccform_expyear_DD2").click();
            }
        }
        else if (scream1.length == 0) { }
        else
        {
        }
    }
}

function cc_exp_yr_onkeyup() {

    var scream1 = document.getElementById('ccform_expyear_DD2').value;
    var scream2 = scream1.substring(scream1.Length, scream1.Length);

    if (isNaN(scream2)) {
        document.getElementById("ccform_expyear_DD2").value = "";
        document.getElementById("errorMsgTXT").innerHTML = "Numeric only";
        $('#errorMsgModal').modal('toggle');

    }
    else {
        if (scream1.length == 4) {
            if (scream1 < new Date().getFullYear()) {
                document.getElementById("ccform_expyear_DD2").value = "";
                document.getElementById("errorMsgTXT").innerHTML = "Invalid card expiry year";
                $('#errorMsgModal').modal('toggle');
            }
            else {
                var input_month = document.getElementById('ccform_expyear_DD2').value;
                var cur_month = new Date().getMonth() + 1;
                if (input_month <= cur_month) {
                    document.getElementById("ccform_expyear_DD2").value = "";
                    document.getElementById("errorMsgTXT").innerHTML = "Invalid card expiry month";
                    $('#errorMsgModal').modal('toggle');
                }
                else {
                    document.getElementById("ccform_cvv_TB").focus();
                    document.getElementById("ccform_cvv_TB").click();
                }
            }
        }
        else if (scream1.length == 0) { }
        else { }
    }
}
function cc_cvv_onkeyup() {
    var data = document.getElementById('ccform_cvv_TB').value;

    var scream2 = data.substring(data.Length, data.Length);

    if (isNaN(scream2)) {
        document.getElementById("ccform_cvv_TB").value = "";
        /*document.getElementById("errorMsgTXT").innerHTML = "Numeric only";
        $('#errorMsgModal').modal('toggle');*/

    }

    if (data.length == 3) {
        document.getElementById("ccform_cardholdername_TB").focus();
        document.getElementById("ccform_cardholdername_TB").click();
    }
}
//cc script end

//ccp script start
function ccp_onkeyup() {
    var scream1 = document.getElementById('ccpform_cardnumber_TB').value;

    var scream3 = document.getElementById('ccpform_cardbin_TB').value;
    var scream = scream3.substring(0, 1);

    var scream2 = scream1.substring(scream1.length, scream1.length - 1);

    if (isNaN(scream2)) {
        if (scream2 != "-") {
            document.getElementById("ccpform_cardnumber_TB").value = "";
            document.getElementById("errorMsgTXT").innerHTML = "Numeric only";
            $('#errorMsgModal').modal('toggle');
        }
    }
    else {
        if (scream == "4") {

            if (scream1.length == 10) {
                document.getElementById("ccpform_expmonth_DD2").focus();
            }
            else if (scream1.length >= 11) {
                document.getElementById('ccpform_cardnumber_TB').value = scream1.substring(0, scream1.length - 1);
                if (document.getElementById('ccpform_cardnumber_TB').value.length == 10) {
                    document.getElementById("ccpform_expmonth_DD2").focus();
                }
            }
        }
        else if (scream == "5") {

            if (scream1.length == 10) {
                document.getElementById("ccpform_expmonth_DD2").focus();
                document.getElementById("ccpform_expmonth_DD2").click();
            }
            else if (scream1.length >= 11) {
                document.getElementById('ccpform_cardnumber_TB').value = scream1.substring(0, scream1.length - 1);
                if (document.getElementById('ccpform_cardnumber_TB').value.length == 10) {
                    document.getElementById("ccpform_expmonth_DD2").focus();
                }
            }
        }
        else {
            if (scream1.length == 10) {
                document.getElementById("ccpform_expmonth_DD2").focus();
                document.getElementById("ccpform_expmonth_DD2").click();
            }
            else if (scream1.length >= 11) {
                document.getElementById('ccpform_cardnumber_TB').value = scream1.substring(0, scream1.length - 1);
                if (document.getElementById('ccpform_cardnumber_TB').value.length == 10) {
                    document.getElementById("ccpform_expmonth_DD2").focus();
                }
            }
        }
    }
}

function ccpbin_onkeyup() {
    var scream1 = document.getElementById('ccpform_cardbin_TB').value;
    var scream = scream1.substring(0, 1);

    var scream2 = scream1.substring(scream1.length, scream1.length - 1);


    if (scream == "4") {
        document.getElementById("ccpform_cardtype_TB").value = "visa";

        document.getElementById("ccp_icon_visa").style.display = "inline-block";
        document.getElementById("ccp_icon_master").style.display = "none";
        document.getElementById("ccp_icon_amex").style.display = "none";
        document.getElementById("ccp_icon_jcb").style.display = "none";

        document.getElementById("ccpform_expmonth_DD2").focus();
        document.getElementById("ccpform_expmonth_DD2").click();
    }
    else if (scream == "5") {
        document.getElementById("ccpform_cardtype_TB").value = "mastercard";

        document.getElementById("ccp_icon_visa").style.display = "none";
        document.getElementById("ccp_icon_master").style.display = "inline-block";
        document.getElementById("ccp_icon_amex").style.display = "none";
        document.getElementById("ccp_icon_jcb").style.display = "none";

        document.getElementById("ccpform_expmonth_DD2").focus();
        document.getElementById("ccpform_expmonth_DD2").click();

    }
    else { }

    if (scream1 == "") {
        var size = document.getElementById("ccpform_cardtype_TB").length;
        var data = document.getElementById("ccpform_cardtype_TB").options;

        for (var i = 0; i < size; i++) {
            if (data[i].value == "visa") {
                document.getElementById("ccp_icon_visa").style.display = "inline-block";
            }
            else if (data[i].value == "mastercard") {
                document.getElementById("ccp_icon_master").style.display = "inline-block";
            }
        }
    }
}
function ccp_exp_month_onblur() {
    var month = document.getElementById("ccpform_expmonth_DD2").value;
    if (month.length == 1) {
        if (month == 0) {
            document.getElementById("ccpform_expmonth_DD2").value = "";
            document.getElementById("errorMsgTXT").innerHTML = "Invalid card expiry month";
            $('#errorMsgModal').modal('toggle');
        }
        else { document.getElementById("ccpform_expmonth_DD2").value = pad(month, 2); }
    }
}

function ccp_exp_year_onblur() {
    var year = document.getElementById("ccform_expyear_DD2").value;
    if (year.length < 4 && year.length != 0) {
        document.getElementById("ccform_expyear_DD2").value = "";
        document.getElementById("errorMsgTXT").innerHTML = "Invalid card expiry month";
        $('#errorMsgModal').modal('toggle');
    }
    else { }
}

function ccp_exp_month_onkeyup() {

    var scream1 = document.getElementById('ccpform_expmonth_DD2').value;
    var scream2 = scream1.substring(scream1.Length, scream1.Length);

    if (isNaN(scream2)) {
        document.getElementById("ccpform_expyear_DD2").value = "";
    }
    else {
        if (scream1.length == 2) {
            if (scream1 < 1) {
                document.getElementById("ccpform_expmonth_DD2").value = "";
                document.getElementById("errorMsgTXT").innerHTML = "Invalid card expiry month";
                $('#errorMsgModal').modal('toggle');
            }
            else if (scream1 > 12) {
                document.getElementById("ccpform_expmonth_DD2").value = "";
                document.getElementById("errorMsgTXT").innerHTML = "Invalid card expiry month";
                $('#errorMsgModal').modal('toggle');
            }
            else {
                document.getElementById("ccpform_expyear_DD2").focus();
                document.getElementById("ccpform_expyear_DD2").click();
            }
        }
        else if (scream1.length == 0) { }
        else
        {
        }
    }
}

function ccp_exp_yr_onkeyup() {

    var scream1 = document.getElementById('ccpform_expyear_DD2').value;
    var scream2 = scream1.substring(scream1.Length, scream1.Length);

    if (isNaN(scream2)) {
        document.getElementById("ccpform_expyear_DD2").value = "";

    }
    else {
        if (scream1.length == 4) {
            if (scream1 < new Date().getFullYear()) {
                document.getElementById("ccpform_expyear_DD2").value = "";
                document.getElementById("errorMsgTXT").innerHTML = "Invalid card expiry year";
                $('#errorMsgModal').modal('toggle');
            }
            else {
                var input_month = document.getElementById('ccpform_expyear_DD2').value;
                var cur_month = new Date().getMonth() + 1;
                if (input_month <= cur_month) {
                    document.getElementById("ccpform_expyear_DD2").value = "";
                    document.getElementById("errorMsgTXT").innerHTML = "Invalid card expiry month";
                    $('#errorMsgModal').modal('toggle');
                }
                else {
                    document.getElementById("ccpform_cvv_TB").focus();
                    document.getElementById("ccpform_cvv_TB").click();
                }
            }
        }
        else if (scream1.length == 0) { }
        else { }
    }
}
function ccp_cvv_onkeyup() {
    var data = document.getElementById('ccpform_cvv_TB').value;

    var scream2 = data.substring(data.Length, data.Length);

    if (isNaN(scream2)) {
        document.getElementById("ccpform_cvv_TB").value = "";
        /*document.getElementById("errorMsgTXT").innerHTML = "Numeric only";
        $('#errorMsgModal').modal('toggle');*/

    }

    if (data.length == 3) {
        document.getElementById("ccpform_cardholdername_TB").focus();
        document.getElementById("ccpform_cardholdername_TB").click();
    }
}

//ccp script end

function pmRB_onkeyup() {
    document.getElementById("ccform_cardnumber_TB").focus();
    document.getElementById("ccform_cardnumber_TB").click();
}