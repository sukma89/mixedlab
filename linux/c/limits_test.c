#include <stdio.h>
#include <errno.h>
#include <limits.h>
#include <unistd.h>

int main(void)
{
    long val;

    printf("CHAR_MIN = %d\n", CHAR_MIN);
    printf("CHAR_MAX = %d\n", CHAR_MAX);
    printf("FOPEN_MAX = %d\n", FOPEN_MAX);
    printf("TMP_MAX = %d\n", TMP_MAX);
    printf("_POSIX_ARG_MAX = %d\n", _POSIX_ARG_MAX);

#ifdef _SC_ARG_MAX
    val = sysconf(_SC_ARG_MAX);
    printf("_SC_ARG_MAX = ");

    if (val < 0) {
        if (errno != 0) {
            if (errno == EINVAL) {
                printf(" (not supported)\n");
            } else {
                printf(" Error\n");
            }
        } else {
                printf(" (no limit)\n");
        }
    } else {
        printf(" %ld\n", val);
    }
#else
    printf("_SC_ARG_MAX does not exists.\n");
#endif

#ifdef _PC_MAX_CANON
    val = pathconf("./", _PC_MAX_CANON);
    printf("_PC_MAX_CANON = ");

    if (val < 0) {
        if (errno != 0) {
            if (errno == EINVAL) {
                printf(" (not supported)\n");
            } else {
                printf(" Error\n");
            }
        } else {
                printf(" (no limit)\n");
        }
    } else {
        printf(" %ld\n", val);
    }
#else
    printf("_PC_MAX_CANON does not exists.\n");
#endif

    return 0;
}
