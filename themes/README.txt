I. Dau buoi lam viec
================================
Pull new code from Github
================================
git pull
================================
Restore database
================================
mysql -u root -p dongcuong < dongcuong.sql


II. Cuoi buoi lam viec
================================
Export database
================================
sudo mysqldump -u root -p dongcuong > dongcuong.sql

================================
Push new code to Github
================================
git add .
git commit -m 'Updated'
git push