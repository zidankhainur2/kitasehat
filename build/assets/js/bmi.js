document.addEventListener("DOMContentLoaded", function () {
  flatpickr(".flatpickr", {
    dateFormat: "d-m-Y",
  });
  const form = document.querySelector("form");
  form.addEventListener("submit", function (event) {
    event.preventDefault();

    const loadingScreen = document.getElementById("loading-screen");
    loadingScreen.classList.remove("hidden");

    const slideInElements = document.querySelectorAll(".slide-in");
    slideInElements.forEach((element, index) => {
      setTimeout(() => {
        element.style.animationDelay = `${index * 0.2}s`;
        element.classList.add("slide-in");
      }, 100);
    });

    const heightElement = document.getElementById("height");
    const weightElement = document.getElementById("weight");

    // Check if elements exist
    if (!heightElement || !weightElement) {
      alert("Height and weight inputs are not found.");
      return;
    }

    const height = parseFloat(heightElement.value) / 100;
    const weight = parseFloat(weightElement.value);

    console.log("Height:", heightElement.value, "Weight:", weightElement.value);

    if (isNaN(height) || isNaN(weight)) {
      alert("Please enter valid numbers for height and weight.");
      return;
    }

    const bmi = weight / (height * height);
    console.log("BMI:", bmi);

    let resultPage = "";

    if (bmi < 18.5) {
      resultPage = "/pbw/build/pages/bmi_kurang_bobot.html";
    } else if (bmi >= 18.5 && bmi < 25) {
      resultPage = "/pbw/build/pages/bmi_ideal_bobot.html";
    } else if (bmi >= 25 && bmi < 30) {
      resultPage = "/pbw/build/pages/bmi_kelebihan_bobot.html";
    } else {
      resultPage = "/pbw/build/pages/bmi_obesitas.html";
    }

    console.log("Redirecting to:", resultPage);
    window.location.href = resultPage;

    setTimeout(() => {
      loadingScreen.classList.add("hidden");
      window.location.href = resultPage;
    }, 2000);
  });
});
