"use strict";

var _firebaseAuth = require("https://www.gstatic.com/firebasejs/9.19.0/firebase-auth.js");

var _firebase = require("./firebase.js");

var _showMessage = require("./showMessage.js");

// en esta parte se esta realizandola 
var signInForm = document.querySelector("#login-form");
signInForm.addEventListener("submit", function _callee(e) {
  var email, password, userCredentials, modal;
  return regeneratorRuntime.async(function _callee$(_context) {
    while (1) {
      switch (_context.prev = _context.next) {
        case 0:
          e.preventDefault();
          email = signInForm["login-email"].value;
          password = signInForm["login-password"].value;
          _context.prev = 3;
          _context.next = 6;
          return regeneratorRuntime.awrap((0, _firebaseAuth.signInWithEmailAndPassword)(_firebase.auth, email, password));

        case 6:
          userCredentials = _context.sent;
          console.log(userCredentials); // Close the login modal

          modal = bootstrap.Modal.getInstance(document.querySelector('#signinModal')); //const modal = bootstrap.Modal.getInstance(signInForm.closest('.modal'));

          modal.hide(); // reset the form

          signInForm.reset(); // show welcome message

          (0, _showMessage.showMessage)("Welcome" + userCredentials.user.email);
          _context.next = 17;
          break;

        case 14:
          _context.prev = 14;
          _context.t0 = _context["catch"](3);

          if (_context.t0.code === 'auth/wrong-password') {
            (0, _showMessage.showMessage)("Wrong password", "error");
          } else if (_context.t0.code === 'auth/user-not-found') {
            (0, _showMessage.showMessage)("User not found", "error");
          } else {
            (0, _showMessage.showMessage)("Something went wrong", "error");
          }

        case 17:
        case "end":
          return _context.stop();
      }
    }
  }, null, null, [[3, 14]]);
});