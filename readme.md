## Catalist

This is a Laravel 4.2 application - please bear in mind that this version of Laravel is from several years ago and may not function well in modern environments. Laravel 4.2 was designed to work effectively under PHP5.4 (no longer supported since mid-2015) and will certainly require the mcrypt extension (deprecated in latest versions of PHP).

A composer update will be required to install Paypal and AWS packages.

Security was an important specification of this project, and there are several caveats. It should be run with a working SSL certificate to ensure confidence as the user inputs their login details. Laravel's inbuilt anti-CSRF measures have been implemented and in general authentication is required to access protected routes. Our secret file has been hosted on Amazon S3 and the app/config/aws.php file will need to be updated, returning an array containing the AWS key, secret and region: this isn't data that it's advisable to commit to github!

In case the download link falls into the wrong hands it has been generated as a time-limited URL, expiring after a few minutes. If there is a possible issue of sensitive cat pictures being leaked after download, one might consider using a steganography library to encode the identity of the downloader into the image: but this is beyond the current remit of this quick project. 
