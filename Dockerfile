FROM debian:buster
# Actualzar
RUN apt-get update
# Instalación de apache y mariadb
RUN apt-get install -y apache2
# Instalación de php7,3
RUN apt-get install -y php7.3 php7.3-fpm \
                       php7.3-curl php7.3-cli \
                       php7.3-cgi php7.3-bz2 \
                       php7.3-mysql php7.3-sqlite3 \
                       php7.3-gd php7.3-xml \
                       php7.3-mbstring \
                       php7.3-iconv \
                       libapache2-mod-php7.3 \
                       mariadb-server
# Herramientas para testear
RUN apt-get install -y nmap nano vim
# Se habilita en apache
RUN a2enmod php7.3
# Se reinician los servicios
RUN a2enmod rewrite
RUN service apache2 restart
# Instalación de composer
RUN apt-get install -y composer
# Instalación de git
RUN apt-get install -y git-all
# Solucionamos incidencia de localhost
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
# Exponemos puerto 80
EXPOSE 80
RUN ln -sf /dev/stdout /var/log/apache2/access.log
RUN ln -sf /dev/stderr /var/log/apache2/error.log
CMD apachectl -DFOREGROUND%