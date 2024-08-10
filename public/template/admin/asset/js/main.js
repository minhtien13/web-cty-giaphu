$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

function OnRemove(url, id) {
    if (confirm("Lưu ý khi thực thiện xóa không thể khoi phục lại")) {
        $.ajax({
            type: "POST",
            url: url,
            data: { id },
            dataType: "JSON",
            success: function (response) {
                if (response.error === false) {
                    $("#show_alert").removeClass("d-none");
                    $("#show_alert").addClass("alert-success");
                    $(".show_alert_meg").text(response.message);

                    setTimeout(() => {
                        location.reload();
                    }, 1500);
                } else {
                    $("#show_alert").removeClass("d-none");
                    $("#show_alert").addClass("alert-danger");
                    $(".show_alert_meg").text(response.message);

                    setTimeout(() => {
                        $("#show_alert").addClass("d-none");
                    }, 1500);
                }
            },
        });
    }
}

$("#upload_file").change(function () {
    var formData = new FormData();
    formData.append("file", $(this)[0].files[0]);

    $.ajax({
        url: "/admin/upload-file",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        dataType: "JSON",
        success: function (response) {
            if (!response.error) {
                $("#thumb").val(response.url);
                var img = `<img src="${response.url}" alt="">`;
                $(".main__upload__img").html(img);
            } else {
            }
        },
    });
});

$("#is_title").change(function () {
    var txt = $(this).val();
    var slugUrl = toSlug(txt);
    $.ajax({
        type: "POST",
        url: "/admin/product/check",
        data: {
            url: slugUrl,
        },
        dataType: "JSON",
        success: function (response) {
            $("#is_link").removeClass("d-none");
            $("#is_url").val(response.url);
            $("#is_link span").text(response.url + ".html");
        },
    });
});

$("#is_title").keyup(function () {
    var txt = $(this).val();
    var slugUrl = toSlug(txt);
    $("#is_link span").text(slugUrl);
    $("#is_link").removeClass("d-none");
});

function toSlug(str) {
    var slug = str.toLowerCase();

    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, "a");
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, "e");
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, "i");
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, "o");
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, "u");
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, "y");
    slug = slug.replace(/đ/gi, "d");
    slug = slug.replace(
        /\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi,
        ""
    );

    slug = slug.replace(/ /gi, "-");

    slug = slug.replace(/\-\-\-\-\-/gi, "-");
    slug = slug.replace(/\-\-\-\-/gi, "-");
    slug = slug.replace(/\-\-\-/gi, "-");
    slug = slug.replace(/\-\-/gi, "-");
    slug = "@" + slug + "@";
    slug = slug.replace(/\@\-|\-\@|\@/gi, "");
    return slug;
}
