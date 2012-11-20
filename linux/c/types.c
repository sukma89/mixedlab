#include <stdio.h>
#include <stdbool.h>
#include <stdint.h>

typedef union {
	unsigned char chars[4];
	unsigned int i;
} _union;


int main(int argc, char *argv[]) {
	long ld;
	long long lld;
	bool isOk = argc > 1 ? true : false;
	int16_t i16t = 10;
	int8_t i8t = 10;
	int b = 0x0000000000000f;	
	_union u;
	u.chars[0] = 0;
	u.chars[1] = 1;
	u.chars[2] = 0;
	u.chars[3] = 0;

	printf("u = %d, hex: %x\n", u.i, u.i);
	printf("Sizeof _union : %d\n", sizeof(_union));
	printf("Sizeof Integer type: %d\n", sizeof(int));
	printf("Sizeof Long Integer type: %d\n", sizeof(ld));
	printf("Sizeof Long Long Integer type: %d\n", sizeof(lld));
	printf("Sizeof int16_t: %d\n", sizeof(i16t));
	printf("Sizeof int8_t: %d, max=%d\n", sizeof(i8t), 127);
	printf("b=%d\n", b);
	scanf("%d", &i8t);
	printf("New i8t=%d,hex=%x\n", i8t,i8t);

	if (isOk) {
		printf("Has Arg ? ==OK==\n");
	} else {
		printf("Has Arg ? ==NO==\n");
	}

	return 0;
}
