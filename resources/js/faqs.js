if (document.querySelector('.faqs-container')) {
  const faqsContainer = document.querySelector('.faqs-container');
  const questions = faqsContainer.querySelectorAll('.faq-question');
  questions.forEach(question => {
    question.addEventListener('click', () => {
      const answer = question.nextElementSibling;

      if (!question.classList.contains('active')) {
        document.querySelectorAll('.faq-answer').forEach(a => a.classList.remove('active'));
        document.querySelectorAll('.faq-question').forEach(btn => btn.classList.remove('active'));
        question.classList.add('active');
        answer.classList.add('active');
      } else {
        document.querySelectorAll('.faq-answer').forEach(a => a.classList.remove('active'));
        document.querySelectorAll('.faq-question').forEach(btn => btn.classList.remove('active'));
      }
    });
  })
};
