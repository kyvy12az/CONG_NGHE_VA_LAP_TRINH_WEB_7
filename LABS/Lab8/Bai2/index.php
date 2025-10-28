<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Bài 2 - Gửi Email có đính kèm (TinyMCE)</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- TinyMCE -->
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
    <div class="col-md-8">
      <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-primary text-white text-center rounded-top-4">
          <h4 class="mb-0">Gửi Email có đính kèm</h4>
        </div>
        <div class="card-body p-4">
          <form action="mail.php" method="POST" enctype="multipart/form-data">
            
            <div class="mb-3">
              <label class="form-label">Người nhận</label>
              <input type="email" name="email" class="form-control" placeholder="Nhập địa chỉ email..." required>
            </div>

            <div class="mb-3">
              <label class="form-label">Tiêu đề</label>
              <input type="text" name="tieude" class="form-control" placeholder="Nhập tiêu đề email..." required>
            </div>

            <div class="mb-3">
              <label class="form-label">Nội dung</label>
              <textarea id="editor" name="content" class="form-control"></textarea>
            </div>

            <div class="mb-3">
              <label class="form-label">Tệp đính kèm</label>
              <input type="file" name="file" class="form-control">
            </div>

            <div class="text-center">
              <button type="submit" class="btn btn-success px-5">Gửi Email</button>
            </div>
          </form>
        </div>
        <div class="card-footer text-center text-muted">
          <small>Lab 8 - Bài 2 | Gửi email có TinyMCE & đính kèm file</small>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
