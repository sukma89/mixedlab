#include <stdio.h>
#include <stdlib.h>

long long int gcd(long long int m, long long int n);

int main(int argc, char *argv[])
{
    long long int m, n, d;

    if (argc < 3) {
        printf("Usage: ./a.out M N\n");
        exit(1);
    }

    printf("Size of long long: %d\n", sizeof(long long));

    m = atoll(argv[1]);
    n = atoll(argv[2]);
    d = gcd(m, n);

    printf("GCD of %lld and %lld = %lld\n", m, n, d);

    return 0;
}

long long int gcd(long long int m, long long int n) {
    long long int t;

    if (m < n) {
        t = m;    
        m = n;
        n = t;
    } 

    t = m % n;

    while (t > 0) {
        m = n;
        n = t;
        t = m % n;
    }

    return n;
}

