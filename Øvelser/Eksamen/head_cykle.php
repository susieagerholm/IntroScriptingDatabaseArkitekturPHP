<?php

function header_cykle ($title, $headline) {
  echo "<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.01 Transitional//EN\">
        <html>
        <head>
        <meta http-equiv=\"content-type\" content=\"text/html; charset=windows-1250\">
        <meta name=\"generator\" content=\"PSPad editor, www.pspad.com\">
        <title>$title</title>
        <style type='text/css'>
          #top {
            margin: -9px;
            padding: -9px;
            background: #D3D3D3;
            height: 70px;
          }
          #text {
            position: absolute;
            left: 10px;
            top:10px;
          }
          #image {
            position: absolute;
            right: 5px;
            top: 2px;
            border: 3px outset #D3D3D3;
          }
          h1 {
            color: #808080;
            font-family: verdana, arial, sans-serif;
          }
          </style>
          </head>  
          <body bgcolor='green'>
            <div id='top'>
            <div id='text'> 
            <h1><b><i>Vi-cykler-til-arbejde.dk</i></b></h1>
            </div id='text'>
            <div id='image'> 
            <img src='cykle.jpg'>
            </div id='image'>
            </div id='top'>
            <br />
            <br />
            <br />
            <br />
            <hr />
            <h2>$headline</h2>";
}

function footer_cykle() {
  echo "<br />
        <br />
        <hr />
        <a href='mailto:webmaster@vi-cykler-til-arbejde.dk'>
        webmaster@vi-cykler-til-arbejde.dk</a>";       

}

?>
