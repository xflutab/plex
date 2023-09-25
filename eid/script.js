var newFont = new FontFace(
    "GESSUniqueBold-Bold",
    "url('https://www.moh.gov.sa/greetings/Eid%20Ul%20Adha%202022/GE%20SS%20Unique%20Bold.otf')"
  );
  newFont.load().then(function (font) {
    document.fonts.add(font);
  });
  var canvas = document.querySelector("canvas"),
    context = canvas.getContext("2d"),
    width = 1600,
    height = 1600;
  
  // resize the canvas
  canvas.width = width;
  canvas.height = height;
  
  var downloadBtn = document.getElementById("download");
  
  function createNameTag(_name) {
    var imageObj = new Image();
    imageObj.onload = function () {
      context.drawImage(imageObj, 0, 0);
      context.font = "75px GESSUniqueBold-Bold";
      context.fillStyle = "#316840";
  
      context.fillText(_name.trim(), 1480, 1500);
  
      downloadBtn.download = "MOH_EidUlAdha2023.jpg";
      downloadBtn.href = canvas
        .toDataURL()
        .replace("image/png", "application/octet-stream");
    };
    // imageObj.setAttribute('crossOrigin', 'anonymous');
    imageObj.src = "MOD.jpg";
  
    // console.log(canvas.toDataURL());
  }
  
  $(function () {
    // init
    createNameTag("");
  
    $("#name").on("change keyup", function () {
      // context.clearRect(0, 0, 320, 320);
      createNameTag($("#name").val());
    });
  });
  