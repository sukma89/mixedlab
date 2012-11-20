#include <stdio.h>
#include "lib.h"

//int static_v = 0;
extern int static_v;

int main(int argc, char *args[])
{
	
	int v, i;
	for (i = 0; i < 5; i++) {
		v = increase_v();
		printf("v=%d, static_v=%d\n", v, static_v);
	}
	return 0;
}
