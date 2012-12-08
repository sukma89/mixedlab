#include <stdio.h>
#include "show_bytes.h"

void show_bytes(byte_p start, long int len) {
	int i;
	printf("0x");
#if defined(LEND)
	for (i = len - 1; i >= 0; i--) {
#else
	for (i = 0; i < len; i++) {
#endif
		printf("%.2x", start[i]);
	}	
	printf("\n");
}

void show_int(int x) {
	show_bytes((byte_p) &x, sizeof(int));
}

void show_float(float x) {
	show_bytes((byte_p) &x, sizeof(float));
}

void show_pointer(void *x) {
	show_bytes((byte_p) &x, sizeof(void *));
}

