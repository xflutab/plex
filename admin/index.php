<?php
$title =  'صفحة مدير النظام';
$icon =  'fa fa-user-cog';
$currentPage = 'admin';
include __DIR__ . '/../template/header.php';
$errors = [];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (empty($_POST['title'])) {
        array_push($errors, "يرجى ادخال عنوان للرسالة ");
    }
    if (empty($_POST['message'])) {
        array_push($errors, "يرجى ادخال  رسالة ");
    }


    $stmt = $conn->prepare("INSERT INTO `alert` ( `Title`, `message`, `url`) VALUES ( ?, ?, ?)");
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    $url = $_POST['url'];
    // ربط قيم المعلمات بالاستعلام
    $stmt->bind_param("sss",  $title, $message, $url);

    // تعيين قيم المعلمات

    // تنفيذ الاستعلام
    if (!count($errors)) {
        $stmt->execute();
        echo " <script>
        Swal.fire({
            type: 'success',
            title: 'تم ارسال الاعلان',
            text: '',
            showConfirmButton: true,
            confirmButtonText: 'OK',
            onClose: function() {
                window.location.href = 'index.php';
            } 


        })
        </script>";
    };
};



?>















<div class="row justify-content-center">




    <div class="col-5">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">اضافة اعلان للمسستخدم</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form role="form" method="POST" action="">
                    <div class="row">
                        <div class="col-sm-12">
                            <?php include __DIR__ . '/../template/errors.php' ?>

                            <!-- text input -->
                            <div class="form-group">
                                <label>عنوان الاعلان</label>
                                <input type="text" name="title" class="form-control" placeholder="Enter ...">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- textarea -->
                            <div class="form-group">
                                <label>نص الاعلان</label>
                                <textarea class="form-control" name="message" rows="3" placeholder="Enter ..." style="height: 116px;"></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- text input -->
                            <div class="form-group">
                                <label>URL:</label>
                                <input type="url" name="url" class="form-control" placeholder="URL ...">
                            </div>
                        </div>
                        <button class="btn btn-danger float-right" id="delete" type="delete">حذف جميع الاعلانات</button>

                    </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-info float-right">ارسال</button>
            </div>
            </form>

        </div>
        <!-- /.card-body -->
    </div>
</div>




<?php include __DIR__ . '/../template/footer.php'; ?>