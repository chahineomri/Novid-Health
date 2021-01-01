$(document).ready(function () {
    $("#dateDeb").on('change', function () {
        var dateFin=document.getElementById('dateFin');
        if (dateFin!==undefined){
            dateFin.setAttribute('min', $("#dateDeb").val());
        }
    });
});

