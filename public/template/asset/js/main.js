$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

function changeImageDetail(itemKey, image) {
    var sliderItem = document.querySelectorAll(".slider__item");
    sliderItem.forEach((key, item) => {
        if (itemKey != item) {
            $("#slider_item_" + item).removeClass("active");
        } else {
            $("#slider_item_" + itemKey).addClass("active");
        }
    });

    var thumb = `<img src="${image}" alt="gia phu architects" class="detall__ima--img">`;
    $(".detall__ima").html(thumb);
}

let searchDaTa = [];
$("#search").focus(function () {
    $.ajax({
        type: "get",
        url: "/search",
        dataType: "JSON",
        success: function (response) {
            searchDaTa = response;
        },
    });
});
$("#search").keyup(function () {
    var html = "";
    var searchText = $(this).val();
    var result = searchDaTa.filter((row) => {
        return row.title.toUpperCase().includes(searchText.toUpperCase());
    });

    if (result.length != 0 && searchText != "") {
        result.forEach((row) => {
            html += `
            <li>
                <a href="/?s=${row.title}"> ${row.title} </a>
                <button onClick="changeSearchTxt('${row.title}')">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </li>
            `;
        });
        $(".search__dropdown").removeClass("pc-on-hide");
        $(".search__dropdown ul").html(html);
    } else {
        $(".search__dropdown").addClass("pc-on-hide");
    }
});

function changeSearchTxt(title) {
    $("#search").val(title);
}
