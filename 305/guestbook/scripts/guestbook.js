/*document.getElementById("guestbook-form").onsubmit = validate;

function validate() {

    var isValid = true;

    //Clear all error messages
    var errors = document.getElementsByClassName("err");
    for (var i=0; i<errors.length; i++) {
        errors[i].style.visibility = "hidden";
    }

    //Check first name
    var first = document.getElementById("firstName").value;
    if (first == "") {
        var errFirst = document.getElementById("err-fname");
        errFirst.style.visibility = "visible";
        isValid = false;
    }

    //Check last name
    var last = document.getElementById("lastName").value;
    if (last == "") {
        var errLast = document.getElementById("err-lname");
        errLast.style.visibility = "visible";
        isValid = false;
    }

    //Check URL
  /*  var url = document.getElementById("linkedIn").value;
    if (url == "") {
        var errUrl = document.getElementById("err-url");
        errUrl.style.visibility = "visible";
        isValid = false;
    } */

    //Check how we met
  /*  var how = document.getElementById("meet").value;
    if (how == "none") {
        var errHow = document.getElementById("err-how");
        errHow.style.visibility = "visible";
        isValid = false;
    }

  //Check email
    var email = document.getElementById("email").value;
    var addToList = document.getElementById("email");
    if(email === "" && addToList.checked ) {
        var errEmailAdd = document.getElementById("err-email");
        errEmail.style.visibility = "visible";
        isValid = false;
    }
    if(!(email.includes("@", "."))) {
        var errEmail = document.getElementById("err-email");
        errEmail.style.visibility = "visible";
        isValid = false;
    }
    //Check if mailing list is checked
    var list = document.getElementById("mailingList").value;
    if (list.checked && (mail == "" || !re.test(mail.val()))) {
        var errList = document.getElementById("err-list");
        errList.style.visibility = "visible";
        isValid = false;
    }

    return isValid;
}
*/

$("input[type=checkbox]").on("change", function () {
    if($(this).is(":checked")) {
        $("#mail").css("display", "block");
    } else {
        $("#mail").css("display", "none");
    }
});

$("#meet").on("change", function () {
    var meetSelect = document.getElementById("meet").value;
    if (meetSelect == "other") {
        $("#otherForm").css("display", "block");
    } else {
        $("#otherForm").css("display", "none");
    }
});

