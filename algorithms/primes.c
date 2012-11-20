//gcc primes.c -lm
#include <stdio.h>
#include <stdlib.h>
#include <math.h>

int trial_division(int n) {
	int i, j, k, stop, count=0;
	int *primes = (int *) malloc(sizeof(int) * n);	

	primes[count++] = 2;
	stop = count;

	for (i = 3; i <= n; i++) {
		k = (int) sqrt(i);
		while (primes[stop] <= k && stop < count) {
			stop++;
		}

		for (j = 0; j < stop; j++) {
			if (i % primes[j] == 0) break;
		}

		if (j == stop) {
			primes[count++] = i;
		}
	}

	for (i = 0; i < count; i++) {
		printf("%d, ", primes[i]);
	}
	printf("\n");

	free(primes);

	return count;
}

int main(void) {
	int n = 100;
	printf("Total: %d\n", trial_division(n));
	return 0;
}

