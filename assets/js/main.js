$(".btn-modal").click(function (e) { 
    e.preventDefault();

    $(`#${$(this).data("target-modal")}`).addClass("show");
});


$(".modal").click(function (e) { 
    e.preventDefault();
    $(this).removeClass("show");
});