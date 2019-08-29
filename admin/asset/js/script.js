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

    $('#cboAds').on('change', function(e){
        var r = $(this).val();
        if(r == 1){
            document.location = "http://localhost/sportnews/admin/pages/ads/index.php?status=1";
        }else{
            document.location = "http://localhost/sportnews/admin/pages/ads/index.php?status=0";
        }
    })

    $('#cboFilter').on('change', function(e){
        e.preventDefault();
        var r = $(this).val();
        if(r == 0){
            document.location = "http://localhost/sportnews/admin/pages/news/index.php?status=1&type=all";
            e.preventDefault();
        }else if(r == 1){
            document.location = "http://localhost/sportnews/admin/pages/news/index.php?status=1&type=sport";
            e.preventDefault();
        }else if(r == 2){
            document.location = "http://localhost/sportnews/admin/pages/news/index.php?status=1&type=boxing";
        }else if(r == 3){
            document.location = "http://localhost/sportnews/admin/pages/news/index.php?status=1&type=tennis";
        }
    })


    // add active on sidebar
   
    var path = window.location.pathname;

    var index1 = path.lastIndexOf('pages') + 6;
    var index2 = path.lastIndexOf('/');
    var pages_name = path.slice(index1, index2);
    
    var path2 = window.location.pathname.split('/').pop();
    var new_path = '';




    if(pages_name == 'news'){
        new_path = 'http://localhost/sportnews/admin/pages/' + pages_name + "/" + path2 + '?status=1&type=all';
    }else if(pages_name == 'categories' || pages_name == 'menu' || pages_name == 'user' || pages_name =='ads'){
        new_path = 'http://localhost/sportnews/admin/pages/' + pages_name + "/" + path2 + '?status=1';
    }else{
        new_path = 'http://localhost/sportnews/admin/' + path2;
    }

    $('ul.nav a[href="' + new_path + '"]').addClass('active');
    
    

    

    

});

function preview(e){
    var img_for_preview = document.getElementById("img-preview");
    img_for_preview.src = URL.createObjectURL(e.target.files[0]);
}

function previewEdit(e){
    var img_for_preview = document.getElementById("img-preview-edit");
    img_for_preview.src = URL.createObjectURL(e.target.files[0]);
}