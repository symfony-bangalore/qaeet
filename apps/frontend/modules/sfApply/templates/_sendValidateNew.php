<?php use_helper('I18N', 'Url') ?>
<?php echo __(<<<EOM
<p>
Thanks for applying for an account for Symfony Bangalore!
</p>
<p>
To prevent abuse of the site, we require that you activate your
account by clicking on the following link:
</p>
<p>
%1%
</p>
<p>
Thanks again for joining us.
</p>
EOM
, array("%1%" => link_to(url_for("sfApply/confirm?validate=$validate", true), "sfApply/confirm?validate=$validate", array("absolute" => true)))) ?>
