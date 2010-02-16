<?php use_helper('I18N', 'Url') ?>
<?php echo __(<<<EOM
Thanks for applying for an account for Symfony Bangalore!

If you have any troubles, don't reply to this mail but send a mail to sjoerddejong@ymail.com for support.

To prevent abuse of the site, we require that you activate your
account by clicking on the following link:

%1%

Thanks again for joining us!
EOM
, array("%1%" => url_for("sfApply/confirm?validate=$validate", true))) ?>
