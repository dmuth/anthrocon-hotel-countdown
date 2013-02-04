Anthrocon Hotel Countdown
=========================

Code for the Anthrocon Hotel Countdown Timer screen that I used on the website for our 2013 convention.

Based on the "end date" which is set in the software, either a countdown timer is displayed, or a page 
with the link to reserve hotels is displayed.  Here are some screenshots:

<img src="https://raw.github.com/dmuth/anthrocon-hotel-countdown/master/screenshot-anthrocon-hotel-countdown-timer.png" width="300" />
&nbsp;
<img src="https://raw.github.com/dmuth/anthrocon-hotel-countdown/master/screenshot-anthrocon-hotel-countdown-open.png" 
width="300" />


Installation and Configuration
==============================

- Clone this repository into any directory.  You'll need PHP 5.3 running on the server
- Go to http://codecanyon.net/item/jbmarket-circular-countdown/3100472 and purchase 
  the countdown app.  It's only $5 and very much worth it. :-)
- Put the Circular Countdown code into the following directory: content/js-clock/
- Replace the Anthrocon image with one of your choosing, and tweak the CSS as you see fit.

You should now be good to go!


Performance
===========

I *highly* recommend tweaking the `deploy-to-s3.sh` script and putting all of your 
assets (images, CSS, etc.) onto Amazon S3 or AWS CloudFront.  It will decrease the 
load to your server substantially.


Configuration and Use
=====================

Start by editing index.php and changing the $start_date and $end_date variables.  
They are in YYYYMMDDHHMMSS format.

To test things out, you can load the index.php with a "date" argument to 
force a different end date.  Examples:

- http://localhost/hotel/?date=20120101120000 will force the end date to be 
Noon on January 1st 2012, and will display the hote reservations link.
- http://localhost/hotel/?date=20150101130000 will force the end date 
  to be 1 PM on January 1st, 2015. If it is in fact before that date, 
  you will see the countdown time.

PROTIP: Before deploying, it would probably be a good idea to comment 
out the line sets $end_date to $_GET["date"]. :-)

If you are running an actual convention website and want to replace your website with this 
countdown timer, first make sure that your website has a single entry point. For example, 
Drupal serves all pages through index.php.  If that's the case, replacing all pages on 
your website is fairly straightforward.  First, replace index.php with a symlink as follows:

`mv index.php main.php && ln -s main.php index.php`

Now, when you're ready to replace the site, do something like this:

`rm index.php && ln -s hotel/index.php index.php`

When you're ready to restore access to the website:

`rm index.php && ln -s main.php index.php`



