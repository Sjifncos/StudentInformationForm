<!-- README.md for GitHub -->
<!-- Custom style: paragraphs centered & justified, h2 left-aligned -->
<div style="text-align: center;">
  <p style="text-align: justify; display: inline-block; max-width: 800px; margin: 0 auto;">
    <a href="https://laravel.com" target="_blank">
      <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
    </a>
  </p>
</div>

<div style="text-align: center;">
  <p style="text-align: justify; display: inline-block; max-width: 800px; margin: 0 auto;">
    <a href="https://github.com/laravel/framework/actions">
      <img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status">
    </a>
    <a href="https://packagist.org/packages/laravel/framework">
      <img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads">
    </a>
    <a href="https://packagist.org/packages/laravel/framework">
      <img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version">
    </a>
    <a href="https://packagist.org/packages/laravel/framework">
      <img src="https://img.shields.io/packagist/l/laravel/framework" alt="License">
    </a>
  </p>
</div>

<h1 align="center"><span style="color:#7b1228;">University of the Philippines Cebu</span></h1>
<h3 align="center"><span style="color:#7b1228;">Student Information System</span></h3>

---

<div style="text-align: center;">
  <p style="text-align: justify; display: inline-block; max-width: 800px; margin: 0 auto;">
    The <strong>UP Cebu Student Information System</strong> is a web-based application developed for the University of the Philippines Cebu Registrar's Office. It provides a streamlined, multi-step process for students to submit and update their personal and academic information digitally, reducing paperwork and improving data accuracy across university records.
  </p>
</div>

---

<h2><span style="color:#7b1228;">📋 Overview</span></h2>

<div style="text-align: center;">
  <p style="text-align: justify; display: inline-block; max-width: 800px; margin: 0 auto;">
    This system was built as part of an internship project at the UP Cebu Information Technology Center. It aims to modernize the student data collection process by replacing manual forms with a secure, user-friendly web application that validates, stores, and manages student records efficiently.
  </p>
</div>

---

<h2><span style="color:#7b1228;">✨ Features</span></h2>

<div style="text-align: center;">
  <p style="text-align: justify; display: inline-block; max-width: 800px; margin: 0 auto;">
    📝 <strong>Multi-step Registration Form</strong> — Guided form flow covering personal info, address, academic background, and document uploads <br>
    🗺️ <strong>Philippine Address Selector</strong> — Cascading dropdowns for Region → Province → City/Municipality → Barangay using PSGC data <br>
    📁 <strong>Document Upload</strong> — Secure file upload with validation for required student documents <br>
    💾 <strong>Data Persistence</strong> — Session-based data retention across form steps, saved to both MySQL database and JSON backup <br>
    📊 <strong>Progress Indicator</strong> — Visual step tracker so students always know where they are in the process <br>
    📱 <strong>Responsive UI</strong> — Mobile-friendly layout built with Tailwind CSS <br>
  </p>
</div>

---

<h2><span style="color:#7b1228;">🛠️ Tech Stack</span></h2>

<div align="center">

| Layer | Technology |
|-------|------------|
| Backend | Laravel 10 (PHP) |
| Frontend | Blade Templates + Tailwind CSS |
| Database | MySQL |
| Address Data | `rootscratch/psgc` package |
| File Storage | Laravel Storage Facade |
| Session Handling | Laravel Session |

</div>

---

<h2><span style="color:#7b1228;">⚙️ Installation</span></h2>

<div style="text-align: center;">
  <p style="text-align: justify; display: inline-block; max-width: 800px; margin: 0 auto;">
    Follow the steps below to set up the project locally on your machine.
  </p>
</div>

<div style="text-align: center;">
  <p style="text-align: justify; display: inline-block; max-width: 800px; margin: 0 auto;">
    <strong>1. Clone the repository</strong>
  </p>
</div>

```bash
git clone https://github.com/your-username/up-cebu-student-info.git
cd up-cebu-student-info
