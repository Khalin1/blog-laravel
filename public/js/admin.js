$(function(){
   $('body').on('click', '.edit-category',function(){
        var name = $(this).data('name');
        var id = $(this).data('category');
        $('#editCategory #name').val(name);
        $('#editCategory #name').data('category', id);
        $('#editCategory').modal();
   });

    $('#formEditCategory').submit(function(e){
        e.preventDefault();
        var name = $(this).find('input[name="name"]').val();
        var id = $(this).find('input[name="name"]').data('category');
        var token = $('#token').val();


        $.ajax({
            url: '/admin/categories/'+id,
            type: 'put',
            dataType: 'json',
            data:{_token: token, name: name}
        }).done(function(response){
            $('#cat'+response.id+" .category-name").html(response.name);
            $('#editCategory').modal('hide');
        });
    });

    $('body').on('click', '.delete-category',function(e){
        e.preventDefault();
        var id = $(this).data('category');
        var token = $('#token').val();
        var name = $(this).data('name');
        var conf = confirm('Do you really want delete '+name+"?");
        if(conf){
            $.ajax({
                url: '/admin/categories/'+id,
                type: 'delete',
                data:{_token: token},
                success: function(response){
                    console.log(name+" : "+id+" : "+token);
                    $('#cat'+id).remove();
                }
            });
        }
    });

    $('#formAddCategory').submit(function(e){
        e.preventDefault();
        var name = $(this).find('input[name="name"]').val();
        var token = $('#token').val();
        if(name != ''){
            $(this).find('input[name="name"]').css('border-color', '');
            $.ajax({
                url: '/admin/categories',
                type: 'post',
                dataType: 'json',
                data:{_token: token, name: name},
                success: function(response){
                    console.log(response.id);
                    var category = "";
                    category += '<div class="well well-sm category-item" id="cat'+response.id+'">'+
                        '<a class="category-name pull-left" href="/categories/'+response.id+'">'+response.name+'</a>'+
                        '<span class="pull-right">'+
                            '<button class="btn btn-primary edit-category" data-name="'+response.name+'" data-category="'+response.id+'">Edit</button>'+
                            '<button class="btn btn-danger delete-category" data-name="'+response.name+'" data-category="'+response.id+'">Delete</button>'+
                        '</span>'+
                    '</div>';
                    $('.category-list').append(category);
                    $('#addCategory').modal('hide');
                }
            });
        }else{
            $(this).find('input[name="name"]').css('border-color', 'red');
        }
    });
});