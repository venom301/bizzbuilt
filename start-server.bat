@echo off
echo Starting PHP development server...
cd %~dp0
php -S localhost:8000 -t public
pause