
 <!DOCTYPE html>
 <html>
 <head>
   <title></title>
 <style type="text/css">
   /* Audio Speaker button Style */
  button#playpausebtn{
    background:url(audio/pause.png) no-repeat;
    border: none;
    width: 30px;
    height: 30px;
    cursor: pointer;
    outline: none;
  }
  button#mutebtn{
    background: url(audio/spreker.png) no-repeat;
    border: none;
    width: 30px;
    height: 30px;
    cursor: pointer;
    outline: none;
  }
 </style>
<script>
  var audio, playbtn, mutebtn, seek_bar;
  function initAudioPlayer(){
    audio = new Audio();
    audio.src = "audio/horse.ogg";
    audio.loop = true;
    audio.play();
    //Set object references
    playbtn = document.getElementById("playpausebtn");
    mutebtn = document.getElementById("mutebtn");
    // Add Event Handling
    playbtn.addEventListener("click",playPause);
    mutebtn.addEventListener("click",mute);
    //Functions
    function playPause(){
      if (audio.paused) {
        audio.play();
        playbtn.style.background = "url(audio/pause.png) no-repeat";
      }else{
        audio.pause();
        playbtn.style.background = "url(audio/play.png) no-repeat";
      }
    }
    
    function mute(){
      if (audio.muted) {
        audio.muted = false;
        mutebtn.style.background = "url(audio/spreker.png) no-repeat";
      }else{
        audio.muted = true;
        mutebtn.style.background = "url(audio/muted.png)";
      }
    }
  }
  window.addEventListener("load", initAudioPlayer);
</script>
 </head>
 <body>
 <button id="playpausebtn"></button> <button id="mutebtn"></button>
 </body>
 </html>      