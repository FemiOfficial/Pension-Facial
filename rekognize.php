<?php
include_once("res/header.php");
include_once("res/connect.php");
include "Kairos.php";

$id = $_SESSION['id'];
$Kairos = new Kairos('05321084', 'c03abc685a57288d2cfb9c129cc15edb');
$fetch = mysqli_query($conn, "SELECT * FROM `pensioners` WHERE id = '$id'");
$row = mysqli_fetch_array($fetch);

$actual_image = base64_encode($row["image"]);
$image       = $actual_image;
$subject_id = 'femi';
$gallery_name = 'friends1';
$argumentArray =  array(
    "image" => $image,
    "subject_id" => $subject_id,
    "gallery_name" => $gallery_name
);

$response   = $Kairos->enroll($argumentArray);

$image       = 'images/12.jpg';
$subject_id = 'elizabeth';
$gallery_name = 'friends1';
$argumentArray =  array(
    "image" => $image,
    "subject_id" => $subject_id,
    "gallery_name" => $gallery_name
);
$respons   = $Kairos->verify($argumentArray);
?>


<div class="container" style="margin-top: 60px;">
  <div style="margin-left: 300px;">
    <div class="col-md-3">
        <div class="form-group">
                                <label for="">Name:</label>
                                <input type="text" required class="form-control" value="<?php echo $_SESSION['firstname'];?>" name="subject_name" v-model="model.name">
                            </div>
      <video id="my_camera" width="200px" height="200px" > </video>
        <p style="text-align:center;">Image Preview</p>
        <button  id = "snap_btn" class="btn btn-primary">Take Facial Image</button>

            <!-- <img id="face_preview1" class="img-responsive" alt="" width="200" height="200">
             -->
       <canvas id="face_preview1" width="200px" height="200px" style="margin-top:120px;"></canvas>
       <!-- <img src="" id="face_image" width="800px" height="800px"/> -->

    </div>

    <div class="col-md-8" style="padding: 30px;">
        <?php
            $id = $_SESSION['id'];
            $sql = "SELECT * FROM pensioners WHERE id = '$id'";
            $fetch = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($fetch)
        ?>
        <h4 style="margin-left: 60px;">Image from Database to verify </h4>

        <?php echo '<img  width="200px" height="200px" style="margin: 30px;margin-left: 60px;" src = "data:image/jpeg;base64,'.base64_encode($row["image"]).'">'; ?>

        <?php echo $response; ?>
        <?php echo '<br>Gender:'.$response['gender'];?>
        <?php echo '<br>Black Race Confidence:'.$response['black'];?>
        <?php echo '<br>White Race Confidence:'.$response['white'];?>
        <?php echo '<br>Confidence:'.$response['confidence'];?>
        <?php echo '<br>Eye Distance:'.$response['eyeDistance'];?>
        <?php echo '<br>Gender:'.$response['gender'];?>

    </div>

            <script type="text/javascript">
            $(document).ready(function(){
              var video = document.getElementById('my_camera');
              var image = document.getElementById('face_image');
              var canvas = document.getElementById('face_preview1');
              var context = canvas.getContext('2d');
              function base64ToBlob(base64, mime)
                  {
                      mime = mime || '';
                      var sliceSize = 1024;
                      var byteChars = window.atob(base64);
                      var byteArrays = [];

                      for (var offset = 0, len = byteChars.length; offset < len; offset += sliceSize) {
                          var slice = byteChars.slice(offset, offset + sliceSize);

                          var byteNumbers = new Array(slice.length);
                          for (var i = 0; i < slice.length; i++) {
                              byteNumbers[i] = slice.charCodeAt(i);
                          }

                          var byteArray = new Uint8Array(byteNumbers);

                          byteArrays.push(byteArray);
                      }
                      return new Blob(byteArrays, {type: mime});
                  }
              $("#snap_btn").on("click", function(){
                canvas.width = 800;
                canvas.height = 800;
                var canvasData = canvas.toDataURL();
                var length = canvasData.length - 1;
                canvaData = (canvasData.substr(22, length));
               var blob = base64ToBlob(canvaData, 'image/png');
                console.log(blob);
                context.drawImage(video, 0, 0);
                // data = {'image': canvaData};
                // $.ajax({
                //   url : "res/verify_image.php",
                //   method: "GET",
                //   cache:false,
                //   contentType: false,
                //   processData:false,
                //   data: data,
                //   success: function(res){
                //     alert(res);
                //   }
                // });
              });

              navigator.getUserMedia = navigator.getUserMedia  ||  navigator.webkitGetUserMedia  ||  navigator.mozGetUserMedia || navigator.oGetUserMedia  ||  navigator.msGetUserMedia;

              if(navigator.getUserMedia) {
                  navigator.getUserMedia({video:true}, streamWebCam, throwError);
              }
              function streamWebCam (stream){
                  video.src = window.URL.createObjectURL(stream);
                  video.play();
              }
              function throwError(e){
                  alert(e.name);
              }
              function snap(){
                  canvas.width = 800;
                  canvas.height = 800;
                  var canvasData = canvas.toDataURL();
                  context.drawImage(video, 0, 0)
              }
            });
             </script>
<script src="js/jquery.min.js"></script>


  </div>

</div>
