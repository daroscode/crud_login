function statusChanger(id){
    var status = $("#status" + id);
    
    if (status.attr("checked")){
        $.ajax({
            url: 'core/functions.php',
            method: 'POST',
            dataTYpe: 'text',
            data: {
                action: 'status',
                checked: 0,
                id: id
            }
        });
    } else {
        $.ajax({
            url: 'core/functions.php',
            method: 'POST',
            dataTYpe: 'text',
            data: {
                action: 'status',
                checked: 1,
                id: id
            }
        });
    }
}