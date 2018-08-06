function add_services(){
  window.location="add_services.php";
}

function view_services(){
  window.location="services.php";
}

function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}

function myFunctionPdf() {
    window.print();
}
