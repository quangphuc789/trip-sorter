sudo apt-get update &&
sudo apt-get install php5 &&
wget https://phar.phpunit.de/phpunit-4.8.phar &&
chmod +x phpunit-4.8.phar &&
sudo mv phpunit-4.8.phar /usr/local/bin/phpunit