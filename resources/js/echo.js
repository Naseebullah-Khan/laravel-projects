import Echo from "laravel-echo";

import Pusher from "pusher-js";
window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: "pusher",
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    forceTLS: true,
});
let user_id = document
    .querySelector("meta[name='user_id']")
    .getAttribute("content");

window.Echo.private("chat." + user_id).listen("NewMessage", (e) => {
    console.log(e);
    document.getElementById("messages").innerHTML += `<p>${e.message}</p>`;
});

window.Echo.join("online")
    .here((users) => {
        console.log("list of users present in channel: ", users);
    })
    .joining((user) => {
        console.log("the user that joined the channel: ", user);
    })
    .leaving((user) => {
        console.log("the user that leaved the channel: ", user);
    });
