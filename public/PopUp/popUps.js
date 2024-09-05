document.querySelectorAll(".detalii-btn2").forEach(button =>{
    button.addEventListener("click", () => {
        document.getElementById("pop-up2").style.display = "flex";
    })
})

document.querySelector(".close2").addEventListener("click", () => {
document.getElementById("pop-up2").style.display = "none";
})

window.addEventListener("click", (e) => {
  const popUp2 = document.getElementById("pop-up2");
  if(e.target === popUp2) {
    popUp2.style.display = "none"
  }
})
