<!DOCTYPE html>
<html lang="en">
<head>
  <title>Mon site avec Bootstrap 4 </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/1f7457abdb.js"></script>
  <style>
  </style>
</head>
<body>
  <!-- ENTETE -->
  <header>
    <div class="jumbotron text-center" style="margin-bottom:0">
      <h1>Attractio'Consult</h1>
      <p>Le repère des amoureux du parc de loisir</p> 
    </div>
<?php
session_start();
if(!isset($_SESSION["admin"])){
  include 'navbar.html';
}
elseif ($_SESSION["admin"]==1){
  include 'navbarC.html';
}
elseif ($_SESSION["admin"]==2){
  include 'navbarA.html';
}
else{
  include 'navbar.html';
}
?>
</header>