$(document).ready(function () {$("#submit-2104445290").bind("click", function (event) {$.ajax({data:$("#submit-2104445290").closest("form").serialize(), type:"post", url:"\/tms\/users\/add"});
return false;});});