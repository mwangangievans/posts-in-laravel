<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h1>Grid</h1>      
  <div class="row">
    <div class="col-sm-3" style="background-color:yellow;">{{$post->title}}</div>
    <div class="col-sm-3" style="background-color:pink;">2</div>
    <div class="col-sm-3" style="background-color:green;">3</div>
  </div>
</div>  
</body>
</html>
