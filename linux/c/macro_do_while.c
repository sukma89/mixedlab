/**
 * using do {} while(0) in macros
 * 
 * The whole idea of using 'do/while' version is to
 * make a macro which will expand into a regular statement, 
 * not into a compound statement. This is done in order to 
 * make the use of function-style macros uniform with 
 * the use of ordinary functions in all contexts.
 */
#include <stdio.h>
#define CALL_FUNS(a) \
   do {\
   	func1(a);\
	func2(a);\
	} while(0)	   

void func1(int a) {
	printf("func1(a) = %d\n", a);
}

void func2(int a) {
	printf("func2(a) = %d\n", a*a);
}

int main(void) {
	int a = 5;
	if (a >= 5) 
		CALL_FUNS(a);
	else 
		func2(a);

	return 0;
}
