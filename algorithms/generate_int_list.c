#include <stdio.h>
#include <stdlib.h>

/**
 * Generate random number between limit_l and limit_u
 */
void generate_int_list(long limit_l, long limit_u)
{
    unsigned long i = 0, tlimit;
    FILE *fp;

    if (nlimit >= limit) {
        perror("nlimit should less than limit");
        return;
    }

    tlimit = limit - nlimit;

    fp = fopen("max_summation.data", "w");

    if (!fp) {
        perror("Failed to open file for writing");
        return;
    }

    while (i < limit) {
        ++i;
        fprintf(fp, "%ld\n", rand() % tlimit + nlimit);
    }

    fclose(fp);
}

int main(void) 
{
    long nlimit=-100, limit = 100;
    generate_int_list(nlimit, limit);

    return 0;
}
