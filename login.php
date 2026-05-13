<?php
session_start();
$error = "";

if ($_POST) {
    if ($_POST['username'] === "admin" && $_POST['password'] === "1234") {
        $_SESSION['admin'] = true;
        header("Location: admin.php");
        exit();
    } else {
        $error = "Wrong credentials!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Admin Login</title>
<link rel="stylesheet" href="style.css">

<style>
.login-wrapper{
  height:100vh;
  display:flex;
  align-items:center;
  justify-content:center;
  background: var(--bg);
}

.login-card{
  width:360px;
  padding:40px;
  border-radius:20px;
  background: var(--card-green);
  border:1px solid var(--border);
  box-shadow: 0 20px 60px rgba(0,0,0,0.15);
  text-align:center;
}

.login-card h2{
  font-family:'Playfair Display', serif;
  margin-bottom:20px;
  color:var(--accent);
}

.login-card input{
  width:100%;
  padding:14px;
  margin:10px 0;
  border-radius:10px;
  border:1px solid var(--border);
  background: var(--bg);
  color: var(--text);
}

.login-card button{
  width:100%;
  padding:14px;
  margin-top:10px;
  background: var(--accent);
  color:white;
  border:none;
  border-radius:10px;
  cursor:pointer;
  transition:0.3s;
}

.login-card button:hover{
  background: var(--accent-light);
}

.back{
  display:block;
  margin-top:15px;
  color:var(--text-muted);
  text-decoration:none;
  font-size:0.85rem;
}
</style>

</head>

<body>

<div class="login-wrapper">

  <div class="login-card">

    <h2>Admin Panel</h2>

    <form method="POST">
      <input name="username" placeholder="Username">
      <input type="password" name="password" placeholder="Password">
      <button>Login</button>
    </form>

    <a class="back" href="index.html">← Back to Portfolio</a>

    <p style="color:red"><?= $error ?></p>

  </div>

</div>

</body>
</html>