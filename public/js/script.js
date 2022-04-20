// ===========================  モーダル機能  =================================
$(function () {
    $('.modalOpen').each(function(){
        $(this).on('click',function(){
            // var target = $(this).data('target');
            // var modal = document.getElementById(target);
            // console.log(modal);

            var id = $(this).data('target'); //postのID取得
            var post = $(this).data('post'); //post内容取得
            $('#postId').val(id) //hidden valueをpostIDで上書き
            $('#modal textarea').val(post); //form valueをpostで上書き

            $("#modal").fadeIn();
            return false;
        });
    });
    $('.modalClose').on('click',function(){
        $('.js-modal').fadeOut();
        return false;
    });
});
// ============================================================================
