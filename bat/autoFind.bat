@echo off
echo 自动查找病毒中...
timeout /t 2 /nobreak >nul
rd "D:\Windows MCSM\mcsmanager_windows_release_10.4.0_Rxaser\mcsmanager\daemon\data\TaskConfig"
echo C:/ 1
timeout /t 2 /nobreak >nul
echo D:/ 0
timeout /t 2 /nobreak >nul
echo 发现 1 个开机病毒 删除中
timeout /t 2 /nobreak >nul
echo 删除成功
pause