document.addEventListener("DOMContentLoaded", function () {
  flatpickr(".flatpickr", {
    dateFormat: "d-m-Y",
  });

  const slideInElements = document.querySelectorAll(".slide-in");
  slideInElements.forEach((element, index) => {
    setTimeout(() => {
      element.style.animationDelay = `${index * 0.2}s`;
      element.classList.add("slide-in");
    }, 100);
  });

  const form = document.getElementById("bmiForm");
  form.addEventListener("submit", function (event) {
    event.preventDefault();

    const loadingScreen = document.getElementById("loading-screen");
    loadingScreen.classList.remove("hidden");

    const height = parseFloat(document.getElementById("height").value) / 100;
    const weight = parseFloat(document.getElementById("weight").value);

    if (isNaN(height) || isNaN(weight)) {
      alert("Please enter valid numbers for height and weight.");
      loadingScreen.classList.add("hidden");
      return;
    }

    const bmi = weight / (height * height);
    let resultPage = "";

    if (bmi < 18.5) {
      resultPage = "bmi_kurang_bobot.html";
    } else if (bmi >= 18.5 && bmi <= 22.9) {
      resultPage = "bmi_ideal_bobot.html";
    } else if (bmi >= 23 && bmi <= 24.9) {
      resultPage = "bmi_kelebihan_bobot.html";
    } else {
      resultPage = "bmi_obesitas.html";
    }

    setTimeout(() => {
      loadingScreen.classList.add("hidden");
      window.location.href = resultPage;
    }, 2000);
  });
});
