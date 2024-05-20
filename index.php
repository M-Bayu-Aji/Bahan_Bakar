<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="shell-logo.png">
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Shell Bahan Bakar</title>
</head>
<body style="background-color: #fff3cd;">
    <div class="container mt-5">
        <div class="card bg-warning">
            <div class="card-body">
                <div class="text-center mb-4">
                    <img src="shell-logo.png" width="70px" alt="Shell Logo">
                    <h2>Shell Bahan Bakar</h2>
                </div>
                <?php
                // Cek apakah form telah disubmit
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Ambil nilai dari form
                    $jenisBahanBakar = $_POST['jenis'];
                    $jumlahLiter = $_POST['jumlah'];

                    // Import class Shell
                    require 'shell.php';

                    // Lakukan pembelian
                    $pembelian = new Beli($jenisBahanBakar, $jumlahLiter);
                    $buktiTransaksi = $pembelian->buktiTransaksi();
                    echo "<div class='alert alert-success text-center'>$buktiTransaksi</div>";
                }
                ?>
                <form method="post">
                    <div class="form-group">
                        <label for="jumlah">Jumlah Liter:</label>
                        <input type="number" class="form-control" name="jumlah" id="jumlah" min="1" required>
                    </div>
                    <div class="form-group">
                        <label for="jenis">Pilih Jenis Bahan Bakar:</label>
                        <select class="form-control" name="jenis" id="jenis">
                            <option value="" disabled selected>--- Pilih Bahan Bakar ---</option>
                            <option value="Shell Super">Shell Super</option>
                            <option value="Shell V-Power">Shell V-Power</option>
                            <option value="Shell V-Power Diesel">Shell V-Power Diesel</option>
                            <option value="Shell V-Power Nitro">Shell V-Power Nitro</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-secondary">Beli</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
