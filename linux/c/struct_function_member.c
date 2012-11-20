#include <stdio.h>
#include <stdlib.h>

typedef struct {
	char *name;
	int (*treat_data)(int arg);
} Module;

int _treat_data(int arg) {
	return arg * 2;
}

int _treat_data2(int arg) {
	return arg + 2;
}

int main(void) 
{
	Module m1 = {"Module 1", _treat_data}, m2 = {"Module 2", _treat_data2};	
	printf("%s: %d\n", m1.name, m1.treat_data(5));
	printf("%s: %d\n", m2.name, m2.treat_data(5));
	return 0;
}
