<!-- Program Statement:
  Create HTML page that contain textbox, submit / reset button. Write PHP 
  script to display this information and also store into a text file.
-->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Thoughts</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <h1>Enter your thoughts</h1>
  <form action="thoughts.php" method="POST">
    <label for="thoughts">Thoughts:</label>
    <div id="text-con">
      <textarea rows="25" cols="100" id="thoughts" name="thoughts"></textarea>      
    </div>
    <div id="btn-div">
      <button type="submit">Submit</button>
      <button type="reset">Reset</button>
    </div>
  </form>

  <?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $thoughts = $_POST["thoughts"];
      $thought_file = fopen("My_thoughts.txt", "w");
      fwrite($thought_file, $thoughts);
      fclose($thought_file);
      echo "<p>The thought is: </p>";
      echo "<p class='bold'>$thoughts</p>";
      $file_path = realpath("My_thoughts.txt");
      echo "<p>The thought file path is: <span class='bold'>$file_path</span></p>";
    }
  ?>
</body>
</html>



//style.css
body {
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  background-color: aqua;
}

h1 {
  text-align: center;
}

form {
  margin: 0 10rem;
  background-color: aquamarine;
  padding: 2rem 1rem;
  border-radius: 15px;
}

label {
  margin: 0 2.5rem;
  padding: 3rem 0;
  font-weight: bold;
  font-size: 1.5rem;
}

#text-con {
  margin: 1rem auto;
}

textarea {
  margin: 0 auto;
  display: block;
  border-radius: 8px;
  background-color: aliceblue;
  resize: none;
}

#btn-div {
  text-align: center;
  margin: 1rem auto;
}

button {
  background-color: rgb(73, 180, 184);
  color: aliceblue;
  font-size: 1.2rem;
  padding: 1rem 2rem;
  border-radius: 6px;
  display: inline-block;
  margin: 0 0.75rem;
}

button:hover {
  background-color: aliceblue;
  color: rgb(73, 180, 184);
  cursor: pointer;
}

.bold {
  font-weight: bold;
}

p {
  text-align: center;
}
