<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TPC Forms</title>
  <link rel="stylesheet" href="https://unpkg.com/open-props@1.6.19/open-props.min.css">
  <link rel="stylesheet" href="https://unpkg.com/open-props@1.6.19/normalize.min.css">
  <style>
      html {
        display: grid;
        place-items: center;
      }

      body {
        padding: var(--size-1) var(--size-2);
      }

      main {
        max-width: 80ch;
        width: 100%;
        display: flex;
        align-items: flex-start;
        flex-direction: column;
      }

      form {
        width: 100%;
        display: flex;
        flex-direction: column;
        gap: var(--size-3);

        > div {
          display: flex;
          flex-direction: column;
          width: 100%;
          gap: var(--size-2);
        }

        input[type="submit"] {
          background: var(--blue-12);
          border-radius: var(--radius-2);
          border: 1px solid var(--blue-11);
          color: var(--blue-0);

          &:hover{
            background: var(--blue-11);
          }

          &:focus {
            outline: 2px solid var(--blue-3);
          }
        }
      }

      section#results {
        display: none;
        margin-top: var(--size-4);
        background: var(--yellow-12);
        width: 100%;
        padding: var(--size-3);
        color: var(--yellow-0);
        border: 1px solid var(--yellow-11);
        border-radius: var(--radius-2);
        /* if there are results in <p /> show the block */
        &:has(p.field){
          display: block;
        }
      }
    </style>
</head>
<body>
  <main>
    <h1>Forms</h1>
    <p>This is a simple form website in PHP. It's hosted via Azure App Services</p>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <div>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>
        </div>

        <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        </div>

        <div>
        <label for="message">Message:</label>
        <textarea name="message" id="message" required></textarea>
        </div>

        <input type="submit" value="Submit">
    </form>

    <section id="results">
      <h3>Submitted Data</h3>
      <p>The data you just submitted can be found below:</p>
    <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $name = $_POST["name"];
          $email = $_POST["email"];
          $message = $_POST["message"];
          
          echo "<p class="field">Name: " . $name . "</p>";
          echo "<p class="field">Email: " . $email . "</p>";
          echo "<p class="field">Message: " . $message . "</p>";
      }
    ?>
    </section>
  </main>
</body>
</html>