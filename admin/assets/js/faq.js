const accordionItemHeaders = document.querySelectorAll(
  ".accordion-item-header"
);

accordionItemHeaders.forEach((accordionItemHeader) => {
  accordionItemHeader.addEventListener("click", (event) => {
    if (accordionItemHeader.classList.contains("active")) {
      accordionItemHeader.classList.remove("active");
      accordionItemHeader.nextElementSibling.classList.remove("active");
    } else {
      accordionItemHeaders.forEach((item) => {
        item.classList.remove("active");
        item.nextElementSibling.classList.remove("active");
      });

      accordionItemHeader.classList.add("active");
      accordionItemHeader.nextElementSibling.classList.add("active");
    }
  });
});
