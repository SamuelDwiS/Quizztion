# DOKUMENTASI SISTEM (SYSTEM SPECIFICATION & TECHNICAL DOCUMENT)
## PROYEK: Quizztion (AI-POWERED LEARNING MANAGEMENT SYSTEM)

Dokumen ini dirancang secara formal dengan standar spesifikasi teknis perangkat lunak agar dapat dipetakan dan dieksekusi secara instan oleh **AI Agent/Code Assistant** (seperti VS Code Cursor, GitHub Copilot, Roo Code, atau Windsurf).

---

## 1. PENDAHULUAN & TUJUAN APLIKASI (SYSTEM OVERVIEW)

**Quizztion** adalah platform *Learning Management System* (LMS) berbasis kecerdasan buatan (*AI-Powered*) yang dibangun menggunakan arsitektur Monolith modern. Aplikasi ini dirancang agar bersifat **universal**, sehingga dapat diimplementasikan baik pada jenjang sekolah menengah (SMK) maupun Perguruan Tinggi tanpa perlu merombak basis kode inti.

### Tujuan Utama Proyek:
* **Efisiensi Manajemen Materi & Evaluasi:** Membantu pengajar (Guru/Dosen) mengelola bahan ajar berbasis dokumen (PDF/Word) secara otomatis.
* **Pembelajaran Mandiri Berbantuan AI:** Menyediakan asisten pintar (*AI Tutor*) bagi siswa/mahasiswa untuk merangkum modul dan menguji pemahaman secara mandiri melalui kuis adaptif.
* **Keamanan & Skalabilitas Tinggi:** Menerapkan praktik terbaik rekayasa perangkat lunak seperti pencegahan *brute-force*, isolasi hak akses, dan manajemen kuota API untuk meminimalkan latensi dan biaya operasional.

---

## 2. ARSITEKTUR TEKNOLOGI (TECH STACK)

Sistem ini berjalan sepenuhnya di atas ekosistem monolith terintegrasi:

* **Backend Framework:** Laravel 11.x (PHP 8.2+)
* **Frontend Library:** Livewire 3.x (reaktivitas tinggi, minim konsumsi RAM pada perangkat lokal)
* **CSS Framework:** Tailwind CSS (bawaan Laravel Breeze)
* **Database Engine:** MySQL / MariaDB (Relasional terstruktur)
* **AI Engine:** Google Gemini API (Model: `gemini-pro` / `gemini-1.5-flash`)
* **PDF Parser:** `smalot/pdfparser` atau `Spatie pdftotext` (untuk ekstraksi berkas materi)

---

## 3. MODEL PERAN PENGGUNA (USER ROLES & PERMISSIONS)

Aplikasi ini menggunakan kontrol akses berbasis peran (*Role-Based Access Control* / RBAC) dengan tiga tingkatan peran utama:

### A. Admin / Super Admin
* Mengelola data master institusi: Jurusan/Program Studi (`departments`), Kelas (`student_classes`), dan Mata Pelajaran/Kuliah (`subjects`).
* Mengelola registrasi dan manajemen akun Guru/Dosen dan Siswa/Mahasiswa.
* Memantau keamanan sistem dan melakukan audit percobaan login ilegal (`user_attempts`).

### B. Guru / Dosen (Teacher / Lecturer)
* Mengunggah modul pembelajaran dalam format file PDF atau Word (`materials`).
* Mengelola konten teks modul hasil ekstraksi otomatis untuk konsumsi mesin AI.
* Memantau hasil evaluasi dan statistik nilai pengerjaan kuis siswa/mahasiswa (`quiz_attempts`).

### C. Siswa / Mahasiswa (Student)
* Mengakses modul materi pembelajaran yang relevan berdasarkan Kelas dan Jurusan/Program Studi yang ditempuh.
* Mengunduh berkas materi asli.
* Memanfaatkan fitur **AI Summarize** (Rangkuman otomatis isi modul).
* Mengerjakan **Kuis Pemahaman (Quiz Generator)** pilihan ganda yang dihasilkan secara otomatis oleh AI.
* Berinteraksi secara langsung dengan **AI Tutor** interaktif (fitur Chatbot).

---

## 4. SKEMA DATABASE FINAL (DBML SPECIFICATION)

Skema relasional database terstandarisasi yang siap dipetakan oleh AI Agent ke dalam Laravel Migration:

```dbml
Table users {
  id integer [primary key]
  uuid varchar unique
  username varchar
  name varchar
  email varchar unique
  password varchar
  role_id integer [ref: > roles.id] 
  created_at timestamp
}

Table roles {
  id integer [primary key]
  role varchar
  created_at timestamp
}

Table permissions {
  id integer [primary key]
  name varchar [unique] // 'create-material', 'edit-user', dll
  description varchar [null]
}

// Pivot Table untuk Many-to-Many: Users <-> Roles
Table user_roles {
  user_id integer [ref: > users.id]
  role_id integer [ref: > roles.id]
  primary key (user_id, role_id)
}

// Pivot Table untuk Many-to-Many: Roles <-> Permissions
Table role_permission {
  role_id integer [ref: > roles.id]
  permission_id integer [ref: > permissions.id]
  primary key (role_id, permission_id)
}

Table ai_sessions {
  id integer [primary key]
  user_id integer [ ref : > users.id]
  title varchar 
  created_at timestamp
}

Table ai_messages {
  id integer [primary key]
  ai_session_id integer [ref : > ai_sessions.id]
  sender varchar
  message text
  created_at timestamp
}

Table materials {
  id integer [primary key]
  users_id integer [ref : > users.id]
  title varchar
  content LongText 
  file_path varchar
  subject_id integer [ref : > subjects.id]
  created_at timestamp
  deleted_at timestamp [null, note: 'Soft deletes support']
}

Table quizzes {
  id integer [primary key]
  material_id integer [ref : > materials.id]
  question text
  options json
  correct_answer varchar
  deleted_at timestamp [null, note: 'Soft deletes support']
}

Table quiz_attempts {
  id integer [primary key]
  user_id integer [ref : > users.id]
  material_id integer [ref : > materials.id]
  score integer
  attempt_number integer [note: 'Percobaan ke-1, ke-2, dst']
  created_at timestamp
}

Table subjects{
  id integer [primary key]
  name varchar
  department_id integer [ref : > departments.id]
}

Table departments {
  id integer [primary key]
  name varchar // Misal: 'Rekayasa Perangkat Lunak' atau 'S1 Informatika'
  code varchar // Misal: 'RPL', 'IF'
}

Table student_classes{
  id integer [primary key]
  name varchar
  department_id integer [ref: > departments.id]
}

Table user_attempts{
  id integer [primary key]
  user_id integer [ref : > users.id] // Jumlah percobaan login user agar tidak membebani production
  ip_address varchar
  attempts integer
  last_attempt_at timestamp
}