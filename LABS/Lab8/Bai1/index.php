<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Gửi Email bằng PHPMailer</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card shadow-lg border-0 rounded-4">
          <div class="card-header text-center bg-primary text-white rounded-top-4">
            <h4 class="mb-0">Gửi Email bằng PHPMailer</h4>
          </div>
          <div class="card-body p-4">
            <form action="send_mail.php" method="POST">
              <div class="mb-3">
                <label class="form-label">Người nhận</label>
                <input type="email" name="email" class="form-control" placeholder="Nhập địa chỉ email..." required>
              </div>
              <div class="mb-3">
                <label class="form-label">Tiêu đề</label>
                <input type="text" name="subject" class="form-control" placeholder="Nhập tiêu đề email..." required>
              </div>
              <div class="mb-3">
                <label class="form-label">Nội dung</label>
                <textarea name="message" class="form-control" rows="5" placeholder="Nhập nội dung email..." required></textarea>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-success px-4">Gửi Email</button>
              </div>
            </form>
          </div>
          <div class="card-footer text-center text-muted">
            <small>Lab 8 - Gửi Email với Gmail SMTP</small>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
