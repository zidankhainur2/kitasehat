document.addEventListener('DOMContentLoaded', () => {
    let currentQuestion = 1;
    const totalQuestions = document.querySelectorAll('.question').length;
    const loadingScreen = document.getElementById('loadingScreen');

    function checkSelection() {
        const currentOptions = document.querySelectorAll(`input[name="question${currentQuestion}"]:checked`);
        return currentOptions.length > 0;
    }

    function toggleNextButton() {
        const nextButton = document.getElementById('nextBtn');
        nextButton.disabled = !checkSelection();
    }

    function calculateTotalScore() {
        let totalScore = 0;
        for (let i = 1; i <= totalQuestions; i++) {
            const selectedOption = document.querySelector(`input[name="question${i}"]:checked`);
            if (selectedOption) {
                totalScore += parseInt(selectedOption.value);
            }
        }
        document.getElementById('totalScore').value = totalScore;
        return totalScore;
    }

    function showLoadingScreen() {
        loadingScreen.classList.remove('hidden');
        loadingScreen.classList.add('fade-in');
    }

    function hideLoadingScreen() {
        loadingScreen.classList.add('fade-out');
        setTimeout(() => {
            loadingScreen.classList.add('hidden');
            loadingScreen.classList.remove('fade-out');
        }, 500);
    }

    document.querySelectorAll('input[type="radio"]').forEach((radio) => {
        radio.addEventListener('change', toggleNextButton);
    });

    document.getElementById('nextBtn').addEventListener('click', () => {
        if (currentQuestion < totalQuestions) {
            const currentElement = document.getElementById(`question${currentQuestion}`);
            currentElement.classList.add('fade-out');
            setTimeout(() => {
                currentElement.classList.add('hidden');
                currentElement.classList.remove('fade-out');
                currentQuestion++;
                const nextElement = document.getElementById(`question${currentQuestion}`);
                nextElement.classList.remove('hidden');
                nextElement.classList.add('fade-in');
                setTimeout(() => {
                    nextElement.classList.remove('fade-in');
                }, 500);
            }, 500);
        } else {
            showLoadingScreen();
            const totalScore = calculateTotalScore();
            setTimeout(() => {
                hideLoadingScreen();
                if (totalScore <= 7) {
                    window.location.href = 'result_ringan.html';
                } else if (totalScore <= 14) {
                    window.location.href = 'result_sedang.html';
                } else {
                    window.location.href = 'result_berat.html';
                }
            }, 1000);
        }
    });

    document.getElementById('prevBtn').addEventListener('click', () => {
        if (currentQuestion > 1) {
            const currentElement = document.getElementById(`question${currentQuestion}`);
            currentElement.classList.add('fade-out');
            setTimeout(() => {
                currentElement.classList.add('hidden');
                currentElement.classList.remove('fade-out');
                currentQuestion--;
                const prevElement = document.getElementById(`question${currentQuestion}`);
                prevElement.classList.remove('hidden');
                prevElement.classList.add('fade-in');
                setTimeout(() => {
                    prevElement.classList.remove('fade-in');
                }, 500);
            }, 500);
        }
    });

    toggleNextButton();
});