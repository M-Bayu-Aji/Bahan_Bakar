<?php

class Shell {
    protected $harga = [
        'Shell Super' => 15420,
        'Shell V-Power' => 16130,
        'Shell V-Power Diesel' => 18310,
        'Shell V-Power Nitro' => 16510
    ];
    protected $jenis;
    protected $jumlah;
    protected $ppn = 0.1;
    

    public function __construct($jenis, $jumlah) {
        $this->jenis = $jenis;
        $this->jumlah = $jumlah;
    }

    public function hitungTotal() {
        if (array_key_exists($this->jenis, $this->harga)) { 
            $total = $this->harga[$this->jenis] * $this->jumlah;
            $total += $total * $this->ppn; // PPN ditambahkan setelah menghitung total harga
            return $total;
        } else {
            return "Jenis bahan bakar tidak valid.";
        }
    }
}

class Beli extends Shell{
    public function buktiTransaksi() {
        $totalHarga = $this->hitungTotal();      
        if (is_numeric($totalHarga)) {
            return "<div class='judulTransaksi'>--- Bukti Transaksi ---</div>
            <p>Anda telah membeli bahan bakar minyak tipe ". $this->jenis . " dengan jumlah " ."<b>".$this->jumlah. " liter</b> dan total yang harus di bayarkan: <b>Rp. ".number_format($totalHarga, 2, ',', '.')."</b></p>";
        } else {
            return $totalHarga;
        }
    }
}

?>