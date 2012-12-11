#include <stdio.h>
#include "../show_bytes.h"

int main(void)
{
    float f = .000001;

    printf("sizeof(float) = %ld\n", sizeof(float));
    printf("f = %10.6f, ", f);
    show_float(f);

    f = 1.0;
    printf("f = %10.6f, ", f);
    show_float(f);

    f = -2.1;
    printf("f = %10.6f, ", f);
    show_float(f);

    return 0;
}

