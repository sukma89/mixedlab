#include <stdio.h>

int main(void) {
	printf("sizeof(char)\t\t= %ld\n", sizeof(char));
	printf("sizeof(short int)\t= %ld\n", sizeof(short int));
	printf("sizeof(int)\t\t= %ld\n", sizeof(int));
	printf("sizeof(long int)\t= %ld\n", sizeof(long int));
	printf("sizeof(long long int)\t= %ld\n", sizeof(long long int));
	printf("sizeof(float)\t\t= %ld\n", sizeof(float));
	printf("sizeof(double)\t\t= %ld\n", sizeof(double));
	printf("sizeof(char *)\t\t= %ld\n", sizeof(char *));
	printf("sizeof(double *)\t= %ld\n", sizeof(double *));
	return 0;
}
