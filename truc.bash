symfony make:form
cd public_html

mkdrir sharlene

cd sharlene

rm default.php

git init

git remote add origin https://github.com/EnelRahss/sharlene.git

git pull origin master

php composer.phar install

php bin/console asset-map:compile

php bin/console cache:clear


$ symfony make:controller

$ symfony make:entity

Class name of the entity to create or update:
> Followup

New property name (press <return> to stop adding fields):
> title

Field type (enter ? to see all types) [string]:
> string

Field length [255]:
> 50

Can this field be null in the database (nullable) (yes/no) [no]:
> no

New property name (press <return> to stop adding fields):
> status

Field type (enter ? to see all types) [string]:
> boolean

Can this field be null in the database (nullable) (yes/no) [no]:
> no

New property name (press <return> to stop adding fields):
>
(press enter again to finish)