document.getElementById("searchInput").addEventListener("input", function () {
  const searchQuery = this.value.toLowerCase().trim();
  const categoryItems = document.querySelectorAll(".category-item");

  categoryItems.forEach(function (item) {
    const categoryName = item.textContent.toLowerCase();
    if (categoryName.includes(searchQuery)) {
      item.style.display = "block";
    } else {
      item.style.display = "none";
    }
  });
});
