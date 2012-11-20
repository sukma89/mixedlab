#include <stdio.h>
#include <limits.h>

int main(void)
{
	int i = 1;
	unsigned int ui = 1;
	char c = 127, c1, c2;
	unsigned char uc = 255, uc1, uc2;
	printf("%d, %d\n", i << 2, ui <<2);
	printf("sizeof(char)=%ld, CHAR_MAX=%d\n", sizeof(char), CHAR_MAX);
	printf("sizeof(unsigned char)=%ld, UCHAR_MAX=%d\n", sizeof(unsigned char), UCHAR_MAX);

	c1 = c + 1;
	c2 = c << 1;
	printf("c = %d, +1=%d, << 1 = %d\n", c, c1, c2);
	uc1 = uc + 1;
	uc2 = uc << 1;
	printf("uc = %d, +1=%d, << 1 = %d\n", uc, uc1, uc2);
	return 0;
}
