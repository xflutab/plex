var newFont = new FontFace(
    "Vazirmatn-Regular",
    "url('https://wy.sa/Vazirmatn-Regular.otf')"
  );
  newFont.load().then(function (font) {
    document.fonts.add(font);
  });
  var canvas = document.querySelector("canvas"),
    context = canvas.getContext("2d"),
    width = 886,
    height = 886;
  
  // resize the canvas
  canvas.width = width;
  canvas.height = height;
  
  var downloadBtn = document.getElementById("download");
  
  function createNameTag(_name) {
    var imageObj = new Image();
    imageObj.onload = function () {
      context.drawImage(imageObj, 0, 0);
      context.font = "50px Vazirmatn-Regular";
      context.fillStyle = "#ffffff";
  
      context.fillText(_name.trim(), 845, 830);
  
      downloadBtn.download = "RSADF_Eid2023.jpg";
      downloadBtn.href = canvas
        .toDataURL()
        .replace("image/png", "application/octet-stream");
    };
    // imageObj.setAttribute('crossOrigin', 'anonymous');
    imageObj.src = "MOD2.jpg";
  
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
  