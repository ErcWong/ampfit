<?php
/**
 * FormMailer Configuration File
 */

/**
 * Default encoding
 *
 * It is strongly recommended that you use 'utf-8', as this will ensure maximum
 * compatibility. 
 *
 * @var string
 */
$encoding = 'utf-8';

/**
 * Debug mode switch
 *
 * Change to true in order to disable actual email sending and enable verbose 
 * output of debugging information. 
 *
 * @var boolean
 */
$debug = false;

/**
 * Form fields with special meaning
 *
 * These fields control the behavior of the script. Form fields that are not 
 * listed here are simply going to be emailed to the recipient. 
 *
 * @var array
 */
$config = array(
    /*
     * The recipient field contains the email address that you would like the 
     * submitted form data to be sent to. 
     *
     * It can contain multiple email addresses separated by commas. 
     */
    'recipient' => 'contact@ampfit.ca',

    /*
     * The default subject line of the message that will be sent. If you do not
     * specify anything here or in the form, the default subject will be used:
     * "WWW Form Submission"
     */
    'subject' => '',

    /*
     * This field contains the default email address that will appear in the 
     * "From" header of the message.
     *
     * Generally, you might want to allow this field to be overridden in the 
     * form so that the user submitting the form can leave their email address.
     */
    'email' => 'postmaster@ampfit.ca',

    /*
     * This field allows the user to enter their actual name when submitting 
     * the form. This name will appear on the "From" header along with their 
     * email address.
     */
    'realname' => '',

    /*
     * After the form is submitted, the script generates a report about it. 
     * With this field, you can override that behavior and redirect the user to
     * a "thank you" page, for example. 
     */
    'redirect' => '',

    /*
     * This field allows you to specify a background image for the result page.
     */
    'background' => '',

    /*
     * The following fields control the colors that will be used on the result 
     * HTML page that will be displayed to the user after they submit the form.
     */
    'bgcolor' => '',
    'text_color' => '',
    'link_color' => '',
    'vlink_color' => '',
    'alink_color' => '',

    /*
     * If you do not specify a redirect URL, this field will allow you to set 
     * the title of the result HTML page that is displayed to the user. 
     */
    'title' => '',

    /*
     * This field allows you to specify the order in which submitted form 
     * fields should appear in the email message.
     *
     * By default, the order will be the same as the order in which the form 
     * fields appear on the form. 
     *
     * If you want to sort the fields alphabetically, you should enter 
     * 'alphabetic' here.
     *
     * Otherwise, you should enter 'order:field1, field2, field3, ...'
     */
    'sort' => '',

    /*
     * With this field, you can specify which configuration options will be 
     * displayed to the user after they submit the form. It accepts a 
     * comma-separated list. 
     *
     * By default, configuration options are not printed. 
     */
    'print_config' => '',

    /*
     * A comma-separated list of fields that are required. The form will not 
     * be sent if any of the fields in this list is empty. 
     *
     * See also the 'missing_fields_redirect' field. 
     */
    'required' => '',

    /*
     * A comma-separated list of environment variables that should be sent with
     * the form. These variables are set by the web server and include the IP 
     * address of the user, for example, as well as other information that you 
     * may find useful.
     *
     * See also the $valid_ENV array below.
     */
    'env_report' => '',

    /*
     * With this field, you can leave a link for the user to return from the 
     * result page after they have submitted the form. 
     *
     * The 'redirect' field overrides this setting. 
     */
    'return_link_url' => '',

    /*
     * This is the title that will be displayed on the return link (see 
     * 'return_link_url').
     */
    'return_link_title' => '',

    /*
     * Whether to display fields that the user left blank. By default, blank 
     * fields will not be displayed. 
     */
    'print_blank_fields' => true,

    /*
     * If any of the required fields is not filled in and this field contains a 
     * URL, the user will be redirected there when the form is submitted. 
     *
     * This can be used to set up a page that asks the user to fill out 
     * everything. 
     */
    'missing_fields_redirect' => '',
);

/**
 * Non-overridable form fields
 *
 * The following fields, if their value is not empty above, cannot be 
 * overridden by form data.
 *
 * @var array
 */
$nonoverridable = array(
    'recipient',
    'subject',
    'realname',
);

/**
 * Allowed referrers
 *
 * Referrers from which form data will be processed. This is not a reliable
 * security check. Use $recipients instead. 
 *
 * Note: This array is checked for recipients along with $recipients.
 *
 * @var array
 */
$referers = array(
    'ampfit.ca',
    '*.ampfit.ca',
    'alwaysmakingprogress.com',
    '*.alwaysmakingprogress.com',
    'ampweightlifting.ca',
    '*.ampweightlifting.ca',
    'ampweightlifting.com',
    '*.ampweightlifting.com',
    'owenchau.ca',
    '*.owenchau.ca',
    'owenchau.com',
    '*.owenchau.com',
    'always.s414.sureserver.com',
    '*.always.s414.sureserver.com',
);

/**
 * Email recipients
 *
 * Email may be sent to the following recipients, or to recipients in the 
 * $referers array above. Fields may contain either single email addresses or 
 * entire domains.
 *
 * @var array
 */
$recipients = array(
    'contact@ampfit.ca',
);

/**
 * Allowed environment variables
 *
 * A list of environment variables that a form may request. If a variable that 
 * the script requests is not listed here, it will be silently ignored.
 *
 * Note: The documentation of the original FormMail mentions 'REMOTE_USER'; 
 *       however, this is not available in PHP and is therefore omitted. In
 *       PHP, you should use 'PHP_AUTH_USER'.
 * 
 * See http://www.php.net/manual/en/reserved.variables.server.php for more 
 * information on the possible variables and their availability.
 * 
 * @var array
 */
$valid_ENV = array(
    'REMOTE_HOST',
    'REMOTE_ADDR',
    'HTTP_USER_AGENT',
    'HTTP_REFERER',
);

/**
 * Summary report
 *
 * If this option is set to a value that evaluates to true, a summary report 
 * of the submitted form data will be generated and displayed to the submitter 
 * on successful sending.
 */
$print_summary_report = true;

/**
 * Allowed extensions of file attachments
 *
 * If an attached file does not have one of the extensions listed here, sending 
 * will fail.
 *
 * @var array
 */
$attachment_allowed_extensions = array(
    'txt', 'doc', 'docx', 'pdf',
    'jpg', 'gif', 'png', 'psd',
    'bmp', 'jpeg', 'jpe', 'jfif',
    'tif', 'tiff', 'xls', 'xlsx',
    'zip', 'rar', 'gz', 'bz2',
);

/**
 * Path to save attachments to if saving to database or CSV file. This path must 
 * be writable by the user that the PHP script runs as.
 *
 * Existing files will not be overwritten.  
 *
 * @var string
 */
$attachment_save_path = '/tmp';

/**
 * Maximum size of attached files
 *
 * The maximum attachment size defaults to the maximum that PHP can handle. See
 * the upload_max_filesize configuration option for possible values. If an
 * invalid value is supplied, the script will revert to the default (1M).
 *
 * @var mixed Can be either a number of bytes, or a string as used for the 
 *            upload_max_filesize configuration option of PHP.
 */
$attachment_max_filesize = ini_get('upload_max_filesize');

/**
 * Maximum number of attachments
 *
 * Maximum number of attached files that the script will process. 
 *
 * @var int
 */
$attachment_max_number = 0;

/**
 * Date format
 *
 * See http://www.php.net/manual/en/function.strftime.php for the correct 
 * format.
 *
 * If not defined, '%c' is used.
 *
 * @var string
 */
$date_format = '%A, %B %d, %Y, %T';

/**
 * Date format locale
 *
 * Run "locale -a" to see which locales are supported on the system. See 
 * http://www.php.net/manual/en/function.setlocale.php for more information on 
 * how this works.
 * 
 * If not defined, 'C' is used.
 *
 * @var string
 */
$date_locale = 'en_US.utf8';

/**
 * Time zone offset (hours)
 *
 * Can be either a positive or a negative number.
 *
 * Note that this is not the most reliable method to handle time zones. The 
 * recommended method is using an environment variable in .htaccess. See 
 * http://suresupport.com/faq/38/205 for more information about how 
 * this can be done.
 *
 * Note: It is perfectly OK to specify 1.5 here; there are time zones that are 
 *       offset by 30 minutes. 
 *
 * @var float
 */
$time_offset = date("Z")/3600;

/**
 * Save to CSV switch
 *
 * Change this to true in order to enable the save-to-CSV feature.
 *
 * @var boolean
 */
$save_to_CSV = false;

/**
 * CSV file path
 *
 * The CSV file to save to must exist and be writable. FormMailer will not 
 * attempt to create it. Data will be appended to the end of the file. 
 *
 * @var string
 */
$csv_path = '';

/**
 * CSV separator
 *
 * The following setting can be used to change the separator in a CSV file. 
 * The default is a comma (',').
 *
 * @var string
 */
$csv_separator = ',';

/**
 * Save to database switch
 *
 * Change this to true in order to enable the save-to-MySQL feature.
 *
 * @var boolean
 */
$save_to_DB = false;

/*
 * MySQL connection configuration
 */
$DB_host  = 'localhost';
$DB_user  = 'username';
$DB_pass  = 'password';
$DB_name  = 'database_name';
$DB_table = 'table';

/**
 * Catch-all column
 *
 * If this variable is not empty, all submitted form data (except attachments) 
 * will be concatenated and inserted as a string into the specified column.
 *
 * @var string
 */
$catchall_column = '';

/**
 * The following two arrays are used to generate the MySQL query. The first 
 * array contains the names of the form fields you want to save. The second 
 * array contains the names of the columns that the values of these fields 
 * should be inserted into. 
 *
 * Note: The number of fields and column names must match, i.e., the two arrays
 *       must have the same number of elements.
 *
 * @var array
 */
$DB_save_fields = array(
    'name', 
    'email', 
    'comments',
);

/**
 * Columns into which to insert form data (see the array above)
 *
 * @var array
 */
$DB_columns = array(
    'name', 
    'email', 
    'comments'
);

/**
 * CAPTCHA switch
 *
 * Change this to true in order to require a CAPTCHA check when the form is 
 * submitted.
 *
 * @var boolean
 */
$captcha_check = true;
?>
