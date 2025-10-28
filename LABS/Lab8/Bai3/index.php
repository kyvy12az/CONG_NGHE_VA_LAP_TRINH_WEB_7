<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Bài 3 - Gửi Email cho nhiều người</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.tiny.cloud/1/5ux684qt3vuca9ymfoy3cv8enh314niuaq2lcucez6h11plx/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
  <script>
    tinymce.init({
      selector: '#editor',
      height: 300,
      menubar: false,
      plugins: 'link image lists table code',
      toolbar: 'undo redo | bold italic underline | bullist numlist | link image | alignleft aligncenter alignright | code',
      branding: false,
      content_style: "body { font-family: Arial, sans-serif; font-size: 14px; }"
    });
  </script>
</head>

<body class="bg-light">
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-9">
        <div class="card shadow-lg border-0 rounded-4">
          <div class="card-header bg-danger text-white text-center rounded-top-4">
            <h4 class="mb-0">📨 Gửi Email hàng loạt từ Database</h4>
          </div>
          <div class="card-body p-4">
            <form action="mail_multi.php" method="POST" enctype="multipart/form-data">

              <div class="mb-3">
                <label class="form-label">Tiêu đề</label>
                <input type="text" name="tieude" class="form-control" placeholder="Nhập tiêu đề email..." required>
              </div>

              <div class="mb-3">
                <label class="form-label">Nội dung</label>
                <textarea id="editor" name="content" class="form-control"></textarea>
              </div>

              <div class="mb-3">
                <label class="form-label">Tệp đính kèm (nếu có)</label>
                <input type="file" name="file" class="form-control">
              </div>

              <hr>
              <h6 class="text-muted mb-2">Danh sách email sẽ nhận thư:</h6>

              <?php
              include 'connect.php';
              $stmt = $conn->query("SELECT email FROM User");
              $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
              echo '<ul class="list-group mb-3">';
              foreach ($users as $u) {
                  echo '<li class="list-group-item">' . htmlspecialchars($u['email']) . '</li>';
              }
              echo '</ul>';
              ?>

              <div class="text-center">
                <button type="submit" class="btn btn-danger px-5">Gửi cho tất cả</button>
              </div>
            </form>
          </div>
          <div class="card-footer text-center text-muted">
            <small>Lab 8 - Bài 3 | Gửi nhiều email từ CSDL</small>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
