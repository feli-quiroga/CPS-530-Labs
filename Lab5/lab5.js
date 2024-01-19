$(function() {
    $(".draggable_img").draggable({
        containment: "#potatoebox",
        cursor: "grab"
    });
    const original_top = $("#dandy").offset().top;
    const original_left = $("#dandy").offset().left;
    const original_width = $('#dandy').width();
    const original_height = $('#dandy').height();

    $("#dandy").hover(function() {
        $(this).css({
            "position": "absolute",
        });
        $(this).animate({
            width: "100vw",
            height: "100vh",
            top: 0,
            left: 0,
        }, 2000);

        setTimeout(function() {
            $("#patras").show().click(function() {
                $("#dandy").animate({
                    top: original_top,
                    left: original_left,
                    width: original_width,
                    height: original_height,
                }, 2000, function() {
                    $("#patras").hide();
                });
            });
        }, 2500);
    });
});
document.getElementById("potatoebutton").addEventListener("click", function() {
html2canvas(document.getElementById("potatoebox")).then(function(canvas) {
    var screenshotImage = canvas.toDataURL("image/png");
    var a = document.createElement("a");
    a.href = screenshotImage;
    a.download = "mrpotatoehead.png";
    a.click();
});
});
