<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Habit Tracker</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #979797;
      background-image: url('images/background.jpg');
      background-repeat: no-repeat;
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .container {
      background: rgba(216, 216, 216, 0.829);
      padding: 20px;
      border-radius: 10px;
      text-align: center;
      width: 70vh;
      border: 1px solid #333;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
    h1 {
      font-size: 1.5em;
      margin-bottom: 20px;
      color: #333;
    }
    .form-group {
      display: flex;
      justify-content: space-between;
      margin-bottom: 15px;
    }
    input[type="text"] {
      width: 70%;
      padding: 8px;
      font-size: 1em;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    button {
      background-color: #333;
      color: white;
      border: none;
      padding: 8px 12px;
      border-radius: 15px;
      cursor: pointer;
      font-size: 0.9em;
    }
    button:hover {
      background-color: #555;
    }
    .habit-list {
      margin: 20px 0;
      text-align: left;
    }
    .habit-item {
      display: flex;
      justify-content: space-between;
      margin-bottom: 10px;
    }
    .footer-buttons {
      display: flex;
      justify-content: space-between;
    }
    .error { color: red; margin-bottom: 15px; }
  </style>
</head>
<body>
  <?php
  session_start();
  if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
      header("Location: login.php");
      exit();
  }
  require_once 'controller/db_connect.php';
  // Fetch habits for the logged-in user
  $user_id = $_SESSION['user_id'];
  try {
      $stmt = $pdo->prepare("SELECT id, habit_text FROM habits WHERE user_id = ? ORDER BY created_at DESC");
      $stmt->execute([$user_id]);
      $habits = $stmt->fetchAll(PDO::FETCH_ASSOC);
  } catch(PDOException $e) {
      echo '<p class="error">Error loading habits: ' . $e->getMessage() . '</p>';
      $habits = [];
  }
  ?>
  <div class="container">
    <h1>TRACK YOUR DAILY HABITS</h1>
    <p>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
    <div class="form-group">
      <input type="text" placeholder="Enter a habit" id="habit-input">
      <button onclick="addHabit()">ADD</button>
    </div>
    <br><br>
    <h2>HABIT LIST</h2>
    <div class="habit-list" id="habit-list">
      <?php foreach ($habits as $habit): ?>
        <div class="habit-item" data-id="<?php echo $habit['id']; ?>">
          <span><?php echo htmlspecialchars($habit['habit_text']); ?></span>
          <button onclick="deleteHabit(<?php echo $habit['id']; ?>)">DELETE</button>
        </div>
      <?php endforeach; ?>
    </div>
    <br>
    <div class="footer-buttons">
      <button onclick="goNext()">HOME</button>
      <button onclick="goConUs()">CONTACTUS</button>
      <button onclick="window.location.href='controller/logout.php'">LOGOUT</button>
    </div>
  </div>

  <script>
    function addHabit() {
      const habitInput = document.getElementById('habit-input');
      const habitText = habitInput.value.trim();
      if (habitText === "") return;

      const xhr = new XMLHttpRequest();
      xhr.open('POST', 'controller/add_habit.php', true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.onload = function() {
        if (xhr.status === 200) {
          const response = JSON.parse(xhr.responseText);
          if (response.success) {
            const habitList = document.getElementById('habit-list');
            const habitItem = document.createElement('div');
            habitItem.classList.add('habit-item');
            habitItem.setAttribute('data-id', response.habit_id);
            habitItem.innerHTML = `<span>${habitText}</span><button onclick="deleteHabit(${response.habit_id})">DELETE</button>`;
            habitList.prepend(habitItem);
            habitInput.value = "";
          } else {
            alert('Error adding habit: ' + response.error);
          }
        }
      };
      xhr.send(`habit_text=${encodeURIComponent(habitText)}`);
    }

    function deleteHabit(habitId) {
      const xhr = new XMLHttpRequest();
      xhr.open('POST', 'controller/delete_habit.php', true);
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.onload = function() {
        if (xhr.status === 200) {
          const response = JSON.parse(xhr.responseText);
          if (response.success) {
            document.querySelector(`.habit-item[data-id="${habitId}"]`).remove();
          } else {
            alert('Error deleting habit: ' + response.error);
          }
        }
      };
      xhr.send(`habit_id=${habitId}`);
    }

    function goNext() {
      window.location.href = 'index.html';
    }

    function goConUs() {
      window.location.href = 'contactus.php';
    }
  </script>
</body>
</html>