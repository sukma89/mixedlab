#include <stdio.h>
#include "static_func.h"

static int add(int a, int b) {
	return a + b;
}

int main(void) {
	int a = 3, b = 11;
	printf("%d + %d = %d\n", a, b, add(a, b));
	printf("%d * %d = %d\n", a, b, multi(a, b));
}

