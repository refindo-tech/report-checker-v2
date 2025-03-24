<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

<div align="center">

[![GitHub WidgetBox](https://github-widgetbox.vercel.app/api/profile?username=rizkyapri&data=followers,repositories,stars,commits&theme=viridescent)](https://github.com/rizkyapri)

---

[![GitHub WidgetBox](https://github-widgetbox.vercel.app/api/profile?username=rhekhar&data=followers,repositories,stars,commits&theme=viridescent)](https://github.com/rhekhar)

</div>
<a id="readme-top"></a>
<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li><a href="#about-the-project">About The Project</a></li>
    <li><a href="#flat-form">Flat Form</a></li>
    <li><a href="#application-development-plan">Application Development Plan</a></li>
    <li><a href="#installation">Installation</a></li>
    <li><a href="#roadmap-project">Roadmap Project</a></li>
    <li><a href="#example">Example</a></li>
    <li><a href="#license">License</a></li>
  </ol>
</details>

<!-- ABOUT THE PROJECT -->

## About The Project

This application is used for reporting student competency achievements in the Merdeka Belajar Kampus Merdeka (MBKM) program at various universities.
It utilizes the <a href="https://wrapbootstrap.com/user/MyOrange" target="_blank"> SmartAdmin </a> template.
The main purpose of this application is to simplify the reporting and assessment process of learning activities within the MBKM program across different universities.

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- FLAT FORM -->

## Flat Form

-   <a href="https://laravel.com/docs/10.x" target="_blank">Laravel v10.42.0</a>
-   <a href="https://www.php.net/releases/8_2_3.php" target="_blank">PHP v8.2.3</a>
-   Template <a href="https://wrapbootstrap.com/user/MyOrange" target="_blank">SmartAdmin</a>
-   <a href="https://sweetalert2.github.io/#usage" target="_blank"> Sweetalert2 </a>
-   <a href="https://github.com/CodeSeven/toastr" target="_blank"> Toastr </a>

<p align="right">(<a href="#readme-top">back to top</a>)</p>

## Application Development Plan

The following is the development plan, the points of which will continue to be updated.

# Project Task Overview

## Table of Contents

-   [User Management](#user-management)
-   [MBKM File Submission](#mbkm-file-submission)
-   [Microskill Components](#microskill-components)
-   [Course Management](#course-management)
-   [MBKM File Assessment](#mbkm-file-assessment)
-   [Grade Conversion](#grade-conversion)
-   [Dashboard](#dashboard)
-   [Study Program Management](#study-program-management)
-   [Faculty Management](#faculty-management)

## User Management

-   **Login Account** (All Users) - ✅ Finished (Low Priority)
-   **Logout Account** (All Users) - ✅ Finished (Low Priority)
-   **Add Account** (Admin & Super Admin) - ✅ Finished (Medium Priority)
-   **Account Settings** (Admin & Super Admin) - ✅ Finished (Medium Priority)
-   **View Profile** (All Users) - ✅ Finished (Medium Priority)
-   **Edit Profile** (All Users) - ✅ Finished (Medium Priority)

## MBKM File Submission

-   **Upload Final Report, Certificate, Documentation** (Student) - ✅ Finished (Medium Priority) (5 Days)
-   **View Report Status** (All Users) - ✅ Finished (Medium Priority)
    -   Waiting for Validation (Status 1, 2, 3, 4)
    -   Waiting for Assessment
    -   Successfully Assessed
    -   Not Valid
-   **File Revision** (Student) - ✅ Finished (High Priority) _(Only needs display implementation)_

## Microskill Components

-   **File Validation** (Admin) - ✅ Finished (High Priority) _(Only needs display implementation)_
-   **Microskill Test** (Student) - ✅ Finished (High Priority)

## Course Management

-   **Add Course** (Super Admin & Study Program) - ✅ Finished (Medium Priority) (4 Days)
-   **Edit Course** (Super Admin & Study Program) - ✅ Finished (Medium Priority)
-   **Delete Course** (Super Admin & Study Program) - ✅ Finished (Medium Priority)

## MBKM File Assessment

-   **Provide Assessment Based on Admin Recommendation** (Study Program) - ✅ Finished (High Priority) (3 Days)
-   **Change Report Status** (Admin & Study Program) - ✅ Finished (Medium Priority)
    -   Waiting for Validation
    -   Waiting for Assessment
    -   Successfully Assessed
    -   Valid
    -   Not Valid
-   **Write Feedback or Comments** (Admin) - ✅ Finished (Medium Priority) _(Only needs display implementation)_

## Grade Conversion

-   **View Recommendation Letter from PT Admin** (All Users) - ✅ Finished (High Priority) (3 Days)
-   **View Final Grade Conversion Letter** (All Users) - ✅ Finished (High Priority)

## Dashboard

-   **Display Files with Validation Status** (Admin) - ✅ Finished (Medium Priority) (3 Days)
-   **Display Assessed or Unassessed Files** (Study Program) - ✅ Finished (Medium Priority)
-   **Display Files with All Statuses** (Students) - ✅ Finished (Medium Priority)

## Study Program Management

-   **Add Study Program** (Admin & Super Admin) - ✅ Finished (Medium Priority) (3 Days)
-   **Edit Study Program** (Admin & Super Admin) - ✅ Finished (Medium Priority)
-   **Delete Study Program** (Admin & Super Admin) - ✅ Finished (Medium Priority)

## Faculty Management

-   **Add Faculty** (Admin & Super Admin) - ✅ Finished (Medium Priority) (3 Days)
-   **Edit Faculty** (Admin & Super Admin) - ✅ Finished (Medium Priority)
-   **Delete Faculty** (Admin & Super Admin) - ✅ Finished (Medium Priority)

### Total Estimated Completion Time: **27 Days**

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- INSTALLATION -->

## Installation

```console
git clone https://github.com/refindo-tech/report-checker-v2.git
```

```console
cd report-checker-v2
```

```console
composer install
```

```console
composer dump-autoload
```

```console
cp .env.example .env
```

```console
php artisan key:generate
```

```html
DB_CONNECTION=mysql DB_HOST=127.0.0.1 DB_PORT=3306 DB_DATABASE=??
DB_USERNAME=root DB_PASSWORD=
```

```console
php artisan migrate
```

```console
php artisan db:seed
```

<p align="right">(<a href="#readme-top">back to top</a>)</p>

## Roadmap Project

### Multi User

Role : <br>

-   Super Admin : admin@example.com <br>
-   AdminPT : admin1@example.com/password <br>
-   Prodi : dosen@example.com/password <br>
-   Mahasiswa : mahasiswa@example.com/password <br>

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
