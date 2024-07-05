function showLoadingScreen() {
    document.getElementById('loading-screen').classList.remove('hidden');
    setTimeout(function () {
        location.href = 'quiz.html';
    }, 2000); // Simulasi loading selama 2 detik sebelum mengarahkan ke halaman quiz.html
}