CREATE USER IF NOT EXISTS  'gcc'@'localhost' IDENTIFIED BY '123456';

GRANT ALL ON *.* TO 'gcc'@'localhost' WITH GRANT OPTION;

FLUSH PRIVILEGES;