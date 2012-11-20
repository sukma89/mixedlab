dnl $Id$
dnl config.m4 for extension jmodule

dnl Comments in this file start with the string 'dnl'.
dnl Remove where necessary. This file will not work
dnl without editing.

dnl If your extension references something external, use with:

dnl PHP_ARG_WITH(jmodule, for jmodule support,
dnl Make sure that the comment is aligned:
dnl [  --with-jmodule             Include jmodule support])

dnl Otherwise use enable:

PHP_ARG_ENABLE(jmodule, whether to enable jmodule support,
[  --enable-jmodule           Enable jmodule support])

if test "$PHP_JMODULE" != "no"; then
  dnl Write more examples of tests here...

  dnl # --with-jmodule -> check with-path
  dnl SEARCH_PATH="/usr/local /usr"     # you might want to change this
  dnl SEARCH_FOR="/include/jmodule.h"  # you most likely want to change this
  dnl if test -r $PHP_JMODULE/$SEARCH_FOR; then # path given as parameter
  dnl   JMODULE_DIR=$PHP_JMODULE
  dnl else # search default path list
  dnl   AC_MSG_CHECKING([for jmodule files in default path])
  dnl   for i in $SEARCH_PATH ; do
  dnl     if test -r $i/$SEARCH_FOR; then
  dnl       JMODULE_DIR=$i
  dnl       AC_MSG_RESULT(found in $i)
  dnl     fi
  dnl   done
  dnl fi
  dnl
  dnl if test -z "$JMODULE_DIR"; then
  dnl   AC_MSG_RESULT([not found])
  dnl   AC_MSG_ERROR([Please reinstall the jmodule distribution])
  dnl fi

  dnl # --with-jmodule -> add include path
  dnl PHP_ADD_INCLUDE($JMODULE_DIR/include)

  dnl # --with-jmodule -> check for lib and symbol presence
  dnl LIBNAME=jmodule # you may want to change this
  dnl LIBSYMBOL=jmodule # you most likely want to change this 

  dnl PHP_CHECK_LIBRARY($LIBNAME,$LIBSYMBOL,
  dnl [
  dnl   PHP_ADD_LIBRARY_WITH_PATH($LIBNAME, $JMODULE_DIR/lib, JMODULE_SHARED_LIBADD)
  dnl   AC_DEFINE(HAVE_JMODULELIB,1,[ ])
  dnl ],[
  dnl   AC_MSG_ERROR([wrong jmodule lib version or lib not found])
  dnl ],[
  dnl   -L$JMODULE_DIR/lib -lm
  dnl ])
  dnl
  dnl PHP_SUBST(JMODULE_SHARED_LIBADD)

  PHP_NEW_EXTENSION(jmodule, jmodule.c, $ext_shared)
fi
