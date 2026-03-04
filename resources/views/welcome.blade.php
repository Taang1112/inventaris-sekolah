<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Sistem Peminjaman Inventaris</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Segoe UI', sans-serif;
}

body {
    overflow-x: hidden;
    background: linear-gradient(135deg, #0f172a, #1e293b);
    color: white;
}

canvas {
    position: fixed;
    top: 0;
    left: 0;
    z-index: 0;
}

.navbar {
    position: relative;
    z-index: 10;
    padding: 20px 60px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.navbar a {
    color: white;
    text-decoration: none;
    margin-left: 20px;
    opacity: 0.8;
}

.navbar a:hover {
    opacity: 1;
}

.hero {
    position: relative;
    z-index: 10;
    text-align: center;
    padding: 150px 20px 120px;
}

.hero h1 {
    font-size: 52px;
    margin-bottom: 20px;
}

.hero p {
    opacity: 0.8;
    max-width: 600px;
    margin: 0 auto 30px;
}

.btn {
    padding: 12px 32px;
    border-radius: 30px;
    border: none;
    background: #6366f1;
    color: white;
    font-weight: 600;
    cursor: pointer;
    transition: 0.3s;
}

.btn:hover {
    background: #4f46e5;
    transform: translateY(-3px);
}

.features {
    position: relative;
    z-index: 10;
    padding: 100px 40px;
    text-align: center;
    background: rgba(255,255,255,0.03);
}

.features h2 {
    margin-bottom: 50px;
    font-size: 32px;
}

.feature-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 30px;
    max-width: 1000px;
    margin: auto;
}

.feature-card {
    padding: 30px;
    border-radius: 15px;
    background: rgba(255,255,255,0.05);
    backdrop-filter: blur(10px);
    transition: 0.3s;
}

.feature-card:hover {
    transform: translateY(-5px);
}

.footer {
    position: relative;
    z-index: 10;
    text-align: center;
    padding: 50px;
    font-size: 14px;
    opacity: 0.6;
}

/* Scroll Reveal */
.reveal {
    opacity: 0;
    transform: translateY(60px);
    transition: all 1s ease;
}

.reveal.active {
    opacity: 1;
    transform: translateY(0);
}
</style>
</head>
<body>

<div class="navbar">
    <h3>Inventaris Sekolah</h3>
    <div>
        <a href="/">Home</a>
        <a href="/login">Login</a>
    </div>
</div>

<div class="hero reveal">
    <h1>Sistem Peminjaman Inventaris</h1>
    <p>
        Platform digital untuk mengelola data barang, guru, kelas,
        serta proses peminjaman dan pengembalian inventaris sekolah secara efisien.
    </p>
    <button class="btn" onclick="window.location.href='/login'">
        Masuk Sistem
    </button>
</div>

<div class="features reveal">
    <h2>Fitur Utama</h2>
    <div class="feature-grid">
        <div class="feature-card">
            <h4>Manajemen Barang</h4>
            <p>Mengelola inventaris dengan data yang rapi dan terstruktur.</p>
        </div>
        <div class="feature-card">
            <h4>Peminjaman</h4>
            <p>Pencatatan transaksi otomatis dan terdokumentasi.</p>
        </div>
        <div class="feature-card">
            <h4>Pengembalian</h4>
            <p>Monitoring status barang agar tidak hilang misterius.</p>
        </div>
    </div>
</div>

<div class="footer">
    © 2026 Sistem Inventaris Sekolah
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>

<script>
const scene = new THREE.Scene();
const camera = new THREE.PerspectiveCamera(
    75,
    window.innerWidth / window.innerHeight,
    0.1,
    1000
);

const renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true });
renderer.setSize(window.innerWidth, window.innerHeight);
renderer.setPixelRatio(window.devicePixelRatio);
document.body.appendChild(renderer.domElement);

camera.position.z = 12;

const light = new THREE.PointLight(0x6366f1, 2, 100);
light.position.set(10, 10, 10);
scene.add(light);

const objects = [];
const geometry = new THREE.IcosahedronGeometry(1.5, 1);

for (let i = 0; i < 12; i++) {
    const material = new THREE.MeshStandardMaterial({
        color: 0x6366f1,
        wireframe: true,
        transparent: true,
        opacity: 0.2
    });

    const mesh = new THREE.Mesh(geometry, material);

    mesh.position.x = (Math.random() - 0.5) * 25;
    mesh.position.y = (Math.random() - 0.5) * 20;
    mesh.position.z = (Math.random() - 0.5) * 10;

    scene.add(mesh);
    objects.push(mesh);
}

let scrollY = 0;

window.addEventListener("scroll", () => {
    scrollY = window.scrollY;
    revealOnScroll();
});

const reveals = document.querySelectorAll(".reveal");

function revealOnScroll() {
    reveals.forEach(el => {
        const windowHeight = window.innerHeight;
        const elementTop = el.getBoundingClientRect().top;

        if (elementTop < windowHeight - 100) {
            el.classList.add("active");
        }
    });
}

revealOnScroll();

function animate() {
    requestAnimationFrame(animate);

    objects.forEach((obj, index) => {
        obj.rotation.x += 0.001 + index * 0.0001;
        obj.rotation.y += 0.002 + index * 0.0001;

        obj.position.y = Math.sin(scrollY * 0.001 + index) * 5;
    });

    camera.position.z = 12 + scrollY * 0.01;

    renderer.render(scene, camera);
}

animate();

window.addEventListener('resize', () => {
    camera.aspect = window.innerWidth / window.innerHeight;
    camera.updateProjectionMatrix();
    renderer.setSize(window.innerWidth, window.innerHeight);
});
</script>

</body>
</html>