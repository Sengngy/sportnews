$(document).ready(function(){

    $('table').on('click', '#btnEdit', function(){

        $('#model-EditUser').modal('show');

        var currentr_row = $(this).closest("tr");
        var id = currentr_row.find("td:eq(1)").text();
        var firstname = currentr_row.find("td:eq(2)").text();
        var lastname = currentr_row.find("td:eq(3)").text();
        var gender = currentr_row.find("td:eq(4)").text();
        var email = currentr_row.find("td:eq(5)").text();
        var phone = currentr_row.find("td:eq(6)").text();
        var username = currentr_row.find("td:eq(7)").text();
        var password = currentr_row.find("td:eq(8)").text();
        var photo = currentr_row.find("td img").attr('src');
       
        $("#id").val(id);
        $("#firstname").val(firstname);
        $("#lastname").val(lastname);
        $("#gender").val(gender);
        $("#email").val(email);
        $("#phone").val(phone);
        $("#username").val(username);
        $("#pass").val(password);
        $('#img-preview-edit').attr('src',photo);
 
    });

    


    $('#cbotrash').on('change', function(e){
        var result = $(this).val();
        if(result == 1){
            document.location = "http://localhost/sportnews/admin/pages/user/user.php?status=1";
        }else{
            document.location = "http://localhost/sportnews/admin/pages/user/user.php?status=0";
        }
    })

    $('#cboMenu').on('change', function(e){
        var r = $(this).val();
        if(r == 1){
            document.location = "http://localhost/sportnews/admin/pages/menu/index.php?status=1";
        }else{
            document.location = "http://localhost/sportnews/admin/pages/menu/index.php?status=0";
        }
    })

    $('#cboCategories').on('change', function(e){
        var r = $(this).val();
        if(r == 1){
            document.location = "http://localhost/sportnews/admin/pages/categories/index.php?status=1";
        }else{
            document.location = "http://localhost/sportnews/admin/pages/categories/index.php?status=0";
        }
    })

    $('#cboNews').on('change', function(e){
        var r = $(this).val();
        if(r == 1){
            document.location = "http://localhost/sportnews/admin/pages/news/index.php?status=1";
        }else{
            document.location = "http://localhost/sportnews/admin/pages/news/index.php?status=0";
        }
    })

    

});

function preview(e){
    var img_for_preview = document.getElementById("img-preview");
    img_for_preview.src = URL.createObjectURL(e.target.files[0]);
}

function previewEdit(e){
    var img_for_preview = document.getElementById("img-preview-edit");
    img_for_preview.src = URL.createObjectURL(e.target.files[0]);
}