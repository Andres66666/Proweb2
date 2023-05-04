"use strict";

var _firebaseAuth = require("https://www.gstatic.com/firebasejs/9.20.0/firebase-auth.js");

var _firebase = require("./firebase.js");

var _showMessage = require("./showMessage.js");

var githubButton = document.querySelector("#githubLogin");
githubButton.addEventListener("click", function _callee(e) {
  var provider, credentials, modalInstance;
  return regeneratorRuntime.async(function _callee$(_context) {
    while (1) {
      switch (_context.prev = _context.next) {
        case 0:
          e.preventDefault();
          provider = new _firebaseAuth.GithubAuthProvider();
          _context.prev = 2;
          _context.next = 5;
          return regeneratorRuntime.awrap((0, _firebaseAuth.signInWithPopup)(_firebase.auth, provider));

        case 5:
          credentials = _context.sent;
          console.log(credentials);
          console.log("google sign in"); // Close the login modal

          modalInstance = bootstrap.Modal.getInstance(githubButton.closest('.modal')); //const modalInstance = bootstrap.Modal.getInstance(githubButton.closest('.modal'));
          //const modal = bootstrap.Modal.getInstance(document.querySelector('#signinModal'));

          modalInstance.hide(); // show welcome message

          (0, _showMessage.showMessage)("Welcome " + credentials.user.displayName);
          _context.next = 16;
          break;

        case 13:
          _context.prev = 13;
          _context.t0 = _context["catch"](2);
          console.log(_context.t0);

        case 16:
        case "end":
          return _context.stop();
      }
    }
  }, null, null, [[2, 13]]);
});