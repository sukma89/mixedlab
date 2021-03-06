#include <stdio.h>
#include <stdlib.h>

static void my_exit1(void);
static void my_exit2(void);

int main(void)
{
    if (atexit(my_exit2) != 0) {
        printf("Cann't register my_exit2\n");
    }
    if (atexit(my_exit1) != 0) {
        printf("Cann't register my_exit1\n");
    }
    if (atexit(my_exit2) != 0) {
        printf("Cann't register my_exit2\n");
    }

    printf("Main is done\n");

    return 0;
}

static void my_exit1(void)
{
    printf("First exit handler\n");
}

static void my_exit2(void)
{
    printf("Second exit handler\n");
}
