Blast Test Project
====================

**Technologies used:**
* Laravel 8.38.0
* PHP 7.4.13
* PostgreSQL 11.1
* Bootstrap v5.0

Installation
---

* Install the dependencies: composer install
* Create a database with the name 'blast'
* Create another database with the name 'blast_test'
* Run migrations with the --seed parameter: php artisan migrate --seed
* Start the server: php artisan serve

# System operation
The system is divided into 5 menus:
* Customers
* Numbers
* Preferences
* Users (Admin users only)
* Roles (Admin users only)

User authentication is required to access the system.

UserSeed will create an admin user. User details:
* email:    admin@test.com
* password: admin

## Users
Registration of users who can log into the system. Each user needs a role.

## Roles
The registration of roles has the objective of identifying which are the permissions of the users who are part of it.
Available permissions:
* index-customer: See the list of customers
* show-customer: View a customer's details
* create-customer: Create customers
* edit-customer: Edit customers
* delete-customer: Delete customers

Currently, the available permissions are only for the Customers screen.

If the role is marked **'Is Admin'**, then the above permissions will be ignored. Users of the 'Is Admin' role have no restrictions on the system.


## Customers
In the initial list of Customers, only the customers that were registered by the logged in user will be shown. If the logged in user is from the 'Is Admin' role, this rule will not be applied, thus showing all customers registered in the system.

It is possible to edit the users who can access a Customer record by clicking the **'Multiple Users'** button and choosing the users who will have the permission.


## Numbers
Each number needs a customer.
For each new number registered, two entries will be made in Number Preferences:
* auto_attendant with a value of 1
* voicemail_enabled with a value of 1


## Number Preferences
Each preference requires a number.


# What was left to do
* use vue.js for your tables instead of reloading the page after each post when adding customers, numbers and number preferences.
* create all possible permissions for numbers, number_preferences, roles and users.
* adjust all screens to show only the records of the logged in user. This is currently done only on the Customers screen.
* refactor some parts of the code


