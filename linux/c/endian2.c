#include <stdio.h>
#define LITTLE_ENDIAN 1
#define BIG_ENDIAN 0 

int endian() {
	int i;
	union {
		unsigned char bytes[4];
		unsigned int v;
	} e, e2;

	e.bytes[0] = 0;
	e.bytes[1] = 1;
	e.bytes[2] = 0;
	e.bytes[3] = 0;

	e2.v = 256;

	//bytes[1] = 1 on little endian machine, 
	//bytes[2] = 1 on big endian machine.	
	for (i = 0; i < 4; i++) 
		printf("bytes[%d] = %d\n", i, e2.bytes[i]);

	return e.v == 256;
}

int main(void) {
	if (endian() == LITTLE_ENDIAN) {
		printf("Little endian\n");
	} else {
		printf("Big endian\n");
	}
	return 0;
}
