<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include "db.php";

$projects = $conn->query("SELECT * FROM projects");
$contacts = $conn->query("SELECT * FROM contacts");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Admin Dashboard</title>
<link rel="stylesheet" href="style.css">

<style>
.dashboard{
  padding:40px;
  background:var(--bg);
  min-height:100vh;
}

.topbar{
  display:flex;
  justify-content:space-between;
  align-items:center;
  margin-bottom:30px;
}

.topbar h1{
  font-family:'Playfair Display', serif;
  color:var(--accent);
}

.topbar a{
  text-decoration:none;
  margin-left:10px;
  padding:10px 16px;
  border-radius:10px;
  border:1px solid var(--border);
  color:var(--text);
}

.grid{
  display:grid;
  grid-template-columns: 1fr 1fr;
  gap:20px;
}

.card{
  background:var(--card-green);
  border:1px solid var(--border);
  padding:20px;
  border-radius:16px;
  box-shadow:0 10px 30px rgba(0,0,0,0.08);
}

.card h2{
  font-family:'Playfair Display', serif;
  margin-bottom:15px;
  color:var(--accent);
}

input, textarea{
  width:100%;
  padding:12px;
  margin:8px 0;
  border-radius:10px;
  border:1px solid var(--border);
  background:var(--bg);
}

button{
  padding:12px 16px;
  background:var(--accent);
  color:white;
  border:none;
  border-radius:10px;
  cursor:pointer;
}

.item{
  padding:15px;
  border-bottom:1px solid var(--border);
}

.item h4{
  margin-bottom:5px;
}

.delete{
  color:red;
  text-decoration:none;
  font-size:0.85rem;
}
</style>

</head>

<body>

<div class="dashboard">

  <div class="topbar">
    <h1>Admin Dashboard</h1>
    <div>
      <a href="index.html">Portfolio</a>
      <a href="logout.php">Logout</a>
    </div>
  </div>

  <div class="grid">

    <!-- ADD PROJECT -->
    <div class="card">
      <h2>Add Project</h2>

      <form action="add_project.php" method="POST">
        <input name="title" placeholder="Project Title" required>
        <textarea name="description" placeholder="Description" required></textarea>
        <button>Add Project</button>
      </form>
    </div>

    <!-- PROJECTS -->
    <div class="card">
      <h2>Projects</h2>

      <?php while($p = $projects->fetch_assoc()): ?>
        <div class="item">
          <h4><?= $p['title'] ?></h4>
          <p><?= $p['description'] ?></p>
          <a class="delete" href="delete_project.php?id=<?= $p['id'] ?>">Delete</a>
        </div>
      <?php endwhile; ?>

    </div>

    <!-- CONTACT MESSAGES -->
    <div class="card" style="grid-column: span 2;">
      <h2>Messages</h2>

      <?php while($c = $contacts->fetch_assoc()): ?>
        <div class="item">
          <h4><?= $c['name'] ?> - <?= $c['email'] ?></h4>
          <p><?= $c['message'] ?></p>
        </div>
      <?php endwhile; ?>

    </div>

  </div>

</div>

</body>
</html>