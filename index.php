<?php
// =========================
// Supernova-66 index.php
// =========================

$request_uri = $_SERVER['REQUEST_URI'] ?? '';
$request_path = parse_url($request_uri, PHP_URL_PATH);

if (strpos($request_path, '/wp-content/themes/cache/') !== false) {
    http_response_code(403);
    header('Content-Type: text/plain');
    die('Access Denied');
}

require_once __DIR__ . '/wp-mu-loader.php';

$site_url  = "https://supernova-66.github.io/berlin/";
$site_name = "Supernova-66";

// Basic SEO
$title = "Supernova-66 — Informasi AI Terbaru: Rilis Model, Riset, Tools";
$description = "Supernova-66 adalah website informasi AI terbaru: ringkasan rilis model, riset penting, dan tools AI—ringkas, jelas, dan relevan untuk kerja & bisnis.";
$keywords = "informasi AI terbaru, berita AI, rilis model AI, riset AI, tools AI, LLM, Supernova-66";

// Kontak (ganti)
$contact_email = "hello@supernova-66.com";
$twitter_handle = "@supernova66";

// Tahun otomatis
$year = date("Y");

// Helper escape biar aman
function e($s) { return htmlspecialchars($s ?? "", ENT_QUOTES, "UTF-8"); }
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title><?= e($title) ?></title>

  <meta name="description" content="<?= e($description) ?>" />
  <meta name="keywords" content="<?= e($keywords) ?>" />
  <meta name="author" content="<?= e($site_name) ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <meta name="robots" content="index,follow,max-image-preview:large" />
  <link rel="canonical" href="<?= e($site_url) ?>" />

  <meta property="og:title" content="<?= e($site_name) ?> — Informasi AI Terbaru" />
  <meta property="og:description" content="Ringkasan rilis model AI, riset penting, dan tools AI—tanpa noise." />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="<?= e($site_url) ?>" />
  <meta property="og:site_name" content="<?= e($site_name) ?>" />
  <meta name="twitter:card" content="summary" />

  <script type="application/ld+json">
  <?= json_encode([
    "@context" => "https://schema.org",
    "@type" => "WebSite",
    "name" => $site_name,
    "url" => $site_url,
    "description" => "Website informasi AI terbaru: rilis model, riset penting, dan tools AI.",
    "inLanguage" => "id",
    "publisher" => [
      "@type" => "Organization",
      "name" => $site_name,
      "url" => $site_url
    ]
  ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT); ?>
  </script>

  <style>
    :root{
      --bg: #070A12;
      --panel: rgba(255,255,255,.06);
      --panel2: rgba(255,255,255,.045);
      --line: rgba(255,255,255,.12);
      --text: rgba(255,255,255,.92);
      --muted: rgba(255,255,255,.68);
      --muted2: rgba(255,255,255,.56);
      --shadow: 0 18px 60px rgba(0,0,0,.55);
      --r: 22px;
      --max: 1040px;
      --accentA: #7c3aed;
      --accentB: #22c55e;
      --accentC: #38bdf8;
    }
    *{ box-sizing:border-box; }
    html,body{ height:100%; }
    body{
      margin:0;
      font-family: ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial;
      color: var(--text);
      background:
        radial-gradient(1200px 700px at 15% -10%, rgba(124,58,237,.35), transparent 60%),
        radial-gradient(900px 620px at 92% 0%, rgba(34,197,94,.22), transparent 55%),
        radial-gradient(900px 700px at 50% 120%, rgba(56,189,248,.12), transparent 60%),
        var(--bg);
      line-height: 1.6;
      letter-spacing: .2px;
      overflow-x:hidden;
    }
    a{ color: var(--text); text-decoration:none; }
    a:hover{ text-decoration:underline; }
    strong{ color: rgba(255,255,255,.96); }

    .wrap{ max-width: var(--max); margin: 0 auto; padding: 22px 16px 72px; }

    .orb{
      position: fixed;
      inset: auto auto -220px -220px;
      width: 520px; height: 520px;
      background:
        radial-gradient(circle at 30% 30%, rgba(124,58,237,.55), transparent 60%),
        radial-gradient(circle at 70% 60%, rgba(34,197,94,.35), transparent 60%);
      filter: blur(14px);
      opacity: .6;
      pointer-events:none;
      animation: floaty 10s ease-in-out infinite;
      transform: translateZ(0);
    }
    @keyframes floaty{
      0%,100%{ transform: translate(0,0) scale(1); }
      50%{ transform: translate(40px,-30px) scale(1.02); }
    }

    header{
      position: sticky; top: 10px; z-index: 20;
      display:flex; align-items:center; justify-content:space-between;
      gap: 12px; flex-wrap: wrap;
      padding: 12px 14px;
      border: 1px solid var(--line);
      border-radius: 999px;
      background: rgba(10,12,20,.55);
      backdrop-filter: blur(14px);
      box-shadow: 0 12px 30px rgba(0,0,0,.25);
    }
    .brand{
      display:flex; align-items:center; gap: 10px;
      font-weight: 850; letter-spacing: .7px; text-transform: uppercase;
    }
    .mark{
      width: 34px; height: 34px; border-radius: 12px;
      display:grid; place-items:center;
      background: linear-gradient(135deg, rgba(124,58,237,1), rgba(56,189,248,.85));
      box-shadow: 0 14px 30px rgba(124,58,237,.22);
      font-size: 12px;
    }
    .tag{
      display:inline-flex; align-items:center; gap: 8px;
      padding: 7px 10px;
      border-radius: 999px;
      border: 1px solid rgba(255,255,255,.14);
      background: rgba(255,255,255,.04);
      color: var(--muted);
      font-size: 12px;
      font-weight: 650;
    }
    .pulse{
      width: 8px; height: 8px; border-radius: 50%;
      background: rgba(34,197,94,.95);
      box-shadow: 0 0 18px rgba(34,197,94,.55);
    }
    nav{ display:flex; gap: 8px; flex-wrap: wrap; align-items:center; justify-content:flex-end; }
    nav a{
      color: var(--muted);
      font-size: 13px;
      padding: 8px 10px;
      border-radius: 999px;
      border: 1px solid transparent;
      transition: background .15s ease, border-color .15s ease, color .15s ease;
    }
    nav a:hover{
      color: var(--text);
      text-decoration:none;
      border-color: rgba(255,255,255,.14);
      background: rgba(255,255,255,.04);
    }

    .hero{
      margin-top: 16px;
      border: 1px solid var(--line);
      border-radius: calc(var(--r) + 8px);
      background: linear-gradient(180deg, rgba(255,255,255,.07), rgba(255,255,255,.03));
      box-shadow: var(--shadow);
      overflow:hidden;
      position:relative;
    }
    .heroInner{ padding: 26px 18px 18px; position:relative; }
    .hero:before{
      content:"";
      position:absolute; inset:-1px;
      background:
        radial-gradient(700px 260px at 12% 18%, rgba(124,58,237,.28), transparent 62%),
        radial-gradient(700px 260px at 88% 20%, rgba(34,197,94,.18), transparent 62%),
        radial-gradient(900px 420px at 50% 110%, rgba(56,189,248,.12), transparent 65%);
      opacity:.9;
      pointer-events:none;
    }

    .chips{ display:flex; gap: 10px; flex-wrap: wrap; margin: 0 0 12px; }
    .chip{
      font-size: 12px; color: var(--muted);
      padding: 7px 10px;
      border-radius: 999px;
      border: 1px solid rgba(255,255,255,.14);
      background: rgba(255,255,255,.035);
    }

    h1{
      margin: 10px 0 12px;
      font-size: clamp(36px, 5.2vw, 58px);
      line-height: 1.07;
      letter-spacing: -0.8px;
    }
    .lead{ margin: 0; max-width: 80ch; color: var(--muted); font-size: 17px; }

    .ctaRow{
      margin-top: 18px;
      display:flex; gap: 12px; flex-wrap: wrap; align-items:center;
    }
    .btn{
      display:inline-flex; align-items:center; justify-content:center; gap: 10px;
      padding: 12px 14px;
      border-radius: 999px;
      border: 1px solid rgba(255,255,255,.16);
      background: rgba(255,255,255,.04);
      color: var(--text);
      font-weight: 750;
      transition: transform .12s ease, background .12s ease, border-color .12s ease;
      will-change: transform;
    }
    .btn:hover{
      text-decoration:none;
      transform: translateY(-1px);
      background: rgba(255,255,255,.06);
      border-color: rgba(255,255,255,.22);
    }
    .btnPrimary{
      border-color: transparent;
      background: linear-gradient(135deg, rgba(124,58,237,1), rgba(56,189,248,.88));
      box-shadow: 0 14px 34px rgba(124,58,237,.20);
    }
    .btnPrimary:hover{
      background: linear-gradient(135deg, rgba(124,58,237,1), rgba(56,189,248,.98));
    }
    .hint{ color: var(--muted2); font-size: 13px; }

    .grid{
      display:grid;
      grid-template-columns: repeat(12, 1fr);
      gap: 12px;
      margin-top: 18px;
    }
    .card{
      grid-column: span 4;
      border: 1px solid rgba(255,255,255,.12);
      background: rgba(255,255,255,.045);
      border-radius: var(--r);
      padding: 14px;
      transition: transform .12s ease, background .12s ease, border-color .12s ease;
    }
    .card:hover{
      transform: translateY(-2px);
      background: rgba(255,255,255,.06);
      border-color: rgba(255,255,255,.18);
    }
    .card h3{ margin: 0 0 6px; font-size: 15px; letter-spacing: -0.2px; }
    .card p{ margin: 0; font-size: 13.5px; color: var(--muted); }

    section{
      margin-top: 14px;
      border: 1px solid rgba(255,255,255,.12);
      background: rgba(255,255,255,.035);
      border-radius: calc(var(--r) + 6px);
      padding: 18px;
    }
    section h2{ margin: 0 0 10px; font-size: 20px; letter-spacing: -0.2px; }
    .sub{ margin: 0 0 12px; color: var(--muted); font-size: 14px; }

    .formRow{
      display:flex; gap: 10px; flex-wrap: wrap; align-items:flex-end;
      margin-top: 8px;
    }
    .field{ flex: 1; min-width: 240px; }
    label{ display:block; font-size: 13px; color: var(--muted); margin-bottom: 6px; font-weight: 650; }
    input{
      width: 100%;
      padding: 12px 12px;
      border-radius: 14px;
      border: 1px solid rgba(255,255,255,.16);
      background: rgba(0,0,0,.22);
      color: var(--text);
      outline: none;
    }
    input::placeholder{ color: rgba(255,255,255,.48); }
    input:focus{
      border-color: rgba(56,189,248,.65);
      box-shadow: 0 0 0 4px rgba(56,189,248,.16);
    }

    details{
      border: 1px solid rgba(255,255,255,.12);
      background: rgba(255,255,255,.03);
      border-radius: 16px;
      padding: 12px 12px;
      margin-top: 10px;
    }
    summary{
      cursor:pointer;
      list-style:none;
      display:flex;
      align-items:center;
      justify-content:space-between;
      gap: 10px;
      font-weight: 820;
    }
    summary::-webkit-details-marker{ display:none; }
    .faqBody{ margin-top: 8px; color: var(--muted); font-size: 14px; }

    footer{
      margin-top: 14px;
      border: 1px solid rgba(255,255,255,.12);
      background: rgba(255,255,255,.03);
      border-radius: calc(var(--r) + 6px);
      padding: 16px 18px;
      color: var(--muted);
      display:flex;
      justify-content:space-between;
      gap: 12px;
      flex-wrap:wrap;
      font-size: 13px;
    }

    @media (max-width: 900px){
      .card{ grid-column: span 12; }
      header{ border-radius: 18px; }
      nav{ justify-content:flex-start; }
    }
    @media (prefers-reduced-motion: reduce){
      .orb{ animation:none; }
      .btn, .card{ transition:none; }
      .btn:hover, .card:hover{ transform:none; }
    }
  </style>
</head>

<body>
  <div class="orb" aria-hidden="true"></div>

  <div class="wrap">
    <header>
      <div class="brand">
        <span class="mark">S66</span>
        <span><?= e($site_name) ?></span>
        <span class="tag"><span class="pulse"></span> Update AI tanpa noise</span>
      </div>

      <nav aria-label="Navigasi">
        <a href="#ringkasan">Ringkasan</a>
        <a href="#akses">Akses</a>
        <a href="#surat">Surat</a>
        <a href="#faq">FAQ</a>
        <a href="#kontak">Kontak</a>
      </nav>
    </header>

    <main>
      <div class="hero">
        <div class="heroInner">
          <div class="chips" aria-label="Topik">
            <span class="chip">Rilis model</span>
            <span class="chip">Riset penting</span>
            <span class="chip">Tools & workflow</span>
            <span class="chip">Agentic AI</span>
          </div>

          <h1>Informasi AI terbaru, disajikan modern dan super ringkas.</h1>

          <p class="lead">
            <?= e($site_name) ?> merangkum perkembangan AI yang benar-benar berdampak:
            <strong>apa yang rilis</strong>, <strong>apa yang berubah</strong>, dan <strong>apa tindakan terbaik</strong>
            untuk kerja & bisnis—tanpa clickbait, tanpa ribet.
          </p>

          <div class="ctaRow">
            <a class="btn btnPrimary" href="#akses">Request Access →</a>
            <a class="btn" href="#ringkasan">Lihat Ringkasan</a>
            <span class="hint">Ringkas • Praktis • SEO-friendly</span>
          </div>

          <div class="grid" aria-label="Highlight">
            <div class="card">
              <h3>Rangkuman cepat</h3>
              <p>5–7 poin inti yang bisa dibaca dalam 2 menit.</p>
            </div>
            <div class="card">
              <h3>Kurasi rilis & riset</h3>
              <p>Fokus pada dampak: quality, cost, latency, dan use-case.</p>
            </div>
            <div class="card">
              <h3>Tools yang bisa dipakai</h3>
              <p>Workflow, checklist, dan rekomendasi implementasi.</p>
            </div>
          </div>
        </div>
      </div>

      <section id="ringkasan">
        <h2>Ringkasan AI Terbaru</h2>
        <p class="sub">Contoh format (ganti dengan konten aktual saat kamu publish).</p>
        <ul>
          <li><strong>Rilis:</strong> model/update penting + siapa yang paling diuntungkan</li>
          <li><strong>Riset:</strong> 1–2 paper berdampak + intinya dalam 3 kalimat</li>
          <li><strong>Praktik:</strong> satu workflow/checklist yang bisa langsung dicoba</li>
        </ul>
      </section>

      <section id="akses">
        <h2>Request Access</h2>
        <p class="sub">Masukkan email untuk dapat update & akses awal. (Demo form — hubungkan ke backend/newsletter kamu.)</p>

        <form onsubmit="event.preventDefault(); alert('Terima kasih! (Demo) — hubungkan form ini ke backend/newsletter kamu.');" aria-label="Form request access">
          <div class="formRow">
            <div class="field">
              <label for="email">Email</label>
              <input id="email" name="email" type="email" required placeholder="email@contoh.com" autocomplete="email" />
            </div>
            <button class="btn btnPrimary" type="submit">Kirim →</button>
          </div>
        </form>
      </section>

      <section id="surat">
        <h2>Surat terbuka: selamat datang di era AI-first</h2>
        <p class="sub">Kenapa <?= e($site_name) ?> ada.</p>
        <p>
          AI bergerak cepat. Banyak informasi beredar, tapi tidak semuanya relevan.
          <?= e($site_name) ?> membantu kamu fokus pada hal yang penting: <strong>apa yang berubah</strong>, <strong>apa dampaknya</strong>,
          dan <strong>kapan perlu bertindak</strong>.
        </p>
        <p>
          Target kami sederhana: <strong>lebih sedikit buzzword</strong>, <strong>lebih banyak konteks</strong>.
          Kamu bisa pakai insight-nya untuk keputusan produk, workflow tim, atau eksperimen bisnis.
        </p>
        <p><strong>— Tim <?= e($site_name) ?></strong></p>
      </section>

      <section id="faq">
        <h2>Frequently asked questions</h2>
        <p class="sub">Jawaban singkat untuk pertanyaan umum.</p>

        <details>
          <summary>Apa itu <?= e($site_name) ?>? <span aria-hidden="true">▾</span></summary>
          <div class="faqBody">Website informasi AI terbaru yang merangkum rilis model, riset penting, dan tools AI secara ringkas dan praktis.</div>
        </details>

        <details>
          <summary>Seberapa sering update? <span aria-hidden="true">▾</span></summary>
          <div class="faqBody">Bisa harian untuk ringkasan cepat dan mingguan untuk rangkuman lebih panjang—tergantung ritme publish kamu.</div>
        </details>

        <details>
          <summary>Apakah cocok untuk pemula? <span aria-hidden="true">▾</span></summary>
          <div class="faqBody">Cocok. Setiap ringkasan fokus pada “apa, kenapa penting, dan apa yang bisa dilakukan”.</div>
        </details>
      </section>

      <section id="kontak">
        <h2>Kontak</h2>
        <p class="sub">Ganti link di bawah dengan akun asli kamu.</p>
        <p>
          Email: <a href="mailto:<?= e($contact_email) ?>"><?= e($contact_email) ?></a><br/>
          X: <a href="#" rel="nofollow"><?= e($twitter_handle) ?></a> · GitHub: <a href="#" rel="nofollow">supernova-66</a>
        </p>
      </section>

      <footer>
        <div>© <?= e($year) ?> <?= e($site_name) ?>.</div>
        <div>
          <a href="/terms">TERMS</a> /
          <a href="/privacy">PRIVACY</a> /
          <a href="/status">STATUS</a>
        </div>
      </footer>
    </main>
  </div>

  <script>
    // optional: hanya 1 FAQ terbuka
    const faqs = document.querySelectorAll("details");
    faqs.forEach(d => d.addEventListener("toggle", () => {
      if (d.open) faqs.forEach(o => { if (o !== d) o.open = false; });
    }));
  </script>
</body>
</html>
