$(window).scroll(function () {
    $(".search__main__js").addClass("pc-on-hide");

    // add claaa header down
    if ($(window).scrollTop() > 175) {
        $("#header__id").addClass("header__fixed");
    } else {
        $("#header__id").removeClass("header__fixed");
    }

    // backtop
    if ($(window).scrollTop() > 250) {
        $(".backtop").removeClass("backtop-hide");
    } else {
        $(".backtop").addClass("backtop-hide");
    }
});

$(".backtop").click(function () {
    $("html, bbody").animate(
        {
            scrollTop: 0,
        },
        1000
    );
});

$(".show__search__js").click(function () {
    $(".search__main__js").removeClass("pc-on-hide");
});
$(".search__up__js").click(function () {
    $(".search__main__js").addClass("pc-on-hide");
    $(".search__dropdown").addClass("pc-on-hide");
});

$(".search__form-input").focus(function () {
    var html = document.querySelectorAll(".search__dropdown ul li");
    var searchText = $(this).val();

    if (html.length > 0 && searchText != "") {
        $(".search__form").addClass("search__form__border");
        $(".search__dropdown").removeClass("pc-on-hide");
    } else {
        $(".search__dropdown").addClass("pc-on-hide");
    }
});
$(".search__form-input").focusout(function () {
    $(".search__form").removeClass("search__form__border");
    setTimeout(() => {
        $(".search__dropdown").addClass("pc-on-hide");
    }, 400);
});
$(".search__dropdown").hover(function () {
    $(".search__dropdown").removeClass("pc-on-hide");
});

$(".show__menu__js").click(function () {
    $(".mobile__menu__js").removeClass("pc-on-hide");
});
$(".hide__menu__js").click(function () {
    $(".mobile__menu__js").addClass("pc-on-hide");
});

var btnMenuDown = document.querySelectorAll(".mobile__menu__btn__js");
var btnMenuUp = document.querySelectorAll(".mobile__menu__btn__js__up");
var menuDropDown = document.querySelectorAll(".mobile__menu__dropdown");

[...btnMenuDown].forEach((btn, index) => {
    btn.addEventListener("click", () => {
        menuDropDownJsMobile(1, index);
    });
});

[...btnMenuUp].forEach((btnUp, index) => {
    btnUp.addEventListener("click", () => {
        menuDropDownJsMobile(2, index);
    });
});

function menuDropDownJsMobile(active = 0, index) {
    if (active == 1) {
        menuDropDown[index].classList.remove("moblie-on-hide");
        btnMenuDown[index].classList.add("pc-on-hide");
        btnMenuUp[index].classList.remove("pc-on-hide");
    } else {
        menuDropDown[index].classList.add("moblie-on-hide");
        btnMenuUp[index].classList.add("pc-on-hide");
        btnMenuDown[index].classList.remove("pc-on-hide");
    }
}
