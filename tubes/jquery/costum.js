// loadmore
$(".news-item").slice(0, 4).show();

$(".load-more").on("click", function() {
    $(".news-item:hidden").slice(0, 4).slideDown();
    if ($(".news-item:hidden").length == 0) {
        $(".loadMore").fadeOut("slow");
    }
});

if ($(".news-item:hidden").length == 0) {
    $(".loadMore").fadeOut("slow");
}