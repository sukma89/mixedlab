#include <stdio.h>

int main(void)
{
    //for linux-64bit
    unsigned a = 0xFFFFFFFF;
    printf("sizeof(a) = %ld\n", sizeof(a));
    printf("a = %u\n", a);
    printf("a + 1 = %u\n", a + 1);
    printf("a + 2 = %u\n", a + 2);
    return 0;
}
