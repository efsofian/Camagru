var shootbutton = document.getElementById('shoot');
var bigdiv = document.getElementsByClassName('hero-text-box')[0];
var newdiv = document.createElement("div");
newdiv.id = "newdiv";
shoot.addEventListener('click', function() {
  bigdiv.parentNode.replaceChild(newdiv, bigdiv);
  var newvid = document.createElement('video');
  newvid.setAttribute("id", "video");
  newdiv.appendChild(newvid);
  var newbutton = document.createElement('button');
  newbutton.setAttribute("id", "startbutton");
  var t = document.createTextNode("Prendre une photo");
  newbutton.appendChild(t);
  newdiv.appendChild(newbutton);
  var newcanvas = document.createElement('canvas');
  newcanvas.setAttribute("id", "canvas");
  newdiv.appendChild(newcanvas);
  var newimg = document.createElement('img');
  newimg.setAttribute("src", "http://placekitten.com/g/320/261");
  newimg.setAttribute("id", "photo");
  newimg.setAttribute("alt", "photo");
  newdiv.appendChild(newimg);

  (function() {

    var streaming = false,
        video        = document.querySelector('#video'),
        cover        = document.querySelector('#cover'),
        canvas       = document.querySelector('#canvas'),
        photo        = document.querySelector('#photo'),
        startbutton  = document.querySelector('#startbutton'),
        width = 320,
        height = 0;

    navigator.getMedia = ( navigator.getUserMedia ||
                           navigator.webkitGetUserMedia ||
                           navigator.mozGetUserMedia ||
                           navigator.msGetUserMedia);

    navigator.getMedia(
      {
        video: true,
        audio: false
      },
      function(stream) {
        if (navigator.mozGetUserMedia) {
          video.mozSrcObject = stream;
        } else {
          var vendorURL = window.URL || window.webkitURL;
          video.src = vendorURL.createObjectURL(stream);
        }
        video.play();
      },
      function(err) {
        console.log("An error occured! " + err);
      }
    );

    video.addEventListener('canplay', function(ev){
      if (!streaming) {
        height = video.videoHeight / (video.videoWidth/width);
        video.setAttribute('width', width);
        video.setAttribute('height', height);
        canvas.setAttribute('width', width);
        canvas.setAttribute('height', height);
        streaming = true;
      }
    }, false);

    function takepicture() {
      canvas.width = width;
      canvas.height = height;
      canvas.getContext('2d').drawImage(video, 0, 0, width, height);
      var data = canvas.toDataURL('image/png');
      photo.setAttribute('src', data);
    }

    startbutton.addEventListener('click', function(ev){
        takepicture();
      ev.preventDefault();
    }, false);

  })();

});
