#include <stdio.h>

typedef unsigned char *byte_p;

void show_bytes(byte_p start, long int len) {
	int i;
	printf("0x");
	for (i = 0; i < len; i++) {
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

int main(void) {
	int a = 256;
	float b = 0.1;
	char *c = "abc";
	short int v = -12345;
	unsigned short uv = (unsigned short) v;
	show_int(a);//little endian: 0x00010000,big endian: 0x00000100
	a = -1;
	show_int(a);
	show_float(b);
	show_pointer(c);
	show_bytes((byte_p) &v, sizeof(short int));
	show_bytes((byte_p) &uv, sizeof(unsigned short));
	return 0;
}
