/*
  +----------------------------------------------------------------------+
  | PHP Version 5                                                        |
  +----------------------------------------------------------------------+
  | Copyright (c) 1997-2011 The PHP Group                                |
  +----------------------------------------------------------------------+
  | This source file is subject to version 3.01 of the PHP license,      |
  | that is bundled with this package in the file LICENSE, and is        |
  | available through the world-wide-web at the following url:           |
  | http://www.php.net/license/3_01.txt                                  |
  | If you did not receive a copy of the PHP license and are unable to   |
  | obtain it through the world-wide-web, please send a note to          |
  | license@php.net so we can mail you a copy immediately.               |
  +----------------------------------------------------------------------+
  | Author: James Tang <james@fwso.cn>                                   |
  +----------------------------------------------------------------------+
*/

/* $Id: header 310447 2011-04-23 21:14:10Z bjori $ */

#ifdef HAVE_CONFIG_H
#include "config.h"
#endif

#include "php.h"
//#include "php_ini.h"
//#include "ext/standard/info.h"
#include "php_jmodule.h"

/* If you declare any globals in php_jmodule.h uncomment this:
ZEND_DECLARE_MODULE_GLOBALS(jmodule)
*/

/* True global resources - no need for thread safety here */
//static int le_jmodule;

/* {{{ jmodule_functions[]
 *
 * Every user visible function must have an entry in jmodule_functions[].
 */
const zend_function_entry jmodule_functions[] = {
	PHP_FE(jmodule_strlen, NULL)
	PHP_FE(jmodule_refcount, NULL)
	PHP_FE(jmodule_array_range, NULL)
	/*PHP_NAMED_FE(jstrlen, PHP_FNAME(jmodule_strlen), NULL)//NOT work*/
	PHP_FALIAS(jstrlen, jmodule_strlen, NULL)
	PHP_FE_END//{NULL, NULL, NULL}/* Must be the last line in jmodule_functions[] */
};
/* }}} */

/* {{{ jmodule_module_entry
 */
zend_module_entry jmodule_module_entry = {
#if ZEND_MODULE_API_NO >= 20010901
	STANDARD_MODULE_HEADER,
#endif
	PHP_JMODULE_EXTNAME,
	jmodule_functions,
	NULL, /*PHP_MINIT(jmodule),*/
	NULL, /*PHP_MSHUTDOWN(jmodule),*/
	NULL, /*PHP_RINIT(jmodule),		/ * Replace with NULL if there's nothing to do at request start */
	NULL, /* PHP_RSHUTDOWN(jmodule),	/ * Replace with NULL if there's nothing to do at request end */
	PHP_MINFO(jmodule),
#if ZEND_MODULE_API_NO >= 20010901
	"0.1", /* Replace with version number for your extension */
#endif
	STANDARD_MODULE_PROPERTIES
};
/* }}} */

#ifdef COMPILE_DL_JMODULE
ZEND_GET_MODULE(jmodule)
#endif

/* {{{ PHP_INI
 */
/* Remove comments and fill if you need to have entries in php.ini
PHP_INI_BEGIN()
    STD_PHP_INI_ENTRY("jmodule.global_value",      "42", PHP_INI_ALL, OnUpdateLong, global_value, zend_jmodule_globals, jmodule_globals)
    STD_PHP_INI_ENTRY("jmodule.global_string", "foobar", PHP_INI_ALL, OnUpdateString, global_string, zend_jmodule_globals, jmodule_globals)
PHP_INI_END()
*/
/* }}} */

/* {{{ php_jmodule_init_globals
 */
/* Uncomment this function if you have INI entries
static void php_jmodule_init_globals(zend_jmodule_globals *jmodule_globals)
{
	jmodule_globals->global_value = 0;
	jmodule_globals->global_string = NULL;
}
*/
/* }}} */

/* {{{ PHP_MINIT_FUNCTION
 */
PHP_MINIT_FUNCTION(jmodule)
{
	/* If you have INI entries, uncomment these lines 
	REGISTER_INI_ENTRIES();
	*/
	return SUCCESS;
}
/* }}} */

/* {{{ PHP_MSHUTDOWN_FUNCTION
 */
PHP_MSHUTDOWN_FUNCTION(jmodule)
{
	/* uncomment this line if you have INI entries
	UNREGISTER_INI_ENTRIES();
	*/
	return SUCCESS;
}
/* }}} */

/* Remove if there's nothing to do at request start */
/* {{{ PHP_RINIT_FUNCTION
 */
PHP_RINIT_FUNCTION(jmodule)
{
	return SUCCESS;
}
/* }}} */

/* Remove if there's nothing to do at request end */
/* {{{ PHP_RSHUTDOWN_FUNCTION
 */
PHP_RSHUTDOWN_FUNCTION(jmodule)
{
	return SUCCESS;
}
/* }}} */

/* {{{ PHP_MINFO_FUNCTION
 */
PHP_MINFO_FUNCTION(jmodule)
{
	php_info_print_table_start();
	php_info_print_table_header(2, "jmodule support", "enabled");
	php_info_print_table_end();

	/* Remove comments if you have entries in php.ini
	DISPLAY_INI_ENTRIES();
	*/
}
/* }}} */


/* Remove the following function when you have succesfully modified config.m4
   so that your module can be compiled into PHP, it exists only for testing
   purposes. */

/* Every user-visible function in PHP should document itself in the source */
/* {{{ proto string jmodule_strlen(string arg)
   Return a string to confirm that the module is compiled in */
PHP_FUNCTION(jmodule_strlen)
{
	char *arg = NULL;
	int arg_len, len;
	//char *strg;

	if (zend_parse_parameters(ZEND_NUM_ARGS() TSRMLS_CC, "s", &arg, &arg_len) == FAILURE) {
		return;
	}

	len = (long) strlen(arg);
	//len = spprintf(&strg, 0, "Congratulations! You have successfully modified ext/%.78s/config.m4. Module %.78s is now compiled into PHP.", "jmodule", arg);
	//RETURN_STRINGL(strg, len, 0);
	//RETURN_LONG(len);
	RETVAL_LONG(len);
	return;
}
/* }}} */

/* {{{ proto void jmodule_array_range(mixed variable)
 * do noting except for testing only
 */
PHP_FUNCTION(jmodule_array_range)
{
	if (return_value_used) {
		int i;
		array_init(return_value);
		for (i = 0; i < 1000; i++) {
			add_next_index_long(return_value, i);
		}
		return;
	} else {
		php_error_docref(NULL TSRMLS_CC, E_NOTICE,
				"Static return-only function called without processing output");
		RETURN_NULL();
	}
}
/* }}} */

/* {{{ proto int jmodule_refcount(mixed variable)
 * return the reference count of current variable
 */
PHP_FUNCTION(jmodule_refcount)
{
	zval *val;
	if (zend_parse_parameters(ZEND_NUM_ARGS() TSRMLS_CC, "z", &val)
			== FAILURE) {
		RETURN_FALSE;
	}

	if (Z_TYPE_P(val) == IS_NULL) {
		RETURN_NULL();
	}

	//RETURN_LONG(val->refcount__gc);
	RETURN_LONG(Z_REFCOUNT_P(val));
}
/* }}} */

/*
 * Local variables:
 * tab-width: 4
 * c-basic-offset: 4
 * End:
 * vim600: noet sw=4 ts=4 fdm=marker
 * vim<600: noet sw=4 ts=4
 */
