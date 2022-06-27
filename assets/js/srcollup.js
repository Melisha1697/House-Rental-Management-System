const goUpButton = document.querySelector(".go-up-button");

goUpButton.addEventListener("click", () => {
  window.scroll(0, 0);
});

window.addEventListener("scroll", () => {
  if (window.scrollY < 250) {
    goUpButton.classList.add("hide");
  } else {
    goUpButton.classList.remove("hide");
  }
});