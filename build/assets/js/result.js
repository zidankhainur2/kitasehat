function showLoadingScreen() {
    const loadingScreen = document.getElementById('loadingScreen');
    loadingScreen.classList.remove('hidden');
    loadingScreen.classList.add('fade-in');
}

function hideLoadingScreen() {
    const loadingScreen = document.getElementById('loadingScreen');
    loadingScreen.classList.add('fade-out');
    setTimeout(() => {
        loadingScreen.classList.add('hidden');
        loadingScreen.classList.remove('fade-out');
    }, 500);
}

function ulangTes() {
    showLoadingScreen();
    setTimeout(function () {
        window.location.href = 'quiz_awal.html';
    }, 1000);
}