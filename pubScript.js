/* Menu Switch Script */

const dashboard = document.getElementById("dashboardSession");
const newPost = document.getElementById("newPostSession");
const contents = document.getElementById("contentsSession");
const iframeDashboard = document.getElementById("iframeDashboard");
const iframePublish = document.getElementById("iframePublish");

function menuSwitchDashboard() {
  dashboard.style.backgroundColor = "#faff00";
  newPost.style.backgroundColor = "#fff";
  contents.style.backgroundColor = "#fff";
  iframeDashboard.style.display = "";
  iframePublish.style.display = "none";
  /*Add more iframes here to add in menu*/
}

function menuSwitchNewPost() {
  dashboard.style.backgroundColor = "#fff";
  newPost.style.backgroundColor = "#faff00";
  contents.style.backgroundColor = "#fff";
  iframeDashboard.style.display = "none";
  iframePublish.style.display = "block";
  /*Add more iframes here to add in menu*/
}

function menuSwitchContents() {
  dashboard.style.backgroundColor = "#fff";
  newPost.style.backgroundColor = "#fff";
  contents.style.backgroundColor = "#faff00";
  /*Add more iframes here to add in menu*/
}
/*finish*/

/* Publish Page Styles functionality */
/* heading styles */
function selectHead() {
  const hd = document.getElementById("headingmenudrop");
  hd.style.display = "grid";
}

//writitng this function again
/* Under Select heading > Major Heading */
var MajorHead = document.getElementById("mjrhd");
MajorHead.addEventListener("click", function () {
  var selection = window.getSelection();

  if (selection.rangeCount > 0) {
    var range = selection.getRangeAt(0);
    var selectedText = range.toString();

    if (selectedText) {
      var ItalicStyle = document.createElement("MajorHeading");
      var newHeading = document.createElement("h1");
      newHeading.textContent = selectedText;

      range.deleteContents();
      range.insertNode(newHeading);
    }
  }

  const major = document.getElementById("mjrhd");
  const hd = document.getElementById("headingmenudrop");
  const select = document.getElementById("selectedNormal");
  var txtArea = document.getElementById("textArea");
  hd.style.display = "none";
  select.innerHTML = "Major Heading";
});
//major heading ends here

/* Under Select heading > Heading */
var headHead = document.getElementById("hdhd");
headHead.addEventListener("click", function () {
  var selection = window.getSelection();

  if (selection.rangeCount > 0) {
    var range = selection.getRangeAt(0);
    var selectedText = range.toString();

    if (selectedText) {
      var Headingg = document.createElement("Headingg");
      var newHeading = document.createElement("h2");
      newHeading.textContent = selectedText;

      range.deleteContents();
      range.insertNode(newHeading);
    }
  }
  const major = document.getElementById("mjrhd");
  const hd = document.getElementById("headingmenudrop");
  const select = document.getElementById("selectedNormal");
  var txtArea = document.getElementById("textArea");
  hd.style.display = "none";
  select.innerHTML = "Heading";
});
//Heading ends here

/* Under Select heading > MinorHeading */
var minorHeading = document.getElementById("mnrhd");
minorHeading.addEventListener("click", function () {
  var selection = window.getSelection();

  if (selection.rangeCount > 0) {
    var range = selection.getRangeAt(0);
    var selectedText = range.toString();

    if (selectedText) {
      var newHeading = document.createElement("h4");
      newHeading.textContent = selectedText;

      range.deleteContents();
      range.insertNode(newHeading);
    }
  }
  const Minor = document.getElementById("mnrhd");
  const hd = document.getElementById("headingmenudrop");
  const select = document.getElementById("selectedNormal");
  var txtArea = document.getElementById("textArea");
  hd.style.display = "none";
  select.innerHTML = "Minor Heading";
});
//Minor Heading ends here

/* Under Select heading > Normal */

var normHeading = document.getElementById("nrmhd");
normHeading.addEventListener("click", function () {
  var selection = window.getSelection();

  if (selection.rangeCount > 0) {
    var range = selection.getRangeAt(0);
    var selectedText = range.toString();

    if (selectedText) {
      var newHeading = document.createElement("p");
      newHeading.textContent = selectedText;

      range.deleteContents();
      range.insertNode(newHeading);
    }
  }
  const Minor = document.getElementById("mnrhd");
  const hd = document.getElementById("headingmenudrop");
  const select = document.getElementById("selectedNormal");
  var txtArea = document.getElementById("textArea");
  hd.style.display = "none";
  select.innerHTML = "Normal";
});
//Normal Heading ends here
/* Heading Styles End Here */

/* Font Size Styles */

/* Bold italic Underline styles */

/*BOLD STYLES*/
var bold = document.getElementById("b");
bold.addEventListener("click", function () {
  var selection = window.getSelection();

  if (selection.rangeCount > 0) {
    var range = selection.getRangeAt(0);
    var selectedText = range.toString();

    if (selectedText) {
      var newHeading = document.createElement("boldd");

      newHeading.style.fontWeight = "bold";
      newHeading.textContent = selectedText;

      range.deleteContents();
      range.insertNode(newHeading);
    }
  }
});

/* iTALIC  STYLES*/
var italic = document.getElementById("i");
italic.addEventListener("click", function () {
  var selection = window.getSelection();

  if (selection.rangeCount > 0) {
    var range = selection.getRangeAt(0);
    var selectedText = range.toString();

    if (selectedText) {
      var newHeading = document.createElement("boldd");

      newHeading.style.fontStyle = "italic";
      newHeading.textContent = selectedText;

      range.deleteContents();
      range.insertNode(newHeading);
    }
  }
});
/* Underline */
var underline = document.getElementById("u");
underline.addEventListener("click", function () {
  var selection = window.getSelection();

  if (selection.rangeCount > 0) {
    var range = selection.getRangeAt(0);
    var selectedText = range.toString();

    if (selectedText) {
      var newHeading = document.createElement("underr");

      newHeading.style.textDecoration = "underline";
      newHeading.textContent = selectedText;

      range.deleteContents();
      range.insertNode(newHeading);
    }
  }
});

/* Bold Italic Underline ends Here */

/* Text Align styles */
//Left align  FAILED
var Left = document.getElementById("lft");
Left.addEventListener("click", function () {
  var selection = window.getSelection();

  if (selection.rangeCount > 0) {
    var range = selection.getRangeAt(0);
    var selectedText = range.toString();

    if (selectedText) {
      var newHeading = document.createElement("lefft");

      newHeading.style.textAlign = "left";
      newHeading.textContent = selectedText;

      range.deleteContents();
      range.insertNode(newHeading);
    }
  }
});

//CEnter Align  FAILED
var center = document.getElementById("cnt");
center.addEventListener("click", function () {
  var selection = window.getSelection();

  if (selection.rangeCount > 0) {
    var range = selection.getRangeAt(0);
    var selectedText = range.toString();

    if (selectedText) {
      var newHeading = document.createElement("centerr");

      newHeading.style.textAlign = "right";
      newHeading.textContent = selectedText;

      range.deleteContents();
      range.insertNode(newHeading);
    }
  }
});

/* Font Color styles */
