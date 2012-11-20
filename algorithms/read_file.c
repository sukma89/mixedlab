#include <stdio.h>
#include <stdlib.h>
#include <errno.h>

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

    list = (int *) malloc(sizeof(int) * 128);

    if (list == NULL) {
        printf("Failed to allocate memory\n");
        exit(1);
    }

    while ((line = read_line(fp, &lineLen)) != NULL) { 
        /*
        if (allSize == (*len)) {
            allSize += 64;
            list = (int *) realloc(list, sizeof(int) * 64);
            printf("Memory reallocate, size = %ld\n", sizeof(list));
        }*/
        list[(*len)++] = atoi(line);
    }

    fclose(fp);

    return list;
}

int main(int argc, char *argv[])
{
    int i, len = 0, *list;

    if (argc < 2) {
        printf("Usage: COMMAND file_name\n");
        exit(1);
    }

    printf("Read list form file: %s\n", argv[1]);

    list = read_list(argv[1], &len);

    for (i = 0; i < len; i++) {
        printf("%d\t", list[i]);
    }

    printf("\nList length: %d\n", len);

    return 0;
}
