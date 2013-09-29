/**
 * Created with JetBrains PhpStorm.
 * User: caldwecr
 * Date: 9/29/13
 * Time: 8:34 AM
 * To change this template use File | Settings | File Templates.
 */
$(function() {
    $('div.voteUp').click(function() {
        var cId = $(this).parents('div.comment').find('.commentId').val();
        var request = $.ajax({
            url: "/app_dev.php/coin/gift/vote/" + cId + "/1",
            dataType: "json"
        });
        request.done(function(response){
            $("#comment" + response.commentId + "").parents('div.comment').find('div.voteTotal').html(response.voteTotal);
        });
        request.fail(function(){
            console.log('error');
        });
    });
    $('div.voteDown').click(function() {
        var cId = $(this).parents('div.comment').find('.commentId').val();
        var request = $.ajax({
            url: "/app_dev.php/coin/gift/vote/" + cId + "/-1",
            dataType: "json"
        });
        request.done(function(response){
            $("#comment" + response.commentId + "").parents('div.comment').find('div.voteTotal').html(response.voteTotal);
        });
        request.fail(function(){
            console.log('error');
        });
    });
    $('.commentOnComment').click(function(){
        console.log('commentOnComment clicked');
        var parentCommentId = $(this).parents('div.comment').find('.commentId').val();
        var request = $.ajax({
            url: "/app_dev.php/coin/gift/new/comment/comment/" + parentCommentId + "",
            dataType: "html",
            context: $("#putSubCommentHere" + parentCommentId + "")
        });
        request.done(function(response){
            $(this).html(response);
        });
    });
});