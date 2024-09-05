document.querySelectorAll(".detalii-btn").forEach(button =>{
    button.addEventListener("click", () => {
        document.getElementById("pop-up").style.display = "flex";
    })
})

document.querySelector(".close").addEventListener("click", () => {
document.getElementById("pop-up").style.display = "none";
})

window.addEventListener("click", (e) => {
  const popUp = document.getElementById("pop-up");
  if(e.target === popUp) {
    popUp.style.display = "none"
  }
})
