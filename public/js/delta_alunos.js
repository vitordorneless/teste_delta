$(function () {

    $("#table_delta_alunos").DataTable({
        "oLanguage": DATATABLE_PTBR,
        "autoWidth": true,        
        "searching": true,
        "ordering": true,        
        "ajax": {
            "url": BASE_URL + "ajax_list_delta_alunos",
            "type": "POST"
        }        
    });

});