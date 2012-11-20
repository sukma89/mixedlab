#include <stdio.h> 
#include <limits.h>
#include <string.h>

char toUpperCase (char ch) {
	return ch & 0xDF;
}

char toLowerCase (char ch) {
	return ch | 0x20;
}

int main(int argc, char *argv[]) {
	char ch = 'a',ch2;
	int i;

	printf("Char size:%d\nInt Size:%d\nLong size:%d\nFloat size:%d\nDouble Size:%d\n", sizeof(char), sizeof(int), sizeof(long), sizeof(float), sizeof(double));

	printf("Char Bits: %d\n", CHAR_BIT);
	printf("Int Max: %d\n", INT_MAX);
	printf("Arguments: %d\n", argc);
	
	for (i = 0; i < argc; i++) {
		printf("Arg %d: %s\n", i, argv[i]);
	}

	if (i > 1) {
		ch = argv[1][0];
	}
	
	ch2 = toUpperCase(ch);

	printf("%c to upper: %c\n", ch,  ch2);
	printf("%c to lower: %c\n", ch2, toLowerCase(ch2));
	return 0;
}

