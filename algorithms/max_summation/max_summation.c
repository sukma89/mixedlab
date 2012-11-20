#include <stdio.h>
#include <stdlib.h>

#define MAX_ELEMENTS 1024

char *read_line(FILE *fp, int *len);

/**
 * @param *list a array of integer
 * @param len lenght of the array
 * @param i the start index pointer
 * @param j the end index pointer
 *
 * @return the max summation result
 */
int find_max_sum(int *list, int len, int *i, int *j);

/**
 * Read a list of integers from a file, with one integer per line
 *
 * @param file_name
 * @param len length 
 * 
 * @return list pointer
 */
int *read_list(char *file_name, int *len);

int main(int argc, char *argv[])
{
    int *list, len, max, i, j, k;

    if (argc < 2) {
        printf("Usage: COMMAND file_name\n");
        exit(1);
    }

    printf("Read list form file: %s\n", argv[1]);

    list = read_list(argv[1], &len);

    max = find_max_sum(list, len, &i, &j); 

    printf("{%d", list[0]);
    for (k = 1; k < len; k++) {
        printf(", %d", list[k]);
    }
    printf("}\n");

    printf("Max summation = %d, while i=%d and j=%d.\n", max, i, j);

    return 0;
}

/**
 * Sum[Sum[j - i + 1, {j, i, N - 1}], {i, 0, N - 1}]
 * T(N) = O(N^3)
 */
int find_max_sum_1(int *list, int len, int *i, int *j)
{
    int sum, max = 0, t, _i, _j;
    for (_i = 0; _i < len; _i++) {
        for (_j = _i; _j < len; _j++) {
            sum = 0;
            for (t = _i; t <= _j; t++) {
                sum += *(list+t);
            }
            if (sum > max) {
                max = sum;
                *i = _i;
                *j = _j;
            }
        }
    }
    return max;
}

/**
 * Sum[N - i, {i, 0, N - 1}]
 * T(N) = O(N^2)
 */
int find_max_sum_2(int *list, int len, int *i, int *j)
{
    int sum, max = 0, _i, _j;
    for (_i = 0; _i < len; _i++) {
        sum = 0;
        for (_j = _i; _j < len; _j++) {
            sum += *(list+_j);
            if (sum > max) {
                max = sum;
                *i = _i;
                *j = _j;
            }
        }
    }
    return max;
}

int _find_max_sum_3(const int *list, int left, int right, 
                                                    int *i, int *j)
{
    int leftSum, rightSum, centerSum = 0, center, li, lj, ri, rj, ci, cj,
        lcenter = 0, lcenterSum = 0, rcenterSum = 0, k;

    if (left == right) {
        if (*(list + left) > 0) {
            *i = left;
            *j = left;
            return *(list + left);
        } else {
            *i = -1;
            *j = -1;
            return 0;
        }
    }

    center = (int) ((right + left) / 2);

    leftSum = _find_max_sum_3(list, left, center, &li, &lj);
    rightSum = _find_max_sum_3(list, center + 1, right, &ri, &rj);

    for (k = center; k >= left; k--) {
        lcenter += *(list + k);
        if (lcenterSum < lcenter) {
            lcenterSum = lcenter;
            ci = k;
        }
    }

    lcenter = 0;
    for (k = center + 1; k <= right; k++) {
        lcenter += *(list + k);
        if (rcenterSum < lcenter) {
            rcenterSum = lcenter;
            cj = k;
        }
    }

    centerSum = lcenterSum + rcenterSum;

    if (leftSum > centerSum && leftSum > rightSum) {
        *i = li;
        *j = lj;
        return leftSum;
    }

    if (centerSum > leftSum && centerSum > rightSum) {
        *i = ci;
        *j = cj;
        return centerSum;
    }

    *i = ri;
    *j = rj;
    return rightSum;
}

int find_max_sum(int *list, int len, int *i, int *j)
{
    /*
    *i = 0;
    *j = 0;
    return _find_max_sum_3(list, 0, len - 1);
    */
    return _find_max_sum_3(list, 0, len - 1, i, j);
}

int find_max_sum_4(int *list, int len, int *i, int *j)
{
    int sum = 0, max = 0, start_i = 0, _i;

    *i = 0;
    *j = 0;

    for (_i = 0; _i < len; _i++) {
        sum += *(list + _i);
        if (sum > max) {
            max = sum;
            *i = start_i;
            *j = _i;
        } else if (sum < 0) {
            //This is key step
            sum = 0;
            start_i = _i+1;
        }
    }

    return max;
}

char *read_line(FILE *fp, int *len)
{
    char *line = NULL, *tline, c;

    *len = 0;

    while ((c = fgetc(fp)) != EOF) {

        tline = (char *) realloc(line, sizeof(char));
        if (tline == NULL) {
            printf("Failed to allocate memory\n");
            exit(1);
        }
        line = tline;

        if (c == '\n') {
            break;
        }

        line[(*len)++] = c;
    } 

    if ((*len) > 0) {
        line[*len] = '\0';
    } else {
        free(line);
        line = NULL;
    }

    return line;
}

int *read_list(char *file_name, int *len)
{
    FILE *fp;
    char *line;
    int lineLen = 0, *list = NULL;
    //int allSize = 64;

    fp = fopen(file_name, "r");

    if (!fp) {
        printf("Failed to read file %s", file_name);
        exit(1);
    }

    list = (int *) malloc(sizeof(int) * MAX_ELEMENTS);

    if (list == NULL) {
        printf("Failed to allocate memory\n");
        exit(1);
    }

    while ((line = read_line(fp, &lineLen)) != NULL) { 
        if ((*len) >= MAX_ELEMENTS) {
            break;
        }
        list[(*len)++] = atoi(line);
    }

    fclose(fp);

    return list;
}
