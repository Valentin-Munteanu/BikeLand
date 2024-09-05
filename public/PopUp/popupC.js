document.querySelectorAll(".detalii-btn3").forEach(button =>{
    button.addEventListener("click", () => {
        document.getElementById("pop-up3").style.display = "flex";
    })
})

document.querySelector(".close3").addEventListener("click", () => {
document.getElementById("pop-up3").style.display = "none";
})

window.addEventListener("click", (e) => {
  const popUp3 = document.getElementById("pop-up3");
  if(e.target === popUp3) {
    popUp3.style.display = "none"
  }
})
