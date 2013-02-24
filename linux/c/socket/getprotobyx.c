/**
 * List of internet(IP) protocols
 * @see /etc/protocols
 */
#include <stdio.h>
#include <netdb.h>

#define PROTO_MAX_NUM 145

int main(void)
{
    struct protoent *proto;
    char *a;
    int i; 
    int j, total = 0;

    //proto = getprotobyname("tcp");
    for (j = 0; j <= PROTO_MAX_NUM; j++) {
        proto = getprotobynumber(j);

        if (proto == NULL) {
            printf("Protocol with number %d does not exists\n", j);
            continue;
        }

        total++;
        printf("Protocol name:   %s\n", proto->p_name);
        printf("Protocol number: %d\n", proto->p_proto);

        printf("Protocol alias:  ");
        i = 0;
        while ((a = *(proto->p_aliases+i)) != NULL) {
            i++;
            printf("%s, ", a);
        }
        printf("\n");
        printf("\n");
    }

    printf("Total protocols: %d\n", total);

    return 0;
}
