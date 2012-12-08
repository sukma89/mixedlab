#include <stdio.h>
#include <time.h>

int main(void)
{
    int i;
    clock_t t;

#ifdef CLOCKS_PER_SEC
    printf("CLOCKS_PER_SEC = %ld\n", CLOCKS_PER_SEC);
#else
    printf("CLOCKS_PER_SEC does not exists\n");
#endif
    
    for (i = 0; i < 100; i++) {
        printf("> %d, ", i);
    }
    printf("\n\n");

    t = clock();
    printf("t = %ld\n", t);

    return 0;
}
