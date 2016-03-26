# ApacheHtaccessIn

Often when you get a Web App there will be several .htaccess files sprinkled through the app, and Apache will read these to make sure it serves the app properly.

Problem: it is better for performance if these configs are baked into Apache, instead of getting apache to look for .htaccess files.

http://httpd.apache.org/docs/current/howto/htaccess.html

This library is a simple library that will search through a directory for .htaccess files and make them into an Apache config for you.

## Use from the command line

Say you have this Apache Config

```
<VirtualHost example.com>
    DocumentRoot /var/www/example.com/web
    <Directory /var/www/example.com/web >
        AllowOverride all
    </Directory>
</VirtualHost>
```

Check out the code and run

    php bin/ApacheHtaccessIn.php /var/www/example.com/web >> /var/www/example.com/apacheConfig


Then simply change your config to

```
<VirtualHost example.com>
    DocumentRoot /var/www/example.com/web
    <Directory /var/www/example.com/web >
        AllowOverride none
        Include /var/www/example.com/apacheConfig
    </Directory>
</VirtualHost>
```

Reload or restart Apache. Done!

Every time you do something that might change your .htaccess files, such as upgrade the app, you will need to rerun this and reload or restart Apache.

Note: the output file created contains complete paths. This means if you move the web app - say from /var/www/example.com/web to /websites/example.com/web you will need to rerun this.

## Run from PHP

This can be included with composer: https://packagist.org/packages/jmbtechnologylimited/apachehtaccessin

For an example of how to call the PHP classes, see bin/ApacheHtaccessIn.php

## License

BSD - for details see LICENSE.txt
