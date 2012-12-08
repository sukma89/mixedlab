#include <stdio.h>

//does NOT works for (x+y)-x will evaluated to y regardless of 
//whether or not the addition overflows.
int tadd_ok2(int x, int y)
{
    int sum = x + y;
    return (sum - x == y) && (sum - y == x);
}

int tadd_ok(int x, int y)
{
    int sum = x + y;
    int neg_over = x < 0 && y < 0 && sum >=0;
    int pos_over = x >= 0 && y >= 0 && sum < 0;
    return !neg_over && !pos_over;

    /*
    if (x > 0 && y > 0) {
        if (sum > x && sum > y) return 1;
    } else if (x < 0 && y < 0) {
        if (sum < x && sum < y) return 1;
    } else {
        return 1;
    }

    return 0;
    */
}

int main(void)
{
    int x = 0xFFFFFFFF, y = 0xFFFF0000, z = 0x0000FFFF, k = 0x80000000;
    printf("x + 1 = %d\n", x+0x1);
    printf("x + 3 = %d\n", x+0x3);
    printf("y + z = %d\n", y + z);
    printf("k = %d, -k = %d\n", k, -k);

    x = k;

    if (tadd_ok2(x, x)) {
        printf("x + x OK\n");
    } else {
        printf("x + x NOT OK\n");
    }

    return 0;
}
