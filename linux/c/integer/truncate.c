#include <stdio.h>
#include "../show_bytes.h"

int main(void)
{
    int x = 53191;
    short sx = (short) x;
    int y = sx;

    printf("sizeof(short) = %ld, sizeof(int) = %ld\n", sizeof(short), sizeof(int));
    printf("x = %d, %x\n", x, x);
    printf("sx = %d, ", sx);
    show_bytes((byte_p) &sx, sizeof(sx));

    printf("y = %d, ", y);
    show_int(y);

    return 0;
}
