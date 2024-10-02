document.addEventListener("DOMContentLoaded", function() {
  var openPopupBtn = document.getElementById("openPopupBtn");
  var closePopupBtn = document.getElementById("closePopupBtn");
  var popupBox = document.getElementById("popupBox");

  popupBox.style.display = "flex";

  openPopupBtn.onclick = function() {
    popupBox.style.display = "flex";
  }

  closePopupBtn.onclick = function() {
    popupBox.style.display = "none";
  }

  window.onclick = function(event) {
    if (event.target == popupBox) {
      popupBox.style.display = "none";
    }
  }
});
