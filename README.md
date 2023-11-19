# user-crud
User CRUD Restful API Project.

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Tools needed before building and running the app
1. Source Tree.
2. Postman.
3. Docker.

## Instruction for running and building the app
1. Open Source Tree.
2. Clone from URL:
    1. Source URL: https://github.com/luqmanahmad5149/user-crud.git
    2. Destination Path: /Users/Shared/user-crud
    3. Name: user-crud
    4. Checkout branch: main
3. Open terminal.
4. Go to the project directory by using this command **“cd Users/Shared/user-crud”**.
5. Type **“make setup”**. This command will build a docker image and execute the necessary script.
6. Create a .env file inside the project root.
7. Copy and paste the .env.example file content into the .env file.
8. Type **“make data”**. This command will run the Laravel migration and seeder.
9. Now you can open this URL “http://localhost:9000/“ and the home page will be shown.
10. To access phpMyAdmin use this URL “http://localhost:9001/“.
11. For unit test execution, please enter the docker container first using this command **“docker exec -it user-crud bash”**. Then use this script **“php artisan test”** to execute the unit test.

## Instruction for Testing the app
1. Download this postman collection for user-crud Api “https://drive.google.com/file/d/1fGbmHyCyQO-4IVChmfYmAX2rGyfq_70z/view?usp=sharing”.
2. Import the collection inside Postman.
3. Now you have the user-crud API collection.
4. Now you can test all APIs using the API collection provided.

## API Interface Documentation
| HTTP Request | Endpoint              | Description                                   |
| :---:        | :---:                 | :---:                                         |
| GET          |  api/v1/users         |  Get all existing users.                      |
| GET          |  api/v1/user          |  Get specific user only.                      |
| POST         |  api/v1/user          |  Add a user.                                  |
| UPDATE       |  api/v1/user/update   |  Update user.                                 |
| DELETE       |  api/v1/user/delete   |  Delete user.                                 |
| GET          |  api/v1/departments   |  Get all existing departments.                |

