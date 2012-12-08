#include <stdio.h>

int main(void)
{
    char *str = "Hello, world";

    while (*str != '\0') {
        printf("%p, %c\n", str, *(str));
        str++;
    } 

    return 0;
}
