# Setup

1. Install Apache Web Server

Depending on your OS, follow the installation process for Apache:

**For Linux (Ubuntu/Debian):**
```
sudo apt update
sudo apt install apache2
```

**For Windows/Mac (XAMPP):**
- Download and install XAMPP.
- XAMPP includes Apache, MySQL, and PHP in a single package, which simplifies the setup.

2. Install PHP

If you're using XAMPP, PHP is included. For standalone setups:

**For Linux:**
```
sudo apt install php libapache2-mod-php
```

**For Mac (with Homebrew):**
```
brew install php
```

3. Configure Apache to Serve Files

By default, Apache serves files from the `/var/www/html/` directory on Linux systems, or from the `htdocs/` directory in XAMPP on Windows or Mac.

You need to place your XSS lab files in this directory:
- Linux: `/var/www/html/`
- Windows (XAMPP): `C:\xampp\htdocs\`
- Mac (XAMPP): `/Applications/XAMPP/htdocs/`

4. Copy The Lab Files
- Inside the web directory (`/var/www/html/` or `htdocs/`), create a folder for your labs. Example: `xss-labs`.
- Inside the `xss-labs` folder, create the individual PHP files for each lab.
Example structure:
```
/var/www/html/xss-labs/
├── lab1.php
├── lab2.php
├── lab3.php
├── lab4.php
└── lab5.php
```
5. Configure Permissions (Linux Only)
Ensure the Apache user (www-data on Ubuntu) has the correct permissions to access and execute the files:
```
sudo chown -R www-data:www-data /var/www/html/xss-labs
sudo chmod -R 755 /var/www/html/xss-labs
```
6. Access labs via browser: `http://localhost/xss-labs/`
