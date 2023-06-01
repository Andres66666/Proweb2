"use strict";

var body = document.querySelector("body");
var darkLight = document.querySelector("#darkLight");
var sidebar = document.querySelector(".sidebar");
var submenuItems = document.querySelectorAll(".submenu_item");
var sidebarOpen = document.querySelector("#sidebarOpen");
var sidebarClose = document.querySelector(".collapse_sidebar");
var sidebarExpand = document.querySelector(".expand_sidebar");
sidebarOpen.addEventListener("click", function () {
  return sidebar.classList.toggle("close");
});
sidebarClose.addEventListener("click", function () {
  sidebar.classList.add("close", "hoverable");
});
sidebarExpand.addEventListener("click", function () {
  sidebar.classList.remove("close", "hoverable");
});
sidebar.addEventListener("mouseenter", function () {
  if (sidebar.classList.contains("hoverable")) {
    sidebar.classList.remove("close");
  }
});
sidebar.addEventListener("mouseleave", function () {
  if (sidebar.classList.contains("hoverable")) {
    sidebar.classList.add("close");
  }
});
darkLight.addEventListener("click", function () {
  body.classList.toggle("dark");

  if (body.classList.contains("dark")) {
    document.setI;
    darkLight.classList.replace("bx-sun", "bx-moon");
  } else {
    darkLight.classList.replace("bx-moon", "bx-sun");
  }
});
submenuItems.forEach(function (item, index) {
  item.addEventListener("click", function () {
    item.classList.toggle("show_submenu");
    submenuItems.forEach(function (item2, index2) {
      if (index !== index2) {
        item2.classList.remove("show_submenu");
      }
    });
  });
});

if (window.innerWidth < 768) {
  sidebar.classList.add("close");
} else {
  sidebar.classList.remove("close");
}