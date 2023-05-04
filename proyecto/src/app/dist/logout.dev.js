"use strict";

var _firebaseAuth = require("https://www.gstatic.com/firebasejs/9.19.0/firebase-auth.js");

var _firebase = require("./firebase.js");

var logout = document.querySelector("#logout");
logout.addEventListener("click", function _callee(e) {
  return regeneratorRuntime.async(function _callee$(_context) {
    while (1) {
      switch (_context.prev = _context.next) {
        case 0:
          e.preventDefault();
          _context.prev = 1;
          _context.next = 4;
          return regeneratorRuntime.awrap((0, _firebaseAuth.signOut)(_firebase.auth));

        case 4:
          console.log("signup out");
          _context.next = 10;
          break;

        case 7:
          _context.prev = 7;
          _context.t0 = _context["catch"](1);
          console.log(_context.t0);

        case 10:
        case "end":
          return _context.stop();
      }
    }
  }, null, null, [[1, 7]]);
});