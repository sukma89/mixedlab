/**
 * The number sign(#) used in macro definition
 */
#include <stdio.h>
#define STR(x) #x

/* gcc -D PHP number_sign.c */
#ifdef PHP
#define FUNC_NAME(fname) php_##fname
#else
#define FUNC_NAME(fname) zend_##fname
#endif

int php_test(int a) {
	return a*a; 
}

int zend_test(int a) {
	return a << 1;
}

int main(void) {
	int a = 10;
	printf("a = %s\n", STR(10));
	printf("FUNC_NAME(test)(a) = %d\n", FUNC_NAME(test)(a));
	return 0;
}
