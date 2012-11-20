#include <stdio.h>
#include <stdlib.h>
#include <string.h>

typedef struct _node {
    int int_value;
    char str[10];
    struct node *next;
} node_t;

int main(int argc, char *argv[])
{
    FILE *fp;
    int i;
    char *str = "This is a string字符串";
    node_t *node, *node2;

    fp = fopen("file.data", "w");

    if (fp == NULL) {
        printf("Failed to open file\n");
        exit(1);
    }

    for (i = 'A'; i <= 'G'; i++) {
        fputc(i, fp);
        fputc('\n', fp);
    } 

    fputs("Hello, world\n", fp);
    printf("Bytes have been written: %ld\n", 
            fwrite(str, sizeof(char), strlen(str), fp));

    fclose(fp);
    fopen("binary.data", "w");

    node = (node_t *) malloc(sizeof(node_t));
    node->int_value = 10;
    strcpy(node->str, "Test Str");
    node->next = NULL;

    node2 = (node_t *) malloc(sizeof(node_t));
    node2->int_value = 22;
    strcpy(node2->str, "Test Str2");
    node2->next = NULL;

    printf("Bytes have been written: %ld\n", 
            fwrite(node, sizeof(node_t), 1, fp));
    fwrite(node2, sizeof(node_t), 1, fp);

    free(node);
    free(node2);

    fclose(fp);

    fp = fopen("binary.data", "r");
    node2 = (node_t *) malloc(sizeof(node_t));
    printf("Bytes have read %ld\n", fread(node2, sizeof(node_t), 1, fp));
    printf("node2->value = %d, %s\n", node2->int_value, node2->str);

    node = (node_t *) malloc(sizeof(node_t));
    fread(node, sizeof(node_t), 1, fp);
    printf("node->value = %d, %s\n", node->int_value, node->str);

    fclose(fp);
    
    return 0;
}
