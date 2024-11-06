// document.addEventListener("DOMContentLoaded", function () {
//     const notificationIcon = document.getElementById('notification-icon');
//     const notificationPopup = document.getElementById('notification-popup');
//     const closeNotification = document.getElementById('close-notification');

//     if (notificationIcon && notificationPopup && closeNotification) {
//         notificationIcon.addEventListener('click', function () {
//             notificationPopup.style.display = 'block';
//         });

//         closeNotification.addEventListener('click', function () {
//             notificationPopup.style.display = 'none';
//         });

//         window.addEventListener('click', function (e) {
//             if (e.target !== notificationPopup && !notificationPopup.contains(e.target) && e.target !== notificationIcon) {
//                 notificationPopup.style.display = 'none';
//             }
//         });
//     } else {
//         console.error("One or more elements not found.");
//     }
// });
