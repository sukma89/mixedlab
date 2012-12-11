#include <stdio.h>
#include <stdlib.h>
#include "../show_bytes.h"

/**
 * convert 32bit int to the corresponding float bit pattern
 */
unsigned convert_int_to_float(int i);

int main(int argc, char *argv[])
{
    int i;
    float vf;
    unsigned f;

    if (argc < 2) {
        printf("Usage: COMMAND INTEGER\n");
        exit(1);
    }

    i = atoi(argv[1]);

    if (i != 0) {
        vf = atof(argv[1]);
        f = convert_int_to_float(i);
        printf("f  = ");
        show_bytes((byte_p) &f, sizeof(f));
        printf("vf = ");
        show_float(vf);
    } else {
        printf("i == 0\n");
    }

    return 0;
}

unsigned convert_int_to_float(int i)
{
    unsigned f = 0x00000000;
    int e = 0, t, ms = 0, ms_mask = 0x40000000;

    if (i < 0) {
        f |= 0x80000000;
        i = (~i) + 1;
    }

    while (e < 31) {
        e++;
        ms = ms_mask & i;
        if (!ms) {
            ms_mask >>= 1;
        } else {
            i &= (~ms_mask);
            break;
        }
    }

    if (e > 8) {
        t = e - 8;
        i <<= t;
    } else if (e < 8) {
        t = 8 - e;
        i >>= t;
    }

    e = 127 + 31 - e;
    e <<= 23;
    f |=  e;
    f |=  i;

    return f;
}
