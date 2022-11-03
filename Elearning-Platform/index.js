const formEl = document.getElementById("form");
const nameEl = document.getElementById("name");
const emailEl = document.getElementById("email");
const passEl = document.getElementById("password");
const errorName = document.querySelector(".errorName");
const errorEmail = document.querySelector(".errorEmail");
const errorPass = document.querySelector(".errorPass");
const rpassword = document.getElementById("rpassword");

formEl.addEventListener("submit", (e) => {
  if (!/^[a-z0-9_-]{3,}$/i.test(nameEl.value)) {
    e.preventDefault();
    errorName.textContent = "name empty or invalid";
  } else {
    errorName.textContent = "";
  }

  if (!/[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+/i.test(emailEl.value)) {
    e.preventDefault();
    errorEmail.textContent = "email empty or invalid";
  } else {
    errorEmail.textContent = "";
  }

  if (!passEl.value.match(/^[a-zA-Z0-9]{8,}$/)) {
    e.preventDefault();
    errorPass.textContent = "password empty or invalid";
  } else {
    errorPass.textContent = "";
  }

  if (rpassword.value !== passEl.value) {
    e.preventDefault();
    document.querySelector(".errorConfirmPass").textContent =
      "password didn't match";
  } else {
    document.querySelector(".errorConfirmPass").textContent = "";
  }
});
