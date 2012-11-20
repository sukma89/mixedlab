#include <stdio.h>

int main(void) {
	int i;
	union {
		char bytes[4];
		unsigned int v;
	} e;
	printf("sizeof(int) = %ld, e=%ld\n", sizeof(int), sizeof(e));
	//e.v = 0x00000001;     
	//e.v = 1;      
	e.v = 256;
	for (i = 0; i < 4; i++) {
		printf("e.bytes[%d] = %d, \t%p\n", i, *(e.bytes+i), e.bytes+i);
	}
	return 0;
}

