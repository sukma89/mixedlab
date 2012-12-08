#include <stdio.h>
#include <string.h>


#define ZEND_FN(name) zif_##name

#define STR(x) #x

#define _DD_TEST 1

int zif_strlen(char *str) {
	return strlen(str);
}

int main(void) 
{
	char *str = "Hello, world";
	int len = ZEND_FN(strlen)(str);
	printf("Length of \"%s\" = %d\n", str, len);	
	printf("%s\n", STR(hello));
    printf("_DD_TEST = %d\n", _DD_TEST);
	return 0;
}

