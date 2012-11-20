#include <stdio.h>
#include <string.h>
#define arrlen(arr) (sizeof(arr) == 0 ? 0 : sizeof(arr) / sizeof((arr)[0]))

int main(int argc, char *argv[]) {
	char a1[20];

    //a2 is an array big enough to hold the sequence of characters and '\0'
	char a2[] = "Hello, You!";

    //str is a pointer, initialized to point to a string constant
	char *str = "Hello, You!";

    printf("str = %s, [0]=%c, [1]=%c\n", str, str[0], 1[str]);
    printf("a2  = %s, [0]=%c, [1]=%c\n\n", a2, a2[0], 1[a2]);

	printf("arrlen(a1)  = %ld\n", arrlen(a1));
	printf("arrlen(a2)  = %ld\n", arrlen(a2));
	printf("strlen(a2)  = %ld\n", strlen(a2));

	printf("arrlen(str) = %ld\nstrlen(str) = %ld\n\n", 
            arrlen(str), strlen(str));

    printf("sizeof(char *) = %ld\n", sizeof(char *));
    printf("sizeof(a2)     = %ld\n", sizeof(a2));
    printf("sizeof(&(*a2)) = %ld\n", sizeof(&(*a2)));
    ++str;
    printf("%s\n", str);

    //array are not modifiable lvaue
    //so, following line will cause
    //error: incompatible types when assigning to type ‘char[12]’ from type ‘char *’
    //a2 = a2 + 1;

    a2[2] = 'X';
    printf("%s\n", a2);

    //following statement will pass compiling, but 
    //cause segmentation fault at runtime
    str[2] = 'X';
    printf("%s\n", str);

	return 0;
}
