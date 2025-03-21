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

### User Management

-   **Login to Account** – All users
-   **Logout from Account** – All users
-   **Add New Account** – Admin
-   **Account Settings** – Admin
-   **View Profile** – All users
-   **Edit Profile** – All users

### Final Report Management

-   **Upload Final Report** – Student
-   **View Report Status** – All users
    -   Waiting
    -   Review
    -   Rejected
    -   Approved
-   **Revise Report** – Student

### CPL Mikroskill Management

-   **Add CPL Mikroskill Rubric** – Admin & Reviewer
-   **Edit CPL Mikroskill Rubric** – Admin & Reviewer
-   **Delete CPL Mikroskill Rubric** – Admin & Reviewer

### Final Report Assessment

-   **Assess Report Based on CPL Mikroskill** – Reviewer
-   **Update Report Status** – Admin & Reviewer
    -   Waiting
    -   Review
    -   Rejected
    -   Approved
-   **Provide Feedback or Comments** – Admin & Reviewer

### Assessment Conversion

-   **View SKS Credit Conversion Results** – All users

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- INSTALLATION -->

## Installation

```console
git clone https://github.com/refindo-tech/report-checker.git
```

```console
cd report-checker
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

-   SuperAdmin : admin@example.com/password <br>
-   Admin : admin1@example.com/password <br>
-   Dosen : dosen@example.com/password <br>
-   Mahasiswa : mahasiswa@example.com/password <br>

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
