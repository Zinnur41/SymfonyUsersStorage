window.onload=function() {
    const forms = document.querySelectorAll('.addGrade');
    let grades = document.querySelectorAll('.grade');
// Неверно
    forms.forEach((form) => {
        form.addEventListener('click', (event) => {
            grades.forEach((grade) => {
                if (grade.value !== '' && grade.value > 0 && grade.value < 6) {
                    alert('Оценка успешно поставлена!');
                } else {
                    grade.value = '';
                    event.preventDefault();
                    alert('Неверно введена оценка!')
                }
            })
        })
    })
}