#include <stdio.h>

int main(void)
{
    char *str = "Helloworld!";
    char t;
    while((t = *(str++)) != '\0') {
        printf("%c,", t);
    }
    printf("\n");
    return 0;
}
