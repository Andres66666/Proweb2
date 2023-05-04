"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports.setupPosts = void 0;
var postList = document.querySelector(".posts");

var setupPosts = function setupPosts(data) {
  if (data.length) {
    var html = "";
    data.forEach(function (doc) {
      var post = doc.data();
      var li = "\n      <li class=\"list-group-item list-group-item-action\">\n        <h5>".concat(post.title, "</h5>\n        <p>").concat(post.content, "</p>\n      </li>\n    ");
      html += li;
    });
    postList.innerHTML = html;
  } else {
    postList.innerHTML = '<h4 class="text-white">Login to See Posts</h4>';
  }
};

exports.setupPosts = setupPosts;