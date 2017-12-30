$(document).ready(function(){
    $('.textarea').summernote({
        height: 450,                 // set editor height
        minHeight: null,             // set minimum height of editor
        maxHeight: null,             // set maximum height of editor
        focus: false,                  // set focus to editable area after initializing summernote 
    });
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