"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.db = exports.auth = exports.app = void 0;

var _firebaseApp = require("https://www.gstatic.com/firebasejs/9.20.0/firebase-app.js");

var _firebaseAuth = require("https://www.gstatic.com/firebasejs/9.20.0/firebase-auth.js");

var _firebaseFirestore = require("https://www.gstatic.com/firebasejs/9.20.0/firebase-firestore.js");

// Import the functions you need from the SDKs you need
var firebaseConfig = {
  apiKey: "AIzaSyAiVhUnLyyADG4N6jo6h20R-GKn4nOYlz0",
  authDomain: "fir-app-29154.firebaseapp.com",
  projectId: "fir-app-29154",
  storageBucket: "fir-app-29154.appspot.com",
  messagingSenderId: "981825413212",
  appId: "1:981825413212:web:e99697817d65f2dfa50699"
}; // Initialize Firebase

var app = (0, _firebaseApp.initializeApp)(firebaseConfig);
exports.app = app;
var auth = (0, _firebaseAuth.getAuth)(app);
exports.auth = auth;
var db = (0, _firebaseFirestore.getFirestore)(app);
exports.db = db;