#include <stdio.h>

extern char **environ;

int main(void)
{
    int i = 0;
    char *item;

    while((item = environ[i]) != NULL) {
        printf("ENV[%d] %s\n", i, item);
        i++;
    }

    return 0;
}
