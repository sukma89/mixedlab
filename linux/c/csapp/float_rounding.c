#include <stdio.h>

int main(void)
{
    float f = 1.2349999, f2 = 1.2350001,
          f3 = 1.2350000, f4 = 1.2450000; 

    printf("f  = %5.2f, f2 = %5.2f\n", f, f2);
    printf("f3 = %5.2f, f4 = %5.2f\n", f3, f4);
    return 0;
}
