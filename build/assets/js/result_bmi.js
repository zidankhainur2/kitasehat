function showLoadingScreen() {
  const loadingScreen = document.getElementById("loadingScreen");
  loadingScreen.classList.remove("hidden");
  loadingScreen.classList.add("fade-in");
}

function hideLoadingScreen() {
  const loadingScreen = document.getElementById("loadingScreen");
  loadingScreen.classList.add("fade-out");
  setTimeout(() => {
    loadingScreen.classList.add("hidden");
    loadingScreen.classList.remove("fade-out");
  }, 500);
}

function hitungUlang() {
  showLoadingScreen();
  setTimeout(function () {
    window.location.href = "/pbw/build/pages/bmi.php";
  }, 1000);
}
