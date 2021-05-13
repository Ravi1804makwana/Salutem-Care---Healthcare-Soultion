<html>
<head>
  <script src='https://cdn.scaledrone.com/scaledrone.min.js'></script>
  <script src="https://kit.fontawesome.com/e6addfb9e1.js" crossorigin="anonymous"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <style type="text/css" rel = "stylesheet">
    #localVideo{
      position: fixed;
      bottom: 20px;
      right: 20px;
      z-index: 99;
      border: none;  
    }
    #end{
      position: fixed;
      display: flex;
      align-items: center;
      justify-content: center;
      bottom: 20px;
    }
    #remoteVideo{
	   margin-left: auto;
    margin-right: auto;
    display: block;
    height: 100%;
    }
  </style>
</head>
<body style="background-color: black;">
  <video id="remoteVideo"  autoplay></video>
  
  <video class="col-lg-3 col-sm-2 col-md-2 col-4" id="localVideo" autoplay muted></video>
  
  <div class="row container">
    <div id="end" class="btn-group btn-group-lg col-lg-6" style="z-index: 100;">
      <div onclick="UnMuteVideo();" class="btn btn-primary" style="border-radius: 50px 0px 0px 50px;"><i class="fas fa-video" style="font-size: 45px;"></i></div>
      <div onclick="MuteVideo()" class="btn btn-primary"><i class="fas fa-video-slash" style="font-size: 45px;"></i></i></div>
      <div class="btn btn-danger"><a href="../doctors.php"><i class="fas fa-phone" style="font-size: 45px;color: white;"></i></a></div>
      <div onclick="UnMuteAudio()" class="btn btn-primary"><i class="fas fa-microphone-slash" style="font-size: 45px;"></i></div>
      <div onclick="MuteAudio()" class="btn btn-primary" style="border-radius: 0px 50px 50px 0px;"><i class="fas fa-microphone" style="font-size: 45px;"></i></div>
    </div>
  </div>
  
  <script src="script.js"></script>
  <script src="myjs.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>
</html>