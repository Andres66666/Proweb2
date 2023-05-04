"use strict";

var _firebaseAuth = require("https://www.gstatic.com/firebasejs/9.19.0/firebase-auth.js");

var _firebase = require("./firebase.js");

var _showMessage = require("./showMessage.js");

var signUpForm = document.querySelector("#signup-form");
signUpForm.addEventListener("submit", function _callee(e) {
  var email, password, userCredential, signupModal, modal;
  return regeneratorRuntime.async(function _callee$(_context) {
    while (1) {
      switch (_context.prev = _context.next) {
        case 0:
          e.preventDefault();
          email = signUpForm["signup-email"].value;
          password = signUpForm["signup-password"].value;
          _context.prev = 3;
          _context.next = 6;
          return regeneratorRuntime.awrap((0, _firebaseAuth.createUserWithEmailAndPassword)(_firebase.auth, email, password));

        case 6:
          userCredential = _context.sent;
          console.log(userCredential); // Close the signup modal

          signupModal = document.querySelector('#signupModal');
          modal = bootstrap.Modal.getInstance(signupModal);
          modal.hide(); // reset the form

          signUpForm.reset(); // show welcome message

          (0, _showMessage.showMessage)("Welcome" + userCredentials.user.email);
          _context.next = 18;
          break;

        case 15:
          _context.prev = 15;
          _context.t0 = _context["catch"](3);

          if (_context.t0.code === 'auth/email-already-in-use') {
            (0, _showMessage.showMessage)("Email already in use", "error");
          } else if (_context.t0.code === 'auth/invalid-email') {
            (0, _showMessage.showMessage)("Invalid email", "error");
          } else if (_context.t0.code === 'auth/weak-password') {
            (0, _showMessage.showMessage)("Weak password", "error");
          } else if (_context.t0.code) {
            (0, _showMessage.showMessage)("Something went wrong", "error");
          }

        case 18:
        case "end":
          return _context.stop();
      }
    }
  }, null, null, [[3, 15]]);
});