/**
 * Created with JetBrains PhpStorm.
 * User: caldwecr
 * Date: 9/29/13
 * Time: 8:34 AM
 * To change this template use File | Settings | File Templates.
 */$(function(){$("div.voteUp").click(function(){var e=$(this).parents("div.comment").find(".commentId").val(),t=$.ajax({url:"/app_dev.php/coin/gift/vote/"+e+"/1",dataType:"json"});t.done(function(e){$("#comment"+e.commentId+"").parents("div.comment").find("div.voteTotal").html(e.voteTotal)});t.fail(function(){console.log("error")})});$("div.voteDown").click(function(){var e=$(this).parents("div.comment").find(".commentId").val(),t=$.ajax({url:"/app_dev.php/coin/gift/vote/"+e+"/-1",dataType:"json"});t.done(function(e){$("#comment"+e.commentId+"").parents("div.comment").find("div.voteTotal").html(e.voteTotal)});t.fail(function(){console.log("error")})});$("div.commentOnComment").click(function(){console.log("commentOnComment clicked");var e=$(this).parents("div.comment").find(".commentId").val(),t=$.ajax({url:"/app_dev.php/coin/gift/new/comment/comment/"+e+"",dataType:"html",context:$("#putSubCommentHere"+e+"")});t.done(function(e){$(this).html(e)})})});