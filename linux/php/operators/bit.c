#include <stdio.h>

int main(void)
{
	int i, b;
	unsigned k, d;
	for (i = -11; i <= 11; i++) {
		b = ~i;
		printf("~%d = %d\n", i, b);
	}
	for (k = 0; k <= 11; k++) {
		d = ~k;
		printf("~%d = %d\n", k, d);
	}
	return 0;
}
