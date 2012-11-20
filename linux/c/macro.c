#include <stdio.h>
#include <string.h>


#define ZEND_FN(name) zif_##name

#define STR(x) #x

int zif_strlen(char *str) {
	return strlen(str);
}

int main(void) 
{
	char *str = "Hello, world";
	int len = ZEND_FN(strlen)(str);
	printf("Length of \"%s\" = %d\n", str, len);	
	printf("%s\n", STR(hello));
	return 0;
}

