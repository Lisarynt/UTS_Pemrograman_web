function navigateToLogin() {
  window.location.href = "login.html";
}

function navigateToRegister() {
  window.location.href = "register.html";
}

// ===== LOGIN VALIDATION =====
const loginForm = document.getElementById("loginForm");

if (loginForm) {
  loginForm.addEventListener("submit", function (event) {
    event.preventDefault(); 

    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;

    
    const validUsername = "admin";
    const validPassword = "12345";

    if (username === validUsername && password === validPassword) {
      alert("Login berhasil!");
      window.location.href = "dashboard.html"; 
    } else {
      alert("Username atau password salah!");
    }
  });
}

// ===== REGISTER VALIDATION =====
const registerForm = document.getElementById("registerForm");

if (registerForm) {
  registerForm.addEventListener("submit", function (event) {
    event.preventDefault(); 

    const fullName = document.getElementById("fullName").value;
    const email = document.getElementById("email").value;
    const username = document.getElementById("registerUsername").value;
    const password = document.getElementById("registerPassword").value;

    
    if (fullName === "" || email === "" || username === "" || password === "") {
      alert("Semua field wajib diisi!");
      return;
    }

    if (password.length < 6) {
      alert("Password minimal 6 karakter!");
      return;
    }

    alert("Registrasi berhasil! Silakan login.");
    window.location.href = "login.html"; 
  });
}

