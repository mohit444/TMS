$(document).ready(function () {$("#submit-588728291").bind("click", function (event) {$.ajax({data:$("#submit-588728291").closest("form").serialize(), type:"post", url:"\/tms\/users\/add"});
return false;});});