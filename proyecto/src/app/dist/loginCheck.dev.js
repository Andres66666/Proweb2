"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.loginCheck = void 0;
var loggedOutLinks = document.querySelectorAll('.logged-out');
var loggedInLinks = document.querySelectorAll('.logged-in');

var loginCheck = function loginCheck(user) {
  if (user) {
    loggedInLinks.forEach(function (link) {
      return link.style.display = 'block';
    });
    loggedOutLinks.forEach(function (link) {
      return link.style.display = 'none';
    });
  } else {
    loggedInLinks.forEach(function (link) {
      return link.style.display = 'none';
    });
    loggedOutLinks.forEach(function (link) {
      return link.style.display = 'block';
    });
  }
};

exports.loginCheck = loginCheck;