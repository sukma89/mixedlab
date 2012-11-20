#include <stdio.h>
typedef int (*func_t)(int a, int b);

void test_func(func_t func, int a, int b);
int test_callback(int a, int b);

int main(void)
{
    int a = 10, b = 20;
    test_func(test_callback, a, b);
    return 0;
}

void test_func(func_t func, int a, int b)
{
    printf("fun(a, b) = %d\n", func(a, b));
}

int test_callback(int a, int b)
{
    return a % b;
}
