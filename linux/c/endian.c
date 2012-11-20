/*
 * Power PC is Big endian on which AIX runs
 * Testing server:  aix.unix-center.net
 */
#include <stdio.h>
#define LITTLE_ENDIAN 1
#define BIG_ENDIAN 0 

int endian() {
	union {
		unsigned char bytes[4];
		unsigned int v;
	} e;

	e.bytes[0] = 0;
	e.bytes[1] = 1;
	e.bytes[2] = 0;
	e.bytes[3] = 0;
	
	return e.v == 256;
}

int endian2() {
	short int i = 0x0001;
	char *byte = (char *) &i;
	//printf("%d, %d\n", byte[0], byte[1]); // 1, 0 on little endian, 0, 1 on big endian
	return (byte[0] ? LITTLE_ENDIAN : BIG_ENDIAN);
}

int main(void) {
	//if (endian() == LITTLE_ENDIAN) {
	if (endian2() == LITTLE_ENDIAN) {
		printf("Little endian\n");
	} else {
		printf("Big endian\n");
	}
	return 0;
}
