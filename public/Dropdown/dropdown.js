document.addEventListener("DOMContentLoaded", function() {
    const toggleButton = document.getElementById("toggleDescription");
    const descriptionContent = document.querySelector(".description-content");

    toggleButton.addEventListener("click", function() {
      if (descriptionContent.style.maxHeight) {
        descriptionContent.style.maxHeight = null;
      } else {
        descriptionContent.style.maxHeight = descriptionContent.scrollHeight + "px";
      }
    });
  });
