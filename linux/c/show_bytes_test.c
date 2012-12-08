#include <stdio.h>
#include "show_bytes.h"

int main(void) {
	int a = 256;
	float b = 0.1;
	char *c = "abc";
	short int v = -12345;
	unsigned short uv = (unsigned short) v;

    int val = 0x87654321;
    byte_p valp = (byte_p) &val;

	show_int(a);//little endian: 0x00010000,big endian: 0x00000100
	a = -1;
	show_int(a);
	show_float(b);
	show_pointer(c);

    printf("v = %d, ", v);
	show_bytes((byte_p) &v, sizeof(short int));
    printf("uv = %d, ", uv);
	show_bytes((byte_p) &uv, sizeof(unsigned short));

    printf("================\n");
    show_bytes(valp, 1);
    show_bytes(valp, 2);
    show_bytes(valp, 3);

	return 0;
}
