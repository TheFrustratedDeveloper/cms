tinymce.init({
    selector: 'textarea',  // change this value according to your HTML
    plugins : 'advlist autolink link image lists charmap print preview',
    autosave_interval: "300s"
});

$('#selectAllBoxes').click(function(event){
    if(this.checked){
        $('.checkboxes').each(function(){
            this.checked = true;
        });
    }else{
        $('.checkboxes').each(function(){
            this.checked = false;
        });
    }
});

function loadUsers(){
    $.get("includes/functions.php?chkOnline=result",function(data){
        $(".userOnline").text(data);
    });
}

setInterval(function(){
    loadUsers();
},500);

$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});