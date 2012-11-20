#include <stdio.h>
#include <string.h>
#include <stdlib.h>
#include <limits.h>

int main(void) {
    char *str;
    str = strdup("Hello, world");

    if (!str) {
        fprintf(stderr, "Unable to allocate memory!");
    } else {
        printf("> %s\n", str);
        free(str);
    }

    return 0;
}

int _main(void) 
{
	char *str1 = "Hello";
	char *str2 = "hello";
	char *str3 = "Hello, world!";
	char *str4 = NULL;
	printf("%s COMP %s = %d\n", str1, str2, strcmp(str1, str2));
	printf("%s COMP %s = %d\n", str1, str2, strcasecmp(str1, str2));
	printf("%s COMP %s = %d\n", str1, str3, strcmp(str1, str3));
	printf("%s COMP %s = %d\n", str1, str3, strncmp(str1, str3, 5));
	printf("%s COMP %s = %d\n", str1, str3, strncasecmp(str2, str3, 5));

	#ifdef INIT
	str4 = malloc(14 * sizeof(char));
	strcpy(str4, "Hello, world");
	#endif
	if (str4) {
		printf("%s\n", str4);
	}
	printf("INT_MAX=%d\n", INT_MAX);
	return 0;
}
