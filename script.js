let currentIndex = 0;
const total = questions.length;
const questionContainer = document.getElementById("question-container");
const progressBar = document.getElementById("progressBar");

function loadQuestion() {
    const q = questions[currentIndex];
    fetch("get_answers.php?question_id=" + q.id)
        .then(response => response.json())
        .then(answers => {
            let html = `<h3>${q.question_text}</h3>`;
            answers.forEach(a => {
                html += `
                    <label>
                        <input type="radio" name="answers[${q.id}]" value="${a.id}">
                        ${a.answer_text}
                    </label><br>`;
            });
            questionContainer.innerHTML = html;
            progressBar.value = currentIndex + 1;
        });
}

document.addEventListener("DOMContentLoaded", loadQuestion);
