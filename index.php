<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ClearVote</title>
  <style>
    /* Reset margin and padding for the body */
    body, html {
      margin: 0;
      padding: 0;
      width: 100%;
      height: 100%;
      overflow: hidden;
    }

    /* Ensure the image covers the entire viewport */
    .full-page-image {
      width: 80%;
      height: 80%;
      object-fit: cover; /* Ensures the image covers the container */
    }

    .btn
    {
      color:white;
      background:#363786;
      padding-top:20px;
      padding-bottom:20px;
      padding-left:10px;
      padding-right:10px;
      font-size:14px;
      font-weight:bold;
      border-radius:40px;
      cursor: pointer;
    }
    p
    {
        font-size:20px !important;
    }
  </style>
</head>
<body>
  <div align="center">
    <img src="img/clearvote_main1.png" alt="Full Page Image" class="full-page-image"><br>
    <img src="img/logo.png" alt="Full Page Image" width="450"><br>
    <p>Welcome to ClearVote. Utilize out tools to gain</p>
    <p>insights into your voting area, locate nearby polling places, and stay</p>
    <p>informed about election updates. We are dedicated to ensuring a clear</p>
    <p>and transparent voting experience for all citizens of Georgia.</p><br>
    <button class="btn" onclick="window.location='login.php'">Enter Project ClearVote</button>
</div>
</body>
</html>
