"use strict";

var _firebaseAuth = require("https://www.gstatic.com/firebasejs/9.19.0/firebase-auth.js");

var _firebaseFirestore = require("https://www.gstatic.com/firebasejs/9.20.0/firebase-firestore.js");

var _firebase = require("./app/firebase.js");

var _loginCheck = require("./app/loginCheck.js");

var _postList = require("./app/postList.js");

require("./app/signupForm.js");

require("./app/signinForm.js");

require("./app/googleLogin.js");

require("./app/facebookLogin.js");

require("./app/githubLogin.js");

require("./app/logout.js");

// en esta seccion estanmos configurando el firebase
// list for auth state changes
(0, _firebaseAuth.onAuthStateChanged)(_firebase.auth, function _callee(user) {
  var querySnapshot;
  return regeneratorRuntime.async(function _callee$(_context) {
    while (1) {
      switch (_context.prev = _context.next) {
        case 0:
          if (!user) {
            _context.next = 14;
            break;
          }

          (0, _loginCheck.loginCheck)(user);
          _context.prev = 2;
          _context.next = 5;
          return regeneratorRuntime.awrap((0, _firebaseFirestore.getDocs)((0, _firebaseFirestore.collection)(_firebase.db, "posts")));

        case 5:
          querySnapshot = _context.sent;
          (0, _postList.setupPosts)(querySnapshot.docs);
          _context.next = 12;
          break;

        case 9:
          _context.prev = 9;
          _context.t0 = _context["catch"](2);
          console.log(_context.t0);

        case 12:
          _context.next = 16;
          break;

        case 14:
          (0, _postList.setupPosts)([]);
          (0, _loginCheck.loginCheck)(user);

        case 16:
        case "end":
          return _context.stop();
      }
    }
  }, null, null, [[2, 9]]);
});