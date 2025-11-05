const selectedUserId = $("meta[name='selected_user_id']");
const authUserId = $("meta[name='auth_user_id']").attr("content");
const baseUrl = $("meta[name='base_url']").attr("content");
const index = $(".messages ul");

const toggleLoader = () => {
    $(".loader").toggleClass("d-none");
};

const messageTemplate = (message, className) => {
    return `<li class="${className}"><img src="${baseUrl}/default-images/avatar.png" alt="" /><p>${message}</p></li>`;
};

const fetchMessages = () => {
    let userId = selectedUserId.attr("content");
    $.ajax({
        method: "GET",
        url: baseUrl + "/fetch-message",
        data: {
            user_id: userId,
        },
        beforeSend: function () {
            toggleLoader();
        },
        success: function (data) {
            setUser(data.user);
            index.empty();
            data.messages.forEach((message) => {
                if (message.sender_id == userId) {
                    index.append(messageTemplate(message.message, "sent"));
                } else {
                    index.append(messageTemplate(message.message, "replies"));
                }
            });
            scrollToBottom();
        },
        error: function (xhr, status, error) {},
        complete: function () {
            toggleLoader();
        },
    });
};

const sendMessage = () => {
    let userId = selectedUserId.attr("content");
    let formData = $(".form-message").serialize();
    let messageInput = $(".text");
    $.ajax({
        method: "POST",
        url: baseUrl + "/send-message",
        data: formData + "&userId=" + userId,
        beforeSend: function () {
            index.append(messageTemplate(messageInput.val(), "replies"));
            messageInput.val("");
            scrollToBottom();
        },
        success: function (data) {
            console.log(data);
        },
        error: function (xhr, status, error) {},
    });
};

const setUser = (user) => {
    $(".contact-name").text(user.name);
};

const scrollToBottom = () => {
    $(".messages")
        .stop()
        .animate({
            scrollTop: $(".messages")[0].scrollHeight,
        });
};

$(document).ready(function () {
    $(".contact").click(function () {
        let userId = $(this).data("selected_user_id");
        selectedUserId.attr("content", userId);
        $(".blank-wrap").addClass("d-none");
        fetchMessages();
    });
    $(".submit").click("submit", function (e) {
        e.preventDefault();
        sendMessage();
    });
});

window.Echo.private("message." + authUserId).listen("SendMessageEvent", (e) => {
    if (e.from_id == selectedUserId.attr("content")) {
        index.append(messageTemplate(e.text, "sent"));
        scrollToBottom();
    }
});

window.Echo.join("online")
    .here((users) => {
        users.forEach((user) => {
            let element = $(`.contact[data-selected_user_id="${user.id}"]`);
            if (element.length > 0) {
                element.find(".contact-status").removeClass("offline");
                element.find(".contact-status").addClass("online");
            } else {
                element.find(".contact-status").removeClass("online");
                element.find(".contact-status").addClass("offline");
            }
        });
    })
    .joining((user) => {
        let element = $(`.contact[data-selected_user_id="${user.id}"]`);
        element.find(".contact-status").removeClass("offline");
        element.find(".contact-status").addClass("online");
    })
    .leaving((user) => {
        let element = $(`.contact[data-selected_user_id="${user.id}"]`);
        element.find(".contact-status").removeClass("online");
        element.find(".contact-status").addClass("offline");
    });
