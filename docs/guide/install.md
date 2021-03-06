# Create a LUYA Application

With those few steps you can install *LUYA* on your Webserver. To install *LUYA* you have to install [Composer](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx) on your Mac, Unix or Windows System.

> We have made an [installation Video on Youtube](https://www.youtube.com/watch?v=7StCJviSGkg) in order to help install LUYA.

<script type="text/javascript" src="https://asciinema.org/a/81699.js" id="asciicast-81699" async></script>

First of all you have to install the global `fxp/composer-asset-plugin` plugin, which is required by Yii to install bower packages via composer. To global install the plugin open your Terminal and run the following code:

```sh
composer global require "fxp/composer-asset-plugin:~1.2"
```

After setting up composer, we execute the composer `create-project` command to checkout the **luya-kickstarter** application, an *out of the box* setup enabling you to directly run your website. We recommend to run the `create-project` command directly from your htdocs/webserver folder:

```sh
composer create-project luyadev/luya-kickstarter:1.0.0-RC1
```

> Note: During the installation Composer may ask for your Github login credentials. This is normal because Composer needs to get enough API rate-limit to retrieve the dependent package information from Github. For more details, please refer to the [Composer documentation](https://getcomposer.org/doc/articles/troubleshooting.md#api-rate-limit-and-oauth-tokens).

The `create-project` command will create a folder (inside of your current folder where the `composer create-project` command was execute) named **luya-kickstarter**. After the command is finished go into the **configs** folder inside the application and copy the dist template files to original php files.

```sh
cp env.php.dist env.php
cp env-local-db.php.dist env-local-db.php
```

Now change the database connection inside the `configs/env-local-db.php` file to fit your mysql servers configuration. You should open all config files once to change values and understand the behavior. In order to understand the config files read more in the [environemnt configs section](install-configs.md). After successfully setting up your database connection, you have to reopen your Terminal and change into your project directory and excute the **luya** binary files which has been installed into your vendor folder by composer as described in the follwing.

Run the migration files with the [migrate console command](luya-console.md):

> Note: If the migration process failed, try to replace localhost with 127.0.0.1 in the database DNS configuration `(env-local-db.php)` which is located in the  configs folder.

```sh
./vendor/bin/luya migrate
```

Build and import all filesystem configurations into the database with the [import console command](luya-console.md):

```sh
./vendor/bin/luya import
```

At last we execute the [setup console command](luya-console.md) which is going to setup a user, group and permissions:

```sh
./vendor/bin/luya setup
```

The setup proccess will ask you for an email and password to store your personal login data inside the database (of course the password will be encrypted).

> `./vendor/bin/luya health` will make a small check if several directories exist and readable/writable.

You can now log in into your administration interface `http://localhost/luya-kickstarter/admin` (depending on where you have located the luya files). When you have successfull logged into the administration area, navigate to **System** -> **Groups** and click **Authorizations**. This will open an Active Window where you can enable all permissions for your Group.

![luya-set-permission](https://raw.githubusercontent.com/luyadev/luya/master/docs/guide/img/luya-install-set-permission.jpg "LUYA Set permissions")

## Problems

There are few things people stumble upon mostly.

### Language

After setting up the project and run the `setup` process the message `The requested language 'en' does not exist in language table` appears and a 404 error exception will be thrown. In order to fix this, make sure you have the same default language short code in your database (you have entered or used the default value in the setup process) and your configuration file in the `composition` section `'default' => ['langShortCode' => 'en']`. Those two values must be the same.

### Composer

When you encounter errors with composer install/update, make sure you have installed the version **1.0.0** of composer, in order to update your composer run `composer self-update`.

As Yii2 requies the `fxp/composer-asset-plugin` make sure you have at least version `1.1.4` installed of the plugin, in order to update the composer-asset-plugin run `composer global require "fxp/composer-asset-plugin:~1.1"`.

### Ask us!

When you have problems with installing *LUYA* or have unexpected errors or strange behaviors, let us know by creating an [issue on GitHub](https://github.com/luyadev/luya/issues) or [Join the Gitter Chat](https://gitter.im/luyadev/luya) we would loved to have your Feedback!

[![Join the chat at https://gitter.im/luyadev/luya](https://badges.gitter.im/Join%20Chat.svg)](https://gitter.im/luyadev/luya?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)

## Require the dev-master

Maybe you like to test the newest features of LUYA, so you can use the fowllowing composer json requirements, but do not forget to read the [README.MD](https://github.com/luyadev/luya/blob/master/UPGRADE.md).

```json
"require": {
    "luyadev/luya-core" : "^1.0@dev",
    "luyadev/luya-module-admin" : "^1.0@dev",
    "luyadev/luya-module-cms" : "^1.0@dev"
}
```
