$(document).ready(function () {$("#submit-943124546").bind("click", function (event) {$.ajax({beforeSend:function (XMLHttpRequest) {$("#sending").fadeIn();}, data:$("#submit-943124546").closest("form").serialize(), dataType:"html", success:function (data, textStatus) {$("#sending").fadeOut();$("#success").html(data);}, type:"post", url:"\/lifewords\/users\/signup"});
return false;});});