#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include "th.h"

int main(int argc, char *argv[]) 
{
	int a = 1, b = 2, c;
	c = jplus(a, b);	
	printf("a + b = %d\n", c);
	return 0;
}

