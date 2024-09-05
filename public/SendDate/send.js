let countTimer = setTimeout(function(){
    redirectToMainPage()
}, 15000)
setTimeout(function(){
document.getElementById("loadingImg").style.display = "inline";
("loadingImg").style.animation = "rotate 2s linear infinite"
}, 0);

setTimeout(function(){
    document.getElementById("loadingImg").style.display = "none";
    document.getElementById("processing-text").classList.add("hidden");
    document.getElementById("success-text").classList.remove("hidden");
    document.getElementById("successIcon").classList.remove("hidden")
}, 10000);

function redirectToMainPage(){
window.location.href = "/user/login"
}
function updateCountdown(){
    clearTimeout(countTimer);
    redirectToMainPage()
};
