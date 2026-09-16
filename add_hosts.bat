@echo off
chcp 65001 >nul
title Cau hinh wordpress.local vao file hosts

:: Kiem tra va yeu cau quyen Administrator (UAC prompt)
>nul 2>&1 "%SYSTEMROOT%\system32\cacls.exe" "%SYSTEMROOT%\system32\config\system"
if '%errorlevel%' NEQ '0' (
    echo Dang yeu cau quyen Administrator...
    echo Set UAC = CreateObject^("Shell.Application"^) > "%temp%\getadmin.vbs"
    echo UAC.ShellExecute "%~s0", "", "", "runas", 1 >> "%temp%\getadmin.vbs"
    "%temp%\getadmin.vbs"
    del "%temp%\getadmin.vbs"
    exit /B
)

set HOSTS_FILE=%WINDIR%\System32\drivers\etc\hosts

:: Kiem tra xem wordpress.local da co trong hosts chua
findstr /C:"wordpress.local" "%HOSTS_FILE%" >nul
if %errorlevel% EQU 0 (
    echo [THONG BAO] wordpress.local da co san trong file hosts!
) else (
    echo. >> "%HOSTS_FILE%"
    echo 127.0.0.1 wordpress.local >> "%HOSTS_FILE%"
    echo [THANH CONG] Da them "127.0.0.1 wordpress.local" vao file hosts!
)

echo.
echo ====================================================
echo Hoan tat! Ban co the mo trinh duyet va truy cap:
echo http://wordpress.local
echo http://wordpress.local/wp-admin
echo ====================================================
echo.
pause
