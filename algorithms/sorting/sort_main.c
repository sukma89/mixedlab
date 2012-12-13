#include "../algorithm.h"
#include "sorting.h"

int main(void)
{
    //int arr[] = {6, 14, 10, 8, 7, 9, 3, 2, 4, 1}, arr_len = 10;
    int arr[] = {6, 14, 10, 8, 7, 9, 3, 2, 4, 1, 34, 193, 2, 12, -138, 73}, arr_len = 16;

    print_array(arr, arr_len);
    //heapsort(arr, arr_len);
    //insert_sort(arr, arr_len);
    jqsort(arr, 0, arr_len-1);
    //shellsort(arr, arr_len);
    //mergesort(arr, arr_len);
    print_array(arr, arr_len);
    return 0;
}
