$(document).ready(function () {
    $("#maintab a").click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });
    $("#maintab2 a").click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });

 
   

    $("#Firstswiper").click(function () {
        $("#episode-detail").toggle();
    });
});