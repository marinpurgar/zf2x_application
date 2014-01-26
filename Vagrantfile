# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|
  config.vm.box = "precise32"
  config.vm.box_url = "http://files.vagrantup.com/precise32.box"
  config.vm.network :private_network, ip: "192.168.69.70"
  config.vm.synced_folder ".", "/var/www", :nfs => true
  config.vm.provision :shell,
    :inline => "sudo apt-get update; sudo DEBIAN_FRONTEND=noninteractive apt-get -q -y install lamp-server^ git"
  config.vm.provision :shell,
    :inline => "sudo apt-get -q -y install php5-curl php5-intl"
  config.vm.provision :shell,
    :inline => "sudo a2enmod rewrite"
  config.vm.provision :shell,
    :inline => 'echo  "<VirtualHost *:80>
        DocumentRoot /var/www/public
        <Directory /var/www/public>
            DirectoryIndex index.php
            AllowOverride none
            Order allow,deny
            Allow from all
            RewriteEngine On
            RewriteCond %{REQUEST_FILENAME} -s [OR]
            RewriteCond %{REQUEST_FILENAME} -l [OR]
            RewriteCond %{REQUEST_FILENAME} -d
            RewriteRule ^.*$ - [NC,L]
            RewriteRule ^.*$ index.php [NC,L]
        </Directory>
    </VirtualHost>" > /etc/apache2/sites-available/default'
  config.vm.provision :shell,
    :inline => "sudo service apache2 restart"
  config.vm.provision :shell,
    :inline => "cd /var/www/; php composer.phar update --no-interaction;"
  config.vm.provision :shell,
    :inline => "sudo service mysql start; mysql -u root -e 'CREATE DATABASE IF NOT EXISTS zf2x_application';"
  config.vm.provision :shell,
    :inline => "cd /var/www/vendor/bin; php doctrine-module orm:schema-tool:update --force"
  config.vm.provision :shell,
    :inline => "echo \"Done\""
end
