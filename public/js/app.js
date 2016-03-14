$(function(){
    $('.like').click(function(e){
        e.preventDefault();
        var postID = $(this).data('postid');
        var url = '/like/' + postID;
        var token = $('#token').val();
        $.post(url, { _token: token },  function(res){
            $('#rating'+postID).html(res);
        }).error(function(){
            alert('Для этого действия необходимо авторизоваться');
        });
    });

    $('.dislike').click(function(e){
        e.preventDefault();
        var postID = $(this).data('postid');
        var token = $('#token').val();
        var url = '/dislike/' + postID;
        $.post(url, {_token: token}, function(res){
            $('#rating'+postID).html(res);
        }).error(function(){
            alert('Для этого действия необходимо авторизоваться');
        });
    });

    $('#addComment').submit(function(e){
        e.preventDefault();

        var text = $(this).find('textarea').val();
        var postID = $(this).data('article');
        var token = $('#token').val();
        console.log(text);
        if(text){
            $(this).find('#comment').parent().removeClass('has-error');
            $.ajax({
                url: '/comment/add/'+postID,
                type:'post',
                dataType:'json',
                data:{ _token: token, comment: text },
                success: function(response){
                    console.log(response);
                    var comment = '<div class="panel panel-default">'+
                        '<div class="panel-heading">'+response.user+
                    '<span class="pull-right">'+
                        response.created_at+
                    '</span>'+
                    '</div>'+
                    '<div class="panel-body">'+
                        response.text+
                    '</div>'+
                    '</div>';
                    $('.comment-list').append(comment);
                    var cnt = parseInt($('.comment-count').html());
                    $('.comment-count').html(cnt+1);
                }
            });
        }else{
            $(this).find('#comment').parent().addClass('has-error');
        }
    });
});