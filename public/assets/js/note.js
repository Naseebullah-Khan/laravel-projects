const csrf_token = $("meta[name='csrf_token']").attr("content");
const base_url = $("meta[name='base_url']").attr("content");

function setAppearance(element) {
    const data = element.data();
    const { id, color_name, appearance_type, image_path } = data;

    if (appearance_type == "image") {
        $(
            `.custom_modal_area[data-modal='modal_${id}'] .custom_modal_content`
        ).css("background", `url('${image_path}') center/cover no-repeat`);
        element
            .closest(".single_note")
            .css("background", `url('${image_path}') center/cover no-repeat`);
    } else {
        $(
            `.custom_modal_area[data-modal='modal_${id}'] .custom_modal_content`
        ).css("background", color_name);
        element.closest(".single_note").css("background", color_name);
    }

    $.ajax({
        method: "POST",
        url: base_url + "/note/setAppearance",
        data: {
            _token: csrf_token,
            note_id: id,
            color_name: color_name,
            image_path: image_path,
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
        setAppearance($(this));
    });
});
