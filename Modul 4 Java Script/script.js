// Data Produk (minimal 3)
const produk = [
  {
    nama: "Laptop Gaming X1",
    harga: 12000000,
    gambar: [
      "https://pisces.bbystatic.com/image2/BestBuy_US/images/products/6319/6319980_rd.jpg",
      "https://pisces.bbystatic.com/image2/BestBuy_US/images/products/6574/6574954cv15d.jpg"
    ]
  },
  {
    nama: "SmartTV",
    harga: 9500000,
    gambar: [
      "https://i5.walmartimages.com/asr/4c0a13e0-8c33-4341-b6e7-2d1c8c063bc3.310d1226a143ce3b1f6f7cc236deb222.jpeg",
      "https://i5.walmartimages.com/asr/2aa59abd-3809-4cf5-9ebf-66365c38cb2e.1b3c37d9a592da238fd30c2100356ad7.jpeg"
    ]
  },
  {
    nama: "Smartphone",
    harga: 8000000,
    gambar: [
      "https://pngimg.com/uploads/iphone_12/iphone_12_PNG23.png",
      "https://cdn.macstories.net/purple-phones-1618958972858.png"
    ]
  }
];

// Variabel untuk track produk & gambar aktif
let indexProdukAktif = 0;
let indexGambarAktif = 0;

// DOM Element
const waktuEl = document.getElementById("waktu");
const gambarEl = document.getElementById("gambar-produk");
const namaEl = document.getElementById("nama-produk");
const hargaEl = document.getElementById("harga-produk");
const daftarProdukEl = document.getElementById("daftar-produk");
const formEl = document.getElementById("form-pesan");
const outputEl = document.getElementById("output-pesanan");

// Tampilkan waktu real-time
setInterval(() => {
  const now = new Date();
  waktuEl.textContent = now.toLocaleString("id-ID");
}, 1000);

// Tampilkan daftar produk
produk.forEach((item, index) => {
  const li = document.createElement("li");
  li.className = "list-group-item list-group-item-action";
  li.textContent = item.nama;
  li.addEventListener("click", () => {
    indexProdukAktif = index;
    indexGambarAktif = 0;
    tampilkanProduk();
  });
  daftarProdukEl.appendChild(li);
});

// Tampilkan produk di slideshow
function tampilkanProduk() {
  const p = produk[indexProdukAktif];
  gambarEl.src = p.gambar[indexGambarAktif];
  namaEl.textContent = p.nama;
  hargaEl.textContent = `Rp ${p.harga.toLocaleString("id-ID")}`;
}
tampilkanProduk();

// Tombol Next & Previous
document.getElementById("nextBtn").addEventListener("click", () => {
  indexGambarAktif = (indexGambarAktif + 1) % produk[indexProdukAktif].gambar.length;
  tampilkanProduk();
});

document.getElementById("prevBtn").addEventListener("click", () => {
  indexGambarAktif = (indexGambarAktif - 1 + produk[indexProdukAktif].gambar.length) % produk[indexProdukAktif].gambar.length;
  tampilkanProduk();
});

// Proses Form Pemesanan
formEl.addEventListener("submit", (e) => {
  e.preventDefault();

  const namaPemesan = document.getElementById("namaPemesan").value.trim();
  const jumlah = parseInt(document.getElementById("jumlah").value);
  const kodePromo = document.getElementById("kodePromo").value.trim().toUpperCase();

  if (isNaN(jumlah) || jumlah < 1) {
    alert("Jumlah harus lebih dari 0!");
    return;
  }

  const produkDipilih = produk[indexProdukAktif];
  const subtotal = produkDipilih.harga * jumlah;
  let potongan = 0;

  if (kodePromo === "DISKON10") {
    potongan = subtotal * 0.1;
  }

  const totalAkhir = subtotal - potongan;
  const orderId = `INV-${Math.floor(Math.random() * 100000).toString().padStart(5, "0")}`;

  outputEl.innerHTML = `
    <h5>Struk Pemesanan</h5>
    <p><strong>Order ID:</strong> ${orderId}</p>
    <p><strong>Nama Pemesan:</strong> ${namaPemesan}</p>
    <p><strong>Produk:</strong> ${produkDipilih.nama}</p>
    <p><strong>Jumlah:</strong> ${jumlah}</p>
    <p><strong>Subtotal:</strong> Rp ${subtotal.toLocaleString("id-ID")}</p>
    <p><strong>Potongan:</strong> Rp ${potongan.toLocaleString("id-ID")}</p>
    <p><strong>Total Akhir:</strong> <span class="text-success fw-bold">Rp ${totalAkhir.toLocaleString("id-ID")}</span></p>
  `;

  formEl.reset();
});
