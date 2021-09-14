let galleryImages = document.querySelectorAll(".gallery-img");
let getLatestOpenedImg;
let windowWidth = window.innerWidth;

if (galleryImages) {
  galleryImages.forEach(function(image, index) {
    image.onclick = function() {
      let getElementCss = window.getComputedStyle(image);
      let getFullImgUrl = getElementCss.getPropertyValue("background-image");
      let getImgUrlPos = getFullImgUrl.split("gallery/");
      let setNewImgUrl = getImgUrlPos[1].replace('")', '');

      getLatestOpenedImg = index + 1;

      let container = document.body;
      let newImgWindow = document.createElement("div");
      container.appendChild(newImgWindow);
      newImgWindow.setAttribute("class", "gallery-window");
      newImgWindow.setAttribute("onclick", "closeImg()");

      let newImg = document.createElement("img");
      newImgWindow.appendChild(newImg);
      newImg.setAttribute("src", "gallery/" + setNewImgUrl);
      newImg.setAttribute("id", "current-img");

    }
  });
}

function closeImg() {
  document.querySelector(".gallery-window").remove();


}