"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.showMessage = showMessage;

function showMessage(message) {
  var type = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : "success";
  Toastify({
    text: message,
    duration: 3000,
    destination: "https://github.com/apvarun/toastify-js",
    newWindow: true,
    close: true,
    gravity: "bottom",
    // `top` or `bottom`
    position: "right",
    // `left`, `center` or `right`
    stopOnFocus: true,
    // Prevents dismissing of toast on hover
    style: {
      background: type === "success" ? "green" : "red"
    } // onClick: function () { } // Callback after click

  }).showToast();
}