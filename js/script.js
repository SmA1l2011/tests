let percentages = document.querySelector("#percentages").value,
    before = [...document.querySelectorAll(".before")]
before.forEach(element => {
    element.style.width = percentages + "%"
});