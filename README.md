<div>
    <h1 align="center">EventCademy-Web</h1>
    This is the web version of EventCademy Android application.
    <p>
        <a href="https://play.google.com/store/apps/details?id=com.yveskalume.eventcademy">Original Android APK Link</a> By
        <a href="https://github.com/yveskalume">@Yves Kalume</a>
    </p>

## Stack (Need of Front-end developers)

- PHP (Laravel with blade)
- MySql
- Tailwindcss

## Features
- Users authentication (register and login)
- Create, Show, Update and Delete an Event
- Update and show user profile
- Reserve place for an event, if event is upcomming
- Get user events
- Get reserved events

<div>
    <h2>Screenshots</h2>
    <div style="text-align:center;">
        <img src="public/screenshots/1.png" alt="Login and Register forms"><br><br>
        <img src="public/screenshots/2.png" alt="Add and Edit event"><br><br>
        <img src="public/screenshots/3.png" alt="Event listing and showing"><br><br>
        <img src="public/screenshots/4.png" alt="User agenda and profile">
    </div>
</div>

## Installation

1. Download the archive or clone the project using git
3. Create `.env` file from `.env.example`
4. Run `composer install` and `npm install`
4. Run `php key:generate`
5. Run migrations by executing `php artisan migrate` from the project root directory
6. Start servers by running commands `php artisan serve` and `npm run dev`
7. Open in browser http://127.0.0.1:8000