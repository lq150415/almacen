set FECHA= %date%
set FECHA=%FECHA:/=%
set FECHA=%FECHA: =%
set FECHA=%FECHA::=%
set FECHA=%FECHA:,=%
set BD=c:/xampp/htdocs/almacen/log/backup_almacen_%FECHA%.sql
cd c:/xampp/mysql/bin
mysqldump --user=root --host=localhost bd_almacen > %BD%
