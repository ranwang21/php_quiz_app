const correctInput = document.querySelector('[name="correct"]');
if (correctInput !== null) {
  correctInput.addEventListener("click", () => {
    alert("Correct!");
  });
}

const inputArray = Array.from(document.querySelectorAll('[name="incorrect"]'));

if (inputArray !== null) {
  inputArray.forEach(input => {
    input.addEventListener("click", () => {
      alert("Incorrect!");
    });
  });
}
