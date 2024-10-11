<!DOCTYPE html>
<html>
<head>
<title>Project Title</title>
<meta charset="utf-8">
<meta name="viewport" content="target-densitydpi=device-dpi, width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, minimal-ui" />
<style> @-ms-viewport { width: device-width; } </style>
<link rel="stylesheet" href="vendor/reset.min.css">
<link rel="stylesheet" href="style.css">
</head>
<body class="multiple-scenes view-control-buttons">

<div id="pano"></div>

<div id="sceneList">
  <ul class="scenes">
    
      <a href="javascript:void(0)" class="scene" data-id="0-entrance">
        <li class="text">Entrance</li>
      </a>
    
      <a href="javascript:void(0)" class="scene" data-id="1-significant-events-in-jose-rizals-life">
        <li class="text">Significant Events in Jose Rizal&#39;s life</li>
      </a>
    
      <a href="javascript:void(0)" class="scene" data-id="2-timeline-1">
        <li class="text">Timeline 1</li>
      </a>
    
      <a href="javascript:void(0)" class="scene" data-id="3-timeline-2">
        <li class="text">Timeline 2</li>
      </a>
    
      <a href="javascript:void(0)" class="scene" data-id="4-timeline-3">
        <li class="text">Timeline 3</li>
      </a>
    
      <a href="javascript:void(0)" class="scene" data-id="5-jose-rizals-prison-cell-outside-1">
        <li class="text">Jose Rizal&#39;s Prison Cell Outside 1</li>
      </a>
    
      <a href="javascript:void(0)" class="scene" data-id="6-jose-rizals-prison-cell-outside-2">
        <li class="text">Jose Rizal&#39;s Prison Cell Outside 2</li>
      </a>
    
      <a href="javascript:void(0)" class="scene" data-id="7-jose-rizals-prison-cell-inside-1">
        <li class="text">Jose Rizal&#39;s Prison Cell Inside 1</li>
      </a>
    
      <a href="javascript:void(0)" class="scene" data-id="8-jose-rizals-prison-cell-inside-2">
        <li class="text">Jose Rizal&#39;s Prison Cell Inside 2</li>
      </a>
    
      <a href="javascript:void(0)" class="scene" data-id="9-eastside-entrance-1">
        <li class="text">Eastside Entrance 1</li>
      </a>
    
      <a href="javascript:void(0)" class="scene" data-id="10-eastside-entrance-2">
        <li class="text">Eastside Entrance 2</li>
      </a>
    
      <a href="javascript:void(0)" class="scene" data-id="11-silid-paglitis-outside-">
        <li class="text">Silid Paglitis Outside </li>
      </a>
    
      <a href="javascript:void(0)" class="scene" data-id="12-silid-paglitis-inside-1">
        <li class="text">Silid Paglitis Inside 1</li>
      </a>
    
      <a href="javascript:void(0)" class="scene" data-id="13-silid-paglitis-inside-2">
        <li class="text">Silid Paglitis Inside 2</li>
      </a>
    
      <a href="javascript:void(0)" class="scene" data-id="14-silid-paglitis-inside-3">
        <li class="text">Silid Paglitis Inside 3</li>
      </a>
    
      <a href="javascript:void(0)" class="scene" data-id="15-silid-kabayanihan-outside">
        <li class="text">Silid Kabayanihan Outside</li>
      </a>
    
      <a href="javascript:void(0)" class="scene" data-id="16-silid-kabayanihan-inside-1">
        <li class="text">Silid Kabayanihan Inside 1</li>
      </a>
    
      <a href="javascript:void(0)" class="scene" data-id="17-silid-kabayanihan-inside-2">
        <li class="text">Silid Kabayanihan Inside 2</li>
      </a>
    
      <a href="javascript:void(0)" class="scene" data-id="18-silid-kabayanihan-inside-3">
        <li class="text">Silid Kabayanihan Inside 3</li>
      </a>
    
      <a href="javascript:void(0)" class="scene" data-id="19-silid-kabayanihan-inside-4">
        <li class="text">Silid Kabayanihan Inside 4</li>
      </a>
    
      <a href="javascript:void(0)" class="scene" data-id="20-silid-kabayanihan-inside-5">
        <li class="text">Silid Kabayanihan Inside 5</li>
      </a>
    
      <a href="javascript:void(0)" class="scene" data-id="21-silid-kabayanihan-inside-6">
        <li class="text">Silid Kabayanihan Inside 6</li>
      </a>
    
      <a href="javascript:void(0)" class="scene" data-id="22-silid-kabayanihan-inside-7">
        <li class="text">Silid Kabayanihan Inside 7</li>
      </a>
    
      <a href="javascript:void(0)" class="scene" data-id="23-silid-kabayanihan-inside-8">
        <li class="text">Silid Kabayanihan Inside 8</li>
      </a>
    
      <a href="javascript:void(0)" class="scene" data-id="24-silid-kabayanihan-inside-9">
        <li class="text">Silid Kabayanihan Inside 9</li>
      </a>
    
  </ul>
</div>

<div id="titleBar">
  <h1 class="sceneName"></h1>
</div>

<a href="javascript:void(0)" id="autorotateToggle">
  <img class="icon off" src="img/play.png">
  <img class="icon on" src="img/pause.png">
</a>

<a href="javascript:void(0)" id="fullscreenToggle">
  <img class="icon off" src="img/fullscreen.png">
  <img class="icon on" src="img/windowed.png">
</a>

<a href="javascript:void(0)" id="sceneListToggle">
  <img class="icon off" src="img/expand.png">
  <img class="icon on" src="img/collapse.png">
</a>

<a href="javascript:void(0)" id="viewUp" class="viewControlButton viewControlButton-1">
  <img class="icon" src="img/up.png">
</a>
<a href="javascript:void(0)" id="viewDown" class="viewControlButton viewControlButton-2">
  <img class="icon" src="img/down.png">
</a>
<a href="javascript:void(0)" id="viewLeft" class="viewControlButton viewControlButton-3">
  <img class="icon" src="img/left.png">
</a>
<a href="javascript:void(0)" id="viewRight" class="viewControlButton viewControlButton-4">
  <img class="icon" src="img/right.png">
</a>
<a href="javascript:void(0)" id="viewIn" class="viewControlButton viewControlButton-5">
  <img class="icon" src="img/plus.png">
</a>
<a href="javascript:void(0)" id="viewOut" class="viewControlButton viewControlButton-6">
  <img class="icon" src="img/minus.png">
</a>

<script src="vendor/screenfull.min.js" ></script>
<script src="vendor/bowser.min.js" ></script>
<script src="vendor/marzipano.js" ></script>

<script src="data.js"></script>
<script src="index.js"></script>

</body>
</html>
