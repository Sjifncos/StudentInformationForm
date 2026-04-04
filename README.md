<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

<h1 align="center"><span style="color:#7b1228;">University of the Philippines Cebu</span></h1>
<h3 align="center"><span style="color:#7b1228;"><strong>Student Information Form</strong></span></h3>
<h3>DEVELOPER:</h3>
<h4>Mark Ian Margas (Front End Developer)</h4>

---

<div style="text-align: center;">
  <p style="text-align: justify; display: inline-block; max-width: 800px; margin: 0 auto;">
    The <strong>Student Information System</strong> is a web-based application developed for the Office of the University Registrar (OUR). It provides a streamlined, multi-step process for students to submit and update their personal and academic information digitally, reducing paperwork and improving data accuracy across university records.
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
    📝 <strong>Multi-step Registration Form</strong>: Guided form flow covering personal info, address, academic background, and document uploads <br>
    🗺️ <strong>Philippine Address Selector</strong>: Cascading dropdowns for <strong> Region, Province, City/Municipality, Barangay (RPCB)</strong> using PSGC data <br>
    📁 <strong>Document Upload</strong>: Secure file upload with validation for required student documents <br>
    📊 <strong>Progress Indicator</strong>: Visual step tracker so students always know where they are in the process <br>
    📱 <strong>Responsive UI</strong>: Mobile-friendly layout built with Tailwind CSS <br>
  </p>
</div>

---

<h2><span style="color:#7b1228;">🛠️ Tech Stack</span></h2>

<div align="center">

| Layer | Technology |
|-------|------------|
| Frontend | Blade Templates + Tailwind CSS + JavaScript |
| Database | MySQL |
| Address Data | `rootscratch/psgc` package |
| File Storage | JSON + Public/Storage/Form-submissions |
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
```
<div style="text-align: center;">
  <p style="text-align: justify; display: inline-block; max-width: 800px; margin: 0 auto;">
    <strong>2.  Install dependencies</strong>
  </p>
</div>

```bash
composer install
npm install
npm run dev
```
<div style="text-align: center;">
  <p style="text-align: justify; display: inline-block; max-width: 800px; margin: 0 auto;">
    <strong>3.  Setup environment</strong>
  </p>
</div>

```bash
cp .env.example .env
php artisan key:generate
```
<div style="text-align: center;">
  <p style="text-align: justify; display: inline-block; max-width: 800px; margin: 0 auto;">
    <strong>4.  Configure .env</strong>
  </p>
</div>

```env
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```
<div style="text-align: center;">
  <p style="text-align: justify; display: inline-block; max-width: 800px; margin: 0 auto;">
    <strong>5.  Run migrations</strong>
  </p>
</div>

```bash
php artisan migrate
```
<div style="text-align: center;">
  <p style="text-align: justify; display: inline-block; max-width: 800px; margin: 0 auto;">
    <strong>6.  Run the server</strong>
  </p>
</div>

```bash
php artisan serve
```





