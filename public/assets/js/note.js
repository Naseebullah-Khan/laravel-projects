const csrf_token = $("meta[name='csrf_token']").attr("content");
const base_url = $("meta[name='base_url']").attr("content");

function setAppearance(element) {
    const data = element.data();
    const { id, color_name, appearance_type } = data;

    $.ajax({
        method: "POST",
        url: base_url + "/note/setAppearance",
        data: {
            _token: csrf_token,
            note_id: id,
            color_name: color_name,
            appearance_type: appearance_type,
        },
        success: function (response) {
            console.log(response);
        },
        error: function (xhr, status, error) {
            $(element).closest(".single_note").css("background-color", "");
        },
    });
}

$(document).ready(function () {
    $(".appearance").on("click", function () {
        $(this)
            .closest(".single_note")
            .css("background-color", $(this).data("color_name"));
        setAppearance($(this));
    });
});
