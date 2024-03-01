const pnotify = require("./pnotify");

$(document).ready(function () {
    var errorMessage = '{flashError}';
    if (errorMessage) {
        showPNotifyNotification('Error', errorMessage, 'error')
    }
    var successMessage = '{flashSuccess}';
    if (successMessage) {
        showPNotifyNotification('Error', successMessage, 'error')
    }
});

function showPNotifyNotification(title, text, type) {
    new pnotify({
        title: title,
        text: text,
        type: type,
        styling: 'bootstrap3',
        addClass: 'stack-bottomup',
        stack: { 'dir1': 'up', 'dir2': 'left', 'push': 'bottom' },
        delay: 3000
    });
}