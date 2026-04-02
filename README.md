<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

<h1 align="center"><span style="color:#7b1228;">University of the Philippines Cebu</span></h1>
<h3 align="center"><span style="color:#7b1228;">Student Information System</span></h3>

---

<p align="center">
The <strong>UP Cebu Student Information System</strong> is a web-based application developed for the University of the Philippines Cebu Registrar's Office. It provides a streamlined, multi-step process for students to submit and update their personal and academic information digitally, reducing paperwork and improving data accuracy across university records.
</p>

---

<h2 align="center"><span style="color:#7b1228;">📋 Overview</span></h2>

<p align="center">
This system was built as part of an internship project at the UP Cebu Information Technology Center. It aims to modernize the student data collection process by replacing manual forms with a secure, user-friendly web application that validates, stores, and manages student records efficiently.
</p>

---

<h2 align="center"><span style="color:#7b1228;">✨ Features</span></h2>

<p align="center">
📝 <strong>Multi-step Registration Form</strong> — Guided form flow covering personal info, address, academic background, and document uploads <br>
🗺️ <strong>Philippine Address Selector</strong> — Cascading dropdowns for Region → Province → City/Municipality → Barangay using PSGC data <br>
📁 <strong>Document Upload</strong> — Secure file upload with validation for required student documents <br>
💾 <strong>Data Persistence</strong> — Session-based data retention across form steps, saved to both MySQL database and JSON backup <br>
📊 <strong>Progress Indicator</strong> — Visual step tracker so students always know where they are in the process <br>
📱 <strong>Responsive UI</strong> — Mobile-friendly layout built with Tailwind CSS <br>
</p>

---

<h2 align="center"><span style="color:#7b1228;">🛠️ Tech Stack</span></h2>

<div align="center">

| Layer | Technology |
|---|---|
| Backend | Laravel 10 (PHP) |
| Frontend | Blade Templates + Tailwind CSS |
| Database | MySQL |
| Address Data | `rootscratch/psgc` package |
| File Storage | Laravel Storage Facade |
| Session Handling | Laravel Session |

</div>

---

<h2 align="center"><span style="color:#7b1228;">⚙️ Installation</span></h2>

<p align="center">Follow the steps below to set up the project locally on your machine.</p>

<p align="center"><strong>1. Clone the repository</strong></p>

```bash
git clone https://github.com/your-username/up-cebu-student-info.git
cd up-cebu-student-info
```

<p align="center"><strong>2. Install dependencies</strong></p>

```bash
composer install
npm install && npm run dev
```

<p align="center"><strong>3. Set up environment</strong></p>

```bash
cp .env.example .env
php artisan key:generate
```

<p align="center"><strong>4. Configure your <code>.env</code> file</strong></p>

```env
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

<p align="center"><strong>5. Run migrations</strong></p>

```bash
php artisan migrate
```

<p align="center"><strong>6. Serve the application</strong></p>

```bash
php artisan serve
```

---

<h2 align="center"><span style="color:#7b1228;">📁 Project Structure</span></h2>

```
├── app/
│   ├── Http/Controllers/     # Form step controllers
│   └── Models/               # Student Eloquent model
├── database/
│   └── migrations/           # Database schema
├── resources/
│   └── views/                # Blade templates (multi-step form)
├── routes/
│   └── web.php               # Application routes
├── storage/
│   └── app/public/           # Uploaded student documents
└── public/
```

---

<h2 align="center"><span style="color:#7b1228;">🗃️ Database</span></h2>

<p align="center">
The system uses a MySQL database to persist student records. Upon successful form completion, data is written to the <code>students</code> table via Eloquent ORM. A JSON file backup is also generated per submission for redundancy.
</p>

---

<h2 align="center"><span style="color:#7b1228;">📌 Usage</span></h2>

<p align="center">
Students access the form through the university portal. The form is divided into clearly labeled steps — each step is validated before proceeding to the next. Uploaded documents are securely stored on the server. Upon completion, a summary screen confirms successful submission.
</p>

---

<h2 align="center"><span style="color:#7b1228;">👨‍💻 Developer</span></h2>

<p align="center">
Developed by <strong>Mark Ian Margas</strong>, Intern at the UP Cebu Information Technology Center, in partial fulfillment of internship requirements at Talisay City College.
</p>

<div align="center">

| | |
|---|---|
| **School** | Talisay City College |
| **Internship Host** | UP Cebu — Information Technology Center |
| **Office Served** | Office of the University Registrar |

</div>

---

<h2 align="center"><span style="color:#7b1228;">📄 License</span></h2>

<p align="center">
This project was developed for internal use by the University of the Philippines Cebu. All rights reserved. Unauthorized distribution or reproduction of this system is prohibited without prior written consent from the UP Cebu IT Center.
</p>

---

<p align="center">
  <em>University of the Philippines Cebu &nbsp;·&nbsp; Information Technology Center &nbsp;·&nbsp; Registrar's Office</em>
</p>
