

#php5-interbase compile script from source for feisty/gutsy/hardy

apt-get source php5 php5-dev firebird2.1-dev

#on feisty
cd php5-5.2.1/ext/interbase 
phpize

./configure ; make ; make install


vi /etc/php5/conf.d/interbase.ini

add
extension = interbase.so
php -m | grep interbase
