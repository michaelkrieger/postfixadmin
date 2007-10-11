<?php
/** 
 * Postfix Admin 
 * 
 * LICENSE 
 * This source file is subject to the GPL license that is bundled with  
 * this package in the file LICENSE.TXT. 
 * 
 * Further details on the project are available at : 
 *     http://www.postfixadmin.com or http://postfixadmin.sf.net 
 * 
 * @version $Id$ 
 * @license GNU GPL v2 or later. 
 * 
 * File: config.inc.php
 * Contains configuration options.
 */

if (ereg ("config.inc.php", $_SERVER['PHP_SELF']))
{
   header ("Location: login.php");
   exit;
}

/*****************************************************************
 *  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! 
 * The following line needs commenting out or removing before the
 * application will run!
 * Doing this implies you have changed this file as required.
 */
$CONF['configured'] = false;


// Postfix Admin Path
// Set the location of your Postfix Admin installation here.
// You must enter complete url (http://domain.tld/) and full path (/var/www/postfixadmin)
$CONF['postfix_admin_url'] = '';
$CONF['postfix_admin_path'] = dirname(__FILE__);

// Language config
// Language files are located in './languages'.
$CONF['default_language'] = 'en';

// Database Config
// mysql = MySQL 3.23 and 4.0
// mysqli = MySQL 4.1
// pgsql = PostgreSQL
$CONF['database_type'] = 'mysql';
$CONF['database_host'] = 'localhost';
$CONF['database_user'] = 'postfixadmin';
$CONF['database_password'] = 'postfixadmin';
$CONF['database_name'] = 'postfix';
$CONF['database_prefix'] = '';

// Here, if you need, you can customize table names.
$CONF['database_prefix'] = '';
$CONF['database_tables'] = array (
    'admin' => 'admin',
    'alias' => 'alias',
    'domain' => 'domain',
    'domain_admins' => 'domain_admins',
    'log' => 'log',
    'mailbox' => 'mailbox',
    'vacation' => 'vacation',
    'vacation_notification' => 'vacation_notification',
);

// Site Admin
// Define the Site Admins email address below.
// This will be used to send emails from to create mailboxes.
$CONF['admin_email'] = 'postmaster@change-this-to-your.domain.tld';

// Mail Server
// Hostname (FQDN) of your mail server.
// This is used to send email to Postfix in order to create mailboxes.
$CONF['smtp_server'] = 'localhost';
$CONF['smtp_port'] = '25';

// Encrypt
// In what way do you want the passwords to be crypted?
// md5crypt = internal postfix admin md5
// system = whatever you have set as your PHP system default
// cleartext = clear text passwords (ouch!)
$CONF['encrypt'] = 'md5crypt';

// Minimum length required for passwords. Postfixadmin will not
// allow users to set passwords which are shorter than this value.
$CONF['min_password_length'] = 5;

// Generate Password
// Generate a random password for a mailbox or admin and display it.
// If you want to automagically generate paswords set this to 'YES'.
$CONF['generate_password'] = 'NO';

// Show Password
// Always show password after adding a mailbox or admin.
// If you want to always see what password was set set this to 'YES'.
$CONF['show_password'] = 'NO';

// Page Size
// Set the number of entries that you would like to see
// in one page.
$CONF['page_size'] = '10';

// Default Aliases
// The default aliases that need to be created for all domains.
$CONF['default_aliases'] = array (
    'abuse' => 'abuse@change-this-to-your.domain.tld',
    'hostmaster' => 'hostmaster@change-this-to-your.domain.tld',
    'postmaster' => 'postmaster@change-this-to-your.domain.tld',
    'webmaster' => 'webmaster@change-this-to-your.domain.tld'
);

// Mailboxes
// If you want to store the mailboxes per domain set this to 'YES'.
// Example: /usr/local/virtual/domain.tld/username@domain.tld
$CONF['domain_path'] = 'NO';
// If you don't want to have the domain in your mailbox set this to 'NO'.
// Example: /usr/local/virtual/domain.tld/username
$CONF['domain_in_mailbox'] = 'YES';

// Default Domain Values
// Specify your default values below. Quota in MB.
$CONF['aliases'] = '10';
$CONF['mailboxes'] = '10';
$CONF['maxquota'] = '10';

// Quota
// When you want to enforce quota for your mailbox users set this to 'YES'.
$CONF['quota'] = 'NO';
// You can either use '1024000' or '1048576'
$CONF['quota_multiplier'] = '1024000';

// Transport
// If you want to define additional transport options for a domain set this to 'YES'.
// Read the transport file of the Postfix documentation.
$CONF['transport'] = 'NO';
// Transport options
// If you want to define additional transport options put them in array below.
$CONF['transport_options'] = array (
    'virtual',  // for virtual accounts
    'local',    // for system accounts
    'relay'     // for backup mx
);
// Transport default
// You should define default transport. It must be in array above.
$CONF['transport_default'] = 'virtual';

// Virtual Vacation
// If you want to use virtual vacation for you mailbox users set this to 'YES'.
// NOTE: Make sure that you install the vacation module. http://high5.net/postfixadmin/
$CONF['vacation'] = 'NO';
// This is the autoreply domain that you will need to set in your Postfix
// transport maps to handle virtual vacations. It does not need to be a
// real domain (i.e. you don't need to setup DNS for it).
$CONF['vacation_domain'] = 'autoreply.change-this-to-your.domain.tld';

// Vacation Control
// If you want users to take control of vacation set this to 'YES'.
// TODO: not implemented
$CONF['vacation_control'] ='YES';

// Vacation Control for admins
// Set to 'YES' if your domain admins should be able to edit user vacation.
$CONF['vacation_control_admin'] = 'YES';

// Alias Control
// Postfix Admin inserts an alias in the alias table for every mailbox it creates.
// The reason for this is that when you want catch-all and normal mailboxes
// to work you need to have the mailbox replicated in the alias table.
// If you want to take control of these aliases as well set this to 'YES'.
$CONF['alias_control'] = 'NO';

// Alias Control for admins
// Set to 'NO' if your domain admins shouldn't be able to edit user aliases.
$CONF['alias_control_admin'] = 'NO';

// Special Alias Control
// Set to 'NO' if your domain admins shouldn't be able to edit default aliases.
$CONF['special_alias_control'] = 'NO';

// Alias Goto Field Limit
// Set the max number of entries that you would like to see
// in one 'goto' field in overview, the rest will be hidden and "[and X more...]" will be added.
// '0' means no limits.
$CONF['alias_goto_limit'] = '0';

// Backup
// If you don't want backup tab set this to 'NO';
$CONF['backup'] = 'YES';

// Send Mail
// If you don't want sendmail tab set this to 'NO';
$CONF['sendmail'] = 'YES';

// Logging
// If you don't want logging set this to 'NO';
$CONF['logging'] = 'YES';

// Header
$CONF['show_header_text'] = 'NO';
$CONF['header_text'] = ':: Postfix Admin ::';

// link to display under 'Main' menu when logged in as a user.
$CONF['user_footer_link'] = "http://change-this-to-your.domain.tld/main";

// Footer
// Below information will be on all pages.
// If you don't want the footer information to appear set this to 'NO'.
$CONF['show_footer_text'] = 'YES';
$CONF['footer_text'] = 'Return to change-this-to-your.domain.tld';
$CONF['footer_link'] = 'http://change-this-to-your.domain.tld';

// Welcome Message
// This message is send to every newly created mailbox.
// Change the text between EOM.
$CONF['welcome_text'] = <<<EOM
Hi,

Welcome to your new account.
EOM;

// When creating mailboxes, check that the domain-part of the
// address is legal by performing a name server look-up.
$CONF['emailcheck_resolve_domain']='YES';


// Optional:
// Analyze alias gotos and display a colored block in the first column
// indicating if an alias or mailbox appears to deliver to a non-existent
// account.  Also, display indications, for POP/IMAP mailboxes and
// for custom destinations (such as mailboxes that forward to a UNIX shell
// account or mail that is sent to a MS exchange server, or any other
// domain or subdomain you use)
// See http://www.w3schools.com/html/html_colornames.asp for a list of
// color names available on most browsers

//set to YES to enable this feature
$CONF['show_status']='NO';
//display a guide to what these colors mean
$CONF['show_status_key']='NO';
// 'show_status_text' will be displayed with the background colors
// associated with each status, you can customize it here
$CONF['show_status_text']='&nbsp;&nbsp;';
// show_undeliverable is useful if most accounts are delivered to this
// postfix system.  If many aliases and mailboxes are forwarded
// elsewhere, you will probably want to disable this.
$CONF['show_undeliverable']='NO';
$CONF['show_undeliverable_color']='tomato';
$CONF['show_undeliverable_exceptions']=array("unixmail.domain.ext","exchangeserver.domain.ext","gmail.com");
$CONF['show_popimap']='NO';
$CONF['show_popimap_color']='darkgrey';
// set 'show_custom_count' to 0 to disable custom indicators
$CONF['show_custom_count']=2;
$CONF['show_custom_domains']=array("subdomain.domain.ext","domain2.ext");
$CONF['show_custom_colors']=array("lightgreen","lightblue");


// Optional:
// Script to run after creation of mailboxes.
// Note that this may fail if PHP is run in "safe mode", or if
// operating system features (such as SELinux) or limitations
// prevent the web-server from executing external scripts.
// $CONF['mailbox_postcreation_script']='sudo -u courier /usr/local/bin/postfixadmin-mailbox-postcreation.sh';

// Optional:
// Script to run after deletion of mailboxes.
// Note that this may fail if PHP is run in "safe mode", or if
// operating system features (such as SELinux) or limitations
// prevent the web-server from executing external scripts.
// $CONF['mailbox_postdeletion_script']='sudo -u courier /usr/local/bin/postfixadmin-mailbox-postdeletion.sh';

// Optional:
// Script to run after deletion of domains.
// Note that this may fail if PHP is run in "safe mode", or if
// operating system features (such as SELinux) or limitations
// prevent the web-server from executing external scripts.
// $CONF['domain_postdeletion_script']='sudo -u courier /usr/local/bin/postfixadmin-domain-postdeletion.sh';

// Optional:
// Sub-folders which should automatically be created for new users.
// The sub-folders will also be subscribed to automatically.
// Will only work with IMAP server which implement sub-folders.
// Will not work with POP3.
// If you define create_mailbox_subdirs, then the
// create_mailbox_subdirs_host must also be defined.
//
// $CONF['create_mailbox_subdirs']=array('Spam');
// $CONF['create_mailbox_subdirs_host']='localhost';
//
// Normally, the TCP port number does not have to be specified.
// $CONF['create_mailbox_subdirs_hostport']=143;
//
// If you have trouble connecting to the IMAP-server, then specify
// a value for $CONF['create_mailbox_subdirs_hostoptions']. These
// are some examples to experiment with:
// $CONF['create_mailbox_subdirs_hostoptions']=array('notls');
// $CONF['create_mailbox_subdirs_hostoptions']=array('novalidate-cert','norsh');
// See also the "Optional flags for names" table at
// http://www.php.net/manual/en/function.imap-open.php

//
// END OF CONFIG FILE
//
?>